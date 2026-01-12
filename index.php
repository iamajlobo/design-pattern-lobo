<?php
// Creational
include_once './creational/singleton.php';
include_once './creational/factory.php';
include_once './creational/abstract.factory.php';
include_once './creational/builder.php';
include_once './creational/prototype.php';

// Structural
include_once './structural/adapter.php';
include_once './structural/bridge.php';
include_once './structural/composite.php';
include_once './structural/decorator.php';
include_once './structural/facade.php';
include_once './structural/flyweight.php';
include_once './structural/proxy.php';

// Behavioral
include_once './behavioral/chain.of.responsibility.php';
include_once './behavioral/command.php';
include_once './behavioral/interpreter.php';
include_once './behavioral/iterator.php';
include_once './behavioral/mediator.php';
include_once './behavioral/memento.php';
include_once './behavioral/observer.php';
include_once './behavioral/state.php';
include_once './behavioral/strategy.php';
include_once './behavioral/template.method.php';
include_once './behavioral/visitor.php';


/* =======================
   CREATIONAL PATTERNS
   ======================= */

function singleton() : void
{
    // Singleton
    $instance1 = Singleton::getInstances();
    $instance2 = Singleton::getInstances();
    //dd($instance1 === $instance2); // This will display bool(true)

    $s1 = serialize($instance1);
    //unserialize($s1); // Throws an error because you cannot unserialize it
}
singleton();


function factory() : void
{
    // Factory
    $factory1 = new NotificationFactory();
    $instance3 = $factory1->create('email');
    //dd($instance3->notify());
}
factory();


function abstractFactory() : void
{
    // Abstract Factory
    $dark = new DarkUIFactory();
    $light = new LightUIFactory();

    //renderUi($dark);
    //renderUi($light);
}
abstractFactory();


function builder() : void
{
    // Builder
    $user1 = (new UserBuilder())
                ->setName('Aj Lobo')
                ->setAge(21)
                ->setJob('Student')
                ->build();
    //dd($user1);
}
builder();


function prototype() : void
{
    // Prototype
    $prototype = new Document('Sample',['Alexander','JErome']);
    $clone = clone $prototype;
    //dd($clone,$prototype);
}
prototype();


function renderUi(UIFactory $factory) : void
{
    $btn = $factory->createButton();
    $cbx = $factory->createCheckbox();

    $btn->render();
    $cbx->render();
}


/* =======================
   STRUCTURAL PATTERNS
   ======================= */

function adapter() : void
{
    $adaptee = new GcashInterface();
    $adapter = new PaymentAdapter($adaptee);
    //$adapter->pay(200.25);
}
adapter();


function bridge() : void
{
    $remoteTv = new Remote(new TV());
    $remoteRadio = new Remote(new Radio());

    //dd($remoteTv->powerOn());
    //dd($remoteRadio->powerOff());
}
bridge();


function composite() : void
{
    $f1 = new File(12);
    $f2 = new File(5);

    $fr1 = new Folder();
    $fr1->add($f1);
    $fr1->add($f2);

    $fr2 = new Folder();
    $fr2->add($fr1);

    //dd($fr2->getSize());
}
composite();


function decorator() : void
{
    $coffee = new BasicCoffee();
    $decorator = new MilkDecorator($coffee);

    //echo "Price of Regular Coffee : {$coffee->cost()}<br>";
    //echo "Price of Coffee with Milk : {$decorator->cost()}";
}
decorator();


function facade() : void
{
    $facade = new OrderFacade();
    //$facade->makeOrder('Toy Car');
}
facade();


function flyweight() : void
{
    $text = "Alexander";
    $x = 0;
    $flyweight = new CharacterFactory();

    // foreach(str_split($text) as $t){
    //     $char = $flyweight->getCharacters($t, 'Arial');
    //     $char->render($x,0);
    //     $x+=2;
    // }
}
flyweight();


function proxy() : void
{
    $proxy = new ProxyImage('lobo.png');
    //$proxy->display();
    //$proxy->display();
}
proxy();


/* =======================
   BEHAVIORAL PATTERNS
   ======================= */

function chainOfResponsibility() : void
{
    $auth = new AuthMiddleware();
    $role = new RoleMiddleware();
    $dashboard = new DashboardHandler();

    $auth->setNext($role)->setNext($dashboard);

    $request = [
        'user' => ['id' => 1, 'role'=>'admin']
    ];

    $response = $auth->handle($request);
    //dd($response);
}
chainOfResponsibility();


function command() : void
{
    $light = new Light();
    $commandOn = new LightOnCommand($light);
    $commandOff = new LightOffCommand($light);

    $remote = new RemoteControl();
    //$remote->press($commandOn);
    //$remote->press($commandOff);
}
command();


function interpreter() : void
{
    $result = new AddExpression(
        new NumberExpression(5),
        new NumberExpression(10)
    );
    //echo $result->interpret();
}
interpreter();


function iterator() : void
{
    $iter = new UserIterator();
    $iter->add('Aj')->add('Lobo')->add('Sagun');

    // foreach($iter as $i){
    //     echo $i . PHP_EOL;
    // }
}
iterator();


function mediator() : void
{
    $chatroom = new ChatRoom;

    $aj = new Sender('Aj', $chatroom);
    $matheo = new Sender('Matheo',$chatroom);

    $chatroom->addUser($aj);
    $chatroom->addUser($matheo);

    //$aj->send('Ako si Aj');
    //$matheo->send('Ako si Matheo');
}
mediator();


function memento() : void
{
    $editor = new Editor();
    $history = new History();

    $editor->type('Ako');
    $history->push($editor->save());

    $editor->type('si');
    $history->push($editor->save());

    $editor->type('Alexander');
    $history->push($editor->save());

    $editor->restore($history->pop());
    $editor->restore($history->pop());
    $editor->restore($history->pop());
}
memento();


function observer() : void
{
    $newsAgency = new NewsAgency();

    $emailUser = new EmailSubscribers('user@example.com');
    $smsUser   = new SMSSubscribers('09123456789');

    $newsAgency->attach($emailUser);
    $newsAgency->attach($smsUser);

    //$newsAgency->setNews('Breaking News: Observer Pattern Explained!');
}
observer();


function state() : void
{
    $document = new Documents(new DraftState());

    // $document->edit();     
    // $document->publish();  

    // $document->edit();     
    // $document->publish();  

    // $document->edit();
    // $document->publish();
}
state();


function strategy() : void
{
    $checkout = new Checkout(new Gcasher('4111-1111-1111-1111'));
    //$checkout->processPayment(8000);

    $checkout->setPaymentStrategy(new CashOnDeliver());
    //$checkout->processPayment(800);
}
strategy();


function templateMethod() : void
{
    $pdf = new PDFReport();
    //$pdf->generate();

    $html = new HTMLReport();
    //$html->generate();
}
templateMethod();


function visitor() : void
{
    $products = [
        new Book("Design Patterns Book", 50),
        new Electronics("Headphones", 150),
        new Book("PHP Cookbook", 40)
    ];

    $priceCal = new PriceCalculator();
    foreach($products as $p){
        $p->accept($priceCal);
    }
    echo "Total from PriceCalculator: {$priceCal->total}" . PHP_EOL;

    $shippingCal = new ShippingCalculator();
    foreach($products as $p){
        $p->accept($shippingCal);
    }
    echo "Total from ShippingCalculator: {$shippingCal->total}" . PHP_EOL;
}
visitor();
