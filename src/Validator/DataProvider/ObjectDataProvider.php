<?php

namespace Aaronadal\Validator\Validator\DataProvider;


use Aaronadal\Validator\Exception\ParameterNotFoundException;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
abstract class ObjectDataProvider implements DataProviderInterface
{

    use RecursiveArrayProviderTrait;
    use RecursiveObjectProviderTrait;

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
        // If the object is null, return the default value.
        if($this->getObject() === null) {
            return $default;
        }

        // Let's get the key-method mapping.
        $mapping = $this->getKeyMethodMapping();

        // Call the mapped getter method, if exists.
        if(array_key_exists($key, $mapping)) {
            $object   = $this->getObject();
            $method   = $mapping[$key];
            $callable = [$object, $method];

            return call_user_func($callable);
        }

        if($this->isRecursiveObjectParameter($key)) {
            return $this->getRecursiveObjectParameter($key, $default);
        }

        if($this->isRecursiveArrayParameter($key)) {
            return $this->getRecursiveArrayParameter($key, $default);
        }

        return $default;
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
     * {@inheritdoc}
     */
    public function allParameters()
    {
        $parameters = [];
        $object     = $this->getObject();

        foreach($this->getKeyMethodMapping() as $key => $method) {
            $callable         = [$object, $method];
            $parameters[$key] = call_user_func($callable);
        }

        return $parameters;
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
