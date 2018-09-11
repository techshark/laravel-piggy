<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Tests\Customers;

use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;
use TechShark\LaravelPiggy\SDK\Requests\Parameters\Customers\CustomerExistsRequestParameter;

/**
 * Class CustomerExistsRequestTest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class CustomerExistsRequestTest extends TestCase
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
                'email' => 'example@example.com',
                'qrcode' => null
            ],
            $SDKRequestObject->getArguments()
        );

        /*
         * Assert if the returned argument array doesn't
         * include extra field we do not use.
         */
        $this->assertCount(2, $SDKRequestObject->getArguments());
    }

    /**
     *
     */
    public function testEndpoint()
    {
        $SDKRequestObject = $this->getSDKRequestObject();

        $this->assertEquals('/customers/exist', $SDKRequestObject->getEndpoint());
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
    public function testArgumentsValidator()
    {
        $SDKRequestObject = $this->getInvalidSDKRequestObject();

        /*
         * Assert that the requirements are validated correctly.
         */
        $this->expectException(ExpectationFailedException::class);
        $SDKRequestObject->validateRequirements();
    }

    /**
     * @return PiggyParameterInterface
     */
    private function getSDKRequestObject(): PiggyParameterInterface
    {
        return new CustomerExistsRequestParameter(
            'example@example.com',
            null
        );
    }

    /**
     * @return PiggyParameterInterface
     */
    private function getInvalidSDKRequestObject(): PiggyParameterInterface
    {
        return new CustomerExistsRequestParameter(
            'example@example.com',
            'w0101d'
        );
    }
}
