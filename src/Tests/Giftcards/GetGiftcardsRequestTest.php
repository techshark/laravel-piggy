<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Tests\Giftcards;

use PHPUnit\Framework\TestCase;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKParameterInterface;
use TechShark\LaravelPiggy\SDK\Requests\Parameters\Giftcards\GetGiftcardRequestParameter;

/**
 * Class GetGiftcardsRequestTest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class GetGiftcardsRequestTest extends TestCase
{

    /**
     *
     */
    public function testArguments()
    {
        $SDKRequestObject = $this->getSDKRequestObject();

        $this->assertArraySubset([], $SDKRequestObject->getArguments());
        $this->assertCount(0, $SDKRequestObject->getArguments());
    }

    /**
     *
     */
    public function testEndpoint()
    {
        $SDKRequestObject = $this->getSDKRequestObject();

        $this->assertEquals('/giftcards', $SDKRequestObject->getEndpoint());
    }

    /**
     *
     */
    public function testHttpMethod()
    {
        $SDKRequestObject = $this->getSDKRequestObject();

        $this->assertEquals('GET', $SDKRequestObject->getHttpMethod());
    }

    /**
     *
     */
    public function testArgumentsValidation()
    {
        $SDKRequestObject = $this->getSDKRequestObject();

        $this->assertTrue($SDKRequestObject->validateRequirements());
    }

    /**
     * @return PiggySDKParameterInterface
     */
    private function getSDKRequestObject(): PiggySDKParameterInterface
    {
        return new GetGiftcardRequestParameter();
    }
}
