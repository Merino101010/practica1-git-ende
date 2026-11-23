<?php
require __DIR__ .  '/../conexion.php';

$nombre = trim($_POST["nombre"]);
$categoria =  trim($_POST["categoria"]);
$precio = $_POST["precio"];
$stock = $_POST["stock"];
$errores = [];
if (!empty($nombre && $categoria) && filter_var($precio, FILTER_VALIDATE_FLOAT)  && filter_var($precio, FILTER_VALIDATE_INT)) {
    if ($precio < 0.01 || $stock < 0) {
        $errores[] = "<p>Error valor demasiado bajo de precio o stock </p>";
    }


    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<p> $error </p>" . "\n";
            exit();
        }
    } else {
        $sql =  "INSERT into productos (nombre, categoria, precio, stock)  values(:nombre, :categoria, :precio, :stock)";
        $resultadovalores = $conexion->prepare($sql);
        $resultadovalores->execute(['nombre' => $nombre, 'categoria' => $categoria, 'precio' => $precio, 'stock' => $stock]);

        $sql2 = "SELECT id as id from productos where nombre = :nombre";
        $resultadovalores2 = $conexion->prepare($sql2);
        $resultadovalores2->execute(["nombre" => $nombre]);
        $productos = $resultadovalores2->fetchAll();
        var_dump($productos);
        foreach ($productos as $fila) {
            echo "<p>Guardado con id   " . $fila["id"] . "   </p> ";
        }
    }
}
