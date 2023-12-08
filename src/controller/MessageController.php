<?php

namespace Application\Controller;

require_once('src/model/Message.php');

use Application\Model\Message;

class MessageController {
    public static function viewMessages()
    {
        $message = new Message();
        $messages = $message->getAllMessages();
        if(empty($messages)){
            $error = "No messages";
        }
        $pageTitle = "Message";
        require_once('src/template/Messages.php');
    }

    public static function viewOneMessage()
    {
        $message = new Message();
        $res = $message->getMessageById();
        if($res){
            $message = $res;
        }
        else{
            $error = "empty message";
        }
        $pageTitle = "Message";
        require_once('src/template/ViewMessage.php');
    }

    public static function contact(){
        $pageTitle = "Contact";
        require_once('src/template/Contact.php');
    }
    

    public static function add()
    {
        $pageTitle = "Add Message";
        require_once('src/template/AddMessage.php');
    }

    public static function addCheck()
    {
        $message = new Message();
        $res = $message->addMessage();
        if($res){
            $result = "message created";
            return $result;
        }else{
            $error = "message not created";
            return $error;
        }
    }

    public static function deleteCheck()
    {
        $message = new Message();
        $res = $message->deleteMessage();
        if($res){
            $result = "message deleted";
            
        }else{
            $error = "message not deleted";
            
        }
        header('Location: /messages');  
    }

    public static function updateCheck()
    {
        $message = new Message();
        $res = $message->updateMessage();
        if($res){
            $result = "message updated";
            return $result;
        }else{
            $error = "message not updated";
            return $error;
        }
    }

    public static function countNbMessageNotRead()
    {
        $message = new Message();
        $res = $message->countNbMessageNoRead();
        if($res >= 1 && $res != null){
            return $res;
        }
    }

}