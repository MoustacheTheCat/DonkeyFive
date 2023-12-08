<?php

namespace Application\Model;

require_once('src/model/User.php');
require_once('src/lib/DatabaseConnection.php');
require_once('src/model/Center.php');

use Application\lib\DatabaseConnection;
use Application\Model\User;
use Application\Model\Center;

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
            if(empty($_POST['adminBirthDay'])){
                $errorArray['adminBirthDay'] = "Please enter your birthday";
            }
            if(empty($_POST['adminPicture'])){
                $adminPicture = null;
            }
            else {
                $adminPicture = $this->addAdminPicture();
            }
            if(empty($errorArray)){
                if($_POST['adminPassword'] != $_POST['adminPasswordConfirm']){
                    $errorArray['adminPasswordConfirm'] = "Please enter the same password";
                    return $errorArray;
                }else {
                    $password = password_hash($_POST['adminPassword'],PASSWORD_ARGON2I);
                    $query = $this->pdo->prepare('INSERT INTO users (userFirstName, userLastName, userEmail, userPassword, userNumber, userPicture, userRole,userBirthDay) VALUES (:adminFirstName, :adminLastName, :adminEmail, :adminPassword, :adminNumber,:adminPicture, :adminRole, :adminBirthDay)');
                    $query->bindValue(':adminFirstName',$_POST['adminFirstName']); 
                    $query->bindValue(':adminLastName',  $_POST['adminLastName']); 
                    $query->bindValue(':adminEmail', $_POST['adminEmail']); 
                    $query->bindValue(':adminPassword',$password); 
                    $query->bindValue(':adminNumber', $_POST['adminNumber']); 
                    $query->bindValue(':adminPicture', $adminPicture); 
                    $query->bindValue(':adminBirthDay', $_POST['adminBirthDay']);
                    $query->bindValue(':adminRole', 1); 
                    if($query->execute()){
                        $adminId = $this->pdo->lastInsertId();
                        $center = new Center();
                        $centerDatas = $center->getAllCenters();
                        $query = $this->pdo->prepare('INSERT INTO donkeyFive.usersCenters (userId, centerId) VALUES (:userId, :centerId)');
                        foreach($centerDatas as $centerData){
                            $query->bindValue(':userId', $adminId, \PDO::PARAM_INT);
                            $query->bindValue(':centerId', $centerData['centerId'], \PDO::PARAM_INT);
                            $query->execute();
                        }
                        $to = $_POST['adminEmail'];
                        $subject = "Crete Account";
                        $message = "Hello, you have created an account on our site, you can now log in with your email and password";
                        $headers = "From: admin@donkeyfive.com";
                        mail($to, $subject, $message, $headers);
                        if(mail($to, $subject, $message, $headers)){
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                }
            }else {
                return $errorArray;
            }
        }
    }

    function deletePicture(){
        if(!empty($admin)){
            if(file_exists('src/public/img/admin/'.$admin['userPicture'])){
                unlink('src/public/img/admin/'.$admin['userPicture']);
            }
        }
        
    }

    public function updateAdmin()
    {
        $id = $_GET['id'];
        if(empty($id)){
            $error = "not id Admin selected for update";
            return $error;
        }else {
            $data = new User();
            $admin = $data->getOneUser($id);
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
                    $adminPicture = $this-> updatePictureAdmin();
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
                $query->bindValue(':adminPicture', $adminPicture); 
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

    public function addAdminPicture() {
        $target_dir = "/var/www/html/donkeyfive/src/public/img/admin/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $target_file = $target_dir . basename($_FILES["userPicture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $errorArray = [];
    
        $check = getimagesize($_FILES["userPicture"]["tmp_name"]);
        if ($check === false) {
            $errorArray[] = "File is not an image.";
            return $errorArray;
        }
        if (file_exists($target_file)) {
            $errorArray[] = "Sorry, file already exists.";
        }
    
        if ($_FILES["userPicture"]["size"] > 500000) {
            $errorArray[] = "Sorry, your file is too large.";
        }
        if ($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg") {
            $errorArray[] = "Sorry, only PNG, JPG, and JPEG files are allowed.";
        }
        if (empty($errorArray)) {
            if (move_uploaded_file($_FILES["userPicture"]["tmp_name"], $target_file)) {
                return basename($_FILES["userPicture"]["name"]);
            } else {
                $errorArray[] = "Sorry, there was an error uploading your file.";
            }
        }
    
        return $errorArray;
    }

    public function updatePictureAdmin(){
        $adminId = $_SESSION['user']['userId'];
        $data = new User();
        $admin =  $data->getOneUser($adminId);
        if($admin['userPicture'] != $_FILES['userPicture']['name']){
            $this->deletePicture();
            $picture = $this->addAdminPicture();
            if(!is_array($picture)){
                $query = $this->pdo->prepare('UPDATE users SET userPicture = :userPicture WHERE userId = :userId');
                $query->bindValue(':userId', $adminId, \PDO::PARAM_INT);
                $query->bindValue(':userPicture', $picture);
                if($query->execute()){
                    return true;
                }else{
                    return false;
                }
            }
            else {
                return $picture;
            }
            
        }else {
            return false;
        }
    }
}