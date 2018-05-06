<?php

namespace StaffanSelander\Tpay;

class Error
{
    const MESSAGES = [
        'ERR31' => 'Access disabled',
        'ERR32' => 'Access denied (via Merchant Panel settings)',
        'ERR41' => 'Cannot create refund for this payment channel',
        'ERR42' => 'Invalid refund amount',
        'ERR43' => 'Insufficient funds to create refund',
        'ERR44' => 'Incorrect transaction title',
        'ERR45' => 'Refund amount is too high',
        'ERR51' => 'Cannot create transaction for this channel',
        'ERR52' => 'Error while creating transaction, try again later',
        'ERR53' => 'Input data error',
        'ERR54' => 'No such transaction',
        'ERR55' => 'Incorrect date format or value',
        'ERR61' => 'Invalid BLIK code or alias data format',
        'ERR62' => 'Error connecting BLIK system',
        'ERR63' => 'Invalid BLIK six-digit code',
        'ERR64' => 'Can not pay with BLIK code or alias for non BLIK transaction. Transaction was not created with BLIK (150) group parameter',
        'ERR65' => 'Incorrect transaction status - should be pending',
        'ERR66' => 'BLIK POS is not available. Try to send type parameter 0 - web purchase',
        'ERR82' => 'Given alias is non-unique',
        'ERR84' => 'Given alias has not been registered or has been deregistered',
        'ERR85' => 'Given alias section is incorrect. See BLIK examples section to check correct parameters set.',
        'ERR96' => 'Cannot create refund for this payment channel',
        'ERR97' => 'No such method',
        'ERR98' => 'Authorisation error (wrong api_key or api_password)',
        'ERR99' => 'General error'
    ];

    /**
     * @var string
     */
    protected $error;

    /**
     * Error constructor.
     *
     * @param string $error
     */
    public function __construct(string $error)
    {
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return array_key_exists($this->error, static::MESSAGES)
            ? static::MESSAGES[$this->error]
            : 'Unknown error.';
    }
}
