<?php

namespace App\Kernel;

use App\Kernel\Route\HelloWorldRoute;
use DI\Container as DIContainer;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Slim\App;

class Server
{
    use Container;
    use Middleware;
    use HelloWorldRoute;

    public function __construct()
    {
        $this->configDotenv();

        $container = $this->buildContainer();
        $app = $this->buildApp($container);
        $app = $this->buildHelloWorldRoute($app);
        $app = $this->buildGlobalMiddlewares($app);
        $app->run();
    }

    private function configDotenv(): void
    {
        Dotenv::createImmutable(__DIR__ . '/../../')->load();
    }

    private function buildApp(DIContainer $container): App
    {
        AppFactory::setContainer($container);
        return AppFactory::create();
    }
}
