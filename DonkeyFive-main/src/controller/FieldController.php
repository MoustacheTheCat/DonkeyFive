<?php

namespace Application\Controller;

require_once('src/model/Field.php');
require_once('src/model/Center.php');
require_once('src/model/FieldsOptions.php');

use Application\Model\Field;
use Application\Model\Center;
use Application\Model\FieldsOptions;

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
      $pageTitle = "Fields";
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

  public static function add()
  {
    $pageTitle = "Create field";
    $center = new Center();
    $centers = $center->getAllCenters();
    require_once('src/template/CreateField.php');
  }

  public static function addCheeck()
  {
    $data = new Field();
    $res = $data->addCheck();
    if($res){
      $success = "Le terrain a bien été ajouté";
      header('Location: /fields');
    }
    else{
      $error = "Une erreur est survenue lors de l'ajout";
      $pageTitle = "Create field";
      $center = new Center();
      $centers = $center->getAllCenters();
      require_once('src/template/CreateField.php');
    }
    
  }

 

  public static function edit()
  {
    $center = new Center();
    $centers = $center->getAllCenters();
    $fieldsOptions = new FieldsOptions();
    $fieldsOptions = $fieldsOptions->getFieldsOptionsByFieldId();
    if(!empty($fieldsOptions)){
        $pageTitle = "Field";
        require_once('src/template/EditField.php');
    }else{
        $pageTitle = "Field not found";
        $error = "Field not found";
        require_once('src/template/EditField.php');
    }
  }

  public static function editCheck()
  {
    $field = new Field();
    $res = $field->editCheck();
    if($res){
      $success = "Le terrain a bien été modifié";
      header('Location: /fields');
    }
    else{
      $error = "Une erreur est survenue lors de la modification";
      $pageTitle = "Edit field";
      $center = new Center();
      $centers = $center->getAllCenters();
      require_once('src/template/EditField.php');
    }
  }

  public static function editPicture()
  {
    $field = new Field();
    $res = $field->updatePictureField();
    if($res){
      $success = "L'image a bien été modifié";
      header('Location: /fields');
    }
    else{
      $error = "Une erreur est survenue lors de la modification de l'image";
      $pageTitle = "Edit field";
      $center = new Center();
      $centers = $center->getAllCenters();
      require_once('src/template/EditField.php');
    }
  }

  public static function delete()
  {
    $field = new Field();
    $res = $field->delete();
    if($res){
        $success = "Le terrain a bien été supprimé";
        header('Location: /fields');
      }
      else{
        $error = "Une erreur est survenue lors de la suppression";
        $pageTitle = "Field";
        require_once('src/template/Field.php');
      }
  }
}