<?php
class coche
{

    public $marca;
    public $modelo;
    public $velocidad;


    public function __construct($marca, $modelo)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = 0;
    }


    public function acelerar($cantidad)
    {
        $this->velocidad = $this->velocidad + $cantidad;
    }
    public function frenar($cantidad)
    {
        $this->velocidad = $this->velocidad - $cantidad;
    }

    public function mostrarInfo()
    {
        echo " marca " . $this->marca . " modelo " . $this->modelo . " velocidad " . $this->velocidad . "\n";
    }
}
// 1. Creación del objeto 
$miCoche = new coche("Toyota", "Yaris");

// 2. Mostrar estado inicial
echo "--- Estado Inicial ---<br>\n";
$miCoche->mostrarInfo();

// 3. Realizar acciones (Acelerar y Frenar)
echo "<br>--- Acelerando 50 km/h ---<br>\n";
$miCoche->acelerar(50);
$miCoche->mostrarInfo();

echo "<br>--- Acelerando otros 30 km/h ---<br>\n";
$miCoche->acelerar(30);
$miCoche->mostrarInfo();

echo "<br>--- Frenando 20 km/h ---<br>\n";
$miCoche->frenar(20);
$miCoche->mostrarInfo();
