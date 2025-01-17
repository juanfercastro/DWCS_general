<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <h1>Listado de Productos</h1>
    <table>
        <tr>
            <td>Denominacion</td>
            <td>Descripcion</td>
            <td>Precio</td>
            <td>Cantidad</td>
        </tr>
        <?php
            foreach ($data['productos'] as $p) {
                echo '<tr>';
                echo '<td>'.$p->getDenominacion().'</td>';
                echo '<td>'.$p->getDescripcion().'</td>';
                echo '<td>'.$p->getPrecio().'</td>';
                echo '<td>'.$p->getCantidad().'</td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>