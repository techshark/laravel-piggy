<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Managers;

/**
 * Class PiggyManager
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
final class PiggyManager
{
    /**
     * @var string
     */
    private $version;
    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return PiggyManager
     */
    public function setVersion(string $version): PiggyManager
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     * @return PiggyManager
     */
    public function setApiKey(string $apiKey): PiggyManager
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     * @return PiggyManager
     */
    public function setBaseUrl(string $baseUrl): PiggyManager
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }
}
