<?php

namespace Application\Controller;

require_once('src/model/Field.php');

use Application\Model\Field\Field;

class FieldController
{
  public static function index()
  {
    $field = new Field();
    $fields = $field->getAllFields();
    $pageTitle = "Field";
    require_once('src/template/Field.php');
  }

  public static function viewAll()
  {
      $center = new Field();
      $pageTitle = "Field";
      $datas = $center->getAllFields();
      if(empty($datas)){
        $error = "Aucune donnée à afficher";
      }
      require_once('src/template/ViewAll.php');
  }

  public function show($fieldId)
  {
    $field = new Field();
    $field = $field->getOneField($fieldId);
    $pageTitle = "Field";
    require_once('src/template/Field.php');
  }

  public function create()
  {
    $pageTitle = "Create field";
    require_once('src/template/CreateField.php');
  }

  public function store()
  {
    $fieldName = $_POST['fieldName'];
    $fieldTarifHourHT = $_POST['fieldTarifHourHT'];
    $fieldTarifDayHT = $_POST['fieldTarifDayHT'];
    $fieldPicture = $_POST['fieldPicture'];
    $centerId = $_POST['centerId'];

    $field = new Field();
    $field->createField($fieldName, $fieldTarifHourHT, $fieldTarifDayHT, $fieldPicture, $centerId);
    header('Location: /fields');
  }

  public static function edit($fieldId)
  {
    $fields = new Field();
    $fields = $fields->getOneField($fieldId);
    $pageTitle = "Edit field";
    require_once('src/template/EditField.php');
  }

  public function update($fieldId)
  {
    $fieldName = $_POST['fieldName'];
    $fieldTarifHourHT = $_POST['fieldTarifHourHT'];
    $fieldTarifDayHT = $_POST['fieldTarifDayHT'];
    $fieldPicture = $_POST['fieldPicture'];
    $centerId = $_POST['centerId'];

    $field = new Field();
    $field->updateField($fieldId, $fieldName, $fieldTarifHourHT, $fieldTarifDayHT, $fieldPicture, $centerId);
    header('Location: /fields');
  }

  public function delete($fieldId)
  {
    $field = new Field();
    $field->deleteField($fieldId);
    header('Location: /fields');
  }
}