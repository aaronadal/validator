<?php

namespace Aaronadal\Validator\Validator;


use Aaronadal\Validator\Validator\DataProvider\ArrayDataProvider;
use Aaronadal\Validator\Validator\DataProvider\DataProviderInterface;
use Aaronadal\Validator\Validator\DataSetter\ArrayDataSetter;
use Aaronadal\Validator\Validator\ErrorCollector\ArrayErrorCollector;
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
     * @param ArrayDataSetter|null         $dataSetter     If null, an empty ArrayDataSetter is used.
     * @param ErrorCollectorInterface|null $errorCollector If null, an ArrayErrorCollector is used.
     */
    public function __construct(DataProviderInterface $dataProvider = null, ArrayDataSetter $dataSetter = null, ErrorCollectorInterface $errorCollector = null)
    {
        $this->dataProvider   = $dataProvider ?: new ArrayDataProvider();
        $this->dataSetter     = $dataSetter ?: new ArrayDataSetter();
        $this->errorCollector = $errorCollector ?: new ArrayErrorCollector();
    }

    /**
     * {@inheritdoc}
     */
    public function getDataProvider()
    {
        return $this->dataProvider;
    }

    /**
     * @param ArrayDataProvider $dataProvider
     */
    public function setDataProvider(ArrayDataProvider $dataProvider)
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
     * @param ArrayDataSetter $dataSetter
     */
    public function setDataSetter(ArrayDataSetter $dataSetter)
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
     * @param ErrorCollectorInterface $errorCollector
     */
    public function setErrorCollector(ErrorCollectorInterface $errorCollector)
    {
        $this->errorCollector = $errorCollector;
    }
}
