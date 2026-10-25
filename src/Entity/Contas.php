<?php

namespace App\Entity;

class Contas
{
    private ?string $id = null;
    private string $titular;
    private string $chavePix;
    private int $saldo;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitular(): ?string
    {
        return $this->titular;
    }

    public function setTitular(string $titular): self
    {
        $this->titular = $titular;
        return $this;
    }

    public function getChavePix():string
    {
        return $this->chavePix;
    }

    public function setChavePix(?string $chavePix): self
    {
        $this->chavePix = $chavePix;
        return $this;
    }

    public function getSaldo(): ?int
    {
        return $this->saldo;
    }

    public function setSaldo(?int $saldo): self
    {
        $this->saldo = $saldo;
        return $this;
    }
}
