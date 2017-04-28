<?php

namespace Aaronadal\Validator\Validator\DataSetter;


/**
 * Maps an object to a data setter.
 *
 * When an attribute is supplied, the object setter for that attribute is invoked.
 *
 * Supports only set prefixes.
 *
 * For example:
 * - If a 'foo' parameter is supplied, the object setFoo method will be invoked.
 * - Ir a 'foo_bar' parameter is supplied, the object setFooBar method will be invoked.
 *
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
class DefaultObjectDataSetter extends ObjectDataSetter
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
            if(substr($method->getName(), 0, 3) === 'set') {
                $key   = $this->camelCaseToUnderscore(substr($method->getName(), 3));
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
