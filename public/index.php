<?php

/**
 * This is the access point of the entire application.
 * ** NOTE: Modified slim application log and log writer to use 
 * included logger
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */

// Require the composer autoloader //
require '../vendor/autoload.php';

// Instatiate new slim application //
$app = new Slim\Slim();

// Config the slim application //
$app->config(array(
    'log.enabled' => true,
    'log.level' => \Slim\Log::DEBUG,
    'debug' => false,
    'log.writer' => new Slim\LogWriter(fopen(LOGS_DIR . DS . 'log.txt', 'a')),
    'templates.path' => TPL_DIR,
    'view' => new \Slim\Views\Twig()
));

// Set the base url //
$app->hook('slim.before', function() use($app) {
    $url = 'http://localhost/math_app/public';
    $app->view()->appendData(array('baseUrl' => $url));
});

// Require the routes //
require(APP_ROOT . DS . 'Includes' . DS . 'Routes.php');

// Run the application //
$app->run();
