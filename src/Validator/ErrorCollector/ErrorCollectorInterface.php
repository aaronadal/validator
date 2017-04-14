<?php

namespace Aaronadal\Validator\Validator\ErrorCollector;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
interface ErrorCollectorInterface
{

    /**
     * Puts an error to this collector.
     *
     * @param string $key   The key that identifies the error
     * @param string $error The error string
     */
    public function putError($key, $error);

    /**
     * Retrieves an error from this collector.
     *
     * @param string $key The key that identifies the error
     *
     * @return string|null The error string or null if not exists an error for the key
     */
    public function getError($key);

    /**
     * Retrieves all errors in the collector.
     *
     * @return array A key-value array with all registered errors.
     */
    public function allErrors();

    /**
     * Checks if this collector has an error.
     *
     * If strict is set to false and the error has a falsy value, false will be returned.
     *
     * @param string $key    The key that identifies the error
     * @param bool   $strict If the check has to treat falsy values as non-error values
     *
     * @return bool True if the error exists, false otherwise
     */
    public function hasError($key, $strict = true);

    /**
     * Checks if this collector has at least one error.
     *
     * If strict is set to false and the error has a falsy value, false will be returned.
     *
     * @param bool $strict If the check has to treat falsy values as non-error values
     *
     * @return bool True if this collector has any errors, false otherwise
     */
    public function hasErrors($strict = true);

}
