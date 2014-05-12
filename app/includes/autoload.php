<?php

/**
 * This file is for loading classes needed throughout the application. 
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */

/**
 * Lazy loader for loading classes. 
 * @param string $class_name The class to be loaded.
 */
function autoload($class_name) {
    // Splits class name by '_' //
    $loader = array();
    @list($loader['file_name'], $loader['suffix']) = explode('_', $class_name, 2);

    switch ($loader['suffix']) {
        case('math'):
        case('Math'):
            $dir = 'programs' . DS;
            break;
        case('controller'):
        case('Controller'):
            $dir = 'controllers' . DS;
            break;
        default:
            $dir = '';
    }

    $file_path = APP_ROOT . DS . 'class' . DS . $dir . strtolower($loader['file_name']) . '.php';

    if (file_exists($file_path)) {
        require $file_path;
    } else {
        die('The requested path could not be loaded.');
    }
}

// Register the autoloader //
spl_autoload_register("autoload");
?>