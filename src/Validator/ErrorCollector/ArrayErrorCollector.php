<?php

namespace Aaronadal\Validator\Validator\ErrorCollector;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class ArrayErrorCollector implements ErrorCollectorInterface
{

    private $array = array();

    public function __construct(array $errors = array())
    {
        $this->array = $errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->array = $errors;
    }

    /**
     * {@inheritdoc}
     */
    public function putError($key, $error)
    {
        $this->array[$key] = $error;
    }

    /**
     * {@inheritdoc}
     */
    public function getError($key)
    {
        if(!array_key_exists($key, $this->array)) {
            return null;
        }

        return $this->array[$key];
    }

    /**
     * {@inheritdoc}
     */
    public function allErrors()
    {
        return $this->array;
    }

    /**
     * {@inheritdoc}
     */
    public function hasError($key, $strict = true)
    {
        $error = $this->getError($key);

        return $strict ? $error !== null : (bool)$error;
    }

    /**
     * {@inheritdoc}
     */
    public function hasErrors($strict = true)
    {
        foreach($this->array as $key => $error) {
            if($this->hasError($key, $strict)) {
                return true;
            }
        }

        return false;
    }
}
