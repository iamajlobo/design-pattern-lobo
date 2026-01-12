<?php

/**
 * Mediator
 * The Mediator pattern defines an object that encapsulates 
 * how a set of objects interact, promoting loose coupling by 
 * preventing objects from referring to each other explicitly.
 */

interface ChatMediator {
    public function sendMessages(string $messsage, Sender $user) : void;
}

class ChatRoom implements ChatMediator {
    private array $user = [];

    public function addUser(Sender $user) : void 
    {
        $this->user[] = $user;
    }

    public function sendMessages(string $message, Sender $sender) : void 
    {
        foreach($this->user as $user){
            if($user !== $sender){
                $user->receive($message,$sender);
            }
        }
    }
}


class Sender {
    
    public function __construct(private string $name,private ChatRoom $mediator){}

    public function send(string $message)
    {
        $this->mediator->sendMessages($message,$this);
    }

    public function receive(string $message, Sender $sender) : void
    {
        echo "{$this->name} : received from {$sender->getName()} (message) : {$message}<br>";
    }

    public function getName() : string
    {
        return $this->name;
    }
}

