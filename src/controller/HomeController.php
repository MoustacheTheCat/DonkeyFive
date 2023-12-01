<?php

namespace Application\Controller;

require_once('src/controller/CenterController.php');
require_once('src/controller/CardHomeController.php');

use Application\Controller\CenterController;
use Application\Controller\CardController;
class HomeController
{
    public static function index()
    {
        $pageTitle = "Donkey Five";
        $kids = CardController::viewCardHomeKid();
        $citys = CenterController::index();
        require_once('src/template/Home.php');
    }
}

