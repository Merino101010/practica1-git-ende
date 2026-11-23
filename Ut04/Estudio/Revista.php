<?php
require_once 'Documento.php';

    class Revista extends Documento{

    public int $numero;
    public function __construct(string $titulo, string $codigo, float $precio, bool $prestado, int $numero)
    {   

        $this->numero = $numero;
        parent::__construct($titulo, $codigo, $precio, $prestado);
    }



    #[Override]
    public function tipo(): string
    {
        return static::class;
    }

    #[Override]
    public function muestraResumen(): string
    {
        return parent::muestraResumen() . $this->numero;
    }
    }