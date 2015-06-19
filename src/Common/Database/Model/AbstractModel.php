<?php

namespace Common\Database\Model;

use Common\Database\Connector;

abstract class AbstractModel implements ModelInterface, \ArrayAccess
{
    /**
     * @var \PDO
     */
    protected static $connector;

    /**
     * @var string
     */
    protected static $query  = '';

    /**
     * @var \PDOStatement
     */
    protected static $stmt   = null;

    /**
     * @var array
     */
    protected static $params  = [];

    /**
     * @var \ArrayObject
     */
    protected static $dataSet  = null;

    protected static $instance = null;

    public function __construct(Connector $connector) {
        self::$connector = $connector;
        self::$dataSet   = new \ArrayObject([], \ArrayObject::STD_PROP_LIST);
        self::$instance  = $this;
    }

    public static function getInstance(Connector $connector) {
        return new static($connector);
    }

    public static function query($query) {
        $query       = filter_var($query, STREAM_FILTER_ALL);
        self::$query = $query;
        return self::$instance;
    }

    public static function select(array $columns) {
        self::$query = 'SELECT ' . implode(',', $columns);
        self::$query.= ' FROM '  . self::getTableName();
        return self::$instance;
    }

    public function where(array $condition) {
        self::$query.= self::$query . ' WHERE ' . implode(' ', $condition);
        return $this;
    }

    public function andWhere(array $condition) {
        self::$query.= self::$query . ' AND WHERE ' . implode(' ', $condition);
        return $this;
    }

    public function orWhere(array $condition) {
        self::$query.= self::$query . ' OR WHERE ' . implode(' ', $condition);
        return $this;
    }

    public static function find($id, $columns = '*', $mode = \PDO::FETCH_OBJ) {
        $id          = filter_var($id, FILTER_FLAG_ALLOW_OCTAL);
        $columns     = implode(',', $columns);
        self::$query = 'SELECT ' . $columns . ' FROM ' . self::getTableName();
        self::$query.= ' WHERE id = ' . $id;
        self::$query.= ' LIMIT 1 ';

        return self::$connector
            ->query(self::$query)
            ->fetch($mode);
    }

    public static function findBy(array $conditions, $columns = null, $mode = \PDO::FETCH_OBJ) {
        $id          = filter_var_array($conditions, FILTER_FLAG_ENCODE_HIGH);
        $columns     = implode(',', $columns);
        self::$query = 'SELECT ' . $columns . ' FROM ' . self::getTableName();
        self::$query.= ' WHERE id = ' . $id;
        self::$query.= ' LIMIT 1 ';

        return self::$connector
            ->query(self::$query)
            ->fetch($mode);
    }

    public function findAll($condition = [], $columns = [], $mode = \PDO::FETCH_OBJ) {

        $id          = filter_var_array($condition, FILTER_DEFAULT);
        $columns     = implode(',', $columns);
        self::$query = 'SELECT ' . $columns . ' FROM ' . self::getTableName();
        self::$query.= ' WHERE id = ' . $id;

        return self::$connector
            ->query(self::$query)
            ->fetch($mode);
    }

    public function destroy(array $condition) {

    }

    public function update(array $conditions = null) {

        return $this;
    }

    public function fetchResult($type) {

    }

    public function resetData() {
        self::$query   = null;
        self::$params  = null;
        self::$dataSet = null;
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
        return self::$dataSet->offsetExists($offset);
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
        return self::$dataSet->offsetGet($offset);
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
        self::$dataSet->offsetSet($offset, $value);
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
        self::$dataSet->offsetUnset($offset);
    }
}