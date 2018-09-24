<?php
namespace App\Security;

use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

class WsseEntryPoint implements AuthenticationEntryPointInterface
{



    public function start(Request $request, AuthenticationException $authException = null)
    {
        $response = new Response();
        $response->headers->set('WWW-Authenticate', sprintf('myOwnBasic realm="%s"', $this->realmName));
        $response->setStatusCode(401);

        return $response;
    }
}
