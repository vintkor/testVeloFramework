<?php

/**
 * Class Base
 */
class Bike
{
    
    private $settings;
    
    /**
     * 
     * @param array $settings
     */
    public function __construct(array $settings = [])
    {
        $this->set($settings);
        
        foreach ($this->settings as $app) {
            $controller = $app . 'Controller';
            if (file_exists( PATH_TO_APPS . $app ) and
                file_exists( PATH_TO_APPS . $app . '/' . $controller . '.php')
                ) {
                require_once PATH_TO_APPS . $app . '/' . $controller . '.php';
                $this->initialApps($controller, $app);
                echo 'Application <strong>' . $app . '</strong> is work!</br>';
            } else {
                echo 'Application <strong>' . $app . '</strong> do not exist!</br>';
                continue;
            }
        }
    }

    private function set($settings)
    {
        $this->settings = (array) $settings;
    }
   
    /**
     * 
     * @param type $controller
     * @param type $app
     */
    private function initialApps($controller, $app)
    {
        try {
            eval( '$' . $app . ' = new ' . $controller . '();' );
        } catch (Exception $e) {
            echo $e;
        }
    }
}
