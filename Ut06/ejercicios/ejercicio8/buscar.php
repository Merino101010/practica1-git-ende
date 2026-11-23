<?php

require __DIR__ .  '/../conexion.php';

$texto = trim($_GET['q']) ?? "";


$sql = "SELECT nombre, precio from productos where LOWER(nombre) like LOWER(:texto) order by nombre";

$resultadoValores= $conexion->prepare($sql);
$resultadoValores->execute(["texto"=>$texto]);
$productos= $resultadoValores->fetchObject();

foreach($productos as $producto){
    echo "<p> nombre $producto->nombre</p>";
    echo "<p> precio $producto->precio</p> \n";
}

