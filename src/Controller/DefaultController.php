<?php

namespace App\Controller;

use App\Services\Logger\AwsLoggerService;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function ping(AwsLoggerService $logger)
    {
        $logger->info('Initial test of application logging.', debug_backtrace());

        return new Response('ping');
    }
}
