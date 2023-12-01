<?php

namespace Application\Controller;

require_once('src/model/CardHome.php');

use Application\Model\CardHome;

class CardHomeController {
    public static function viewCardHomeKid()
    {
        $cardHome = new CardHome();
        $cardHomes = $cardHome->getKids();
        return $cardHomes;
    }

    public static function viewCardHomeKid2()
    {
        $cardHome = new CardHome();
        $cardHomes = $cardHome->getKid2s();
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