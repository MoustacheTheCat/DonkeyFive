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
        $europe = CardHomeController::viewCardHomeEurope();
        $legende = CardHomeController::viewCardHomeLegende();
        $choix = CardHomeController::viewCardHomeChoix();
        $tournoi = CardHomeController::viewCardHomeTournoi();
        $citys = CenterController::index();
        require_once('src/template/Home.php');
    }
}

