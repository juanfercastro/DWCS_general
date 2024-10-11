<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ej8.php" method="post">
        <input type="text" name="number"><br>
        <input type="submit" value="Enviar" name="envio">
    </form>
    <?php
        if (isset($_POST["envio"])) {
            $number = $_POST["number"];
            if ($number < 0) {
                echo "El número es negativo";
            }elseif ($number == 0){
                echo "El numero es 0";
            }else{
                echo "El número es positivo";
            }
        }
    ?>
</body>
</html>