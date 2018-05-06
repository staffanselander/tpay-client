<?php

namespace StaffanSelander\Tpay\Tests;

use StaffanSelander\Tpay\Tests\Base\BaseCase;
use StaffanSelander\Tpay\Tpay;
use StaffanSelander\Tpay\TpayConfiguration;
use StaffanSelander\Tpay\TpayFactory;

class TpayFactoryTest extends BaseCase
{
    public function test_create_tpay_from_factory(): void
    {
        /** @var TpayConfiguration $tpayConfiguration */
        $tpayConfiguration = $this->createMock(TpayConfiguration::class);

        $tpay = TpayFactory::create($tpayConfiguration);

        $this->assertInstanceOf(Tpay::class, $tpay);
    }
}
