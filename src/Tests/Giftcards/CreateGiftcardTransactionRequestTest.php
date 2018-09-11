<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Tests\Giftcards;

use PHPUnit\Framework\TestCase;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;
use TechShark\LaravelPiggy\SDK\Requests\Parameters\Giftcards\CreateGiftcardTransactionRequestParameter;

/**
 * Class CreateGiftcardTransactionRequestTest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class CreateGiftcardTransactionRequestTest extends TestCase
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
                'amount' => 100.00,
                'hash' => 'w0101d',
                'shop_id' => 1,
                'force' => false
            ],
            $SDKCreditReceptionRequest->getArguments()
        );

        /*
         * Assert if the returned argument array doesn't
         * include extra field we do not use.
         */
        $this->assertCount(4, $SDKCreditReceptionRequest->getArguments());
    }

    /**
     *
     */
    public function testArgumentsValidation()
    {
        $SDKCreditReceptionRequest = $this->getSDKRequestObject();

        $this->assertTrue($SDKCreditReceptionRequest->validateRequirements());
    }

    /**
     *
     */
    public function testEndpoint()
    {
        $SDKCreditReceptionRequest = $this->getSDKRequestObject();

        $this->assertEquals('/giftcards/transactions/new', $SDKCreditReceptionRequest->getEndpoint());
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
     * @return PiggyParameterInterface
     */
    private function getSDKRequestObject(): PiggyParameterInterface
    {
        return new CreateGiftcardTransactionRequestParameter(
            100.00,
            'w0101d',
            1
        );
    }
}
