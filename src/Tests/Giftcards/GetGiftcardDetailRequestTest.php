<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Tests\Giftcards;

use PHPUnit\Framework\TestCase;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKParameterInterface;
use TechShark\LaravelPiggy\SDK\Requests\Parameters\Giftcards\GetGiftcardDetailRequestParameter;

/**
 * Class GetGiftcardDetailRequestTest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class GetGiftcardDetailRequestTest extends TestCase
{
    /**
     *
     */
    public function testArguments()
    {
        $SDKRequestObject = $this->getSDKRequestObject();

        /*
         * Assert the returned array subset
         * is of the correct format.
         */
        $this->assertArraySubset(
            [
                'hash' => 'w0101d'
            ],
            $SDKRequestObject->getArguments()
        );

        /*
         * Assert if the returned argument array doesn't
         * include extra field we do not use.
         */
        $this->assertCount(1, $SDKRequestObject->getArguments());
    }

    /**
     *
     */
    public function testEndpoint()
    {
        $SDKRequestObject = $this->getSDKRequestObject();

        $this->assertEquals('/giftcards/details', $SDKRequestObject->getEndpoint());
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
        return new GetGiftcardDetailRequestParameter(
            'w0101d'
        );
    }
}
