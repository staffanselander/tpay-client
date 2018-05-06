<?php

namespace StaffanSelander\Tpay;

use DateTime;

class RetrieveTransactionResponse
{
    /**
     * @var integer
     */
    public $result;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $errorCode;

    /**
     * @var DateTime
     */
    public $startTime;

    /**
     * @var DateTime
     */
    public $paymentTime;

    /**
     * @var DateTime
     */
    public $chargebackTime;

    /**
     * @var integer
     */
    public $channel;

    /**
     * @var boolean
     */
    public $testMode;

    /**
     * @var float
     */
    public $amount;

    /**
     * @var float
     */
    public $amountPaid;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $postalCode;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $country;

    /**
     * @var string
     */
    public $err;

    /**
     * RetrieveTransactionResponse constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->result = (integer) $response['result'];
        $this->status = (string) $response['status'];
        $this->errorCode = (string) $response['error_code'];
        $this->startTime = (string) $response['start_time'];
        $this->paymentTime = (string) $response['payment_time'];
        $this->chargebackTime = (string) $response['chargeback_time'];
        $this->channel = (integer) $response['channel'];
        $this->testMode = (boolean) $response['test_mode'];
        $this->amount = (float) $response['amount'];
        $this->amountPaid = (float) $response['amount_paid'];
        $this->name = (string) $response['name'];
        $this->email = (string) $response['email'];
        $this->address = (string) $response['address'];
        $this->postalCode = (string) $response['code'];
        $this->city = (string) $response['city'];
        $this->phone = (string) $response['phone'];
        $this->country = (string) $response['country'];
        $this->err = (string) $response['err'];
    }

    /**
     * StartTimestamp getter.
     *
     * @return DateTime
     */
    public function getStartTimestamp(): ?DateTime
    {
        return empty($this->startTime) ? null : new DateTime($this->startTime);
    }

    /**
     * PaymentTimestamp getter.
     *
     * @return DateTime
     */
    public function getPaymentTimestamp(): ?DateTime
    {
        return empty($this->paymentTime) ? null : new DateTime($this->paymentTime);
    }

    /**
     * ChargebackTimestamp getter.
     *
     * @return DateTime
     */
    public function getChargebackTimestamp(): ?DateTime
    {
        return empty($this->chargebackTime) ? null : new DateTime($this->chargebackTime);
    }

    /**
     * Error getter.
     *
     * @return Error
     */
    public function getError(): ?Error
    {
        return ! empty($this->err)
            ? new Error($this->err)
            : null;
    }
}
