<?php

namespace Application\Controller\FieldsOptionsController;

require_once('src/model/FieldsOptions.php');

use Application\Model\FieldsOptions\FieldsOptions;

class FieldsOptionsController {

        public static function index()
        {
            $fieldsOptions = new FieldsOptions();
            $fieldsOptions = $fieldsOptions->getAllFieldsOptions();
            $pageTitle = "FieldsOptions";
            require_once('src/template/FieldsOptions.php');
        }

        public function show($optionId)
        {
            $fieldsOptions = new FieldsOptions();
            $fieldsOptions = $fieldsOptions->getFieldsOptionsByOptionId($optionId);
            $pageTitle = "FieldsOptions";
            require_once('src/template/FieldsOptions.php');
        }

        public function create()
        {
            $pageTitle = "Create fieldsOptions";
            require_once('src/template/CreateFieldsOptions.php');
        }

        public function store()
        {
            $optionId = $_POST['optionId'];
            $fieldId = $_POST['fieldId'];
            $fieldsOptions = new FieldsOptions();
            $fieldsOptions->addFieldsOptions($optionId, $fieldId);
            header('Location: /fieldsOptions');
        }

        public function edit($optionId)
        {
            $fieldsOptions = new FieldsOptions();
            $fieldsOptions = $fieldsOptions->getFieldsOptionsByFieldId($optionId);
            $pageTitle = "Edit fieldsOptions";
            require_once('src/template/EditFieldsOptions.php');
        }

        public function update($optionId)
        {
            $optionId = $_POST['optionId'];
            $fieldId = $_POST['fieldId'];
            $fieldsOptions = new FieldsOptions();
            $fieldsOptions->updateFieldsOptions($optionId, $fieldId);
            header('Location: /fieldsOptions');
        }

        public function delete($optionId)
        {
            $fieldsOptions = new FieldsOptions();
            $fieldsOptions->deleteFieldsOptions($optionId);
            header('Location: /fieldsOptions');
        }
}