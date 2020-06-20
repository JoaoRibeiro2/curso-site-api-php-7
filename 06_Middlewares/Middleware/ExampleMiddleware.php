<?php

namespace Middleware;

use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request
};
use Psr\Http\Server\{
    MiddlewareInterface,
    RequestHandlerInterface as RequestHandler
};
use Slim\Psr7\Response as ResponseClass;

class ExampleMiddleware implements MiddlewareInterface
{
    /**
     * Example middleware
     *
     * @param Request $request PSR-7 request
     * @param RequestHandler $handler PSR-15 request handler
     *
     * @return Response
     */
    public function process(Request $request, RequestHandler $handler): Response
    {
        $ok = true;

        if ($ok) {
            $response = $handler->handle($request);
        } else {
            $response = new ResponseClass();
            $response->getBody()->write("FORBIDDEN");
        }

        return $response;
    }
}
