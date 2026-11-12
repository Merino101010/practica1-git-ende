
<?php
function mostrarError(PDOException $e, bool $modoDesarrollo): void

{

    // Detalle técnico solo en desarrollo; mensaje neutro en producción

    if ($modoDesarrollo) {

        echo '[DESARROLLO] ' . $e->getMessage() . "\n";

    } else {

        echo "[PRODUCCIÓN] Servicio no disponible. Inténtalo más tarde.\n";

    }

}

 

$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=tienda_pdo;charset=utf8mb4';

 

try {

    // new PDO() abre la conexión o lanza PDOException si no puede

    $conexion = new PDO($dsn, 'root', '');

    echo "Conexión establecida\n";

} catch (PDOException $e) {

    // El detalle técnico va SIEMPRE al registro de errores del servidor

    error_log('Error PDO: ' . $e->getMessage());

    mostrarError($e, true);   // así lo ves tú mientras programas

    mostrarError($e, false);  // así lo vería un cliente en la web publicada

}


?>