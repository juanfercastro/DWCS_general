<?php
$db = new mysqli("localhost", "root", "", "registros");

if ($db->connect_error) {
    die("Error en la conexión con la base de datos ".$db->connect_error);
}

if (isset($_POST["datos"])) {
    $nic = $_POST["nic"];
    $pas = sha1($_POST["pwd"]);
    $selection = $db->query("SELECT user_nic,pass FROM usuarios");
    while ($compare = $selection->fetch_array()) {
        if ($compare["user_nic"] == $nic && $compare["pass"] == $pas) {
            echo "<h1>Bienvenido $nic</h1>";
        }elseif ($compare["user_nic"]==$nic && $compare["pass"]!=$pas) {
            echo "Contraseña incorrecta";
        }else{
            echo "El usuario no existe";
        }
    }
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
    <h2>Rellene los campos para inciar sesion</h2>
    <form action="" method="post">
        <label for="nic">Nombre de usuario: </label>
        <input type="text" name="nic" id="nic"><br>
        <label for="pwd">Contraseña</label>
        <input type="password" name="pwd" id="pwd"><br>
        <input type="submit" value="Iniciar sesión" name="datos"><br>
    </form>
    <p>Si aun no ha creado un usuario <a href="registro.php">registrese</a></p>

    
</body>
</html>