<?php

namespace Aaronadal\Validator\Validator\DataSetter;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class DataSetterFactory implements DataSetterFactoryInterface
{

    /**
     * {@inheritdoc}
     *
     * - If target is an instance of DataSetterInterface, it will be returned as data setter.
     * - If target is an object, an instance of DefaultObjectDataSetter will be created.
     * - If target is an array, an ArrayDataSetter will be initialized with it.
     * - Otherwise, an empty ArrayDataSetter will be created.
     */
    public function newDataSetter($target)
    {
        if($target instanceof DataSetterInterface) {
            $setter = $target;
        }
        else if(is_object($target)) {
            $setter = new DefaultObjectDataSetter($target);
        }
        else if(is_array($target)) {
            $setter = new ArrayDataSetter($target);
        }
        else {
            $setter = new ArrayDataSetter();
        }

        return $setter;
    }
}
