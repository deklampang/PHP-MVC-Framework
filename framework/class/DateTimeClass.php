<?php

    class DateTimes {
        
        private static $ThaiDay = array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
        private static $ThaiTime = array('วินาที','นาที','ชั่วโมง');
        private static $ThaiMonth = array("0"=>"","01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน", "07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
   
        // 2013-09-06 13:24
        public static function setCheckDate($date){
            if(ereg('([0-9]{4})-([0-9]{1,2}-([0-9]{1,2}))', $date)){
                return $date;
            }else if(ereg('([0-9]{4})/([0-9]{1,2}/([0-9]{1,2}))', $date)){
                return $date;
            }else{
                return FALSE;
            }
        }  // 2013-09-06 13:10
        // 2013-09-06 13:24
        public static function getDateTimeNow(){
            return date('Y-m-d H:i:s',time());
        }
        // 2013-09-06 13:24
        public static function getDateNow(){
            return date('Y-m-d',time());
        }
        // 2013-09-06 13:24
        public static function getTimeNow(){
            return date('H:i:s',time());
        }
        // 2013-09-06 13:24
        public static function getThaiDateTimeNow(){
            $time=strtotime(date('Y-m-d H:i:s',time())); 
            $val1 = self::$ThaiDay[date('w',$time)];
            $val2 = self::$ThaiMonth[date('m',$time)]; 
            $thai_date_return = $val1;
            $thai_date_return .= 'ที่ '.date('d',$time);
            $thai_date_return .= ' '.$val2;
            $thai_date_return .= ' พ.ศ. '.(date('Y',$time)+543);
            $thai_date_return .= ' เวลา '.date('H:i:s',$time).' น.';
            return $thai_date_return;
        }
        // 2013-09-06 13:24
        public static function getThaiDateNow(){
            $time=strtotime(date('Y-m-d H:i:s',time())); 
            $val1 = self::$ThaiDay[date('w',$time)];
            $val2 = self::$ThaiMonth[date('m',$time)]; 
            $thai_date_return = $val1;
            $thai_date_return .= 'ที่ '.date('d',$time);
            $thai_date_return .= ' '.$val2;
            $thai_date_return .= ' พ.ศ. '.(date('Y',$time)+543);
            return $thai_date_return;
        }
        // 2013-09-06 13:24
        public static function getThaiTimeNow(){
            $time=strtotime(date('Y-m-d H:i:s',time())); 
            $thai_date_return =  date('G',$time).' นาฬิกา '. abs(date('i',$time)).' นาที ' . abs(date('s',$time)) . ' วินาที';
            return $thai_date_return;
        }
        // 2013-09-06 13:24
        public static function getThaiDateTime($input){
            $time=strtotime($input); 
            $val1 = self::$ThaiDay[date('w',$time)];
            $val2 = self::$ThaiMonth[date('m',$time)]; 
            $thai_date_return = $val1;
            $thai_date_return .= 'ที่ '.date('d',$time);
            $thai_date_return .= ' '.$val2;
            $thai_date_return .= ' พ.ศ. '.(date('Y',$time)+543);
            $thai_date_return .= ' เวลา '.date('H:i:s',$time).' น.';
            return $thai_date_return;
        }
        // 2013-09-06 13:24
        public static function getThaiDate($input){
            $time=strtotime($input); 
            $val1 = self::$ThaiDay[date('w',$time)];
            $val2 = self::$ThaiMonth[date('m',$time)]; 
            $thai_date_return = $val1;
            $thai_date_return .= 'ที่ '.date('d',$time);
            $thai_date_return .= ' '.$val2;
            $thai_date_return .= ' พ.ศ. '.(date('Y',$time)+543);
            return $thai_date_return;
        }
        // 2013-09-06 13:24
        public static function getThaiTime($input){
            $time=strtotime($input); 
            $thai_date_return =  date('G',$time).' นาฬิกา '. abs(date('i',$time)).' นาที ' . abs(date('s',$time)) . ' วินาที';
            return $thai_date_return;
        }
        // 2013-09-06 13:24
        public static function getThaiDateFacebook($input){
            $input = strtotime($input);
            $diff = time() - $input;
            $words = 'ที่แล้ว';
            
            if($diff < 60){
                $i = 0;
                $diff = ($diff == 1) ? '' : $diff;
                $text = "$diff ".  self::$ThaiTime[$i].$words;
            }else if($diff < 3600){
                $i = 1;
                $diff2 = round($diff/60);
                $diff = ($diff2 == 3 || $diff2 == 4) ? '' : $diff2;
                $text = "$diff ".  self::$ThaiTime[$i].$words;
            }else if($diff < 86400){
                $i = 2;
                $diff2 = round($diff/3600);
                $diff = ($diff2 != 1) ? $diff2 : ' '.$diff2;
                $text = "$diff ".  self::$ThaiTime[$i].$words;
            }else if($diff < 172800){
                $diff = round($diff/86400);
                $text = "$diff วันที่แล้ว เมื่อเวลา " . date('G:i',$input);
            }else{
                $date = date('j',$input);
                $month = self::$ThaiMonth[date('m',$input)];
                $y = date('Y',$input)+543;
                $t1 = "$date $month $y";
                $t2 = "$date $month ";
                
                if($input < strtotime(date('Y-01-01 00:00:00'))){
                    $text = 'เมื่อวันที่ '.$t1.' เวลา '. date('G:i',$input) . ' น.';
                }else{
                    $text = 'เมื่อวันที่ '.$t2.' เวลา '. date('G:i',$input) . ' น.';
                }
            }
            
            return $text;
            
        }
        // 2013-09-06 13:24
        public static function getDateNotify($endDate){
            $chk_day_now = time();  
            $chk_day_expire = strtotime($endDate);  
            $chk_dat_number = $chk_day_expire - $chk_day_now;
             
            if($chk_day_now >= $chk_day_expire){  
                return 'เงื่อนไขรายการเมื่อหมดอายุ'; //  
            }else{  
                 $diff = round($chk_dat_number/86400);
                 return 'เงื่อนไขรายการจะหมดอายุในอีก '.$diff.' วัน';
            }  
        }

    }
    
?>
