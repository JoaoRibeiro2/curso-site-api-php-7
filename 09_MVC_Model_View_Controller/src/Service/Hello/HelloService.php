<?php

namespace App\Service\Hello;

class HelloService implements IHelloService
{
    public function showMessage(): string
    {
        return "Welcome to my Slim Project";
    }
}
