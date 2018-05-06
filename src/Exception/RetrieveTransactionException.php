<?php

namespace StaffanSelander\Tpay\Exception;

use Psr\Http\Message\ResponseInterface;
use StaffanSelander\Tpay\Error;
use Throwable;

class RetrieveTransactionException extends ResponseException
{
    /**
     * RetrieveTransactionException constructor.
     *
     * @param ResponseInterface $response
     * @param Error $error
     * @param Throwable|null $previous
     */
    public function __construct(ResponseInterface $response, Error $error, Throwable $previous = null)
    {
        parent::__construct($response, $error, $previous);
    }
}
