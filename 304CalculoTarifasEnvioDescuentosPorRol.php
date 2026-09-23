<?php
$pesoKg = 4.2;
$rolCliente = 'PREMIUM'; //(valores: 'ESTANDAR', 'PREMIUM', 'VIP')
$montoCompra = 90.00;

$importeTotal = 0.0;




if($rolCliente==="VIP"){
    $importeTotal= $montoCompra ;
}elseif($rolCliente==="PREMIUM"){
    if($montoCompra>100.00){
        $importeTotal= $montoCompra ;
    }else{
       if($pesoKg<=2.0){
            $importeTotal = $montoCompra+ 0.5*3.99;
}       elseif($pesoKg>2 && $pesoKg <=5){
            $importeTotal = $montoCompra+ 0.5*6.5;
}       else{
            $importeTotal =$montoCompra+ 0.5* 9.99;
} 
    }
    
    
}else{
    if($pesoKg<=2.0){
    $importeTotal = $montoCompra+.99;
}   elseif($pesoKg>2 && $pesoKg <=5){
    $importeTotal = $montoCompra+6.5;
}   else{
    $importeTotal = $montoCompra+ 9.99;
}
}


echo $importeTotal;
?>