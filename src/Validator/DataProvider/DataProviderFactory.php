<?php

namespace Aaronadal\Validator\Validator\DataProvider;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class DataProviderFactory implements DataProviderFactoryInterface
{

    /**
     * {@inheritdoc}
     *
     * - If target is an instance of DataProviderInterface, it will be returned as data setter.
     * - If target is an object, an instance of DefaultObjectDataProvider will be created.
     * - If target is an array, an ArrayDataProvider will be initialized with it.
     * - Otherwise, an empty ArrayDataProvider will be created.
     */
    public function newDataProvider($source)
    {
        if($source instanceof DataProviderInterface) {
            $provider = $source;
        }
        else if(is_object($source)) {
            $provider = new DefaultObjectDataProvider($source);
        }
        else if(is_array($source)) {
            $provider = new ArrayDataProvider($source);
        }
        else {
            $provider = new ArrayDataProvider();
        }

        return $provider;
    }
}
