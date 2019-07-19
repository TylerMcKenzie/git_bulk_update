package src.macro;


import haxe.macro.Context;
import haxe.macro.Expr;
import haxe.macro.ExprTools;
import haxe.macro.Type;
import haxe.macro.TypeTools;

class Build
{
    public static function build()
    {
        var args = Sys.args();
        
        var fields = Context.getBuildFields();

        for (field in fields) {
            switch (field.kind) {
                case FVar(kind, _):
                    // If not public skip field
                    if (field.access.indexOf(APublic) < 0) continue;
                    
                    var fieldValue = null;

                    for (fieldMeta in field.meta) if (fieldMeta.name == ":flag" || fieldMeta.name == ":alias") {
                        if (fieldMeta.params.length > 1) throw 'Annotation \'${fieldMeta.name}\' expects 1 parameter got ${fieldMeta.params.length} instead.';
                        var flag = ExprTools.getValue(fieldMeta.params[0]);
                        
                        var flagIndex = args.indexOf(flag);
                        if (flagIndex > -1) {
                            fieldValue = args.slice(flagIndex, flagIndex+1);
                        }
                    }

                    trace(fieldValue);

                default:
            }
        }

        var pos = Context.currentPos();

        var field:Field = {
            name: "buildField",
            access: [Access.APublic],
            kind: FieldType.FVar(macro:String, macro null),
            pos: pos
        };

        fields.push(field);
        

        return fields;
    }
}