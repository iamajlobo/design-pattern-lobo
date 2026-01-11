<?php
//Creational
include_once './creational/singleton.php';
include_once './creational/factory.php';
include_once './creational/abstract.factory.php';
include_once './creational/builder.php';
include_once './creational/prototype.php';

//Structural
include_once './structural/adapter.php';
include_once './structural/bridge.php';
include_once './structural/composite.php';
include_once './structural/decorator.php';
include_once './structural/facade.php';
include_once './structural/flyweight.php';
include_once './structural/proxy.php';


function main() : void
{
    /*
    * CREATIONAL:
    * [1] Singleton  
    * [2] Factory
    * [3] Abstract Factory
    * [4] Factory
    * [5] Prototype
    */
    // Singleton
    $instance1 = Singleton::getInstances();
    $instance2 = Singleton::getInstances();
    //dd($instance1 === $instance2); // This will display bool(true)

    $s1 = serialize($instance1);
    //unserialize($s1); // This Throw an error because you cannot unserialize it

    //Factory
    $factory1 = new NotificationFactory();
    $instance3 = $factory1->create('email');
    //dd($instance3->notify());
    
    //Abstract Factory
    $dark = new DarkUIFactory();
    $light = new LightUIFactory();

    //renderUi($dark);
    //renderUi($light);

    //Builder
    $user1 = (new UserBuilder())->setName('Aj Lobo')
                                ->setAge(21)
                                ->setJob('Student')
                                ->build();
                                
    //dd($user1); 
    
    //Prototype
    $prototype = new Document('Sample',['Alexander','JErome']);

    $clone = clone $prototype;
    //dd($clone,$prototype);

    /*
    * Structural:
    * [1] Adapter  
    * [2] Bridge
    * [3] Composite
    * [4] Decorator
    * [5] Flyweight
    * [6] Proxy
    * [7] Facade   
    */

    // Adapater
    $adaptee = new GcashInterface();
    $adapter = new PaymentAdapter($adaptee);
    //$adapter->pay(200.25);

    //Bridge
    $remote = new Remote(new TV());
    $remote1 = new Remote(new Radio());

    //dd($remote->powerOn());
    //dd($remote1->powerOff());

    //Compopsite
    $f1 = new File(12);
    $f2 = new File(5);

    $fr1 = new Folder();
    $fr1->add($f1);
    $fr1->add($f2);

    $fr2 = new Folder();
    $fr2->add($fr1);

    //dd($fr2->getSize());

    //Decorator
    $coffee = new BasicCoffee();
    $decorator = new MilkDecorator($coffee);
    //echo "Price of Regular Coffee : {$coffee->cost()}<br>";
    //echo "Price of Coffee with Milk : {$decorator->cost()}";

    //Facade
    $facade = new OrderFacade();
    //$facade->makeOrder('Toy Car');

    //Flyweight
    $text = "Alexander";
    $x = 0;
    $flyweight = new CharacterFactory();
    
    // foreach(str_split($text) as $t){
    //     $char = $flyweight->getCharacters($t, 'Arial');
    //     $char->render($x,0);
    //     $x+=2;
    // }

    //Proxy
    $proxy = new ProxyImage('lobo.png');
    $proxy->display();
    $proxy->display();
}

main();


function renderUi(UIFactory $factory) :void
{
    $darkBtn = $factory->createButton();
    $darkCbx = $factory->createCheckbox();

    $darkBtn->render();
    $darkCbx->render();
}

function dd(...$vars){
    foreach($vars as $var){
        echo "<pre style='background-color:black; color:red; padding:20px; margin-left:10px; display:inline-block;'>";
            var_dump($var);    
        echo "</pre>";
    }

}