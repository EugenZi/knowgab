<?php

namespace Common\Database\Model;

use Common\Utils\AppRegistry;

abstract class AbstractModel implements ModelInterface, \ArrayAccess
{
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

    /**
     * @var AbstractModel|null
     */
    protected static $instance = null;

    public function __construct() {
        static::$dataSet   = new \ArrayObject([], \ArrayObject::STD_PROP_LIST);
        static::$instance  = $this;
    }

    public static function getInstance() {
        return new static();
    }

    public static function query($query) {
        $query       = filter_var($query);
        static::$query = $query;
        return static::$instance;
    }

    public static function select(array $columns) {
        static::$query = 'SELECT ' . implode(',', $columns);
        static::$query.= ' FROM '  . static::getTableName();
        return static::$instance;
    }

    public function where(array $condition) {
        static::$query.= static::$query . ' WHERE ' . implode(' ', $condition);
        return $this;
    }

    public function andWhere(array $condition) {
        static::$query.= static::$query . ' AND WHERE ' . implode(' ', $condition);
        return $this;
    }

    public function orWhere(array $condition) {
        static::$query.= static::$query . ' OR WHERE ' . implode(' ', $condition);
        return $this;
    }

    public static function find($id = null, $columns = '*', $mode = \PDO::FETCH_OBJ) {
        $id          = self::cleanArgs($id);
        $columns     = implode(',', $columns);

        static::$query = 'SELECT ' . $columns . ' FROM ' . static::getTableName();

        if(is_int($id)) {
            static::$query.= ' WHERE id = ' . $id;
        }

        static::$query.= ' LIMIT 1 ';

        return AppRegistry::get('connector')
            ->query(static::$query)
            ->fetch($mode);
    }

    public static function findAllBy(array $conditions, $columns = ['*'], $mode = \PDO::FETCH_OBJ) {
        static::$query  = self::buildQuery($conditions, $columns);

        return AppRegistry::get('connector')->query(static::$query)->fetch($mode);
    }

    public static function findOneBy(array $conditions = [], array $columns = ['*'], $mode = \PDO::FETCH_OBJ) {
        static::$query  = self::buildQuery($conditions, $columns) . ' LIMIT 1 ';

        return AppRegistry::get('connector')
            ->query(static::$query)
            ->fetch($mode);
    }

    public function destroy(array $condition) {

    }

    public function update(array $conditions = []) {

        return $this;
    }

    public function fetchResult($type) {

    }

    public function resetData() {
        static::$query   = null;
        static::$params  = null;
        static::$dataSet = null;
    }

    private static function buildQuery(array $conditions = [], array $columns = []) {
        $conditions    = self::cleanArgs($conditions);
        $columns       = implode(',', $columns);
        $firstWhereKey = key($conditions);
        $firstWhereVal = array_shift($conditions);

        $query   = 'SELECT ' . $columns . ' FROM ' . static::getTableName();
        $query  .= ' WHERE '. $firstWhereKey . ' = ' . $firstWhereVal;

        foreach ($conditions as $col => $condition) {
            $query .= ' AND WHERE ' . $col . ' = ' . $condition;
        }

        return $query;
    }

    private static function cleanArgs($args) {

        $filterFn = 'filter_var';

        if (is_array($args)) {
            $filterFn = 'filter_var_array';
        }

        return $filterFn($args, FILTER_SANITIZE_STRING);
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
        return static::$dataSet->offsetExists($offset);
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
        return static::$dataSet->offsetGet($offset);
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
        static::$dataSet->offsetSet($offset, $value);
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
        static::$dataSet->offsetUnset($offset);
    }
}