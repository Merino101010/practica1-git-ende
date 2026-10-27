<?php
class Reserva
{
    private string $cliente;
    private Habitacion $habitacion;
    private DateTimeImmutable $entrada;
    private DateTimeImmutable $salida;

    public function __construct(string $cliente, Habitacion $habitacion, DateTimeImmutable $entrada, DateTimeImmutable $salida)
    {
        $this->cliente = $cliente;
        $this->habitacion = $habitacion;
        $this->entrada = $entrada;
        $this->salida = $salida;
    }

    public function getCliente(): string
    {

        return $this->cliente;
    }

    public function getHabitacion(): Habitacion
    {
        return $this->habitacion;
    }

    public function noches(): int
    {
        $diferencia = $this->entrada->diff($this->salida);

        return  (int)$diferencia;
    }

    public function importe(): float
    {
        return $this->habitacion->calcularPrecio($this->noches());
    }

    public function solapaCon(DateTimeImmutable $entrada, DateTimeImmutable $salida): bool
    {
        //todo
        //entrada menor q salida 
        //salidia menor q entrada 
        //un cliente llega antes q otro sale 
        if ($entrada < $this->salida && $salida > $this->entrada) {
            return true;
        } else {
            return false;
        }
    }
    public function __toString(): string
    {
        return "Cliente " . $this->cliente . " Habitacion " . (string)$this->habitacion . " entrada " . (string)$this->entrada . " salida " . (string)$this->salida . "\n";
    }
}
