<?php

namespace Common\Database\Model;


interface ModelInterface
{
    public static function getTableName();
    public static function getRelations();
}