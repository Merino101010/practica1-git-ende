<?php

class Gerente extends Empleado{

     private const  PRECIO_HORA=22.5;
     private int $horasExtra;
        
      public function __construct(String $nombre, $salarioBase , int $horasExtra) {
        $this->$horasExtra= $horasExtra;
        parent()::__construct($nombre, $salarioBase);
     }
     
        public function calcularSalario():float{
                
            return parent::calcularSalario()*self::PRECIO_HORA*$this->horasExtra;
        }






    
}