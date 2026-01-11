<?php
/*
* Composite
* Treat individual objects and compositions uniformly.
*/

interface FileSystem {
    public function getSize() : int;
}

class File implements FileSystem {
    public function __construct(private int $size){}

    public function getSize(): int
    {
        return $this->size;
    }
}

class Folder implements FileSystem {
    private array $item = [];
    public function add(FileSystem $file) : void
    {
        $this->item[] = $file;
    }

    public function getSize(): int
    {
        return array_sum(array_map(fn($i)=>$i->getSize(),$this->item));
    }
}