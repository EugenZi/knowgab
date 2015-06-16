<?php

namespace App\Model;

use Common\Database\Model\AbstractModel;

class DictionaryThemeModel extends AbstractModel
{
    const TABLE_NAME = 'dictionary_themes';

    public static function getTableName()
    {
        return self::TABLE_NAME;
    }

    public static function getRelations()
    {
        return [];
    }
}