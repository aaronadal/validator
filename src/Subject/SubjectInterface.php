<?php

namespace Aaronadal\Validator\Subject;


use Aaronadal\Validator\Validator\DataProvider\DataProviderInterface;
use Aaronadal\Validator\Validator\DataSetter\DataSetterInterface;
use Aaronadal\Validator\Validator\ErrorCollector\ErrorCollectorInterface;
use Aaronadal\Validator\Validator\ValidableInterface;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
interface SubjectInterface extends ValidableInterface, DataProviderInterface, DataSetterInterface, ErrorCollectorInterface
{

    /**
     * @return string The unique ID of this subject.
     */
    public function getId();

}
