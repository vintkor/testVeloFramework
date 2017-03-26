<?php

/**
 * @param $print
 */
function dd( $print = '' ) {
    echo '<div style="background: rgba(255, 235, 172, 0.2); border: 1px solid rgba(255, 235, 172, 1); padding: 15px; border-radius: 5px; color: darkslategrey; font-size: 14px;">';
        echo '<pre>';
            print_r($print);
        echo '</pre>';
    echo '</div>';
    exit();
}

function sdd( $print = '' ) {
    echo '<div style="background: rgba(255, 89, 86, 0.07); border: 1px solid rgba(255, 89, 86, 1); padding: 15px; border-radius: 5px; color: darkslategrey; font-size: 14px;">';
        echo '<pre>';
            var_dump($print);
        echo '</pre>';
    echo '</div>';
    exit();
}

/**
 * Печатает на экране список всех доступных роутов
 * @return void;
 */
function routeList() {
    require PATH_TO_FRAMEWORK . 'settings.php';
    foreach ($settings['apps'] as $app){
        if( file_exists(PATH_TO_APPS . $app . '/route.php') ){
            $routes[$app] = require PATH_TO_APPS . $app . '/route.php';
        }
    }

    $print = '<pre style="background: #dee;
                          padding: 10px;
                          border-radius: 5px;
                          border: 1px solid #bde3ee;
                          box-shadow: 0 0 10px rgba(0,0,0,.15)"><h2>Route list</h2>';

    $print .= '<ul class="route-list">';
    foreach ( $routes as $key => $value ) {
        $print .= '<li class="route-list__app">';
        $print .= '<h3 class="route-list__app-name">App &rarr; ' . $key . '</h3>';
        $print .= '<ul>';

            foreach ($value as $array) {
                $print .= '<li> Route: ';

                foreach ($array as $key => $string) {
                    $print .= "[ $key &rarr; $string ] &nbsp;&nbsp;&nbsp;";
                }

                $print .= '</li>';
            }

        $print .= '</ul>';
        $print .= '</li>';
    }
    $print .= '</ul></pre>';
    echo $print;
}
