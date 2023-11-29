<?php

namespace Application\Controller;

require_once ('src/model/Admin.php');
require_once ('src/model/User.php');

use Application\Model\Admin;
use Application\Model\User;


class AdminController{
    
        public static function viewAllAdmin()
        {
            $admin = new Admin();
            $admins = $admin->getAllUsers();
        }
    
        public static function viewOneAdmin($adminId)
        {
            $admin = new Admin();
            $admin = $admin->getOneUser($adminId);
            $pageTitle = "Admin";
            require_once('src/template/Admin.php');
        }
        public static function profil()
        {
            $admin = new User();
            $admin = $admin->getOneUser(intval($_SESSION['user']['userId']));
            $pageTitle = "Admin";
            require_once('src/template/ProfileAdmin.php');
        }
    
        public static function add()
        {
            $pageTitle = "Create admin";
            require_once('src/template/CreateAdmin.php');
        }
    
        public function addCheck()
        {
            $admin = new Admin();
            $admin->addAdmin();
            header('Location: /admins');
        }
    
        public static function edit($id)
        {
            $admin = new User();
            $admin = $admin->getOneUser(intval($id));
            $pageTitle = "Edit admin";
            require_once('src/template/EditAdmin.php');
        }
    
        public static function editCheck($adminId)
        {
            $admin = new Admin();
            $admin->updateAdmin();
            header('Location: /admins');
        }

        public static function delete($adminId)
        {
            $admin = new Admin();
            $admin->delete($adminId);
            header('Location: /admins');
        }

        public static function login()
        {
            $pageTitle = "Login";
            require_once('src/template/Login.php');
        }

        public static function loginCheck()
        {
            $admin = new Admin();
            $admin->login();
            header('Location: /admins');
        }

        public static function logout()
        {
            $admin = new Admin();
            $admin->logout();
            header('Location: /');
        }

}