<?php

namespace App\Tests\Feature;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use PHPUnit\Framework\TestCase;

class IndexRequestTest extends TestCase
{
    public function testPostRequest(): void
    {
        $http = new Client(['base_uri' => 'http://localhost:8001']);

        $response = $http->post('', [
            RequestOptions::JSON => [
                'message' => 'Hello world',
            ],
        ]);

        $actual = $response->getBody()->getContents();
        $expected = 'Message: Hello world';

        $this->assertEquals($expected, $actual);
    }
}
