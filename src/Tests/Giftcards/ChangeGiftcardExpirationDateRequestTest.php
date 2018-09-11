<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Tests\Giftcards;

use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;
use TechShark\LaravelPiggy\SDK\Requests\Parameters\Giftcards\ChangeGiftcardExpirationDateRequestParameter;

/**
 * Class ChangeGiftcardExpirationDateRequestTest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class ChangeGiftcardExpirationDateRequestTest extends TestCase
{

    /**
     * @throws \Exception
     */
    public function testArguments()
    {
        $SDKCreditReceptionRequest = $this->getSDKRequestObject();

        // add 1 day.
        $dateInterval = new \DateInterval('P1D');
        $newExpirationDate = (new \DateTime())->add($dateInterval);

        /*
         * Assert the returned array subset
         * is of the correct format.
         */
        $this->assertArraySubset(
            [
                'hash' => 'w0101d',
                'date' => $newExpirationDate->format('d-m-Y')
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
     * @throws \Exception
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
     * @throws \Exception
     */
    public function testEndpoint()
    {
        $SDKCreditReceptionRequest = $this->getSDKRequestObject();

        $this->assertEquals('/giftcards/change-expiration-date', $SDKCreditReceptionRequest->getEndpoint());
    }

    /**
     * @throws \Exception
     */
    public function testHttpMethod()
    {
        $SDKCreditReceptionRequest = $this->getSDKRequestObject();

        $this->assertEquals('POST', $SDKCreditReceptionRequest->getHttpMethod());
    }

    /**
     * @return PiggyParameterInterface
     * @throws \Exception
     */
    private function getSDKRequestObject(): PiggyParameterInterface
    {
        // add 1 day.
        $dateInterval = new \DateInterval('P1D');
        $newExpirationDate = (new \DateTime())->add($dateInterval);

        return new ChangeGiftcardExpirationDateRequestParameter(
            'w0101d',
            $newExpirationDate
        );
    }

    /**
     * @return PiggyParameterInterface
     * @throws \Exception
     */
    private function getInvalidSDKRequestObject(): PiggyParameterInterface
    {
        // Subtract 1 day
        $dateInterval = new \DateInterval('P1D');
        $newExpirationDate = (new \DateTime())->sub($dateInterval);

        return new ChangeGiftcardExpirationDateRequestParameter(
            'w0101d',
            $newExpirationDate
        );
    }
}
