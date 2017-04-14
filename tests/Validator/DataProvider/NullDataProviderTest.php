<?php

namespace Aaronadal\Tests\Subject\DataProvider;


use Aaronadal\Validator\Exception\ParameterNotFoundException;
use Aaronadal\Validator\Validator\DataProvider\NullDataProvider;

class NullDataProviderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var NullDataProvider
     */
    private $dataProvider;

    public function setUp()
    {
        $this->dataProvider = new NullDataProvider();
    }

    public function testGetParameter()
    {
        $this->assertNull($this->dataProvider->getParameter('param'));
        $this->assertEquals('default', $this->dataProvider->getParameter('param', 'default'));
    }

    public function testGetParameterOrFail()
    {
        $this->expectException(ParameterNotFoundException::class);
        $this->dataProvider->getParameterOrFail('param');
    }
}
