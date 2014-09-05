<?php

/**
 * Include required files
 */
require_once __DIR__.'/classes/Utils.php';
require_once __DIR__.'/classes/Config.php';
require_once __DIR__.'/classes/Session.php';

/**
 * Load configuration
 */
Config::init(__DIR__.'/../config.ini');
/**
 * Set timezone based on config
 */
if(!date_default_timezone_set(Config::getValue('timezone'))){
	date_default_timezone_set('UTC');
}
/**
 * Initialize session
 */
Session::init();
/**
 * Log the page access
 */
Utils::logAccess();