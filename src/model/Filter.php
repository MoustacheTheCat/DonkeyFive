<?php

namespace Application\Model;

require_once('src/lib/DatabaseConnection.php');
require_once('src/model/Field.php');

use Application\lib\DatabaseConnection;
use Application\Model\Field\Field;

class Filter
{
    public function __construct(
        public $datas = [],
        private $pdo = null,
    ) {
        $this->pdo = \Application\lib\DatabaseConnection::getDataBase();
    }

    public function filterForRental($data)
    {
        if (isset($data['city']) && $data['city'] != 'city') {
            $id = $data['city'];
            $query = "SELECT * FROM fields WHERE centerId = :id";
            $statement = $this->pdo->prepare($query);
            $statement->bindValue(':id', $id, \PDO::PARAM_INT);
            $statement->execute();
            $fields = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $fields;
        }

    }
}