<?php

namespace Aaronadal\Validator\Subject;


use Aaronadal\Validator\Validator\DataProvider\ArrayDataProvider;
use Aaronadal\Validator\Validator\DataProvider\DataProviderInterface;
use Aaronadal\Validator\Validator\DataSetter\ArrayDataSetter;
use Aaronadal\Validator\Validator\DataSetter\DataSetterInterface;
use Aaronadal\Validator\Validator\ErrorCollector\ArrayMessageBag;
use Aaronadal\Validator\Validator\ErrorCollector\DefaultErrorCollector;
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
     * @var ArrayMessageBag $extras
     */
    private $extras;

    /**
     * Creates a new Subject instance.
     *
     * @param string                       $id             The unique ID of the subject.
     * @param DataProviderInterface|null   $dataProvider   The data provider.
     * @param DataSetterInterface|null     $dataSetter     The data setter.
     * @param ErrorCollectorInterface|null $errorCollector The error collector.
     * @param ArrayMessageBag|null         $extras         The extras collection.
     */
    public function __construct(
        $id,
        DataProviderInterface $dataProvider = null,
        DataSetterInterface $dataSetter = null,
        ErrorCollectorInterface $errorCollector = null,
        ArrayMessageBag $extras = null
    ) {
        $this->id             = $id;
        $this->dataProvider   = $dataProvider ?: new ArrayDataProvider();
        $this->dataSetter     = $dataSetter ?: new ArrayDataSetter();
        $this->errorCollector = $errorCollector ?: new DefaultErrorCollector();
        $this->extras         = $extras ?: new ArrayMessageBag();
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
    public function isValid($strict = true)
    {
        return !$this->anyError($strict);
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
        // If data provider is a Subject, its inner data provider is used to avoid circular references.
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
        // If data setter is a Subject, its inner data setter is used to avoid circular references.
        if($dataSetter instanceof Subject) {
            $dataSetter = $dataSetter->getDataSetter();
        }

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
    public function getParameterArray($key, $default = [])
    {
        return $this->dataProvider->getParameterArray($key, $default);
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
    public function getParameterArrayOrFail($key)
    {
        return $this->dataProvider->getParameterArrayOrFail($key);
    }

    /**
     * {@inheritdoc}
     */
    public function allParameters()
    {
        return $this->dataProvider->allParameters();
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
    public function applyParameterOrFail($key)
    {
        $this->setParameter($key, $this->getParameterOrFail($key));
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
    public function setErrors($errors = [])
    {
        $this->errorCollector->setErrors($errors);
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
    public function anyError($strict = true)
    {
        return $this->errorCollector->anyError($strict);
    }

    /**
     * {@inheritdoc}
     */
    public function putWarning($key, $warning)
    {
        $this->errorCollector->putWarning($key, $warning);
    }

    /**
     * {@inheritdoc}
     */
    public function getWarning($key)
    {
        return $this->errorCollector->getWarning($key);
    }

    /**
     * {@inheritdoc}
     */
    public function allWarnings()
    {
        return $this->errorCollector->allWarnings();
    }

    /**
     * {@inheritdoc}
     */
    public function setWarnings($warnings = [])
    {
        $this->errorCollector->setWarnings($warnings);
    }

    /**
     * {@inheritdoc}
     */
    public function hasWarning($key, $strict = true)
    {
        return $this->errorCollector->hasWarning($key, $strict);
    }

    /**
     * {@inheritdoc}
     */
    public function anyWarning($strict = true)
    {
        return $this->errorCollector->anyWarning($strict);
    }

    /**
     * Adds a piece of extra data to this subject.
     *
     * @param string $key
     * @param mixed  $extra
     */
    public function putExtra($key, $extra)
    {
        $this->extras->put($key, $extra);
    }

    /**
     * Retrieves an extra previously defined. If not defined, returns null.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getExtra($key)
    {
        return $this->extras->get($key);
    }

    /**
     * Returns all the extras.
     *
     * @return array
     */
    public function allExtras()
    {
        return $this->extras->all();
    }

    /**
     * Sets the extras as an array.
     *
     * @param array $extras
     */
    public function setExtras($extras = [])
    {
        $this->extras->setMessages($extras);
    }

    /**
     * ¿Is an extra defined?
     *
     * @param string $key
     * @param bool   $strict
     *
     * @return bool
     */
    public function hasExtra($key, $strict = true)
    {
        return $this->extras->has($key, $strict);
    }

    /**
     * ¿Has any extra defined?
     *
     * @param bool $strict
     *
     * @return bool
     */
    public function anyExtra($strict = true)
    {
        return $this->extras->any($strict);
    }
}
