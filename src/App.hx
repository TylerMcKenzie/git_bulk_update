package src;

import haxe.io.Path;

import src.util.Hub;
import src.util.ChunkIterator;

import sys.FileSystem;
import sys.io.File;
import sys.io.Process;

class App extends Cli
{
    @:flag("-d")
    public var directory: String;

    @:flag("-f")
    public var fileExtension: String;

    @:flag("-s")
    public var search: Array<String>;

    @:flag("-r")
    public var replace: Array<String>;

    @:flag("-b")
    public var branchname: String;

    @:flag("--create-pull")
    public var createPull: Bool;

    @:flag("--pull-message")
    public var pullRequestMessage: String;

    @:default(50)
    @:flag("--chunk")
    public var chunk: Null<Int>;

    @:flag("--dry")
    public var dryRun: Bool;

    public function new() 
    {
        super();
        Cli.processArgs();
    }

    override public function run(): Void
    {
        if (this.directory == null) {
            this.error("Test directory is required");
        }

        if (this.search.length != this.replace.length) {
            this.error('Each search should have an equivalent replace. Got ${this.search.length} searches and ${this.replace.length} replaces.');
        }

        var files = this.getAllFiles(this.directory, new Array<String>());

        var range = 0;
        var chunkIterator = new ChunkIterator<String>(files, this.chunk);

        function getFullChunkUpdates(filesToUpdate)
        {
            this.searchAndReplaceInFiles(this.search, this.replace, filesToUpdate);

            var changedFileCount = this.getChangedFileCount();
            trace(filesToUpdate.length);
            trace(changedFileCount);
            trace(this.chunk - changedFileCount);
            if (changedFileCount != this.chunk) {
                var nextFilesToUpdate = chunkIterator.getNextChunk(this.chunk - changedFileCount + 1);
                getFullChunkUpdates(nextFilesToUpdate);
            }
        }

        for (filesChunk in chunkIterator) {
            if (this.dryRun && !this.createPull) {
                this.searchAndReplaceInFiles(this.search, this.replace, filesChunk);
            }

            if (this.dryRun) {
                getFullChunkUpdates(filesChunk);

                Sys.command("git", ["diff"]);
                Sys.command("git", ["checkout", this.directory]);
                return;
            }
            
            // Commands for creating, adding, and pushing the batched branches
            if (this.createPull && !this.dryRun) {
                var start = range;
                var end = range += this.chunk;
                
                if (this.branchname == null) this.error("'-b' branch flag is required when creating a pull request.");

                // var directoryName = Path.directory(this.directory).split("/").pop();
                // var branchnameRange = this.branchname + directoryName + "_batch_" + start + "_" + end;
                var branchnameRange = this.branchname + "_batch_" + start + "_" + end;
                
                if (new Process("git", ["checkout", "-b", branchnameRange, "master"]).exitCode() == 0) {
                    // Run updates now that we are on a new branch
                    getFullChunkUpdates(filesChunk);

                    new Process("git", ["commit", "-am", 'Adding update for batch $start - $end']).exitCode();
                    new Process("git", ["push", "-u", "origin", branchnameRange]).exitCode();
                    
                    var message = (this.pullRequestMessage != null) ? this.pullRequestMessage : '';

                    Hub.pullRequest(["-m", 'Update batch $start - $end', "-m", message], function(process) {
                        Sys.print(process.stdout.readAll().toString());
                        process.exitCode();
                        process.close();
                    });

                    new Process("git", ["checkout", "-"]).exitCode();
                } else {
                    this.error('Could not checkout branch \'$branchnameRange\'.');
                }
            }
        }
    }

    private function error(msg: String = ''): Void
    {
        Sys.println(msg);
        Sys.exit(1);
    }

    private function getAllFiles(directory:String, files:Array<String>): Array<String>
    {
        if (FileSystem.exists(directory)) {
            if (FileSystem.isDirectory(directory)) {
                for (file in FileSystem.readDirectory(directory)) {
                    var filePath = Path.join([directory, file]);

                    if (!FileSystem.isDirectory(filePath)) {
                        if (this.fileExtension != null) {
                            if (Path.extension(filePath) == this.fileExtension) {
                                files.push(filePath);
                            }
                        } else {
                            files.push(filePath);
                        }
                    } else {
                        this.getAllFiles(Path.addTrailingSlash(filePath), files);
                    }
                }
            } else {
                files.push(directory);
            }
        } else {
           this.error('Directory \'$directory\' does not exist');
        }

        return files;
    }

    private function getChangedFileCount(): Int
    {
        var diffProcess = new Process("git", ["diff", "--name-only"]);
        diffProcess.exitCode();
        var filesCount = diffProcess.stdout.readAll().toString().split("\n");
        trace(filesCount);
        diffProcess.close();

        return filesCount.length;
    }

    private function searchAndReplaceInFile(search: String = '', replace: String = '', filePath: String): Void
    {
        if (!FileSystem.exists(filePath)) {
            this.error('File: \'$filePath\' does not exist');
        }

        if (
            search.length == 0
            || replace.length == 0
        ) {
            this.error("Search and Replace are required");
        }

        var fileContent = File.getContent(filePath);
        var searchRegex = new EReg(search, "g");
        var newLineRegex = new EReg("\\\\n", "g"); // Clean dashes added by bash, thanks

        var updatedContent = searchRegex.replace(fileContent, newLineRegex.replace(replace, '\n'));

        try {
            File.saveContent(filePath, updatedContent);
        } catch (errorMessage: String) {
            this.error(errorMessage);
        }
    }

    private function searchAndReplaceInFiles(searches: Array<String>, replaces: Array<String>, files: Array<String>)
    {
        for (file in files) {
            for (i in 0...searches.length) {
                this.searchAndReplaceInFile(searches[i], replaces[i], file);
            }
        }
    }
}
