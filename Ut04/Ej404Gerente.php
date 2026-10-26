<?php

class Gerente extends Empleado{

     private const  PLUS_POR_PERSONA=120.0;
     private const ENVIO_POR_KG=1.20;
     private const ENVIO_GRATIS_DESDE=50.5;
     private float $pesoKg;
     private int $personasACArgo;
        
      public function __construct(String $nombre, $salarioBase , float $pesoKg, int $personasACArgo) {
        $this->pesoKg= $pesoKg;
        $this->personasACArgo = $personasACArgo;
        parent()::__construct($nombre, $salarioBase);
     }
     
        public function calcularSalario():float{
         parent::calcularSalario();
         
         ECHO "Resultado " . $this->personasACArgo*self::PLUS_POR_PERSONA;

        }






    
}