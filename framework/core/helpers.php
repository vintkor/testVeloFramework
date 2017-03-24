<?php

/**
 * @param $print
 */
function dd( $print = '' ) {
    echo '<div style="background: rgba(255, 235, 172, 0.45); border: 1px solid rgba(255, 235, 172, 1); padding: 15px; border-radius: 5px; color: darkslategrey; font-size: 14px;">';
        echo '<pre>';
            print_r($print);
        echo '</pre>';
    echo '</div>';
    exit();
}

function sdd( $print = '' ) {
    echo '<div style="background: rgba(255, 89, 86, 0.45); border: 1px solid rgba(255, 89, 86, 1); padding: 15px; border-radius: 5px; color: darkslategrey; font-size: 14px;">';
        echo '<pre>';
            var_dump($print);
        echo '</pre>';
    echo '</div>';
    exit();
}
