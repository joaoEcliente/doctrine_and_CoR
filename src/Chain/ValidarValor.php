<?php

namespace App\Chain;

class ValidarValor extends Handler
{
    public function processar(?array $dados = null): bool
    {
        echo "1. valida valor.\n";
        if (!isset($dados['valor'])) {
            echo "Erro: valor não informado.";
            return false;
        }

        if (!is_numeric($dados['valor']) || $dados['valor'] <= 0) {
            echo "Erro: o valor do PIX deve ser maior que zero.";
            die();
        }

        return parent::processar($dados);
    }
}
