<?php

    class Cookies {
        
        private static $arrCookies = array();

        // 2013-09-07 23:10
        public static function setCreate($cookies,$time = 0){
            if(ini_get('register_globals')){
                if($time !== 0){
                    $time = $time * 60;
                    foreach ($cookies as $key => $var) {
                         self::$arrCookies[$key] = $var;
                         setcookie($key,$var,time()+$time);
                    }  
                    return TRUE;
                }else{
                    foreach ($cookies as $key => $var) {
                         self::$arrCookies[$key] = $var;
                         setcookie($key,$var);
                    }
                    return FALSE;
                }
                
            }else{
                return FALSE;
            }
        }
        
        // 2013-09-07 23:38
        public static function getCookies($cookies){
            $arr = array();
            if(count($cookies) === 1){
                return self::$arrCookies[$cookies[0]];
            }else{
                 foreach ($cookies as $value) {
                    foreach (self::$arrCookies as $key2 => $value2) {
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
        
        // 2013-09-07 23:35
        public static function setUnCookies($cookiesName){
            if(!empty($cookiesName)){
                setcookie($cookiesName);
                unset(self::$arrCookies[$sessionName]);
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        // 2013-09-07 23:53
        public static function setUnCookiesAll(){
            if(!empty($_COOKIE)){
                foreach ($_COOKIE as $key => $value) {
                    setcookie($key);
                }
                self::$arrCookies = array();
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
    }
    
?>
