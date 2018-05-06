<?php

namespace StaffanSelander\Tests;

use ReflectionProperty;
use StaffanSelander\Tpay\Tests\Base\BaseCase;
use StaffanSelander\Tpay\Tests\Helper;
use StaffanSelander\Tpay\Tpay;
use StaffanSelander\Tpay\TpayConfiguration;

class TpayCase extends BaseCase
{
    public function test_can_be_constructed(): void
    {
        /** @var TpayConfiguration $tpayConfiguration */
        $tpayConfiguration = $this->createMock(TpayConfiguration::class);
        $tpay = new Tpay(Helper::createClient([]), $tpayConfiguration);

        $this->assertInstanceOf(Tpay::class, $tpay);
    }

    public function test_can_set_api_url(): void
    {
        /** @var TpayConfiguration $tpayConfiguration */
        $tpayConfiguration = $this->createMock(TpayConfiguration::class);
        $tpay = new Tpay(Helper::createClient([]), $tpayConfiguration);

        $tpay->setApiUrl('https://api.tpay.com/v1337');
        $property = new ReflectionProperty(Tpay::class, 'apiUrl');
        $property->setAccessible(true);

        $this->assertEquals('https://api.tpay.com/v1337', $property->getValue($tpay));
    }
}
