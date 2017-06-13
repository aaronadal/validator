<?php

namespace Aaronadal\Tests\Validator\ErrorCollector;


use Aaronadal\Validator\Validator\ErrorCollector\DefaultErrorCollector;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class DefaultErrorCollectorTest extends \PHPUnit_Framework_TestCase
{

    public function testGetError()
    {
        $errors = array('error' => 'Successfully set');
        $errorCollector = new DefaultErrorCollector($errors);

        $this->assertSame($errors['error'], $errorCollector->getError('error'));
    }

    public function testGetErrors()
    {
        $errors = array('error' => 'Successfully set');
        $errorCollector = new DefaultErrorCollector($errors);

        $this->assertSame($errors, $errorCollector->allErrors()->all());
    }

    public function testHasError()
    {
        $errors = array('error' => 'Successfully set');
        $errorCollector = new DefaultErrorCollector($errors);

        $this->assertSame($errors['error'], $errorCollector->allErrors()['error']);
    }

    public function testHasErrors()
    {
        $errors = array('error' => 'Successfully set');
        $errorCollector = new DefaultErrorCollector($errors);

        $this->assertSame($errors['error'], $errorCollector->allErrors()['error']);
    }

    public function testSetErrors()
    {
        $errors = array('error' => 'Successfully set');
        $errorCollector = new DefaultErrorCollector($errors);

        $errorCollector->setErrors(array());
        $this->assertNull($errorCollector->getError('error'));

        $errorCollector->setErrors($errors);
        $this->assertSame($errors, $errorCollector->allErrors()->all());
    }

    public function testPutErrors()
    {
        $errorCollector = new DefaultErrorCollector();

        $this->assertEmpty($errorCollector->allErrors());

        $errorCollector->putError('error', 'Successfully set');
        $this->assertNotEmpty($errorCollector->allErrors());
        $this->assertSame('Successfully set', $errorCollector->getError('error'));
    }

    public function testGetWarning()
    {
        $warnings = array('warning' => 'Successfully set');
        $warningCollector = new DefaultErrorCollector([], $warnings);

        $this->assertSame($warnings['warning'], $warningCollector->getWarning('warning'));
    }

    public function testGetWarnings()
    {
        $warnings = array('warning' => 'Successfully set');
        $warningCollector = new DefaultErrorCollector([], $warnings);

        $this->assertSame($warnings, $warningCollector->allWarnings()->all());
    }

    public function testHasWarning()
    {
        $warnings = array('warning' => 'Successfully set');
        $warningCollector = new DefaultErrorCollector([], $warnings);

        $this->assertSame($warnings['warning'], $warningCollector->allWarnings()['warning']);
    }

    public function testHasWarnings()
    {
        $warnings = array('warning' => 'Successfully set');
        $warningCollector = new DefaultErrorCollector([], $warnings);

        $this->assertSame($warnings['warning'], $warningCollector->allWarnings()['warning']);
    }

    public function testSetWarnings()
    {
        $warnings = array('warning' => 'Successfully set');
        $warningCollector = new DefaultErrorCollector([], $warnings);

        $warningCollector->setWarnings(array());
        $this->assertNull($warningCollector->getWarning('warning'));

        $warningCollector->setWarnings($warnings);
        $this->assertSame($warnings, $warningCollector->allWarnings()->all());
    }

    public function testPutWarnings()
    {
        $warningCollector = new DefaultErrorCollector();

        $this->assertEmpty($warningCollector->allWarnings());

        $warningCollector->putWarning('warning', 'Successfully set');
        $this->assertNotEmpty($warningCollector->allWarnings());
        $this->assertSame('Successfully set', $warningCollector->getWarning('warning'));
    }
}
