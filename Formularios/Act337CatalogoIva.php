<?php
// Productos: código => [nombre, precio sin IVA]

$productos = [

    'P001' => ['nombre' => 'Teclado', 'precio' => 24.90],

    'P002' => ['nombre' => 'Ratón',   'precio' => 12.50],

    'P003' => ['nombre' => 'Monitor', 'precio' => 149.99],

    'P004' => ['nombre' => 'Webcam',  'precio' => 39.00],

];


$iva = 21;


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $codigo = $_POST["codigo"];
    $unidades = $_POST["unidades"];


    if (filter_var($unidades) >= 1) {
        echo "<table border=1px> ";
        echo "<tr>";
        echo "<th>nombre</th>";
        echo "<th>unidades</th>";
        echo "<th>precio sin iva</th>";
        echo "<th>precio con iva</th>";
        echo "<th>precio total</th>";
        echo "</tr>";

        /*Por $productos as $key => $value */
        /*$values as $value => $atribute*/
        /*if (atribute===("nombre)"){
        }*/
        /*if (atribute===("precio)"){
        }*/
        foreach ($productos as $code =>  ['nombre' => $nombre, 'precio' => $precioSinIva]) {






            $precioConIva = ($precioSinIva * ($iva / 100)) + $precioSinIva;
            $precioTotal = $precioConIva * $unidades;
            if ($code === $codigo) {
                echo "<tr>";
                echo "<td> $nombre</td>";
                echo "<td> $unidades</td>";
                echo "<td> $precioSinIva</td>";
                echo "<td> $precioConIva</td>";
                echo "<td> $precioTotal</td>";




                echo "</tr>";
            }
        }


        echo "</table> ";
    }
}
