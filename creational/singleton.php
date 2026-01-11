<?php
/*
* The Singleton design pattern is a creational pattern 
* that ensures a class has only one single instance and 
* provides a global point of access to that instance.
*/
final class Singleton {
    private static ?Singleton  $instance= null;

    private function __construct(){}

    private function __clone(){}

    public function __wakeup() : void
    {
        throw new ErrorException('Cannot Unserialized!');
    }

    public static function getInstances() : Singleton 
    {
        if(self::$instance === null){
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

}

