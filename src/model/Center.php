<?php

namespace Application\Model\Center;


class Center {
    

    public function __construct(
        private $centerId = null,
        private $centerName = null,
        private $centerCity = null,
        private $centerAdress = null,
        private $centerZip = null,
        private $centerCountry = null,
        private $centerNumber = null,
        private $centerEmail = null,
        private $center = null,
        private $centers = null,
        private $pdo = null,
        )
    {
        $this->pdo = \Application\lib\DatabaseConnection::getDataBase();
    }

    public function getCenterId(): int
    {
        return $this->centerId;
    }

    public function getCenterName(): string
    {
        return $this->centerName;
    }

    public function getCenterCity(): string
    {
        return $this->centerCity;
    }

    public function getCenterAdress(): string
    {
        return $this->centerAdress;
    }

    public function getCenterZip(): string
    {
        return $this->centerZip;
    }

    public function getCenterCountry(): string
    {
        return $this->centerCountry;
    }

    public function getCenterNumber(): string
    {
        return $this->centerNumber;
    }

    public function getCenterEmail(): string
    {
        return $this->centerEmail;
    }

    public function setCenterId(int $centerId): void
    {
        $this->centerId = $centerId;
    }

    public function setCenterName(string $centerName): void
    {
        $this->centerName = $centerName;
    }

    public function setCenterCity(string $centerCity): void
    {
        $this->centerCity = $centerCity;
    }

    public function setCenterAdress(string $centerAdress): void
    {
        $this->centerAdress = $centerAdress;
    }

    public function setCenterZip(string $centerZip): void
    {
        $this->centerZip = $centerZip;
    }

    public function setCenterCountry(string $centerCountry): void
    {
        $this->centerCountry = $centerCountry;
    }

    public function setCenterNumber(string $centerNumber): void
    {
        $this->centerNumber = $centerNumber;
    }

    public function setCenterEmail(string $centerEmail): void
    {
        $this->centerEmail = $centerEmail;
    }

    public function getCenter(): array
    {
        return [
            'centerId' => $this->getCenterId(),
            'centerName' => $this->getCenterName(),
            'centerCity' => $this->getCenterCity(),
            'centerAdress' => $this->getCenterAdress(),
            'centerZip' => $this->getCenterZip(),
            'centerCountry' => $this->getCenterCountry(),
            'centerNumber' => $this->getCenterNumber(),
            'centerEmail' => $this->getCenterEmail(),
        ];
    }

    

    public function setCenter(array $center): void
    {
        $this->setCenterId($center['centerId']);
        $this->setCenterName($center['centerName']);
        $this->setCenterCity($center['centerCity']);
        $this->setCenterAdress($center['centerAdress']);
        $this->setCenterZip($center['centerZip']);
        $this->setCenterCountry($center['centerCountry']);
        $this->setCenterNumber($center['centerNumber']);
        $this->setCenterEmail($center['centerEmail']);
    }

    public function getAllCenters(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `centers`");
        $stmt->execute();
        $centers = $stmt->fetchAll();
        foreach($centers as $center){
            $this->setCenter($center);
            $this->centers[$center['centerId']] = $this->getCenter();
        }
        
        return $this->centers;
    }

    public function getOneCenter($centerId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `centers` WHERE `centerId` = $centerId");
        $stmt->execute();
        $center = $stmt->fetch();
        $this->setCenter($center);
        return $this;
    }

    public function getSelectCenterCitys(): array
    {
        $centers = $this->getAllCenters();
        $arrayCitys = [];
        foreach ($centers as $center) {
            if(!in_array($center['centerCity'], $arrayCitys)){
                $arrayCitys[$center['centerId']] = $center['centerName'];
            }
        }
        return $arrayCitys;
    }

    public function createCenter($centerName, $centerCity, $centerAdress, $centerZip, $centerCountry, $centerNumber, $centerEmail): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO `centers` (`centerName`, `centerCity`, `centerAdress`, `centerZip`, `centerCountry`, `centerNumber`, `centerEmail`) VALUES (:centerName, :centerCity, :centerAdress, :centerZip, :centerCountry, :centerNumber, :centerEmail)");
        $stmt->bindValue(':centerName', $centerName);
        $stmt->bindValue(':centerCity', $centerCity);
        $stmt->bindValue(':centerAdress', $centerAdress);
        $stmt->bindValue(':centerZip', $centerZip);
        $stmt->bindValue(':centerCountry', $centerCountry);
        $stmt->bindValue(':centerNumber', $centerNumber);
        $stmt->bindValue(':centerEmail', $centerEmail);
        $stmt->execute();
    }

    public function updateCenter($centerId, $centerName, $centerCity, $centerAdress, $centerZip, $centerCountry, $centerNumber, $centerEmail): void
    {
        $stmt = $this->pdo->prepare("UPDATE `centers` SET `centerName` = :centerName, `centerCity` = :centerCity, `centerAdress` = :centerAdress, `centerZip` = :centerZip, `centerCountry` = :centerCountry, `centerNumber` = :centerNumber, `centerEmail` = :centerEmail WHERE `centerId` = :centerId");
        $stmt->bindValue(':centerId', $centerId);
        $stmt->bindValue(':centerName', $centerName);
        $stmt->bindValue(':centerCity', $centerCity);
        $stmt->bindValue(':centerAdress', $centerAdress);
        $stmt->bindValue(':centerZip', $centerZip);
        $stmt->bindValue(':centerCountry', $centerCountry);
        $stmt->bindValue(':centerNumber', $centerNumber);
        $stmt->bindValue(':centerEmail', $centerEmail);
        $stmt->execute();
    }

    public function deleteCenter($centerId): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM `centers` WHERE `centerId` = :centerId");
        $stmt->bindValue(':centerId', $centerId);
        $stmt->execute();
    }



    

}