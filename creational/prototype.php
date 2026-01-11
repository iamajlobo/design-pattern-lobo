<?php

/*
* Prototype used Create new objects by cloning an 
* existing instance, rather than creating from scratch.
*/

class Document {
    public function __construct(public string $file_name,public array $content){}
}