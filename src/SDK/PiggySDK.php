<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use TechShark\LaravelPiggy\Managers\PiggyManager;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyRequestInterface;

/**
 * Class PiggySDK
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class PiggySDK
{

    /**
     * @var PiggyManager
     */
    private $piggyManager;
    /**
     * @var Client
     */
    private $guzzleClient;

    /**
     * PiggySDK constructor.
     *
     * @param PiggyManager $piggyManager
     * @param Client $guzzleClient
     */
    public function __construct(PiggyManager $piggyManager, Client $guzzleClient)
    {
        $this->piggyManager = $piggyManager;
        $this->guzzleClient = $guzzleClient;
    }

    /**
     * Fire an API call.
     *
     * @param PiggyRequestInterface $SDKRequest
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function call(PiggyRequestInterface $SDKRequest): ResponseInterface
    {
        $fullUrl = $this->buildUrl($SDKRequest->getEndpoint(), $SDKRequest->getArguments(), $SDKRequest->getHttpMethod());

        $body = null;
        if (!\in_array($SDKRequest->getHttpMethod(), ['GET', 'DELETE'])) {
            $body = $SDKRequest->getArguments();
        }

        $request = new Request(
            $SDKRequest->getHttpMethod(),
            $fullUrl,
            [
                'piggy-api-key' => $this->piggyManager->getApiKey()
            ],
            $body
        );

        return $this->guzzleClient->send($request);
    }

    /**
     * Build url.
     *
     * @param string $endpoint
     * @param array $arguments
     * @param string $httpMethod
     *
     * @return string
     */
    private function buildUrl(string $endpoint, array $arguments = [], $httpMethod = 'GET'): string
    {
        $urlArguments = null;

        if (!empty($arguments) && \in_array($httpMethod, ['GET', 'DELETE'])) {
            $urlArguments = '?' . http_build_query($arguments, '', '&');
        }

        return $this->piggyManager->getBaseUrl() . $endpoint . $urlArguments;
    }
}
