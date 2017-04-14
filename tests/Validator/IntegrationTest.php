<?php

namespace Aaronadal\Tests\Validator;


use Aaronadal\Tests\Fixtures\TestValidator;
use Aaronadal\Validator\Subject\Subject;
use Aaronadal\Validator\Validator\DataProvider\ArrayDataProvider;
use Aaronadal\Validator\Validator\DataSetter\ArrayDataSetter;
use Aaronadal\Validator\Validator\ErrorCollector\ArrayErrorCollector;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class IntegrationTest extends \PHPUnit_Framework_TestCase
{

    public function testValidatorValid()
    {
        $validator = new TestValidator();
        $subject = new Subject('id');

        $subject->setDataProvider(new ArrayDataProvider(array('foo' => 'bar')));
        $subject->setDataSetter(new ArrayDataSetter());
        $subject->setErrorCollector(new ArrayErrorCollector());

        $this->assertTrue($validator->isValid($subject));

        $validator->apply($subject);

        $this->assertArrayHasKey('foo', $subject->getDataSetter()->getData());
        $this->assertEquals($subject->getDataProvider()->getData()['foo'], $subject->getDataSetter()->getData()['foo']);
    }

    public function testValidatorInvalid()
    {
        $validator = new TestValidator();
        $subject = new Subject('id');

        $subject->setDataProvider(new ArrayDataProvider(array('foo' => 'baz')));
        $subject->setDataSetter(new ArrayDataSetter());
        $subject->setErrorCollector(new ArrayErrorCollector());

        $this->assertFalse($validator->isValid($subject));
    }

}
