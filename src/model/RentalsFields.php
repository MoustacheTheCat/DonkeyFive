<?php

namespace Application\Model\RentalsFields;

class RentalsFields
{
  public function __construct(
    private $rentalsFieldsId = null,
    private $fieldId = null,
    private $rentalId = null,
    private $rentalsFieldsType = null,
    private $rentalsFieldsNbDays = null,
    private $rentalsFieldsNbHours = null,
    private $rentalsFieldsdateStart = null,
    private $rentalsFieldsdateEnd = null,
    private $rentalsFieldHourStart = null,
    private $rentalsFieldHourEnd = null,
    private $rentalsFieldsCostHT = null,
    private $rentalsFields = [],
    private $pdo = null,
  ) {
    $this->pdo = \Application\lib\DatabaseConnection::getDataBase();
  }



  /**
   * Get the value of rentalsFieldsId
   */
  public function getRentalsFieldsId()
  {
    return $this->rentalsFieldsId;
  }

  /**
   * Set the value of rentalsFieldsId
   *
   * @return  self
   */
  public function setRentalsFieldsId($rentalsFieldsId)
  {
    $this->rentalsFieldsId = $rentalsFieldsId;

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
   * Get the value of rentalId
   */
  public function getRentalId()
  {
    return $this->rentalId;
  }

  /**
   * Set the value of rentalId
   *
   * @return  self
   */
  public function setRentalId($rentalId)
  {
    $this->rentalId = $rentalId;

    return $this;
  }

  /**
   * Get the value of rentalsFieldsType
   */
  public function getRentalsFieldsType()
  {
    return $this->rentalsFieldsType;
  }

  /**
   * Set the value of rentalsFieldsType
   *
   * @return  self
   */
  public function setRentalsFieldsType($rentalsFieldsType)
  {
    $this->rentalsFieldsType = $rentalsFieldsType;

    return $this;
  }

  /**
   * Get the value of rentalsFieldsNbDays
   */
  public function getRentalsFieldsNbDays()
  {
    return $this->rentalsFieldsNbDays;
  }

  /**
   * Set the value of rentalsFieldsNbDays
   *
   * @return  self
   */
  public function setRentalsFieldsNbDays($rentalsFieldsNbDays)
  {
    $this->rentalsFieldsNbDays = $rentalsFieldsNbDays;

    return $this;
  }

  /**
   * Get the value of rentalsFieldsNbHours
   */
  public function getRentalsFieldsNbHours()
  {
    return $this->rentalsFieldsNbHours;
  }

  /**
   * Set the value of rentalsFieldsNbHours
   *
   * @return  self
   */
  public function setRentalsFieldsNbHours($rentalsFieldsNbHours)
  {
    $this->rentalsFieldsNbHours = $rentalsFieldsNbHours;

    return $this;
  }

  /**
   * Get the value of rentalsFieldsdateStart
   */
  public function getRentalsFieldsdateStart()
  {
    return $this->rentalsFieldsdateStart;
  }

  /**
   * Set the value of rentalsFieldsdateStart
   *
   * @return  self
   */
  public function setRentalsFieldsdateStart($rentalsFieldsdateStart)
  {
    $this->rentalsFieldsdateStart = $rentalsFieldsdateStart;

    return $this;
  }

  /**
   * Get the value of rentalsFieldsdateEnd
   */
  public function getRentalsFieldsdateEnd()
  {
    return $this->rentalsFieldsdateEnd;
  }

  /**
   * Set the value of rentalsFieldsdateEnd
   *
   * @return  self
   */
  public function setRentalsFieldsdateEnd($rentalsFieldsdateEnd)
  {
    $this->rentalsFieldsdateEnd = $rentalsFieldsdateEnd;

    return $this;
  }

  /**
   * Get the value of rentalsFieldHourStart
   */
  public function getRentalsFieldHourStart()
  {
    return $this->rentalsFieldHourStart;
  }

  /**
   * Set the value of rentalsFieldHourStart
   *
   * @return  self
   */
  public function setRentalsFieldHourStart($rentalsFieldHourStart)
  {
    $this->rentalsFieldHourStart = $rentalsFieldHourStart;

    return $this;
  }

  /**
   * Get the value of rentalsFieldHourEnd
   */
  public function getRentalsFieldHourEnd()
  {
    return $this->rentalsFieldHourEnd;
  }

  /**
   * Set the value of rentalsFieldHourEnd
   *
   * @return  self
   */
  public function setRentalsFieldHourEnd($rentalsFieldHourEnd)
  {
    $this->rentalsFieldHourEnd = $rentalsFieldHourEnd;

    return $this;
  }

  /**
   * Get the value of rentalsFieldsCostHT
   */
  public function getRentalsFieldsCostHT()
  {
    return $this->rentalsFieldsCostHT;
  }

  /**
   * Set the value of rentalsFieldsCostHT
   *
   * @return  self
   */
  public function setRentalsFieldsCostHT($rentalsFieldsCostHT)
  {
    $this->rentalsFieldsCostHT = $rentalsFieldsCostHT;

    return $this;
  }

  public function getAllRentalsFields()
  {
    $sql = "SELECT * FROM rentalsFields";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $rentalsFields = $stmt->fetchAll();
    return $rentalsFields;
  }

  public function getRentalsFieldsByRentalsFieldsId($rentalsFieldsId)
  {
    $sql = "SELECT * FROM rentalsFields WHERE rentalsFieldsId = :rentalsFieldsId";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':rentalsFieldsId', $rentalsFieldsId, \PDO::PARAM_INT);
    $stmt->execute();
    $rentalsFields = $stmt->fetch();
    return $rentalsFields;
  }

