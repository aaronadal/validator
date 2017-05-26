<?php

namespace Aaronadal\Tests\Subject\DataProvider;


use Aaronadal\Tests\Fixtures\StubBean;
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
        $bean               = new StubBean('foo', 'bar', 'boo-bar');
        $array              = array('foo' => 'array-foo', 'bar' => 'array-bar', 'boo-bar' => 'array-foo-bar');
        $array['array']     = array(
            'foo'     => 'inner-array-foo',
            'bar'     => 'inner-array-bar',
            'boo-bar' => 'inner-array-foo-bar',
        );
        $this->dataProvider = new ArrayDataProvider(array('param' => 'value', 'bean' => $bean, 'array' => $array));
    }

    public function testGetParameter()
    {
        $this->assertSame('value', $this->dataProvider->getParameter('param'));
        $this->assertNull($this->dataProvider->getParameter('other'));
        $this->assertSame('value', $this->dataProvider->getParameter('other', 'value'));
    }

    public function testGetRecursiveArrayParameter()
    {
        $this->assertSame('array-foo', $this->dataProvider->getParameter('array[foo]'));
        $this->assertSame('inner-array-foo', $this->dataProvider->getParameter('array[array][foo]'));
        $this->assertNull($this->dataProvider->getParameter('array[other]'));
        $this->assertNull($this->dataProvider->getParameter('array[array][array][foo]'));
        $this->assertSame('default', $this->dataProvider->getParameter('array[other]', 'default'));
    }

    public function testGetRecursiveObjectParameter()
    {
        // Property.
        $this->assertSame('foo', $this->dataProvider->getParameter('bean#property'));
        // Getter.
        $this->assertSame('foo', $this->dataProvider->getParameter('bean#foo'));
        // Isser.
        $this->assertSame('bar', $this->dataProvider->getParameter('bean#bar'));
        // Multiple.
        $this->assertSame('inner-foo', $this->dataProvider->getParameter('bean#inner#foo'));
        $this->assertNull($this->dataProvider->getParameter('bean#inner#inner#foo'));
        // Private property and getter.
        $this->assertNull($this->dataProvider->getParameter('bean#private'));
        // Missing.
        $this->assertNull($this->dataProvider->getParameter('bean#other'));
        // Default.
        $this->assertSame('default', $this->dataProvider->getParameter('bean#other', 'default'));
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
