<?php

abstract class Instrumento
{
    protected $nombre;


    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    abstract function tocar(): string;



    function presentar()
    {
        echo "NOmbre: " . $this->nombre . "\n";
        echo "tocar" . $this->tocar() . "\n";
    }
}

class Guitarra extends Instrumento
{
    private $cuerdas;

    #[Override]
    public function __construct($nombre, $cuerdas)
    {
        parent::__construct($nombre);
        $this->cuerdas = $cuerdas;
    }

    #[Override]
    public function tocar(): string
    {
        return "TOcando la guitarra";
    }
}
class Piano extends Instrumento
{
    private $teclas;

    #[Override]
    public function __construct($nombre, $teclas)
    {
        parent::__construct($nombre);
        $this->teclas = $teclas;
    }

    #[Override]
    public function tocar(): string
    {
        return "Tocando el piano";
    }
}
