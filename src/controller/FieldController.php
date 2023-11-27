<?php

namespace Application\Controller\FieldController;

require_once('src/model/Field.php');

use Application\Model\Field\Field;

class FieldController
{
  public static  function index($centerId)
  {
    $fields = new Field();
    $pageTitle = "Fields";
    $fields = $fields->getFieldByCenter($centerId);
    require_once('src/template/Field_view.php');
  }
}
