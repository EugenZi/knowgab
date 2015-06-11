<?php

namespace Common\Database;

use \Common\Config\Config;

class Connector
{
    private static $instace = null;

    private function __construct($dsn, $username, $password) {
        self::$instace = new \PDO($dsn, $username, $password);
    }

    public static function getInstance(Config $config)
    {
        $dbConfig = $config['database'];

        if (!(self::$instace instanceof \PDO)) {
            (new self($dbConfig['dsn'], $config['username'], $dbConfig['password']));
        }

        return self::$instace;
    }

    private function __clone()  {}
    private function __sleep()  {}
    private function __wakeup() {}
}