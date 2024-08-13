<?php

use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Nyholm\Psr7Server\ServerRequestCreator;

require_once __DIR__ . "/../vendor/autoload.php";

$factory = new Psr17Factory();
$creator = new ServerRequestCreator($factory, $factory, $factory, $factory);

$request = $creator->fromGlobals();

$query = $request->getQueryParams();

$name = $query['name'];

$response = new Response(
    status: 200,
    headers: [
        'Content-Type' => 'application/json'
    ],
    body: $factory->createStream(json_encode(
        ['data' => 'Hello' . $name]
    ))
);

$emitter = new SapiEmitter();
$emitter->emit($response);
