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

    <h1>Eliminar alumno del sistema</h1>
    <fieldset>
        <legend>Buscar alumno</legend>
        <form action="eliminar.php?accion=buscar" method="post">
            <label for="dni">DNI</label>
            <input id="dni" type="text" name="dni" minlength="9" maxlength="9" required>
            <button type="submit">Buscar</button>
        </form>

    </fieldset>

    <!-- Esto solo debe mostrarse si se ha buscado un alumno por dni en el formulario de arriba. -->

    <table>
        <tr>
            <th>Apellidos</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Correo</th>
        </tr>
        <!--ESTO ES UN EJEMPLO. Modificar para hacer dinámica -->
        <tr>
            <td>Álvarez Castro</td>
            <td>Antón</td>
            <td>77333748C</td>
            <td>aalvarez@edu.es</td>
        </tr>
    </table>
    <form action="eliminar.php?accion=borrar" method="post">

        <input type="hidden" name="dni" value="">
        <button id="btn_borrar" type="submit">Eliminar</button>
    </form>

    <!-- Pie -->
    <?php include("pie.html"); ?>
</body>

</html>