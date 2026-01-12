<?php

/**
 * Iterator
 * The Iterator pattern provides a way to access elements 
 * of a collection sequentially without exposing its underlying
 * representation. It decouples traversal logic from the collection itself.
 */

class UserIterator implements IteratorAggregate {
    private array $users= [];

    public function add(string $user) : self
    {
        $this->users[] = $user;
        return $this;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->users);
    }
}