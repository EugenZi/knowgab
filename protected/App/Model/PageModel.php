<?php

namespace App\Model;

use Common\Database\Model\AbstractModel;

class PageModel extends AbstractModel
{
    const TABLE_NAME = 'pages';

    public static function getTableName()
    {
        return self::TABLE_NAME;
    }

    public static function getRelations()
    {
        return [];
    }
}