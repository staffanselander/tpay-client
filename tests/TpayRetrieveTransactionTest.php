<?php

namespace StaffanSelander\Tpay\Tests;


use GuzzleHttp\Psr7\Response;
use StaffanSelander\Tpay\RetrieveTransactionResponse;
use StaffanSelander\Tpay\Tests\Base\BaseCase;
use StaffanSelander\Tpay\Tpay;
use StaffanSelander\Tpay\TpayConfiguration;

class TpayRetrieveTransactionTest extends BaseCase
{
    public function test_retrieve_transaction_can_return_transaction_response_on_success()
    {
        /** @var TpayConfiguration $configuration */
        $configuration = $this->createMock(TpayConfiguration::class);
        $tpay = new Tpay(Helper::createClient([
            new Response(200, [], file_get_contents(__DIR__ . '/Response/retrieve_transaction_successful.json'))
        ]), $configuration);

        $transaction = $tpay->retrieveTransaction('TR-BRA-KGZK0X');
        $this->assertInstanceOf(RetrieveTransactionResponse::class, $transaction);
    }

    public function test_retrieve_transaction_can_throw_exception_on_a_bad_request()
    {
        /** @var TpayConfiguration $configuration */
        $configuration = $this->createMock(TpayConfiguration::class);
        $tpay = new Tpay(Helper::createClient([
            new Response(200, [], file_get_contents(__DIR__ . '/Response/retrieve_transaction_with_error.json'))
        ]), $configuration);

        $transaction = $tpay->retrieveTransaction('TR-BRA-KGZK0X');
        $this->assertInstanceOf(RetrieveTransactionResponse::class, $transaction);
    }

}
