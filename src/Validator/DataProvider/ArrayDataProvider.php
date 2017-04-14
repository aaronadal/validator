<?php

namespace Aaronadal\Validator\Validator\DataProvider;


use Aaronadal\Validator\Exception\ParameterNotFoundException;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class ArrayDataProvider implements DataProviderInterface
{

    private $array = array();

    public function __construct(array $data = array())
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
        if(!array_key_exists($key, $this->array)) {
            return $default;
        }

        return $this->array[$key];
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
}
