<?php
namespace App;

use Core\App;
use Core\DB;

class AppController
{
    public function show()
    {
        $result = App::database()->fetchAll();
        return require 'views/show.view.php';
    }
    public function showFiltLevel($level)
    {
        $result = App::database()->fetchByLevel($level);
        return require 'views/show.view.php';
    }

    public function showFiltHost($host)
    {
        $result = App::database()->fetchByHost($host);
        return require 'views/show.view.php';
    }
}
