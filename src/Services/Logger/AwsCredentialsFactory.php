<?php

namespace App\Services\Logger;

class AwsCredentialsFactory
{
    /**
     * In environment variables we trust.
     *
     * @return array
     */
    public static function create(): array
    {
        return [
            'region'      => getenv('AWS_ZONE'),
            'version'     => 'latest',
            'credentials' => [
                'key'    => getenv('AWS_CREDENTIALS_KEY'),
                'secret' => getenv('AWS_CREDENTIALS_SECRET'),
            ],
        ];
    }
}
