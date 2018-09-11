<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Parameters\Giftcards;

use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKParameterInterface;

/**
 * Class CreateGiftcardTransactionRequestParameter
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class CreateGiftcardTransactionRequestParameter implements PiggySDKParameterInterface
{
    /**
     * @var float
     */
    private $amount;
    /**
     * @var string
     */
    private $hash;
    /**
     * @var int
     */
    private $shopId;
    /**
     * @var bool
     */
    private $force;
    /**
     * @var string
     */
    private $httpMethod;
    /**
     * @var string
     */
    private $endpoint;

    /**
     * CreateGiftcardTransactionRequestParameter constructor.
     *
     * @param float $amount
     * @param string $hash
     * @param int $shopId
     * @param bool $force
     * @param string $httpMethod
     * @param string $endpoint
     */
    public function __construct(
        float $amount,
        string $hash,
        int $shopId,
        bool $force = false,
        string $httpMethod = 'POST',
        string $endpoint = '/giftcards/transactions/new'
    )
    {
        $this->amount = $amount;
        $this->hash = $hash;
        $this->shopId = $shopId;
        $this->force = $force;
        $this->httpMethod = $httpMethod;
        $this->endpoint = $endpoint;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return CreateGiftcardTransactionRequestParameter
     */
    public function setAmount(float $amount): CreateGiftcardTransactionRequestParameter
    {
        $this->amount = $amount;
        return $this;
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
     * @return CreateGiftcardTransactionRequestParameter
     */
    public function setHash(string $hash): CreateGiftcardTransactionRequestParameter
    {
        $this->hash = $hash;
        return $this;
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
     * @return CreateGiftcardTransactionRequestParameter
     */
    public function setShopId(int $shopId): CreateGiftcardTransactionRequestParameter
    {
        $this->shopId = $shopId;
        return $this;
    }

    /**
     * @return bool
     */
    public function shouldForce(): bool
    {
        return $this->force;
    }

    /**
     * @param bool $force
     * @return CreateGiftcardTransactionRequestParameter
     */
    public function setForce(bool $force): CreateGiftcardTransactionRequestParameter
    {
        $this->force = $force;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getArguments(): array
    {
        $this->validateRequirements();

        return [
            'amount' => $this->getAmount(),
            'hash' => $this->getHash(),
            'shop_id' => $this->getShopId(),
            'force' => $this->shouldForce()
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
     * @return CreateGiftcardTransactionRequestParameter
     */
    public function setHttpMethod(string $httpMethod): CreateGiftcardTransactionRequestParameter
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
     * @return CreateGiftcardTransactionRequestParameter
     */
    public function setEndpoint(string $endpoint): CreateGiftcardTransactionRequestParameter
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function validateRequirements(): bool
    {
        return true;
    }


}
