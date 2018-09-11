<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Parameters\Giftcards;

use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKParameterInterface;

/**
 * Class GetGiftcardTransactionsRequestParameter
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class GetGiftcardTransactionsRequestParameter implements PiggySDKParameterInterface
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
     * GetGiftcardTransactionsRequestParameter constructor.
     *
     * @param string $hash
     * @param string $httpMethod
     * @param string $endpoint
     */
    public function __construct(
        string $hash,
        string $httpMethod = 'GET',
        string $endpoint = '/giftcards/transactions'
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
     * @return GetGiftcardTransactionsRequestParameter
     */
    public function setHash(string $hash): GetGiftcardTransactionsRequestParameter
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
     * @return GetGiftcardTransactionsRequestParameter
     */
    public function setHttpMethod(string $httpMethod): GetGiftcardTransactionsRequestParameter
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
     * @return GetGiftcardTransactionsRequestParameter
     */
    public function setEndpoint(string $endpoint): GetGiftcardTransactionsRequestParameter
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
