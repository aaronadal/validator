<?php

namespace Aaronadal\Validator\Validator\DataProvider;


use Aaronadal\Validator\Exception\ParameterNotFoundException;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
interface DataProviderInterface
{

    /**
     * Retrieves one parameter from this provider.
     *
     * If the parameter does not exists, the default value is returned.
     *
     * @param string $key     The key of the value
     * @param mixed  $default The default value
     *
     * @return mixed The parameter if it exists, the default value otherwise
     */
    public function getParameter($key, $default = null);

    /**
     * Retrieves one parameter from this provider.
     *
     * If the parameter does not exists, an ParameterNotFoundException is thrown.
     *
     * @param string $key The key of the value
     *
     * @throws ParameterNotFoundException If the parameter does not exist
     *
     * @return mixed The parameter if it exists
     */
    public function getParameterOrFail($key);

    /**
     * Retrieves all parameters from this provider.
     *
     * @return array The parameter collection
     */
    public function allParameters();

}
