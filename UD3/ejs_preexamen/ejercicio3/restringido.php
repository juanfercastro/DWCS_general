<?php
include("funciones.php");
session_start();
    if (comprobar_sesion()==false) {
        header("Location: login.php");
        exit;
    }

if (isset($_GET["logout"])&& $_GET["logout"]==true) {
    session_unset();
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección restringida</title>
</head>
<body>
    <h1>Sección restringida</h1>
    Estás logueado con el usuario <?php echo $_SESSION["nombre"]; ?>. Pulsa aquí para salir: <a href="?logout=true">Logout</a>
    <p>
        Esta sección esta restringida solo para los usuarios que están registrados.
    </p>
</body>
</html>