<?php

namespace App\Entity;

class Contas
{
    private ?int $id = null;
    private string $titular;
    private string $chavePix;
    private int $saldo;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(int $id): Contas
    {
        $this->id = $id;
        return $this;
    }

    public function getTitular(): string
    {
        return $this->titular;
    }

    public function setTitular(string $titular)
    {
        $this->titular = $titular;
        return $this;
    }

    public function getChavePix():string
    {
        return $this->chavePix;
    }

    public function setChavePix(string $chavePix)
    {
        $this->chavePix = $chavePix;
        return $this;
    }

    public function getSaldo(): int
    {
        return $this->saldo;
    }

    public function setSaldo(int $saldo)
    {
        $this->saldo = $saldo;
        return $this;
    }

    public function getIdContaTansacao(?Contas $conta)
    {
        $conta->getId();
        return $this;
    }
}
