<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ej11.php" method="post">
        <label for="numeros">Escribe un número de 5 cifras</label>
        <input type="text" name="numeros" id="numeros">
        <input type="submit" value="Enviar" name="envio">
    </form>
    <?php
        include("funciones.php");
        if (isset($_POST["envio"])) {
            if (empty($_POST["numeros"])) {
                echo "No has escrito números";
            }else{
                $array = str_split($_POST["numeros"]);
                echo devolucion($array);
            }   
        }
    ?>
</body>
</html>