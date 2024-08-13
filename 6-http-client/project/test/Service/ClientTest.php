<?php

namespace AriefKarditya\PhpStandardRecommendation\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function client()
    {
        $url = 'https://en8g25yyek5as.x.pipedream.net';

        $stream = Utils::streamFor(json_encode([
            'username' => 'admin',
            'password' => 'rahasia'
        ]));

        $request = new Request(
            method: "POST",
            uri: $url,
            headers: [
                'Content-Type' => 'application/json'
            ],
            body: $stream
        );

        $client = new Client();
        $response = $client->sendRequest($request);

        TestCase::assertNotNull($response);
        TestCase::assertEquals(200, $response->getStatusCode());
    }
}
