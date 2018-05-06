<?php

namespace StaffanSelander\Tpay\Exception;

use Exception;
use Throwable;

class TpayException extends Exception
{
    /**
     * TpayException constructor.
     *
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
