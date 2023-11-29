<?php

namespace Application\Model\Field;

class Field
{
    public function __construct(
        private $fieldId = null,
        private $fieldName = null,
        private $fieldTarifHourHT = null,
        private $fieldTarifDayHT = null,
        private $fieldPicture  = null,
        private $centerId = null,
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

    public function setFieldId($fieldId)
    {
        $this->fieldId = $fieldId;

        return $this;
    }

    public function getFieldName()
    {
        return $this->fieldName;
    }

    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    public function getFieldTarifHourHT()
    {
        return $this->fieldTarifHourHT;
    }

    public function setFieldTarifHourHT($fieldTarifHourHT)
    {
        $this->fieldTarifHourHT = $fieldTarifHourHT;
        return $this;
    }

 
    public function getFieldTarifDayHT()
    {
        return $this->fieldTarifDayHT;
    }

    public function setFieldTarifDayHT($fieldTarifDayHT)
    {
        $this->fieldTarifDayHT = $fieldTarifDayHT;
        return $this;
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

    public function getCenterId()
    {
        return $this->centerId;
    }

    public function setCenterId($centerId)
    {
        $this->centerId = $centerId;

        return $this;
    }

    public function getField($field): array
    {
        return [
        'fieldId' => $this->getFieldId(),
        'fieldName' => $this->getFieldName(),
        'fieldTarifHourHT' => $this->getFieldTarifHourHT(),
        'fieldTarifDayHT' => $this->getFieldTarifDayHT(),
        'fieldPicture' => $this->getFieldPicture(),
        'centerId' => $this->getCenterId(),
        ];
    }

    public function setField(array $field): void
    {
        $this->setFieldId($field['fieldId']);
        $this->setFieldName($field['fieldName']);
        $this->setFieldTarifHourHT($field['fieldTarifHourHT']);
        $this->setFieldTarifDayHT($field['fieldTarifDayHT']);
        $this->setFieldPicture($field['fieldPicture']);
        $this->setCenterId($field['centerId']);
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

    public function createField($fieldName, $fieldTarifHourHT, $fieldTarifDayHT, $fieldPicture, $centerId)
    {
        $sql = "INSERT INTO `fields` (`fieldName`, `fieldTarifHourHT`, `fieldTarifDayHT`, `fieldPicture`, `centerId`) VALUES (:fieldName, :fieldTarifHourHT, :fieldTarifDayHT, :fieldPicture, :centerId)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':fieldName', $fieldName, \PDO::PARAM_STR);
        $stmt->bindValue(':fieldTarifHourHT', $fieldTarifHourHT, \PDO::PARAM_STR);
        $stmt->bindValue(':fieldTarifDayHT', $fieldTarifDayHT, \PDO::PARAM_STR);
        $stmt->bindValue(':fieldPicture', $fieldPicture, \PDO::PARAM_STR);
        $stmt->bindValue(':centerId', $centerId, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function updateField($fieldId, $fieldName, $fieldTarifHourHT, $fieldTarifDayHT, $fieldPicture, $centerId)
    {
        $sql = "UPDATE `fields` SET `fieldName` = :fieldName, `fieldTarifHourHT` = :fieldTarifHourHT, `fieldTarifDayHT` = :fieldTarifDayHT, `fieldPicture` = :fieldPicture, `centerId` = :centerId WHERE `fieldId` = :fieldId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':fieldId', $fieldId, \PDO::PARAM_INT);
        $stmt->bindValue(':fieldName', $fieldName, \PDO::PARAM_STR);
        $stmt->bindValue(':fieldTarifHourHT', $fieldTarifHourHT, \PDO::PARAM_STR);
        $stmt->bindValue(':fieldTarifDayHT', $fieldTarifDayHT, \PDO::PARAM_STR);
        $stmt->bindValue(':fieldPicture', $fieldPicture, \PDO::PARAM_STR);
        $stmt->bindValue(':centerId', $centerId, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteField($fieldId)
    {
        $sql = "DELETE FROM `fields` WHERE `fieldId` = :fieldId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':fieldId', $fieldId, \PDO::PARAM_INT);
        $stmt->execute();
    }
}
