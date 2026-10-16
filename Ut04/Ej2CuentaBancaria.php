<?php

declare(strict_types=1);
class BankAccount
{
    public static $tipoCliente = "Estándar";
    public String $owner;
    private float $balance;

    public function __construct(String $owner)
    {
        $this->owner = $owner;
        $this->balance = 0.0;
    }


    public function deposit(float $importe): void
    {



        if ($importe < 0) {
            echo "No se puede ingresar un importe negativo \n";
        } else {
            $this->balance = $this->balance + $importe;
        }
    }


    public function withdraw(float $importe): void
    {


        if ($this->balance - $importe < 0) {
            echo "No puedes retirar mas saldo que el balance total que tienes \n";
        } else {
            $this->balance = $this->balance - $importe;
        }
    }

    public function getBalance(): float
    {

        echo "El balance que tiene en su cuenta es " . $this->balance . "\n";
        return $this->balance;
    }

    function transfer(BankAccount $otra_cuenta, float $importe): void
    {
        if ($importe > 0 && $importe < $this->balance) {
            $this->balance -= $importe;
            $otra_cuenta->deposit($importe);
        } else {
            echo "Operacion no aceptada saldo insuficiente";
        }
    }
    public function __toString(): string
    {
        return "Owner " . $this->owner . " balance " . $this->balance . " tipo cliente " . self::$tipoCliente  . "\n";
    }
}


$miCuenta = new  BankAccount("Alvaro");
$miCuenta->deposit(2500.0);
$miCuenta->withdraw(10.0);
$miCuenta->getBalance();
echo $miCuenta;
