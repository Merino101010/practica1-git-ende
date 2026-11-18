<?php
require __DIR__ .  '/../conexion.php';


if($_SERVER["REQUEST_METHOD"] == 'GET'){
    $categoria = trim($_GET['categoria'] ?? '');
}else{
    $categoria = " ";
}
//if(  !isset($_GET['categoria'])){
// echo "<p>No existe esa categoria</p>";
//}
 
 echo "<body>";
 

 $sql = "SELECT nombre, precio, stock  from productos where categoria = :categoria order by nombre";

 $resultadoValores =   $conexion->prepare($sql);
 $resultadoValores->execute(['categoria' => $categoria]);
//var_dump($resultadoValores->fetchAll());
$productos = $resultadoValores->fetchAll(PDO::FETCH_ASSOC);
    if( empty($productos) ){
        echo "<h1>" . ($categoria) . " </h1>";
        echo "<p>NO hay productos para esa categoria</p>";
    }else{
       
    echo "<table border=1px  >

        <tr>
            
            <th>nombre</th>
            <th>precio</th>
            <th>stock</th>
        
        </tr>";
         foreach($productos as $fila){
        echo "<tr>
                     
            <td>" . htmlspecialchars( $fila['nombre']) . " </td>
            <td>" . htmlspecialchars( $fila['precio']) . " </td>
            <td>" . htmlspecialchars( $fila['stock']) . " </td>
            
    
        </tr> ";
        } 
    echo "</table> \n" ;
    //echo $fila['nombre'] . " precio " .  $fila['precio'] . "\n";
    
    }
echo "</body>";

//probar con http://localhost/practica1-git-ende/Ut06/ejercicios/ejercicio3/categoria.php?cat=monitores