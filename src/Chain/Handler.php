<?php

namespace App\Chain;

abstract class Handler
{
    protected ?Handler $proximo = null;

    public function setProximo(Handler $proximo): Handler
    {
        $this->proximo = $proximo;

        return $proximo;
    }

    abstract public function processar(array $dados): bool;
}
