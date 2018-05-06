<?php

namespace StaffanSelander\Tpay;

use GuzzleHttp\Client;

abstract class TpayFactory
{
    /**
     * @param TpayConfiguration $tpayConfiguration
     * @return Tpay
     */
    public static function create(TpayConfiguration $tpayConfiguration): Tpay
    {
        return new Tpay(
            new Client(),
            $tpayConfiguration
        );
    }
}
