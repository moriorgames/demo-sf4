<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function ping()
    {
        return new Response('ping');
    }
}
