<?php

namespace App\Models;

use App\Model;
use App;

class Article
    extends Model
{

    public static $table = 'news';

    public $title;
    public $text;

    public static function getLatest(int $limit)
    {
        $db = new App\Db();
        $sql = 'SELECT * FROM ' . self::$table . ' ORDER BY id DESC LIMIT ' . $limit;
        return $db->query($sql, [], self::class);
    }

}