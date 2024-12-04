<?php
include("municipio.php");

function get_conexion()
{
    try {
        $pdo = new PDO('mysql:host=mariadb;dbname=municipios', 'root', 'bitnami');
    } catch (PDOException $th) {
        error_log("Fallo conectando a la BD -->" . $th->getMessage());
        die();
    }
    return $pdo;
}

function get_provincias()
{
    $pdo = get_conexion();
    $sql = 'SELECT nombre, cod_provincia from provincia';
    $provincias = [];
    try {
        $statement = $pdo->query($sql);
        while ($row = $statement->fetch()) {
            $provincias[] = new Provincia(intval($row[1]), $row[0]);
        }
    } catch (PDOException $th) {
        error_log("Error obteniendo las provincias.");
    } finally {
        $statement = null;
        $pdo = null;
    }

    return $provincias;
}

function get_municipios($cod_provincia, $nombre = null)
{
    $pdo = get_conexion();
    $sql = "SELECT m.cod_municipio, m.nombre AS muni, m.cod_provincia, p.nombre AS prov 
    FROM municipio m 
    INNER JOIN provincia p ON p.cod_provincia=m.cod_provincia 
    WHERE p.cod_provincia=$cod_provincia";
    if (isset($nombre) && '' != $nombre) {
        $sql .= " AND m.nombre LIKE '$nombre%'";
    }
    $sql .= " ORDER BY 2";
    $municipios = [];
    try {
        $statement = $pdo->query($sql);
        while ($row = $statement->fetch()) {
            $prov = new Provincia(intval($row['cod_provincia']), $row['prov']);
            $municipios[] = new Municipio(intval($row['cod_municipio']), $row['muni'], $prov);
        }
    } catch (PDOException $th) {
        error_log("Error obteniendo los municipios filtrados por cod_provincia = $cod_provincia y nombre= $nombre");
        error_log($th->getMessage());
    } finally {
        $statement = null;
        $pdo = null;
    }

    return $municipios;
}

//Control de estado si llega por el formulario
$filter_nombre = '';
$filter_provincia = 15;
if (isset($_POST['filter_provincia'])) {
    $filter_provincia = intval($_POST['filter_provincia']);
}
if (isset($_POST['filter_nombre'])) {
    $filter_nombre = $_POST['filter_nombre'];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        table {
            /* text-align: center; */
            margin: auto;

        }

        th {
            background-color: beige;
        }

        td {
            background-color: aliceblue;
        }

      fieldset{
        margin: inherit;
      }

        form {
            display: grid;
            grid-template-columns: 1fr 2fr 1fr 2fr;
            gap: 10px;
            margin:auto;
        }

        form button {
            grid-column: span 4;
        }
    

        body {
            margin: 2% 20% 2% 20%;

        }
    </style>
</head>

<body>
    <?php include "../header.html"; ?>
    <fieldset>
        <legend>Filtros de busqueda</legend>
        <form method="post">
            <label for="filter_provincia">Provincia </label>
            <select id="filter_provincia" name="filter_provincia">
                <?php
                $provincias = get_provincias();
                foreach ($provincias as $p) {
                    echo '<option value="' . $p->getCodigo() . '" ';
                    if ($p->getCodigo() == $filter_provincia) {
                        echo 'selected';
                    }
                    echo '>' . $p->getNombre() . '</option>';
                }
                ?>
            </select>
            <label for="filter_nombre">Municipio </label>
            <input id="filter_nombre" name="filter_nombre" value=<?php echo $filter_nombre; ?>>
            <button type="submit">Buscar</button>
        </form>
    </fieldset>
    <table>
        <tr>
            <th>Municipio</th>
        </tr>
        <?php
        $munis = get_municipios($filter_provincia, $filter_nombre);
        foreach ($munis as $m) {
            echo '<tr><td>' . $m->getNombre() . '</td></tr>';
        }
        ?>
    </table>
</body>

</html>