<?php
function producto(int $n1, int $n2=5):int{
    return $n1*$n2;
}


function multiplicar(int $numero)
{
    for ($i = 1; $i <= 10; $i++) {
        $mult = producto($i,$numero);
        echo $numero . ' x ' . $i . ' = ';
        if ($mult % 3 == 0) {
            echo ' ?';
        } else {
            echo $mult;
        }
        echo '<br>';
    }
}


