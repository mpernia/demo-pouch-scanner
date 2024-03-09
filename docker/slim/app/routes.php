<?php

declare(strict_types=1);

use App\Application\Actions\Pouch\Auth;
use App\Application\Actions\Pouch\XmlReader;
use App\Application\Middleware\AuthMiddleware;
use App\Domain\Pouch\ResponseBody;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write(ResponseBody::healthCheck());
        return $response->withHeader('Content-Type', 'application/xml');
    });

    $app->map(['GET', 'POST'],'/Data/Export/Login', function (Request $request, Response $response) {
        $xmlData = $request->getBody()->getContents();
        $xml = simplexml_load_string($xmlData);
        if (!$xml) {
            $response->getBody()->write(ResponseBody::badRequest());
            return $response->withHeader('Content-Type', 'application/xml');
        }
        if (Auth::login($xml)) {
            $response->getBody()->write(ResponseBody::accepted('c7ccdb46-89e2-4f23-861a-ed2409881266'));
        }else {
            $response->getBody()->write(ResponseBody::unauthorized());
        }
        return $response->withHeader('Content-Type', 'application/xml');
    });

    $app->group('/Data/Export', function (Group $group) {
        $group->get('/GetNotInspectedRolls/[{daysBack}]', function (Request $request, Response $response, $args) {
            $xml = XmlReader::read('rolls');
            $response->getBody()->write(ResponseBody::rolls($xml));
            return $response->withHeader('Content-Type', 'application/xml');
        });
        $group->get('/GetInProgressRolls/[{daysBack}]', function (Request $request, Response $response, $args) {
            $xml = XmlReader::read('rolls');
            $response->getBody()->write(ResponseBody::rolls($xml));
            return $response->withHeader('Content-Type', 'application/xml');
        });
        $group->get('/GetFinalizedRolls/[{daysBack}]', function (Request $request, Response $response, $args) {
            $xml = XmlReader::read('rolls');
            $response->getBody()->write(ResponseBody::rolls($xml));
            return $response->withHeader('Content-Type', 'application/xml');
        });
        $group->get('/GetRoll/[{rollId}]', function (Request $request, Response $response, $args) {
            if (!isset($args['rollId'])) {
                $response->getBody()->write(ResponseBody::notFound());
            } else {
                $xml = XmlReader::read('roll');
                $response->getBody()->write(ResponseBody::rolls($xml));
            }
            return $response->withHeader('Content-Type', 'application/xml');
        });
    })->add(new AuthMiddleware());
};
