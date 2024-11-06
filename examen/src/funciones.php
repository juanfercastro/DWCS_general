<?php
// IMPLEMENTAR FUNCIONES DE MANIPULACIÓN DE DATOS
define("DB_LINK", "mysql_host=mariadb, dbname=examen_ud2");
define("DB_USER", "root");
define("DB_PASS", "bitnami");

function db_conect(){
    try {
        $db = new PDO(DB_LINK, DB_USER, DB_PASS);
    } catch (PDOException $th) {
        die("Fallo en la conexion ".$th->getMessage());
    }
}

function obtener_alumos($offset, $limit){
    
}

function obtener_alumno($dni){
    $db->exec("SELECT * FROM alumnos WHERE dni = $dni");
}