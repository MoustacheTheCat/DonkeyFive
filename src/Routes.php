<?php

namespace Application;

require_once('src/config/Config.php');
require_once('src/lib/DatabaseConnection.php');
require_once('src/controller/HomeController.php');
require_once('src/controller/CenterController.php');


use Application\Controller\HomeController;
use Application\Controller\CenterController\CenterController;



class Routes
{
    public function run()
    {
        $centers = new CenterController();
        $centers->index();
        $homeController = new HomeController();
        $homeController->index();
        
    }
}

$routes = new Routes();
$routes->run();