<?php

namespace Aaronadal\Validator\Validator\DataProvider;


use Aaronadal\Validator\Exception\ParameterNotFoundException;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class ArrayDataProvider implements DataProviderInterface
{

    use RecursiveArrayProviderTrait;
    use RecursiveObjectProviderTrait;

    private $array = [];

    public function __construct(array $data = [])
    {
        $this->array = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->array;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->array = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getParameter($key, $default = null)
    {
        if(array_key_exists($key, $this->array)) {
            return $this->array[$key];
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
        return $this->array;
    }
}
