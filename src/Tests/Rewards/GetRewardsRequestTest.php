<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Tests\Rewards;

use PHPUnit\Framework\TestCase;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;
use TechShark\LaravelPiggy\SDK\Requests\Parameters\Rewards\GetRewardsRequestParameter;

/**
 * Class GetRewardsRequestTest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class GetRewardsRequestTest extends TestCase
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
                'shop_id' => 1
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

        $this->assertEquals('/rewards', $SDKRequestObject->getEndpoint());
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
     * @return PiggyParameterInterface
     */
    private function getSDKRequestObject(): PiggyParameterInterface
    {
        return new GetRewardsRequestParameter(
            1
        );
    }
}
