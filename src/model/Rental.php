<?php

namespace Application\Model;

require_once('src/lib/DatabaseConnection.php');
require_once('src/model/UserCenter.php');
require_once('src/model/User.php');

use Application\lib\DatabaseConnection;
use Application\Model\UserCenter;
use Application\Model\User;

class Rental {

    public function __construct(
        private $rentalId = null,
        private $rentalNumber = null,
        private $rentalCostofTVA = null,
        private $rentalCostHT = null,
        private $rentalCostTTC = null,
        private $rentalStatus = null,
        private $rentalOptions = [],
        private $rentalTimes = [],
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

public function getRentalOptions(): array
{
    return $this->rentalOptions;
}

public function getRentalTimes(): array
{
    return $this->rentalTimes;
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

public function setRentalOptions(array $rentalOptions): void
{
    $this->rentalOptions = $rentalOptions;
}

public function setRentalTimes(array $rentalTimes): void
{
    $this->rentalTimes = $rentalTimes;
}


public function getRentals (): array
{
    return $this->rentals;
}

public function setRentals (array $rentals): void
{
    $this->rentals = $rentals;
}

public function getRental (): array
{
    return [
        'rentalId' => $this->rentalId,
        'rentalNumber' => $this->rentalNumber,
        'rentalCostofTVA' => $this->rentalCostofTVA,
        'rentalCostHT' => $this->rentalCostHT,
        'rentalCostTTC' => $this->rentalCostTTC,
        'rentalStatus' => $this->rentalStatus,
        'rentalOptions' => $this->rentalOptions,
        'rentalTimes' => $this->rentalTimes
    ];
    
}





public function addRental()
{
    $id = $_GET['id'];
    $userId = $_SESSION['user']['userId'];
    $_SESSION['cart'][$id]['options']['filedId'] = $_SESSION['cart'][$id]['field']['fieldId'];
    $options = $_SESSION['cart'][$id]['options'];   
    $times = $_SESSION['cart'][$id]['time'];
    $rentalNumber = rand();
    $rentalCostofTVA = "20%";
    $rentalCostHT = $_SESSION['cart'][$id]['totalTTC'] / 1.2;
    $rentalCostTTC = $_SESSION['cart'][$id]['totalTTC'];
    $sql = "INSERT INTO `rentals` (`userId`,`rentalNumber`, `rentalCostofTVA`, `rentalTotalHT`, `rentalTotalTTC`,`rentalOptions`, `rentalTimes`) VALUES (:userId,:rentalNumber, :rentalCostofTVA, :rentalTotalHT, :rentalTotalTTC, :rentalOptions, :rentalTimes)";
    $pdoStatement = $this->pdo->prepare($sql);
    $pdoStatement->bindValue(':userId', $userId);
    $pdoStatement->bindValue(':rentalNumber', $rentalNumber);
    $pdoStatement->bindValue(':rentalCostofTVA', $rentalCostofTVA);
    $pdoStatement->bindValue(':rentalTotalHT', $rentalCostHT);
    $pdoStatement->bindValue(':rentalTotalTTC', $rentalCostTTC);
    $pdoStatement->bindValue(':rentalOptions', JSON_ENCODE($options));
    $pdoStatement->bindValue(':rentalTimes', JSON_ENCODE($times));
    $resOne = $pdoStatement->execute();
    if($resOne){
        $idRent = $this->pdo->lastInsertId();
        $idCenter = $_SESSION['cart'][$id]['field']['centerId'];    
        $sql = "INSERT INTO donkeyFive.rentalsCenters (rentalId, centerId) VALUES(:rentalId, :centerId);";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':rentalId', $idRent);
        $pdoStatement->bindValue(':centerId', $idCenter);
        $resTwo = $pdoStatement->execute();
        if($resTwo){
            $to = $_SESSION['user']['userEmail'];
            $subject = "Confirmation de votre réservation";
            $message = "Bonjour, nous vous confirmons votre réservation. Votre numéro de réservation est le : " . $rentalNumber . ". Merci de votre confiance.";
            $headers = "From: admin@donkeyfive.com";
            mail($to, $subject, $message, $headers);
            unset($_SESSION['cart']);
            $userEmail = $_SESSION['user']['userEmail'];
            $sql = "INSERT INTO donkeyFive.messages (messgeTo, messageFrom, messageSubject, messageText, messageStatus) VALUES(:messgeTo, :messageFrom, :messageSubject, :messageText, :messageStatus)";
            $pdoStatement = $this->pdo->prepare($sql);
            $messageRes = "Veuillez valider la resérvation : <a href='/rental/detail?id=".$idRent."'>" . $rentalNumber . "</a> pour l\'utilisateur : " . $userEmail;
            $pdoStatement->bindValue(':messgeTo', 'adminDonkeyFive');
            $pdoStatement->bindValue(':messageFrom', $userEmail);
            $pdoStatement->bindValue(':messageSubject', 'Validation de réservation');
            $pdoStatement->bindValue(':messageText', $messageRes);
            $pdoStatement->bindValue(':messageStatus', 1);
            $resFour = $pdoStatement->execute();
            if($resFour){
                $userCent = new UserCenter();
                $userByCenters = $userCent->getUserCenterByCenterId($idCenter);
                $sql = "INSERT INTO donkeyFive.userMessage (messageId, userId) VALUES(:messageId, :userId)";
                foreach($userByCenters as $userByCenter){
                    $pdoStatement = $this->pdo->prepare($sql);
                    $pdoStatement->bindValue(':messageId', $this->pdo->lastInsertId());
                    $pdoStatement->bindValue(':userId', $userByCenter['userId']);
                    $resFive = $pdoStatement->execute();
                    if($resFive){
                        return true;
                    }
                }
            } 
        }
    } else {
        return false;
    }
}

public function deleteRental()
{
    $rentalId = $_GET['id'];
    $sql = "DELETE FROM `rentals` WHERE `rentalId` = :rental_id";
    $pdoStatement = $this->pdo->prepare($sql);
    $pdoStatement->bindValue(':rental_id', $rentalId);
    $pdoStatement->execute();
}

public function getAllRentals(): array
{
    $sql = "SELECT * FROM `rentals`";
    $pdoStatement = $this->pdo->query($sql);
    $this->rentals = $pdoStatement->fetchAll();
    return $this->rentals;
}

public function getAllRentalsByUser($idU)
{
    $sql = "SELECT * FROM `rentals` WHERE `userId` = :id";
    $pdoStatement = $this->pdo->prepare($sql);
    $pdoStatement->bindValue(':id', $idU);
    $pdoStatement->execute();
    $res = $pdoStatement->fetchAll();
    if(!empty($res)){
        return $res;
    }
    return false;
}



public function getRentalById()
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM `rentals` WHERE `rentalId` = :rental_id";
    $pdoStatement = $this->pdo->prepare($sql);
    $pdoStatement->bindValue(':rental_id', $id);
    $pdoStatement->execute();
    $this->rental = $pdoStatement->fetch();
    return $this->rental;
}

public function updateStatus($status)
{
    if($status == "yes"){
        $status = 2;
    } 
    elseif($status == "no") {
        $status = 0;
    }
    $id = $_GET['id'];
    $sql = "UPDATE `rentals` SET `rentalStatus` = :rentalStatus WHERE `rentalId` = :rentalId";
    $pdoStatement = $this->pdo->prepare($sql);
    $pdoStatement->bindValue(':rentalId', $id);
    $pdoStatement->bindValue(':rentalStatus',$status);
    $res = $pdoStatement->execute();
    if($res){
        if($status == 2){
            $dtU = new Rental();
            $dataRent = $dtU->getRentalById();
            $idUser = $dataRent['userId'];
            $datasOptions = JSON_DECODE($dataRent['rentalOptions']);
            $dataTimes = JSON_DECODE($dataRent['rentalTimes']); 
            $use = new User();
            $userEmail = $use->getEmailUserById($idUser);
            $to =  $userEmail['userEmail'];
            $subject = "Confirmation de votre réservation";
            $message = "Bonjour, nous vous confirmons votre réservation. Votre numéro de réservation est le : " . $this->getRentalById()['rentalNumber'] . ". Merci de votre confiance.";
            $headers = "From: admin@donkeyFive.com";
            mail($to, $subject, $message, $headers);
            $query = "INSERT INTO donkeyFive.rentalsFields (fieldId, rentalId, rentalsfieldsNbDays, rentalsFieldsNbHours, rentalsFieldsDateEnd, rentalfieldHourStart, rentalsfieldsDateStart, rentalsFieldsHourEnd) VALUES(:fieldId, :rentalId,  :rentalsfieldsNbDays, :rentalsFieldsNbHours, :rentalsFieldsDateEnd, :rentalfieldHourStart, :rentalsfieldsDateStart, :rentalsFieldsHourEnd)";
            $pdoStatement = $this->pdo->prepare($query);
            $pdoStatement->bindValue(':fieldId', $datasOptions->filedId);
            $pdoStatement->bindValue(':rentalId', $id);
            $pdoStatement->bindValue(':rentalsfieldsNbDays', $dataTimes->nbDay);
            $pdoStatement->bindValue(':rentalsFieldsNbHours', $dataTimes->nbHour);
            $pdoStatement->bindValue(':rentalsFieldsDateEnd', $dataTimes->dateEnd);
            $pdoStatement->bindValue(':rentalfieldHourStart', $dataTimes->hourStart);
            $pdoStatement->bindValue(':rentalsfieldsDateStart', $dataTimes->dateStart);
            $pdoStatement->bindValue(':rentalsFieldsHourEnd', $dataTimes->hourEnd);
            $resTwo = $pdoStatement->execute();
            if($resTwo){
                return true;
            }
        }
    }
    return false;
}

}