<?php

namespace Aaronadal\Tests\Subject\DataProvider;


use Aaronadal\Tests\Fixtures\StubBean;
use Aaronadal\Validator\Exception\ParameterNotFoundException;
use Aaronadal\Validator\Validator\DataProvider\DefaultObjectDataProvider;

class DefaultObjectDataProviderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var StubBean
     */
    private $object;

    /**
     * @var DefaultObjectDataProvider
     */
    private $dataProvider;

    public function setUp()
    {
        $this->object = new StubBean('foo-value', 'bar-value', 'foo-bar-value');
        $this->dataProvider = new DefaultObjectDataProvider($this->object);
    }

    public function testGetParameter()
    {
        $this->assertSame($this->object->getFoo(), $this->dataProvider->getParameter('foo'));
        $this->assertSame($this->object->isBar(), $this->dataProvider->getParameter('bar'));
        $this->assertSame($this->object->getFooBar(), $this->dataProvider->getParameter('foo_bar'));
        $this->assertNull($this->dataProvider->getParameter('fooBar'));
        $this->assertSame('default', $this->dataProvider->getParameter('fooBar', 'default'));
    }

    public function testGetParameterOrFail()
    {
        $this->assertSame($this->object->getFoo(), $this->dataProvider->getParameterOrFail('foo'));
        $this->assertSame($this->object->isBar(), $this->dataProvider->getParameterOrFail('bar'));
        $this->assertSame($this->object->getFooBar(), $this->dataProvider->getParameterOrFail('foo_bar'));

        $this->expectException(ParameterNotFoundException::class);
        $this->dataProvider->getParameterOrFail('other');
    }

    public function testNullObject()
    {
        $this->dataProvider->setObject(null);
        $this->assertNull($this->dataProvider->getParameter('foo'));
        $this->assertSame('default', $this->dataProvider->getParameter('foo', 'default'));
    }
}
