<?php

class Transacao_pix{
    private ?int $id;
    private ?int $valor;
    private ?string $status;
    private ?DateTimeInterface $dataPix;

    private ?Contas $contaOrigem;
    private ?Contas $contaDestino;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValor(): ?int
    {
        return $this->valor;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getDataPix(): ?DateTimeInterface
    {
        return $this->dataPix;
    }

    public function getContaOrigem(): ?Contas
    {
        return $this->contaOrigem;
    }

    public function getContaDestino(): ?Contas
    {
        return $this->contaDestino;
    }

    public function setValor(int $valor): self
    {
        $this->valor = $valor;
        return $this;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function setDataPix(?DateTimeInterface $dataPix): self
    {
        $this->dataPix = $dataPix;
        return $this;
    }

    public function setContaOrigem(?Contas $contaOrigem): self
    {
        $this->contaOrigem = $contaOrigem;
        return $this;
    }

    public function setContaDestino(?Contas $contaDestino): self
    {
        $this->contaDestino = $contaDestino;
        return $this;
    }
}
