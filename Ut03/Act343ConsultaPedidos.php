<?php
$clientes = [

    1 => ['nombre' => 'Tecnosur S.L.',        'ciudad' => 'Sevilla'],

    2 => ['nombre' => 'Librería Atlas',       'ciudad' => 'Madrid'],

    3 => ['nombre' => 'Panadería La Espiga',  'ciudad' => 'Valencia'],

    4 => ['nombre' => 'Clínica Dental Sol',   'ciudad' => 'Málaga'],

];

$pedidos = [

['id' => 1001, 'id_cliente' => 1, 'producto' => 'Portátil',  'importe' => 899.90, 'fecha' => '2026-09-03'],

    ['id' => 1002, 'id_cliente' => 2, 'producto' => 'Estanterías',         'importe' => 340.00, 'fecha' => '2026-09-05'],

    ['id' => 1003, 'id_cliente' => 3, 'producto' => 'Horno industrial',    'importe' => 1250.00, 'fecha' => '2026-09-12'],

    ['id' => 1004, 'id_cliente' => 1, 'producto' => 'Monitores (x4)',      'importe' => 520.00, 'fecha' => '2026-09-18'],

    ['id' => 1005, 'id_cliente' => 4, 'producto' => 'Sillón dental',       'importe' => 2100.00, 'fecha' => '2026-09-22'],

    ['id' => 1006, 'id_cliente' => 2, 'producto' => 'Lector de códigos',   'importe' => 89.50, 'fecha' => '2026-09-30'],

    ['id' => 1007, 'id_cliente' => 1, 'producto' => 'Router profesional',  'importe' => 210.00, 'fecha' => '2026-10-01'],

    ['id' => 1008, 'id_cliente' => 3, 'producto' => 'Amasadora',           'importe' => 780.00, 'fecha' => '2026-10-02'],

    ['id' => 1009, 'id_cliente' => 4, 'producto' => 'Esterilizador',       'importe' => 950.00, 'fecha' => '2026-10-03'],

    ['id' => 1010, 'id_cliente' => 2, 'producto' => 'Caja registradora',   'importe' => 430.00, 'fecha' => '2026-10-04'],

];


if($_SERVER["REQUEST_METHOD"] === "POST"){
  

    $cliente = $_POST["cliente"];
    $desde = $_POST["desde"] ?? "2026-07-05" ;
    $hasta = $_POST["hasta"]?? "2026-12-12";
  //  $consultar = $_POST["Consultar"];
    $contador=0;
    $contadorif = 0;
    $total=0.0;

    if(array_key_exists($cliente, $clientes)){
       

        foreach($clientes as $clave => $valor){

         $totalPedidosDelCliente = 0;
            foreach ($pedidos as $p) {
                if ($p['id_cliente'] == $cliente) {
                    $totalPedidosDelCliente++;
                }
            }
            foreach($pedidos as $pedido ){
                
                if($clave==$cliente && $pedido['id_cliente']==$cliente ){
                    $contadorif++;       
                    if(($pedido["fecha"])>=$desde){
                    $producto = $pedido["producto"];
                    $importe = $pedido["importe"];
                    $fecha = $pedido["fecha"];

                        echo "<p>  producto $producto</p>";
                        echo "<p>  importe $importe</p>";
                        echo "<p>  fecha $fecha</p>";
                        $total=$importe+$total;
                        $contador++;
                    }else{ /*No sale fecha pq es mas lejana*/
                    continue;
                       

                    }
                //filtro sacar pedidos cliente $pedidos["id_cliente"] == $clave
                //$pedidosCliente = $cliente[$pedido["id_cliente"]];

                
                }else{
                    //echo "<p>El cliente no tiene pedidos</p>";
                    continue;
                }
                if($totalPedidosDelCliente==$contadorif){
                     echo "<p>El cliente no tiene  más pedidos</p>";
                    echo"<p>El total de importe pagado del cliente han sido: $total $ </p>";
                    break;
                    
                }
                   

                }
                    
            }
        }elseif($cliente == 0){
        foreach($clientes as $clave => $valor){
            foreach($pedidos as $pedido ){
               

              
               if($pedido["id_cliente"] == $clave){
                
                    echo "<p>$clave</p>";
                    $producto = $pedido["producto"];
                    $importe = $pedido["importe"];
                    $id_cliente = $pedido["id_cliente"];
                    echo "<p>  producto $producto</p>";
                    echo "<p>  producto $importe</p>";
                    echo "<p>  id_cliente $id_cliente </p>";
                    
               }
                
                }
            

            }
        }else{

        echo "<p>El usuario o lo que estas buscando  no existe</p>";
        }
           
         
    
    }
    
        
    
    


