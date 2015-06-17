<?php

namespace Common\Database\Model;

use Common\Database\Connector;

abstract class AbstractModel implements ModelInterface, \ArrayAccess
{
    /**
     * @var \PDO
     */
    private $connector;

    /**
     * @var string
     */
    private $query  = '';

    /**
     * @var \PDOStatement
     */
    private $stmt   = null;

    /**
     * @var array
     */
    private $params = [];

    /**
     * @var \ArrayObject
     */
    private $dataSet = null;

    public function __construct(Connector $connector) {
        $this->connector = $connector;
        $this->dataSet    = new \ArrayObject([], \ArrayObject::STD_PROP_LIST);
    }

    public function query($query) {
        $query       = filter_var($query, STREAM_FILTER_ALL);
        $this->query = $query;
        return $this;
    }

    public function select(array $columns) {
        $this->query = 'SELECT ' . implode(',', $columns);
        $this->query.= ' FROM '  . self::getTableName();
        return $this;
    }

    public function where(array $condition) {
        $this->query.= $this->query . ' WHERE ' . implode(' ', $condition);
        return $this;
    }

    public function andWhere(array $condition) {
        $this->query.= $this->query . ' AND WHERE ' . implode(' ', $condition);
        return $this;
    }

    public function orWhere(array $condition) {
        $this->query.= $this->query . ' OR WHERE ' . implode(' ', $condition);
        return $this;
    }

    public function find($id, $columns = null, $mode = \PDO::FETCH_OBJ) {
        $id          = filter_var($id, FILTER_FLAG_ALLOW_OCTAL);
        $columns     = implode(',', $columns);
        $this->query = 'SELECT ' . $columns . ' FROM ' . self::getTableName();
        $this->query.= ' WHERE id = ' . $id;
        $this->query.= ' LIMIT 1 ';

        return $this
            ->connector
            ->query($this->query)
            ->fetch($mode);
    }

    public function findAll($condition = [], $columns = [], $mode = \PDO::FETCH_OBJ) {

        $id          = filter_var_array($condition, FILTER_DEFAULT);
        $columns     = implode(',', $columns);
        $this->query = 'SELECT ' . $columns . ' FROM ' . self::getTableName();
        $this->query.= ' WHERE id = ' . $id;

        return $this
            ->connector
            ->query($this->query)
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
        $this->query  = null;
        $this->params = null;
        $this->dataSet = null;
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
        return $this->dataSet->offsetExists($offset);
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
        return $this->dataSet->offsetGet($offset);
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
        $this->dataSet->offsetSet($offset, $value);
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
        $this->dataSet->offsetUnset($offset);
    }
}