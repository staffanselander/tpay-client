<?php

namespace StaffanSelander\Tests;


use PHPUnit\Framework\TestCase;
use StaffanSelander\Tpay\Exception\InvalidConfigurationException;
use StaffanSelander\Tpay\TpayConfiguration;

class TpayConfigurationTest extends TestCase
{
    public function test_can_construct()
    {
        $configuration = new TpayConfiguration('merchantId', 'merchantSecret', 'apiKey', 'apiPassword');

        static::assertInstanceOf(TpayConfiguration::class, $configuration, 'Configuration should be correct class.');
        static::assertEquals('merchantId', $configuration->merchantId, 'Merchant id does not match input.');
        static::assertEquals('merchantSecret', $configuration->merchantSecret, 'Merchant secret does not match input.');
        static::assertEquals('apiKey', $configuration->apiKey, 'Api key does not match input.');
        static::assertEquals('apiPassword', $configuration->apiPassword, 'Api password does not match input.');
    }

    public function test_can_throw_exception_on_assert_valid()
    {
        $configuration = new TpayConfiguration('merchantId', '', 'apiKey', 'apiPassword');

        static::expectException(InvalidConfigurationException::class);
        $configuration->assertValid();
    }
}
