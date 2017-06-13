<?php

namespace Aaronadal\Validator\Validator\ErrorCollector;


/**
 * @author Aarón Nadal <aaronadal.dev@gmail.com>
 */
interface MessageBagInterface extends \ArrayAccess, \Countable, \IteratorAggregate
{

    /**
     * Retrieves a message from this bag.
     *
     * @param string $key The identifier of the message
     *
     * @return string|null The message string or null if not exists an messages for the key
     */
    public function get($key);

    /**
     * Puts a message into this bag.
     *
     * @param string $key     The key that identifies the message
     * @param string $message The message string
     */
    public function put($key, $message);

    /**
     * Retrieves all messages in this bag.
     *
     * @return array A key-value array with all registered messages.
     */
    public function all();

    /**
     * Checks if this bag has a messages.
     *
     * If strict is set to false and the messages has a falsy value, false will be returned.
     *
     * @param string $key    The key that identifies the message
     * @param bool   $strict If the check has to treat falsy values as inexistent values
     *
     * @return bool True if the messages exists, false otherwise
     */
    public function has($key, $strict = true);

    /**
     * Checks if this bag has at least one messages.
     *
     * If strict is set to false and the bag has only falsy messages, false will be returned.
     *
     * @param bool $strict If the check has to treat falsy values as inexistent values
     *
     * @return bool True if this bag has any messages, false otherwise
     */
    public function any($strict = true);

}
