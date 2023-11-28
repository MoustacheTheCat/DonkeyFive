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
    $pageTitle = "hello world";
    require_once('src/template/Field.php');
  }
}