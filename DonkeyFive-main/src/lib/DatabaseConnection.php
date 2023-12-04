<?php
namespace Application\lib;

class DatabaseConnection
{
    public static function getDataBase()
    {
        require_once('src/config/Config.php');
        try {
            return new \PDO(DB_DSN, DB_USER, DB_PASS, DB_OPTIONS);
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require('src/template/Error.php');
        }
        
    } 
}