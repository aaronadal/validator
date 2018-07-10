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

    /**
     * @param bool $strict If the check has to treat falsy values as non-error values
     *
     * @return bool true if the subject is valid (has not errors); false otherwise.
     */
    public function isValid($strict = true);

    /**
     * Adds a piece of extra data to this subject.
     *
     * @param string $key
     * @param mixed  $extra
     */
    public function putExtra($key, $extra);

    /**
     * Retrieves an extra previously defined. If not defined, returns null.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getExtra($key);

    /**
     * Returns all the extras.
     *
     * @return array
     */
    public function allExtras();

    /**
     * Sets the extras as an array.
     *
     * @param array $extras
     */
    public function setExtras($extras = []);

    /**
     * ¿Is an extra defined?
     *
     * @param string $key
     * @param bool   $strict
     *
     * @return bool
     */
    public function hasExtra($key, $strict = true);

    /**
     * ¿Has any extra defined?
     *
     * @param bool $strict
     *
     * @return bool
     */
    public function anyExtra($strict = true);

}
