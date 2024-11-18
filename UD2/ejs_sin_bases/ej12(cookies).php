<?php

// Función para generar números aleatorios
function generarNumerosAleatorios($cantidad)
{
    $numeros = [];
    for ($i = 0; $i < $cantidad; $i++) {
        $numeros[] = rand(1, 4); // Genera números entre 1 y 4
    }
    return $numeros;
}

// Verificamos si el formulario ha sido enviado
if (isset($_POST['respuesta'])) {
    $numerosGenerados = $_POST['numeros']; // Recibimos los números anteriores
    $nivel = $_POST['nivel']; // Recibimos el nivel anterior

    // Si el usuario acierta, aumentamos el nivel
    if ($_POST['respuesta'] == $numerosGenerados) {
        $nivel++; // Aumentamos el nivel
    } else {
        // Si falla, reiniciamos el nivel y mostramos un mensaje de error
        $mensaje = "¡Fallaste! Los números correctos eran: $numerosGenerados. El juego se ha reiniciado.";
        echo "<script>alert('$mensaje');</script>";
        $nivel = 1; // Reiniciamos el nivel

    }
} else {
    // Si es la primera vez que se carga la página, iniciamos en el nivel 1
    $nivel = 1;
}
// Generamos nuevos números y los transformamos en un string de la forma n1-n2...-n
$numerosGenerados = implode('-', generarNumerosAleatorios($nivel)); 

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Memoria Numérica</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
    <script>
        // Función para ocultar el número después de 3 segundos
        function ocultarNumero() {
            setTimeout(function() {
                document.getElementById('numeros').classList.add('hidden');
                document.getElementById('inputForm').classList.remove('hidden');
            }, 3000);
        }
    </script>
</head>

<body onload="ocultarNumero()">

    <h1>Simón dice</h1>

    <!-- Muestra los números generados -->
    <div id="numeros">
        <h2>Memoriza estos números: <?= $numerosGenerados ?></h2>
    </div>

    <!-- Formulario para que el usuario ingrese su respuesta -->
    <div id="inputForm" class="hidden">
        <form method="POST" action="">
            <label for="respuesta">Introduce el número:</label>
            <input type="text" id="respuesta" name="respuesta" required>

            <!-- Inputs ocultos para enviar los datos del nivel y los números generados -->
            <input type="hidden" name="numeros" value="<?= $numerosGenerados ?>">
            <input type="hidden" name="nivel" value="<?= $nivel ?>">

            <button type="submit">Enviar</button>
        </form>
    </div>

</body>

</html>