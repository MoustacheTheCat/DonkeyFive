<?php

namespace Application\Controller;

require_once('src/model/Option.php');

use Application\Model\Option\Option;

class OptionController
{

    public static function index()
    {
        $option = new Option();
        $options = $option->getAllOptions();
        $pageTitle = "hello world";
        require_once('src/template/Options.php');
    }

    public function show($optionId)
    {
        $option = new Option();
        $option = $option->getOneOption($optionId);
        $pageTitle = "Option";
        require_once('src/template/Option.php');
    }

    public function create()
    {
        $pageTitle = "Create option";
        require_once('src/template/CreateOption.php');
    }

    public function store()
    {
        $optionName = $_POST['optionName'];
        $optionPrice = $_POST['optionPrice'];
        $option = new Option();
        $option->createOption($optionName, $optionPrice);
        header('Location: /options');
    }

    public function edit($optionId)
    {
        $option = new Option();
        $option = $option->getOneOption($optionId);
        $pageTitle = "Edit option";
        require_once('src/template/EditOption.php');
    }

    public function update($optionId)
    {
        $optionName = $_POST['optionName'];
        $optionPrice = $_POST['optionPrice'];
        $option = new Option();
        $option->updateOption($optionId, $optionName, $optionPrice);
        header('Location: /options');
    }

    public function delete($optionId)
    {
        $option = new Option();
        $option->deleteOption($optionId);
        header('Location: /options');
    }

    public function deleteAll()
    {
        $option = new Option();
        $option->deleteAllOptions();
        header('Location: /options');
    }
    public function forceDeleteAll()
    {
        $option = new Option();
    }
}
