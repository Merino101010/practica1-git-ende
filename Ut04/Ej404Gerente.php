<?php

class Gerente extends Empleado{

     private const  PLUS_POR_PERSONA=120.0;
     private const ENVIO_POR_KG=1.20;
     private const ENVIO_GRATIS_DESDE=50.5;
     private float $pesoKg;
        
      public function __construct(String $nombre, $salarioBase , float $pesoKg) {
        $this->$pesoKg= $pesoKg;
        parent()::__construct($nombre, $salarioBase);
     }
     
        public function calcularSalario():float{

        }






    
}