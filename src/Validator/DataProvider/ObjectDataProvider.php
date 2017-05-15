<?php

namespace Aaronadal\Validator\Validator\DataProvider;


use Aaronadal\Validator\Exception\ParameterNotFoundException;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
abstract class ObjectDataProvider implements DataProviderInterface
{
    use RecursiveArrayProviderTrait;

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
     */
    public function getParameter($key, $default = null)
    {
        if($this->isRecursiveArrayParameter($key)) {
            return $this->getRecursiveArrayParameter($key);
        }

        // If the object is null, return the default value.
        if($this->getObject() === null) {
            return $default;
        }

        // Let's get the key-method mapping.
        $mapping = $this->getKeyMethodMapping();

        // If the key is not mapped, return the default value.
        if(!array_key_exists($key, $mapping)) {
            return $default;
        }

        // Call the mapped getter method.
        $object   = $this->getObject();
        $method   = $mapping[$key];
        $callable = array($object, $method);

        return call_user_func($callable);
    }

    /**
     * {@inheritdoc}
     */
    public function getParameterOrFail($key)
    {
        $value = $this->getParameter($key, null);
        if($value === null) {
            throw new ParameterNotFoundException("The $key parameter cannot be retrieved by this provider.");
        }

        return $value;
    }

    /**
     * Gets the mapping that links one key for a parameter with a getter method.
     *
     * This allows to automatically call the correct method when trying to get one parameter.
     *
     * @return array The key-method mapping
     */
    protected abstract function getKeyMethodMapping();

}
