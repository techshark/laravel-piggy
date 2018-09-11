<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests;

use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyRequestInterface;

/**
 * Class PiggyRequest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class PiggyRequest implements PiggyRequestInterface
{
    /**
     * @var PiggyParameterInterface
     */
    private $piggySDKParameters;

    /**
     * PiggyRequest constructor.
     *
     * @param PiggyParameterInterface $piggySDKParameters
     */
    public function __construct(PiggyParameterInterface $piggySDKParameters)
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
