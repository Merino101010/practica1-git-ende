<?php
require_once 'Resumible.php';
require_once 'Documento.php';

class Socio implements Resumible
{
    private int $id;
    private string $nombre;
    private int $cupo;
    private array $prestamos = [];      // clave = código del documento

    public function __construct(int $id, string $nombre, int $cupo = 2)
    {
        $this->id = $id;
        $this->nombre=$nombre;
        $this->cupo = $cupo;
        
    }

    public function getNombre(): string { 
        return $this->nombre;
     }
    public function numPrestamos(): int { 

        return count($this->prestamos);
     }

    public function prestar(Documento $documento): void
    {
        try{
            if(!isset($documento)){
            throw new Exception( "Ya tiene ese documento");
        }else{
            if(count($this->prestamos)>=$this->cupo){
                throw new Exception("Max de cupos");
            }elseif($documento->estaPrestado()){
                throw new Exception("documento ya prestado");
            }else{
                $documento->marcarPrestado();
                $codigoDocumento = $documento->getCodigo();
                $this->prestamos[$codigoDocumento] = $documento;
            }
        }
        }catch(Exception $e ){
            $e->getMessage();
        }
        
        // 1.º  ¿ya lo tiene?            -> isset(...) y throw new Exception(...)
        // 2.º  ¿ha llegado a su cupo?   -> count(...) >= cupo y throw
        // 3.º  ¿lo tiene otro socio?    -> $documento->estaPrestado() y throw
        // SOLO si pasan las tres:
        //      $documento->marcarPrestado();
        //      guardarlo en el array con su código como clave
    }

    public function devolver(int $codigo): void
    {
        try{
            if(isset($this->prestamos[$codigo])){
            $this->prestamos[$codigo]->marcarDevuelto();
            }else{
            throw new Exception("Codigo no existe");
            }
        }catch(Exception $e ){
            $e->getMessage();
        }
        
        
        // si NO está en el array (isset) -> throw
        // si está: marcarDevuelto() sobre ese objeto y unset(...)
    }

    public function muestraResumen(): string { 
        return  $this->nombre . " cupo " .  $this->cupo . " prestamos " . $this->numPrestamos() . "\n";
     }
}