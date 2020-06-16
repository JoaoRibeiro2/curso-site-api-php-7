<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/get-route-01', function (Request $request, Response $response, array $args) {
    $params = $request->getQueryParams();
    $id = $params['id'];
    $name = $params['name'];

    $response->getBody()->write("Seja bem vindo {$name} - {$id}!");
    return $response;
});

$app->get('/get-route-02/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];

    $response->getBody()->write("Seja bem vindo {$name}!");
    return $response;
});

$app->get('/get-route-03[/{name}]', function (Request $request, Response $response, array $args) {
    $name = $args['name'];

    $response->getBody()->write($name ? "Seja bem vindo {$name}!" : "Niguém veio!");
    return $response;
});

$app->delete('/delete-route[/{name}]', function (Request $request, Response $response, array $args) {
    $params = $request->getQueryParams();
    $id = $params['id'];
    $name = $args['name'];

    $response->getBody()->write($name ? "{$name} - {$id} foi deletado!" : "Niguém foi deletado!");
    return $response;
});

$app->run();
