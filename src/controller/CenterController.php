<?php

namespace Application\Controller;

require_once('src/model/Center.php');

use Application\Model\Center;

class CenterController {

        public static array $pays = [
            "France", "Germany", "Italy", "Spain", "United Kingdom", "Netherlands",
            "Belgium", "Sweden", "Poland", "Switzerland", "Norway", "Denmark",
            "Finland", "Austria", "Portugal", "Greece", "Ireland", "Czech Republic",
            "Hungary", "Croatia", "United States", "Canada", "Australia", "India", "China"
        ];
    
        public static function index()
        {
            $center = new Center();
            $citys = $center->getSelectCenterCitys();
            return $citys;
        }

        public static function viewAll()
        {
            $center = new Center();
            $pageTitle = "Centers";
            $datas = $center->getAllCenters();
            if(empty($datas)){
                $error = "Aucune donnée à afficher";
            }
            require_once('src/template/ViewAll.php');
        }

        public static function add()
        {
            $pageTitle = "Create center";
            $pays = self::$pays;
            require_once('src/template/CreateCenter.php');
        }

        public static function addCheck()
        {
            $center = new Center();
            $res = $center->addCheck();
            if($res){
                $success = "center created";
                header('Location: /centers');
            }else{
                $error = "center not created";
                header('Location: /center/add');
            }
        }
    
        public static function edit()
        {
            $id = $_GET['id'];
            $center = new Center();
            $center = $center->getOneCenter($id);
            $pageTitle = "Edit center";
            require_once('src/template/EditCenter.php');
        }
    
        public static function editCheck()
        {
            
            $center = new Center();
            $res = $center->updateCheck();
            if($res){
                $success = "center updated";
                header('Location: /center');
            }else{
                $error = "center not updated";
                header('Location: /center/edit?id='.$_GET['id'].'');
            }
        }

        public static function editPicture()
        {
            $center = new Center();
            $res = $center->updatePictureCenter();
            if($res){
                $success = "center updated";
                header('Location: /center');
            }else{
                $error = "center not updated";
                header('Location: /center/edit?id='.$_GET['id'].'');
            }
        }
    
        public static function delete()
        {
            $center = new Center();
            $res = $center->delete($centerId);
            if($res){
                $success = "center deleted";
                header('Location: /centers');
            }else{
                $error = "center not deleted";
                header('Location: /center/edit?id='.$_GET['id'].'');
            }
        }
}