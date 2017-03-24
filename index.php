<?php
/**
 * Created by PhpStorm.
 * User: vintkor
 * Date: 24.03.17
 * Time: 12:21
 */

define('PATH_TO_APPS', __DIR__ . '/apps/');

require_once 'framework/core/helpers.php';

$settings = include 'framework/settings.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', $settings['debug']);
ini_set('display_startup_errors', $settings['debug']);

require_once 'framework/core/Bike.php';


foreach ( $settings['apps'] as $key => $app ) {
    $controller = $app . 'Controller';
    if ( file_exists( PATH_TO_APPS . $app ) && file_exists( PATH_TO_APPS . $app . '/' . $controller . '.php') ) {
        require_once PATH_TO_APPS . $app . '/' . $controller . '.php';
        try {
            eval( '$' . $app . ' = new ' . $controller . '();' );
        } catch (Exception $e) {
            echo $e;
        }
    } else {
        echo 'Application <strong>' . $app . '</strong> - do not exist!</br>';
        continue;
    }
}
