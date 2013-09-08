<?php

    date_default_timezone_set('Asia/Bangkok');
    
    class HeavyErrorException extends Exception{} 

    class Error {
        
        // 2013-09-06 13:24
        function printException($exception){
            echo 'Sorry, something is wrong. Please try again, or contact us if the problem persists';
            error_log('Unhandled Exception : ' . $exception->getMessage() . ' in file '. $exception->getFile(). ' on line ' . $exception->getLine());
        }  
        // 2013-09-06 13:24
        public static function setClass($class,$name){
            if(!class_exists($class)){
                self::setLogs('Not found Class : '.$name);
                throw new HeavyErrorException ('Not found Class : '.$name);
            }
            return true;
        }
        // 2013-09-06 13:24
        public static function setController($controller,$name){
            if(!file_exists($controller)){
                 self::setLogs('Not found Controller : '.$name);
                 throw new HeavyErrorException ('Not found Controller : '.$name);
                 
            }           
            return true;
        }
        // 2013-09-06 13:24
        public static function setModel($model,$name){
            if(!file_exists($model)){
                 self::setLogs('Not found Model : '.$name);
                 throw new HeavyErrorException ('Not found Model : '.$name);
            }           
            return true;
        }
        // 2013-09-06 13:24
        public static function setFile($file,$name){
            if(!file_exists($file)){
                 self::setLogs('Not found File : '.$name);
                 throw new HeavyErrorException ('Not found File : '.$name);
            }           
            return true;
        }
        // 2013-09-06 13:24
        public static function setLogs($message){
            $log_date = date("d.m.Y");
            $log_path = Router::getDir().'tmp/logs/';
            $log_file_name = $log_date . ".txt";
            $log_file = $log_path.$log_file_name;
                // ตรวจสอบที่อยู่ Path ว่ามีหรือไม่
                if(!file_exists($log_path)) // ถ้าไม่มี Path นี้
                {
                    mkdir($log_path, 0777);
                    chmod($log_path, 0777);
                }
                // ตรวจสอบ File ว่ามีจริงหรือไม่
                if(!file_exists($log_file)) { // ถ้าไม่มีไฟล์อยู่
                    $fp = fopen($log_file, "w"); // "w" เปิดเพื่อเขียนไฟล์อย่างเดียว  
                    fclose($fp);
                    chmod($log_file, 0777);
                }
            $fp = fopen($log_file, "a+"); // "a+" เปิดอ่านและเขียน โดยพอยน์เตอร์จะชี้ไปยังตอนท้ายของไฟล์
            $time = date("Y-m-d H:i:s");
            $log_msg = "\r\n".$time." ".$message;
            $log_msg .= " IP: ".Main::getIPAddress();
            fputs($fp, $log_msg);
            fclose($fp); 
        }

    }
    
?>
