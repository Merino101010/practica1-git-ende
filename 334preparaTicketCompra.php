<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $nombreProductos = $_POST["productoNombre"] ?? "Error Unknown Value";
    $costeProductos = $_POST["productoCoste"] ?? "Error Unknown Value";
    $cantidadProductos = $_POST["productoCantidad"] ?? "Error Unknown Value";

    if (
        in_array("Error Unknown Value", $nombreProductos) === false
        && in_array("Error Unknown Value", $costeProductos) === false
        && in_array("Error Unknown Value", $cantidadProductos) === false
    ) {
        echo "<table border = 1px>  ";
        echo "<tr>
                <td>nombre producto</td>
                <td>coste producto</td>
                <td>cantidad producto</td>
                
                </tr> ";
        foreach ($nombreProductos as $key => $nombre) {
            $coste = $costeProductos[$key];
            $cantidad = $cantidadProductos[$key];
            echo "<tr>
                <td>$nombre</td>
                <td>$coste</td>
                <td>$cantidad</td>
                
                </tr>";
        }
        echo "</table>";
    } else {
        echo " ";
    }
}

/*Ruta de mi navegador con XAMPPS*/ 
/*http://localhost/ut1_practica/334preparaTicketCompra.php*/
