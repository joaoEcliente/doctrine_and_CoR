<?php

namespace App\Controller;

use App\Services\KeyChain;
use Doctrine\ORM\EntityManager;

class UserControl{
    // Dependency Injection
    public function __construct(private EntityManager $entityManager)
    { }

    public function Handler()
    {
        (new KeyChain($this->entityManager))->Handler();
    }
}
