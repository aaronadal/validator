<?php

namespace Aaronadal\Tests\Fixtures;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class StubBean
{

    public $property;
    private $foo;
    private $bar;
    private $fooBar;
    private $inner;
    private $private = 'private';

    public function __construct($foo, $bar, $fooBar, $inner = true)
    {
        $this->property = $foo;
        $this->foo      = $foo;
        $this->bar      = $bar;
        $this->fooBar   = $fooBar;
        if($inner) {
            $this->inner = new StubBean('inner-' . $foo, 'inner-' . $bar, 'inner-' . $fooBar, false);
        }
    }

    public function getFoo()
    {
        return $this->foo;
    }

    public function setFoo($foo)
    {
        $this->foo = $foo;
    }

    public function isBar()
    {
        return $this->bar;
    }

    public function setBar($bar)
    {
        $this->bar = $bar;
    }

    public function getFooBar()
    {
        return $this->fooBar;
    }

    public function setFooBar($fooBar)
    {
        $this->fooBar = $fooBar;
    }

    public function getInner()
    {
        return $this->inner;
    }

    private function getPrivate()
    {
        return $this->private;
    }
}
