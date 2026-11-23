<?php

require_once 'Renovable.php';
require_once 'Documento.php';
 class Libro extends Documento implements Renovable{

 public string $paginas ;
 
 public function __construct(string $titulo, string $codigo, float $precio, bool $prestado, string $paginas)
 {
    $this->paginas = $paginas;
     parent::__construct($titulo, $codigo, $precio, $prestado);
 }

 #[Override]
 public function tipo(): string
 {
    return  static::class;
 }
 #[Override]
 public function multar(int $dias): int
 {
    return parent::getPrecio() * 0.05 * $dias;
 }

 #[Override]
 public function muestraResumen(): string
 {
    return parent::muestraResumen(). $this->paginas;
 }
 
 

}