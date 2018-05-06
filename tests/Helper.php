<?php

namespace StaffanSelander\Tpay\Tests;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\ResponseInterface;

abstract class Helper
{
    /**
     * @param ResponseInterface[] $responses
     * @return ClientInterface
     */
    public static function createClient(array $responses): ClientInterface
    {
        $handler = HandlerStack::create(
            new MockHandler($responses)
        );

        return new Client([
            'handler' => $handler
        ]);
    }
}
