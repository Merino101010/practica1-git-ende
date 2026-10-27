<?php
class Hotel
{
    private string $nombre;
    private  array $habitaciones;
    private  array $reservas;
    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
        $this->habitaciones = [];
        $this->reservas = [];
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function agregarHabitacion(Habitacion $habitacion): void
    {
        //$this->habitaciones[] = $habitacion;
        array_push($this->habitaciones, $habitacion);
    }

    public function reservar(string $cliente, int $numHabitacion, DateTimeImmutable $entrada, DateTimeImmutable $salida): Reserva
    {
        $numero = 0;
        foreach ($this->habitaciones as $habitacion) {

            $numero = $habitacion->getNumero();
            if ($numero == $numHabitacion) {
                echo "Esa reserva ya existe busque otro numero de habitacion";
                throw new Exception("Esa reserva ya existe busque otro numero de habitacion");
            } else {
                foreach ($this->reservas as $reserva) {


                    array_push($this->reservas, new Reserva($cliente, $habitacion, $entrada, $salida));
                    return  new Reserva($cliente, $habitacion, $entrada, $salida);
                }
            }
        }
        throw new Exception("Esa reserva ya existe busque otro numero de habitacion");
    }

    public function ingresosPrevistos(): float {}

    public function reservasDe(string $cliente): Reserva {}
}
