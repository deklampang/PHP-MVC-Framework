<?php

    class String {
        
        // 2013-09-06 13:24
        public static function getPassFormat($input){
            $salt = '378570bdf03b25c8efa9bfdcfb64f99e';
            $hash = hash_hmac('md5', $input, $salt);
            return SHA1($hash);
        }
        
       
    }
    
?>
