<?php

namespace Application\Model;

class CenterFields
{

  public function __construct(
    private $centerId = null,
    private $fieldId = null,
    private $fieldName = null,
    private $fieldTarifHourHT = null,
    private $fieldTarifDayHT = null,
    private $fieldPicture  = null,
    private $centerName = null,
    private $centerAddress = null,
    private $centerCity = null,
    private $centerZipCode = null,
    private $centerPhone = null,
    private $centerField = [],
    private $centerFields = [],
  ) {
  }

  /**
   * Get the value of centerId
   */
  public function getCenterId()
  {
    return $this->centerId;
  }

  /**
   * Set the value of centerId
   *
   * @return  self
   */
  public function setCenterId($centerId)
  {
    $this->centerId = $centerId;

    return $this;
  }

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
   * Get the value of centerName
   */
  public function getCenterName()
  {
    return $this->centerName;
  }

  /**
   * Set the value of centerName
   *
   * @return  self
   */
  public function setCenterName($centerName)
  {
    $this->centerName = $centerName;

    return $this;
  }

  /**
   * Get the value of centerAddress
   */
  public function getCenterAddress()
  {
    return $this->centerAddress;
  }

  /**
   * Set the value of centerAddress
   *
   * @return  self
   */
  public function setCenterAddress($centerAddress)
  {
    $this->centerAddress = $centerAddress;

    return $this;
  }

  /**
   * Get the value of centerCity
   */
  public function getCenterCity()
  {
    return $this->centerCity;
  }

  /**
   * Set the value of centerCity
   *
   * @return  self
   */
  public function setCenterCity($centerCity)
  {
    $this->centerCity = $centerCity;

    return $this;
  }

  /**
   * Get the value of centerZipCode
   */
  public function getCenterZipCode()
  {
    return $this->centerZipCode;
  }

  /**
   * Set the value of centerZipCode
   *
   * @return  self
   */
  public function setCenterZipCode($centerZipCode)
  {
    $this->centerZipCode = $centerZipCode;

    return $this;
  }

  /**
   * Get the value of centerPhone
   */
  public function getCenterPhone()
  {
    return $this->centerPhone;
  }

  /**
   * Set the value of centerPhone
   *
   * @return  self
   */
  public function setCenterPhone($centerPhone)
  {
    $this->centerPhone = $centerPhone;

    return $this;
  }

  public function setCenterField($centerField){
    $this->centerField = $centerField;
  }

  public function getAllFieldsByCenter($id): array
  {
    
    $pdo = \Application\lib\DatabaseConnection::getDataBase();
    $sql = "SELECT * FROM fields JOIN centers ON fields.centerId = centers.centerId  WHERE fields.centerId = :centerId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':centerId', $id);
    $stmt->execute();
    $this->centerFields = $stmt->fetchAll();
    return $this->centerFields;
  }

  public function getOneFieldByCenter($fieldId, $centerId): array
  {
    $pdo = \Application\lib\DatabaseConnection::getDataBase();
    $sql = "SELECT * FROM fields WHERE fieldId = $fieldId AND centerId = $centerId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $this->centerField = $stmt->fetch();
    return $this->centerField;
  }
}
