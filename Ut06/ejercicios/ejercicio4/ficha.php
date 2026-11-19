<?php

require __DIR__ .  '/../conexion.php';

$id = $_GET['id'];

if(!filter_var($id,FILTER_VALIDATE_INT)){
    echo "<p>Identificador no validoi</p>";
    exit;
}

$sql = "SELECT nombre, precio, stock FROM productos WHERE  id = :id ";

$resultadoValores = $conexion ->prepare($sql);
$resultadoValores->execute(['id' => $id]);
$producto = $resultadoValores->fetchObject();


if($producto == false){
    echo "<p>Producto no encontrado</p>";
}else{
    
    echo "<p> Nombre ". htmlspecialchars($producto->nombre) ."</p>";
    echo "<p> precio ".$producto->precio*1.21 ."</p>";
    
    if($producto->stock == 0){
        echo "<p> Stock Agotado</p>";
    }else{
        echo "<p> Stock ".$producto->stock ."</p>";
    }
    
    
    
}

