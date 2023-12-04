<?php

namespace Application\Controller;

require_once('src/model/CenterFields.php');
require_once('src/model/Center.php');

use Application\Model\CenterFields;
use Application\Model\Center;
class CenterFieldsController{
  public function show($centerId, $fieldId)
  {
    $centerField = new CenterFields();
    $centerField = $centerField->getOneFieldByCenter($centerId, $fieldId);
    $pageTitle = "Field";
    require_once('src/template/CenterFields.php');
  }

  public static function viewCenter()
  {
      $id=$_GET['id'];
      $centerField = new CenterFields();
      $center = $centerField->getAllFieldsByCenter($id);
      if(!empty($center)){
        $pageTitle = "Center".$center[0]['centerName'];
        require_once('src/template/ViewCenter.php');
      }else{
        $center = new Center();
        $center = $center->getOneCenter($id);
        if(count($center) == 1){
          $pageTitle = "Center".$center[0]['centerName'];
          $error = "not field associated at this center";
          require_once('src/template/ViewCenter.php');
        }else{
          $error = "not found";
          $pageTitle = "Center";
          require_once('src/template/ViewCenter.php');
        }
      }
  }
}