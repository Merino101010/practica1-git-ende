<?php

//require __DIR__ .  '/../conexion.php'; no hace falta pq ya lo rquiere indice
require __DIR__ .  '/indice.php';



var_dump($_GET['id']);
$id = $_GET['id'] ?? "";
$sql =  "SELECT nombre, categoria, stock FROM productos where id = :id";
$resultadoValores = $conexion->prepare($sql);
$resultadoValores->execute(["id" => $id]);
$devuelveAlgo = $resultadoValores->rowCount();
$producto = $resultadoValores->fetchObject();

if ($devuelveAlgo > 0) {
    if ($producto->stock > 0) {
        echo "<p> Nombre" . $producto->nombre . " categoria " . $producto->categoria . " stock " . $producto->stock . "</p> \n ";
    } else {
        echo "<p> Nombre " . $producto->nombre . " categoria " . $producto->categoria . " stock NO HAY STOCK AGOTADO </p> \n ";
    }
} else {
    echo "<p>Producto con id $id  no existe </p>";
}
