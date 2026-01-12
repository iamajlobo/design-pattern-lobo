<?php
/**
 * Strategy
 * The Strategy design pattern is a behavioral pattern that defines 
 * a family of algorithms, encapsulates each one, and makes them interchangeable at runtime.
 * The pattern lets the algorithm vary independently from the clients that use it.
 */

interface PaymentStrtaegy {
    public function pay(float $amount) : void;
}

class Gcasher implements PaymentStrtaegy {

    public function __construct(private string $account_no){}

    public function pay(float $amount): void
    {
        echo "You paid {$amount} using Gcash with Account Number {$this->account_no}<br>";
    }
}

class CashOnDeliver implements PaymentStrtaegy {
    public function pay(float $amount): void
    {
        echo "Cash On Delivery: Amount to received : {$amount}<br>";
    }
}

class CheckOut {
    public function __construct(private PaymentStrtaegy $strategy){}

    public function setPaymentStrategy(PaymentStrtaegy $strats) {
        $this->strategy = $strats;
    }

    public function processPayment(float $amount) : void
    {
        $this->strategy->pay($amount);
    }

}