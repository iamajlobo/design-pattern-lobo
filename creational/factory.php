<?php

/* 
* The Factory Method is a creational design pattern 
* that defines an interface for creating objects but 
* lets subclasses decide which object to instantiate.
*/

interface Notfication {
    public function notify() : string;
}

class SMSNotification implements Notfication {
    public function notify() : string
    {
        return "Notify using SMS";
    }
}

class EmailNotification implements Notfication {
    public function notify() : string
    {
        return "Notify using Email";
    }
}

class NotificationFactory {
    public function create(string $type) : Notfication
    {
        return match($type){
            'sms' => new SMSNotification(),
            'email' => new EmailNotification(),
            default => throw new InvalidArgumentException('Invalid Type')
        };
    }
}