<?php

namespace Application;

require_once('src/config/Config.php');
require_once('src/lib/DatabaseConnection.php');
require_once('src/controller/HomeController.php');
require_once('src/controller/UserController.php');
require_once('src/controller/OptionController.php');


use Application\Controller\HomeController;
use Application\Controller\UserController;
use Application\Controller\OptionController;

class Routes
{
    public function run()
    {
        if(empty($_GET)) {
            //OptionController::index();
            HomeController::index();
            // UserController::index();
        } else {
            $controller = $_GET['controller'];
            $action = $_GET['action'];
            $controller = 'Application\Controller\\' . ucfirst($controller) . 'Controller';
            $controller::$action();


        }
    }
}

$routes = new Routes();
$routes->run();