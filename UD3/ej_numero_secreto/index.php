<?php
$rand = rand(1, 1000);

if (isset($_POST['adivinar'])) {
    $numero = $_POST['numero'];
    if ($numero > $rand) {
        echo "El número es menor";
    }else if ($numero < $rand) {
        echo "El número es mayor";
    }else{
        die("Has acertado!");
    }
}
echo $rand;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido al número secreto</h1>
    <form action="" method="post">
        <label for="numero">Número: </label>
        <input type="text" name="numero" id="numero">
        <input type="submit" value="Adivinar" name="adivinar">
    </form>
</body>
</html>