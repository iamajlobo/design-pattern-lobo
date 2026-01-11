<?php
/*
* The Singleton design pattern is a creational pattern 
* that ensures a class has only one single instance and 
* provides a global point of access to that instance.
*/
class Singleton {
    private static ?Singleton  $instance= null;

    public function getInstances() : Singleton 
    {
        if(self::$instance === null){
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

}

function main() : void
{

}

main();