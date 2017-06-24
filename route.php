<?php

use App\AppController;

/**
 * [route description]
 * @return AppController action [description]
 *
 *  '/' -> AppController show
 *  '?level=$level' -> AppController showFiltLevel($level)
 * 
 */
function route()
{
    $appCont = new AppController;
    if (isset($_GET['level'])) {
        return $appCont->showFiltLevel($_GET['level']);
    }
    return $appCont->show();
}
