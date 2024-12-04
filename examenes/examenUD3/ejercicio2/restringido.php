<?php
include("funciones.php");
session_start();
if (comprobarSesion() == false) {
    header("Location: index.php");
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
<?php include "../header.html"; ?>
    Esta es la sección restringida. Solo los usuarios autenticados pueden acceder aquí.
    <br>
    <a href="registro.php">Registro</a>
</body>
</html>