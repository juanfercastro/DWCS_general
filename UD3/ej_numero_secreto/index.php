<?php
session_start();

if (!isset($_SESSION['intentos'])) {
    $_SESSION['numero'] = rand(1, 1000);
    $_SESSION['intentos'] = 0;    
}
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
    <?php
    if (isset($_POST['adivinar'])) {
        $numero = $_POST['numero'];
        if ($numero > $_SESSION['numero']) {
            echo "El número es menor";
            $_SESSION['intentos']++;
        }else if ($numero < $_SESSION['numero']) {
            echo "El número es mayor";
            $_SESSION['intentos']++;
        }else{
            $msg = "Has acertado. Te ha costado ".$_SESSION['intentos']." intentos";
            echo "<script>alert('$msg');</script>";
            session_unset();
        }
    }
    ?>
    <form action="" method="post">
        <label for="numero">Número: </label>
        <input type="text" name="numero" id="numero">
        <input type="submit" value="Adivinar" name="adivinar">
    </form>
</body>
</html>