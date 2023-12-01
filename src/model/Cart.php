<?php 

namespace Application\Model;
require_once('src/lib/DatabaseConnection.php');
require_once('src/model/Option.php');
require_once('src/model/Field.php');

use Application\Model\Option\Option;
use Application\lib\DatabaseConnection;
use Application\Model\Field\Field;


class Cart {
    public function __construct(
        private $cartId = null,
        private $cartDatas = [],
        private $itemId = null,
        private $items = [],
        )
    {

    }

    public function getCartDatas(): array
    {
        return $this->cartDatas;
    }

    public function setCartDatas(array $cartDatas): void
    {
        $this->cartDatas = $cartDatas;
    }

    public function getCartId(): int
    {
        return $this->cartId;
    }

    public function setCartId(int $cartId): void
    {
        $this->cartId = $cartId;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }

    public static function viewCarts(){
        if(isset($_SESSION['cart'])){
            return $_SESSION['cart'];
        }
        return false;
    }

    public static function viewCart($cartId){
        if(isset($_SESSION['cart'][$cartId])){
            return $_SESSION['cart'][$cartId];
        }
        return false;
    }

    public function addItemInCart (){
        $posts = $_POST;
        $idField = $_GET['id'];
        $arrayOptions = [];
        foreach($posts as $key => $post){
            if(substr($key, 0, 3) == 'ck_'){
                $arrayOptions[] = $post;
            }
        }
        if(empty($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
        $nbOp = count($arrayOptions);
        $costs = new Option();
        $totalCostHT = $costs->getCostOption($arrayOptions);
        $totalCostTTC = $totalCostHT*1.2;
        $_SESSION['cart'][$idField]['options'] = $arrayOptions;
        $_SESSION['cart'][$idField]['nbOp'] = $nbOp;
        $_SESSION['cart'][$idField]['options']['totalCostHT'] = $totalCostHT;
        $_SESSION['cart'][$idField]['options']['totalCostTTC'] = $totalCostTTC;
        return true;
    }

    public function addSelectTime(){
        $posts = $_POST;
        $idField = $_GET['id'];
        $datas = $_SESSION['cart'];
        if(empty($datas)){
            return false;
        }
        else{
            foreach($datas as $key => $data){
                if($key == $idField){
                    var_dump($posts);
                    if($posts['hourStart'] > $posts['hourEnd']){
                        return false;
                    }elseif($posts['hourStart'] == $posts['hourEnd']){
                        return false;
                    }elseif($posts['dateStart'] > $posts['dateEnd']){
                        return false;
                    }elseif($posts['dateStart'] < date('Y-m-d') || $posts['dateEnd'] < date('Y-m-d')){
                        return false;
                    }
                    else {
                        $this->setTimeSESSION($idField, $posts['dateStart'], $posts['dateEnd'], $posts['hourStart'], $posts['hourEnd']);
                        return true;
                    }
                }
            }
        }
    }

    public function setTimeSESSION ($idField, $dateStart, $dateEnd, $hourStart, $hourEnd){
        $_SESSION['cart'][$idField]['time']['dateStart'] = $dateStart;
        $_SESSION['cart'][$idField]['time']['dateEnd'] = $dateEnd;
        $_SESSION['cart'][$idField]['time']['hourStart'] = $hourStart;
        $_SESSION['cart'][$idField]['time']['hourEnd'] = $hourEnd;
        $dateS = substr(str_replace("-","",$dateStart),4,4);
        $dateE = substr(str_replace("-","",$dateEnd),4,4);
        $hourS = substr($hourStart,0,2);
        $hourE = substr($hourEnd,0,2);
        $nbHour = $hourE - $hourS;
        if($hourS != $hourE){
            $nbHour = $hourE - $hourS;
        }
        $monthS = substr($dateS,0,2);
        $monthE = substr($dateE,0,2);
        $dayS = substr($dateS,2,2);
        $dayE = substr($dateE,2,2);
        
        if($dayE == $dayS && $monthS == $monthE) {
            $nbDay = 1;
        }
        elseif($monthS == $monthE && $dayE != $dayS){
            $nbDay = $dayE - $dayS;
        }
        elseif ($monthS != $monthE && $dayE != $dayS){
            $nbDay = $dayE - $dayS + (($monthE - $monthS)*30);
        }
        $_SESSION['cart'][$idField]['time']['nbHour'] = $nbHour;
        $_SESSION['cart'][$idField]['time']['nbDay'] = $nbDay;
    }
    public function editCart($itemId, $items){
        if(isset($_SESSION['cart'][$itemId])){
            $_SESSION['cart'][$itemId] = $items;
        }
    }

    public function deleteItemInCart ($itemId){
        if(isset($_SESSION['cart'][$itemId])){
            unset($_SESSION['cart'][$itemId]);
        }
    }

    public function displayCarts (){
        if(isset($_SESSION['cart'])){
            $datas = $_SESSION['cart'];
            $arraiIdFields = [];
            foreach($datas as $key => $data){
                $arraiIdFields[] = $key;
            }
            foreach($arraiIdFields as $idField){
                $field = new Field();
                $dataField = $field->getOneField($idField);
                $_SESSION['cart'][$idField]['field'] = $dataField;
                if($_SESSION['cart'][$idField]['time']['nbDay'] === 1 && $_SESSION['cart'][$idField]['time']['nbHour'] < 24){
                    $totalHT = $dataField['fieldTarifHourHT'] * $_SESSION['cart'][$idField]['time']['nbHour'];
                }
                elseif($_SESSION['cart'][$idField]['time']['nbDay'] > 1 ){
                    $totalHT = $dataField['fieldTarifDayHT'] * $_SESSION['cart'][$idField]['time']['nbDay'];
                }
                $totalTTC = $totalHT *  1.2;  
                $_SESSION['cart'][$idField]['field']['totalHTField'] = $totalHT; 
                $_SESSION['cart'][$idField]['field']['totalTTCField'] = $totalTTC; 
                $_SESSION['cart'][$idField]['totalHT'] = $totalHT +  $_SESSION['cart'][$idField]['options']['totalCostHT']; 
                $_SESSION['cart'][$idField]['totalTTC'] = $totalTTC +  $_SESSION['cart'][$idField]['options']['totalCostTTC'];      
            }
            return true;
            
        }
        return false;
    }
}