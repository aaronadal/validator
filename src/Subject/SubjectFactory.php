<?php

namespace Aaronadal\Validator\Subject;


use Aaronadal\Validator\Validator\DataProvider\DataProviderFactoryInterface;
use Aaronadal\Validator\Validator\DataSetter\DataSetterFactoryInterface;
use Aaronadal\Validator\Validator\ErrorCollector\ErrorCollectorInterface;

/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class SubjectFactory implements SubjectFactoryInterface
{

    private $dataProviderFactory;
    private $dataSetterFactory;

    /**
     * Creates a new SubjectFactory instance.
     *
     * @param DataProviderFactoryInterface $dataProviderFactory
     * @param DataSetterFactoryInterface   $dataSetterFactory
     */
    public function __construct(
        DataProviderFactoryInterface $dataProviderFactory,
        DataSetterFactoryInterface $dataSetterFactory
    ) {
        $this->dataProviderFactory = $dataProviderFactory;
        $this->dataSetterFactory   = $dataSetterFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function newSubject($id, $provider = null, $setter = null, ErrorCollectorInterface $errorCollector = null)
    {
        $provider = $this->newDataProvider($provider);
        $setter   = $this->newDataSetter($setter);

        $subject  = new Subject($id, $provider, $setter, $errorCollector);

        return $subject;
    }

    protected function newDataProvider($provider)
    {
        return $this->dataProviderFactory->newDataProvider($provider);
    }

    protected function newDataSetter($setter)
    {
        return $this->dataSetterFactory->newDataSetter($setter);
    }
}
