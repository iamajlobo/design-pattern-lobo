<?php

/*
* Builder Used to Construct complex objects step by step, 
* separating construction from representation.
*/

class User {
    public function __construct(
        public string $name,
        public int $age,
        public ?string $job
    ){}
}

class UserBuilder{
    private string $name;
    private int $age;
    private ?string $job = null;

    public function setName(string $name) : self
    {
        $this->name = $name;
        return $this;
    }

    public function setAge(int $age) : self
    {
        $this->age = $age;
        return $this;
    }

    public function setJob(?string $job) : self
    {
        $this->job = $job;
        return $this;
    }

    public function build() : User
    {
        return new User(
            $this->name,
            $this->age,
            $this->job
        );
    }
}