<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Parameters\Shop;

use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;

/**
 * Class GetActiveShopRequestParameter
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class GetActiveShopRequestParameter implements PiggyParameterInterface
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
     * GetActiveShopRequestParameter constructor.
     *
     * @param string $httpMethod
     * @param string $endpoint
     */
    public function __construct(string $httpMethod = 'GET', string $endpoint = '/shops')
    {
        $this->httpMethod = $httpMethod;
        $this->endpoint = $endpoint;
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
     * @return GetActiveShopRequestParameter
     */
    public function setEndpoint(string $endpoint): GetActiveShopRequestParameter
    {
        $this->endpoint = $endpoint;
        return $this;
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
     * @return GetActiveShopRequestParameter
     */
    public function setHttpMethod(string $httpMethod): GetActiveShopRequestParameter
    {
        $this->httpMethod = $httpMethod;
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
