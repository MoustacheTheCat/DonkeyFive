<?php

namespace Application\Model\Option;

require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;

class Option
{

    public function __construct(
        private $optionId = null,
        private $optionName = null,
        private $optionCostHT = null,
        private $option = [],
        private $options = [],
        private $pdo = null,
    ) {
        $this->pdo = DatabaseConnection::getDataBase();
    }

    public function getOptionId(): int
    {
        return $this->optionId;
    }

    public function getOptionName(): string
    {
        return $this->optionName;
    }

    public function getOptionCostHT(): string
    {
        return $this->optionCostHT;
    }

    public function setOptionName(array $option): void
    {
        $this->option = $option;
    }

    public function setOptionCostHT(string $optionCostHT): void
    {
        $this->optionCostHT = $optionCostHT;
    }

    public function addOption($optionName, $optionCostHT)
    {
        $sql = "INSERT INTO `options` (`optionName`, `optionCostHT`) VALUES (:optionName, :optionCostHT)";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':optionName', $optionName, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':optionCostHT', $optionCostHT, \PDO::PARAM_STR);
        $pdoStatement->execute();
    }

    public function deleteOption($optionId)
    {
        $sql = "DELETE FROM `options` WHERE `optionId` = :option_id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':option_id', $optionId, \PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    public function getAllOptions(): array
    {
        $sql = "SELECT * FROM `options`";
        $pdoStatement = $this->pdo->query($sql);
        $this->options = $pdoStatement->fetchAll();
        return $this->options;
    }

    public function getOptionById($optionId): array
    {
        $sql = "SELECT * FROM `options` WHERE `optionId` = :option_id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':option_id', $optionId, \PDO::PARAM_INT);
        $pdoStatement->execute();
        $this->option = $pdoStatement->fetch();
        return $this->option;
    }

    public function updateOption($optionId, $optionName, $optionCostHT)
    {
        $sql = "UPDATE `options` SET `optionName` = :optionName, `optionCostHT` = :optionCostHT WHERE `optionId` = :option_id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':option_id', $optionId, \PDO::PARAM_INT);
        $pdoStatement->bindValue(':optionName', $optionName, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':optionCostHT', $optionCostHT, \PDO::PARAM_STR);
        $pdoStatement->execute();
    }



    public function getOneOption($optionId): array
    {
        $sql = "SELECT * FROM `options` WHERE `optionId` = :option_id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':option_id', $optionId, \PDO::PARAM_INT);
        $pdoStatement->execute();
        $this->option = $pdoStatement->fetchAll();
        return $this->option;
    }

    public function createOption($optionName, $optionCostHT)
    {
        $sql = "INSERT INTO `options` (`optionName`, `optionCostHT`) VALUES (:optionName, :optionCostHT)";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':optionName', $optionName, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':optionCostHT', $optionCostHT, \PDO::PARAM_STR);
        $pdoStatement->execute();
    }

    public function deleteAllOptions()
    {
        $sql = "DELETE FROM `options`";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute();
    }

    function getDetailOption($arrayid)
    {
        $sql = "SELECT optionName, optionCostHT FROM `options` WHERE `optionId` = :option_id";
        $pdoStatement = $this->pdo->prepare($sql);
        $costs = 0;
        $options = [];
        foreach ($arrayid as $id) {
            $pdoStatement->bindValue(':option_id', $id, \PDO::PARAM_INT);
            $pdoStatement->execute();
            $cost = $pdoStatement->fetch();
            $options[$id]['names'] = $cost[0];
            $options[$id]['prices'] = $cost[1];
            $costs += $cost[1];
        }
        
        $options['costs']['totalHT'] = $costs;
        return $options;
    }
}
