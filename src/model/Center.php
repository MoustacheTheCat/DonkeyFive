<?php

namespace Application\Model;


class Center {
    

    public function __construct(
        private $centerId = null,
        private $centerName = null,
        private $centerCity = null,
        private $centerAddress = null,
        private $centerZip = null,
        private $centerCountry = null,
        private $centerNumber = null,
        private $centerEmail = null,
        private $centerInfo = null,
        private $centerPicture = null,
        private $center = null,
        private $centers = null,
        private $pdo = null,
        )
    {
        $this->pdo = \Application\lib\DatabaseConnection::getDataBase();
    }

    public function getCenterId(): int
    {
        return $this->centerId;
    }

    public function getCenterName(): string
    {
        return $this->centerName;
    }

    public function getCenterCity(): string
    {
        return $this->centerCity;
    }

    public function getCenterAddress(): string
    {
        return $this->centerAddress;
    }

    public function getCenterZip(): string
    {
        return $this->centerZip;
    }

    public function getCenterInfo(): string
    {
        return $this->centerInfo;
    }

    public function getCenterCountry(): string
    {
        return $this->centerCountry;
    }

    public function getCenterNumber(): string
    {
        return $this->centerNumber;
    }

    public function getCenterEmail(): string
    {
        return $this->centerEmail;
    }

    public function getCenterPicture()
    {
        return $this->centerPicture;
    }

    public function setCenterId(int $centerId): void
    {
        $this->centerId = $centerId;
    }

    public function setCenterName(string $centerName): void
    {
        $this->centerName = $centerName;
    }

    public function setCenterInfo(string $centerInfo): void
    {
        $this->centerInfo = $centerInfo;
    }

    public function setCenterCity(string $centerCity): void
    {
        $this->centerCity = $centerCity;
    }

    public function setCenterAddress(string $centerAddress): void
    {
        $this->centerAddress = $centerAddress;
    }

    public function setCenterZip(string $centerZip): void
    {
        $this->centerZip = $centerZip;
    }

    public function setCenterCountry(string $centerCountry): void
    {
        $this->centerCountry = $centerCountry;
    }

    public function setCenterNumber(string $centerNumber): void
    {
        $this->centerNumber = $centerNumber;
    }

    public function setCenterEmail(string $centerEmail): void
    {
        $this->centerEmail = $centerEmail;
    }

    public function setCenterPicture($centerPicture): void
    {
        $this->centerPicture = $centerPicture;
    }

    public function getCenter(): array
    {
        return [
            'centerId' => $this->getCenterId(),
            'centerName' => $this->getCenterName(),
            'centerCity' => $this->getCenterCity(),
            'centerAddress' => $this->getCenterAddress(),
            'centerZip' => $this->getCenterZip(),
            'centerCountry' => $this->getCenterCountry(),
            'centerNumber' => $this->getCenterNumber(),
            'centerEmail' => $this->getCenterEmail(),
            'centerInfo' => $this->getCenterInfo(), 
            'centerPicture' => $this->getCenterPicture(),
        ];
        
    }

    

    public function setCenter(array $center)
    {
        $this->setCenterId($center['centerId']);
        $this->setCenterName($center['centerName']);
        $this->setCenterCity($center['centerCity']);
        $this->setCenterAddress($center['centerAddress']);
        $this->setCenterZip($center['centerZip']);
        $this->setCenterCountry($center['centerCountry']);
        $this->setCenterNumber($center['centerNumber']);
        $this->setCenterEmail($center['centerEmail']);
        $this->setCenterInfo($center['centerInfo']);
        $this->setCenterPicture($center['centerPicture']);
    }

    public function getAllCenters(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `centers`");
        $stmt->execute();
        $centers = $stmt->fetchAll();
        foreach($centers as $center){
            $this->setCenter($center);
            $this->centers[$center['centerId']] = $this->getCenter();
        }
        
        return $this->centers;
    }

    public function getOneCenter($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `centers` WHERE `centerId` = $id");
        $stmt->execute();
        $center = $stmt->fetch();
        $this->setCenter($center);
        $this->center[] = $this->getCenter();
        return $this->center;
    }

    public function getSelectCenterCitys(): array
    {
        $centers = $this->getAllCenters();
        $arrayCitys = [];
        foreach ($centers as $center) {
            if(!in_array($center['centerCity'], $arrayCitys)){
                $arrayCitys[$center['centerId']] = $center['centerName'];
            }
        }
        return $arrayCitys;
    }

    public function addCheck()
    {
        $errorArray = [];
        if(empty($_POST['centerName'])){
            $errorArray[] = "Name is empty";
        }
        if(empty($_POST['centerCity'])){
            $errorArray[] = "City is empty";
        }
        if(empty($_POST['centerAddress'])){
            $errorArray[] = "Address is empty";
        }
        if(empty($_POST['centerZip'])){
            $errorArray[] = "Zip is empty";
        }
        if(empty($_POST['centerCountry'])){
            $errorArray[] = "Country is empty";
        }
        if(empty($_POST['centerNumber'])){
            $errorArray[] = "Number is empty";
        }
        if(empty($_POST['centerEmail'])){
            $errorArray[] = "Email is empty";
        }
        if(empty($_POST['centerDescription'])){
            $errorArray[] = "Info is empty";
        }
        if(empty($_POST['centerPicture'])){
            $picture = null;
        }
        else {
            $picture = $this->addcenterPicture();
        }
        if(empty($errorArray)){
            $stmt = $this->pdo->prepare("INSERT INTO `centers` (`centerName`, `centerCity`, `centerAddress`, `centerZip`, `centerCountry`, `centerNumber`, `centerEmail`,centerInfo,centerPicture) VALUES (:centerName, :centerCity, :centerAddress, :centerZip, :centerCountry, :centerNumber, :centerEmail ,:centerInfo,:centerPicture)");
            $stmt->bindValue(':centerName', $_POST['centerName']);
            $stmt->bindValue(':centerCity', $_POST['centerCity']);
            $stmt->bindValue(':centerAddress', $_POST['centerAddress']);
            $stmt->bindValue(':centerZip', $_POST['centerZip']);
            $stmt->bindValue(':centerCountry', $_POST['centerCountry']);
            $stmt->bindValue(':centerNumber', $_POST['centerNumber']);
            $stmt->bindValue(':centerEmail', $_POST['centerEmail']);
            $stmt->bindValue(':centerInfo', $_POST['centerDescription']);
            $stmt->bindValue(':centerPicture', $picture);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }else {
            return $errorArray;
        }
    }

