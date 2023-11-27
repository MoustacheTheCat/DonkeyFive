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
        private $center = [],
        private $centers = [],
        )
    {
        
    }

    public function getcenterId(): int
    {
        return $this->centerId;
    }

    public function getcenterName(): string
    {
        return $this->centerName;
    }

    public function getcenterCity(): string
    {
        return $this->centerCity;
    }

    public function getcenterAdress(): string
    {
        return $this->centerAdress;
    }

    public function getcenterZip(): string
    {
        return $this->centerZip;
    }

    public function getcenterCountry(): string
    {
        return $this->centerCountry;
    }

    public function getcenterNumber(): string
    {
        return $this->centerNumber;
    }

    public function getcenterEmail(): string
    {
        return $this->centerEmail;
    }

    public function setcenterId(int $centerId): void
    {
        $this->centerId = $centerId;
    }

    public function setcenterName(string $centerName): void
    {
        $this->centerName = $centerName;
    }

    public function setcenterCity(string $centerCity): void
    {
        $this->centerCity = $centerCity;
    }

    public function setcenterAdress(string $centerAdress): void
    {
        $this->centerAdress = $centerAdress;
    }

    public function setcenterZip(string $centerZip): void
    {
        $this->centerZip = $centerZip;
    }

    public function setcenterCountry(string $centerCountry): void
    {
        $this->centerCountry = $centerCountry;
    }

    public function setcenterNumber(string $centerNumber): void
    {
        $this->centerNumber = $centerNumber;
    }

    public function setcenterEmail(string $centerEmail): void
    {
        $this->centerEmail = $centerEmail;
    }

    public function getcenter(): array
    {
        return [
            'centerId' => $this->getcenterId(),
            'centerName' => $this->getcenterName(),
            'centerCity' => $this->getcenterCity(),
            'centerAdress' => $this->getcenterAdress(),
            'centerZip' => $this->getcenterZip(),
            'centerCountry' => $this->getcenterCountry(),
            'centerNumber' => $this->getcenterNumber(),
            'centerEmail' => $this->getcenterEmail(),
        ];
    }

    public function setcenter(array $center): void
    {
        $this->setcenterId($center['centerId']);
        $this->setcenterName($center['centerName']);
        $this->setcenterCity($center['centerCity']);
        $this->setcenterAdress($center['centerAdress']);
        $this->setcenterZip($center['centerZip']);
        $this->setcenterCountry($center['centerCountry']);
        $this->setcenterNumber($center['centerNumber']);
        $this->setcenterEmail($center['centerEmail']);
    }

    public function getAllcenters()
    {
        $pdo = \Application\lib\DatabaseConnection::getDataBase();
        $sql = "SELECT * FROM `centers`";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $centers = $stmt->fetchAll();
        $this->centers[] = $centers;
        return $this->centers;
    }

    public function getOnecenter($centerId): array
    {
        $pdo = \Application\lib\DatabaseConnection::getDataBase();
        $sql = "SELECT * FROM `centers` WHERE `centerId` = $centerId";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $this->center = $stmt->fetch();
        return $this->center;
    }

    public function getSelectCentercountries()
    {
        $centers = $this->getAllcenters();
        $centers = $centers[0];
        $arraycountries = [];
        foreach ($centers as $center) {
            if(!in_array($center['centerCountry'], $arraycountries)){
                $arraycountries[$center['centerId']] = $center['centerCountry'];
            }
        }
        return $arraycountries;
    }

    public function getSelectCenterCitys()
    {
        $centers = $this->getAllcenters();
        $centers = $centers[0];
        $arrayCitys = [];
        foreach ($centers as $center) {
            if(!in_array($center['centerCity'], $arrayCitys)){
                $arrayCitys[$center['centerId']] = $center['centerName'];
            }
        }
        return $arrayCitys;
    }

}