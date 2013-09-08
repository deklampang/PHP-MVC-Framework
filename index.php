<?php
    //$ pecl install apc;

    header('Content-Type: text/html; charset=utf-8');
    
    define('APP_PATH',dirname(__FILE__).'/');
    
    $config = 'application/configuration/main.php'; 
    require_once ($config);
    
    $loader = new Loader();
    $loader->CreateController();
 
?>  
