<?php
class Hotel{
    private string $nombre;
    private   $habitaciones;
    private   $reservas ;
    public function __construct(string $nombre){
        $this->nombre = $nombre;
        $this->habitaciones = [];
        $this->reservas = [];
    }

    public function getNombre():string {
        return $this->nombre;
    }

    public function agregarHabitacion(Habitacion $habitacion){
        $this->habitaciones = $habitacion;

    }

    public function reservar(string $cliente , int $numHabitacion, DateTimeImmutable $entrada, DateTimeImmutable $salida):Reserva{
        $numero = 0;
        foreach($this->habitaciones as $habitacion){
            if($habitacion instanceof Habitacion){
                $numero = $habitacion->getNumero();
                if($numero==$numHabitacion){
                    foreach($this->reservas as $reserva){
                        if($reserva instanceof Reserva){
                            if($reserva->getHabitacion()==$habitacion){
                                echo "Esa reserva ya existe busque otro numero de habitacion";
                                break;

                            }else{
                                array_push($this->reservas , new Reserva($cliente, $habitacion,$entrada,$salida)) ;
                                return  new Reserva($cliente, $habitacion,$entrada,$salida);
                                
                            }
                        }


                    }
                    
                }
                
            }
                
            
        
        }
         

    }

    public function ingresosPrevistos():float{
        

    }

    public function reservasDe(string $cliente):Reserva{

    }


}


?>