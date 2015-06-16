<?php

namespace App\Model;

use Common\Database\Model\AbstractModel;

class DictionaryModel extends AbstractModel
{
    const TABLE_NAME = 'dictionary';

    public static function getTableName()
    {
        return self::TABLE_NAME;
    }

    public static function getRelations()
    {
        return [];
    }
}