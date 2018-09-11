<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Parameters\Giftcards;

use PHPUnit\Framework\ExpectationFailedException;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKParameterInterface;

/**
 * Class ChangeGiftcardExpirationDateRequestParameter
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class ChangeGiftcardExpirationDateRequestParameter implements PiggySDKParameterInterface
{
    /**
     * @var string
     */
    private $hash;
    /**
     * @var \DateTime
     */
    private $date;
    /**
     * @var string
     */
    private $httpMethod;
    /**
     * @var string
     */
    private $endpoint;

    /**
     * ChangeGiftcardExpirationDateRequestParameter constructor.
     *
     * @param string $hash
     * @param \DateTime $date
     * @param string $httpMethod
     * @param string $endpoint
     */
    public function __construct(
        string $hash,
        \DateTime $date,
        string $httpMethod = 'POST',
        string $endpoint = '/giftcards/change-expiration-date'
    )
    {
        $this->hash = $hash;
        $this->date = $date;
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
     * @return ChangeGiftcardExpirationDateRequestParameter
     */
    public function setHash(string $hash): ChangeGiftcardExpirationDateRequestParameter
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date->format('d-m-Y');
    }

    /**
     * @param \DateTime $date
     * @return ChangeGiftcardExpirationDateRequestParameter
     */
    public function setDate(\DateTime $date): ChangeGiftcardExpirationDateRequestParameter
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getArguments(): array
    {
        $this->validateRequirements();

        return [
            'hash' => $this->getHash(),
            'date' => $this->getDate()
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
     * @return ChangeGiftcardExpirationDateRequestParameter
     */
    public function setHttpMethod(string $httpMethod): ChangeGiftcardExpirationDateRequestParameter
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
     * @return ChangeGiftcardExpirationDateRequestParameter
     */
    public function setEndpoint(string $endpoint): ChangeGiftcardExpirationDateRequestParameter
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function validateRequirements(): bool
    {
        $now = new \DateTime();

        if ($now > $this->date) {
            throw new ExpectationFailedException('New expiration date should be in the future.');
        }

        return true;
    }
}
