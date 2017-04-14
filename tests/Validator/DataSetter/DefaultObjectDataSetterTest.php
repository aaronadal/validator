<?php

namespace Aaronadal\Tests\Subject\DataSetter;


use Aaronadal\Tests\Fixtures\StubBean;
use Aaronadal\Validator\Exception\NullPointerException;
use Aaronadal\Validator\Exception\ParameterNotFoundException;
use Aaronadal\Validator\Validator\DataSetter\DefaultObjectDataSetter;

class DefaultObjectDataSetterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var StubBean
     */
    private $object;

    /**
     * @var DefaultObjectDataSetter
     */
    private $dataSetter;

    public function setUp()
    {
        $this->object = new StubBean('foo-value', 'bar-value', 'foo-bar-value');
        $this->dataSetter = new DefaultObjectDataSetter($this->object);
    }

    public function testSetParameter()
    {
        $this->dataSetter->setParameter('foo', 'other-foo-value');
        $this->assertSame($this->object->getFoo(), 'other-foo-value');
    }

    public function testSetUnknownParameter()
    {
        $this->expectException(ParameterNotFoundException::class);
        $this->dataSetter->setParameter('other', 'other-value');
    }

    public function testNullObject()
    {
        $this->dataSetter->setObject(null);

        $this->expectException(NullPointerException::class);
        $this->dataSetter->setParameter('other', 'other-value');
    }
}
