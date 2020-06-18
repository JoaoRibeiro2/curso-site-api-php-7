<?php

use Middleware\JsonBodyParserMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/JsonBodyParserMiddleware.php';

$app = AppFactory::create();

$app->post('/operacao', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $name = $data['name'];

    $response->getBody()->write("Operacoes: Inserindo {$name}.");

    return $response;
});

$app->put('/operacao', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $id = $data['id'];
    $name = $data['name'];

    $response->getBody()->write("Alteração: Id {$id} - Nome {$name}.");

    return $response;
});

$app->patch('/operacao', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $id = $data['id'];
    $name = $data['name'];

    $response->getBody()->write("Alteração parcial: Id {$id} - Nome {$name}.");

    return $response;
});

$app->add(new JsonBodyParserMiddleware());
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);
$app->run();
