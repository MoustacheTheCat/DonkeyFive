<?php

namespace Application;

require_once('src/config/Config.php');
require_once('src/lib/DatabaseConnection.php');
require_once('src/controller/HomeController.php');
<<<<<<< HEAD
require_once('src/controller/CenterController.php');
require_once('src/controller/FieldController.php');


use Application\Controller\HomeController;
use Application\Controller\CenterController\CenterController;
use Application\Controller\FieldController\FieldController;


=======
require_once('src/controller/UserController.php');
require_once('src/controller/OptionController.php');


use Application\Controller\HomeController;
use Application\Controller\UserController;
use Application\Controller\OptionController;
>>>>>>> befec704ef41ac1aa9cea7ba46e17e191d0f4d76

class Routes
{
    public function run()
    {
<<<<<<< HEAD
        $centers = new CenterController();
        $centers->index();
        $homeController = new HomeController();
        $homeController->index();
=======
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
>>>>>>> befec704ef41ac1aa9cea7ba46e17e191d0f4d76
    }
}

$routes = new Routes();
$routes->run();
