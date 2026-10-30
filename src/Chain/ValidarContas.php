<?php

namespace App\Chain;

use App\Entity\Contas;
use Doctrine\ORM\EntityManager;

class ValidarContas extends Handler
{
    public function __construct(private EntityManager $entityManager)
    { }

    public function processar(?array $dados = null): bool
    {
        echo "2. Validar contas\n";
        if (!isset($dados['conta_origem']) || !isset($dados['conta_destino'])) {
            echo "Erro: informe as contas de origem e destino.";
            die();
            
        }

        $dados['conta_origem'] = $this->entityManager
                                        ->getRepository(Contas::class)
                                        ->find($dados['conta_origem'])
                                    ;

        $dados['conta_destino'] = $this->entityManager
                                        ->getRepository(Contas::class)
                                        ->find($dados['conta_destino'])
                                    ;

        if (!$dados['conta_origem'] || !$dados['conta_destino']) {
            echo "Erro: conta de origem ou destino não encontrada.";
            die();
        }

        // var_dump($dados);exit;
        return parent::processar($dados);
    }
}
