
    <?php
$producto = "Botella de agua";
$precio_unitario = 1.0;
$cantidad = 2;
$aplica_descuento = false;


$subtotal = $precio_unitario * $cantidad;

$aplica_descuento == true;

$subtotalConIVA = $subtotal+ $subtotal * 21/100;
$precio_conDescuento = ($subtotalConIVA *0.10) + $subtotalConIVA;

echo "<h1>Producto =  $producto  </h1>";



?>



<h1>Producto = <?= $producto ?> </h1>

<p>precio_unitario = <?=  $precio_unitario ?>  </p>
<p>cantidad = <?= $cantidad ?></p>
<p>aplica_descuento= <?= $aplica_descuento ?></p>
<p>subtotal = <?= $subtotal ?> </p>
<p>aplica_descuento= <?= $aplica_descuento ?> </p>
<p>subtotal con iva = <?= $subtotalConIVA ?> </p>

