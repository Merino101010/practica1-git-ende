<?php
   //  const MODO_DESARROLLO = true;
const MODO_DESARROLLO = true;



$config = [
    'host' => '127.0.0.1',
    'port' => '3306',
    'bd' => 'tienda_pdo',
    'charset' => 'utf8mb4',



];
$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=tienda_pdo;charset=utf8mb4';
$opciones = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,


];
try {
 $conexion =  new PDO($dsn,'root', '', $opciones);   
}catch(Exception $e){
    
       

    
    $e->getMessage();
    error_log("Error coneoxion" .  $e->getMessage());


    if(MODO_DESARROLLO == true){
        exit("error al conetar" . $e->getMessage());
        //error_log("echo conectados" .  $e->getMessage());

    }else{
        exit("Servicio no disponible");
        //error_log("echo no conectados" .  $e->getMessage());
    
        //error_log("NO disponible");
    }
    
}


