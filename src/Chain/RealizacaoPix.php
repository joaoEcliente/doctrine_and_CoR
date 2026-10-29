<?php

namespace App\Chain;

use App\Entity\Transacao_pix;
use Doctrine\ORM\EntityManager;
use Exception;

class RealizacaoPix extends Handler {
    public function __construct(private EntityManager $entityManager)
    { }

    public function processar(?array $dados = null): bool
    {
        // GET os resultodos do array lá
        $conta_origem = $dados['conta_origem'];
        $conta_destino = $dados['conta_destino'];
        $valor = $dados['valor'];

        // calcula o saldo atual de cada conta
        $conta_origem_saldo = $conta_origem->getSaldo() - $valor;
        $conta_destino_saldo = $conta_destino->getSaldo() + $valor;

        // Declara o novo saldo a cada conta
        $conta_origem->setSaldo($conta_origem_saldo);
        $conta_destino->setSaldo($conta_destino_saldo);

        // Transação informações
        $transacao = new Transacao_pix();

        $conn = $this->entityManager->getConnection();
        $conn->beginTransaction();

        try
        {
            $transacao
                ->ContaOrigem($conta_origem)
                ->ContaDestino($conta_destino)
                ->setValor($valor)
            ;

            $this->entityManager->persist($transacao);
            $this->entityManager->flush();

            echo "PIX REALIZADO COM SUCESSO!!";

            $conn->commit();

        } catch (Exception $e) {
            echo 'Erro ao realizar transação, tente novamente mais tarde ou entre em contato com o suporte.';
            $conn->rollBack();

        }

        return parent::processar($dados);
    }
}
