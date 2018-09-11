<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Tests\PointOfSale;

use PHPUnit\Framework\TestCase;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKParameterInterface;
use TechShark\LaravelPiggy\SDK\Requests\Parameters\PointOfSale\PushPOSTransactionRequestParameter;

/**
 * Class PushPOSTransactionRequestTest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class PushPOSTransactionRequestTest extends TestCase
{
    /**
     *
     */
    public function testArguments()
    {
        $SDKRequestObject = $this->getSDKRequestObject();

        $this->assertArraySubset(
            [
                'pos_transaction_id' => 1
            ],
            $SDKRequestObject->getArguments()
        );
    }

    /**
     *
     */
    public function testEndpoint()
    {
        $SDKRequestObject = $this->getSDKRequestObject();

        $this->assertEquals('/pos/transaction/push', $SDKRequestObject->getEndpoint());
    }

    /**
     *
     */
    public function testHttpMethod()
    {
        $SDKRequestObject = $this->getSDKRequestObject();

        $this->assertEquals('POST', $SDKRequestObject->getHttpMethod());
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
        return new PushPOSTransactionRequestParameter(
            1
        );
    }
}
