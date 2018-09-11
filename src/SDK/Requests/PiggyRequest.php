<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests;

use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKParameterInterface;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKRequestInterface;

/**
 * Class PiggyRequest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class PiggyRequest implements PiggySDKRequestInterface
{
    /**
     * @var PiggySDKParameterInterface
     */
    private $piggySDKParameters;

    /**
     * PiggyRequest constructor.
     *
     * @param PiggySDKParameterInterface $piggySDKParameters
     */
    public function __construct(PiggySDKParameterInterface $piggySDKParameters)
    {
        $this->piggySDKParameters = $piggySDKParameters;
    }

    /**
     * @inheritdoc
     */
    public function getEndpoint(): string
    {
        return $this->piggySDKParameters->getEndpoint();
    }

    /**
     * @inheritdoc
     */
    public function getArguments(): array
    {
        $this->piggySDKParameters->validateRequirements();

        return $this->piggySDKParameters->getArguments();
    }

    /**
     * @inheritdoc
     */
    public function getHttpMethod(): string
    {
        return $this->piggySDKParameters->getHttpMethod();
    }
}
