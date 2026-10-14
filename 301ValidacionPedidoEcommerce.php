<?php

[$estadoHTML, $color] = ["Enviado", "Verde"];
$diasDesdeEnvio = 5;
$notaAdicional = " han pasado mas de 3 dias desde su envío";
if(strcasecmp($estadoHTML, "Pendiente") === 0 ){
    echo "Tu pedido está pendiente " .  $color;
}elseif(strcasecmp($estadoHTML,"Enviado") == 0){
    if($diasDesdeEnvio>3){
        echo "<div style='padding: 10px; background-color: {$color}; color: white; border-radius: 5px;'>";
        
        echo "Tu pedido es enviado " ." {$notaAdicional}" ;    
        echo "</div>";
    }else{
        echo "Tu pedido es enviado " . $color;
    }
    
}elseif(strcasecmp($estadoHTML,"Entregado") == 0){
    echo "Tu pedido es entregado " . $color;
}else{
    echo "TU pedido ha sido cancelado " . $color;
}







