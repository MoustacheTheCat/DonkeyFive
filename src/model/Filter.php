<?php

namespace Application\Model;

require_once('src/lib/DatabaseConnection.php');
require_once('src/model/Field.php');

use Application\lib\DatabaseConnection;
use Application\Model\Field;

class Filter
{
    public function __construct(
        public $datas = [],
        private $pdo = null,
    ) {
        $this->pdo = \Application\lib\DatabaseConnection::getDataBase();
    }

    public function getAllFielsAndRentalsByCenterById($id){
        $query = "SELECT f.fieldId, rf.rentalsFieldsDateEnd, rf.rentalsFieldsDateStart, rf.rentalfieldHourStart, rf.rentalsFieldsHourEnd FROM rentalsFields rf JOIN fields f ON f.fieldId = rf.fieldId JOIN centers c ON f.centerId = c.centerId WHERE c.centerId = :centerId";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':centerId',$id, \PDO::PARAM_INT);
        $statement->execute();
        $datas = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $datas;
    }

    public function verifDatas($ds){
        $res = 0;
        $fieldIds = [];
        if(!empty($ds)){
            foreach($ds as $d){
                if($d['rentalsFieldsDateEnd'] == $post['dateEnd'] && $d['rentalsFieldsDateStart'] == $post['dateStart'] && $d['rentalfieldHourStart'] == $post['hourStart'] && $d['rentalsFieldsHourEnd'] == $post['hourEnd']){
                    $res += 1;
                }
                elseif($d['rentalsFieldsDateEnd'] == $post['dateEnd'] && $d['rentalsFieldsDateStart'] == $post['dateStart'] && $d['rentalfieldHourStart'] == $post['hourStart'] && $d['rentalsFieldsHourEnd'] != $post['hourEnd']){
                    $res += 1;
                }
                elseif($d['rentalsFieldsDateEnd'] == $post['dateEnd'] && $d['rentalsFieldsDateStart'] == $post['dateStart'] && $d['rentalfieldHourStart'] != $post['hourStart'] && $d['rentalsFieldsHourEnd'] == $post['hourEnd']){
                    $res += 1;
                }
                elseif($d['rentalsFieldsDateEnd'] == $post['dateEnd'] && $d['rentalsFieldsDateStart'] != $post['dateStart'] && $d['rentalfieldHourStart'] == $post['hourStart'] && $d['rentalsFieldsHourEnd'] == $post['hourEnd']){
                    $res += 1;
                }
                elseif($d['rentalsFieldsDateEnd'] != $post['dateEnd'] && $d['rentalsFieldsDateStart'] == $post['dateStart'] && $d['rentalfieldHourStart'] == $post['hourStart'] && $d['rentalsFieldsHourEnd'] == $post['hourEnd']){
                    $res += 1;
                }
                elseif($d['rentalsFieldsDateEnd'] == $post['dateEnd'] && $d['rentalsFieldsDateStart'] != $post['dateStart'] && $d['rentalfieldHourStart'] != $post['hourStart'] && $d['rentalsFieldsHourEnd'] != $post['hourEnd']){
                    $res += 1;
                }
                elseif($d['rentalsFieldsDateEnd'] != $post['dateEnd'] && $d['rentalsFieldsDateStart'] == $post['dateStart'] && $d['rentalfieldHourStart'] != $post['hourStart'] && $d['rentalsFieldsHourEnd'] != $post['hourEnd']){
                    $res += 1;
                }
                elseif($d['rentalsFieldsDateEnd'] != $post['dateEnd'] && $d['rentalsFieldsDateStart'] != $post['dateStart'] && $d['rentalfieldHourStart'] == $post['hourStart'] && $d['rentalsFieldsHourEnd'] != $post['hourEnd']){
                    $res += 1;
                }
                elseif($d['rentalsFieldsDateEnd'] != $post['dateEnd'] && $d['rentalsFieldsDateStart'] != $post['dateStart'] && $d['rentalfieldHourStart'] != $post['hourStart'] && $d['rentalsFieldsHourEnd'] == $post['hourEnd']){
                    $res += 1;
                }
                $fieldIds[] = $d['filedId'];
            }
            if(count($ds) < $res && empty($fieldIds)){
                return $res;
            }elseif(count($fieldIds) > 0){
                return $fieldIds;
        }else{
            return false;
            }
        }
    }

    public function filterForRental($data)
    {
        $posts = $data;
        $errorArrays = [];
        $datas = null;
        
        foreach($posts as $post){
            if($post == 'city'){
                $errorArrays[] = "city";
            }
            elseif($post == date('Y-m-d')){
                $errorArrays[] = "date";
            }
            elseif($post == '00:00'){
                $errorArrays[] = "hour";
            }
        }
        
        if(count($errorArrays) == 0){
            $datas = 1;
        }
        else{
            
            $valid = false;
            foreach($errorArrays as $errorArray){
                if($errorArray != "city"){
                    $valid = true;
                }
            }
            if($valid){
                $datas =  $this->getAllFielsAndRentalsByCenterById($_POST['city']);
                if(empty($datas)){
                    $field = new Field();
                    $fields = $field->getFieldsByCenterId($_POST['city']);
                    return $fields; 
                }else{
                    $res = $this->verifDatas($datas);
                    if($res == false){
                        $fields = "no fields";
                    }
                    elseif(is_string($res)){
                        $fields = $res;
                    }
                    else{
                        $fields = [];
                        foreach($res as $r){
                            $field = new Field();
                            $field = $field->getOneField($r);
                            $fields[] = $field;
                        }
                    }
                }
            }  
        }
    }
}

// $res = $this->verifDatas($datas);
//             if($res == false){
//                 $errorArrays[] = "no fields";
//            
//             }
//             elseif(is_string($res)){
//                 $errorArray = $res;
//            
//             }
//             else{
//                 $fields = [];
//                 foreach($res as $r){
//                     $field = new Field();
//                     $field = $field->getOneField($r);
//                     $fields[] = $field;
//                 }
//                 return $fields;
//             }