package src;

@:autoBuild(src.macro.Build.build())
interface Cli {
    public function run():Void;
}