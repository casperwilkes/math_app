<?php

/**
 * This is the access point of the entire application.
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */
// Site Constants //
//Shrinks DIRECTORY_SEPARATOR down to 2 letters to easily manage //
defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);
// Site's root directory //
defined('SITE_ROOT') ? NULL : define('SITE_ROOT', dirname(__DIR__));
// Application root directory //
defined('APP_ROOT') ? NULL : define('APP_ROOT', SITE_ROOT . DS . 'app');
// Model base directory //
defined('PROGRAMS_DIR') ? NULL : define('PROGRAMS_DIR', APP_ROOT . DS . 'class' . DS . 'programs');
// Template directory //
defined('VIEWS_DIR') ? NULL : define('VIEWS_DIR', APP_ROOT . DS . 'views');

// Require the autoloader //
require APP_ROOT . DS . 'includes/autoload.php';

// Call the Router //
$route = new Router();
// Call main controller
$controller = new Main_Controller();
// Send router into main controller //
$controller->load($route);
?>