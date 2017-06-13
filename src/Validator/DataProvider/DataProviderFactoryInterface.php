<?php

namespace Aaronadal\Validator\Validator\DataProvider;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
interface DataProviderFactoryInterface
{

    /**
     * Creates a new DataProviderInterface from any given source.
     *
     * @param mixed $source
     *
     * @return DataProviderInterface
     */
    public function newDataProvider($source);

}
