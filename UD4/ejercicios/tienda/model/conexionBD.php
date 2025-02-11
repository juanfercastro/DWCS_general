<?php
define("dsn", "mysql:host=mariadb;dbname=tienda");
define('user', 'root');
define('pass', 'bitnami');
class ConexionBD{
    public static function connection(){
            try {
                $db= new PDO(dsn,user,pass);
            } catch (PDOException $e) {
                error_log($e->getMessage());
                die();
            }
        return $db;
    }
}