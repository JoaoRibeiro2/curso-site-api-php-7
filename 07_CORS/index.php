<?php

use Middleware\{
    CORSMiddleware,
    JsonBodyParserMiddleware
};
use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request
};
use Slim\Factory\AppFactory;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Middleware/JsonBodyParserMiddleware.php';
require_once __DIR__ . '/Middleware/CORSMiddleware.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args) {
    $payload = json_encode([
        'name' => 'Felipe Renan Vieira'
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    $response->getBody()->write($payload);

    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});

$app
    ->add(new JsonBodyParserMiddleware())
    ->add(new CORSMiddleware())
;
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);
$app->run();
