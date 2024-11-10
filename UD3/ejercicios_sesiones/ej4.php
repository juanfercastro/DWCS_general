<!-- Crea un programa en php que salude al usuario por su nombre. 
Si es la primera vez que accede o ha accedido hace más de 5 
minutos el programa debe solicitar el nombre del usuario. -->
<?php
session_start();
$duracion = 300;
if (isset($_POST["enviar"])) {
    $_SESSION["nombre"] = trim($_POST["nombre"]);
    $_SESSION["acceso"] = time();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
</head>

<body>
    <?php
    if (
        isset($_SESSION["nombre"]) && isset($_SESSION["acceso"])
            && (time() - $_SESSION["acceso"] < $duracion)
    ) {
        echo "<h2>Hola " . $_SESSION["nombre"];
    } else {
        echo '<form action="" method="post">
        <label for="nombre">Nombre de usuario: </label>
        <input type="text" name="nombre" id="nombre"><br>
        <input type="submit" value="Enviar" name="enviar">
    </form>';
    }
    ?>
</body>

</html>