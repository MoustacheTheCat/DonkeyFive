<?php

namespace Application\Controller;

require_once('src/model/Center.php');

use Application\Model\Center\Center;

class CenterController {
    
        public static function index()
        {
            $center = new Center();
            $citys = $center->getSelectCenterCitys();
            return $citys;
        }

        public static function test(){
            $center = new Center();
            $datas = $center->getAll();
            return $datas;
        }
    
        public function show($centerId)
        {
            $center = new Center();
            $center = $center->getCenter($centerId);
            $pageTitle = "center";
            require_once('src/template/center.php');
        }

        public function updateName($centerId, $newName)
        {
            $center = new Center();
            $center->getAllCenters();
            //var_dump($center->getAllCenters());
            //var_dump($datas); 
            $center->updateCenterName($centerId, $newName);  
            
            // $center->updateCenterName($centerId, $centerName);
            //header('Location: /centers');
            return $center->getAll();
        }
    
        public function create()
        {
            $pageTitle = "Create center";
            require_once('src/template/CreateCenter.php');
        }
    
        public function store()
        {
            $centerName = $_POST['centerName'];
            $centerCity = $_POST['centerCity'];
            $centerAdress = $_POST['centerAdress'];
            $centerZip = $_POST['centerZip'];
            $centerCountry = $_POST['centerCountry'];
            $centerNumber = $_POST['centerNumber'];
            $centerEmail = $_POST['centerEmail'];
    
            $center = new Center();
            $center->createCenter($centerName, $centerCity, $centerAdress, $centerZip, $centerCountry, $centerNumber, $centerEmail);
            header('Location: /centers');
        }
    
        public function edit($centerId)
        {
            $center = new Center();
            $center = $center->getCenter($centerId);
            $pageTitle = "Edit center";
            require_once('src/template/Editcenter.php');
        }
    
        public function update($centerId)
        {
            $centerName = $_POST['centerName'];
            $centerCity = $_POST['centerCity'];
            $centerAdress = $_POST['centerAdress'];
            $centerZip = $_POST['centerZip'];
            $centerCountry = $_POST['centerCountry'];
            $centerNumber = $_POST['centerNumber'];
            $centerEmail = $_POST['centerEmail'];
    
            $center = new Center();
            $center->updateCenter($centerId, $centerName, $centerCity, $centerAdress, $centerZip, $centerCountry, $centerNumber, $centerEmail);
            header('Location: /centers');
        }
    
        public function delete($centerId)
        {
            $center = new Center();
            $center->deleteCenter($centerId);
            header('Location: /centers');
        }


}