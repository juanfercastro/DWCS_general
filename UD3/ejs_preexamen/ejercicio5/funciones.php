<?php
include('Producto.php');
function get_conexion()
{
    $pdo = null;
    try {
        $pdo = new PDO('mysql:host=mariadb;dbname=juego_numero', 'root', 'bitnami');
    } catch (\Throwable $th) {
        die('Error en la conexion' . $th->getMessage());
    }

    return $pdo;
}

function getProductos(){
    $pdo = get_conexion();
    $sql = 'SELECT id, nombre, descrip0cion, precio FROM producto';
    $resultado = $pdo->query($sql);
    $prods = [];
    foreach ($resultado as $row) {
        $p = new Producto();
        $p->setId($row['id']);
        $p->setNombre($row['nombre']);
        $p->setDescripcion($row['descripcion']);
        $p->setPrecio($row['precio']);
        $prods[] = $p;

    }
    $resultado = null;
    $pdo = null;

    return $prods;
}

function crear_carrito(){
    $pdo = get_conexion();
    $sql = 'INSERT INTO carrito(id_carrito) VALUES (NULL)';
    $pdo->exec($sql);

    $sql = 'SELECT MAX(id_carrito) FROM carrito';
    $result = $pdo->query($sql);
    $id_carrito = $result -> fetch()[0];
    $result = null;
    $pdo = null;
    return $id_carrito;
}

function add_producto($id_carrito, $id_producto){
    $pdo = get_conexion();
    $sql = 'INSERT INTO CARRITO_PRODUCTO(id_carrito, id_producto) VALUES (?, ?)';

    $statement = $pdo->prepare($sql);

    $statement->bindValue();
}

?>