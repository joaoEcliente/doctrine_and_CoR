<?php

namespace App\Services;

use App\Chain\ValidarContas;
use App\Chain\ValidarSaldo;
use App\Chain\ValidarValor;
use Doctrine\ORM\EntityManager;

class KeyChain{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function KeyChan()
    {
        (new ValidarValor())
                ->setProximo((new ValidarContas($this->entityManager)))
                ->setProximo((new ValidarSaldo()))
            ;

        $dados = [];

        if ($validarValor->processar($dados)) {
            echo "Todas as validações passaram!";
        } else {
            echo "Transferência bloqueada!";
        }
}
