<?php

namespace Application\Model;

require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;

class UserCenter {
    public function __construct(
        private $userId = null,
        private $centerId = null,
        private $pdo = null,
        )
    {
        $this->pdo = DatabaseConnection::getDataBase();
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getCenterId(): int
    {
        return $this->centerId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function setCenterId(int $centerId): void
    {
        $this->centerId = $centerId;
    }

    public function getAllUsersCenters (){
        $sql = "SELECT * FROM `usersCenters`";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute();
        $res = $pdoStatement->fetchAll(\PDO::FETCH_ASSOC);
        if($res){
            return $res;
        }
        return false;
    }

    function getUserCenterByCenterId($centerId){
        $sql = "SELECT * FROM `usersCenters` WHERE `centerId` = :centerId";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':centerId', $centerId, \PDO::PARAM_INT);
        $pdoStatement->execute();
        $res = $pdoStatement->fetchAll(\PDO::FETCH_ASSOC);
        if($res){
            return $res;
        }
        return false;
    }

    function getOneUserCenterByUserId($userId){
        $sql = "SELECT * FROM `usersCenters` WHERE `userId` = :userId";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':userId', $userId, \PDO::PARAM_INT);
        $pdoStatement->execute();
        $res = $pdoStatement->fetchAll(\PDO::FETCH_ASSOC);
        if($res){
            return $res;
        }
        return false;
    }

    public function addUserCenter()
    {
        if(!empty($userId) &&  !empty($centerId)){
            $sql = "INSERT INTO `usersCenters` (`userId`, `centerId`) VALUES (:userId, :centerId)";
            $pdoStatement = $this->pdo->prepare($sql);
            $pdoStatement->bindValue(':userId', $userId, \PDO::PARAM_INT);
            $pdoStatement->bindValue(':centerId', $centerId, \PDO::PARAM_INT);
            $res = $pdoStatement->execute();
            if($res){
                return true;
            }
            return false;
        }
    }
}