<?php
require __DIR__ .  '/../conexion.php';


$sql = "SELECT id, nombre from productos";

$resultadoValores = $conexion->prepare($sql);
$resultadoValores->execute();
$productos = $resultadoValores->fetchAll();
foreach ($productos as $producto) {
    echo 'ID '  . $producto["id"] . "\n";
    echo ' <a  href="./ficha.php?id=  {$producto["id"]} " >' . $producto["nombre"] . '</a> '  . "\n";
}
