<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Tests\CreditReceptions;

use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggySDKParameterInterface;
use TechShark\LaravelPiggy\SDK\Requests\Parameters\CreditReceptions\CreateCreditReceptionRequestParameter;

/**
 * Class SDKCreditReceptionRequestTest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class CreateCreditReceptionRequestTest extends TestCase
{

    /**
     *
     */
    public function testArguments()
    {
        $SDKCreditReceptionRequest = $this->getSDKRequestObject();

        /*
         * Assert the returned array subset
         * is of the correct format.
         */
        $this->assertArraySubset(
            [
                'shop_id' => 1,
                'purchase_amount' => 100.00,
                'email' => 'example@example.com',
                'qrcode' => null,
                'pos_transaction_id' => 'W201800001'
            ],
            $SDKCreditReceptionRequest->getArguments()
        );

        /*
         * Assert if the returned argument array doesn't
         * include extra field we do not use.
         */
        $this->assertCount(5, $SDKCreditReceptionRequest->getArguments());
    }

    /**
     *
     */
    public function testArgumentsValidation()
    {
        $SDKCreditReceptionRequest = $this->getInvalidSDKRequestObject();

        /*
         * Assert that the requirements are validated correctly.
         */
        $this->expectException(ExpectationFailedException::class);
        $SDKCreditReceptionRequest->validateRequirements();
    }

    /**
     *
     */
    public function testEndpoint()
    {
        $SDKCreditReceptionRequest = $this->getSDKRequestObject();

        $this->assertEquals('/creditreceptions/new', $SDKCreditReceptionRequest->getEndpoint());
    }

    /**
     *
     */
    public function testHttpMethod()
    {
        $SDKCreditReceptionRequest = $this->getSDKRequestObject();

        $this->assertEquals('POST', $SDKCreditReceptionRequest->getHttpMethod());
    }

    /**
     * @return PiggySDKParameterInterface
     */
    private function getSDKRequestObject(): PiggySDKParameterInterface
    {
        return new CreateCreditReceptionRequestParameter(
            1,
            100.00,
            'example@example.com',
            null,
            'W201800001',
            'POST',
            '/creditreceptions/new'
        );
    }

    /**
     * @return PiggySDKParameterInterface
     */
    private function getInvalidSDKRequestObject(): PiggySDKParameterInterface
    {
        return new CreateCreditReceptionRequestParameter(
            1,
            100.00,
            'example@example.com',
            'w0101d',
            'W201800001',
            'POST',
            '/creditreceptions/new'
        );
    }
}
