<?php

namespace Aaronadal\Validator\Validator\ErrorCollector;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class DefaultErrorCollector implements ErrorCollectorInterface
{

    private $errorsBag;
    private $warningsBag;

    /**
     * Creates a new DefaultErrorCollector instance.
     *
     * @param MessageBagInterface|array $errors
     * @param MessageBagInterface|array $warnings
     */
    function __construct($errors = [], $warnings = [])
    {
        $this->setErrors($errors);
        $this->setWarnings($warnings);
    }

    /**
     * {@inheritdoc}
     */
    public function allErrors()
    {
        return $this->errorsBag;
    }

    /**
     * {@inheritdoc}
     */
    public function setErrors($errors = [])
    {
        if(!$errors instanceof MessageBagInterface) {
            $errors = new ArrayMessageBag($errors);
        }

        $this->errorsBag = $errors;
    }

    /**
     * {@inheritdoc}
     */
    public function putError($key, $error)
    {
        $this->allErrors()->put($key, $error);
    }

    /**
     * {@inheritdoc}
     */
    public function getError($key)
    {
        return $this->allErrors()->get($key);
    }

    /**
     * {@inheritdoc}
     */
    public function hasError($key, $strict = true)
    {
        return $this->allErrors()->has($key, $strict);
    }

    /**
     * {@inheritdoc}
     */
    public function anyError($strict = true)
    {
        return $this->allErrors()->any($strict);
    }

    /**
     * {@inheritdoc}
     */
    public function allWarnings()
    {
        return $this->warningsBag;
    }

    /**
     * {@inheritdoc}
     */
    public function setWarnings($warnings = [])
    {

        if(!$warnings instanceof MessageBagInterface) {
            $warnings = new ArrayMessageBag($warnings);
        }

        $this->warningsBag = $warnings;
    }

    /**
     * {@inheritdoc}
     */
    public function putWarning($key, $warning)
    {
        $this->allWarnings()->put($key, $warning);
    }

    /**
     * {@inheritdoc}
     */
    public function getWarning($key)
    {
        return $this->allWarnings()->get($key);
    }

    /**
     * {@inheritdoc}
     */
    public function hasWarning($key, $strict = true)
    {
        return $this->allWarnings()->has($key, $strict);
    }

    /**
     * {@inheritdoc}
     */
    public function anyWarning($strict = true)
    {
        return $this->allWarnings()->any($strict);
    }

}
