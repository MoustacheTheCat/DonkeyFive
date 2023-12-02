<?php

namespace Application;

session_start();
print_r($_SESSION);
require_once('src/config/Config.php');
require_once('src/lib/DatabaseConnection.php');
require_once('src/controller/HomeController.php');
require_once('src/controller/UserController.php');
require_once('src/controller/AdminController.php');
require_once('src/controller/OptionController.php');
require_once('src/controller/FieldController.php');
require_once('src/controller/FilterController.php');
require_once('src/controller/CenterFieldsController.php');
require_once('src/controller/MessageController.php');
require_once('src/controller/FieldsOptionsController.php');
require_once('src/controller/CartController.php');
require_once('src/controller/CardHomeController.php');



use Application\Controller\HomeController;
use Application\Controller\UserController;
use Application\Controller\AdminController;
use Application\Controller\OptionController;
use Application\Controller\FieldController;
use Application\Controller\FilterController;
use Application\Controller\CenterFieldsController;
use Application\Controller\MessageController;
use Application\Controller\FieldsOptionsController;
use Application\Controller\CartController;
use Application\Controller\CardHomeController;




class Routes
{
    private $routes = [
        '/' => ['controller' => 'HomeController', 'method' => 'index', 'static' => true],

        '/filter' => ['controller' => 'FilterController', 'method' => 'index', 'static' => true],

        '/contact' => ['controller' => 'MessageController', 'method' => 'contact', 'static' => true],
        '/contact/submit' => ['controller' => 'MessageController', 'method' => 'addCheck', 'static' => true],

        '/field' => ['controller' => 'FieldsOptionsController', 'method' => 'show', 'static' => true],

        '/field/rent' => ['controller' => 'FieldsOptionsController', 'method' => 'showForrent', 'static' => true],
        '/field/rent/check' => ['controller' => 'CartController', 'method' => 'addCheck', 'static' => true],
        '/field/time/check' => ['controller' => 'CartController', 'method' => 'timeCheck', 'static' => true],

        '/center/field' => ['controller' => 'CenterFieldsController', 'method' => 'index', 'static' => true],

        '/login' => ['controller' => 'UserController', 'method' => 'login', 'static' => true],
        '/login/submit' => ['controller' => 'UserController', 'method' => 'loginCheck', 'static' => true],
        '/logout' => ['controller' => 'UserController', 'method' => 'logout', 'static' => true],

        '/forgot/password' => ['controller' => 'UserController', 'method' => 'forgotPassword', 'static' => true],
        '/forgot/submit' => ['controller' => 'UserController', 'method' => 'sendMailResetPassword', 'static' => true],
        '/forgot/reset' => ['controller' => 'UserController', 'method' => 'forgotPasswordReset', 'static' => true],
        '/forgot/reset/submit' => ['controller' => 'UserController', 'method' => 'forgotPasswordCheck', 'static' => true],


        '/user/add' => ['controller' => 'UserController', 'method' => 'add', 'static' => true],
        '/user/add/check' => ['controller' => 'UserController', 'method' => 'addCheck', 'static' => false],
        '/user/edit' => ['controller' => 'UserController', 'method' => 'edit', 'static' => true],
        '/user/edit/password' => ['controller' => 'UserController', 'method' => 'resetPasswordCheck', 'static' => true],
        '/user/edit/picture' => ['controller' => 'UserController', 'method' => 'updatePicture', 'static' => true],
        '/user/profil' => ['controller' => 'UserController', 'method' => 'profil', 'static' => true],


        '/admin/add' => ['controller' => 'AdminController', 'method' => 'add', 'static' => true],
        '/admin/edit' => ['controller' => 'AdminController', 'method' => 'edit', 'static' => true],
        '/admin/profil' => ['controller' => 'AdminController', 'method' => 'profil', 'static' => true],

        '/option' => ['controller' => 'OptionController', 'method' => 'index', 'static' => true],

        '/carts' => ['controller' => 'CartController', 'method' => 'displayCarts', 'static' => true],
        '/cart/details' => ['controller' => 'CartController', 'method' => 'displayCartDetails', 'static' => true],
        '/cart/delete' => ['controller' => 'CartController', 'method' => 'deleteCheck', 'static' => true], 
        
        '/messages' => ['controller' => 'MessageController', 'method' => 'viewMessages', 'static' => true],

        '/card/home' => ['controller' => 'CardHomeController', 'method' => 'viewCardHomeDetail', 'static' => true]

    ];

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        if (array_key_exists($uri, $this->routes)) {
            $route = $this->routes[$uri];
            $controllerName = 'Application\Controller\\' . $route['controller'];
            $methodName = $route['method'];
            $isStatic = $route['static'] ?? false;
            var_dump($route);
            var_dump($controllerName);
            var_dump($methodName);
            var_dump($isStatic);
            if ($isStatic) {
                var_dump(is_callable([$controllerName, $methodName]));

                // die();
                if (is_callable([$controllerName, $methodName])) {
                    if ($method == 'POST') {

                        if ($uri == '/filter') {
                            if (isset($_POST['filterForRentalOrCountry'])) {
                                $datas = $_POST;
                                call_user_func([$controllerName, $methodName], $datas);
                            }
                            if ($uri == '/user/edit/password') {
                                $data = new $controllerName();
                                $data->$methodName();
                            }
                        } else {
                            call_user_func([$controllerName, $methodName]);
                        }
                    } elseif ($method == 'GET') {
                        if ($uri == '/center/field') {
                            call_user_func([$controllerName, $methodName], 1);
                        } elseif ($uri == '/forgot/reset' && !empty($_GET['id'])) {
                            $id = $_GET['id'];
                            call_user_func([$controllerName, $methodName], $id);
                        } elseif ($uri == '/user/edit' && !empty($_GET['id'])) {
                            $id = $_GET['id'];
                            call_user_func([$controllerName, $methodName], $id);
                        } elseif ($uri == '/admin/edit' && !empty($_GET['id'])) {
                            $id = $_GET['id'];
                            call_user_func([$controllerName, $methodName], $id);
                        } else {
                            call_user_func([$controllerName, $methodName]);
                        }
                    } else {
                        $errorMessage = "404 Not Found - Static method not found";
                        require_once('src/template/Error.php');
                    }
                } else {
                    $errorMessage = "404 Not Found - Static method not found";
                    require_once('src/template/Error.php');
                }
            } else {
                if (class_exists($controllerName) && is_callable($controllerName, $methodName)) {
                    if ($method == 'POST' && $uri == '/filter') {
                        if (isset($_POST['filterForRentalOrCountry'])) {
                            $datas = $_POST;
                            $fields = $controller->$methodName($datas);
                        }
                    } elseif ($method == 'POST' && $uri == '/user/add/check') {
                        $data = new $controllerName();
                        $data->$methodName();
                    } elseif ($method == 'GET') {
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



$routes = new Routes();
$routes->run();
