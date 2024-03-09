<?php

namespace App\Application\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;
use App\Domain\Pouch\ResponseBody;

class AuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $response = $handler->handle($request);
        $token = $request->getHeaderLine('Session');
        if (!$this->isValidToken($token)) {
            $response = AppFactory::create()->getResponseFactory()->createResponse();
            $response->getBody()->write(ResponseBody::invalidToken());
            $response = $response->withHeader('Content-Type', 'application/xml')->withStatus(401);
        }
        return $response;
    }

    private function isValidToken($token): bool
    {
        $validToken = 'c7ccdb46-89e2-4f23-861a-ed2409881266';
        return $token === $validToken;
    }
}
