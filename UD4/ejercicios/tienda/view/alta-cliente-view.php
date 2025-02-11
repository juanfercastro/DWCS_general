<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Cliente</title>
</head>
<body>
    <a href="?controller=&action=">Inicio</a>
    <h1>Dar un cliente de alta</h1>

    <?php
    if (isset($data['errores'])) {
        echo $data['errores'];
    }
    ?>

    <form action="?controller=ClienteController&action=addCliente" method="post">
        <label for="nombre">Nombre </label>
        <input type="text" name="nombre" id="nombre"><br>
        <label for="apel">Apellidos</label>
        <input type="text" name="apel" id="apel"><br>
        <label for="tel">telefono</label>
        <input type="tel" name="tel" id="tel"><br>
        <label for="mail">Email</label>
        <input type="mail" name="mail" id="mail"><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>