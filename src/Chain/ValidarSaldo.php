<?php

namespace App\Chain;

class ValidarSaldo extends Handler
{
    public function processar(array $dados): bool
    {
        if (!isset($dados['conta_origem'])) {
            echo "Erro: conta de origem não encontrada.";
            return false;
        }

        $contaOrigem = $dados['conta_origem'];
        $valor = $dados['valor'];

        if ($contaOrigem->getSaldo() < $valor) {
            echo "Erro: saldo insuficiente.";
            return false;
        }

        if ($this->proximo !== null) {
            return $this->proximo->processar($dados);
        }

        return true;
    }
}
