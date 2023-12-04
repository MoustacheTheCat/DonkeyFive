<?php

namespace Application\Model;

require_once('src/lib/DatabaseConnection.php');
require_once('src/model/Option.php');

use Application\lib\DatabaseConnection;
use Application\Model\Option;
class FieldsOptions
{
    public function __construct(
        private $optionId = null,
        private $fieldId = null,
        private $fieldsOptions = [],
        private $fieldsOption = [],
        private $pdo = null,
        )
    {
        $this->pdo = DatabaseConnection::getDataBase();
    }

    public function getOptionId(): int
    {
        return $this->optionId;
    }

    public function getFieldId(): int
    {
        return $this->fieldId;
    }

    public function setOptionId(int $optionId): void
    {
        $this->optionId = $optionId;
    }

    public function setFieldId(int $fieldId): void
    {
        $this->fieldId = $fieldId;
    }

    public function getAllFieldsOptions(): array
    {
        $sql = "SELECT * FROM fields_options";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $fieldsOptions = $stmt->fetchAll();
        return $fieldsOptions;
    }

    // public function getFieldsOptionsByOptionId($optionId): array
    // {
    //     $sql = "SELECT * FROM fields_options WHERE optionId = :optionId";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->bindValue(':optionId', $optionId);
    //     $stmt->execute();
    //     $fieldsOptions = $stmt->fetch();
    //     return $fieldsOptions;
    // }

    public function getFieldsOptionsByFieldId()
    {
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT f.*, o.* FROM fieldsOptions fo JOIN fields f ON fo.fieldId = f.fieldId JOIN options o ON fo.optionId = o.optionId  WHERE f.fieldId = :fieldId";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':fieldId', $id);
            $stmt->execute();
            $fieldsOptions = $stmt->fetchAll();
            return $fieldsOptions;
        }
        else{
            $error = "Aucun champs n'a été trouvé";
            return  $error;
        }
    }

    public function addFieldsOptions($optionId, $fieldId)
    {
        $sql = "INSERT INTO `fieldsOptions` (`optionId`, `fieldId`) VALUES (:optionId, :fieldId)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':optionId', $optionId);
        $stmt->bindValue(':fieldId', $fieldId);
        $stmt->execute();
    }

    public function addCheck(){
        $errorArray = [];
        $datas = new Option();
        $options = $datas->getAllOptionId();
        if (empty($data)) {
            $errorArray['fieldId'] = "Le terrain est obligatoire";
        }
        if(empty($errorArray)){
            foreach ($options as $option) {
                $this->addFieldsOptions($option,$data);
            }
            return true;
        }else{
            return $errorArray;
        }
    }

}