<?php

require_once __DIR__ . '/bootstrap.php';

use App\Chain\ValidarValor;
use App\Chain\ValidarContas;
use App\Chain\ValidarSaldo;

$validarValor = new ValidarValor();
$validarContas = new ValidarContas($entityManager);
$validarSaldo = new ValidarSaldo();

$validarValor->setProximo($validarContas);
$validarContas->setProximo($validarSaldo);

$dados = [
    'valor' => 50000,
    'conta_origem' => 1,
    'conta_destino' => 2
];

if ($validarValor->processar($dados)) {
    echo "Todas as validações passaram!";
} else {
    echo "Transferência bloqueada!";
}
