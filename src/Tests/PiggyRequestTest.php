<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Tests;

use PHPUnit\Framework\TestCase;
use TechShark\LaravelPiggy\SDK\Requests\Parameters\CreditReceptions\CreateCreditReceptionRequestParameter;
use TechShark\LaravelPiggy\SDK\Requests\PiggyRequest;

/**
 * Class PiggyRequestTest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class PiggyRequestTest extends TestCase
{
    /**
     *
     */
    public function testEndpoint()
    {
        $piggyRequestObject = $this->getPiggyRequestObject();

        $this->assertEquals('/creditreceptions/new', $piggyRequestObject->getEndpoint());
    }

    /**
     *
     */
    public function testArguments()
    {
        $piggyRequestObject = $this->getPiggyRequestObject();

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
            $piggyRequestObject->getArguments()
        );

        /*
         * Assert if the returned argument array doesn't
         * include extra field we do not use.
         */
        $this->assertCount(5, $piggyRequestObject->getArguments());
    }

    /**
     *
     */
    public function testHttpMethod()
    {
        $piggyRequestObject = $this->getPiggyRequestObject();

        $this->assertEquals('POST', $piggyRequestObject->getHttpMethod());
    }

    /**
     * @return PiggyRequest
     */
    private function getPiggyRequestObject()
    {
        $piggyCreateCredutReceptionRequestParameter = new CreateCreditReceptionRequestParameter(
            1,
            100.00,
            'example@example.com',
            null,
            'W201800001'
        );


        return new PiggyRequest(
            $piggyCreateCredutReceptionRequestParameter
        );
    }
}
