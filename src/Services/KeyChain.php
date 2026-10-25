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

    public function Handler()
    {
        (new ValidarValor())
                ->setProximo((new ValidarContas($this->entityManager)))
                ->setProximo((new ValidarSaldo()))
            ;

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
}
