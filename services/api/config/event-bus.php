<?php
//
//declare(strict_types=1);
//
//use PhpAmqpLib\Connection\AMQPConnectionConfig;
//
//return [
//
//    'default' => env('EVENT_BUS_CONNECTION', 'rabbitmq'),
//
//    'connections' => [
//
//        'rabbitmq' => [
//            'driver' => 'rabbitmq',
//            'wait_timeout' => (int)env('EVENT_BUS_WAIT_TIMEOUT', 3),
//            'queue_name' => env('APP_NAME'),
//            'config' => (function (): AMQPConnectionConfig {
//                $config = new AMQPConnectionConfig();
//                $config->setHost(env('RABBITMQ_HOST'));
//                $config->setPort((int)env('RABBITMQ_PORT', 5672));
//                $config->setUser(env('RABBITMQ_USER'));
//                $config->setPassword(env('RABBITMQ_PASSWORD'));
//                return $config;
//            })(),
//        ],
//
//    ],
//
//];
