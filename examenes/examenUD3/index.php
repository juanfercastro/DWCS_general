<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen UD3</title>
</head>
<style>
    table{
        margin-left: 2%;
        margin-right: 2%;
    }
    .ejercicio{
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        width: 100px;
        vertical-align: top;
        padding: 10px 20px 10px 20px;
    }

    .puntuacion{
        font-family:'Courier New', Courier, monospace;
        font-weight: bold;
        color: green;
        width: 100px;
        vertical-align: top;
        padding: 10px 20px 10px 20px;
    }

    .enunciado{
        font-family: Arial, Helvetica, sans-serif;
        text-align: justify;
        line-height: 1.5;
        padding: 10px 20px 10px 20px;
        
    }


</style>

<body>
    <?php include "header.html" ?>
    <h1>Examen UD3</h1>
    <h2>COOKIES, SESIONES y SEGURIDAD</h2>
    <table>
        <tr>
            <td class="ejercicio"><a href="ejercicio1/">Ejercicio 1</a></td>
            <td class="enunciado">Realiza las modificaciones necesarias en el código del ejercicio 1 para evitar ataques de SQL Injection.</td>
            <td class="puntuacion">3 puntos</td>
        </tr>
        <tr>
            <td class="ejercicio"><a href="ejercicio2/">Ejercicio 2</a></td>
            <td class="enunciado">Realiza las modificaciones necesarias en el ejercicio 2 para que unicamente los usuarios autenticados puedan acceder a la sección restringida. Utiliza variables de sesión para solucionar el problema. Además, para mejorar la seguridad del sitio, transcurridos 5 minutos desde que el usuario se haya autenticado la sesión caducará y el usuario debe volver a autenticarse para acceder al sitio generando una nueva cookie de sesión y reduciendo el riesgo en caso del robo de la misma.<br> Ten en cuenta que mientras un usuario esté autenticado no tiene sentido que pueda ver la página de login. Si un usuario no autenticado intenta acceder a la sección restringida será redirigido a la página de login.</td>
            <td class="puntuacion">4 puntos</td>
        </tr>
        <tr>
            <td class="ejercicio"><a href="ejercicio3/">Ejercicio 3</a></td>
            <td class="enunciado">Realiza las modificaciones necesarias en el código del ejercicio 3 para implementar una aplicación que permita realizar una lista de tareas pendientes. La lista de tareas estará disponible mientras la sesión esté activa.</td>
            <td class="puntuacion">3 puntos</td>
        </tr>
    </table>

</body>

</html>