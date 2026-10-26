<?php 
require 'Habitacion.php';
class habitacionIndividual extends Habitacion{

    public function __construct(int $numero, float $precioNoche) {
        parent::__construct($numero, $precioNoche);
    }

    #[Override]
    public function calcularPrecio(int $noches): float{
        return $noches*$this->precioNoche;
    }
     
}
?>