<?php

namespace App\Kernel;

use Slim\App;

trait Middleware
{
    /**
     * @var array<string> $middlewares
     */
    private array $middlewares = [
        \App\Middleware\JsonBodyParserMiddleware::class,
    ];

    private function buildGlobalMiddlewares(App $app): App
    {
        foreach ($this->middlewares as $middleware) {
            $app->add(new $middleware());
        }

        $app->addRoutingMiddleware();
        $app->addErrorMiddleware(
            getenv('DISPLAY_ERROR_DETAILS'),
            getenv('LOG_ERRORS'),
            getenv('LOG_ERROR_DETAILS')
        );

        return $app;
    }
}
