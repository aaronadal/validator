<?php

namespace Aaronadal\Validator\Validator\DataSetter;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class ArrayDataSetter implements DataSetterInterface
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
    public function setParameter($key, $parameter)
    {
        $this->array[$key] = $parameter;
    }
}
