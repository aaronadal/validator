<?php

namespace Aaronadal\Validator\Validator\ErrorCollector;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
interface ErrorCollectorInterface
{

    /**
     * Returns the errors bag.
     *
     * @return MessageBagInterface|string[]
     */
    public function allErrors();

    /**
     * Sets the errors bag.
     *
     * @param MessageBagInterface|string[] $errors
     */
    public function setErrors($errors = []);

    /**
     * Puts an error into this collector.
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
     * If strict is set to false and the collector has only falsy errors, false will be returned.
     *
     * @param bool $strict If the check has to treat falsy values as non-error values
     *
     * @return bool True if this collector has any errors, false otherwise
     */
    public function anyError($strict = true);

    /**
     * Returns the warnings bag.
     *
     * @return MessageBagInterface|string[]
     */
    public function allWarnings();

    /**
     * Sets the warnings bag.
     *
     * @param MessageBagInterface|string[] $warnings
     */
    public function setWarnings($warnings = []);

    /**
     * Puts an warning into this collector.
     *
     * @param string $key   The key that identifies the warning
     * @param string $warning The warning string
     */
    public function putWarning($key, $warning);

    /**
     * Retrieves an warning from this collector.
     *
     * @param string $key The key that identifies the warning
     *
     * @return string|null The warning string or null if not exists an warning for the key
     */
    public function getWarning($key);

    /**
     * Checks if this collector has an warning.
     *
     * If strict is set to false and the warning has a falsy value, false will be returned.
     *
     * @param string $key    The key that identifies the warning
     * @param bool   $strict If the check has to treat falsy values as non-warning values
     *
     * @return bool True if the warning exists, false otherwise
     */
    public function hasWarning($key, $strict = true);

    /**
     * Checks if this collector has at least one warning.
     *
     * If strict is set to false and the collector has only falsy warnings, false will be returned.
     *
     * @param bool $strict If the check has to treat falsy values as non-warning values
     *
     * @return bool True if this collector has any warnings, false otherwise
     */
    public function anyWarning($strict = true);

}
