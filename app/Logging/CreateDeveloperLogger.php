<?php

namespace App\Logging;

use Monolog\Handler\ChromePHPHandler;
use Monolog\Logger;

class CreateDeveloperLogger
{
    public function __invoke(array $config)
    {
        $logger = new Logger('developer_logger');
        $logger->pushHandler(new ChromePHPHandler(Logger::DEBUG));

        return $logger;
    }
}