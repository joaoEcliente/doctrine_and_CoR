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
        // Declara o novo saldo a cada conta
        $dados['conta_origem']->setSaldo($dados['conta_origem']->getSaldo() - $dados['valor']);
        $dados['conta_destino']->setSaldo($dados['conta_destino']->getSaldo() + $dados['valor']);

        // Transação Dados
        $transacao = new Transacao_pix();

        $conn = $this->entityManager->getConnection();
        $conn->beginTransaction();

        try
        {
            $transacao
                ->ContaOrigem($dados['conta_origem'])
                ->ContaDestino($dados['conta_destino'])
                ->setValor($dados['valor'])
            ;

            $this->entityManager->persist($transacao);
            $this->entityManager->flush();

            echo "PIX REALIZADO COM SUCESSO!!\n";

            throw new Exception("Testando Rollback\n");
            $conn->commit();

        } catch (Exception $e) {
            echo "Erro ao realizar transação, tente novamente mais tarde ou entre em contato com o suporte.\n";
            $conn->rollBack();

        }

        return parent::processar($dados);
    }
}
