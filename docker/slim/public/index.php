<?php

declare(strict_types=1);

use App\Application\Handlers\HttpErrorHandler;
use App\Application\Handlers\ShutdownHandler;
use App\Application\ResponseEmitter\ResponseEmitter;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;

if (!defined('ABSOLUTE_PATH')) {
    define('ABSOLUTE_PATH', dirname(__DIR__, 1));
}

require ABSOLUTE_PATH . '/vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

if (false) {
    $containerBuilder->enableCompilation(require ABSOLUTE_PATH . '/var/cache');
}

$settings = require ABSOLUTE_PATH . '/app/settings.php';
$settings($containerBuilder);

$dependencies = require ABSOLUTE_PATH . '/app/dependencies.php';
$dependencies($containerBuilder);

$repositories = require ABSOLUTE_PATH . '/app/repositories.php';
$repositories($containerBuilder);

$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();
$callableResolver = $app->getCallableResolver();

$middleware = require ABSOLUTE_PATH . '/app/middleware.php';
$middleware($app);

$routes = require ABSOLUTE_PATH . '/app/routes.php';
$routes($app);

$settings = $container->get(SettingsInterface::class);

$displayErrorDetails = $settings->get('displayErrorDetails');
$logError = $settings->get('logError');
$logErrorDetails = $settings->get('logErrorDetails');

$serverRequestCreator = ServerRequestCreatorFactory::create();
$request = $serverRequestCreator->createServerRequestFromGlobals();

$responseFactory = $app->getResponseFactory();
$errorHandler = new HttpErrorHandler($callableResolver, $responseFactory);

$shutdownHandler = new ShutdownHandler($request, $errorHandler, $displayErrorDetails);
register_shutdown_function($shutdownHandler);

$app->addRoutingMiddleware();

$app->addBodyParsingMiddleware();

$errorMiddleware = $app->addErrorMiddleware($displayErrorDetails, $logError, $logErrorDetails);
$errorMiddleware->setDefaultErrorHandler($errorHandler);

$response = $app->handle($request);
$responseEmitter = new ResponseEmitter();
$responseEmitter->emit($response);