<?php

namespace App\Chain;

class ValidarValor extends Handler
{
    public function processar(array $dados): bool
    {
        if (!isset($dados['valor'])) {
            echo "Erro: valor não informado.";
            return false;
        }

        if (!is_numeric($dados['valor']) || $dados['valor'] <= 0) {
            echo "Erro: o valor do PIX deve ser maior que zero.";
            return false;
        }

        if ($this->proximo !== null) {
            return $this->proximo->processar($dados);
        }

        return true;
    }
}
