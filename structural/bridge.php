<?php
/*
* Bridge
* Decouple abstraction from implementation so both can vary independently.
*/
interface Devices {
    public function turnOn() : string;
    public function turnOff() : string;
}

class TV implements Devices {
    public function turnOn(): string
    {
        return "TV was Turn On";
    }

    public function turnOff(): string
    {
        return "TV was Turn Off";
    }
}

class Radio implements Devices {
    public function turnOn() : string
    {
        return "Radio was Turn On";
    }

    public function turnOff(): string
    {
        return "Radio was Turn Off";
    }
}

class Remote {
    public function __construct(private Devices $device){}
    public function powerOn() : string 
    {
        return $this->device->turnOn();
    }

    public function powerOff() : string
    {
        return $this->device->turnOff();
    }
}
