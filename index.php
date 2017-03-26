<?php

define('PATH_TO_APPS', __DIR__ . '/apps/');
define('PATH_TO_FRAMEWORK', __DIR__ . '/framework/');

require_once 'framework/core/helpers.php';
require_once 'framework/settings.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', $settings['debug']);
ini_set('display_startup_errors', $settings['debug']);

require_once 'framework/core/Bike.php';

new Bike($settings['apps']);
