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
    public var search: String;

    @:flag("-r")
    public var replace: String;

    @:flag("-b")
    public var branchname: String;

    @:flag("--create-pull")
    public var createPull: Bool;

    @:flag("--pull-message")
    public var pullRequestMessage: String;

    @:flag("--chunk")
    public var chunk:Int = 50;

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

        var files = this.getAllFiles(this.directory, new Array<String>());

        var range = 0;
        // var directoryName = Path.directory(this.directory).split("/").pop();

        for (filesChunk in new ChunkIterator(files, this.chunk)) {
            for (file in filesChunk) {
                this.searchAndReplaceInFile(search, replace, file);
            }
            
            // Commands for creating, adding, and pushing the batched branches
            if (this.createPull) {
                var start = range;
                var end = range += this.chunk;
                
                if (this.branchname == null) this.error("'-b' branch flag is required when creating a pull request.");

                // var branchnameRange = this.branchname + directoryName + "_batch_" + start + "_" + end;
                var branchnameRange = this.branchname + "_batch_" + start + "_" + end;
                
                if (new Process("git", ["checkout", "-b", branchnameRange, "master"]).exitCode() == 0) {
                    new Process("git", ["commit", "-am", 'Adding update for batch $start - $end']).exitCode();
                    new Process("git", ["push", "-u"]).exitCode();
                    
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
                        if (Path.extension(filePath) == this.fileExtension) {
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
}
