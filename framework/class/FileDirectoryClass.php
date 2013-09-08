<?php
    
    class FileDirectory {
        
        // 2013-09-06 13:24
        public static function setFullDelete($location) {  
            // ตรวจสอบที่อยู่ของ ไดเรกทอรี ว่ามีอยู่หรือไม่
            if (is_dir($location)) { 
                // พบไดเรกทอรี่
                $currdir = opendir($location);  // opendir คำสั่งเปิดไดเรกทอรี    
                while ($file = readdir($currdir)) {     // readdir คำสั่งอ่านไฟล์หรือไดเรกทอรีย่อยใดบ้างที่อยู่ภายในไดเรกทอรีหลัก 
                    if ($file <> ".." && $file <> ".") {    
                        $fullfile = $location."/".$file; 
                        // ตรวจสอบที่อยู่ของ ไดเรกทอรี่ ว่ามีอยู่หรือไม่ 
                        if (is_dir($fullfile)) {   
                            // พบไดเรอทอรี่         
                            if (!setFullDelete($fullfile)) {     
                                return false;     
                            }     
                        }else{ 
                            // ไม่พบไดเรอทอรี่     
                            if (!unlink($fullfile)) { // unlink คำสั่ง ลบไฟล์ ทิ้ง
                                return false;     
                            }     
                        }     
                    }     
                }     
                closedir($currdir);     // closedir คำสั่งปิด Directory 
                if (!rmdir($location)) {  // rmdir คำสั่ง ลบไดเรกทอรี่    
                    return false;     
                }     
            }else{ 
                // ไม่พบไดเรอทอรี่
                if (!unlink($location)) {     
                    return false;     
                }     
            }     
            return true;     
        } 
        
    }
    
?>
