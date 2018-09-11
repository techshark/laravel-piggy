<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Parameters\Customers;

use PHPUnit\Framework\Assert;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;

/**
 * Class CustomerExistsRequestParameter
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class CustomerExistsRequestParameter implements PiggyParameterInterface
{
    /**
     * @var null|string
     */
    private $email;
    /**
     * @var null|string
     */
    private $qrCode;
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
     * @param string|null $email
     * @param string|null $qrCode
     * @param string $httpMethod
     * @param string $endpoint
     */
    public function __construct(
        string $email = null,
        string $qrCode = null,
        string $httpMethod = 'GET',
        string $endpoint = '/customers/exist'
    )
    {
        $this->email = $email;
        $this->qrCode = $qrCode;
        $this->httpMethod = $httpMethod;
        $this->endpoint = $endpoint;
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
     * @return CustomerExistsRequestParameter
     */
    public function setEmail(string $email = null): CustomerExistsRequestParameter
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
     * @return CustomerExistsRequestParameter
     */
    public function setQrCode(string $qrCode = null): CustomerExistsRequestParameter
    {
        $this->qrCode = $qrCode;
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
     * @return CustomerExistsRequestParameter
     */
    public function setEndpoint(string $endpoint): CustomerExistsRequestParameter
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
            'email' => $this->getEmail(),
            'qrcode' => $this->getQrCode()
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
     * @return CustomerExistsRequestParameter
     */
    public function setHttpMethod(string $httpMethod): CustomerExistsRequestParameter
    {
        $this->httpMethod = $httpMethod;
        return $this;
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
