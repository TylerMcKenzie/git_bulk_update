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
                    var defaultValue = null;

                    switch (field.meta.extract(":flag")) {
                        case [{params: params}]:

                            if (params.length > 1) throw 'Annotation \':flag\' expects 1 parameter got ${params.length} instead.';

                            flag = ExprTools.getValue(params[0]);
                        default:
                    }

                    switch (field.meta.extract(":default")) {
                        case [{params: params}]:

                            if (params.length > 1) throw 'Annotation \':default\' expects 1 parameter got ${params.length} instead.';

                            defaultValue = ExprTools.getValue(params[0]);
                        default:
                    }

                    if (flag != null) {
                        var expr = null;

                        switch (field.type) {
                            case TAbstract(_.get() => type, _):
                                switch (type.name) {
                                    case 'Bool':
                                        expr = macro {
                                            $p{["this", field.name]} = (args.indexOf($v{ flag }) > -1);
                                        };
                                    case 'Int':
                                        expr = macro {
                                            $p{["this", field.name]} = (args.indexOf($v{ flag }) > -1) ? Std.parseInt(args[args.indexOf($v{ flag }) + 1]) : $v{ defaultValue };
                                        };
                                }

                            case TInst(_.get() => type, _):
                                switch(type.name) {
                                    case 'String':
                                        expr = macro {
                                            $p{["this", field.name]} = (args.indexOf($v{ flag }) > -1) ? args[args.indexOf($v{ flag }) + 1] : $v{ defaultValue };
                                        };
                                    case 'Array':
                                        expr = macro {
                                            $p{["this", field.name]} = [for (i in 0...args.length) if (args[i] == $v{ flag }) args[i+1]];
                                        };
                                }
                            case TType(_, _ => params):
                                switch (params) {
                                    case [TAbstract(_.get() => type, _)]:
                                        switch(type.name) {
                                            case 'Int':
                                                expr = macro {
                                                    $p{["this", field.name]} = (args.indexOf($v{ flag }) > -1) ? Std.parseInt(args[args.indexOf($v{ flag }) + 1]) : $v{ defaultValue };
                                                };
                                            case _:
                                        }
                                    case _:
                                }
                            case _:
                        }

                        if (expr != null) {
                            exprs.push(expr);
                        }
                    }
                case _:
            }
        }

        return macro $b{exprs};
    }

    public function run(): Void {}
}
