<?php

namespace Core;

use Core\DB;

//this is a constainer
class App
{
    public static function database()
    {
        $db = new DB;
        $db->connect();
        return $db;
    }
}
