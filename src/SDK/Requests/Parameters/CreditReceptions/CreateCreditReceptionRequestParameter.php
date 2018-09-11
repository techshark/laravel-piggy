<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Parameters\CreditReceptions;

use PHPUnit\Framework\Assert;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;

/**
 * Class PiggyCreateCreditReceptionRequestParameter
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class CreateCreditReceptionRequestParameter implements PiggyParameterInterface
{
    /**
     * @var int
     */
    private $shopId;
    /**
     * @var float
     */
    private $purchaseAmount;
    /**
     * @var null|string
     */
    private $email;
    /**
     * @var null|string
     */
    private $qrCode;
    /**
     * @var null|string
     */
    private $posTransactionId;
    /**
     * @var string
     */
    private $httpMethod;
    /**
     * @var string
     */
    private $endpoint;

    /**
     * CreateCreditReceptionRequestParameter constructor.
     *
     * @param int $shopId
     * @param float $purchaseAmount
     * @param string|null $email
     * @param string|null $qrCode
     * @param string|null $posTransactionId
     * @param string $httpMethod
     * @param string $endpoint
     */
    public function __construct(
        int $shopId,
        float $purchaseAmount,
        string $email = null,
        string $qrCode = null,
        string $posTransactionId = null,
        string $httpMethod = 'POST',
        string $endpoint = '/creditreceptions/new'
    )
    {
        $this->shopId = $shopId;
        $this->purchaseAmount = $purchaseAmount;
        $this->email = $email;
        $this->qrCode = $qrCode;
        $this->posTransactionId = $posTransactionId;
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
     * @return CreateCreditReceptionRequestParameter
     */
    public function setShopId(int $shopId): CreateCreditReceptionRequestParameter
    {
        $this->shopId = $shopId;
        return $this;
    }

    /**
     * @return float
     */
    public function getPurchaseAmount(): float
    {
        return $this->purchaseAmount;
    }

    /**
     * @param float $purchaseAmount
     * @return CreateCreditReceptionRequestParameter
     */
    public function setPurchaseAmount(float $purchaseAmount): CreateCreditReceptionRequestParameter
    {
        $this->purchaseAmount = $purchaseAmount;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     * @return CreateCreditReceptionRequestParameter
     */
    public function setEmail(string $email = null): CreateCreditReceptionRequestParameter
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getQrCode()
    {
        return $this->qrCode;
    }

    /**
     * @param null|string $qrCode
     * @return CreateCreditReceptionRequestParameter
     */
    public function setQrCode(string $qrCode = null): CreateCreditReceptionRequestParameter
    {
        $this->qrCode = $qrCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPosTransactionId()
    {
        return $this->posTransactionId;
    }

    /**
     * @param null|string $posTransactionId
     * @return CreateCreditReceptionRequestParameter
     */
    public function setPosTransactionId(string $posTransactionId = null): CreateCreditReceptionRequestParameter
    {
        $this->posTransactionId = $posTransactionId;
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
     * @return CreateCreditReceptionRequestParameter
     */
    public function setHttpMethod(string $httpMethod): CreateCreditReceptionRequestParameter
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
     * @return CreateCreditReceptionRequestParameter
     */
    public function setEndpoint(string $endpoint): CreateCreditReceptionRequestParameter
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
            'shop_id' => $this->getShopId(),
            'purchase_amount' => $this->getPurchaseAmount(),
            'email' => $this->getEmail(),
            'qrcode' => $this->getQrCode(),
            'pos_transaction_id' => $this->getPosTransactionId(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function validateRequirements(): bool
    {
        if ($this->getEmail() === null) {
            Assert::assertNotNull($this->getQrCode(), 'If customer email is null, QR code should be filled in.');
        } else {
            Assert::assertNull($this->getQrCode(), 'Customer email and QR code shouldn\'t both be filled in.');
        }

        return true;
    }
}
