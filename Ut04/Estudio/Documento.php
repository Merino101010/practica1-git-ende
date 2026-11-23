<?php
require_once 'Resumible.php';


abstract class Documento implements Resumible{
    public string $titulo;
    private string $codigo;
    private float $precio;
    private bool $prestado;

    public function __construct(string $titulo, string $codigo, float $precio, bool $prestado)
    {
        $this->titulo=$titulo;
        $this->codigo=$codigo;
        $this->precio=$precio;
        $this->prestado=$prestado;
    }

    public function getCodigo():string{
        return $this->codigo;
    }
    public function getPrecio():float{
        return $this->precio;
    }
    public function estaPrestado():bool{
           return $this->prestado;
    }
    public function marcarPrestado(){
         $this->prestado = true;
    }
    public function marcarDevuelto(){
         $this->prestado = false;
    }

    abstract function tipo():string;


    public function __toString()
    {
        return "[" .$this->tipo() ."]". $this->titulo . " (". $this->getCodigo().")   \n";
    }
}