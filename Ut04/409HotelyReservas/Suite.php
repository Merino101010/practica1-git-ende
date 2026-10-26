<?php
require 'HabitacionDoble.php';
    class suite extends HabitacionDoble{

        private bool $jacuzzi;
        public function __construct(int $numero, float $precioNoche, bool $jacuzzi, bool $desayunoIncluido) {
            $this->jacuzzi = $jacuzzi;
            parent::__construct($numero, $precioNoche,$desayunoIncluido);
        }


        #[Override]
        function calcularPrecio($noches):float{
            if($this->jacuzzi=true){
                return (parent::calcularPrecio($noches)*1.5)+(25*$noches);
            }else{
                return parent::calcularPrecio($noches)*1.5;
            }
            
        }
    }
?>