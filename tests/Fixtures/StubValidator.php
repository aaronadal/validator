<?php

namespace Aaronadal\Tests\Fixtures;


use Aaronadal\Validator\Subject\SubjectInterface;
use Aaronadal\Validator\Validator\ValidatorInterface;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class StubValidator implements ValidatorInterface
{

    public function isValid(SubjectInterface $subject, $action = null)
    {
        return false;
    }

    public function apply(SubjectInterface $subject, $action = null)
    {
        return null;
    }
}
