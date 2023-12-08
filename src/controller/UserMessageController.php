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

    public static function viewUserMessageByUserId()
    {
        $pageTitle = "Messages";
        $userMessage = new UserMessage();
        $res = $userMessage->getUserMessageByUserId();
        if($res){
            $messages = $res;
            
        }else{
            $error = "empty message";
            
        }
        
        require_once('src/template/Messages.php');
    }

}