<?php

namespace Aaronadal\Validator\Validator\ErrorCollector;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class NullErrorCollector implements ErrorCollectorInterface
{

    /**
     * {@inheritdoc}
     */
    public function putError($key, $error)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getError($key)
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function allErrors()
    {
        return array();
    }

    /**
     * {@inheritdoc}
     */
    public function hasError($key, $strict = true)
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function hasErrors($strict = true)
    {
        return false;
    }
}
