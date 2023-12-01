<?php

namespace Application\Controller;

require_once('src/controller/CenterController.php');
require_once('src/controller/CardHomeController.php');

use Application\Controller\CenterController;
use Application\Controller\CardHomeController;
class HomeController
{
    public static function index()
    {
        $pageTitle = "Donkey Five";
        $kids = CardHomeController::viewCardHomeKid();
        $kids2 = CardHomeController::viewCardHomeKid2();
        $citys = CenterController::index();
        require_once('src/template/Home.php');
    }
}

