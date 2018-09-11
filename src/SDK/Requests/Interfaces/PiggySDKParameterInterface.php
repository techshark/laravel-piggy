<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\SDK\Requests\Interfaces;

/**
 * Class PiggySDKParameterInterface
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
interface PiggySDKParameterInterface
{
    /**
     * Should return the endpoint to which the
     * SDK points the request.
     *
     * Example: /creditreceptions/new
     *
     * @return string
     */
    public function getEndpoint(): string;

    /**
     * Should return an array of arguments
     * the SDK should include in the API request.
     *
     * Example: ['shop_id' => 1]
     *
     * @return array
     */
    public function getArguments(): array;

    /**
     * Should return the HTTP method the
     * SDK should use for the API request.
     *
     * Example: 'GET'
     *
     * @return string
     */
    public function getHttpMethod(): string;

    /**
     * Should validate all requirements set
     * by the Piggy loyalty API on the specific
     * request.
     *
     * Example: 'Email' can only be null if 'QrCode' is not null.
     *
     * @return bool
     */
    public function validateRequirements(): bool;
}
