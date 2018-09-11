<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Parameters\Giftcards;

use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKParameterInterface;

/**
 * Class GetGiftcardRequestParameter
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class GetGiftcardRequestParameter implements PiggySDKParameterInterface
{

    /**
     * @var string
     */
    private $httpMethod;
    /**
     * @var string
     */
    private $endpoint;

    /**
     * GetGiftcardRequestParameter constructor.
     *
     * @param string $httpMethod
     * @param string $endpoint
     */
    public function __construct(
        string $httpMethod = 'GET',
        string $endpoint = '/giftcards'
    )
    {
        $this->httpMethod = $httpMethod;
        $this->endpoint = $endpoint;
    }

    /**
     * @inheritdoc
     */
    public function getArguments(): array
    {
        $this->validateRequirements();

        return [];
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
     * @return GetGiftcardRequestParameter
     */
    public function setHttpMethod(string $httpMethod): GetGiftcardRequestParameter
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
     * @return GetGiftcardRequestParameter
     */
    public function setEndpoint(string $endpoint): GetGiftcardRequestParameter
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
