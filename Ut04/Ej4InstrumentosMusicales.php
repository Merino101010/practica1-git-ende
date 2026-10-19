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


    public function __construct($nombre, $cuerdas)
    {
        parent::__construct($nombre);
        $this->cuerdas = $cuerdas;
    }

    #[Override]
    public function tocar(): string
    {
        echo "TOcando la guitarra \n";
        return "TOcando la guitarra";
    }
}
class Piano extends Instrumento
{
    private $teclas;

    public function __construct($nombre, $teclas)
    {
        parent::__construct($nombre);
        $this->teclas = $teclas;
    }

    #[Override]
    public function tocar(): string
    {
        echo "Tocando el piano \n";
        return "Tocando el piano";
    }
}

$elPiano = new Piano("El piano", 88);
$laGuitarra = new Guitarra("La guitarra", 6);

$array = [$elPiano, $laGuitarra];

foreach ($array as $instrumento) {
    $instrumento->tocar();
}
