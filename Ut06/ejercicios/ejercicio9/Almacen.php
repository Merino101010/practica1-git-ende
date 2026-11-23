<?php
require_once "Producto.php";
require __DIR__ .  '/../conexion.php';
$categoria = "Almacenamiento";
$sql = "Select id,nombre, precio, stock from productos where categoria = :categoria order by id";

$resultadovalores= $conexion->prepare($sql);
$resultadovalores->execute(["categoria" => $categoria]);
$productos = $resultadovalores->fetchAll();

foreach ($productos as $productoAñadir){
    $producto = new Producto($productoAñadir["id"],$productoAñadir["nombre"] ,$productoAñadir["precio"], $productoAñadir["stock"] );

    echo "nombre " . $productoAñadir["nombre"]. "\n";
    echo "precio " . $productoAñadir["precio"]. "\n";
    echo "stock " . $productoAñadir["stock"]. "\n" ;
    echo "valor stock ";
    var_dump($producto->valorStock());
    echo " esta agotado \n ";
    var_dump($producto->estaAgotado());


}


