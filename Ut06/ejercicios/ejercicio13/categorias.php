<?php
require __DIR__ .  '/../ejercicio12/indice.php';


/*Vista A*/
$sql = "SELECT categoria from productos group by categoria";
$resultadoValores = $conexion->prepare($sql);
$resultadoValores->execute();
$hayFilas = $resultadoValores->rowCount();
$categorias = $resultadoValores->fetchAll(PDO::FETCH_COLUMN);

if ($hayFilas > 0) {
    echo "<p>Hay $hayFilas  categorias</p>";
    foreach ($categorias as $categoria) {

        echo "<p> <a href='categorias.php?categoria=" . htmlspecialchars($categoria) . "'>$categoria</a> </p>";
    }
}
/*Vista B*/

$categoria = $_GET['categoria'];
$sql2 = "SELECT * FROM productos where categoria = :categoria ";
$resultadoValores = $conexion->prepare($sql2);
$resultadoValores->execute([':categoria' => $categoria]);
$productos = $resultadoValores->fetchAll();

if (isset($categoria)) {
    echo "<p>$categoria</p>";
    foreach ($productos as $producto) {

        echo "<p>{$producto["nombre"]}  </p> ";
        echo '<p><a href="../ejercicio12/ficha.php?id=' . $producto["id"] . '">' . $producto["nombre"] . '</a></p>';
        echo "\n";
    }
}
