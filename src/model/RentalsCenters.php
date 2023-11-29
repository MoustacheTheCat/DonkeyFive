<?php

namespace Application\Model\Rentalscenters;

require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;

class RentalsCenters {
    
        public function __construct(
            private $rentalId = null,
            private $centerId = null,
            private $createdAt = null,
            private $updatedAt = null,
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

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setRentalId(int $rentalId): void
    {
        $this->rentalId = $rentalId;
    }

    public function setCenterId(int $centerId): void
    {
        $this->centerId = $centerId;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getAllRentalsCenters(): array
    {
        $sql = "SELECT * FROM rentalscenters";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rentalscenters = $stmt->fetchAll();
        return $rentalscenters;
    }

    public function getRentalCenterById($rentalId): array
    {
        $sql = "SELECT * FROM rentalscenters WHERE rentalId = :rentalId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':rentalId', $rentalId);
        $stmt->execute();
        $rentalCenter = $stmt->fetch();
        return $rentalCenter;
    }

    public function getRentalCenterByCenterId($centerId): array
    {
        $sql = "SELECT * FROM rentalscenters WHERE centerId = :centerId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':centerId', $centerId);
        $stmt->execute();
        $rentalCenter = $stmt->fetch();
        return $rentalCenter;
    }

    public function addRentalCenter($rentalId, $centerId)
    {
        $sql = "INSERT INTO `rentalscenters` (`rentalId`, `centerId`) VALUES (:rentalId, :centerId)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':rentalId', $rentalId);
        $stmt->bindValue(':centerId', $centerId);
        $stmt->execute();
    }

    public function deleteRentalCenter($rentalId)
    {
        $sql = "DELETE FROM `rentalscenters` WHERE `rentalId` = :rentalId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':rentalId', $rentalId);
        $stmt->execute();
    }

    public function updateRentalCenter($rentalId, $centerId)
    {
        $sql = "UPDATE `rentalscenters` SET `centerId` = :centerId WHERE `rentalId` = :rentalId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':rentalId', $rentalId);
        $stmt->bindValue(':centerId', $centerId);
        $stmt->execute();
    }

    



}