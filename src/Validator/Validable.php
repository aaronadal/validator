<?php

namespace Aaronadal\Validator\Validator;


use Aaronadal\Validator\Validator\DataProvider\DataProviderInterface;
use Aaronadal\Validator\Validator\DataProvider\NullDataProvider;
use Aaronadal\Validator\Validator\DataSetter\ArrayDataSetter;
use Aaronadal\Validator\Validator\DataSetter\DataSetterInterface;
use Aaronadal\Validator\Validator\ErrorCollector\DefaultErrorCollector;
use Aaronadal\Validator\Validator\ErrorCollector\ErrorCollectorInterface;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class Validable implements ValidableInterface
{

    private $dataProvider;
    private $dataSetter;
    private $errorCollector;

    /**
     * Creates a new Validable instance.
     *
     * @param DataProviderInterface|null   $dataProvider   If null, an empty ArrayDataProvider is used.
     * @param DataSetterInterface|null     $dataSetter     If null, an empty ArrayDataSetter is used.
     * @param ErrorCollectorInterface|null $errorCollector If null, a DefaultErrorCollector is used.
     */
    public function __construct(
        DataProviderInterface $dataProvider = null,
        DataSetterInterface $dataSetter = null,
        ErrorCollectorInterface $errorCollector = null
    ) {
        $this->dataProvider   = $dataProvider ?: new NullDataProvider();
        $this->dataSetter     = $dataSetter ?: new ArrayDataSetter();
        $this->errorCollector = $errorCollector ?: new DefaultErrorCollector();
    }

    /**
     * {@inheritdoc}
     */
    public function getDataProvider()
    {
        return $this->dataProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function setDataProvider(DataProviderInterface $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function getDataSetter()
    {
        return $this->dataSetter;
    }

    /**
     * {@inheritdoc}
     */
    public function setDataSetter(DataSetterInterface $dataSetter)
    {
        $this->dataSetter = $dataSetter;
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorCollector()
    {
        return $this->errorCollector;
    }

    /**
     * {@inheritdoc}
     */
    public function setErrorCollector(ErrorCollectorInterface $errorCollector)
    {
        $this->errorCollector = $errorCollector;
    }

    /**
     * {@inheritdoc}
     */
    public function applyParameter($key, $default = null)
    {
        $value = $this->getDataProvider()->getParameter($key, $default);
        $this->getDataSetter()->setParameter($key, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function applyParameterOrFail($key)
    {
        $value = $this->getDataProvider()->getParameterOrFail($key);
        $this->getDataSetter()->setParameter($key, $value);
    }

}
