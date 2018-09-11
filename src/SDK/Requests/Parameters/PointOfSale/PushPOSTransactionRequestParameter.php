<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Parameters\PointOfSale;

use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;

/**
 * Class PushPOSTransactionRequestParameter
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class PushPOSTransactionRequestParameter implements PiggyParameterInterface
{
    /**
     * @var int
     */
    private $POSTransactionId;
    /**
     * @var string
     */
    private $httpMethod;
    /**
     * @var string
     */
    private $endpoint;

    /**
     * PushPOSTransactionRequestParameter constructor.
     *
     * @param int $POSTransactionId
     * @param string $httpMethod
     * @param string $endpoint
     */
    public function __construct(
        int $POSTransactionId,
        string $httpMethod = 'POST',
        string $endpoint = '/pos/transaction/push'
    )
    {
        $this->POSTransactionId = $POSTransactionId;
        $this->httpMethod = $httpMethod;
        $this->endpoint = $endpoint;
    }

    /**
     * @return int
     */
    public function getPOSTransactionId(): int
    {
        return $this->POSTransactionId;
    }

    /**
     * @param int $POSTransactionId
     * @return PushPOSTransactionRequestParameter
     */
    public function setPOSTransactionId(int $POSTransactionId): PushPOSTransactionRequestParameter
    {
        $this->POSTransactionId = $POSTransactionId;
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
     * @return PushPOSTransactionRequestParameter
     */
    public function setEndpoint(string $endpoint): PushPOSTransactionRequestParameter
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
            'pos_transaction_id' => $this->getPOSTransactionId()
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
     * @return PushPOSTransactionRequestParameter
     */
    public function setHttpMethod(string $httpMethod): PushPOSTransactionRequestParameter
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
