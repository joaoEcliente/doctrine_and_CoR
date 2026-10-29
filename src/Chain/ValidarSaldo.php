<?php

namespace App\Chain;

class ValidarSaldo extends Handler
{
    public function processar(?array $dados = null): bool
    {
        echo "3. Validar Saldo\n";

        if (!isset($dados['conta_origem'])) {
            echo "Erro: conta de origem não encontrada.";
            return false;
        }

        $contaOrigem = $dados['conta_origem'];
        $valor = $dados['valor'];

        if ($contaOrigem->getSaldo() < $valor) {
            echo "Erro: saldo insuficiente.";
            die();
        }

        // var_dump($dados);exit;
        return parent::processar($dados);

    }
}
