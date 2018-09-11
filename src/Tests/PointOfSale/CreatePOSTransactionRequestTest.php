<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Tests\PointOfSale;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use TechShark\LaravelPiggy\SDK\Requests\Interfaces\PiggyParameterInterface;
use TechShark\LaravelPiggy\SDK\Requests\Parameters\PointOfSale\CreatePOSTransactionRequestParameter;

/**
 * Class CreatePOSTransactionRequestTest
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class CreatePOSTransactionRequestTest extends TestCase
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * CreatePOSTransactionRequestTest constructor.
     *
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     *
     * @throws \Exception
     */
    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->uuid = Uuid::uuid4();
    }

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
                'shop_id' => 1,
                'amount' => 100.00,
                'transaction_id' => 'w0101d',
                'terminal_id' => $this->uuid->toString()
            ],
            $SDKRequestObject->getArguments()
        );

        /*
         * Assert if the returned argument array doesn't
         * include extra field we do not use.
         */
        $this->assertCount(4, $SDKRequestObject->getArguments());
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
     *
     */
    public function testEndpoint()
    {
        $SDKRequestObject = $this->getSDKRequestObject();

        $this->assertEquals('/pos/transaction/new', $SDKRequestObject->getEndpoint());
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
     * @return PiggyParameterInterface
     */
    private function getSDKRequestObject(): PiggyParameterInterface
    {
        return new CreatePOSTransactionRequestParameter(
            1,
            100.00,
            'w0101d',
            $this->uuid
        );
    }
}
