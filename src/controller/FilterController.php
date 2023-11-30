<?php

namespace Application\Controller;

require_once('src/model/Filter.php');
require_once('src/controller/CenterController.php');

use Application\Controller\CenterController;
use Application\Model\Filter;

class FilterController
{
  public static array $datas;

  public static function index($datas)
  {
    $filter = new Filter();
    $pageTitle = "Donkey Five";
    $citys = CenterController::index();
    $fields = $filter->filterForRental($datas);
    
    require_once('src/template/Home.php');
  }
}

