
<?php

require_once __DIR__ . '/bootstrap.php';

$classes = [
    'App\Entity\Contas',
    'App\Entity\Transacao_pix'
];

foreach ($classes as $classe) {
    echo "\nTestando: {$classe}\n";

    try {
        $metadata = $entityManager->getClassMetadata($classe);

        echo "Classe carregada: " . $metadata->getName() . "\n";

        foreach ($metadata->getAssociationMappings() as $campo => $associacao) {
            echo "Relacionamento: {$campo}\n";
            echo "Entidade alvo: " . $associacao['targetEntity'] . "\n";
        }
    } catch (\Throwable $e) {
        echo "ERRO: " . $e->getMessage() . "\n";
    }
}
