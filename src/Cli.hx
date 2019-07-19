package src;

import haxe.macro.Context;
import haxe.macro.Expr;
import haxe.macro.ExprTools;
import haxe.macro.Type;
import haxe.macro.TypeTools;

class Cli {
    public function new() {}
    public static macro function processArgs()
    {
        var cls = switch Context.getLocalType() {
            case TInst(_.get() => cls, _): cls;
            default: throw "not a class instance";
        }

        var exprs: Array<Expr> = [];
        exprs.push(macro var args = Sys.args());
        for (field in cls.fields.get()) if (field.isPublic) {
            switch (field.kind) {
                case FVar(_):
                    var flag = null;
                    
                    switch (field.meta.extract(":flag")) {
                        case [{params: params}]:
                            
                            if (params.length > 1) throw 'Annotation \':flag\' expects 1 parameter got ${params.length} instead.';

                            flag = ExprTools.getValue(params[0]);
                        default:
                    }

                    if (flag != null) {
                        var expr = macro $i{field.name} = args[args.indexOf($v{flag})+1];

                        exprs.push(expr);
                    }
                default:
            }
        }

        return macro $b{exprs};
    }
}
