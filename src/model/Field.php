<?php

namespace Application\Model;

class Field
{
    public function __construct(
        private $fieldId = null,
        private $fieldName = null,
        private $fieldTarifHourHT = null,
        private $fieldTarifDayHT = null,
        private $fieldDescription = null,
        private $fieldPicture  = null,
        private $field = [],
        private $fields = [],
        private $pdo = null,
        ) {
            $this->pdo = \Application\lib\DatabaseConnection::getDataBase();
        }

    public function getFieldId()
    {
        return $this->fieldId;
    }

    public function getFieldName()
    {
        return $this->fieldName;
    }

    public function getFieldTarifHourHT()
    {
        return $this->fieldTarifHourHT;
    }

    public function getFieldDescription()
    {
        return $this->fieldDescription;
    }
 
    public function getFieldTarifDayHT()
    {
        return $this->fieldTarifDayHT;
    }

    public function getFieldPicture()
    {
        return $this->fieldPicture;
    }

    public function setFieldPicture($fieldPicture)
    {
        $this->fieldPicture = $fieldPicture;
        return $this;
    }

    public function setFieldTarifDayHT($fieldTarifDayHT)
    {
        $this->fieldTarifDayHT = $fieldTarifDayHT;
        return $this;
    }

    public function setFieldDescription($fieldDescription)
    {
        $this->fieldDescription = $fieldDescription;
        return $this;
    }

