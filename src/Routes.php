<?php

namespace Application;

require_once('src/config/Config.php');
require_once('src/lib/DatabaseConnection.php');
require_once('src/controller/HomeController.php');
require_once('src/controller/UserController.php');
require_once('src/controller/OptionController.php');
require_once('src/controller/FieldController.php');
require_once('src/controller/FilterController.php');


use Application\Controller\HomeController;
use Application\Controller\UserController;
use Application\Controller\OptionController;
use Application\Controller\FieldController;
use Application\Controller\FilterController;


class Routes
{
    private $routes = [
        '/' => ['controller' => 'HomeController', 'method' => 'index', 'static' => true],
        '/filter' => ['controller' => 'FilterController', 'method' => 'index', 'static' => true]
    ];

    public function run()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $method = $_SERVER['REQUEST_METHOD'];
    if (array_key_exists($uri, $this->routes)) {
        $route = $this->routes[$uri];
        $controllerName = 'Application\Controller\\' .$route['controller'];
        $methodName = $route['method'];
        $isStatic = $route['static'] ?? false; 
        if ($isStatic) {
            if (is_callable([$controllerName, $methodName])) {
                if ($method == 'POST' && $uri == '/filter') {
                    if (isset($_POST['filterForRentalOrCountry'])) {
                        $datas = $_POST;
                        call_user_func([$controllerName, $methodName], $datas);
                    }
                } elseif ($method == 'GET') {
                    call_user_func([$controllerName, $methodName]);
                }else {
                    $errorMessage = "404 Not Found - Static method not found";
                    require_once('src/template/Error.php');
                }
        } else {
            die();
            if (class_exists($controllerName) && is_callable($controllerName, $methodName)) {
                if($method == 'POST' && $uri == '/filter'){
                    if(isset($_POST['filterForRentalOrCountry'])){
                        $datas = $_POST;
                        $fields = $controller->$methodName($datas);
                    }
                } elseif($method == 'GET'){
                    $controller->$methodName();
                }
            } else {
                $errorMessage = "404 Not Found - Controller or Method not found";
                require_once('src/template/Error.php');
            }
        }
    } else {
        $errorMessage = "404 Not Found - Route not found";
        require_once('src/template/Error.php');
    }
}
}
}


$routes = new Routes();
$routes->run();