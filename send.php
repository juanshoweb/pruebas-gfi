<?php

require_once  __DIR__ . '/vendor/autoload.php' ;
use  PhpAmqpLib\Connection\AMQPStreamConnection ;
use  PhpAmqpLib\Message\AMQPMessage ;

$host = 'impala.rmq.cloudamqp.com';
$port = 5672;
$user = 'yrrozddd';
$pass = 'GRD8G1Bc0cEJ7MQQtpW3IjuGtSvJCUL2';
$vhost = 'yrrozddd';
$exchange = 'router';
$queue = 'msqs';
        
$connection = new AMQPStreamConnection ($host, $port, $user, $pass, $vhost );
$channel = $connection->channel();

$channel-> queue_declare ( 'hello' , falso , falso , falso , falso );

$msg = new AMQPMessage ( '¡Hola mundo!' );
$channel->basic_publish($msg, '' , 'hello' );

echo  "[x] Enviado 'Hello World!' \ n";

$channel->close();
$connection->close();

