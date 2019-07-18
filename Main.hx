package;

import src.App;
import tink.cli.*;
import tink.Cli;

class Main 
{
    static public function main(): Void
    {
        Cli.process(Sys.args(), new App()).handle(function(o) {});
    }
}
