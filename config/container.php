<?php

$container = $app->getContainer();

// Load Database as global
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Twig
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig($container['settings']['view']['template_path'], [
        'cache' => $container['settings']['view']['cache_path']
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));
    $view->getEnvironment()->addGlobal('session', $_SESSION);
    return $view;
};

// Flash Messages
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

//log system
$container['logger'] = function($container) {
	$logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler($container['settings']['logger']['path']);
    $logger->pushHandler($file_handler);
    return $logger;
};

// CSRF Protection
$container['csrf'] = function($container) {
    return new \Slim\Csrf\Guard;
};

// SwiftMailer
$container['mail'] = function($container) {
    $transport = (new Swift_SmtpTransport($container['settings']['mailer']['host'], $container['settings']['mailer']['port']))
        ->setUsername($container['settings']['mailer']['username'])
        ->setPassword($container['settings']['mailer']['password'])
    ;

    $mailer = new Swift_Mailer($transport);
    return $mailer;
};
