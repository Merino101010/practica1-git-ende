<?php

require __DIR__ .  '/conexion.php';
$sql = "SELECT id, nombre, precio, categoria, stock  from productos  order by precio desc";

foreach($conexion->query($sql) as $filas){
    $formatoDecimal = number_format((float) $filas['precio'], 2, ',', '.');
    echo $filas['id'] .  " ". $filas['nombre'].  " " . $formatoDecimal.  " " . $filas['categoria'] .  " " . $filas['stock'] . "\n";

}

echo "*****fetch column **** \n";

$sql2 = "SELECT count(*)  from productos ";
$totalProductos = (int) $conexion->query($sql2)->fetchColumn() ;
echo  "Total de producutos:  " . $totalProductos;

    
    


