package src.util;

class ChunkIterator<T>
{
    var array: Array<T>;
    var chunkSize: Int;
    var index: Int = 0;

    inline public function new(array: Array<T>, chunkSize: Int)
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
