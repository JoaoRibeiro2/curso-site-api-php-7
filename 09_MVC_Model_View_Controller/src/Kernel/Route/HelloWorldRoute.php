<?php

namespace App\Kernel\Route;

use App\Controller\HelloController;
use Slim\App;

trait HelloWorldRoute
{
    public function buildHelloWorldRoute(App $app): App
    {
        $app->get('/', HelloController::class);

        return $app;
    }
}
