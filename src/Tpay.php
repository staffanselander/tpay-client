<?php

namespace StaffanSelander\Tpay;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use StaffanSelander\Tpay\Exception\RetrieveTransactionException;

class Tpay
{
    /**
     * @var TpayConfiguration
     */
    protected $configuration;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $apiUrl;

    /**
     * Client constructor.
     *
     * @param ClientInterface $client
     * @param TpayConfiguration $configuration
     */
    public function __construct(ClientInterface $client, TpayConfiguration $configuration)
    {
        $this->configuration = $configuration;
        $this->client = $client;

        $this->setApiUrl('https://secure.tpay.com');
    }

    /**
     * Allow override of Tpay api url.
     *
     * @param string $apiUrl
     * @return $this
     */
    public function setApiUrl(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;

        return $this;
    }

    /**
     * @param $title
     * @return RetrieveTransactionResponse
     * @throws RetrieveTransactionException
     */
    public function retrieveTransaction($title)
    {
        try {
            $response = $this->request('post', "api/gw/{$this->configuration->apiKey}/transaction/get", [
                'title'        => $title,
                'api_password' => $this->configuration->apiPassword
            ]);

            $transaction = new RetrieveTransactionResponse($this->extractResponse($response));

            if ($error = $transaction->getError())
                throw new RetrieveTransactionException($response, $error);

            return $transaction;
        }
        catch (BadResponseException $responseException) {
            throw new RetrieveTransactionException($responseException->getResponse(), new Error(''), $responseException);
        }
    }

    /**
     * Extract json as array from Tpay request.
     *
     * @param ResponseInterface $response
     * @return array
     */
    protected function extractResponse(ResponseInterface $response): array
    {
        $content = $response->getBody()
            ->getContents();

        return \GuzzleHttp\json_decode($content, true);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $data
     * @return ResponseInterface
     */
    protected function request(string $method, string $url, array $data): ResponseInterface
    {
        return $this->client->request($method, "{$this->apiUrl}/{$url}", [
            RequestOptions::JSON => $data
        ]);
    }
}
