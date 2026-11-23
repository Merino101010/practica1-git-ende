<?php

require __DIR__ .  '/../conexion.php';
$texto = "";
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $texto = trim($_GET['q'] ?? "");    
}



$sql = "SELECT nombre, precio from productos where LOWER(nombre) like LOWER(:texto) order by nombre";

$resultadoValores = $conexion->prepare($sql);
$resultadoValores->execute(["texto"=>'%'. $texto . '%' ]);
$productos= $resultadoValores->fetchAll();

foreach($productos as $producto){
    echo "<p> nombre" .  htmlspecialchars($producto['nombre']) . "</p>";
    echo "<p> nombre" .  htmlspecialchars($producto['precio']) . "</p> \n";
    
}

