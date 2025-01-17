<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <h1>Listado de Clientes</h1>
    <table>
        <tr>
            <td>Denominacion</td>
            <td>Descripcion</td>
            <td>Precio</td>
            <td>Cantidad</td>
        </tr>
        <?php
            foreach ($data['clientes'] as $p) {
                echo '<tr>';
                echo '<td>'.$p->getNombre().'</td>';
                echo '<td>'.$p->getApellidos().'</td>';
                echo '<td>'.$p->getNumero().'</td>';
                echo '<td>'.$p->getMail().'</td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>