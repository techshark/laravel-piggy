<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Parameters\Giftcards;

use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKParameterInterface;

/**
 * Class GetGiftcardDetailRequestParameter
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class GetGiftcardDetailRequestParameter implements PiggySDKParameterInterface
{

    /**
     * @var string
     */
    private $hash;
    /**
     * @var string
     */
    private $httpMethod;
    /**
     * @var string
     */
    private $endpoint;

    /**
     * GetGiftcardDetailRequestParameter constructor.
     *
     * @param string $hash
     * @param string $httpMethod
     * @param string $endpoint
     */
    public function __construct(
        string $hash,
        string $httpMethod = 'GET',
        string $endpoint = '/giftcards/details'
    )
    {
        $this->hash = $hash;
        $this->httpMethod = $httpMethod;
        $this->endpoint = $endpoint;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     * @return GetGiftcardDetailRequestParameter
     */
    public function setHash(string $hash): GetGiftcardDetailRequestParameter
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getArguments(): array
    {
        $this->validateRequirements();

        return [
            'hash' => $this->getHash()
        ];
    }

    /**
     * @inheritdoc
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * @param string $httpMethod
     * @return GetGiftcardDetailRequestParameter
     */
    public function setHttpMethod(string $httpMethod): GetGiftcardDetailRequestParameter
    {
        $this->httpMethod = $httpMethod;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     * @return GetGiftcardDetailRequestParameter
     */
    public function setEndpoint(string $endpoint): GetGiftcardDetailRequestParameter
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function validateRequirements(): bool
    {
        return true;
    }
}
