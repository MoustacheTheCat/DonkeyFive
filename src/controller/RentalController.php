<?php

namespace Application\Controller;

require_once('src/model/Rental.php');
require_once('src/model/Field.php');

use Application\Model\Rental;
use Application\Model\Field;

class RentalController {

        public static function index()
        {
            $rental = new Rental();
            $rentals = $rental->getAllRentals();
            $pageTitle = "hello world";
            require_once('src/template/Rental.php');
        }

        public static function viewAll()
        {
            $rental = new Rental();
            $pageTitle = "Rental";
            $datas = $rental->getAllRentals();
            if(empty($datas)){
                $error = "Aucune donnée à afficher";
            }
            require_once('src/template/ViewRental.php');
        }
        public static function viewRental()
        {
            $rental = new Rental();
            $pageTitle = "Rental";
            $datas = $rental->getRentalById();
            
            $field  = new Field();
            $fieldDatas = $field->getOneField(JSON_DECODE($datas['rentalOptions'])->filedId);
            if(empty($datas)){
                $error = "Aucune donnée à afficher";
            }
            $datasOptions = JSON_DECODE($datas['rentalOptions']);
            $dataTimes = JSON_DECODE($datas['rentalTimes']); 
            $array = (array) $datasOptions;
            $nbOp = 0;
            $id = [];
            foreach ($array as $key => $value) {
                if(is_int($key)){
                    $nbOp++;
                    $id[] = $key;
                }
            }
            require_once('src/template/RentalDetail.php');
        }

        
        public static function updateStatusValid()
        {
            $status = "yes";
            $rental = new Rental();
            $rental->updateStatus($status);
            header('Location: /rentals');
        }

        public static function updateStatusRefused()
        {
            $status = "no";
            $rental = new Rental();
            $rental->updateStatus($status);
            header('Location: /rentals');
        }

        public function delete()
        {
            $rental = new Rental();
            $rental->deleteRental();
            header('Location: /rentals');
        }

        public static function checkRent()
        {
            if(!empty($_SESSION['user'])) {
                $rent = new Rental();
                $res = $rent->addRental();
                if($res) {
                    header('Location: /');
                }
            }
            $error = "Vous devez être connecté pour accéder à cette page";
            require_once('src/template/Login.php');

            
            die();
        }
}
