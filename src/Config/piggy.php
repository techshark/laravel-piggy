<?php
declare(strict_types=1);

/**
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
return [
    /**
     * Which version of the piggy loyalty API the SDK should communicate with.
     *
     * Default: 1
     */
    'api_version' => env('PIGGY_API_VERSION', '1'),

    /**
     * API Key to be used by the SDK to authenticate
     * to the piggy loyalty API.
     *
     * Default: ''
     */
    'api_key' => env('PIGGY_API_KEY', ''),

    /**
     * The base endpoint to which the SDK should point the request.
     *
     * @see https://piggyloyalty.docs.apiary.io/
     *
     * Default: 'https://www.piggy.nl/api/public'
     */
    'api_base_url' => env('PIGGY_API_ENDPOINT', 'https://www.piggy.nl/api/public'),
];
