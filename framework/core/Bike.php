<?php

class Bike
{
    
    protected 
        $settings,
        $app = false,
        $controller,
        $route,
        $url;

    public function __construct(array $settings = [])
    {
        $this->settings = $settings;
        $this->url = $_SERVER['REQUEST_URI'];
        $this->initApps();        
    }
    
    private function initApps()
    {
        foreach ($this->settings as $app) {
            if( file_exists( PATH_TO_APPS . $app ) and
                file_exists( PATH_TO_APPS . $app . '/' . $app . 'Controller.php' ) and
                file_exists( PATH_TO_APPS . $app . '/route.php' ) ) {
                $this->controller = $app . 'Controller';
                $this->route = require_once PATH_TO_APPS . $app . '/route.php';

                foreach ($this->route as $pattern) {
                    if ($pattern['pattern'] == $this->url) {
                        require_once PATH_TO_APPS . $app . '/' . $this->controller . '.php';
                        $this->app = new $this->controller();
                        $this->app->{$pattern['method']}();
                        break(2);
                    }
                }

            } else {
                $this->error404();
                echo 'Error 404.</br>Страница <strong>' . $_SERVER['HTTP_HOST'] . $this->url . '</strong> не найдена!<br>';
            }
        }
    }
    
    public function error404()
    {
        header("HTTP/1.1 404 Not Found");
    }

}
