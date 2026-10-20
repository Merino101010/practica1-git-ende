<?php

declare(strict_types=1);
class BankAccount extends Exception
{
    public static $tipoCliente = "Estándar";
    public string $owner;
    private float $balance;

    public function __construct(string $owner)
    {
        $this->owner = $owner;
        $this->balance = 0.0;
    }


    public function deposit(float $importe): void
    {



        if ($importe < 0) {

            echo "No se puede ingresar un importe negativo \n";
            RuntimeException("No se puede ingresar un importe negativo \n", 1);

        } else {
            $this->balance = $this->balance + $importe;
        }
    }


    public function withdraw(float $importe): void
    {


        if ($this->balance - $importe < 0) {
            echo "No puedes retirar mas saldo que el balance total que tienes \n";
            new InvalidArgumentException("No se puede ingresar un importe negativo \n", 1);
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
        return "Owner " . $this->owner . " balance " . $this->balance . " tipo cliente " . self::$tipoCliente . "\n";
    }
}


$miCuenta = new BankAccount("Alvaro");
$miCuenta->deposit(2500.0);
$miCuenta->withdraw(10000.0);
$miCuenta->getBalance();
echo $miCuenta;
?>