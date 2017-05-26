<?php

namespace Aaronadal\Validator\Validator\DataProvider;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
trait RecursiveObjectProviderTrait
{

    /**
     * Checks if a parameter key specifies an object access. I.e. "item#id"
     *
     * @param $key
     *
     * @return int
     */
    protected function isRecursiveObjectParameter($key)
    {
        return count(explode('#', $key)) > 1;
    }

    /**
     * Converts all the #xxx contained in the parameter key into object accesses via getters or issers.
     *
     * @param      $key
     * @param null $default
     *
     * @return mixed|null
     */
    protected function getRecursiveObjectParameter($key, $default = null)
    {
        $matches = explode('#', $key);

        $obj = null;
        if(count($matches) > 1) {
            $name = $matches[0];
            $obj  = $this->getParameter($name);
            foreach(array_slice($matches, 1) as $match) {
                $recursiveKey = str_replace('#', '', $match);
                if(is_object($obj)) {
                    $reflection = new \ReflectionObject($obj);
                    $property   = $this->underscoreToCamelCase($recursiveKey);
                    $getter     = 'get' . $this->underscoreToCamelCase($recursiveKey, true);
                    $isser      = 'is' . $this->underscoreToCamelCase($recursiveKey, true);
                    if($this->hasPublicProperty($reflection, $property)) {
                        $obj = $obj->$property;
                    }
                    else if($this->hasPublicMethod($reflection, $getter)) {
                        $obj = $obj->$getter();
                    }
                    else if($this->hasPublicMethod($reflection, $isser)) {
                        $obj = $obj->$isser();
                    }
                    else {
                        $obj = null;
                    }
                }
                else if((is_array($obj) || $obj instanceof \ArrayAccess) && array_key_exists($recursiveKey, $obj)) {
                    $obj = $obj[$recursiveKey];
                }
                else {
                    $obj = null;
                }
            }
        }

        return $obj ?: $default;
    }

    private function hasPublicProperty(\ReflectionObject $object, $property)
    {
        if($object->hasProperty($property)) {
            return $object->getProperty($property)->isPublic();
        }

        return false;
    }

    private function hasPublicMethod(\ReflectionObject $object, $method)
    {
        if($object->hasMethod($method)) {
            return $object->getMethod($method)->isPublic();
        }

        return false;
    }

    private function underscoreToCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $string = str_replace('_', '', ucwords($string, '_'));

        if(!$capitalizeFirstCharacter) {
            $string = lcfirst($string);
        }

        return $string;
    }
}
