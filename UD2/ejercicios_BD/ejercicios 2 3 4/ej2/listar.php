<?php
$db = new mysqli("localhost", "root", "", "videoteca");

if ($db->connect_error) {
    die("Error en la conexión con la base de datos ".$db->connect_error);
}

$mostrar = $db->query("SELECT * FROM videojuegos"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
</head>
<body>
    <h1>Videojuegos registrados</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Plataforma</th>
            <th>Año</th>
            <th>Género</th>
            <th>Operacion</th>
        </tr>
        <!-- Datos de ejemplo. Tiene que ser dinámico -->
        <?php
            while ($juegos = $mostrar->fetch_array()) {
                echo "<tr>
                <td>".$juegos['nombre']."</td>
                <td>".$juegos['plataforma']."</td>
                <td>".$juegos['anio_lanzamiento']."</td>
                <td>".$juegos['genero']."</td>
                <td><a href='altamodificacion.php?id=".$juegos['id'].">Editar</a></td>
                <td><a href='eliminar.php?id=".$juegos['id'].">Eliminar</a></td>
                </tr>";
            }
        ?>
    </table>
    <a href="listar.php?pag=0">Anterior</a>
    <a href="listar.php?pag=2">Siguiente</a>
</body>
</html>