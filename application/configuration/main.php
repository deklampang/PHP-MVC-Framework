<?php
    
    error_reporting(E_ALL);
    
    class Loader {
        
        public function __construct() {
            require 'framework/class/RouterClass.php';
            require 'framework/class/BaseController.php';
        }
        
        public static function CreateController(){
            
             $main = array(
                'router' => array(
                    'site' => 'framework'),
                'connDB' => array(
                    'host' => 'localhost',
                    'dbname' => 'db_bcampro',
                    'user' => 'root',
                    'pass' => '1234'
                )
            );
            
            new Router($main['router']);
            require (Router::getDirClass() . 'ErrorClass.php');
            
            $getUri = Router::getUrl();
            $target = Router::getDirController() . $getUri['controller'].'Controller.php';
            
            try {
                Error::setController($target,$getUri['controller'].'Controller');
                require ($target);     
                $class = $getUri['controller'] . '_Controller';
                try {
                    Error::setClass($class,$getUri['controller'].'_Class');
                    $Controller = new $class;  
                    require (Router::getDirClass() . 'MainClass.php');
                    Main::$_setConn = $main['connDB'];
                    Main::setConnSpeedTest();
                    SpeedTest::setTimeStart();
                    $Controller->main($getUri);
                    SpeedTest::setTimeStop();
                    echo SpeedTest::getTimeFooter();
                } catch (HeavyErrorException $e) {
                    echo $e->getMessage();
                } 

            } catch (HeavyErrorException $e) {
                echo $e->getMessage();
            }
        }
  
    }

    function __autoload($className) {
        list($filename , $suffix) = split('_' , $className);
        $file = Router::getDirModel() . $filename . 'Model.php';
        try {
            Error::setModel($file,$filename.'_Class');
            require_once ($file); 
        } catch (HeavyErrorException $e) {
            echo $e->getMessage();
        } 
        
    }
    
?>
