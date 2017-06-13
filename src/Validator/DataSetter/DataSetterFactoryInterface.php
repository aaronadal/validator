<?php

namespace Aaronadal\Validator\Validator\DataSetter;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
interface DataSetterFactoryInterface
{

    /**
     * Creates a new DataSetterInterface from any given target.
     *
     * @param mixed $target
     *
     * @return DataSetterInterface
     */
    public function newDataSetter($target);

}
