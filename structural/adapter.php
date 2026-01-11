<?php

/*
* Adapter
* Convert the interface of a class into another interface clients expect.
* Makes incompatible interfaces work together.
*/

// Treat this as a third party
class GcashInterface {
    public function sendPayment(float $amount){
        echo "You paid {$amount} to PrimeWater using Gcash";
    }
}

//Implement adpater that makes it compatible to the third party
interface PaymentGateway{
    public function pay(float $amount) : void;
}

class PaymentAdapter implements PaymentGateway {
    public function __construct(private GcashInterface $gcash){}

    public function pay(float $amount) : void
    {
        echo "Using Adapter to pay<br>";
        $this->gcash->sendPayment($amount);
    }
}
