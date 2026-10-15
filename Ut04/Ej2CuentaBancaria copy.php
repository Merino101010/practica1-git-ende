<?php


//declare(strict_types=1);
require 'Ej2CuentaBancaria.php';

$miCuenta = new  BankAccount("Ana");
$miCuenta->deposit(25.0);
$miCuenta->withdraw(30.0);
$miCuenta->withdraw(20.0);
$miCuenta->getBalance();
echo $miCuenta;
