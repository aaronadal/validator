<?php

namespace Aaronadal\Validator\Subject;


use Aaronadal\Validator\Validator\ErrorCollector\ErrorCollectorInterface;

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
     * @param string                       $id             Unique identifier for the new subject instance.
     * @param mixed                        $provider       The source of the data provider.
     * @param mixed                        $setter         The target of the data setter.
     * @param ErrorCollectorInterface|null $errorCollector The error collector.
     *
     * @return SubjectInterface The new subject.
     */
    public function newSubject($id, $provider = null, $setter = null, ErrorCollectorInterface $errorCollector = null);

}
