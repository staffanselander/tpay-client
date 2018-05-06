<?php

namespace StaffanSelander\Tpay\Tests;

use DateTime;
use PHPUnit\Framework\Constraint\IsType;
use StaffanSelander\Tpay\Error;
use StaffanSelander\Tpay\RetrieveTransactionResponse;
use StaffanSelander\Tpay\Tests\Base\BaseCase;

class TpayRetrieveTransactionResponseTest extends BaseCase
{
    public function test_transaction_successful_column_types(): void
    {
        $response = new RetrieveTransactionResponse($this->getResponseData());

        $this->assertInternalType(IsType::TYPE_INT, $response->result);
        $this->assertInternalType(IsType::TYPE_STRING, $response->status);
        $this->assertInternalType(IsType::TYPE_STRING, $response->errorCode);
        $this->assertInternalType(IsType::TYPE_STRING, $response->startTime);
        $this->assertInternalType(IsType::TYPE_STRING, $response->paymentTime);
        $this->assertInternalType(IsType::TYPE_STRING, $response->chargebackTime);
        $this->assertInternalType(IsType::TYPE_INT, $response->channel);
        $this->assertInternalType(IsType::TYPE_BOOL, $response->testMode);
        $this->assertInternalType(IsType::TYPE_FLOAT, $response->amount);
        $this->assertInternalType(IsType::TYPE_FLOAT, $response->amountPaid);
        $this->assertInternalType(IsType::TYPE_STRING, $response->name);
        $this->assertInternalType(IsType::TYPE_STRING, $response->email);
        $this->assertInternalType(IsType::TYPE_STRING, $response->address);
        $this->assertInternalType(IsType::TYPE_STRING, $response->postalCode);
        $this->assertInternalType(IsType::TYPE_STRING, $response->city);
        $this->assertInternalType(IsType::TYPE_STRING, $response->phone);
        $this->assertInternalType(IsType::TYPE_STRING, $response->country);
        $this->assertInternalType(IsType::TYPE_STRING, $response->err);
    }

    public function test_transaction_successful_dates_getters(): void
    {
        $response = new RetrieveTransactionResponse($this->getResponseData());

        $this->assertInstanceOf(DateTime::class, $response->getStartTimestamp());
        $this->assertInstanceOf(DateTime::class, $response->getPaymentTimestamp());
        $this->assertInstanceOf(DateTime::class, $response->getChargebackTimestamp());
    }

    public function test_transaction_successful_date_time_null(): void
    {
        $data = $this->getResponseData();
        $data['start_time'] = '';
        $data['payment_time'] = '';
        $data['chargeback_time'] = '';

        $response = new RetrieveTransactionResponse($data);

        $this->assertNull($response->getStartTimestamp());
        $this->assertNull($response->getPaymentTimestamp());
        $this->assertNull($response->getChargebackTimestamp());
    }

    public function test_transaction_error_as_when_no_error_is_found(): void
    {
        $response = new RetrieveTransactionResponse($this->getResponseData());

        $this->assertNull($response->getError());
    }

    public function test_transaction_error_when_error_is_provided(): void
    {
        $data = $this->getResponseData();
        $data['err'] = 'ERR99';

        $response = new RetrieveTransactionResponse($data);

        $this->assertInstanceOf(Error::class, $response->getError());
    }

    /**
     * @return mixed
     */
    protected function getResponseData(): array
    {
        return \GuzzleHttp\json_decode(
            file_get_contents(__DIR__ . '/Response/retrieve_transaction_successful.json'), true
        );
    }
}
