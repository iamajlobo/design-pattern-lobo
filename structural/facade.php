<?php
/*
* Facade
* Provide a simplified interface to a complex subsystem.
*/

class PlaceOrder {
    public function place(string $order) : void
    {
        echo "Queeing {$order}<br>";
    }
}

class Validator {
    public function validate(string $order) : void
    {
        echo "Validating {$order}<br>";
    }
}

class Proccessor {
    public function process(string $order) : void
    {
        echo "Processing {$order}<br>";
    }
}

class OrderFacade {
    private PlaceOrder $place_order;
    private Validator $validator;
    private Proccessor $proccessor;
    public function __construct(){
        $this->place_order = new PlaceOrder();
        $this->validator = new Validator();
        $this->proccessor =  new Proccessor();
    }

    public function makeOrder(string $order) : void
    {
        $this->place_order->place($order);
        $this->validator->validate($order);
        $this->proccessor->process($order);
        echo "Order to Ship";
    }
}    