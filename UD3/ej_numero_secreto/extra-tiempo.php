<?php
function formatear_segundos(int $segundos){
    $horas=0;
    $minutos = 0;
    while ($segundos >= 3600) {
        $segundos-=3600;
        $horas++;
    }
    while ($segundos>= 60) {
        $segundos -= 60;
        $minutos++;
    }
    if ($horas>0) {
        $msg = "";
    }
}
?>