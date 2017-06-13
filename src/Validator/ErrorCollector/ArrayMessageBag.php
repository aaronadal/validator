<?php

namespace Aaronadal\Validator\Validator\ErrorCollector;


use ArrayIterator;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class ArrayMessageBag implements MessageBagInterface
{

    private $array = array();

    public function __construct(array $messages = array())
    {
        $this->array = $messages;
    }

    /**
     * @param array $messages
     */
    public function setMessages(array $messages)
    {
        $this->array = $messages;
    }

    /**
     * {@inheritdoc}
     */
    public function put($key, $message)
    {
        $this->array[$key] = $message;
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        if(!array_key_exists($key, $this->array)) {
            return null;
        }

        return $this->array[$key];
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->array;
    }

    /**
     * {@inheritdoc}
     */
    public function has($key, $strict = true)
    {
        $message = $this->get($key);

        return $strict ? $message !== null : (bool)$message;
    }

    /**
     * {@inheritdoc}
     */
    public function any($strict = true)
    {
        foreach($this->array as $key => $_) {
            if($this->has($key, $strict)) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->all());
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
        if(array_key_exists($offset, $this->array)) {
            unset($this->array[$offset]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->all());
    }

}
