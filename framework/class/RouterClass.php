<?php

class Router {
       
    public static $_setDir = array();

    // 2013-09-06 13:24
    public function __construct($dir) {
        self::$_setDir = $dir;
    }
    // 2013-09-06 13:24
    public static function getUrl() {
        
        $setURL = array('controller','action','id','value');
        $dir = str_replace('\\', '/',APP_PATH);
        $url = str_replace($dir,'', $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']);
        
        if(empty($url)){
           $uri['controller'] = 'Main';
        }else{
            $expUri = explode("/", $url);  
            foreach ($expUri as $key => $value) {
                if(!empty($value)){
                    $uri[$setURL[$key]] = ucfirst(strtolower($value));
                    unset($uri[$key]);
                }else{
                    unset($uri[$key]);
                }
            }
        }

        return $uri;
    }
    // 2013-09-06 13:24
    public static function getPath(){
        return "http://".$_SERVER['SERVER_NAME'].str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', APP_PATH));
    }
    // 2013-09-06 13:24
    public static function getDir(){       
        return str_replace('\\', '/',APP_PATH);
    }
    // 2013-09-06 13:24
    public static function getDirFiles(){       
        return str_replace('\\', '/',APP_PATH.'files/');
    }
    // 2013-09-06 13:24
    public static function getDirController(){
        return str_replace('\\', '/',APP_PATH.'application/controllers/');
    }
    // 2013-09-06 13:24
    public static function getDirModel(){
        return str_replace('\\', '/',APP_PATH.'application/models/');
    }
    // 2013-09-06 13:24
    public static function getDirView(){      
        return str_replace('\\', '/',APP_PATH.'application/views/');
    }
    // 2013-09-06 13:24
    public static function getDirImage(){    
        return str_replace('\\', '/',APP_PATH.'public/images/');
    }
    // 2013-09-06 13:24
    public static function getDirStyle(){         
        return str_replace('\\', '/',APP_PATH.'public/styles/');
    }
    // 2013-09-06 13:24
    public static function getDirScript(){      
        return str_replace('\\', '/',APP_PATH.'public/scripts/');
    }
    // 2013-09-06 13:24
    public static function getDirClass(){
        return str_replace('\\', '/',APP_PATH.'framework/class/');
    }
    // 2013-09-06 13:24
    public static function getDirException(){       
        return str_replace('\\', '/',APP_PATH.'framework/exceptions/');
    }
    // 2013-09-06 13:24
     public static function getDirLibraries(){       
        return str_replace('\\', '/',APP_PATH.'application/libraries/');
    }
    // 2013-09-06 13:24
    public static function getServerName(){
        return $_SERVER['SERVER_NAME'];
    }
    // 2013-09-06 13:24
    public static function getRoot(){
        return $_SERVER['DOCUMENT_ROOT'];
    }
    // 2013-09-06 13:24
    public static function getSite(){
        return self::$_setDir['site'];
    }
    // 2013-09-06 13:24
    public static function getDirConfig(){        
        return str_replace('\\', '/',APP_PATH.'application/configuration/');
    }
    
    // 2013-09-06 19:30
    public static function getDirSession(){        
        return str_replace('\\', '/',APP_PATH.'tmp/sessions/');
    }
    
    // 2013-09-06 19:30
    public static function getDirLogs(){        
        return str_replace('\\', '/',APP_PATH.'tmp/logs/');
    }
    
    // 2013-09-06 19:30
    public static function getDirCache(){        
        return str_replace('\\', '/',APP_PATH.'tmp/cache/');
    }
    
}
    
?>
