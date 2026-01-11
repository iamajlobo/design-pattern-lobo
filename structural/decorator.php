<?php

/*
* Decorator
* Add behavior to objects dynamically without modifying the class.
*/

interface Coffee {
    public function cost() : int;
}

class BasicCoffee implements Coffee {
    public function cost() : int
    {
        return 50;
    }
}

class MilkDecorator implements Coffee {
    public function __construct(private Coffee $basic){}
    
    public function cost() : int
    {
        echo "Added Milk";
        return $this->basic->cost() + 10;
    }
}

