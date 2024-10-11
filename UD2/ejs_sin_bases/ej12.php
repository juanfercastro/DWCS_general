<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon Dice</title>
</head>
<body>
    <?php
       /*  $secuencia = rand(1,4);
        echo "SECUENCIA:<br>$secuencia"; */
        $numerosAleatorios = array(); 
        $numerosAleatorios[0] = 3;
        echo implode("-",$numerosAleatorios);
    ?>
    <br>
    <br>
    <form action="ej12.php" method="post">
        <label for="numeros">Escribe la secuencia mostrada:</label>
        <input type="text" name="numeros" id="numeros" pattern="[0-9]">
        <input type="submit" value="Envio" name="envio">
    </form>
    <?php 
        if (isset($_POST["envio"])) {
            $respuesta = str_split($_POST["numeros"]);
            $longitud = 1; 
            if ($respuesta == $numerosAleatorios) {
                for ($i = 0; $i < $longitud; $i++) {
                    $numerosAleatorios[] = rand(1, 4); 
                }
                $longitud++;
                echo "Correcto";
                header("Location: ej12.php");
            }else{
                echo "Te has equivocado";
            }
        }
    ?>
</body>
</html>