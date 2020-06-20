<?php

use Middleware\{
    JsonBodyParserMiddleware,
    ExampleMiddleware
};
use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request
};
use Slim\Factory\AppFactory;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Middleware/JsonBodyParserMiddleware.php';
require_once __DIR__ . '/Middleware/ExampleMiddleware.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Eu passei pelo meu próprio middleware.");

    return $response;
})->add(new ExampleMiddleware());

$app->add(new JsonBodyParserMiddleware());
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);
$app->run();
