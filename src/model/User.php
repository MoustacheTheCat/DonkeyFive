<?php

namespace Application\Model;

require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;

class User {
    public function __construct(
        private $userId = null,
        private $userFirstName = null,
        private $userLastName = null,
        private $userEmail = null,
        private $userPassword = null,
        private $userNumber = null,
        private $userAddress = null,
        private $userZip = null,
        private $userCity = null,
        private $userCountry = null,
        private $userBirthDay = null,
        private $userpicture = null,
        public $userRole = null,
        private $user = [],
        private $users = [],
        private $pdo = null,
        )
    {
        $this->pdo = DatabaseConnection::getDataBase();
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getUserFirstName(): string
    {
        return $this->userFirstName;
    }

    public function getUserLastName(): string
    {
        return $this->userLastName;
    }

    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    public function getUserPassword(): string
    {
        return $this->userPassword;
    }

    public function getUserNumber(): string
    {
        return $this->userNumber;
    }

    public function getUserAddress(): string
    {
        return $this->userAddress;
    }

    public function getUserZip(): string
    {
        return $this->userZip;
    }

    public function getUserCity(): string
    {
        return $this->userCity;
    }

    public function getUserCountry(): string
    {
        return $this->userCountry;
    }

    public function getuserBirthDay(): string
    {
        return $this->userBirthDay;
    }

    public function getUserpicture(): string
    {
        return $this->userpicture;
    }

    public function getUserRole(): string
    {
        return $this->userRole;
    }

    public function setUserRole(string $userRole): void
    {
        $this->userRole = $userRole;
    }

    public function setUserpicture(string $userpicture): void
    {
        $this->userpicture = $userpicture;
    }

    public function setuserBirthDay(string $userBirthDay): void
    {
        $this->userBirthDay = $userBirthDay;
    }

    public function setUserCountry(string $userCountry): void
    {
        $this->userCountry = $userCountry;
    }

    public function setUserCity(string $userCity): void
    {
        $this->userCity = $userCity;
    }

    public function setUserZip(string $userZip): void
    {
        $this->userZip = $userZip;
    }

    public function setUserAddress(string $userAddress): void
    {
        $this->userAddress = $userAddress;
    }

    public function setUserNumber(string $userNumber): void
    {
        $this->userNumber = $userNumber;
    }

    public function setUserPassword(string $userPassword): void
    {
        $this->userPassword = $userPassword;
    }

    public function setUserEmail(string $userEmail): void
    {
        $this->userEmail = $userEmail;
    }

    public function setUserLastName(string $userLastName): void
    {
        $this->userLastName = $userLastName;
    }

    public function setUserFirstName(string $userFirstName): void
    {
        $this->userFirstName = $userFirstName;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getUser(): array
    {
        return [
            'userId' => $this->getUserId(),
            'userFirstName' => $this->getUserFirstName(),
            'userLastName' => $this->getUserLastName(),
            'userEmail' => $this->getUserEmail(),
            'userPassword' => $this->getUserPassword(),
            'userNumber' => $this->getUserNumber(),
            'userAddress' => $this->getUserAddress(),
            'userZip' => $this->getUserZip(),
            'userCity' => $this->getUserCity(),
            'userCountry' => $this->getUserCountry(),
            'userBirthDay' => $this->getuserBirthDay(),
            'userpicture' => $this->getUserpicture(),
            'userRole' => $this->getUserRole(),
        ];
    }

    public function getAllUsers(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM users');
        $query->execute();
        $this->users = $query->fetchAll();
        return $this->users;
    }  

    public function getOneUser($id)
    {
        $query = $this->pdo->prepare('SELECT * FROM users WHERE userId = :userId');
        $query->bindValue(':userId', $id, \PDO::PARAM_INT); 
        $query->execute();
        $data = $query->fetch();
        
        return $data;
        // $this->users = $query->fetch();
        // return $this->users;
    }


    public function addUserPicture() {
        $target_dir = "/var/www/html/donkeyfive/src/public/img/user/img/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $target_file = $target_dir . basename($_FILES["userPicture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        // Initialisation d'un tableau pour stocker les erreurs potentielles
        $errorArray = [];
    
        // Vérification si le fichier est une image
        $check = getimagesize($_FILES["userPicture"]["tmp_name"]);
        if ($check === false) {
            $errorArray[] = "File is not an image.";
            return $errorArray;
        }
    
        // Vérification si le fichier existe déjà
        if (file_exists($target_file)) {
            $errorArray[] = "Sorry, file already exists.";
        }
    
        // Vérification de la taille du fichier
        if ($_FILES["userPicture"]["size"] > 500000) {
            $errorArray[] = "Sorry, your file is too large.";
        }
    
        // Vérification du type de fichier
        if ($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg") {
            $errorArray[] = "Sorry, only PNG, JPG, and JPEG files are allowed.";
        }
    
        // Si aucune erreur, procéder au chargement du fichier
        if (empty($errorArray)) {
            if (move_uploaded_file($_FILES["userPicture"]["tmp_name"], $target_file)) {
                return basename($_FILES["userPicture"]["name"]);
            } else {
                $errorArray[] = "Sorry, there was an error uploading your file.";
            }
        }
    
        return $errorArray;
    }

    public function updatePictureUser(){
        $userId = $_SESSION['user']['userId'];
        $user = self::getOneUser($userId);
        if($user['userPicture'] != $_FILES['userPicture']['name']){
            $picture = $this->addUserPicture();
            if(!is_array($picture)){
                $query = $this->pdo->prepare('UPDATE users SET userPicture = :userPicture WHERE userId = :userId');
                $query->bindValue(':userId', $userId, \PDO::PARAM_INT);
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

    
    public function addUser()
    {
        $errorArray = [];
        if(isset($_POST['register'])){
            if(empty($_POST['userFirstName'])){
                $errorArray['userFirstName'] = "Please enter your first name";
            }
            if(empty($_POST['userLastName'])){
                $errorArray['userLastName'] = "Please enter your last name";
            }
            if(empty($_POST['userEmail'])){
                $errorArray['userEmail'] = "Please enter your email";
            }
            if(empty($_POST['userPassword'])){
                $errorArray['userPassword'] = "Please enter your password";
            }
            if(empty($_POST['userPasswordConfirm'])){
                $errorArray['userPasswordConfirm'] = "Please enter your password again";
            }
            if(empty($_POST['userNumber'])){
                $errorArray['userNumber'] = "Please enter your phone number";
            }
            if(empty($_POST['userAddress'])){
                $errorArray['userAddress'] = "Please enter your address";
            }
            if(empty($_POST['userZip'])){
                $errorArray['userZip'] = "Please enter your zip code";
            }
            if(empty($_POST['userCity'])){
                $errorArray['userCity'] = "Please enter your city";
            }
            if(empty($_POST['userCountry'])){
                $errorArray['userCountry'] = "Please enter your country";
            }
            if(empty($_POST['userBirthDay'])){
                $errorArray['userBirthDay'] = "Please enter your birthdate";
            }
            if(empty($_POST['userpicture'])){
                $userpicture = "default.png";
            }
            else {
                $userpicture = $this->addUserPicture();
            }
            if(empty($errorArray)){
                if($_POST['userPassword'] != $_POST['userPasswordConfirm']){
                    $errorArray['userPasswordConfirm'] = "Please enter the same password";
                    return $errorArray;
                }else {
                    $password = password_hash($_POST['userPassword'],PASSWORD_ARGON2I);
                    $query = $this->pdo->prepare('INSERT INTO users (userFirstName, userLastName, userEmail, userPassword, userNumber, userAddress, userZip, userCity, userCountry, userBirthDay, userPicture, userRole) VALUES (:userFirstName, :userLastName, :userEmail, :userPassword, :userNumber, :userAddress, :userZip, :userCity, :userCountry, :userBirthDay, :userpicture, :userRole)');
                    $query->bindValue(':userFirstName',$_POST['userFirstName']); 
                    $query->bindValue(':userLastName',  $_POST['userLastName']); 
                    $query->bindValue(':userEmail', $_POST['userEmail']); 
                    $query->bindValue(':userPassword',$password); 
                    $query->bindValue(':userNumber', $_POST['userNumber']); 
                    $query->bindValue(':userAddress',  $_POST['userAddress']); 
                    $query->bindValue(':userZip', $_POST['userZip']); 
                    $query->bindValue(':userCity',  $_POST['userCity']); 
                    $query->bindValue(':userCountry', $_POST['userCountry']); 
                    $query->bindValue(':userBirthDay',  $_POST['userBirthDay']); 
                    $query->bindValue(':userpicture', $userpicture); 
                    $query->bindValue(':userRole', 2); 
                    if($query->execute()){
                        $to = $_POST['userEmail'];
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

    public function updateUser($id)
    {
        if(empty($id)){
            $error = "not id user selected for update";
            return $error;
        }else {
            $user = self::getOneUser($id);
            if(!isset($user)){
                $error = "user not found";
                return $error;
            }
            else {
                if(!empty($_POST['userFirstName'])){
                    if ($_POST['userFirstName'] != $user['userFirstName']){
                        $userFirstName = $_POST['userFirstName'];
                    }
                    else {
                        $userFirstName = $user['userFirstName'];
                    }
                }
                if(!empty($_POST['userLastName'])){
                    if ($_POST['userLastName'] != $user['userLastName']){
                        $userLastName = $_POST['userLastName'];
                    } 
                    else {
                        $userLastName = $user['userLastName'];
                    }
                }
                if(!empty($_POST['userEmail'])){
                    if ($_POST['userEmail'] != $user['userEmail']){
                        $userEmail = $_POST['userEmail'];
                    } 
                    else {
                        $userEmail = $user['userEmail'];
                    }
                }
                if(!empty($_POST['userNumber'])){
                    if ($_POST['userNumber'] != $user['userNumber']){
                        $userNumber = $_POST['userNumber'];
                    } 
                    else {
                        $userNumber = $user['userNumber'];
                    }
                }
                if(!empty($_POST['userAddress'])){
                    if ($_POST['userAddress'] != $user['userAddress']){
                        $userAddress = $_POST['userAddress'];
                    } 
                    else {
                        $userAddress = $user['userAddress'];
                    }
                }
                if(!empty($_POST['userZip'])){
                    if ($_POST['userZip'] != $user['userZip']){
                        $userZip = $_POST['userZip'];
                    } 
                    else {
                        $userZip = $user['userZip'];
                    }
                }
                if(!empty($_POST['userCity'])){
                    if ($_POST['userCity'] != $user['userCity']){
                        $userCity = $_POST['userCity'];
                    } 
                    else {
                        $userCity = $user['userCity'];
                    }
                }
                if(!empty($_POST['userCountry'])){
                    if ($_POST['userCountry'] != $user['userCountry']){
                        $userCountry = $_POST['userCountry'];
                    } 
                    else {
                        $userCountry = $user['userCountry'];
                    }
                }
                if(!empty($_POST['userBirthDay'])){
                    if ($_POST['userBirthDay'] != $user['userBirthDay']){
                        $userBirthDay = $_POST['userBirthDay'];
                    } 
                    else {
                        $userBirthDay = $user['userBirthDay'];
                    }
                }
                if(!empty($_POST['userpicture'])){
                    if ($_POST['userpicture'] != $user['userpicture']){
                        $userPicture = $this->updatePictureUser();
                    } 
                    else {
                        $userPicture = $user['userpicture'];
                    }
                }
                $query = $this->pdo->prepare('UPDATE users SET userFirstName = :userFirstName, userLastName = :userLastName, userEmail = :userEmail, userNumber = :userNumber, userAddress = :userAddress, userZip = :userZip, userCity = :userCity, userCountry = :userCountry, userBirthDay = :userBirthDay, userpicture = :userpicture WHERE userId = :userId');
                $query->bindValue(':userId', $id, \PDO::PARAM_INT); 
                $query->bindValue(':userFirstName',$userFirstName); 
                $query->bindValue(':userLastName',  $userLastName); 
                $query->bindValue(':userEmail', $userEmail); 
                $query->bindValue(':userNumber', $userNumber); 
                $query->bindValue(':userAddress',  $userAddress); 
                $query->bindValue(':userZip', $userZip); 
                $query->bindValue(':userCity',  $userCity); 
                $query->bindValue(':userCountry', $userCountry); 
                $query->bindValue(':userBirthDay',  $userBirthDay); 
                $query->bindValue(':userpicture', $userpicture); 
                if($query->execute()){
                    $result  = "user Updated";
                    return $result;
                }else{
                    $error = "user not updated";
                    return $error;
                }
            }
        }
    }
    // 
    public function delete($id)
    {
        if(empty($id)){
            $error = "not id user selected for delete";
            return $error;
        }else {
            $user = self::getOneUser($id);
            $password = $_POST['userPassword'];
            if(!isset($user) && password_verify($userPassword, $user['userPassword'])){
                $query = $this->pdo->prepare('DELETE FROM users WHERE userId = :userId');
                $query->bindValue(':userId', $id, \PDO::PARAM_INT); 
                if($query->execute()){
                    $result  = "user Deleted";
                    return $result;
                }else{
                    $error = "user not Deleted";
                    return $error;
                }
            }else {
                $error = "user not found";
                return $error;
            }
            
        }
    }

    public function loginCheck()
    {
        $userEmail = $_POST['email'];
        $userPassword = $_POST['password'];
        $query = $this->pdo->prepare('SELECT * FROM users WHERE userEmail = :userEmail');
        $query->bindValue(':userEmail', $userEmail); 
        $query->execute();
        $user = $query->fetch();
        if($user != false){
            if (password_verify($userPassword, $user['userPassword'])) {
                $_SESSION['user']['userId'] = $user['userId'];
                $_SESSION['user']['userEmail'] = $user['userEmail'];
                $_SESSION['user']['userRole'] = $user['userRole'];
                $result = "user connected";
                return $result;
            } else {
                return $error = "Password is incorrect";
            }
        }else {
            return $error = "Email is incorrect";
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $result = "user disconnected";
        return $result;
    }
//
    public function resetPassWordCheck()
    {
        $userId = $_SESSION['user']['userId'];
        $userPassword = $_POST['userPassword'];
        $newUserPassword = $_POST['newUserPassword'];
        $newUserPasswordConfirm = $_POST['newUserPasswordConfirm'];
        $user = self::getOneUser($userId);
        if($password_verify($userPassword, $user['userPassword'])){
            if($newUserPassword === $newUserPasswordConfirm){
                $password = password_hash($newUserPassword,PASSWORD_ARGON2I);
                $query = $this->pdo->prepare('UPDATE users SET userPassword = :userPassword WHERE userId = :id');
                $query->bindValue(':id', $userId, \PDO::PARAM_INT); 
                $query->bindValue(':userPassword',$password); 
                if($query->execute()){
                    $result = "Password updated";
                    return true;
                }else{
                    
                    return false;
                }
            }
        }
    }

    public function sendMailResetPassword(){
        $userEmail = $_POST['email'];
        $query = $this->pdo->prepare('SELECT * FROM users WHERE userEmail = :userEmail');
        $query->bindValue(':userEmail', $userEmail); 
        $query->execute();
        $user = $query->fetch();
        if($user != false){
            $to = $user['userEmail'];
            $subject = "Reset Password";
            $message = "Hello, you can reset your password by clicking on this link : http://donkeyfive.com/forgot/reset?id=".$user['userId'];
            $headers = "From: admin@donkeyfive.com";
            mail($to, $subject, $message, $headers);
            if(mail($to, $subject, $message, $headers)){
                $result = "Mail send";
                return $result;
            }else{
                $error = "Mail not send";
                return $error;
            }
        }else {
            $error = "Email is incorrect";
            return $error;
        }   
    }

    public function forgotPasswordCheck()
    {
        $userEmail = $_POST['userEmail'];
        $newUserPassword = $_POST['newUserPassword'];
        $newUserPasswordConfirm = $_POST['newUserPasswordConfirm'];
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE userEmail = :userEmail');    
        $stmt->bindValue(':userEmail', $userEmail);
        $stmt->execute();
        $user = $stmt->fetch();
        if($user != false){
            if($newUserPassword === $newUserPasswordConfirm){
                $password = password_hash($newUserPassword,PASSWORD_ARGON2I);
                $query = $this->pdo->prepare('UPDATE users SET userPassword = :userPassword WHERE userId = :id');
                $query->bindValue(':id',$user['userId'], \PDO::PARAM_INT); 
                $query->bindValue(':userPassword',$password); 
                if($query->execute()){
                    $result = "Password updated";
                    return $result;
                }else{
                    $error = "Password not updated";
                    return $error;
                }
            }
        }else {
            $error = "Email is incorrect";
            return $error;
        } 
    }
    
}
