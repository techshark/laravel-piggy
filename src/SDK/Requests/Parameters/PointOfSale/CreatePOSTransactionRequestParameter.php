<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Parameters\PointOfSale;

use Ramsey\Uuid\UuidInterface;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;

/**
 * Class CreatePOSTransactionRequestParameter
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class CreatePOSTransactionRequestParameter implements PiggyParameterInterface
{
    /**
     * @var int
     */
    private $shopId;
    /**
     * @var float
     */
    private $amount;
    /**
     * @var string
     */
    private $transactionId;
    /**
     * @var UuidInterface
     */
    private $terminalId;
    /**
     * @var string
     */
    private $httpMethod;
    /**
     * @var string
     */
    private $endpoint;

    /**
     * CreatePOSTransactionRequestParameter constructor.
     *
     * @param int $shopId
     * @param float $amount
     * @param string $transactionId
     * @param UuidInterface $terminalId
     * @param string $httpMethod
     * @param string $endpoint
     */
    public function __construct(
        int $shopId,
        float $amount,
        string $transactionId,
        UuidInterface $terminalId,
        string $httpMethod = 'POST',
        string $endpoint = '/pos/transaction/new'
    )
    {
        $this->shopId = $shopId;
        $this->amount = $amount;
        $this->transactionId = $transactionId;
        $this->terminalId = $terminalId;
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
     * @return CreatePOSTransactionRequestParameter
     */
    public function setShopId(int $shopId): CreatePOSTransactionRequestParameter
    {
        $this->shopId = $shopId;
        return $this;
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
     * @return CreatePOSTransactionRequestParameter
     */
    public function setAmount(float $amount): CreatePOSTransactionRequestParameter
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     * @return CreatePOSTransactionRequestParameter
     */
    public function setTransactionId(string $transactionId): CreatePOSTransactionRequestParameter
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTerminalId(): string
    {
        return $this->terminalId->toString();
    }

    /**
     * @param UuidInterface $terminalId
     * @return CreatePOSTransactionRequestParameter
     */
    public function setTerminalId(UuidInterface $terminalId): CreatePOSTransactionRequestParameter
    {
        $this->terminalId = $terminalId;
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
     * @return CreatePOSTransactionRequestParameter
     */
    public function setEndpoint(string $endpoint): CreatePOSTransactionRequestParameter
    {
        $this->endpoint = $endpoint;
        return $this;
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
     * @return CreatePOSTransactionRequestParameter
     */
    public function setHttpMethod(string $httpMethod): CreatePOSTransactionRequestParameter
    {
        $this->httpMethod = $httpMethod;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getArguments(): array
    {
        $this->validateRequirements();

        return [
            'shop_id' => $this->getShopId(),
            'amount' => $this->getAmount(),
            'transaction_id' => $this->getTransactionId(),
            'terminal_id' => $this->getTerminalId()
        ];
    }

    /**
     * @inheritdoc
     */
    public function validateRequirements(): bool
    {
        return true;
    }
}