    public function updateCheck()
    {
        $id = $_GET['id'];
        $st = new Center();
        $center = $st->getOneCenter($id);
        if(empty($_POST['centerName'])){
            $centerName = $center['centerName'];
        }
        else {
            $centerName = $_POST['centerName'];
        }
        if(empty($_POST['centerCity'])){
            $centerCity = $center['centerCity'];
        }
        else {
            $centerCity = $_POST['centerCity'];
        }
        if(empty($_POST['centerAddress'])){
            $centerAddress = $center['centerAddress'];
        }
        else {
            $centerAddress = $_POST['centerAddress'];
        }
        if(empty($_POST['centerZip'])){
            $centerZip = $center['centerZip'];
        }
        else {
            $centerZip = $_POST['centerZip'];
        }
        if(empty($_POST['centerCountry'])){
            $centerCountry = $center['centerCountry'];
        }
        else {
            $centerCountry = $_POST['centerCountry'];
        }
        if(empty($_POST['centerNumber'])){
            $centerNumber = $center['centerNumber'];
        }
        else {
            $centerNumber = $_POST['centerNumber'];
        }
        if(empty($_POST['centerEmail'])){
            $centerEmail = $center['centerEmail'];
        }
        else {
            $centerEmail = $_POST['centerEmail'];
        }
        if(empty($_POST['centerInfo'])){
            $centerInfo = $center['centerInfo'];
        }
        else {
            $centerInfo = $_POST['centerInfo'];
        }

        $stmt = $this->pdo->prepare("UPDATE `centers` SET `centerName` = :centerName, `centerCity` = :centerCity, `centerAddress` = :centerAddress, `centerZip` = :centerZip, `centerCountry` = :centerCountry, `centerNumber` = :centerNumber, `centerEmail` = :centerEmail WHERE `centerId` = :centerId");
        $stmt->bindValue(':centerId', $id);
        $stmt->bindValue(':centerName', $centerName);
        $stmt->bindValue(':centerCity', $centerCity);
        $stmt->bindValue(':centerAddress', $centerAddress);
        $stmt->bindValue(':centerZip', $centerZip);
        $stmt->bindValue(':centerCountry', $centerCountry);
        $stmt->bindValue(':centerNumber', $centerNumber);
        $stmt->bindValue(':centerEmail', $centerEmail);
        $stmt->bindValue(':centerInfo', $centerInfo);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        if($_SESSION['center']['centerRole'] == 1){
            $center = $this->getOneCenter($id);
            $this->deletePicture();
            $stmt = $this->pdo->prepare("DELETE FROM `centers` WHERE `centerId` = :centerId");
            $stmt->bindValue(':centerId', $id);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        
    }

    public function addcenterPicture() {
        $target_dir = "/var/www/html/donkeyfive/src/public/img/center/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $target_file = $target_dir . basename($_FILES["centerPicture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $errorArray = [];
    
        $check = getimagesize($_FILES["centerPicture"]["tmp_name"]);
        if ($check === false) {
            $errorArray[] = "File is not an image.";
            return $errorArray;
        }
        if (file_exists($target_file)) {
            $errorArray[] = "Sorry, file already exists.";
        }
    
        if ($_FILES["centerPicture"]["size"] > 500000) {
            $errorArray[] = "Sorry, your file is too large.";
        }
        if ($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg") {
            $errorArray[] = "Sorry, only PNG, JPG, and JPEG files are allowed.";
        }
        if (empty($errorArray)) {
            if (move_uploaded_file($_FILES["centerPicture"]["tmp_name"], $target_file)) {
                return basename($_FILES["centerPicture"]["name"]);
            } else {
                $errorArray[] = "Sorry, there was an error uploading your file.";
            }
        }
    
        return $errorArray;
    }

    public function updatePictureCenter(){
        $id = $_GET['id'];
        $data = new Center();
        $center =  $data->getOneCenter($id);
        if($center[0]['centerPicture'] != $_FILES['centerPicture']['name']){
            $this->deletePicture();
            $picture = $this->addcenterPicture();
            if(!is_array($picture)){
                $query = $this->pdo->prepare('UPDATE centers SET centerPicture = :centerPicture WHERE centerId = :centerId');
                $query->bindValue(':centerId', $id, \PDO::PARAM_INT);
                $query->bindValue(':centerPicture', $picture);
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

    function deletePicture(){
        if(file_exists('src/public/img/center/'.$center['centerPicture'])){
            unlink('src/public/img/center/'.$center['centerPicture']);
        }
    }



    

}