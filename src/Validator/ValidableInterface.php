<?php

namespace Aaronadal\Validator\Validator;


use Aaronadal\Validator\Exception\ParameterNotFoundException;
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
     * Sets the data provider.
     *
     * @param DataProviderInterface $dataProvider
     */
    public function setDataProvider(DataProviderInterface $dataProvider);

    /**
     * Returns the data setter.
     *
     * @return DataSetterInterface
     */
    public function getDataSetter();

    /**
     * Sets the data setter.
     *
     * @param DataSetterInterface $dataSetter
     */
    public function setDataSetter(DataSetterInterface $dataSetter);

    /**
     * Returns the error collector.
     *
     * @return ErrorCollectorInterface
     */
    public function getErrorCollector();

    /**
     * Sets the error collector.
     *
     * @param ErrorCollectorInterface $errorCollector
     */
    public function setErrorCollector(ErrorCollectorInterface $errorCollector);

    /**
     * This method is a shortcut for the following code:
     *
     * <code>
     *      $param = $validable->getDataProvider()->getParameter($key, $default);
     *      $validable->getDataSetter()->setParameter($key, $param);
     * </code>
     *
     * @param string $key     The parameter key
     * @param mixed  $default The default value if the parameter is missing
     */
    public function applyParameter($key, $default = null);

    /**
     * This method is a shortcut for the following code:
     *
     * <code>
     *      $param = $validable->getDataProvider()->getParameterOrFail($key, $default);
     *      $validable->getDataSetter()->setParameter($key, $param);
     * </code>
     *
     * @param string $key     The parameter key
     *
     * @throws ParameterNotFoundException If the parameter does not exist
     */
    public function applyParameterOrFail($key);

}
