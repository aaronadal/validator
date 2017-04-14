<?php

namespace Aaronadal\Tests\Subject;


use Aaronadal\Validator\Validator\DataProvider\DataProviderInterface;
use Aaronadal\Validator\Validator\DataSetter\DataSetterInterface;
use Aaronadal\Validator\Subject\Subject;
use Aaronadal\Validator\Validator\ErrorCollector\ErrorCollectorInterface;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class SubjectTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Subject
     */
    private $subject;

    protected function setUp()
    {
        $this->subject = new Subject('id');
    }

    public function testDataProviderIsNotNull()
    {
        $this->assertInstanceOf(DataProviderInterface::class, $this->subject->getDataProvider());
    }

    public function testDataSetterIsNotNull()
    {
        $this->assertInstanceOf(DataSetterInterface::class, $this->subject->getDataSetter());
    }

    public function testErrorCollectorIsNotNull()
    {
        $this->assertInstanceOf(ErrorCollectorInterface::class, $this->subject->getErrorCollector());
    }
}
