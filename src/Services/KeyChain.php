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
    }
}
