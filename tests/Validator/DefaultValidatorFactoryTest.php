<?php

namespace Aaronadal\Tests\Validator;


use Aaronadal\Tests\Fixtures\StubValidator;
use Aaronadal\Validator\Validator\ValidatorFactory;

class DefaultValidatorFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testNewValidator()
    {
        $factory = new ValidatorFactory();
        $validator = $factory->newValidator(StubValidator::class);

        $this->assertInstanceOf(StubValidator::class, $validator);
    }

}
