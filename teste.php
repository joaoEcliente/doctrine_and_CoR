<?php

use App\Entity\Contas;
use App\Entity\Transacao_pix;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';


$c1 = new Contas();
$c1
    ->setId(1)
    ->setTitular('João')
    ->setSaldo(100)
    ->setChavePix('890')
;

var_dump($c1);

$c2 = new Contas();
$c2
    ->setId(2)
    ->setTitular('Marcos')
    ->setSaldo(0)
    ->setChavePix('1234')
;

var_dump($c2);

$valorPix = 100;

$saldoC1 = $c1->getSaldo() - $valorPix;
$saldoC2 = $c2->getSaldo() + $valorPix;

$c1->setSaldo($saldoC1);
$c2->setSaldo($saldoC2);


$t = new Transacao_pix();
$t
    ->setId(1)
    ->ContaOrigem($c1)
    ->ContaDestino($c2)
    ->setValor(100)
    ->setStatus('T')
;

var_dump($t);
echo "--------------------\n";
echo "saldo do cliente 1: ";
var_dump($c1->getSaldo());
echo "\nSaldo do cliente 2: ";
var_dump($c2->getSaldo());
