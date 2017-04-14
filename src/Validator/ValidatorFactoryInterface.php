<?php

namespace Aaronadal\Validator\Validator;


/**
 * Interface for instantiate new validators. Feel free to implement this interface to automatically inject your
 * own common properties to the new validators.
 *
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
interface ValidatorFactoryInterface
{

    /**
     * Creates and initializes a new ValidatorInterface instance.
     *
     * @param string $class   The validator class.
     * @param array  ...$args The __construct args.
     *
     * @return ValidatorInterface The new validator.
     */
    public function newValidator($class, ...$args);

}
