<?php
/*
* Proxy
* The Proxy Design Pattern is a structural design pattern 
* that provides a placeholder or surrogate object to control 
* access to another object (called the real subject).
*/

interface Image {
    public function display() : void;
}

class RealImage implements Image {

    public function __construct(private string $file_name)
    {
        $this->load();
    }

    public function load() : void
    {
        echo "RealImage: Loading.... <br>";
    }

    public function display(): void
    {
        echo "RealImage: Displaying {$this->file_name} <br>";
    }
}

class ProxyImage implements Image {
    private ?RealImage $real_image = null; 

    public function __construct(private string $file_name){}

    public function display(): void
    {
        if($this->real_image === null){
            $this->real_image = new RealImage($this->file_name);
        }
        $this->real_image->display();
    }
}
