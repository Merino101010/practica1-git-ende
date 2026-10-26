<?php
require 'Habitacion.php';
 class HabitacionDoble extends  Habitacion{

    private bool $desayunoIncluido;
    public function __construct(int $numero, float $precioNoche, bool $desayunoIncluido ) {
        $this->desayunoIncluido = $desayunoIncluido;
        parent::__construct( $numero, $precioNoche);
    }

    #[Override]
    public function calcularPrecio(int $noches):float {

        if($this->desayunoIncluido = true ){
            return ($noches)*($this->precioNoche+12);
        }else{
            return $noches*$this->precioNoche;
        }
        

    }
}

?>