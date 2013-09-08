<?php
@include("cache-kit.php");  // เรียกใช้ไฟล์ php class
$cache_active = true;  // กำหนดให้ทำการ cache
$cache_folder = 'cache/';  // กำหนดไฟลเดอร์ที่ไว้เก็บไฟล์ cache
?>
<?php    
function callback($buffer) {    // ฟังก์ชันสำหรับเก็บค่า html ไว้ในตัวแปร
     return $buffer;   
}    
?>    
<?php
$page_cache = acmeCache::fetch('page_cache', 10); 
// ทำการ cache หน้าเว็บไซต์ใหม่ ไว้ในตัวแปร $page_cache ทุกๆ 10 วินาที สามารถกำหนดเป็นค่าอื่นได้
if(!$page_cache){  // ตรวจสอบว่าถ้าไม่มีข้อมูลที่ cache ไว้ ให้ทำการเก็บค่า html ไว้สำหรับบันทึก cache
	ob_start("callback");  // เริ่มต้นการบันทึก html
?>
<html>   
<head>   
<title>Cache Page</title>   
<style type="text/css">   
.mysty1{   
    width:150px;   
    height:200px;   
    background-color:#FFCC66;   
}   
</style>   
</head>   
<body>   
  
<div class="mysty1">   
</div>   
  
</body>   
</html>   
<?php 
	$page_cache=ob_get_contents(); // เก็บข้อมูล html ไว้ในตัวแปร $page_cache
	ob_end_flush();  // ตำแหน่งสิ้นสุด 
	acmeCache::save('page_cache',$page_cache); // ทำการบันทึก html จากตัวแปร $page_cache ไว้ใน cache ชื่อ page_cache
}else{
	echo $page_cache;  // แสดงข้อมูลที่ทำการ cache
	echo "Cache Data"; // สำหรับทดสอบว่า เป็นข้อมูลที่ได้จากการ cache หรือไม่
} 
?>