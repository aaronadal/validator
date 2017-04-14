<?php

namespace Aaronadal\Validator\Validator\DataSetter;


use Aaronadal\Validator\Exception\NullPointerException;
use Aaronadal\Validator\Exception\ParameterNotFoundException;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
abstract class ObjectDataSetter implements DataSetterInterface
{

    private $object = null;

    public function __construct($object)
    {
        $this->object = $object;
    }

    /**
     * Returns the object.
     *
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Sets the object.
     *
     * @param mixed $object The object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * {@inheritdoc}
     *
     * @throws NullPointerException If the object is null
     */
    public function setParameter($key, $parameter)
    {
        // If the object is null, an exception is thrown.
        if($this->getObject() === null) {
            throw new NullPointerException("The object cannot be null.");
        }

        // Let's get the key-method mapping.
        $mapping = $this->getKeyMethodMapping();

        // If the key is not mapped, an exception is thrown.
        if(!array_key_exists($key, $mapping)) {
            throw new ParameterNotFoundException("The $key parameter cannot be set with this setter.");
        }

        // Call the mapped setter method.
        $object   = $this->getObject();
        $method   = $mapping[$key];
        $callable = array($object, $method);
        call_user_func($callable, $parameter);
    }

    /**
     * Gets the mapping that links one key for a parameter with a setter method.
     *
     * This allows to automatically call the correct method when trying to set one parameter.
     *
     * @return array The key-method mapping
     */
    protected abstract function getKeyMethodMapping();

}
