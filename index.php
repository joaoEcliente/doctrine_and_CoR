<?php

use App\Controller\UserControl;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';

(new UserControl($entityManager))->Handler();
