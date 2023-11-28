<?php

namespace Application\Controllerl\CenterFields\Controller;

require_once('src/model/CenterFields.php');

use Application\Model\CenterFields\CenterFields;

class CenterFieldsController{

      public static function index($centerId)
      {
        $centerField = new CenterFields();
        $centerFields = $centerField->getAllFieldsByCenter($centerId);
        $pageTitle = "hello world";
        require_once('src/template/CenterFields.php');
      }

      public function show($centerId, $fieldId)
      {
        $centerField = new CenterFields();
        $centerField = $centerField->getOneFieldByCenter($centerId, $fieldId);
        $pageTitle = "Field";
        require_once('src/template/CenterFields.php');
      }

}