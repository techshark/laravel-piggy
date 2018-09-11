<?php

namespace TechShark\LaravelPiggy\SDK\Requests\Interfaces;

/**
 * Interface PiggySDKRequestInterface
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
interface PiggySDKRequestInterface
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
     * Ideally the arguments should be validated when calling this function.
     * @see \TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKParameterInterface::validateRequirements
     *
     * Example: ['shopId' => 1]
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
}
