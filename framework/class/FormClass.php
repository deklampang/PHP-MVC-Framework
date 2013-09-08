<?php

    class Form {
        
        // 2013-09-06 17:28
        public static function setCheckEmail($email){
            if(ereg('^[^\.\$_\'\"<>].+[^\.\$_\'\"|[:space:]<>]@[^\.\$_\'\"|[:space:]<>].+\..+[^\.\$_\'\"<>]$', $email)){
                return $email;
            }else{
                return FALSE;
            }
        }
        
        // 2013-09-06 17:11
        public static function setCheckMoblie($moblie){
            if(ereg('([0-9]{3})-([0-9]{3})-([0-9]{4})', $moblie)){
                return $moblie;
            }else{
                return FALSE;
            }
        }
        
        // 2013-09-06 17:08
        public static function setCheckTelephone($telephone){
            if(ereg('([0-9]{2,3})-([0-9]{6})', $telephone)){
                return $telephone;
            }else{
                return FALSE;
            }
        }
        
        // 2013-09-06 13:24
        public static function setCheckDate($date){
            if(ereg('([0-9]{4})-([0-9]{1,2}-([0-9]{1,2}))', $date)){
                return $date;
            }else if(ereg('([0-9]{4})/([0-9]{1,2}/([0-9]{1,2}))', $date)){
                return $date;
            }else{
                return FALSE;
            }
        }
        
        // 2013-09-06 13:24
        public static function getPassFormat($input){
            $salt = '378570bdf03b25c8efa9bfdcfb64f99e';
            $hash = hash_hmac('md5', $input, $salt);
            return SHA1($hash);
        }
        
    }
    
?>
