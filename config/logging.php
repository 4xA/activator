<?php

use Monolog\Handler\StreamHandler;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'name' => env('APP_NAME') . '-' . env('APP_ENV'),
            'channels' => ['single', 'mail', 'developer'],
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'tap' => [\App\Logging\CustomizeFormatter::class],
            'level' => 'debug',
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => 'debug',
            'days' => 7,
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => 'Laravel Log',
            'emoji' => ':boom:',
            'level' => 'critical',
        ],

        'stderr' => [
            'driver' => 'monolog',
            'handler' => StreamHandler::class,
            'with' => [
                'stream' => 'php://stderr',
            ],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level' => 'debug',
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => 'debug',
        ],

        'mail' => [
            'driver' => 'monolog',
            'handler' => \Monolog\Handler\SwiftMailerHandler::class,
            'formatter' => \Monolog\Formatter\HtmlFormatter::class,
            'level' => 'critical',
            'with' => [
                'mailer' => new Swift_Mailer((new Swift_SmtpTransport(
                    env('MAIL_HOST'), env('MAIL_PORT')
                ))->setUsername(env('MAIL_USERNAME'))->setPassword(env('MAIL_PASSWORD'))),
                'message' => (new Swift_Message('Critical Error on activator.localdev'))
                                ->setFrom(['noreply-activator@activator.com' => 'Activator Notifcations'])
                                ->setTo(['asa0abbad@gmail.com' => 'Asa Abbad'])
                                ->setBody('Critical Error Message', 'text/html'),
                'level' => \Monolog\Logger::CRITICAL
            ]
        ],

        'developer' => [
            'driver' => 'custom',
            'via' => \App\Logging\CreateDeveloperLogger::class
        ]
    ],

];
