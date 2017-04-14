<?php

namespace Aaronadal\Tests\Subject\DataProvider;


use Aaronadal\Validator\Exception\ParameterNotFoundException;
use Aaronadal\Validator\Validator\DataProvider\ArrayDataProvider;

class ArrayDataProviderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ArrayDataProvider
     */
    private $dataProvider;

    public function setUp()
    {
        $this->dataProvider = new ArrayDataProvider(array('param' => 'value'));
    }

    public function testGetParameter()
    {
        $this->assertSame('value', $this->dataProvider->getParameter('param'));
        $this->assertNull($this->dataProvider->getParameter('other'));
        $this->assertSame('value', $this->dataProvider->getParameter('other', 'value'));
    }

    public function testGetParameterOrFail()
    {
        $this->assertSame('value', $this->dataProvider->getParameterOrFail('param'));

        $this->expectException(ParameterNotFoundException::class);
        $this->dataProvider->getParameterOrFail('other');
    }

    public function testGetData()
    {
        $data = array('a' => 'b', 'c' => 'd');

        $this->dataProvider->setData($data);
        $this->assertSame($data, $this->dataProvider->getData());
    }
}
