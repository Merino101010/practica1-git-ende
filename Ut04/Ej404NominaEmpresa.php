<?php



class Empleado
{

    protected String $nombre;
    protected float $salarioBase;


    public function __construct($nombre, $salarioBase) {
        $this->nombre= $nombre;
        $this->salarioBase= $salarioBase;
    }
    
    public function getNombre ():string{
        return $this->nombre;
    }

    public function calcularSalario():float{
        return $this->salarioBase;
    }

    public function __toString():string{

      
       return "clase " . get_class();
    }
}


$hol = new Empleado("A",1);
echo($hol->getNombre());
$hol->__toString();