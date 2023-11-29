<?php

namespace Application\Controller\RentalsCenters;

require_once('src/model/RentalsCenters.php');

use Application\Model\RentalsCenters\RentalsCenters;

class RentalsCentersController {

        public static function index()
        {
            $rentalscenters = new RentalsCenters();
            $rentalscenters = $rentalscenters->getAllRentalsCenters();
            $pageTitle = "hello world";
            require_once('src/template/RentalsCenters.php');
        }

        public function show($rentalId)
        {
            $rentalscenters = new RentalsCenters();
            $rentalscenters = $rentalscenters->getRentalCenterById($rentalId);
            $pageTitle = "Rental";
            require_once('src/template/RentalsCenters.php');
        }

        public function create()
        {
            $pageTitle = "Create rental";
            require_once('src/template/CreateRental.php');
        }

        public function store()
        {
            $rentalNumber = $_POST['rentalNumber'];
            $rentalCostofTVA = $_POST['rentalCostofTVA'];
            $rentalCostHT = $_POST['rentalCostHT'];
            $rentalCostTTC = $_POST['rentalCostTTC'];
            $rentalStatus = $_POST['rentalStatus'];
            $rental = new RentalsCenters();
            $rental->addRentalCenter($rentalNumber, $rentalCostofTVA, $rentalCostHT, $rentalCostTTC, $rentalStatus);
            header('Location: /rentals');
        }

        public function edit($rentalId)
        {
            $rental = new RentalsCenters();
            $rental = $rental->getRentalCenterById($rentalId);
            $pageTitle = "Edit rental";
            require_once('src/template/EditRental.php');
        }

        public function update($rentalId)
        {
            $rentalNumber = $_POST['rentalNumber'];
            $rentalCostofTVA = $_POST['rentalCostofTVA'];
            $rentalCostHT = $_POST['rentalCostHT'];
            $rentalCostTTC = $_POST['rentalCostTTC'];
            $rentalStatus = $_POST['rentalStatus'];
            $rental = new RentalsCenters();
            $rental->updateRentalCenter($rentalId, $rentalNumber, $rentalCostofTVA, $rentalCostHT, $rentalCostTTC, $rentalStatus);
            header('Location: /rentals');
        }

        public function delete($rentalId)
        {
            $rental = new RentalsCenters();
            $rental->deleteRentalCenter($rentalId);
            header('Location: /rentals');
        }




}