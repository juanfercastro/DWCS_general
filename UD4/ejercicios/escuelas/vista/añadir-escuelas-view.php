<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=STYLE_PATH.'style.css'?>" rel="stylesheet">
    <title>Escuelas</title>
</head>

<body>
    <!-- AQUI EL HEADER -->
    <fieldset>
        <form action="" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre">
            <label for="direccion">direccion</label>
            <input type="text" id="direccion" name="direccion">
            <select id="municipio" name="municipio">
                <option value="">--</option>
                <?php
                foreach ($data['municipios'] as $m) {
                    echo '<option value="' . $m->getCodigo() . '">';
                    echo $m->getNombre();
                    echo '</option>';
                }
                ?>
            <label for="apertura">apertura</label>
            <input type="datetime" name="apertura" id="apertura">
            <label for="cierre">cierre</label>
            <input type="datetime" id="cierre" name="cierre">
            <label for="comedor">comedor</label>
            <input type="checkbox" name="comedor" id="comedor">
            <button type="submit">Añadir</button>
        </form>
    </fieldset>
</body>

</html>