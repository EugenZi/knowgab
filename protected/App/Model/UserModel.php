<?php

namespace App\Model;

use Common\Database\Model\AbstractModel;

class UserModel extends AbstractModel
{
    const TABLE_NAME = 'users';

    public static function getTableName()
    {
        return self::TABLE_NAME;
    }

    public static function getRelations()
    {
        return [];
    }
}