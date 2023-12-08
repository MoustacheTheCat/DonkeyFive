<?php

namespace Application\Model;

require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;

class Option
{

    public function __construct(
        private $optionId = null,
        private $optionName = null,
        private $optionCostHT = null,
        private $optionPIcture = null,
        private $optionDescription = null,
        private $option = [],
        private $options = [],
        private $pdo = null,
    ) {
        $this->pdo = DatabaseConnection::getDataBase();
    }

    public function getOptionId()
    {
        return $this->optionId;
    }

    public function getOptionName()
    {
        return $this->optionName;
    }

    public function getOptionCostHT() 
    {
        return $this->optionCostHT;
    }

    public function getOptionPIcture()
    {
        return $this->optionPIcture;
    }

    public function getOptionDescription()
    {
        return $this->optionDescription;
    }

    public function setOptionPIcture($optionPIcture)
    {
        $this->optionPIcture = $optionPIcture;
    }

    public function setOptionDescription($optionDescription)
    {
        $this->optionDescription = $optionDescription;
    }


    public function setOptionName($option)
    {
        $this->option = $option;
    }

    public function setOptionCostHT($optionCostHT)
    {
        $this->optionCostHT = $optionCostHT;
    }

    public function setOptionId($optionId)
    {
        $this->optionId = $optionId;
    }

    public function setOption($option)
    {
        $this->option = $option;
    }

    public function getOption()
    {
        return $this->option;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setOptions($options)
    {
        $this->options = $options;
    }

    public function addCheck()
    {
        $arrayError = [];
        if (empty($_POST['optionName'])) {
            $arrayError['optionName'] = "Le nom de l'option est obligatoire";
        }
        if (empty($_POST['optionCostHT'])) {
            $arrayError['optionCostHT'] = "Le prix de l'option est obligatoire";
        }
        if (empty($_POST['optionDescription'])) {
            $arrayError['optionDescription'] = "La description de l'option est obligatoire";
        }
        if (empty($_POST['optionPIcture'])) {
            $picture = "default.jpg";
        } else {
            $picture = $this->addOptionPicture();
        }
        if (empty($arrayError)) {
            $this->addOption($_POST['optionName'], $_POST['optionCostHT'], $picture, $_POST['optionDescription']);
            return true;
        } else {
            return $arrayError;
        }
    }


    public function addOption($optionName, $optionCostHT, $optionPIcture, $optionDescription)
    {
        $sql = "INSERT INTO `options` (`optionName`, `optionCostHT`, `optionPIcture`, `optionDescription`) VALUES (:optionName, :optionCostHT, :optionPIcture, :optionDescription)";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':optionName', $optionName, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':optionCostHT', $optionCostHT, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':optionPIcture', $optionPIcture, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':optionDescription', $optionDescription, \PDO::PARAM_STR);
        $pdoStatement->execute();
    }

   public function getAllOptionId(){
        $st = $this->pdo->prepare("SELECT optionId FROM options");
        $st->execute();
        $datas = $st->fetchAll();
        $arrayId = [];
        foreach ($datas as $data) {
            $arrayId[] = $data['optionId'];
        }
        return $arrayId;
   }
    
    public function deleteOption($optionId)
    {
        $sql = "DELETE FROM `options` WHERE `optionId` = :option_id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':option_id', $optionId, \PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    public function getAllOptions(): array
    {
        $sql = "SELECT * FROM `options`";
        $pdoStatement = $this->pdo->query($sql);
        $this->options = $pdoStatement->fetchAll();
        return $this->options;
    }

    public function getOptionById($optionId): array
    {
        $sql = "SELECT * FROM `options` WHERE `optionId` = :option_id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':option_id', $optionId, \PDO::PARAM_INT);
        $pdoStatement->execute();
        $this->option = $pdoStatement->fetch();
        return $this->option;
    }

    public function updateOption($optionId, $optionName, $optionCostHT , $optionDescription)
    {
        $sql = "UPDATE `options` SET `optionName` = :optionName, `optionCostHT` = :optionCostHT, `optionDescription` = :optionDescription WHERE `optionId` = :option_id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':option_id', $optionId, \PDO::PARAM_INT);
        $pdoStatement->bindValue(':optionName', $optionName, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':optionCostHT', $optionCostHT, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':optionDescription', $optionDescription, \PDO::PARAM_STR);
        $pdoStatement->execute();
    }

    public function getOneOption($optionId): array
    {
        $sql = "SELECT * FROM `options` WHERE `optionId` = :option_id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':option_id', $optionId, \PDO::PARAM_INT);
        $pdoStatement->execute();
        $this->option = $pdoStatement->fetch();
        return $this->option;
    }

    public function createOption($optionName, $optionCostHT)
    {
        $sql = "INSERT INTO `options` (`optionName`, `optionCostHT`) VALUES (:optionName, :optionCostHT)";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':optionName', $optionName, \PDO::PARAM_STR);
        $pdoStatement->bindValue(':optionCostHT', $optionCostHT, \PDO::PARAM_STR);
        $pdoStatement->execute();
    }

    public function deleteAllOptions()
    {
        $sql = "DELETE FROM `options`";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute();
    }

    function getDetailOption($arrayid)
    {
        $sql = "SELECT optionName, optionCostHT FROM `options` WHERE `optionId` = :option_id";
        $pdoStatement = $this->pdo->prepare($sql);
        $costs = 0;
        $options = [];
        foreach ($arrayid as $id) {
            $pdoStatement->bindValue(':option_id', $id, \PDO::PARAM_INT);
            $pdoStatement->execute();
            $cost = $pdoStatement->fetch();
            $options[$id]['names'] = $cost[0];
            $options[$id]['prices'] = $cost[1];
            $costs += $cost[1];
        }
        
        $options['costs']['totalHT'] = $costs;
        return $options;
    }

    public function addOptionPicture()
    {
        $picture = $_FILES['optionPicture']['name'];
        $pictureTmp = $_FILES['optionPicture']['tmp_name'];
        $pictureExtension = pathinfo($picture, PATHINFO_EXTENSION);
        $pictureName = uniqid() . '.' . $pictureExtension;
        $pictureFolder = 'src/public/img/option/';
        move_uploaded_file($pictureTmp, $pictureFolder . $pictureName);
        return $pictureName;
    }

    public function updatePictureOption()
    {
        $id = $_GET['id'];
        $data = new Option();
        $option =  $data->getOneOption($id);
        if ($option[0]['optionPicture'] != $_FILES['optionPicture']['name']) {
            $picture = $this->addOptionPicture();
            if (!is_array($picture)) {
                $query = $this->pdo->prepare('UPDATE options SET optionPicture = :optionPicture WHERE optionId = :optionId');
                $query->bindValue(':optionId', $id, \PDO::PARAM_INT);
                $query->bindValue(':optionPicture', $picture);
                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
}
