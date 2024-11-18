<?php
$horaIncio = new DateTime();
sleep(5);
$horaFin = new DateTime();
// echo $horaIncio->format('i:s')."<br>";
// echo $horaFin->format('i:s');
$minutosInicio = (int)$horaIncio->format('i');
$segundosInicio = (int)$horaIncio->format('s');
$tiempoInicio = ($minutosInicio*60) + $segundosInicio;

$minutosFin = (int)$horaFin->format('i');
$segundosFin = (int)$horaFin->format('s');
$tiempoFin = ($minutosFin*60) + $segundosFin;

echo "La diferencia de segundos es de ".$tiempoFin - $tiempoInicio;



?>