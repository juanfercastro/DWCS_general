<?php
include("funciones.php");
session_start();
if (comprobarSesion()==true) {
    header("Location: restringido.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
<?php include "../header.html"; ?>
    <?php
    //Recuperar datos si llegan por post.
    if (isset($_POST['nic']) && isset($_POST['pass'])) {
        if (comprobar_usuario($_POST['nic'], $_POST['pass'])) {
            //Esto tienes que modificarlo
            inicioSesion($_POST['nic']);
            header("Location: restringido.php");
            exit;
        } else {
            echo '<h2 style="color:white;background-color:red;">Usuario y contraseña incorrectos.</h2>';
        }
    }
    ?>
    <fieldset>
        <form action="" method="post">
            <label for="nic">Nombre de usuario (nic)</label><br>
            <input type="text" name="nic" required><br>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass" required><br>
            <button type="submit">Acceder</button>
        </form>
    </fieldset>
    <a href="registro.php">Registrar usuario</a>
</body>

</html>