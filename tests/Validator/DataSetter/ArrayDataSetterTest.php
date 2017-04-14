<?php

namespace Aaronadal\Tests\Subject\ArrayDataSetter;


use Aaronadal\Validator\Validator\DataSetter\ArrayDataSetter;

class ArrayDataSetterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ArrayDataSetter
     */
    private $dataSetter;

    public function setUp()
    {
        $this->dataSetter = new ArrayDataSetter(array('param' => 'value'));
    }

    public function testSetParameter()
    {
        $this->assertSame('value', $this->dataSetter->getData()['param']);

        $this->dataSetter->setParameter('param', 'foo');
        $this->assertSame('foo', $this->dataSetter->getData()['param']);

        $this->dataSetter->setParameter('other', 'bar');
        $this->assertSame('bar', $this->dataSetter->getData()['other']);
    }
}
