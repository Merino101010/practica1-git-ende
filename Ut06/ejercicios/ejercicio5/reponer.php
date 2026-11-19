<?php
require __DIR__ .  '/../conexion.php';

$unidades = 10;

$stock = 0;

$sql = "SELECT count(*)  FROM productos where stock = :stock";
$resultadoValores = $conexion->prepare($sql);
$resultadoValores->execute(["stock"=> $stock]);

$columna = $resultadoValores->fetchColumn();
echo "<p>Agotados antes $columna </p>" ;

$sql = "UPDATE productos  set stock = :unidades where stock = 0 ";
$resultadoValores= $conexion->prepare($sql);
$resultadoValores->execute(["unidades" => $unidades]);
$filaContador = $resultadoValores->rowCount();
echo "<p>Filas modificadas $filaContador</p>";

$sql = "SELECT count(*)  FROM productos where stock = :stock";
$resultadoValores = $conexion->prepare($sql);
$resultadoValores->execute(["stock"=> $stock]);

$columna = $resultadoValores->fetchColumn();
echo "<p>Agotados despues $columna </p>" ;



