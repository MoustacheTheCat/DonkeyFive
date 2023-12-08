<?php

namespace Application\Model;

require_once('src/lib/DatabaseConnection.php');
require_once('src/model/Message.php');

use Application\lib\DatabaseConnection;
use Application\Model\Message;

class UserMessage {
    public function __construct(
        private $userId = null,
        private $messageId = null,
        private $userMessages = [],
        private $userMessage = [],
        private $pdo = null,
        )
    {
        $this->pdo = DatabaseConnection::getDataBase();;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getMessageId(): int
    {
        return $this->messageId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function setMessageId(int $messageId): void
    {
        $this->messageId = $messageId;
    }

    public function getAll(){
        $sql = "SELECT * FROM userMessage";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $userMessages = $stmt->fetchAll();
        return $userMessages;
    }

    public function addUserMessage(int $userId, int $messageId)
    {
        $sql = "INSERT INTO `userMessage` (`userId`, `messageId`) VALUES (:userId, :messageId)";
        $stmt = $this->pdo->prepare($sql);
        $tmt->bindValue(':userId', $userId);
        $tmt->bindValue(':messageId', $messageId);
        $res = $stmt->execute();
        if($res){
            return true;
        }
        return false;
    }

    

    public function getUserMessageByUserId()
    {
        $id = $_SESSION['user']['userId'];  
        $sql = "SELECT * FROM userMessage WHERE userId = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindvalue(':userId', $id);
        $stmt->execute();
        $res = $stmt->fetchAll();
        $messages = [];
        if ($res) {
            $query = "SELECT * FROM messages WHERE messageId = :messageId";
            foreach($res as $message){
                $stmt = $this->pdo->prepare($query);
                $stmt->bindValue(':messageId', $message['messageId']);
                $stmt->execute();
                $messages[] = $stmt->fetch();
            }
            if (!empty($messages)) {
                return $messages;
            }
        }
        return false;
    }
            
}