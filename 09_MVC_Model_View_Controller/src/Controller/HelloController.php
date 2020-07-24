<?php

namespace App\Controller;

use App\Service\Hello\IHelloService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HelloController
{
    private IHelloService $hello;

    public function __construct(IHelloService $hello)
    {
        $this->hello = $hello;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $response->getBody()->write(
            json_encode(
                ['message' => $this->hello->showMessage()],
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            )
        );
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
