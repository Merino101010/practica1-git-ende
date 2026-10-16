<?php
class Vehicle
{

    protected $brand;
    protected $num_wheels;
    private $cv;


    public function __construct($brand, $num_wheels, $cv)
    {
        $this->brand = $brand;
        $this->num_wheels = $num_wheels;
        $this->cv = $cv;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getNwheels(): int
    {
        return $this->num_wheels;
    }
    public function getCv(): string
    {
        return $this->cv;
    }

    public function setBrand(string $value): void
    {
        $this->brand = $value;
    }

    public function setNwheels(int $value): void
    {
        $this->num_wheels = $value;
    }

    public function setCv(string $value): void
    {
        $this->cv = $value;
    }


    public function  MostrarInfo(): void
    {
        echo "Brand " . $this->brand . " Number Wheels " . $this->num_wheels . " Cv " . $this->cv . "\n";
    }
}




class Car extends Vehicle
{
    private $doors;

    #[Override]
    public function __construct($brand, $num_wheels, $cv, $doors)
    {
        parent::__construct($brand, 4, $cv);
        $this->doors = $doors;
    }

    #[Override] //le pongo override porque estoy SobreEscribiendo un metodo de una clase padre que es general
    public function MostrarInfo(): void
    {
        parent::MostrarInfo(); //llamo a la clase padre para que me muestre los atributos generales
        echo "Doors " . $this->doors . "\n";
    }
}

class MotorBike extends Vehicle
{

    #[Override]
    public function __construct($brand, $cv)
    {
        parent::__construct($brand, 2, $cv);
    }
    #[Override]
    public function MostrarInfo(): void
    {
        parent::MostrarInfo();
    }
}


$miCoche = new Car("Toyota", 4, 150, 5);
$miCoche->MostrarInfo();
$miCoche->getCv();
$miMoto = new MotorBike("Yamaha", 95);
$miMoto->mostrarInfo();


$guardar = [$miCoche, $miMoto];
echo "--------------Recorro array desde aqui ----------\n";

foreach ($guardar as $vehiculo) {
    $vehiculo->MostrarInfo();
}

echo "-------------Filtro solo las motos ----------\n"; /*FIltro solo las motos*/
foreach ($guardar as $vehiculo) {
    if ($vehiculo  instanceof MotorBike) {
        $vehiculo->MostrarInfo();
    }
}
