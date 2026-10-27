<?php



class Empleado
{

    protected String $nombre;
    protected float $salarioBase;


    public function __construct($nombre, $salarioBase)
    {
        $this->nombre = $nombre;
        $this->salarioBase = $salarioBase;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function calcularSalario(): float
    {

        /*TODO BURBUJA*/
        //for($j=0; $j<$tamanoArray-1; $j++){
        //    for($i=0; $i<$tamanoArray-$j; $j++){
        //        if($num[i]<$num[$i+1]){
        //        $aux=$num[$i+1];
        //        $num[$i+1] = num[$i];
        //        $num[$i]=$aux;
        //
        //        }
        //    }
        //}


        return $this->salarioBase;
    }

    public function __toString(): string
    {


        return "clase " . get_class();
    }
}


$hol = new Empleado("A", 1);
echo ($hol->getNombre());
$hol->__toString();
