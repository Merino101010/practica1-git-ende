<?php


class Producto{
    public int $id;
    public string $nombre;
    public string $precio ;
    public string $stock ;


    public function __construct(int $id, string $nombre, string $precio, string $stock)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;

    }

    function valorStock():float{
        return $this->precio*$this->stock;
    }
    
    function estaAgotado():bool{
        if($this->stock==='0'){
            return true;
        }
        return false;
    }
}