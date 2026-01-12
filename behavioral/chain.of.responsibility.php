<?php

/**
 * Chain for Responsibility
 * It used to avoid using multiple if/else if/else, 
 * by passing request through a chain of handlers
 */

interface Handler {
    public function setNext(Handler $handler) : Handler;
    public function handle(array $request);
}

abstract class AbstractHandler implements Handler {
    protected ?Handler $next = null;

    public function setNext(Handler $handler): Handler
    {
        $this->next = $handler;
        return $handler;
    }
    
    public function next(array $request)
    {
        if($this->next){
           return $this->next->handle($request);
        }

        return null;
    }

}

//Concrete Handler

class AuthMiddleware extends AbstractHandler {

    public function handle(array $request)
    {
        if(!isset($request['user'])){
            echo "Unauthorized Access is Prohibited!";
        }
        return $this->next($request);
    }
}

class RoleMiddleware extends AbstractHandler {
    public function handle(array $request)
    {
        if($request['user']['role'] !== 'admin'){
            echo "Admin access only!";
        }

        return $this->next($request);
    }
}

class DashboardHandler extends AbstractHandler{
    public function handle(array $request)
    { 
        return "Access Granted";
    }
}