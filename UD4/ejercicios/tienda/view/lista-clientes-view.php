<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Clientes</title>
</head>
<body>
    <a href="?controller=&action=">Inicio</a>
    <h1>Lista de Clientes</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Email</th>
        </tr>
        <?php
            foreach ($data['clientes'] as $c) {
                echo '<tr>';
                echo '<td>'.$c->getNombre().'</td>';
                echo '<td>'.$c->getApellidos().'</td>';
                echo '<td>'.$c->getTelefono().'</td>';
                echo '<td>'.$c->getMail().'</td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>