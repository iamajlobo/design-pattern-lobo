<?php

/**
 * Observer
 * The Observer design pattern is a behavioral 
 * pattern that defines a one-to-many dependency 
 * between objects. When the state of one object 
 * (called the Subject) changes, all its dependent 
 * objects (called Observers) are automatically notified and updated.
 */

interface Observer {
    public function update(string $news) : void;
}

interface Subject {
    public function attach(Observer $observer) : void;
    public function dettach(Observer $observer) : void;
    public function notify() : void;
} 

class NewsAgency implements Subject {
    private array $observers = [];
    private string $latest_news;

    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function dettach(Observer $observer): void
    {
        $this->observers = array_filter($this->observers,fn($obs)=> $obs !== $observer);
    }

    public function setNews(string $news) : void
    {
        $this->latest_news = $news;
        $this->notify();
    }

    public function notify(): void
    {
        foreach($this->observers as $obs){
            $obs->update($this->latest_news);
        }
    }
}

class EmailSubscribers implements Observer {
    public function __construct(private string $email){}
    public function update(string $news): void
    {
        echo "Email sent to : {$this->email} <br>";
        echo "Message: <br>";
        echo $news . "<br>";
    }
}

class SMSSubscribers implements Observer {
    public function __construct(private string $phone){}
    public function update(string $news) : void
    {
        echo "SMS sent to : {$this->phone} <br>";
        echo "Message: <br>";
        echo $news . "<br>";
    }
}