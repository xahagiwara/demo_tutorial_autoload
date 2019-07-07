<?php

use MyApp\php\UserLogin;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require dirname(__DIR__) . '/vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new UserLogin()
        )
    ),
    8080
);
echo "Start UserLogin Server!!\n\n";

$server->run();