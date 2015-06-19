<?php

namespace Http;


class SessionWrapper implements \ArrayAccess
{
    private $session;

    private static $instance;

    private function __construct() {
        $this->session = &$_SESSION;
    }

    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get($key) {
        return $this->offsetExists($key) ? $this->offsetGet($key) : null;
    }

    public function set($key, $val) {
        $this->offsetSet($key, $val);
        return $this;
    }

    public function start() {
        return session_start();
    }

    public function reset() {
        session_reset();
    }

    public function destroy() {
        session_destroy();
    }

    public function clear() {
        session_unset();
    }

    public function isActive() {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    public function getId() {
        return session_id();
    }

    public function getName() {
        return session_name();
    }

    public function setName($name) {
        session_name($name);
        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->session);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->session[$offset] : null;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to set
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->session[$offset] = $value;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->session[$offset]);
    }
}