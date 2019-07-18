package;

import src.App;
import src.cli.Cli;
import src.cli.Command;

class CliExt implements Command
{
    @:flag("-f")
    public var flag: String;

    public function new() {}

    public function process() {
        return 0;
    }
}

class Main 
{
    static public function main(): Void
    {
        // var app = new App();
        // app.run();
        Cli.process(Sys.args(), new CliExt());
    }
}
