<?php
include("funciones.php");
session_start();
if (comprobar_sesion()) {
    header("Location: restringido.php");
    exit;
}
if (isset($_POST["nic"])) {
    inicio_session($_POST["nic"]);
    if (isset($_POST['recuerdame'])) {
        setcookie('recuerdame', $_POST['nic'], time()+30*24*3600);
    }
    header("Location: restringido.php");
    exit;
}
$value = isset($_COOKIE['recuerdame'])?$_COOKIE['recuerdame']:'';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <fieldset>
        <form action="" method="post">
            <label for="nic">Nombre de usuario (nic)</label><br>
            <input type="text" name="nic" value="<?php echo $value;?>"><br>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass"><br>
            <input type="checkbox" name="recuerdame" id="recuerdame">
            <label for="recuerdame">Recuerdame </label><br>
            <button type="submit">Acceder</button>
        </form>
    </fieldset>
    <a href="registro.php">Registrar usuario</a>
    
</body>
</html>