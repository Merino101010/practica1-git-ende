<?php
require __DIR__ .  '/../conexion.php';



$sql = "SELECT  count(id) as productos , SUM(stock) as unidades, categoria FROM productos  GROUP BY categoria ORDER BY categoria";
$resultadoValores = $conexion->query($sql);
//$productos = $resultadoValores->fetchAll(PDO::FETCH_ASSOC);

//select  sum(precioporstock) from productos ->fetchcolumn

//->fetch recirrer con while

$productos = $resultadoValores->fetchAll();
//var_dump($productos);
$nproductos = count($productos); //cuento nº productos por cada fila 

echo " Categeorias con productos " . $nproductos . "\n";
foreach ($productos as $valor) {
    //echo $valor;

    echo "  -" . $valor["categoria"] .  " productos " . $valor["productos"] . " unidades " . $valor["unidades"] . "\n";
}
