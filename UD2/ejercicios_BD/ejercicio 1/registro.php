<?php
$db = new mysqli('localhost', 'root', '', 'registros');

if ($db->connect_error) {
    die("Error en la conexión ". $db->connect_error);
}

if (isset($_POST["datos"])) {
    $nic = $_POST["nic"];
    $passha = sha1($_POST["pwd"]);
    $nombre = $_POST["name"];
    $ape1 = $_POST["apel1"];
    $ape2 = $_POST["apel2"];
    $mail = $_POST["mail"];

    $selection = $db->query("SELECT user_nic, email FROM usuarios");
    while ($compare = $selection->fetch_array()) {
        if ($nic == $compare["user_nic"]) {
            die("El nombre de usuario no está disponible");
        }
        if ($mail == $compare["email"]) {
            die("El correo electrónico ya ha sido registrado");
        }
    }
    $db->query("INSERT INTO usuarios VALUES ('$nic','$nombre','$ape1','$ape2','$mail','$passha')");
    echo "Se ha registrado con exito el usuario $nic";
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <h2>Rellene los datos del formulario para poder registrarse</h2>
    <form action="" method="post">
        <label for="nic">Nombre de usuario: </label>
        <input type="text" name="nic" id="nic" pattern=".{0,30}" required><br>
        <label for="pwd">Contraseña: </label>
        <input type="password" name="pwd" id="pwd" required><br>
        <label for="name">Nombre: </label>
        <input type="text" name="name" id="name" pattern=".{0,60}" required><br>
        <label for="apel1">Primer apellido: </label>
        <input type="text" name="apel1" id="apel1" pattern=".{0,100}" required><br>
        <label for="apel2">Segundo apellido: </label>
        <input type="text" name="apel2" id="apel2" pattern=".{0,100}"><br>
        <label for="mail">Correo electrónico: </label>
        <input type="email" name="mail" id="mail" pattern=".{0,320}" required><br>
        <input type="submit" value="Registrarse" name="datos"><br>
        <p>Si ya se ha registrado puede <a href="login.php">iniciar sesion</a></p>
    </form>
</body>
</html>