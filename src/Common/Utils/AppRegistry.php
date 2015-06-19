<?php
/**
 * Created by PhpStorm.
 * User: ezi
 * Date: 6/19/15
 * Time: 1:25 PM
 */

namespace Common\Utils;


class AppRegistry
{
    /**
     * @var \ArrayObject
     */
    private static $instance = null;

    /**
     * @return AppRegistry
     */
    public static function getInstance()
    {
        if (!(self::$instance instanceof \ArrayObject)) {
            self::$instance = new \ArrayObject([], \ArrayObject::STD_PROP_LIST);
        }

        return self::$instance;
    }

    public static function get($key) {
        $registry = self::$instance;
        return $registry->offsetExists($key) ? $registry->offsetGet($key) : null;
    }

    public static function set($key, $val) {
        self::$instance->offsetSet($key, $val);
    }

    private function __construct() {}
    private function __clone()     {}
    private function __sleep()     {}
    private function __wakeup()    {}
}