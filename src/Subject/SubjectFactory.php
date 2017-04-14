<?php

namespace Aaronadal\Validator\Subject;


use Aaronadal\Validator\Validator\DataProvider\ArrayDataProvider;
use Aaronadal\Validator\Validator\DataProvider\DataProviderInterface;
use Aaronadal\Validator\Validator\DataProvider\DefaultObjectDataProvider;
use Aaronadal\Validator\Validator\DataSetter\ArrayDataSetter;
use Aaronadal\Validator\Validator\DataSetter\DataSetterInterface;
use Aaronadal\Validator\Validator\DataSetter\DefaultObjectDataSetter;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class SubjectFactory implements SubjectFactoryInterface
{

    /**
     * Creates and initializes a new SubjectInterface instance.
     *
     * @param string $id       Unique identifier for the new subject instance.
     * @param mixed  $provider If this parameter is an instance of DataProviderInterface, it will
     *                         be used as data provider. If it is an object, an instance of
     *                         DefaultObjectDataProvider will be created. If it is an array, an
     *                         ArrayDataProvider will be initialized with it. Otherwise, an empty
     *                         ArrayDataProvider will be created.
     * @param mixed  $setter   If this parameter is an instance of DataSetterInterface, it will
     *                         be used as data setter. If it is an object, an instance of
     *                         DefaultObjectDataSetter will be created. If it is an array, an
     *                         ArrayDataSetter will be initialized with it. Otherwise, an empty
     *                         ArrayDataSetter will be created.
     *
     * @return SubjectInterface The new subject.
     */
    public function newSubject($id, $provider = null, $setter = null)
    {
        $subject  = new Subject($id);
        $provider = $this->getProperDataProvider($provider);
        $setter   = $this->getProperDataSetter($setter);

        $subject->setDataProvider($provider);
        $subject->setDataSetter($setter);

        return $subject;
    }

    /**
     * Instantiates a DataProviderInterface depending on the $provider argument.
     *
     * @param mixed $provider If this parameter is an instance of DataProviderInterface, it will
     *                        be used as data provider. If it is an object, an instance of
     *                        DefaultObjectDataProvider will be created. If it is an array, an
     *                        ArrayDataProvider will be initialized with it. Otherwise, an empty
     *                        ArrayDataProvider will be created.
     *
     * @return DataProviderInterface
     */
    protected function getProperDataProvider($provider)
    {
        if($provider instanceof DataProviderInterface) {
            // $provider = $provider;
        }
        else if(is_object($provider)) {
            $provider = new DefaultObjectDataProvider($provider);
        }
        else if(is_array($provider)) {
            $provider = new ArrayDataProvider($provider);
        }
        else {
            $provider = new ArrayDataProvider();
        }

        return $provider;
    }

    /**
     * Instantiates a DataSetterInterface depending on the $setter argument.
     *
     * @param mixed $setter If this parameter is an instance of DataSetterInterface, it will
     *                      be used as data setter. If it is an object, an instance of
     *                      DefaultObjectDataSetter will be created. If it is an array, an
     *                      ArrayDataSetter will be initialized with it. Otherwise, an empty
     *                      ArrayDataSetter will be created.
     *
     * @return DataSetterInterface
     */
    protected function getProperDataSetter($setter)
    {
        if($setter instanceof DataSetterInterface) {
            // $setter = $setter;
        }
        else if(is_object($setter)) {
            $setter = new DefaultObjectDataSetter($setter);
        }
        else if(is_array($setter)) {
            $setter = new ArrayDataSetter($setter);
        }
        else {
            $setter = new ArrayDataSetter();
        }

        return $setter;
    }
}
