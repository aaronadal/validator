<?php

namespace Aaronadal\Validator\Validator\DataProvider;


/**
 * Maps an object to a data provider.
 *
 * When an attribute is requested, the object getter for that attribute is invoked and its result returned.
 *
 * Supports get and is prefixes.
 *
 * For example:
 * - If a 'foo' parameter is requested, the object getFoo/isFoo method will be invoked.
 * - Ir a 'foo_bar' parameter is requested, the object getFooBar/isFooBar method will be invoked.
 *
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class DefaultObjectDataProvider extends ObjectDataProvider
{

    /**
     * {@inheritdoc}
     */
    protected function getKeyMethodMapping()
    {
        $mapping    = array();
        $object     = $this->getObject();
        $reflection = new \ReflectionClass(get_class($object));
        foreach($reflection->getMethods() as $method) {
            $key = $value = null;
            if(substr($method->getName(), 0, 3) === 'get') {
                $key   = $this->camelCaseToUnderscore(substr($method->getName(), 3));
                $value = $method->getName();
            }
            else if(substr($method->getName(), 0, 2) === 'is') {
                $key   = $this->camelCaseToUnderscore(substr($method->getName(), 2));
                $value = $method->getName();
            }

            if($key !== null && $value !== null) {
                $mapping[$key] = $value;
            }
        }

        return $mapping;
    }

    private function camelCaseToUnderscore($string)
    {
        $string = lcfirst($string);
        $regex  = '#([A-Z])#';

        return strtolower(preg_replace($regex, '_$1', $string));
    }
}
