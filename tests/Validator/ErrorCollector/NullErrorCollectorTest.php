<?php

namespace Aaronadal\Tests\Validator\ErrorCollector;


use Aaronadal\Validator\Validator\ErrorCollector\NullErrorCollector;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class NullErrorCollectorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var NullErrorCollector
     */
    private $errorCollector;

    public function setUp()
    {
        $this->errorCollector = new NullErrorCollector();
    }

    public function testGetError()
    {
        $this->assertNull($this->errorCollector->getError('error'));
    }

    public function testHasError()
    {
        $this->assertFalse($this->errorCollector->hasError('error'));
    }

    public function testHasErrors()
    {
        $this->assertFalse($this->errorCollector->hasErrors());
    }

    public function testPutErrors()
    {
        $this->errorCollector->putError('error', 'Successfully set');
        $this->assertNull($this->errorCollector->getError('error'));
    }
}
