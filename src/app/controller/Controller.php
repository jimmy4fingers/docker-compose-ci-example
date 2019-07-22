<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Controller
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        $json = ['result' => ['itemOne' => 1234, 'itemTwo' => '4567']];
        return $response->withJson($json);
    }
}