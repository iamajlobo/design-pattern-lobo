<?php

/**
 * Visitor
 * The Visitor design pattern is a behavioral pattern 
 * that separates an algorithm from the objects on which 
 * it operates. It allows you to add new operations to existing 
 * object structures without modifying their classes.
 * Structure (Conceptual Roles)
 * Visitor (Interface)
 * Declares a visit method for each element type.
 * Concrete Visitor
 * Implements operations for each element type.
 * Element (Interface)
 * Declares an accept method that takes a visitor.
 * Concrete Elements
 * Implement the accept method, calling the visitor’s method for their type.
 * Object Structure
 * A collection of elements that can be iterated to accept visitors.
 */

interface Visitor {
    public function visitBook(Book $book) : void;
    public function visitElectornics(Electronics $device) : void;
}

interface Products {
    public function accept(Visitor $visitor) : void;
}

class Book implements Products {
    public function __construct(public string $title, public float $price){}
    public function accept(Visitor $visitor): void
    {
        $visitor->visitBook($this);
    }
}

class Electronics implements Products {
    public function __construct(public string $name, public float $price){}

    public function accept(Visitor $visitor): void
    {
        $visitor->visitElectornics($this);
    }
}

class PriceCalculator implements Visitor {
    public float $total = 0;

    public function visitBook(Book $book): void
    {
        $this->total += $book->price;
    }

    public function visitElectornics(Electronics $device): void
    {
        $this->total += $device->price;
    }
}

class ShippingCalculator implements Visitor {
    public float $total = 0;

    public function visitBook(Book $book): void
    {
        $this->total += 10;
    }

    public function visitElectornics(Electronics $device): void
    {
        $this->total += 10;
    }
}