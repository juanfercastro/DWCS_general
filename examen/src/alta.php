<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Nuevo alumno</title>
</head>

<body>
    <!-- Cabecera -->
    <?php include("cabecera.html"); ?>
    <h1>Alta de alumno</h1>
    <form class="datos" action="" method="post">
        <label for="dni">DNI</label>
        <input id="dni" type="text" name="dni" minlength="9" maxlength="9" required>

        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" maxlength="20" required>
        <label for="ap1">Apellido</label>
        <input id="ap1" type="text" name="ap1" maxlength="30" required>
        <label for="ap2">Apellido</label>
        <input id="ap2" type="text" name="ap2" maxlength="9" maxlength="30" >

        <label for="mail">Correo electrónico</label>
        <input id="mail" type="email" name="mail" maxlength="300"  required>

        <button type="submit">Guardar</button>

    </form>
    <!-- Pie -->
    <?php include("pie.html"); ?>
</body>

</html>