<?php
session_start();

if (!isset($_SESSION['intentos'])) {
    $_SESSION['numero'] = rand(1, 1000);
    $_SESSION['intentos'] = 1;
    $startTime = new DateTime();
    $minStart = (int)$startTime->format('i');
    $secStart = (int)$startTime->format('s');
    $start = ($minStart*60)+$secStart;
    $_SESSION['tiempo'] = $start;    
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
            $endTime = new DateTime();
            $minEnd = (int)$endTime->format('i');
            $secEnd = (int)$endTime->format('s');
            $end = ($minEnd*60)+$secEnd;
            $duracion = $end - $_SESSION['tiempo'];
            if ($duracion < 60) {
                $msg = "Has acertado. Te ha costado ".$_SESSION['intentos']." intentos y has tardado ".$duracion." segundos.";
                echo "<script>alert('$msg');</script>";
                session_unset();
            }elseif ($duracion >= 60) {
                $mins = intdiv($duracion, 60);
                $sec = $duracion%60;
                $ternariaMin = ($mins>1)?$mins." minutos": $mins." minuto";
                $ternariaSec = ($sec>1)?$sec." segundos":$sec." segundo";
                $msg = "Has acertado. Te ha costado ".$_SESSION['intentos']." intentos y has tardado ".$ternariaMin." y ".$ternariaSec;
                echo "<script>alert('$msg');</script>";
                session_unset();
            }
           
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