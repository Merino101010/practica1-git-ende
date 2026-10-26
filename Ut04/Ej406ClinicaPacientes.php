<?php


class persona {
    protected string $nombre;
    protected string $apellidos;
    protected int $anioNacimiento;



    public function __construct(string $nombre ,string $apellidos, int $anioNacimiento) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->anioNacimiento = $anioNacimiento;
    }

    public final function nombreCompleto():string {
         $nombreFinal = $this->nombre . $this->apellido  ;
        return  "Nombre completo: ". $nombreFinal;
    }

    public function edad(int $anioActual):int{
        return $anioActual - $this.anioNacimiento;
    }

    public function __toString():string{
        return  "Nombre ". $nombre . " apellidos " . $apellidos. " anioNacimiento " .  $anioNacimiento . "\n";

    }



}