<?php

namespace App\Controller;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class DefaultController extends Controller
{
    public function welcome(Request $request, Response $response) {
        return $this->render($response, 'welcome.twig');
    }
}
