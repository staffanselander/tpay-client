<?php

namespace StaffanSelander\Tpay;


use InvalidArgumentException;
use StaffanSelander\Tpay\Exception\InvalidConfigurationException;
use Webmozart\Assert\Assert;

class TpayConfiguration
{
    /**
     * @var string
     */
    public $merchantId;

    /**
     * @var string
     */
    public $merchantSecret;

    /**
     * @var string
     */
    public $apiKey;

    /**
     * @var string
     */
    public $apiPassword;

    /**
     * ClientConfiguration constructor.
     *
     * @param $merchantId
     * @param $merchantSecret
     * @param $apiKey
     * @param $apiPassword
     */
    public function __construct($merchantId, $merchantSecret, $apiKey, $apiPassword)
    {
        $this->merchantId = $merchantId;
        $this->merchantSecret = $merchantSecret;
        $this->apiKey = $apiKey;
        $this->apiPassword = $apiPassword;
    }

    /**
     * @throws InvalidConfigurationException
     */
    public function assertValid()
    {
        try
        {
            Assert::stringNotEmpty($this->merchantId, 'MerchantId cannot be empty.');
            Assert::stringNotEmpty($this->merchantSecret, 'MerchantSecret cannot be empty.');
            Assert::stringNotEmpty($this->apiKey, 'ApiKey cannot be empty.');
            Assert::stringNotEmpty($this->apiPassword, 'ApiPassword cannot be empty.');
        }
        catch (InvalidArgumentException $exception)
        {
            throw new InvalidConfigurationException('ClientConfiguration is not valid.', 0, $exception);
        }
    }
}
