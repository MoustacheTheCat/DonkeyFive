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

        public static function showAllUser()
        {
            $user = new User();
            $users = $user->getAllUsers();
            $arrayUser = [];
            foreach($users as $user){
                if($user['userRole'] == 2){
                    $arrayUser[] = $user;
                }
            }
            $datas = $arrayUser;
            $pageTitle = "Users";
            if(empty($datas)){
                $error = "Aucune donnée à afficher";
            }
            require_once('src/template/ViewAll.php');
        }

        public static function showAllAdmin()
        {
            $user = new User();
            $users = $user->getAllUsers();
            $arrayUser = [];
            foreach($users as $user){
                if($user['userRole'] == 1){
                    $arrayUser[] = $user;
                }
            }
            $datas = $arrayUser;
            $pageTitle = "Admins";
            if(empty($datas)){
                $error = "Aucune donnée à afficher";
            }
            require_once('src/template/ViewAll.php');
        }
    
        public static function viewOneUser($userId)
        {
            $user = new User();
            $user = $user->getOneUser($userId);
            $pageTitle = "User";
            require_once('src/template/User.php');
        }

        public static function profil()
        {
            $user = new User();
            $user = $user->getOneUser(intval($_SESSION['user']['userId']));
            $pageTitle = "Admin";
            require_once('src/template/ProfileUser.php');
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
            $res = $user->addUser();
            if($res){
                $result = "user created";
                header('Location: /');
            }else{
                $error = "user not created";
                header('Location: /user/add');
            }
            
        }
    
        public static function edit($id)
        {
            $user = new User();
            $user = $user->getOneUser(intval($id));
            $pageTitle = "Edit user";
            require_once('src/template/EditUser.php');
        }
    
        public static function editCheck($userId)
        {
            $user = new User();
            $user->updateUser();
            header('Location: /users');
        }

        public static function delete()
        {
            $pageTitle = "Delete User";
            require_once('src/template/DeleteUser.php');
        }

        public static function deleteCheck()
        {
            $id = $_GET['id'];
            $user = new User();
            $res = $user->delete($id);
            if($res){
                $user->logout();
                $result = "user deleted";
                header('Location: /'); 
            }else{
                $error = $res;
                header('Location: /');
            }
        }

        public static function login()
        {
            $pageTitle = "Login";
            require_once('src/template/Login.php');
        }

        public static function loginCheck()
        {
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
            header('Location: /');
        }

        public static function resetPasswordCheck()
        {
            $user = new User();
            $check = $user->resetPasswordCheck();
            if($check){
                $result = "Password updated";
            }else{
                $error = "Password not updated";
            }
            header('Location: /');
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

        public static function updatePicture()
        {
            $user = new User();
            $id = intval($_SESSION['user']['userId']);
            $user->updatePictureUser();
            if($user){
                $result = "Picture updated";
                header('Location: /user/profil');
            }else{
                $error = "Picture not updated";
                require_once('src/template/ProfileUser.php');
            }
        }

        

}