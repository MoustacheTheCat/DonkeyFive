<?php

namespace Application\Model\RentalsCenters;

require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;

class RentalsCenters {
    
        public function __construct(
            private $rentalId = null,
            private $centerId = null,
            private $pdo = null
            )
        {
            $this->pdo = DatabaseConnection::getDataBase();
        }

    public function getRentalId(): int
    {
        return $this->rentalId;
    }

    public function getCenterId(): int
    {
        return $this->centerId;
    }

    public function setRentalId(int $rentalId): void
    {
        $this->rentalId = $rentalId;
    }

    public function setCenterId(int $centerId): void
    {
        $this->centerId = $centerId;
    }


    public function getAllRentalsCenters(): array
    {
        $sql = "SELECT * FROM rentalsCenters";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rentalsCenters = $stmt->fetchAll();
        return $rentalsCenters;
    }

    public function getRentalCenterByRentalId($rentalId): array
    {
        $sql = "SELECT * FROM rentalsCenters WHERE rentalId = :rentalId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':rentalId', $rentalId);
        $stmt->execute();
        $rentalCenter = $stmt->fetch();
        return $rentalCenter;
    }

    public function getRentalCenterByCenterId($centerId): array
    {
        $sql = "SELECT * FROM rentalsCenters WHERE centerId = :centerId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':centerId', $centerId);
        $stmt->execute();
        $rentalCenter = $stmt->fetch();
        return $rentalCenter;
    }

    public function addRentalCenter($rentalId, $centerId)
    {
        $sql = "INSERT INTO `rentalsCenters` (`rentalId`, `centerId`) VALUES (:rentalId, :centerId)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':rentalId', $rentalId);
        $stmt->bindValue(':centerId', $centerId);
        $stmt->execute();
    }

}