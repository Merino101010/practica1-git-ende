<?php // Versión de PHP con la que se está ejecutando el script

echo 'Versión de PHP: ' . PHP_VERSION . "\n";

 

// Lista de drivers PDO que PHP ha cargado (depende de php.ini)

echo 'Drivers PDO: ' . implode(', ', PDO::getAvailableDrivers()) . "\n";

 

// Comprobación explícita de las dos extensiones que nos interesan

foreach (['pdo_mysql', 'pdo_pgsql'] as $extension) {

    $estado = extension_loaded($extension) ? 'activa' : 'NO activa';

    echo "- $extension: $estado\n";

}