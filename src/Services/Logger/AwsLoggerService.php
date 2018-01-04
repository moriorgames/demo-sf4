<?php

namespace App\Services\Logger;

use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Maxbanton\Cwh\Handler\CloudWatch;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class AwsLoggerService implements LoggerInterface
{
    const HANDLERS = [
        ['stream' => 'info', 'level' => Logger::INFO,],
        ['stream' => 'notice', 'level' => Logger::NOTICE,],
        ['stream' => 'warning', 'level' => Logger::WARNING,],
        ['stream' => 'error', 'level' => Logger::ERROR,],
        ['stream' => 'debug', 'level' => Logger::DEBUG,],
    ];

    /**
     * @var Logger
     */
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger('PHP Logging');
        $client = CloudWatchClientFactory::create();
        $this->setHandlers($this->logger, $client);
    }

    public function emergency($message, array $context = [])
    {
        $this->logger->emergency($message, $context);
    }

    public function alert($message, array $context = [])
    {
        $this->logger->alert($message, $context);
    }

    public function critical($message, array $context = [])
    {
        $this->logger->critical($message, $context);
    }

    public function error($message, array $context = [])
    {
        $this->logger->error($message, $context);
    }

    public function warning($message, array $context = [])
    {
        $this->logger->warning($message, $context);
    }

    public function notice($message, array $context = [])
    {
        $this->logger->notice($message, $context);
    }

    public function info($message, array $context = [])
    {
        $this->logger->info($message, $context);
    }

    public function debug($message, array $context = [])
    {
        $this->logger->debug($message, $context);
    }

    public function log($level, $message, array $context = [])
    {
        $this->logger->debug($message, $context);
    }

    private function setHandlers(Logger $logger, CloudWatchLogsClient $client): void
    {
        $group = 'php-app-logs';
        $persistence = 90; // Persistence logs on 90 days.
        foreach (self::HANDLERS as $data) {
            $handler = new CloudWatch($client, $group, $data['stream'], $persistence, 10000, [], $data['level']);
            $logger->pushHandler($handler);
        }
    }
}
