<?php

namespace App\Services\Logger;

use Aws\CloudWatchLogs\CloudWatchLogsClient;

class CloudWatchClientFactory
{
    public static function create(): CloudWatchLogsClient
    {
        return new CloudWatchLogsClient(
            AwsCredentialsFactory::create()
        );
    }
}
