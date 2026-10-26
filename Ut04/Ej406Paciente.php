<?php


class Paciente extends Persona{
    private string $numHistoria;
    
    
    public function __construct(string $nombre, string $pellidos, int $anioNacimiento, string $numHistoria) {
        parent()::__construct($nombre, $apellidos, $anioNacimiento);
        $this->numHistoria = $numHistoria;
    }

    public function getNumHistoria():string{
        return $this->numHistoria;
    }

    public function __toString():string{
        return  "Nombre ". $nombre . " apellidos " . $apellidos. " anioNacimiento " .  $anioNacimiento . " numhistoria ". $this->numHistoria. "\n";

    }

}