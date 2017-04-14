<?php

namespace Aaronadal\Validator\Validator\DataSetter;


use Aaronadal\Validator\Exception\ParameterNotFoundException;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
interface DataSetterInterface
{

    /**
     * Sets a parameter in the object.
     *
     * @param string $key       The parameter key
     * @param mixed  $parameter The value of the parameter
     *
     * @throws ParameterNotFoundException If the parameter cannot be set
     */
    public function setParameter($key, $parameter);

}
