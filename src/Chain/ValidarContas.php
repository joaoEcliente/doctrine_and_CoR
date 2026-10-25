<?php

namespace App\Chain;

use App\Entity\Contas;
use Doctrine\ORM\EntityManagerInterface;

class ValidarContas extends Handler
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) { }

    public function processar(array $dados): bool
    {
        if (!isset($dados['conta_origem']) || !isset($dados['conta_destino'])) {
            echo "Erro: informe as contas de origem e destino.";
            return false;
        }

        $contaOrigem = $this->entityManager
                                ->getRepository(Contas::class)
                                ->find($dados['conta_origem'])
                            ;

        $contaDestino = $this->entityManager
                                ->getRepository(Contas::class)
                                ->find($dados['conta_destino'])
                            ;

        if (!$contaOrigem || !$contaDestino) {
            echo "Erro: conta de origem ou destino não encontrada.";
            return false;
        }

        $dados['conta_origem'] = $contaOrigem;
        $dados['conta_destino'] = $contaDestino;
        if ($this->proximo !== null) {
            return $this->proximo->processar($dados);
        }

        return true;
    }
}
