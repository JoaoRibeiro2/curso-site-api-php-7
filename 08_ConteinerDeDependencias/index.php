<?php

use Controller\TesteController;
use Middleware\JsonBodyParserMiddleware;
use Slim\Factory\AppFactory;
use DI\Container;
use Services\Log\{
    ILog,
    Log
};
use Services\Mail\{
    IMail,
    Mail
};

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Middleware/JsonBodyParserMiddleware.php';
require_once __DIR__ . '/Services/Log/ILog.php';
require_once __DIR__ . '/Services/Mail/IMail.php';
require_once __DIR__ . '/Services/Log/Log.php';
require_once __DIR__ . '/Services/Mail/Mail.php';
require_once __DIR__ . '/Controller/TesteController.php';

$container = new Container();
$container->set(ILog::class, new Log());
$container->set(IMail::class, new Mail());

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->get('/', TesteController::class . ':teste');

$app->add(new JsonBodyParserMiddleware());
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);
$app->run();
