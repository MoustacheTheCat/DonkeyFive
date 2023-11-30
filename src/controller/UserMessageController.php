<?php

namespace Application\Controller;

require_once('src/model/UserMessage.php');

use Application\Model\UserMessage;

class UserMessageController {
    public static function viewAllUserMessage()
    {
        $userMessage = new UserMessage();
        $userMessages = $userMessage->getAllUsersMessages();
    }

    public static function viewUserMessageByUserId($userId)
    {
        $userMessage = new UserMessage();
        $res = $userMessage->getOneUserMessage($userId);
        if($res == false){
            $error = "user not found";
            return $error;
        }
        $pageTitle = "UserMessage";
        require_once('src/template/UserMessage.php');
    }

    public static function viewUserMessageByMessageId($messageId)
    {
        $userMessage = new UserMessage();
        $res = $userMessage->getUserMessageByMessageId($messageId);
        if($res == false){
            $error = "user not found";
            return $error;
        }
        $pageTitle = "UserMessage";
        require_once('src/template/UserMessage.php');
    }

    public static function addCheck()
    {
        $userMessage = new UserMessage();
        $res = $userMessage->addUserMessage();
        if($res){
            $result = "userMessage created";
            return $result;
        }else{
            $error = "userMessage not created";
            return $error;
        }
    }
}