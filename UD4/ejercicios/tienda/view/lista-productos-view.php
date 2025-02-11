<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Productos</title>
</head>
<body>
    <a href="?controller=&action=">Inicio</a>
    <h1>Productos</h1>
    <table>
        <tr>
            <th>Denominación</th>
            <th>Descripción</th>
            <th>Presio</th>
            <th>Cantidad</th>
        </tr>
        <?php
            foreach($data['productos'] as $p){
                echo '<tr>';
                echo '<td>'. $p->getDenominacion().'</td>';
                echo '<td>'. $p->getDescripcion().'</td>';
                echo '<td>'. $p->getPrecio().'</td>';
                echo '<td>'. $p->getCantidad().'</td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>
