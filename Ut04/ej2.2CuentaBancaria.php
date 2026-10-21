<?php

declare(strict_types=1);
class BankAccount extends Exception
{
    private string $iban = "";
    public string $tipoCliente = "";
    public string $owner;
    private float $balance;
    private static int $numcuentas = 0;

    public function __construct(string $owner, string $iban)
    {

        $this->iban = $iban;
        $this->tipoCliente = "Estandar";
        $this->owner = $owner;
        $this->balance = 0.0;
        self::$numcuentas++;
    }


    public function deposit(float $importe): void
    {



        if ($importe < 0) {

            //  echo "No se puede ingresar un importe negativo \n";
            new RuntimeException("No se puede ingresar un importe negativo \n", 1);

        } else {
            $this->balance = $this->balance + $importe;
        }
    }


    public function withdraw(float $importe): void
    {


        if ($this->balance - $importe < 0) {
            // echo "No puedes retirar mas saldo que el balance total que tienes \n";
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

    /*TODO GET TOTAL CUENTAS METODO ESTATICO CUENTABANCARIA::GETTOTALCUENTAS*/
    public static function getTotalCuentas(): int
    {
        return self::$numcuentas;
    }




    public function __toString(): string
    {
        return "owner " . $this->owner . " balance " . $this->balance . "iban " . $this->iban . "\n";
    }
}


$cuenta1 = new BankAccount("Alvaro", "1");
$cuenta2 = new BankAccount("Jorge", "2");
$cuenta1->deposit(2500.0);
$cuenta1->withdraw(10000.0);
$cuenta1->getBalance();

/*TODO TRY CATCH TRES ERRORES RETIRAR 50E INGRESAR 20E INTENTAR CUENTA1 SALDO 10000000*/
try {
    $cuenta1->withdraw(10000.0);
} catch (InvalidArgumentException $ret) {
    echo $ret->getMessage();

}
echo "total cuentas " . BankAccount::getTotalCuentas();
?>