<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Modificar alumno</title>
</head>

<body>
    <!-- Cabecera -->
    <?php include("cabecera.html"); ?>

    <h1>Modificar datos de alumno</h1>
    <fieldset>
        <legend>Buscar alumno</legend>
        <form action="modificar.php?accion=buscar" method="post">
            <label for="dni">DNI</label>
            <input id="dni" type="text" name="dni" minlength="9" maxlength="9" required>
            <button type="submit">Buscar</button>
        </form>

    </fieldset>

    <!-- Este formulario solo debe mostrarse si se ha buscado un alumno por dni en el formulario de arriba. -->
    <form class="datos" action="modificar.php?accion=guardar" method="post">
        <input type="hidden" name="dni" value="">
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" maxlength="20" required>
        <label for="ap1">Apellido</label>
        <input id="ap1" type="text" name="ap1" maxlength="30" required>
        <label for="ap2">Apellido</label>
        <input id="ap2" type="text" name="ap2" maxlength="9" maxlength="30">

        <label for="mail">Correo electrónico</label>
        <input id="mail" type="email" name="mail" maxlength="300" required>

        <button type="submit">Guardar</button>

    </form>
    <form class="datos" action="modificar.php?accion=generar_pass" method="post">
        <input type="hidden" name="dni" value="">
        <button type="submit">Generar contraseña</button>
    </form>
    <!-- Pie -->
    <?php include("pie.html"); ?>
</body>

</html>