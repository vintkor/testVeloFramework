<?php
/**
 * Created by PhpStorm.
 * User: vintkor
 * Date: 24.03.17
 * Time: 12:21
 */

define('PATH_TO_FRAMEWORK', __DIR__ . '/framework/');
define('PATH_TO_APPS', __DIR__ . '/apps/');

require_once PATH_TO_FRAMEWORK . 'core/helpers_functions.php';

$settings = include PATH_TO_FRAMEWORK . 'settings.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', $settings['debug']);
ini_set('display_startup_errors', $settings['debug']);

require_once PATH_TO_FRAMEWORK . 'core/Base.php';
require_once PATH_TO_FRAMEWORK . 'core/Controller.php';
require_once PATH_TO_FRAMEWORK . 'core/Model.php';
require_once PATH_TO_FRAMEWORK . 'core/View.php';

//dd($settings);

foreach ( $settings['apps'] as $key => $app ) {
    $controller = $app . 'Controller';
    if ( file_exists( PATH_TO_APPS . $app ) && file_exists( PATH_TO_APPS . $app . '/' . $controller . '.php') ) {
        require_once PATH_TO_APPS . $app . '/' . $controller . '.php';
        eval( '$' . $app . ' = new ' . $controller . '();' );
    } else {
        echo 'Application <strong>' . $app . '</strong> - do not exist!</br>';
        continue;
    }
}
