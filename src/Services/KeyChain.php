<?php

namespace App\Services;

use App\Chain\RealizacaoPix;
use App\Chain\ValidarContas;
use App\Chain\ValidarSaldo;
use App\Chain\ValidarValor;
use Doctrine\ORM\EntityManager;

class KeyChain {
    public function __construct(private EntityManager $entityManager)
    { }

    public function Handler()
    {
        $dados = [
                  'valor' => 100,
                  'conta_origem' => 1,
                  'conta_destino' => 2
                 ];
        $chain =  new ValidarValor();
        $chain
            ->setProximo((new ValidarContas($this->entityManager)))
            ->setProximo((new ValidarSaldo()))
            ->setProximo((new RealizacaoPix($this->entityManager)))
        ;

        $chain->processar($dados);

}

}
