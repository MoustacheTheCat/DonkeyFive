<?php

namespace Application\Controller;

require_once('src/model/User.php');

use Application\Model\User\User;


class UserController {

        public static function index()
        {
            $user = new User();
            $users = $user->getAllUsers();
            $pageTitle = "Users";
            //require_once('src/template/Users.php');
        }
    
        public function show($userId)
        {
            $user = new User();
            $user = $user->getOneUser($userId);
            $pageTitle = "User";
            require_once('src/template/User.php');
        }
    
        public function create()
        {
            $pageTitle = "Create user";
            require_once('src/template/CreateUser.php');
        }
    
        public function store()
        {
            $userFirstName = $_POST['userFirstName'];
            $userLastName = $_POST['userLastName'];
            $userEmail = $_POST['userEmail'];
            $userPassword = $_POST['userPassword'];
            $userNumber = $_POST['userNumber'];
            $userAddress = $_POST['userAddress'];
            $userZip = $_POST['userZip'];
            $userCity = $_POST['userCity'];
            $userCountry = $_POST['userCountry'];
            $userBirthdate = $_POST['userBirthdate'];
            $userpicture = $_POST['userpicture'];
            $userRole = $_POST['userRole'];
            $user = new User();
            $user->createUser($userFirstName, $userLastName, $userEmail, $userPassword, $userNumber, $userAddress, $userZip, $userCity, $userCountry, $userBirthdate, $userpicture, $userRole);
            header('Location: /users');
        }
    
        public function edit($userId)
        {
            $user = new User();
            $user = $user->getUser($userId);
            $pageTitle = "Edit user";
            require_once('src/template/EditUser.php');
        }
    
        public function update($userId)
        {
            $userFirstName = $_POST['userFirstName'];
            $userLastName = $_POST['userLastName'];
            $userEmail = $_POST['userEmail'];
            $userPassword = $_POST['userPassword'];
            $userNumber = $_POST['userNumber'];
            $userAddress = $_POST['userAddress'];
            $userZip = $_POST['userZip'];
            $userCity = $_POST['userCity'];
            $userCountry = $_POST['userCountry'];
            $userBirthdate = $_POST['userBirthdate'];
            $userpicture = $_POST['userpicture'];
            $user = new User();
            $user->updateUser($userId, $userFirstName, $userLastName, $userEmail, $userPassword, $userNumber, $userAddress, $userZip, $userCity, $userCountry, $userBirthdate, $userpicture);
            header('Location: /users');
        }

        public static function delete($userId)
        {
            $user = new User();
            $user->deleteUser($userId);
            header('Location: /users');
        }

        public static function login()
        {
            $pageTitle = "Login";
            require_once('src/template/Login.php');
        }

        public static function loginCheck()
        {
            $userEmail = $_POST['userEmail'];
            $userPassword = $_POST['userPassword'];

            $user = new User();
            $user->loginCheck($userEmail, $userPassword);
        }

        public static function logout()
        {
            $user = new User();
            $user->logout();
        }

        public static function profile()
        {
            $user = new User();
            $user->profile();
        }

        public static function profileEdit()
        {
            $user = new User();
            $user->profileEdit();
        }

        public function profileUpdate()
        {
            $userFirstName = $_POST['userFirstName'];
            $userLastName = $_POST['userLastName'];
            $userEmail = $_POST['userEmail'];
            $userPassword = $_POST['userPassword'];
            $userNumber = $_POST['userNumber'];
            $userAddress = $_POST['userAddress'];
            $userZip = $_POST['userZip'];
            $userCity = $_POST['userCity'];
            $userCountry = $_POST['userCountry'];
            $userBirthdate = $_POST['userBirthdate'];
            $userpicture = $_POST['userpicture'];

            $user = new User();
            $user->profileUpdate($userFirstName, $userLastName, $userEmail, $userPassword, $userNumber, $userAddress, $userZip, $userCity, $userCountry, $userBirthdate, $userpicture);
            header('Location: /profile');
        }

        public static function profileDelete()
        {
            $user = new User();
            $user->profileDelete();
        }

        public static function profileDeleteConfirm()
        {
            $user = new User();
            $user->profileDeleteConfirm();
        }

        public static function profileDeleteConfirmYes()
        {
            $user = new User();
            $user->profileDeleteConfirmYes();
        }

        public static function profileDeleteConfirmNo()
        {
            $user = new User();
            $user->profileDeleteConfirmNo();
        }

        public static function profileDeleteYes()
        {
            $user = new User();
            $user->profileDeleteYes();
        }





}