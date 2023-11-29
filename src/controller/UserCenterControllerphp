<?php

namespace Application\Controller;

require_once('src/model/UserCenter.php');

use Application\Model\UserCenter;

class UserCenterController {
    public static function viewAllUserCenter()
    {
        $userCenter = new UserCenter();
        $userCenters = $userCenter->getAllUsersCenters();
    }

    public static function viewUserCenterByUserId($userId)
    {
        $userCenter = new UserCenter();
        $res = $userCenter->getOneUserCenter($userId);
        if($res == false){
            $error = "user not found";
            return $error;
        }
        $pageTitle = "UserCenter";
        require_once('src/template/UserCenter.php');
    }

    public static function viewUserCenterByCenterId($centerId)
    {
        $userCenter = new UserCenter();
        $res = $userCenter->getUserCenterByCenterId($centerId);
        if($res == false){
            $error = "user not found";
            return $error;
        }
        $pageTitle = "UserCenter";
        require_once('src/template/UserCenter.php');
    }

    public static function addCheck()
    {
        $userCenter = new UserCenter();
        $res = $userCenter->addUserCenter();
        if($res){
            $result = "userCenter created";
            return $result;
        }else{
            $error = "userCenter not created";
            return $error;
        }
    }
}