<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . '/vendor/autoload.php';


$paths = [__DIR__ . '/config/xml'];

$config = ORMSetup::createXMLMetadataConfig(
    paths: $paths,
    isDevMode: true,
);

$config->setProxyDir(__DIR__ . '/proxies');
$config->setProxyNamespace('67bank\Proxies');

$param = [
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => '67bank'
    ];

$connection = DriverManager::getConnection($param, $config);

$entityManager = new EntityManager($connection, $config);
