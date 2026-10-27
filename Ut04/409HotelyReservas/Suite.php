<?php
require 'HabitacionDoble.php';
class suite extends HabitacionDoble
{

    private bool $jacuzzi;
    public function __construct(int $numero, float $precioNoche,  bool $desayunoIncluido, bool $jacuzzi)
    {
        $this->jacuzzi = $jacuzzi;
        parent::__construct($numero, $precioNoche, $desayunoIncluido);
    }


    #[Override]
    function calcularPrecio(int $noches): float
    {
        if ($this->jacuzzi) {
            return (parent::calcularPrecio($noches) * 1.5) + (25 * $noches);
        } else {
            return parent::calcularPrecio($noches) * 1.5;
        }
    }
}
