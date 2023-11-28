<?php

namespace Application\Model\Field;

class Field
{
    private $fieldId = null;
    private $fieldName = null;
    private $fieldTarifHourHT = null;
    private $fieldTarifDayHT = null;
    private $fieldPicture  = null;
    private $centerId = null;
    private $field = [];
    private $fields = [];

    /**
     * Get the value of fieldId
     */
    public function getFieldId()
    {
        return $this->fieldId;
    }

    /**
     * Set the value of fieldId
     *
     * @return  self
     */
    public function setFieldId($fieldId)
    {
        $this->fieldId = $fieldId;

        return $this;
    }

    /**
     * Get the value of fieldName
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * Set the value of fieldName
     *
     * @return  self
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * Get the value of fieldTarifHourHT
     */
    public function getFieldTarifHourHT()
    {
        return $this->fieldTarifHourHT;
    }

    /**
     * Set the value of fieldTarifHourHT
     *
     * @return  self
     */
    public function setFieldTarifHourHT($fieldTarifHourHT)
    {
        $this->fieldTarifHourHT = $fieldTarifHourHT;

        return $this;
    }

    /**
     * Get the value of fieldTarifDayHT
     */
    public function getFieldTarifDayHT()
    {
        return $this->fieldTarifDayHT;
    }

    /**
     * Set the value of fieldTarifDayHT
     *
     * @return  self
     */
    public function setFieldTarifDayHT($fieldTarifDayHT)
    {
        $this->fieldTarifDayHT = $fieldTarifDayHT;

        return $this;
    }

    /**
     * Get the value of fieldPicture
     */
    public function getFieldPicture()
    {
        return $this->fieldPicture;
    }

    /**
     * Set the value of fieldPicture
     *
     * @return  self
     */
    public function setFieldPicture($fieldPicture)
    {
        $this->fieldPicture = $fieldPicture;

        return $this;
    }

    /**
     * Get the value of enterId
     */
    public function getCenterId()
    {
        return $this->centerId;
    }

    /**
     * Set the value of enterId
     *
     * @return  self
     */
    public function setCenterId($centerId)
    {
        $this->centerId = $centerId;

        return $this;
    }

    /**
     * Set the value of field
     *
     * @return  self
     */
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
        $pdo = \Application\lib\DatabaseConnection::getDataBase();
        $sql = "SELECT * FROM fields";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $this->fields = $stmt->fetchAll();
        return $this->fields;
    }

    public function getOneField($fieldId): array
    {
        $pdo = \Application\lib\DatabaseConnection::getDataBase();
        $sql = "SELECT * FROM `fields` WHERE `fieldId` = $fieldId";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $this->field = $stmt->fetch();
        return $this->field;
    }


    public function getFieldByCenter($centerId): array
    {
        $pdo = \Application\lib\DatabaseConnection::getDataBase();
        $sql = "SELECT * FROM `fields` WHERE `centerId` = $centerId";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $this->fields = $stmt->fetchAll();
        return $this->fields;
    }
}
