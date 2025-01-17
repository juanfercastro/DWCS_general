<?php

class ConexionDB{
    public static function getConnexion(){
        try {
            $pdo = new PDO('mysql:host=mariadb;dbname=tienda','root','bitnami');
        } catch (\PDOException $th) {
            error_log("Error obteniedno la conexion. ".$th->getMessage());
            die();
        }
    
        return $pdo;
    }
}
