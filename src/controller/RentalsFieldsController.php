<?php

namespace Application\Controller;

require_once('src/model/RentalsFields.php');

use Application\Model\RentalsFields\RentalsFields;

class RentalsFieldsController
{

  public static function index()
  {
    $rentalsFields = new RentalsFields();
    $allRentalsFields = $rentalsFields->getAllRentalsFields();
    $pageTitle = "RentalsFields";
  }

  public function show($rentalsFieldsId)
  {
    $rentalsFields = new RentalsFields();
    $rentalsFields = $rentalsFields->getRentalsFieldsByRentalsFieldsId($rentalsFieldsId);
    $pageTitle = "RentalsFields";
  }

  public function store()
  {
    $rentalId = $_POST['rentalsId'];
    $fieldId = $_POST['fieldId'];
    $rentalsFieldsType = $_POST['rentalsFieldsType'];
    $rentalsFieldsNbDays = $_POST['rentalsFieldsNbDays'];
    $rentalsFieldsNbHours = $_POST['rentalsFieldsNbHours'];
    $rentalsFieldsCostHT = $_POST['rentalsFieldsCostHT'];
    $rentalsFieldsdateStart = $_POST['rentalsFieldsdateStart'];
    $rentalsFieldsdateEnd = $_POST['rentalsFieldsdateEnd'];
    $rentalsFieldHourStart = $_POST['rentalsFieldHourStart'];
    $rentalsFieldHourEnd = $_POST['rentalsFieldHourEnd'];



    $rentalsFields = new RentalsFields();
    $rentalsFields->createRentalsFields($fieldId, $rentalId, $rentalsFieldsType, $rentalsFieldsNbDays, $rentalsFieldsNbHours, $rentalsFieldsdateStart, $rentalsFieldsdateEnd, $rentalsFieldHourStart, $rentalsFieldHourEnd, $rentalsFieldsCostHT);
    header('Location: /rentalsFields');
  }

  public function delete($rentalsFieldsId)
  {
    $rentalsFields = new RentalsFields();
    $rentalsFields->deleteRentalsFields($rentalsFieldsId);
    header('Location: /rentalsFields');
  }

  public function update($rentalsFieldsId)
  {
    $rentalId = $_POST['rentalsId'];
    $fieldId = $_POST['fieldId'];
    $rentalsFieldsId = $_POST['rentalsFieldsId'];
    $rentalsFieldsType = $_POST['rentalsFieldsType'];
    $rentalsFieldsNbDays = $_POST['rentalsFieldsNbDays'];
    $rentalsFieldsNbHours = $_POST['rentalsFieldsNbHours'];
    $rentalsFieldsCostHT = $_POST['rentalsFieldsCostHT'];
    $rentalsFieldsdateStart = $_POST['rentalsFieldsdateStart'];
    $rentalsFieldsdateEnd = $_POST['rentalsFieldsdateEnd'];
    $rentalsFieldHourStart = $_POST['rentalsFieldHourStart'];
    $rentalsFieldHourEnd = $_POST['rentalsFieldHourEnd'];

    $rentalsFields = new RentalsFields();
    $rentalsFields->updateRentalsFields($rentalsFieldsId, $fieldId, $rentalId, $rentalsFieldsType, $rentalsFieldsNbDays, $rentalsFieldsNbHours, $rentalsFieldsdateStart, $rentalsFieldsdateEnd, $rentalsFieldHourStart, $rentalsFieldHourEnd, $rentalsFieldsCostHT);
    header('Location: /rentalsFields');
  }
}
