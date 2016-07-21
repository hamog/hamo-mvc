<?php
/**
 * Extend include path to core/main directory
 */
set_include_path(get_include_path(). PATH_SEPARATOR . 'core/main');

/**
 * Auto Loader function
 * 
 * @param string $class Class name
 */
function Autoload($class){
    require_once strtolower($class). '.php';
}
spl_autoload_register('Autoload');

/**
 * Set timezone 
 */
$timezone_identifier = Loader::load('Configs');
date_default_timezone_set($timezone_identifier->timezone);

/**
 * Error Reporting
 * Debug mode = E_ALL
 * Production mode = 0
 */
error_reporting(E_ALL);
ini_set('display_errors', 'On');

