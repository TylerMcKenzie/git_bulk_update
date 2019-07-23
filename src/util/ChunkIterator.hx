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
        return this.index < this.array.length;
    }

    inline public function next()
    {
        return this.getNextChunk();
    }

    inline public function getNextChunk(?chunk: Int)
    {
        var nextChunk = (chunk != null) ? chunk : this.chunkSize;
        return this.chunk(this.index, this.index += nextChunk);
    }

    inline private function chunk(start: Int, end: Int)
    {
        return this.array.slice(start, end);
    }
}
