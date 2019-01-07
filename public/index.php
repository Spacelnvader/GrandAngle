<?php

use Symfony\Component\Dotenv\Dotenv;

session_start();

require __DIR__ . '/../vendor/autoload.php';

// Load dotenv file
$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');

$app = new \Slim\App(require __DIR__ . '/../config/settings.php');

// Load dependencies
require __DIR__ . '/../config/container.php';

// Load middleware for all routes
$app->add($container->get('csrf'));

// Load routes
require __DIR__ . '/../config/routes.php';

$app->run();