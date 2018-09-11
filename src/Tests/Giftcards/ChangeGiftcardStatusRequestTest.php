<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Tests\Giftcards;

use PHPUnit\Framework\TestCase;
use TechShark\LaravelPiggy\Enums\GiftcardStatus;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;
use TechShark\LaravelPiggy\SDK\Requests\Parameters\Giftcards\ChangeGiftcardStatusRequestParameter;

/**
 * Class ChangeGiftcardStatusRequestTest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class ChangeGiftcardStatusRequestTest extends TestCase
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
                'hash' => 'w0101d',
                'status' => 1,
            ],
            $SDKCreditReceptionRequest->getArguments()
        );

        /*
         * Assert if the returned argument array doesn't
         * include extra field we do not use.
         */
        $this->assertCount(2, $SDKCreditReceptionRequest->getArguments());
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

        $this->assertEquals('/giftcards/change-status', $SDKCreditReceptionRequest->getEndpoint());
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
        return new ChangeGiftcardStatusRequestParameter(
            'w0101d',
            new GiftcardStatus(GiftcardStatus::STATUS_ACTIVE)
        );
    }
}
