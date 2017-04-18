<?php

namespace Aaronadal\Validator\Subject;


use Aaronadal\Validator\Validator\DataProvider\ArrayDataProvider;
use Aaronadal\Validator\Validator\DataProvider\DataProviderInterface;
use Aaronadal\Validator\Validator\DataSetter\ArrayDataSetter;
use Aaronadal\Validator\Validator\DataSetter\DataSetterInterface;
use Aaronadal\Validator\Validator\ErrorCollector\ArrayErrorCollector;
use Aaronadal\Validator\Validator\ErrorCollector\ErrorCollectorInterface;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class Subject implements SubjectInterface
{

    /**
     * @var string $id
     */
    private $id;

    /**
     * @var DataProviderInterface $dataProvider
     */
    private $dataProvider = null;

    /**
     * @var DataSetterInterface $dataSetter
     */
    private $dataSetter = null;

    /**
     * @var ErrorCollectorInterface $errorCollector
     */
    private $errorCollector = null;

    /**
     * Creates a new Subject instance.
     *
     * @param string $id The unique ID of the new subject.
     */
    public function __construct($id)
    {
        $this->id             = $id;
        $this->dataProvider   = new ArrayDataProvider();
        $this->dataSetter     = new ArrayDataSetter();
        $this->errorCollector = new ArrayErrorCollector();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getDataProvider()
    {
        return $this->dataProvider;
    }

    /**
     * @param DataProviderInterface $dataProvider
     */
    public function setDataProvider(DataProviderInterface $dataProvider)
    {
        // If the data provider is a Subject, its inner data provider is used to avoid circular references.
        if($dataProvider instanceof Subject) {
            $dataProvider = $dataProvider->getDataProvider();
        }

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
     * @param DataSetterInterface $dataSetter
     */
    public function setDataSetter(DataSetterInterface $dataSetter)
    {
        // If the data setter is a Subject, its inner data setter is used to avoid circular references.
        if($dataSetter instanceof Subject) {
            $dataSetter = $dataSetter->getDataSetter();
        }

        $this->dataSetter = $dataSetter;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubject()
    {
        return $this;
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

    /**
     * {@inheritdoc}
     */
    public function getParameter($key, $default = null)
    {
        return $this->dataProvider->getParameter($key, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function getParameterOrFail($key)
    {
        return $this->dataProvider->getParameterOrFail($key);
    }

    /**
     * {@inheritdoc}
     */
    public function setParameter($key, $parameter)
    {
        $this->dataSetter->setParameter($key, $parameter);
    }

    /**
     * {@inheritdoc}
     */
    public function applyParameter($key, $default = null)
    {
        $this->setParameter($key, $this->getParameter($key, $default));
    }

    /**
     * {@inheritdoc}
     */
    public function putError($key, $error)
    {
        $this->errorCollector->putError($key, $error);
    }

    /**
     * {@inheritdoc}
     */
    public function getError($key)
    {
        return $this->errorCollector->getError($key);
    }

    /**
     * {@inheritdoc}
     */
    public function allErrors()
    {
        return $this->errorCollector->allErrors();
    }

    /**
     * {@inheritdoc}
     */
    public function hasError($key, $strict = true)
    {
        return $this->errorCollector->hasError($key, $strict);
    }

    /**
     * {@inheritdoc}
     */
    public function hasErrors($strict = true)
    {
        return $this->errorCollector->hasErrors($strict);
    }
}
