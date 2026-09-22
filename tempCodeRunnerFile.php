<?php

[$estadoHTML, $color] = ["Pendiente", "amarillo"];


if(strcasecmp($estadoHTML, "Pendiente") === 0 ){
    echo "Tu pedido está pendiente" .  $color;
}elseif(strcasecmp($estadoHTML,"Enviado") == 0){
    echo "Tu pedido es enviado" . $color;
}elseif(strcasecmp($estadoHTML,"Entregado") == 0){
    echo "Tu pedido es entregado" . $color;
}else{
    echo "TU pedido ha sido cancelado" . $color;
}








?>