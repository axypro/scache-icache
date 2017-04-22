<?php
/**
 * An interface of simple cache
 *
 * @package axy\scahce-icache
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\scache\icache;

/**
 * A cache interface
 */
interface ICache
{
    /**
     * Sets the value of a key
     *
     * @param mixed $key
     * @param mixed $value
     * @param int $expire [optional]
     *        the time of death of this value
     */
    public function set($key, $value, ?int $expire = null): void;

    /**
     * Returns the value of a key
     *
     * @param mixed $key
     * @param int $expire [optional]
     * @param mixed $default [optional]
     * @return mixed
     *         the value or `default` for non-existing or expired
     */
    public function get($key, ?int $expire = null, $default = null);

    /**
     * Deletes a key
     *
     * @param mixed $key
     */
    public function delete($key): void;
}
