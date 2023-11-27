<?php

namespace Application\Model\Rental;

require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;

class Rental {

    public function __construct(
        private $rentalId = null,
        private $rentalNumber = null,
        private $rentalCostofTVA = null,
        private $rentalCostHT = null,
        private $rentalCostTTC = null,
        private $rentalStatus = null,
        private $rentals = [],
        private $rental = [],
        private $pdo = null
        )
    {
        $this->pdo = DatabaseConnection::getDataBase();
    }

public function getRentalId(): int
{
    return $this->rentalId;
}

public function getRentalNumber(): string
{
    return $this->rentalNumber;
}

public function getRentalCostofTVA(): string
{
    return $this->rentalCostofTVA;
}

public function getRentalCostHT(): string
{
    return $this->rentalCostHT;
}

public function getRentalCostTTC(): string
{
    return $this->rentalCostTTC;
}


public function getRentalStatus(): string
{
    return $this->rentalStatus;
}

public function setRentalNumber(string $rentalNumber): void
{
    $this->rentalNumber = $rentalNumber;
}

public function setRentalCostofTVA(string $rentalCostofTVA): void
{
    $this->rentalCostofTVA = $rentalCostofTVA;
}

public function setRentalCostHT(string $rentalCostHT): void
{
    $this->rentalCostHT = $rentalCostHT;
}

public function setRentalCostTTC(string $rentalCostTTC): void
{
    $this->rentalCostTTC = $rentalCostTTC;
}

public function setRentalStatus(string $rentalStatus): void
{
    $this->rentalStatus = $rentalStatus;
}

public function addRental($rentalNumber, $rentalCostofTVA, $rentalCostHT, $rentalCostTTC, $rentalStatus)
{
    $sql = "INSERT INTO `rentals` (`rentalNumber`, `rentalCostofTVA`, `rentalCostHT`, `rentalCostTTC`, `rentalStatus`) VALUES (:rentalNumber, :rentalCostofTVA, :rentalCostHT, :rentalCostTTC, :rentalStatus)";
    $pdoStatement = $this->pdo->prepare($sql);
    $pdoStatement->bindValue(':rentalNumber', $rentalNumber, \PDO::PARAM_STR);
    $pdoStatement->bindValue(':rentalCostofTVA', $rentalCostofTVA, \PDO::PARAM_STR);
    $pdoStatement->bindValue(':rentalCostHT', $rentalCostHT, \PDO::PARAM_STR);
    $pdoStatement->bindValue(':rentalCostTTC', $rentalCostTTC, \PDO::PARAM_STR);
    $pdoStatement->bindValue(':rentalStatus', $rentalStatus, \PDO::PARAM_STR);
    $pdoStatement->execute();
}

public function deleteRental($rentalId)
{
    $sql = "DELETE FROM `rentals` WHERE `rentalId` = :rental_id";
    $pdoStatement = $this->pdo->prepare($sql);
    $pdoStatement->bindValue(':rental_id', $rentalId, \PDO::PARAM_INT);
    $pdoStatement->execute();
}

public function getAllRentals(): array
{
    $sql = "SELECT * FROM `rentals`";
    $pdoStatement = $this->pdo->query($sql);
    $this->rentals = $pdoStatement->fetchAll();
    return $this->rentals;
}

public function getRentalById($rentalId): array
{
    $sql = "SELECT * FROM `rentals` WHERE `rentalId` = :rental_id";
    $pdoStatement = $this->pdo->prepare($sql);
    $pdoStatement->bindValue(':rental_id', $rentalId, \PDO::PARAM_INT);
    $pdoStatement->execute();
    $this->rental = $pdoStatement->fetch();
    return $this->rental;
}

public function updateRental($rentalId, $rentalNumber, $rentalCostofTVA, $rentalCostHT, $rentalCostTTC, $rentalStatus)
{
    $sql = "UPDATE `rentals` SET `rentalNumber` = :rentalNumber, `rentalCostofTVA` = :rentalCostofTVA, `rentalCostHT` = :rentalCostHT, `rentalCostTTC` = :rentalCostTTC, `rentalStatus` = :rentalStatus WHERE `rentalId` = :rentalId";
    $pdoStatement = $this->pdo->prepare($sql);
    $pdoStatement->bindValue(':rentalId', $rentalId, \PDO::PARAM_INT);
    $pdoStatement->bindValue(':rentalNumber', $rentalNumber, \PDO::PARAM_STR);
    $pdoStatement->bindValue(':rentalCostofTVA', $rentalCostofTVA, \PDO::PARAM_STR);
    $pdoStatement->bindValue(':rentalCostHT', $rentalCostHT, \PDO::PARAM_STR);
    $pdoStatement->bindValue(':rentalCostTTC', $rentalCostTTC, \PDO::PARAM_STR);
    $pdoStatement->bindValue(':rentalStatus', $rentalStatus, \PDO::PARAM_STR);
    $pdoStatement->execute();
}

}