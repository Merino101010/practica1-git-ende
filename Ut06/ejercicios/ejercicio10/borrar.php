<?php
require __DIR__ .  '/../conexion.php';

$id = (int)$_GET['id'];

if( is_int($id) && $id>=1){

    $sql = "DELETE FROM PRODUCTOS where id = :id";
    

    $resultadoValores = $conexion->prepare($sql);
    $resultadoValores->execute(["id"=>$id]);
    $resultado = $resultadoValores->rowCount();
    if($resultado>0){
        echo "<p>producto con id  $id eliminado.</p>";
    }else{
        echo "<p>producto con id  $id no encontrado</p>";
    }
    


}else{

echo"<p>Identificador no valido</p>";
}