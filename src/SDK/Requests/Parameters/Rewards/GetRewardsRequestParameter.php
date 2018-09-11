<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Parameters\Rewards;

use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;

/**
 * Class GetRewardsRequestParameter
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class GetRewardsRequestParameter implements PiggyParameterInterface
{
    /**
     * @var int
     */
    private $shopId;
    /**
     * @var string
     */
    private $httpMethod;
    /**
     * @var string
     */
    private $endpoint;

    /**
     * CustomerExistsRequestParameter constructor.
     *
     * @param int $shopId
     * @param string $httpMethod
     * @param string $endpoint
     */
    public function __construct(
        int $shopId,
        string $httpMethod = 'GET',
        string $endpoint = '/rewards'
    )
    {
        $this->shopId = $shopId;
        $this->httpMethod = $httpMethod;
        $this->endpoint = $endpoint;
    }

    /**
     * @return int
     */
    public function getShopId(): int
    {
        return $this->shopId;
    }

    /**
     * @param int $shopId
     * @return GetRewardsRequestParameter
     */
    public function setShopId(int $shopId): GetRewardsRequestParameter
    {
        $this->shopId = $shopId;
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
     * @return GetRewardsRequestParameter
     */
    public function setEndpoint(string $endpoint): GetRewardsRequestParameter
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

        return [
            'shop_id' => $this->getShopId()
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
     * @return GetRewardsRequestParameter
     */
    public function setHttpMethod(string $httpMethod): GetRewardsRequestParameter
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
