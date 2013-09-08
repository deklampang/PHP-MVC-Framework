<?php

    class SpeedTest {
           
        public static $_speetTest = array();
        
        // 2013-09-06 13:24
        public static function setTimeStart(){
            self::$_speetTest['start'] = microtime(true);
        }
        // 2013-09-06 13:24
        public static function setTimeStop(){
            self::$_speetTest['stop'] = microtime(true) ;
            self::$_speetTest['get'] = self::$_speetTest['stop'] - self::$_speetTest['start'];
        }
        // 2013-09-06 13:24
        public static function getTime(){
            return 'หน้านี้ใช้เวลา LOAD ทั้งสิ้น '.number_format(self::$_speetTest['get'],5).' วินาที !';
        }
        // 2013-09-06 13:24
        public static function getTimeFooter(){
            return '<br /><br /><hr> <p align="center">หน้านี้ใช้เวลา LOAD ทั้งสิ้น '.number_format(self::$_speetTest['get'],5).' วินาที !</p> <br />';
        }
        
    }
    
?>
