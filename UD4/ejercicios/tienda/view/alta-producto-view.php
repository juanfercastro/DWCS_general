<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Producto</title>
</head>
<body>
    <a href="?controller=&action=">Inicio</a>
    <h1>Dar un producto de alta</h1>

    <?php
    if (isset($data['errores'])) {
        echo $data['errores'];
    }
    ?>

    <form action="?controller=ProductoController&action=addProducto" method="post">
        <label for="denom">Nombre </label>
        <input type="text" name="denom" id="denom"><br>
        <label for="desc">Descripcion</label>
        <input type="text" name="desc" id="desc"><br>
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio"><br>
        <label for="cant">Cantidad</label>
        <input type="number" name="cant" id="cant"><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>