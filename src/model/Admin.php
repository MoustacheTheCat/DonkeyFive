<?php

namespace Application\Model\Admin;

require 'src/model/User.php';
require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;
use Application\Model\User;

class Admin extends User {

    public function __construct(
        private $adminId = null,
        private $adminFirstName = null,
        private $adminLastName = null,
        private $adminEmail = null,
        private $adminPassword = null,
        private $adminNumber = null,
        private $adminPicture = null,
        private $adminRole = null,
        private $pdo = null,
        )
    {
        $this->pdo = DatabaseConnection::getDataBase();
    }

    public function getAdmin(): array
    {
        return [
            'userId' => $this->getUserId(),
            'userFirstName' => $this->getUserFirstName(),
            'userLastName' => $this->getUserLastName(),
            'userEmail' => $this->getUserEmail(),
            'userPassword' => $this->getUserPassword(),
            'userNumber' => $this->getUserNumber(),
            'userPicture' => $this->getUserPicture(),
            'userRole' => $this->getUserRole(),
        ];
    }

    public function addAdmin()
    {
        $errorArray = [];
        if(isset($_POST['register'])){
            if(empty($_POST['adminFirstName'])){
                $errorArray['adminFirstName'] = "Please enter your first name";
            }
            if(empty($_POST['adminLastName'])){
                $errorArray['adminLastName'] = "Please enter your last name";
            }
            if(empty($_POST['adminEmail'])){
                $errorArray['adminEmail'] = "Please enter your email";
            }
            if(empty($_POST['adminPassword'])){
                $errorArray['adminPassword'] = "Please enter your password";
            }
            if(empty($_POST['adminPasswordConfirm'])){
                $errorArray['adminPasswordConfirm'] = "Please enter your password again";
            }
            if(empty($_POST['adminNumber'])){
                $errorArray['adminNumber'] = "Please enter your phone number";
            }
            if(empty($_POST['adminPicture'])){
                $errorArray['adminPicture'] = "Please enter your picture";
            }
            if(empty($errorArray)){
                if($_POST['adminPassword'] != $_POST['adminPasswordConfirm']){
                    $errorArray['adminPasswordConfirm'] = "Please enter the same password";
                    return $errorArray;
                }else {
                    $password = password_hash($adminPassword,PASSWORD_ARGON2I);
                }
                $adminPicture = $this->addUserPicture();
                $query = $this->pdo->prepare('INSERT INTO users (userFirstName, userLastName, userEmail, userPassword, userNumber, userPicture, userRole) VALUES (:adminFirstName, :adminLastName, :adminEmail, :adminPassword, :adminNumber,:adminPicture, :adminRole)');
                $query->bindValue(':adminFirstName',$_POST['adminFirstName']); 
                $query->bindValue(':adminLastName',  $_POST['adminLastName']); 
                $query->bindValue(':adminEmail', $_POST['adminEmail']); 
                $query->bindValue(':adminPassword',$password); 
                $query->bindValue(':adminNumber', $_POST['adminNumber']); 
                $query->bindValue(':adminPicture', $adminPicture()); 
                $query->bindValue(':adminRole', 2); 
                if($query->execute()){
                    $result = "admin created";
                    return $result;
                }else{
                    $error = "admin not created";
                    return $error;
                }
            }else {
                return $errorArray;
            }
        }
    }

    public function updateAdmin()
    {
        if(empty($id)){
            $error = "not id Admin selected for update";
            return $error;
        }else {
            $admin = self::getOneUser($id);
            if(!isset($id)){
                $error = "Admin not found";
                return $error;
            }
            else {
                if(!empty($_POST['adminFirstName'])){
                    if ($_POST['adminFirstName'] != $admin['userFirstName']){
                        $adminFirstName = $_POST['adminFirstName'];
                    }
                    else {
                        $adminFirstName = $admin['userFirstName'];
                    }
                }
                if(!empty($_POST['adminLastName'])){
                    if ($_POST['adminLastName'] != $admin['userLastName']){
                        $adminLastName = $_POST['adminLastName'];
                    } 
                    else {
                        $adminLastName = $admin['userLastName'];
                    }
                }
                if(!empty($_POST['adminEmail'])){
                    if ($_POST['adminEmail'] != $admin['userEmail']){
                        $adminEmail = $_POST['adminEmail'];
                    } 
                    else {
                        $adminEmail = $admin['userEmail'];
                    }
                }
                if(!empty($_POST['adminNumber'])){
                    if ($_POST['adminNumber'] != $admin['userNumber']){
                        $adminNumber = $_POST['adminNumber'];
                    } 
                    else {
                        $adminNumber = $admin['userNumber'];
                    }
                }
                if(!empty($_POST['adminPicture'])){
                    if ($_POST['adminPicture'] != $admin['userPicture']){
                        $adminPicture = $this-> updatePictureUser();
                    } 
                    else {
                        $adminPicture = $admin['userPicture'];
                    }
                }
                $query = $this->pdo->prepare('UPDATE users SET userFirstName = :adminFirstName, userLastName = :adminLastName, userEmail = :adminEmail, userNumber = :adminNumber, userPicture = :adminPicture WHERE adminId = :adminId');
                $query->bindValue(':adminId', $id, \PDO::PARAM_INT); 
                $query->bindValue(':adminFirstName',$adminFirstName); 
                $query->bindValue(':adminLastName',  $adminLastName); 
                $query->bindValue(':adminEmail', $adminEmail); 
                $query->bindValue(':adminNumber', $adminNumber); 
                $query->bindValue(':adminPicture', $adminPicture()); 
                if($query->execute()){
                    $result  = "admin Updated";
                    return $result;
                }else{
                    $error = "admin not updated";
                    return $error;
                }
            }
        }
    }
}