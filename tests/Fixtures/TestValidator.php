<?php

namespace Aaronadal\Tests\Fixtures;


use Aaronadal\Validator\Subject\SubjectInterface;
use Aaronadal\Validator\Validator\ValidatorInterface;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class TestValidator implements ValidatorInterface
{

    public function isValid(SubjectInterface $subject, $action = null)
    {
        $foo = $subject->getParameter('foo');

        if($foo !== 'bar') {
            $subject->putError('foo', 'Is not "bar"');
        }

        return !$subject->anyError();
    }

    public function apply(SubjectInterface $subject, $action = null)
    {
        $subject->setParameter('foo', $subject->getParameter('foo'));
    }
}
