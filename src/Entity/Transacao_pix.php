<?php

namespace App\Entity;

use DateTimeInterface;
use App\Entity\Contas;
use DateTime;

class Transacao_pix
{
    private ?int $id;
    private int $valor;
    private ?Contas $contaOrigem;
    private ?Contas $contaDestino;
    private ?DateTimeInterface $dataPix = null;
    
    public function __construct(
        private string $status = 'T',
    )
    {
        $this->dataPix = new DateTime();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getValor(): int
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

    public function setValor(int $valor)
    {
        $this->valor = $valor;
        return $this;
    }

    public function setStatus(?string $status)
    {
        $this->status = $status;
        return $this;
    }

    public function setDataPix(?DateTimeInterface $dataPix)
    {
        $this->dataPix = $dataPix;
        return $this;
    }

    public function ContaOrigem(?Contas $contaOrigem)
    {
        $this->contaOrigem = $contaOrigem;
        return $this;
    }

    public function ContaDestino(?Contas $contaDestino)
    {
        $this->contaDestino = $contaDestino;
        return $this;
    }

    public function setId(int $id): Transacao_pix
    {
        $this->id = $id;
        return $this;
    }
}
