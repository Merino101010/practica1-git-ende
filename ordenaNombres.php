<?php

$nombre = "AlVaRO MeRiNO";
$nombreLimpio = trim($nombre);


$nombreSeparado = explode(" ", $nombreLimpio);

$nombreBueno = $nombreSeparado[0];
$apellidoBueno = $nombreSeparado[1];

$nombreBuenoM = strtoupper(substr($nombreBueno, 0,1));
$nombreBuenoR = strtolower(substr($nombreBueno, 1));

$ApellidoBuenoM = strtoupper(substr($apellidoBueno, 0,1));
$ApellidoBuenoR = strtolower(substr($apellidoBueno, 1));

echo "$nombreBuenoM" . "$nombreBuenoR" . " " . "$ApellidoBuenoM" . $ApellidoBuenoR; 



?>