<?php
abstract class Habitacion{

    protected int $numero;
    protected int $precioNoche;

    public function __construct( int $numero, float $precioNoche) {
        $this->numero=$numero;
        $this->precioNoche=$precioNoche;
    }
    public function getNumero(){
        return $this->numero;
    }


     abstract public function calcularPrecio(int $noches): float ;


     public function describir(){
        echo "numero " .  $this->numero . " precio noche " .  $this->precioNoche;
     }
        
    
}



?>