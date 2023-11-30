<?php

namespace Application\Model\FieldsOptions;

require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;

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

    public function getFieldsOptionsByOptionId($optionId): array
    {
        $sql = "SELECT * FROM fields_options WHERE option_id = :option_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':option_id', $optionId);
        $stmt->execute();
        $fieldsOptions = $stmt->fetch();
        return $fieldsOptions;
    }

    public function getFieldsOptionsByFieldId($fieldId): array
    {
        $sql = "SELECT * FROM fields_options WHERE field_id = :field_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':field_id', $fieldId);
        $stmt->execute();
        $fieldsOptions = $stmt->fetch();
        return $fieldsOptions;
    }

    public function addFieldsOptions($optionId, $fieldId)
    {
        $sql = "INSERT INTO `fieldsOptions` (`option_id`, `field_id`) VALUES (:option_id, :field_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':option_id', $optionId);
        $stmt->bindValue(':field_id', $fieldId);
        $stmt->execute();
    }

}