<?php
require __DIR__ .  '/../conexion.php';



 $categoria = trim($_GET['cat'] ?? '');
 
 

 $sql = "SELECT nombre, precio, stock  from productos where categoria = :categoria order by nombre";

 $resultadoValores =   $conexion->prepare($sql);
 $resultadoValores->execute(['categoria' => $categoria]);
foreach($resultadoValores as $fila){
    echo $fila['nombre'] . " precio " .  $fila['precio'] . "\n";
}
//probar con http://localhost/practica1-git-ende/Ut06/ejercicios/ejercicio3/categoria.php?cat=monitores