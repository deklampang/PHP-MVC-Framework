<?php

    session_start();
    
    class Session {
        
        public static $arrSession = array();
        
        // 2013-09-07 14:51
        public static function setCreate($session = array()){
            if(ini_get('register_globals')){
                foreach ($session as $key => $var) {
                     self::$arrSession[$key] = $var;
                     $_SESSION[$key] = $var;
                }  
                return TRUE;
            }else{
                return FALSE;
            }
        }

        // 2013-09-06 22:54
        public static function getSession($sessionName = array()){
            $arr = array();
            if(count($sessionName) === 1){
                return self::$arrSession[$sessionName[0]];
            }else{
                foreach ($sessionName as $value) {
                    foreach (self::$arrSession as $key2 => $value2) {
                        if($key2 === $value){
                            $arr[$key2] = $value2;
                        }
                    }
                }
                if(!empty($arr)){
                   return $arr; 
                }else{
                    return FALSE;
                }
            }
        }

        // 2013-09-06 13:24
        public static function setUnSession($sessionName){
            if(!empty($_SESSION[$sessionName])){
                session_unregister($sessionName);
                self::$arrSession[$sessionName] = array();
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        // 2013-09-06 13:24
        public static function setUnSessionAll(){
            if(!empty($_SESSION)){
                session_destroy();
                self::$arrSession = array();
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
    }
    
?>
