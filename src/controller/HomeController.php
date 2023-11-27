<?php

namespace Application\Controller;

require_once('src/controller/CenterController.php');

use Application\Controller\CenterController\CenterController;
class HomeController
{
    public static function index()
    {
        $pageTitle = "Donkey Car";
        CenterController::index();
        require_once('src/template/Home.php');
    }
}

