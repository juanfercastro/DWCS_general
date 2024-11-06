<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/estilos.css">
    <title>Listar alumnos</title>
</head>

<body>
    <!-- Cabecera -->
    <?php include("cabecera.html"); ?>
    <h1>Alumnos registrados</h1>
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
        <tr>
            <td>Barros Justo</td>
            <td>Jose Luis</td>
            <td>69922148D</td>
            <td>jjbarros@edu.es</td>
        </tr>
        <tr>
            <td>Barros Martínez</td>
            <td>Alba</td>
            <td>34834622V</td>
            <td>abarros@edu.es</td>
        </tr>
        <tr>
            <td>Carrera Dios</td>
            <td>Sonia</td>
            <td>44845030S</td>
            <td>scarrera@edu.es</td>
        </tr>
        <tr>
            <td>Estevez Beiras</td>
            <td>Julia</td>
            <td>77011033X</td>
            <td>jestevez@edu.es</td>
        </tr>
    </table>
    <div class="paginacion">
        <!-- Hacer dinámico -->
        <a href="">Anterior</a>
        <a href="">Siguiente</a>
    </div>
    <!-- Pie -->
    <?php include("pie.html"); ?>
</body>

</html>