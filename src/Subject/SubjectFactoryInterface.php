<?php

namespace Aaronadal\Validator\Subject;


/**
 * Interface for instantiate new subjects.
 *
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
interface SubjectFactoryInterface
{

    /**
     * Creates and initializes a new SubjectInterface instance.
     *
     * @param string $id       Unique identifier for the new subject instance.
     * @param mixed  $provider The data provider.
     * @param mixed  $setter   The data setter.
     *
     * @return SubjectInterface The new subject.
     */
    public function newSubject($id, $provider = null, $setter = null);

}