  public function getRentalsFieldsByFieldId($fieldId)
  {
    $sql = "SELECT * FROM rentalsFields WHERE fieldId = :fieldId";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':fieldId', $fieldId, \PDO::PARAM_INT);
    $stmt->execute();
    $rentalsFields = $stmt->fetchAll();
    return $rentalsFields;
  }
  public function getRentalsFieldsByRentalId($rentalId)
  {
    $sql = "SELECT * FROM rentalsFields WHERE rentalId = :rentalId";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':rentalId', $rentalId, \PDO::PARAM_INT);
    $stmt->execute();
    $rentalsFields = $stmt->fetchAll();
    return $rentalsFields;
  }

  public function createRentalsFields($fieldId, $rentalId, $rentalsFieldsType, $rentalsFieldsNbDays, $rentalsFieldsNbHours, $rentalsFieldsdateStart, $rentalsFieldsdateEnd, $rentalsFieldHourStart, $rentalsFieldHourEnd, $rentalsFieldsCostHT)
  {
    $sql = "INSERT INTO `rentalsFields` (`fieldId`, `rentalId`, `rentalsFieldsType`, `rentalsFieldsNbDays`, `rentalsFieldsNbHours`, `rentalsFieldsdateStart`, `rentalsFieldsdateEnd`, `rentalsFieldHourStart`, `rentalsFieldHourEnd`, `rentalsFieldsCostHT`) VALUES (:fieldId, :rentalId, :rentalsFieldsType, :rentalsFieldsNbDays, :rentalsFieldsNbHours, :rentalsFieldsdateStart, :rentalsFieldsdateEnd, :rentalsFieldHourStart, :rentalsFieldHourEnd, :rentalsFieldsCostHT)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':fieldId', $fieldId, \PDO::PARAM_INT);
    $stmt->bindValue(':rentalId', $rentalId, \PDO::PARAM_INT);
    $stmt->bindValue(':rentalsFieldsType', $rentalsFieldsType, \PDO::PARAM_STR);
    $stmt->bindValue(':rentalsFieldsNbDays', $rentalsFieldsNbDays, \PDO::PARAM_INT);
    $stmt->bindValue(':rentalsFieldsNbHours', $rentalsFieldsNbHours, \PDO::PARAM_INT);
    $stmt->bindValue(':rentalsFieldsdateStart', $rentalsFieldsdateStart, \PDO::PARAM_STR);
    $stmt->bindValue(':rentalsFieldsdateEnd', $rentalsFieldsdateEnd, \PDO::PARAM_STR);
    $stmt->bindValue(':rentalsFieldHourStart', $rentalsFieldHourStart, \PDO::PARAM_STR);
    $stmt->bindValue(':rentalsFieldHourEnd', $rentalsFieldHourEnd, \PDO::PARAM_STR);
    $stmt->bindValue(':rentalsFieldsCostHT', $rentalsFieldsCostHT, \PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateRentalsFields($rentalsFieldsId, $fieldId, $rentalId, $rentalsFieldsType, $rentalsFieldsNbDays, $rentalsFieldsNbHours, $rentalsFieldsdateStart, $rentalsFieldsdateEnd, $rentalsFieldHourStart, $rentalsFieldHourEnd, $rentalsFieldsCostHT)
  {
    $sql = "UPDATE `rentalsFields` SET `fieldId` = :fieldId, `rentalId` = :rentalId, `rentalsFieldsType` = :rentalsFieldsType, `rentalsFieldsNbDays` = :rentalsFieldsNbDays, `rentalsFieldsNbHours` = :rentalsFieldsNbHours, `rentalsFieldsdateStart` = :rentalsFieldsdateStart, `rentalsFieldsdateEnd` = :rentalsFieldsdateEnd, `rentalsFieldHourStart` = :rentalsFieldHourStart, `rentalsFieldHourEnd` = :rentalsFieldHourEnd, `rentalsFieldsCostHT` = :rentalsFieldsCostHT WHERE `rentalsFieldsId` = :rentalsFieldsId";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':rentalsFieldsId', $rentalsFieldsId, \PDO::PARAM_INT);
    $stmt->bindValue(':fieldId', $fieldId, \PDO::PARAM_INT);
    $stmt->bindValue(':rentalId', $rentalId, \PDO::PARAM_INT);
    $stmt->bindValue(':rentalsFieldsType', $rentalsFieldsType, \PDO::PARAM_STR);
    $stmt->bindValue(':rentalsFieldsNbDays', $rentalsFieldsNbDays, \PDO::PARAM_INT);
    $stmt->bindValue(':rentalsFieldsNbHours', $rentalsFieldsNbHours, \PDO::PARAM_INT);
    $stmt->bindValue(':rentalsFieldsdateStart', $rentalsFieldsdateStart, \PDO::PARAM_STR);
    $stmt->bindValue(':rentalsFieldsdateEnd', $rentalsFieldsdateEnd, \PDO::PARAM_STR);
    $stmt->bindValue(':rentalsFieldHourStart', $rentalsFieldHourStart, \PDO::PARAM_STR);
    $stmt->bindValue(':rentalsFieldHourEnd', $rentalsFieldHourEnd, \PDO::PARAM_STR);
    $stmt->bindValue(':rentalsFieldsCostHT', $rentalsFieldsCostHT, \PDO::PARAM_STR);
    $stmt->execute();
  }

  public function deleteRentalsFields($rentalsFieldsId)
  {
    $sql = "DELETE FROM `rentalsFields` WHERE `rentalsFieldsId` = :rentalsFieldsId";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':rentalsFieldsId', $rentalsFieldsId, \PDO::PARAM_INT);
    $stmt->execute();
  }

  public function deleteRentalsFieldsByFieldId($fieldId)
  {
    $sql = "DELETE FROM `rentalsFields` WHERE `fieldId` = :fieldId";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':fieldId', $fieldId, \PDO::PARAM_INT);
    $stmt->execute();
  }

  public function deleteRentalsFieldsByRentalId($rentalId)
  {
    $sql = "DELETE FROM `rentalsFields` WHERE `rentalId` = :rentalId";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':rentalId', $rentalId, \PDO::PARAM_INT);
    $stmt->execute();
  }

  public function storeRentalsFields($rentalsFields)
  {
    $this->rentalsFields[] = $rentalsFields;
  }
}
