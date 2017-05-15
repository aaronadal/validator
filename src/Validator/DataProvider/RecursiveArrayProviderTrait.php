<?php

namespace Aaronadal\Validator\Validator\DataProvider;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
trait RecursiveArrayProviderTrait
{

    private function getRegex()
    {
        return '/(.*?)(\[.*?\])+$/';
    }

    /**
     * Checks if a parameter key specifies an array access. I.e. "items[0]"
     * 
     * @param $key
     *
     * @return int
     */
    protected function isRecursiveArrayParameter($key)
    {
        return preg_match($this->getRegex(), $key);
    }

    /**
     * Converts all the [xxx] contained in the parameter key into array accesses.
     *
     * @param $key
     *
     * @return mixed|null
     */
    protected function getRecursiveArrayParameter($key)
    {
        $matches = array();
        preg_match($this->getRegex(), $key, $matches);
        
        if(count($matches) > 2) {
            $name = $matches[1];
            $array = $this->getParameter($name);
            foreach(array_slice($matches, 2) as $match) {
                $recursiveKey = str_replace(array('[', ']'), array('', ''), $match);
                if((is_array($array) || $array instanceof \ArrayAccess) && array_key_exists($recursiveKey, $array)) {
                    $array = $array[$recursiveKey];
                }
                else {
                    $array = null;
                }
            }

            return $array;
        }

        return null;
    }
}
