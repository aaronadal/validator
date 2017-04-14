<?php

namespace Aaronadal\Tests\Validator\ErrorCollector;


use Aaronadal\Validator\Validator\ErrorCollector\ArrayErrorCollector;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class ArrayErrorCollectorTest extends \PHPUnit_Framework_TestCase
{

    public function testGetError()
    {
        $errors = array('error' => 'Successfully set');
        $errorCollector = new ArrayErrorCollector($errors);

        $this->assertSame($errors['error'], $errorCollector->getError('error'));
    }

    public function testGetErrors()
    {
        $errors = array('error' => 'Successfully set');
        $errorCollector = new ArrayErrorCollector($errors);

        $this->assertSame($errors, $errorCollector->allErrors());
    }

    public function testHasError()
    {
        $errors = array('error' => 'Successfully set');
        $errorCollector = new ArrayErrorCollector($errors);

        $this->assertSame($errors['error'], $errorCollector->allErrors()['error']);
    }

    public function testHasErrors()
    {
        $errors = array('error' => 'Successfully set');
        $errorCollector = new ArrayErrorCollector($errors);

        $this->assertSame($errors['error'], $errorCollector->allErrors()['error']);
    }

    public function testSetErrors()
    {
        $errors = array('error' => 'Successfully set');
        $errorCollector = new ArrayErrorCollector($errors);

        $errorCollector->setErrors(array());
        $this->assertNull($errorCollector->getError('error'));

        $errorCollector->setErrors($errors);
        $this->assertSame($errors, $errorCollector->allErrors());
    }

    public function testPutErrors()
    {
        $errorCollector = new ArrayErrorCollector();

        $this->assertEmpty($errorCollector->allErrors());

        $errorCollector->putError('error', 'Successfully set');
        $this->assertNotEmpty($errorCollector->allErrors());
        $this->assertSame('Successfully set', $errorCollector->getError('error'));
    }
}
