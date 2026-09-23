<?php
$reputacion = random_int(0,100); // un valor aleatorio de 0 a 100
$mfaActivo = true;
$suspendido = false;


$estado = match(true){
    $suspendido => "Acceso Bloqueado",
    $reputacion >= 80 && $mfaActivo => "Publicacion Directa",
    $reputacion >= 50 || $reputacion <=79 || $reputacion >=80 && $mfaActivo === false => "Publicacion con revision",
    $reputacion <50 => "Solo lectura",
};

echo $estado;

?>