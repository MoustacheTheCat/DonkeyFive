<?php

namespace Application\Model;

require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;

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

    public function addUserMessage(int $userId, int $messageId)
    {
        $sql = "INSERT INTO `user_message` (`userId`, `messageId`) VALUES (:userId, :messageId)";
        $stmt = $this->pdo->prepare($sql);
        $tmt->bindValue(':userId', $userId);
        $tmt->bindValue(':messageId', $messageId);
        $res = $stmt->execute();
        if($res){
            return true;
        }
        return false;
    }

    public function getUserMessages(): array
    {
        $sql = "SELECT * FROM user_message";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $userMessages = $stmt->fetchAll();
        return $userMessages;
    }

    public function getUserMessageByUserId(int $userId): array
    {
        $sql = "SELECT * FROM user_message WHERE userId = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindvalue(':userId', $userId);
        $stmt->execute();
        $userMessage = $stmt->fetch();
        return $userMessage;
    }
            
}