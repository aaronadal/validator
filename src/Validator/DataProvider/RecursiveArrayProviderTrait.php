<?php

namespace Aaronadal\Validator\Validator\DataProvider;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
trait RecursiveArrayProviderTrait
{

    private function getRecursiveArrayRegex()
    {
        return '/(.*?)(\[.*?\])/';
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
        return preg_match($this->getRecursiveArrayRegex(), $key);
    }

    /**
     * Converts all the [xxx] contained in the parameter key into array accesses.
     *
     * @param      $key
     * @param null $default
     *
     * @return mixed|null
     */
    protected function getRecursiveArrayParameter($key, $default = null)
    {
        $matches = array();
        preg_match_all($this->getRecursiveArrayRegex(), $key, $matches);

        $array = null;
        if(count($matches) === 3 && count($matches[0]) > 0) {
            $name = $matches[1][0];
            $array = $this->getParameter($name);
            foreach($matches[2] as $match) {
                $recursiveKey = str_replace(array('[', ']'), array('', ''), $match);
                if((is_array($array) || $array instanceof \ArrayAccess) && array_key_exists($recursiveKey, $array)) {
                    $array = $array[$recursiveKey];
                }
                else {
                    $array = null;
                }
            }
        }

        return $array ?: $default;
    }
}
