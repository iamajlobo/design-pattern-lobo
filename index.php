<?php
include_once './creational/singleton.php';
include_once './creational/factory.php';
include_once './creational/abstract.factory.php';
include_once './creational/builder.php';
include_once './creational/prototype.php';

function main() : void
{
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