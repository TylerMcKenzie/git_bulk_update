package src.util;

class ChunkIterator
{
    var array: Array<Dynamic>;
    var chunkSize: Int;
    var index: Int = 0;

    inline public function new(array: Array<Dynamic>, chunkSize: Int)
    {
        this.array     = array;
        this.chunkSize = chunkSize;
    }

    inline public function hasNext()
    {
        return index < array.length;
    }

    inline public function next()
    {
        return array.slice(index, index += chunkSize);
    }
}
