<?php
$sql2 = "SELECT id, nombre, email, contra from usuarios";
    $resultadoValores2 = $conexion->prepare($sql2);
    $resultadoValores2->execute();
    $usuarios = $resultadoValores2->fetchObject();