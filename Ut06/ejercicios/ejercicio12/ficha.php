<?php

require __DIR__ .  '/../conexion.php';
require __DIR__ .  '/../indice.php';



var_dump($_GET['id']);
var_dump($_GET['nombre']);
$id = $_GET['id'] ?? null;
