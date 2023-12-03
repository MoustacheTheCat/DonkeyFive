<?php

namespace Application\Controller;

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

        public static function show()
        {
            $fieldsOptions = new FieldsOptions();
            $fieldsOptions = $fieldsOptions->getFieldsOptionsByFieldId();
            if(!empty($fieldsOptions)){
                $pageTitle = "Field";
                require_once('src/template/ViewField.php');
            }else{
                $pageTitle = "Field not found";
                $error = "Field not found";
                require_once('src/template/ViewField.php');
            }
        }

        public static function showForrent()
        {
            $fieldsOptions = new FieldsOptions();
            $fieldsOptions = $fieldsOptions->getFieldsOptionsByFieldId();
            $pageTitle = "Field";
            require_once('src/template/ViewForRent.php');
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