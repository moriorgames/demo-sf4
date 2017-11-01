<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class PaypalController
 * @package LT\Controller
 */
class IndexController
{
    public function index()
    {
        return new Response(
            '<html><body>Success</body></html>'
        );
    }
}
