<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>
    <?php
        $lista = array(
            'saludo' => "hola",
            'despedida' => "adios",
            'despedida' => "chao",
            10 => "cosas",
            15 => true,
            'colores' => ['rojo','amarillo']
        );

        echo '$lista = '.$lista;
        var_dump($lista);
        echo "<br>Unset(lista)<br>";
        unset($lista['saludo']);
        unset($lista);
        $lista['PI'] = 3.141592;
        array_push($lista,"DAW");
        echo 'Mi array tiene '.count($lista).' elementos<br>';
        var_dump($lista);
        $lista2 = [
            0 => "cero",
            1 => "uno",
        ];
        echo '<ul>';
        // var_dump($lista2);
        foreach($lista as $clave => $valor){
            echo '<li>'.$clave.'='.$valor.'</li>';
        }
        echo '</ul>';

    ?>
    
</body>
</html>