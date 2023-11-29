<?php

namespace Application\Model\FieldsOptions;

require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;

class FieldsOptions
{
    
    public function __construct(
        private $optionId = null,
        private $fieldId = null,
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
        $sql = "INSERT INTO `fields_options` (`option_id`, `field_id`) VALUES (:option_id, :field_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':option_id', $optionId);
        $stmt->bindValue(':field_id', $fieldId);
        $stmt->execute();
    }

    public function updateFieldsOptions(): void
    {
        $sql = "UPDATE fields_options SET option_id = :option_id, field_id = :field_id WHERE option_id = :option_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'option_id' => $this->getOptionId(),
            'field_id' => $this->getFieldId(),
        ]);

    }
    public function deleteFieldsOptions($optionId)
    {
        $sql = "DELETE FROM `fields_options` WHERE `option_id` = :option_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':option_id', $optionId);
        $stmt->execute();
    }



}