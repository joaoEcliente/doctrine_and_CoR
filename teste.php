<?php

use App\Entity\Contas;
use App\Entity\Transacao_pix;

require_once 'src/Entity/contas.php';
require_once 'src/Entity/transacao_pix.php';
require_once 'bootstrap.php';

$contaOrigem = new Contas();
$contaOrigem->setTitular('João Silva')
            ->setChavePix('joao@email.com')
            ->setSaldo(100000);

$contaDestino = new Contas();
$contaDestino->setTitular('Maria Souza')
             ->setChavePix('maria@email.com')
             ->setSaldo(50000);

$valorTransferencia = 15000;

if ($contaOrigem->getSaldo() >= $valorTransferencia) {
    $contaOrigem->setSaldo($contaOrigem->getSaldo() - $valorTransferencia);
    $contaDestino->setSaldo($contaDestino->getSaldo() + $valorTransferencia);

    $transacao = new Transacao_pix();
    $transacao->setValor($valorTransferencia)
              ->setStatus('T')
              ->setDataPix(new DateTime())
              ->setContaOrigem($contaOrigem)
              ->setContaDestino($contaDestino);

    $entityManager->persist($contaOrigem);
    $entityManager->persist($contaDestino);
    $entityManager->persist($transacao);

    $entityManager->flush();

    echo "Transação realizada com sucesso!\n";
    echo "Novo saldo da origem: R$ " . ($contaOrigem->getSaldo() / 100) . "\n";
    echo "Novo saldo do destino: R$ " . ($contaDestino->getSaldo() / 100) . "\n";

} else {
    echo "Saldo insuficiente para realizar a transação.";
}
