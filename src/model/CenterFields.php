<?php

namespace Application\Model;

require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;
class CenterFields
{
  public function __construct(
    private $centerId = null,
    private $fieldId = null,
    private $centerField = [],
    private $centerFields = [],
    private $pdo = null
  )
  {
    $this->pdo = DatabaseConnection::getDataBase();
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

  public function getFieldId()
  {
    return $this->fieldId;
  }

  public function setFieldId($fieldId)
  {
    $this->fieldId = $fieldId;
    return $this;
  }
  
  public function getAllFieldsByCenter($id): array
  {
    
    $sql = "SELECT * FROM fields JOIN centers ON fields.centerId = centers.centerId  WHERE fields.centerId = :centerId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':centerId', $id);
    $stmt->execute();
    $this->centerFields = $stmt->fetchAll();
    return $this->centerFields;
  }

}
