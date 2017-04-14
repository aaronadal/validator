<?php

namespace Aaronadal\Validator\Validator;


use Aaronadal\Validator\Subject\SubjectInterface;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
interface ValidatorInterface
{

    /**
     * Checks if data is valid.
     *
     * @param SubjectInterface $subject The subject to validate.
     * @param string|null      $action  The requested action. Useful if the validation differs
     *                                  between actions, for example add and edit.
     *
     * @return bool True if valid, false otherwise.
     */
    public function isValid(SubjectInterface $subject, $action = null);

    /**
     * Applies the data changes. This method should be called only when data is valid.
     *
     * @param SubjectInterface $subject The subject to apply.
     * @param string|null      $action  The requested action. Useful if the validation differs
     *                                  between actions, for example add and edit.
     */
    public function apply(SubjectInterface $subject, $action = null);

}
