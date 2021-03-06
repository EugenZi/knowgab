<?php

namespace Common\Database;

use \Common\Config\Config;

class Connector
{
    private static $instance = null;

    /**
     * @param Config $config
     * @return \PDO
     */
    public static function getInstance(Config $config)
    {
        $dbConfig = $config['database'];

        if (!(self::$instance instanceof \PDO)) {
            self::$instance = new \PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['password'], [
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8"'
            ]);
        }

        return self::$instance;
    }

    private function __construct() {}
    private function __clone()     {}
    private function __sleep()     {}
    private function __wakeup()    {}
}