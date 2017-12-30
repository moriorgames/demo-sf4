<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class EventController
{
    public function number(int $id)
    {
        return new Response(
            '<html><body>Event id: ' . $id . '</body></html>'
        );
    }
}
