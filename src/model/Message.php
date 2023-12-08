<?php

namespace Application\Model;

require_once('src/lib/DatabaseConnection.php');
require_once('src/model/UserMessage.php');

use Application\lib\DatabaseConnection;
use Application\Model\UserMessage;

class Message {
    public function __construct(
        private $messageId = null,
        private $messageTo = null,
        private $messageFrom = null,
        private $messageSubject = null,
        private $messageText = null,
        private $messageStatus = null,
        private $messages = [],
        private $message = [],
        private $pdo = null,
        )
    {
        $this->pdo = DatabaseConnection::getDataBase();
    }

    public function getMessageId(): int
    {
        return $this->messageId;
    }

    public function getMessageTo(): int
    {
        return $this->messageTo;
    }

    public function getMessageFrom(): int
    {
        return $this->messageFrom;
    }

    public function getMessageSubject(): string
    {
        return $this->messageSubject;
    }

    public function getMessageText(): string
    {
        return $this->messageText;
    }

    public function getMessageStatus(): string
    {
        return $this->messageStatus;
    }

    public function setMessageTo(int $messageTo): void
    {
        $this->messageTo = $messageTo;
    }

    public function setMessageFrom(int $messageFrom): void
    {
        $this->messageFrom = $messageFrom;
    }

    public function setMessageSubject(string $messageSubject): void
    {
        $this->messageSubject = $messageSubject;
    }

    public function setMessageText(string $messageText): void
    {
        $this->messageText = $messageText;
    }

    public function setMessageStatus(string $messageStatus): void
    {
        $this->messageStatus = $messageStatus;
    }

    public function addMessage()
    {
        $errorArray = [];
        $messageSendCopy = $_POST['messageSendCopy'];
        $messageTo = "admin@donkeyfive.com";
        if(empty($_POST['messageFrom'])){
            $errorArray['messageFrom'] = "Please enter your email";
        }
        else{
            $messageFrom = $_POST['messageFrom'];
        }
        if(empty($_POST['messageSubject'])){
            $errorArray['messageSubject'] = "Please enter a subject";
        }
        else{
            $messageSubject = $_POST['messageSubject'];
        }
        if(empty($_POST['messageText'])){
            $errorArray['messageText'] = "Please enter a message";
        }
        else{
            $messageText = $_POST['messageText'];
        }
        if(!empty($errorArray)){
            return $errorArray;
        }else {
            if(!empty($_POST['firstName'])|| !empty($_POST['lastName'])){
                $newMessage = $_POST['firstName']." ".$_POST['lastName'];
                $newMessage .= "\n";
                $newMessage .= $messageText;
                $messageText = $newMessage;
            }
            $sql = "INSERT INTO `messages` (`messageTo`, `messageFrom`, `messageSubject`, `messageText`, `messageStatus`) VALUES (:messageTo, :messageFrom, :messageSubject, :messageText, :messageStatus)";
            $pdoStatement = $this->pdo->prepare($sql);
            $pdoStatement->bindValue(':messageTo', $messageTo, \PDO::PARAM_INT);
            $pdoStatement->bindValue(':messageFrom', $messageFrom, \PDO::PARAM_INT);
            $pdoStatement->bindValue(':messageSubject', $messageSubject, \PDO::PARAM_STR);
            $pdoStatement->bindValue(':messageText', $messageText, \PDO::PARAM_STR);
            $pdoStatement->bindValue(':messageStatus',0, \PDO::PARAM_STR);
            if($pdoStatement->execute()){
                $messageId = $this->pdo->lastInsertId();
                if(empty($_SESSIO['user']['userId'])){
                    $userId = 0;
                }else {
                    $userId = $_SESSION['user']['userId'];
                }
                $userMessage = new UserMessage();
                $userMessage->addUserMessage($userId,$messageId);
                if($messageSendCopy == "on"){
                    $headers = 'From: '.$messageTo."\r\n".
                    $mail = self::sendMail($messageFrom, $messageSubject, $messageText, $headers);
                    return $mail;
                }
                return true;
            }
            else{
                return false;
            }
        }
    }

    public function deleteMessage()
    {
        $messageId = $_GET['id'];
        $sql = "DELETE FROM `messages` WHERE `messageId` = :message_id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':message_id', $messageId, \PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    public function getAllMessages(): array
    {
        $sql = "SELECT * FROM `messages`";
        $pdoStatement = $this->pdo->query($sql);
        $this->messages = $pdoStatement->fetchAll();
        return $this->messages;
    }

    public function getMessageById()
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `messages` WHERE `messageId` = :message_id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':message_id', $id, \PDO::PARAM_INT);
        $pdoStatement->execute();
        $res = $pdoStatement->fetch();
        if($res){
            if($res['messageStatus'] == 1){
                $this->updateStatus();
            }
            return $res;
        }
        return false;
    }

    public function updateStatus()
    {
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $sql = "UPDATE `messages` SET `messageStatus` = :messageStatus WHERE `messageId` = :message_id";
            $pdoStatement = $this->pdo->prepare($sql);
            $pdoStatement->bindValue(':message_id', $id, \PDO::PARAM_INT);
            $pdoStatement->bindValue(':messageStatus', 0, \PDO::PARAM_STR);
            if($pdoStatement->execute()){
                return true;
            }
            return false;
        }    
    }

    public static function  sendMail($to, $subject, $message, $headers)
    {
        if(mail($to, $subject, $message, $headers)){
            return true;
        }
        return false;
    }

    public function countNbMessageNoRead()
    {
        if(!empty($_SESSION['user'])){
            $arrayId = [];
            $pdoStatement = $this->pdo->query("SELECT COUNT(`messageId`) FROM `messages` WHERE `messageStatus` = 1");
            $nbMessageNoRead = $pdoStatement->fetch();
            if($nbMessageNoRead >= 1){
                $pdoStatement = $this->pdo->query("SELECT messageId FROM `messages` WHERE `messageStatus` = 1");
                $messagesNoRead = $pdoStatement->fetchAll();
                foreach($messagesNoRead as $messageNoRead){
                    $arrayId[] = $messageNoRead['messageId'];
                }
                $userMessages = new UserMessage();
                $alls = $userMessages->getAll();
                $count = 0;
                foreach($alls as $all){
                    if((in_array($all['messageId'], $arrayId) && $all['userId'] == $_SESSION['user']['userId'])){
                        $count++;
                    }
                }
                if($count >= 1){
                    return $count;
                }
            }
        }
        
        return false;
    }   


}