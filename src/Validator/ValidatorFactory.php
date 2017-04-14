<?php

namespace Aaronadal\Validator\Validator;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class ValidatorFactory implements ValidatorFactoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function newValidator($class, ...$args)
    {
        return new $class(...$args);
    }

}
