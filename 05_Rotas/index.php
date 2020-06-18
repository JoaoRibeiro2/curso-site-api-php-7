<?php

use Middleware\JsonBodyParserMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/JsonBodyParserMiddleware.php';

$app = AppFactory::create();

// $app->get
// $app->delete
// $app->post
// $app->put
// $app->patch

$app->any('/r1', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('R1');
    return $response;
});

$app->map(['GET', 'POST'], '/r2', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('R2');
    return $response;
});

$app->group('/g1', function () use ($app) {
    $app->get('/r3', function (Request $request, Response $response, array $args) {
        $response->getBody()->write('R3');
        return $response;
    });
});

$app->redirect('/r4', '/r5', 301);

$app->add(new JsonBodyParserMiddleware());
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);
$app->run();
