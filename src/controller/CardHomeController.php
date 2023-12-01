<?php

namespace Application\Controller;

require_once('src/model/CardHome.php');

use Application\Model\CardHome;

class CardController {
    public static function viewCardHomeKid()
    {
        $cardHome = new CardHome();
        $cardHomes = $cardHome->getKids();
        return $cardHomes;
    }
}