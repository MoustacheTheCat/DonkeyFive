<?php

namespace Application\Controller;

require_once('src/model/CardHome.php');

use Application\Model\CardHome;

class CardHomeController {

    
    public static function viewCardHomeEurope()
    {
        $cardHome = new CardHome();
        $cardHomes = $cardHome->getEurope();
        return $cardHomes;
    }
    public static function viewCardHomeLegende()
    {
        $cardHome = new CardHome();
        $cardHomes = $cardHome->getLegende();
        return $cardHomes;
    }

    public static function viewCardHomeChoix()
    {
        $cardHome = new CardHome();
        $cardHomes = $cardHome->getChoix();
        return $cardHomes;
    }


    public static function viewCardHomeTournoi()
    {
        $cardHome = new CardHome();
        $cardHomes = $cardHome->getTournoi();
        return $cardHomes;
    }


    public static function viewCardHomeDetail()
    {
        $id = $_GET['id'];
        $cardHome = new CardHome();
        $cardHome = $cardHome->getCardById($id);
        require_once('src/template/CardHomeDetail.php');
    }
}