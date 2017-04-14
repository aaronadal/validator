<?php

namespace Aaronadal\Validator\Validator;


use Aaronadal\Validator\Validator\DataProvider\DataProviderInterface;
use Aaronadal\Validator\Validator\DataSetter\DataSetterInterface;
use Aaronadal\Validator\Validator\ErrorCollector\ErrorCollectorInterface;

/**
 * Validables
 *
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
interface ValidableInterface
{

    /**
     * Returns the data provider.
     *
     * @return DataProviderInterface
     */
    public function getDataProvider();

    /**
     * Returns the data setter.
     *
     * @return DataSetterInterface
     */
    public function getDataSetter();

    /**
     * Returns the error collector for this validable.
     *
     * @return ErrorCollectorInterface
     */
    public function getErrorCollector();

}
