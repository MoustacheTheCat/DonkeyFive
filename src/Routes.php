<?php

namespace Application;

require_once('src/config/Config.php');
require_once('src/lib/DatabaseConnection.php');
require_once('src/controller/HomeController.php');
require_once('src/controller/AdminController.php');
require_once('src/controller/OptionController.php');
require_once('src/controller/FieldController.php');
require_once('src/controller/FilterController.php');
require_once('src/controller/CenterFieldsController.php');



use Application\Controller\HomeController;
use Application\Controller\UserController;
use Application\Controller\OptionController;
use Application\Controller\FieldController;
use Application\Controller\FilterController;
use Application\Controller\CenterFieldsController;




class Routes
{
    private $routes = [
        '/' => ['controller' => 'HomeController', 'method' => 'index', 'static' => true],
        '/filter' => ['controller' => 'FilterController', 'method' => 'index', 'static' => true],
        '/field' => ['controller' => 'FieldController', 'method' => 'index', 'static' => true],
        '/center/field' => ['controller' => 'CenterFieldsController', 'method' => 'index', 'static' => true],
        '/login' => ['controller' => 'UserController', 'method' => 'login', 'static' => true],
        '/login/submit' => ['controller' => 'UserController', 'method' => 'loginCheck', 'static' => true],
        '/logout' => ['controller' => 'UserController', 'method' => 'logout', 'static' => true],
        '/forgot/password' => ['controller' => 'UserController', 'method' => 'forgotPassword', 'static' => true],
        '/forgot/submit' => ['controller' => 'UserController', 'method' => 'sendMailResetPassword', 'static' => true],
        '/forgot/reset' => ['controller' => 'UserController', 'method' => 'forgotPasswordReset', 'static' => true],
        '/forgot/reset/submit' => ['controller' => 'UserController', 'method' => 'forgotPasswordCheck', 'static' => true],

        
        '/user/add' => ['controller' => 'UserController', 'method' => 'add', 'static' => true],
       
        '/admin/add'=> ['controller' => 'AdminController', 'method' => 'add', 'static' => true],

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
                if ($method == 'POST') {
                    if($uri == '/filter'){
                        if (isset($_POST['filterForRentalOrCountry'])) {
                            $datas = $_POST;
                            call_user_func([$controllerName, $methodName], $datas);
                        }
                    }else{
                        call_user_func([$controllerName, $methodName]);
                    }
                } elseif ($method == 'GET') {
                    if($uri == '/center/field'){
                        call_user_func([$controllerName, $methodName],1);
                    }
                    elseif($uri == '/forgot/reset' && !empty($_GET['id'])){
                        $id = $_GET['id'];
                        call_user_func([$controllerName, $methodName], $id);
                    }
                    else {
                        call_user_func([$controllerName, $methodName]);
                    }
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