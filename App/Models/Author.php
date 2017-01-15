<?php

namespace App\Models;

use App\Model;
use App\Db;

class Author
    extends Model
{

    public static $table = 'authors';

    public $firstname;
    public $lastname;

}