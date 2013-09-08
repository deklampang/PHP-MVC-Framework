<?php

    class Main {
        
        public static $_setConn = array();
        
        // 2013-09-06 13:24
        public static function setConnDB(){
            require (Router::getDirClass().'DBClass.php');
            return new DB(self::$_setConn); 
        }
        
        // 2013-09-06 13:24
        public static function setConnNumber(){
            require (Router::getDirClass().'NumberClass.php');
            return new Number();
        }
        
        // 2013-09-06 13:24
        public static function setConnString(){
            require (Router::getDirClass().'StringClass.php');
            return new String();
        }
        
        // 2013-09-06 13:24
        public static function setConnDateTime(){
            require (Router::getDirClass().'DateTimeClass.php');
            return new DateTime(); 
        }
        
        // 2013-09-06 13:24
        public static function setConnSpeedTest(){
            require (Router::getDirClass().'SpeedTestClass.php');
            return new SpeedTest();
        }
        
        // 2013-09-06 13:24
        public static function setConnAPI(){
            require (Router::getDirClass().'APIClass.php');
            return new API();
        }
        
        // 2013-09-06 13:24
        public static function setConnFileDirectory(){
            require (Router::getDirClass().'FileDirectoryClass.php');
            return new FileDirectory();
        }
        
        // 2013-09-06 13:24
        public static function setConnCache(){
            require (Router::getDirClass().'CacheClass.php');
            return new Cache();
        }
        
        // 2013-09-06 13:24
        public static function setConnForm(){
            require (Router::getDirClass().'FormClass.php');
            return new Form();
        }
        
        // 2013-09-06 19:01
        public static function setConnSession(){
            require (Router::getDirClass().'SessionClass.php');
            return new Session();
        }
        
        // 2013-09-06 19:01
        public static function setConnCookies(){
            require (Router::getDirClass().'CookiesClass.php');
            return new Cookies();
        }
        
        // 2013-09-06 13:24
        public static function unregisterGlobals(){
            if(ini_get('register_globals')){
                $array = array('_SESSION','_POST','_GET','_COOKIE','_REQUEST','_SERVER','_ENV','_FILES');
                foreach ($array as $value) {
                    foreach ($GLOBALS[$value] as $key => $var) {
                        if($var === $GLOBALS[$key]){
                            unset($GLOBALS[$key]);
                        }
                    }
                }
            }
        }
        
        // 2013-09-06 13:24
        public static function getIPAddress(){
            // ตรวจสอบ IP กรณีการใช้งาน share internet   
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){  
              $ip=$_SERVER['HTTP_CLIENT_IP'];  
            }else{  
              $ip=$_SERVER['REMOTE_ADDR'];  
            }  
            return $ip;  
        }
        
        // 2013-09-06 13:24
        public static function getBrowser(){
            return $_SERVER["HTTP_USER_AGENT"];  
        }
        
    }
    
?>
