<?php

$alumnos = [

    'Ana'   => 9.5,

    'Luis'  => 4.2,

    'Marta' => 7.8,

    'Pedro' => 5.0,

    'Lucía' => 6.4,

];
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $nombre = $_POST["nombre"];
    $contador = 0;

    foreach ($alumnos as $alumno => $nota) {
        if (strtolower($alumno) === strtolower($nombre)) {

            if ($nota > 5 && $nota < 6) {
                echo "Nombre: $alumno suficiente";
            } elseif ($nota > 6 && $nota < 7) {
                echo "Nombre: $alumno bien";
            } elseif ($nota > 7 && $nota < 9) {
                echo "Nombre: $alumno notable";
            } elseif ($nota > 9) {
                echo "Nombre: $alumno sobresaliente";
            } else {
                echo "Nombre: $alumno suspenso";
            }
        } else {
            $contador++;
        }
    }

    if ($contador == count($alumnos)) {
        echo "Error Ese alumno no existe";
    }
}
