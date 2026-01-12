<?php

/**
 * Command
 * Turn action into object so they can be queed, logged or undone
 */

interface Command {
    public function execute();
}

class Light {
    public function turnOn(){
        echo 'Turn On';
    }

    public function turnOff(){
        echo 'Turn Off';
    }
}

class LightOnCommand implements Command {
    public function __construct(private Light $light){}    

    public function execute()
    {
        $this->light->turnOn();
    }
}

class LightOffCommand implements Command {
    public function __construct(private Light $light){}    

    public function execute()
    {
        $this->light->turnOff();
    }
}

class RemoteControl {

    public function press(Command $action){
        $action->execute();
    }
}