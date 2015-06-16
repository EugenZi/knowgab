<?php

namespace App\Model;

use Common\Database\Model\AbstractModel;

class LangModel extends AbstractModel
{
    const TABLE_NAME = 'langs';

    public static function getTableName()
    {
        return self::TABLE_NAME;
    }

    public static function getRelations()
    {
        return [];
    }
}