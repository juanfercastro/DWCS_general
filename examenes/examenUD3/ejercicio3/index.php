<?php
include("tarea.php");
session_start();
//Recuperar datos del formulario
$tareas = [];
if (isset($_SESSION['tareas'])) {
    $tareas = $_SESSION['tareas'];
}
if (isset($_POST['fecha']) && isset($_POST['desc'])) {
    //Creamos la nueva tarea
    $tarea_nueva = new Tarea(new DateTimeImmutable($_POST['fecha']), $_POST['desc']);
    $tareas[] = $tarea_nueva;
    $_SESSION['tareas'] = $tareas;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <style>
        #container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 100px;
            margin: 2% 5% 2% 5%;

        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tareas</title>
</head>

<body>
    <?php include "../header.html"; ?>
    <div id="container">
        <div id="nueva">
            <h1>Nueva tarea</h1>
            <form method="post">
                <label for="fecha">Fecha</label><br>
                <input id="fecha" name="fecha" type="datetime-local" required><br>
                <label for="desc">Descripción de la tarea</label><br>
                <textarea id="desc" name="desc" rows="4" cols="50"></textarea><br>
                <button type="submit">Añadir</button>
            </form>
        </div>
        <div id="lista">
            <h1>Lista de tareas pendientes</h1>
            <ul>
                <?php
                foreach ($tareas as $t) {
                    echo '<li>';
                    echo $t->getFechaFormateada() . ' - ' . $t->getTexto();
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>

</body>

</html>