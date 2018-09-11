<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Parameters\Giftcards;

use TechShark\LaravelPiggy\Enums\GiftcardStatus;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKParameterInterface;

/**
 * Class ChangeGiftcardStatusRequestParameter
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class ChangeGiftcardStatusRequestParameter implements PiggySDKParameterInterface
{
    /**
     * @var string
     */
    private $hash;
    /**
     * @var GiftcardStatus
     */
    private $giftcardStatus;
    /**
     * @var string
     */
    private $httpMethod;
    /**
     * @var string
     */
    private $endpoint;

    /**
     * ChangeGiftcardStatusRequestParameter constructor.
     *
     * @param string $hash
     * @param GiftcardStatus $giftcardStatus
     * @param string $httpMethod
     * @param string $endpoint
     */
    public function __construct(
        string $hash,
        GiftcardStatus $giftcardStatus,
        string $httpMethod = 'POST',
        string $endpoint = '/giftcards/change-status'
    )
    {
        $this->hash = $hash;
        $this->giftcardStatus = $giftcardStatus;
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
     * @return ChangeGiftcardStatusRequestParameter
     */
    public function setHash(string $hash): ChangeGiftcardStatusRequestParameter
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return int
     */
    public function getGiftcardStatus(): int
    {
        return $this->giftcardStatus->getValue();
    }

    /**
     * @param GiftcardStatus $giftcardStatus
     * @return ChangeGiftcardStatusRequestParameter
     */
    public function setGiftcardStatus(GiftcardStatus $giftcardStatus): ChangeGiftcardStatusRequestParameter
    {
        $this->giftcardStatus = $giftcardStatus;
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
            'status' => $this->getGiftcardStatus()
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
     * @return ChangeGiftcardStatusRequestParameter
     */
    public function setHttpMethod(string $httpMethod): ChangeGiftcardStatusRequestParameter
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
     * @return ChangeGiftcardStatusRequestParameter
     */
    public function setEndpoint(string $endpoint): ChangeGiftcardStatusRequestParameter
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
