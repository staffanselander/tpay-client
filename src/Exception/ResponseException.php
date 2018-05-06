<?php

namespace StaffanSelander\Tpay\Exception;

use Psr\Http\Message\ResponseInterface;
use StaffanSelander\Tpay\Error;
use Throwable;

class ResponseException extends TpayException
{
    /**
     * @var integer
     */
    protected $statusCode;

    /**
     * @var Error
     */
    protected $error;

    /**
     * @var array
     */
    protected $statusCodePhrase = [
        401 => 'Api password is incorrect.',
        404 => 'Invalid api key or password.'
    ];

    /**
     * ResponseException constructor.
     *
     * @param ResponseInterface $response
     * @param Error $error
     * @param Throwable|null $previous
     */
    public function __construct(ResponseInterface $response, Error $error, Throwable $previous = null)
    {
        parent::__construct($response->getReasonPhrase(), 0, $previous);

        $this->statusCode = $response->getStatusCode();
        $this->error = $error;

        if ($error->getMessage())
        {
            $this->message = $error->getMessage();
        }
    }

    /**
     * StatusCode getter.
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Error getter.
     *
     * @return Error
     */
    public function getError(): Error
    {
        return $this->error;
    }
}
