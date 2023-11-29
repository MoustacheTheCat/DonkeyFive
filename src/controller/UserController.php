<?php

namespace Application\Controller;

require_once('src/model/User.php');

use Application\Model\User;


class UserController {

        public static array $pays = [
            "France", "Germany", "Italy", "Spain", "United Kingdom", "Netherlands",
            "Belgium", "Sweden", "Poland", "Switzerland", "Norway", "Denmark",
            "Finland", "Austria", "Portugal", "Greece", "Ireland", "Czech Republic",
            "Hungary", "Croatia", "United States", "Canada", "Australia", "India", "China"
        ];
        
        public static function viewAllUser()
        {
            $user = new User();
            $users = $user->getAllUsers();
        }
    
        public static function viewOneUser($userId)
        {
            $user = new User();
            $user = $user->getOneUser($userId);
            $pageTitle = "User";
            require_once('src/template/User.php');
        }
    
        public static function add()
        {
            $pageTitle = "Create user";
            $pays = self::$pays;
            require_once('src/template/CreateUser.php');
        }
    
        public function addCheck()
        {
            $user = new User();
            $user->addUser();
            header('Location: /users');
        }
    
        public static function edit($userId)
        {
            $user = new User();
            $user = $user->getUser($userId);
            $pageTitle = "Edit user";
            require_once('src/template/EditUser.php');
        }
    
        public static function editCheck($userId)
        {
            $user = new User();
            $user->updateUser();
            header('Location: /users');
        }

        public static function delete($userId)
        {
            $user = new User();
            $user->deleteUser($userId);
            header('Location: /');
        }

        public static function login()
        {
            $pageTitle = "Login";
            require_once('src/template/Login.php');
        }

        public static function loginCheck()
        {
            $userEmail = $_POST['email'];
            $userPassword = $_POST['password'];

            $user = new User();
            $user->loginCheck();
            if(!empty($_SESSION['user'])){
                header('Location: /');
            }else{
                $error = $user->loginCheck();
                require_once('src/template/Login.php');
            }
        }

        public static function logout()
        {
            $user = new User();
            $user->logout();
        }


        public static function resetPassword()
        {
            $pageTitle = "Reset password";
            require_once('src/template/ResetPassword.php');
        }   

        public static function resetPasswordCheck()
        {
            $user = new User();
            $user->resetPasswordCheck();
            header('Location: /login');
        }

        public static function forgotPassword()
        {
            $pageTitle = "Forgot password";
            require_once('src/template/ForgotPassword.php');
        }

        public static function sendMailResetPassword()
        {
            $user = new User();
            $user->sendMailResetPassword();
            header('Location: /login');
        }

        public static function forgotPasswordReset()
        {
            $pageTitle = "Reset Forgot password";
            require_once('src/template/ForgotPasswordReset.php');
        }


        public static function forgotPasswordCheck()
        {
            $user = new User();
            $user->forgotPasswordCheck();
            header('Location: /login');
        }

        

}