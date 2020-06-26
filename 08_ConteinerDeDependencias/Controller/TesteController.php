<?php

namespace Controller;

use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request
};
use Services\Log\ILog;
use Services\Mail\IMail;

class TesteController
{
    private ILog $log;
    private IMail $mail;

    public function __construct(ILog $log, IMail $mail)
    {
        $this->log = $log;
        $this->mail = $mail;
    }

    public function teste(Request $request, Response $response, array $args): Response
    {
        $this->log->writeLog('oi');
        $this->mail->send();

        $response->getBody()->write("SUCESSO, O LOG FOI ESCRITO.");

        return $response;
    }
}
