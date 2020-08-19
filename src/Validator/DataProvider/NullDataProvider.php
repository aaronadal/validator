<?php

namespace Aaronadal\Validator\Validator\DataProvider;


use Aaronadal\Validator\Exception\ParameterNotFoundException;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class NullDataProvider implements DataProviderInterface
{

    /**
     * {@inheritdoc}
     */
    public function getParameter($key, $default = null)
    {
        return $default;
    }

    /**
     * {@inheritdoc}
     */
    public function getParameterArray($key, $default = [])
    {
        return $this->getParameterArray($key, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function getParameterOrFail($key)
    {
        throw new ParameterNotFoundException('NullDataProvider always throws an exception here.');
    }

    /**
     * {@inheritdoc}
     */
    public function getParameterArrayOrFail($key)
    {
        return $this->getParameterOrFail($key);
    }

    /**
     * {@inheritdoc}
     */
    public function allParameters()
    {
        return [];
    }
}