    public function setFieldTarifHourHT($fieldTarifHourHT)
    {
        $this->fieldTarifHourHT = $fieldTarifHourHT;
        return $this;
    }

    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;
        return $this;
    }

    public function setFieldId($fieldId)
    {
        $this->fieldId = $fieldId;
        return $this;
    }

    public function getField()
    {
        return [
        'fieldId' => $this->getFieldId(),
        'fieldName' => $this->getFieldName(),
        'fieldTarifHourHT' => $this->getFieldTarifHourHT(),
        'fieldTarifDayHT' => $this->getFieldTarifDayHT(),
        'fieldPicture' => $this->getFieldPicture(),
        'fieldDescription' => $this->getFieldDescription(),
        'fieldId' => $this->getfieldId(),
        ];
    }

    public function setField(array $field): void
    {
        $this->setFieldId($field['fieldId']);
        $this->setFieldName($field['fieldName']);
        $this->setFieldTarifHourHT($field['fieldTarifHourHT']);
        $this->setFieldTarifDayHT($field['fieldTarifDayHT']);
        $this->setFieldPicture($field['fieldPicture']);
        $this->setfieldId($field['fieldId']);
        $this->setFieldDescription($field['fieldDescription']);
    }

    public function getAllFields()
    {
        $sql = "SELECT * FROM fields";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $this->fields = $stmt->fetchAll();
        return $this->fields;
    }

    public function getOneField($fieldId): array
    {
        $sql = "SELECT * FROM `fields` WHERE `fieldId` = $fieldId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $this->field = $stmt->fetch();
        return $this->field;
    }


    public function addCheck()
    {
        $errorArray = [];
        if (empty($_POST['fieldName'])) {
            $errorArray['fieldName'] = "Le nom du terrain est obligatoire";
        }
        if (empty($_POST['fieldTarifHourHT'])) {
            $errorArray['fieldTarifHourHT'] = "Le tarif horaire est obligatoire";
        }
        if (empty($_POST['fieldTarifDayHT'])) {
            $errorArray['fieldTarifDayHT'] = "Le tarif journalier est obligatoire";
        }
        if (empty($_POST['filedDescription'])) {
            $errorArray['filedDescription'] = "La description est obligatoire";
        }
        if (empty($_POST['fieldPicture'])) {
            $picture = "default.jpg";
        } else {
            $picture = $this->addFieldPicture();
        }
        if (empty($_POST['centerId'])) {
            $errorArray['centerId'] = "Le centre est obligatoire";
        }
        var_dump($errorArray);
        if(empty($errorArray)){
            $sql = "INSERT INTO `fields` (`fieldName`, `fieldTarifHourHT`, `fieldTarifDayHT`,filedDescription, `fieldPicture`, `centerId`) VALUES (:fieldName, :fieldTarifHourHT, :fieldTarifDayHT,:fieldDescription, :fieldPicture, :centerId)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':fieldName', $_POST['fieldName']);
            $stmt->bindValue(':fieldTarifHourHT', $_POST['fieldTarifHourHT']);
            $stmt->bindValue(':fieldTarifDayHT', $_POST['fieldTarifDayHT']);
            $stmt->bindValue('filedDescription', $_POST['filedDescription']);
            $stmt->bindValue(':fieldPicture', $picture);
            $stmt->bindValue(':centerId', $_POST['centerId']);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
            
        }else{
            return $errorArray;
        }
    }

    public function editCheck()
    {
        $id = $_GET['id'];
        if (empty($_POST['fieldName'])) {
            $fieldName = $this->getFieldName();
        }
        if (empty($_POST['fieldTarifHourHT'])) {
            $fieldTarifHourHT = $this->getFieldTarifHourHT();
        }
        if (empty($_POST['fieldTarifDayHT'])) {
            $fieldTarifDayHT = $this->getFieldTarifDayHT();
        }
        if (empty($_POST['centerId'])) {
            $centerId = $this->getCenterId();
        }
        if (empty($_POST['fieldDescription'])) {
            $fieldDescription = $this->getFieldDescription();
        }
        $sql = "UPDATE `fields` SET `fieldName` = :fieldName, `fieldTarifHourHT` = :fieldTarifHourHT, `fieldTarifDayHT` = :fieldTarifDayHT, fieldDescription=:fieldDescription, `centerdId` = :centerId WHERE `fieldId` = :fieldId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':fieldId', $id, \PDO::PARAM_INT);
        $stmt->bindValue(':fieldName', $fieldName);
        $stmt->bindValue(':fieldTarifHourHT', $fieldTarifHourHT);
        $stmt->bindValue(':fieldTarifDayHT', $fieldTarifDayHT);
        $stmt->bindValue(':fielDescription', $$fieldDescription);
        $stmt->bindValue(':centerId', $centerId);

        $stmt->bindValue(':fieldId', $fieldId, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function delete()
    {
        $id = $_GET['id'];
        if($_SESSION['user']['userRole'] == 1){
            $sql = "DELETE FROM `fields` WHERE `fieldId` = :fieldId";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':fieldId', $id, \PDO::PARAM_INT);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
    }

    public function addFieldPicture() {
        $target_dir = "/var/www/html/donkeyfive/src/public/img/field/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $target_file = $target_dir . basename($_FILES["fieldPicture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $errorArray = [];
        $check = getimagesize($_FILES["fieldPicture"]["tmp_name"]);
        if ($check === false) {
            $errorArray[] = "File is not an image.";
            return $errorArray;
        }
        if (file_exists($target_file)) {
            $errorArray[] = "Sorry, file already exists.";
        }
    
        if ($_FILES["fieldPicture"]["size"] > 500000) {
            $errorArray[] = "Sorry, your file is too large.";
        }
        if ($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg") {
            $errorArray[] = "Sorry, only PNG, JPG, and JPEG files are allowed.";
        }
        if (empty($errorArray)) {
            if (move_uploaded_file($_FILES["fieldPicture"]["tmp_name"], $target_file)) {
                return basename($_FILES["fieldPicture"]["name"]);
            } else {
                $errorArray[] = "Sorry, there was an error uploading your file.";
            }
        }
    
        return $errorArray;
    }

    public function updatePictureField(){
        $id = $_GET['id'];
        $data = new Center();
        $field =  $data->getOneField($id);
        if($center[0]['fieldPicture'] != $_FILES['fieldPicture']['name']){
            $picture = $this->addFieldPicture();
            if(!is_array($picture)){
                $query = $this->pdo->prepare('UPDATE fields SET fieldPicture = :fieldPicture WHERE fieldId = :fieldId');
                $query->bindValue(':fieldId', $id, \PDO::PARAM_INT);
                $query->bindValue(':fieldPicture', $picture);
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
