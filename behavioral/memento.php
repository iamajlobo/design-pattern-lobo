<?php
/**
 * Memento
 * The Memento pattern allows you to capture and store an 
 * object’s internal state at a given moment so that it can 
 * be restored later, without exposing the object’s internal details.
 */

class EditorMemento {
    public function __construct(private string $content){}

    public function getContent() : string 
    {
        return $this->content;
    }

}

class Editor {
    private string $content = "";

    public function type(string $text) : void
    {
        $this->content .= $text;
    }

    public function getContent() : string
    {
        return $this->content;
    }

    public function save() : EditorMemento
    {
        return new EditorMemento($this->content);
    }

    public function restore(?EditorMemento $memento) : void
    {
        if($memento === null){
            echo "Nothing to restore!";
            exit;
        } 
        $this->content = $memento->getContent();
    } 
}

class History {
    private array $mementos = [];

    public function push(EditorMemento $memento) : void
    {
        $this->mementos[] = $memento;
    }

    public function pop() : ?EditorMemento
    {
        return array_pop($this->mementos);
    }
}