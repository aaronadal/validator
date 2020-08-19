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
     * @return mixed The parameter if exists, the default value otherwise
     */
    public function getParameter($key, $default = null);

    /**
     * Retrieves multiple values of one parameters from this provider.
     *
     * If the parameter does not exists, the default value is returned.
     *
     * @param string $key     The key of the value
     * @param array  $default The default value
     *
     * @return array The parameter values if the parameter exists, the default value otherwise
     */
    public function getParameterArray($key, $default = []);

    /**
     * Retrieves one parameter from this provider.
     *
     * If the parameter does not exists, a ParameterNotFoundException is thrown.
     *
     * @param string $key The key of the value
     *
     * @throws ParameterNotFoundException If the parameter does not exist
     *
     * @return mixed The parameter if exists
     */
    public function getParameterOrFail($key);

    /**
     * Retrieves multiple values of one parameters from this provider.
     *
     * If the parameter does not exists, a ParameterNotFoundException is thrown.
     *
     * @param string $key The key of the value
     *
     * @throws ParameterNotFoundException If the parameter does not exist
     *
     * @return mixed The parameter if exists
     */
    public function getParameterArrayOrFail($key);

    /**
     * Retrieves all parameters from this provider.
     *
     * @return array The parameter collection
     */
    public function allParameters();

}
