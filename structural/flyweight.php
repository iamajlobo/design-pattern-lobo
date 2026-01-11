<?php
/*
* The Flyweight Design Pattern is a structural pattern focused 
* on memory optimization. It achieves this by sharing common 
* (intrinsic) state between many objects instead of storing 
* duplicate data in each instance.    
*/

interface CharacterFlyweight {
    public function render(int $x, int $y) : void;
}

class Character implements CharacterFlyweight {  

    public function __construct(private string $char, private string $font){}

    public function render(int $x, int $y) : void
    {
        echo "Rendering {$this->char} in {$this->font} at position of x:{$x} and y:{$y}<br>";
    }
}

class CharacterFactory {
    private array $characters = [];

    public function getCharacters(string $char,string $font) : CharacterFlyweight
    {
        $key = $char . "_" . $font;

        if(!isset($this->characters[$key])){
            $this->characters[$key] = new Character($char,$font);
        }

        return $this->characters[$key];
    }   
}