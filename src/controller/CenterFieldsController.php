<?php

namespace Application\Controller;

require_once('src/model/CenterFields.php');

use Application\Model\CenterFields;

class CenterFieldsController{
    
      public static function index($id)
      {
        $centerField = new CenterFields();
        $fields = $centerField->getAllFieldsByCenter($id);
        $pageTitle = "CentersFields";
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