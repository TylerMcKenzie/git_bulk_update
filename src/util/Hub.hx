package src.util;

import haxe.io.Path;
import haxe.macro.Context;
import haxe.macro.Expr;

import sys.io.Process;
import sys.FileSystem;

class Hub
{
    static public var HUB_COMMAND_PATH = getCommandPath();

    static public function pullRequest(args: Array<String>, callBack: Process->Void) : Void
    {
        var process = new Process(HUB_COMMAND_PATH, ["pull-request"].concat(args));

        callBack(process);
    }

    static private function getCommandPath(): String
    {
        return Path.normalize(Path.join([Sys.programPath(), "../../../hub/bin/hub"]));
    }
}