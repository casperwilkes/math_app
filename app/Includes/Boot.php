<?php

/**
 * This file defines all the site constants  
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */

//Shrinks DIRECTORY_SEPARATOR down to 2 letters to easily manage //
defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);

// Site's root directory //
defined('SITE_ROOT') ? NULL : define('SITE_ROOT', dirname(dirname(dirname(__FILE__))));

// Application root directory //
defined('APP_ROOT') ? NULL : define('APP_ROOT', SITE_ROOT . DS . 'app');

// Logs directory //
defined('LOGS_DIR') ? NULL : define('LOGS_DIR', SITE_ROOT . DS . 'logs');

// Programs base directory //
defined('PROGRAMS_DIR') ? NULL : define('PROGRAMS_DIR', APP_ROOT . DS . 'Programs');

// Template directory //
defined('TPL_DIR') ? NULL : define('TPL_DIR', APP_ROOT . DS . 'Views');
