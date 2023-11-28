<?php

namespace Application\Controller\RentalController;

require_once('src/model/Rental.php');

use Application\Model\Rental\Rental;

class RentalController {

        public static function index()
        {
            $rental = new Rental();
            $rentals = $rental->getAllRentals();
            $pageTitle = "hello world";
            require_once('src/template/Rental.php');
        }

        public function show($rentalId)
        {
            $rental = new Rental();
            $rental = $rental->getRentalById($rentalId);
            $pageTitle = "Rental";
            require_once('src/template/Rental.php');
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
            $rental = new Rental();
            $rental->addRental($rentalNumber, $rentalCostofTVA, $rentalCostHT, $rentalCostTTC, $rentalStatus);
            header('Location: /rentals');
        }

        public function edit($rentalId)
        {
            $rental = new Rental();
            $rental = $rental->getRentalById($rentalId);
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
            $rental = new Rental();
            $rental->updateRental($rentalId, $rentalNumber, $rentalCostofTVA, $rentalCostHT, $rentalCostTTC, $rentalStatus);
            header('Location: /rentals');
        }

        public function delete($rentalId)
        {
            $rental = new Rental();
            $rental->deleteRental($rentalId);
            header('Location: /rentals');
        }
}
