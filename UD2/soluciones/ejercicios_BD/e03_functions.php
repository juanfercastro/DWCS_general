<?php
include("e02_functions.php");
//Ampliamos las funciones del ejercicio 2 para agregar una que nos permita aplicar los filtros.

/**
 * Devuelve una lista de videojuegos que coincidan con los parámetros de búsqueda indicados.
 * Si algún parámetro es null no se aplicará. Los parámetros $limit y $offset son obligatorios.
 *
 * @param string|null $nombre
 * @param string|null $plataforma
 * @param string|null $genero
 * @param int|null $anio
 * @param int $limit
 * @param int $offset
 * @return array
 */
function get_videojuegos_filtros($nombre, $plataforma, $genero, $anio, $limit, $offset)
{
    $db = conexion_bd();
    //Como pueden venir parametros a NULL aceptamos que puedan ser null en ele WHERE
    //Esta es una técnica para permitir nulos directamente en la SQL.
    //Tambien podríamos hacerlo con varios IF a la hora de construir la query, pero requeriría más código.
    $sql = "SELECT id, nombre, plataforma, anio_lanzamiento AS  anio, genero 
    FROM videojuegos
    WHERE (:nombreN IS NULL OR nombre LIKE :nombre) 
          AND (:plataformaN IS NULL OR plataforma LIKE :plataforma)
          AND (:generoN IS NULL OR genero LIKE :genero) 
          AND (:anioN IS NULL OR anio_lanzamiento = :anio)
    ORDER BY nombre, plataforma 
    LIMIT :lim OFFSET :of";
    $query = $db->prepare($sql);
    
    $query->bindValue(':nombreN', $nombre);//Esto es porque PDO solo mapea la primera ocurrencia de un nombre parametrizado.
    $query->bindValue(':nombre', $nombre.'%');
    $query->bindValue(':plataformaN', $plataforma);
    $query->bindValue(':plataforma', $plataforma.'%'); // El % se pone para incluir el wildcard en la cadena que será evaluada por la cláusula LIKE de SQL.
    $query->bindValue(':anioN', $anio);
    $query->bindValue(':anio', $anio);
    $query->bindValue(':generoN', $genero);
    $query->bindValue(':genero', $genero).'%';
    $query->bindValue(':lim', $limit, PDO::PARAM_INT);
    $query->bindValue(':of', $offset, PDO::PARAM_INT);
    $query->execute();

    $videojuegos = array();
    foreach ($query as $r) {
        $vj = new Videojuego($r['nombre'], $r['plataforma'], $r['genero'], $r['anio'], $r['id']);
        array_push($videojuegos, $vj);
    }
    //Cerramos la conexión
    $query = null;
    $db = null;

    return $videojuegos;
}