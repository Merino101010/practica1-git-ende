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

        echo "<h1> <a href='categorias.php?categoria=" . htmlspecialchars($categoria) . "'>$categoria</a> </h1>";
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

        echo "<h2>{$producto["nombre"]}  </h2> ";
        echo '<h2><a href="../ejercicio12/ficha.php?id=' . $producto["id"] . '">' . $producto["nombre"] . '</a></h2>';
        echo "\n";
    }
}
