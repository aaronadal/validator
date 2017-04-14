<?php

namespace Aaronadal\Tests\Fixtures;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class StubBean
{

    private $foo;
    private $bar;
    private $fooBar;

    public function __construct($foo, $bar, $fooBar)
    {
        $this->foo    = $foo;
        $this->bar    = $bar;
        $this->fooBar = $fooBar;
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
}
