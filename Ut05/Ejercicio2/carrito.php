<?php
session_start();

$precio = [
    'pan' => 1,
    'leche' => 1.25,
    'huevos' => 1.70
];



$sesion = $_SESSION['carrito'] ?? [];//lee carrito guardado y lo copiamos en la variable $sesion

$productoAñadir = $_GET['add'] ?? ''; // url add para q se añada

if (isset($precio[$productoAñadir]) ) {


    $unidadesProductoCarrito = ($sesion[$productoAñadir]?? 0)+1 ; //mira cuantas unidades hay de ese producto en el carrito, si no las hay da por hecho q hay 0, y suma 1 a las unidades al añadirlo
    $sesion[$productoAñadir] =$unidadesProductoCarrito ; //guarda el resutlado en la casilla pan del carrito

    $_SESSION['carrito'] = $sesion; //damos el valor de $sesion a la variable general del carrito asi no se pierde al recargar etc pq mantiene sesion abierta

    echo "Producto añadido con exito";

}else if ( $productoAñadir !== ''){

    echo "Producto no valido";
    
}


if($_GET['vaciar'] ?? ''  == '1'){{

    unset($_SESSION['carrito']);

    $sesion = [];

    echo "carrito vaciado";
}

}
if(($_GET['verCarrito'] ?? '') ==1){

    foreach($sesion as $producto => $valor){
        
        echo $producto . "=>" . $valor . "\n";

    }
}

echo "\n Cookie de sesion " . session_name();
