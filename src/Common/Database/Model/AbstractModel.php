<?php

namespace Common\Database\Model;


abstract class AbstractModel
       extends \ArrayIterator
    implements ModelInterface, \ArrayAccess
{
    private $query;
    
    private $params;
    
    private $result;
    
    public function query($query) {

    }

    public function select(array $columns) {

    }

    public function where(array $condition) {

    }

    public function andWhere(array $condition) {

    }

    public function orWhere(array $condition) {

    }

    public function like(array $condition) {

    }

    public function find($id) {

    }

    public function findAll($id) {

    }

    public function destroy(array $condition) {

    }

    public function update($data, array $conditions = null) {

    }

    public function fetchResult($type) {

    }
}