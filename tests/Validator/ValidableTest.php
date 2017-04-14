<?php

namespace Aaronadal\Tests\Validator;


use Aaronadal\Validator\Subject\SubjectInterface;
use Aaronadal\Validator\Validator\DataProvider\DataProviderInterface;
use Aaronadal\Validator\Validator\DataSetter\DataSetterInterface;
use Aaronadal\Validator\Validator\ErrorCollector\ErrorCollectorInterface;
use Aaronadal\Validator\Validator\Validable;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class ValidableTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Validable
     */
    private $validable;

    protected function setUp()
    {
        $this->validable = new Validable();
    }

    public function testDataProviderIsNotNull()
    {
        $this->assertInstanceOf(DataProviderInterface::class, $this->validable->getDataProvider());
    }

    public function testDataSetterIsNotNull()
    {
        $this->assertInstanceOf(DataSetterInterface::class, $this->validable->getDataSetter());
    }

    public function testErrorCollectorIsNotNull()
    {
        $this->assertInstanceOf(ErrorCollectorInterface::class, $this->validable->getErrorCollector());
    }
}
