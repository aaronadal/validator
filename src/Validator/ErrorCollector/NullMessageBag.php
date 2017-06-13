<?php

namespace Aaronadal\Validator\Validator\ErrorCollector;


use ArrayIterator;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class NullMessageBag implements MessageBagInterface
{

    /**
     * {@inheritdoc}
     */
    public function put($key, $error)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return array();
    }

    /**
     * {@inheritdoc}
     */
    public function has($key, $strict = true)
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function any($strict = true)
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new ArrayIterator(array());
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        $this->put($offset, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        // DO NOTHING.
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return 0;
    }

}
