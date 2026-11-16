<?php

require __DIR__ .  '/conexion.php';

echo $conexion->getAttribute(PDO::ATTR_DRIVER_NAME)  . "\n";

echo $conexion->getAttribute(PDO::ATTR_DEFAULT_FETCH_MODE) == PDO::FETCH_ASSOC;