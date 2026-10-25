<?php

namespace App\Controller;

use App\Services\KeyChain;
use Doctrine\ORM\EntityManager;
class UserControl{
    private EntityManager $entityManager;
    
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function Handler()
    {
        (new KeyChain($this->entityManager))->Handler();
    }
}
