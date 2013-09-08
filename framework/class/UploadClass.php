<?php 
include "class.resizepic.php"; //include ไฟล์ฟังก์ชันมาใช้งาน
//เชื่อมต่อฐานข้อมูลด้วย mysqli
$db = new mysqli("localhost", "root", "1234", "test");
if(mysqli_connect_errno()) die("Connect Failed! :" . mysqli_connect_error());
$db->set_charset("utf8");

if(isset($_POST['Submit'] ))
{
	$num_file = count($_FILES['file']['name']);
	$select = false;
	$count = 0;
	for($i = 0; $i < $num_file ; $i++) //เนื่องจาก upload แบบ array เราจึงใช้ loop จัดการทีละไฟล์
	{
		if($_FILES['file']['error'][$i] != 0) //ถ้าเกิดข้อผิดพลาดให้ข้ามไฟล์นนี้ไป
		{
		    $count++;
			continue;
		}
		if($_FILES['file']['name'][$i] != "")
		{
			$Filename = $_FILES['file']['name'][$i];
			$type = $_FILES['file']['type'][$i];
			
			//เก็บชื่อไฟล์เป็นเวลาขณะที่ upload แล้วตามด้วยนามสกุลไฟล์ ถ้าไฟล์มีชื่อเหมือนกันจะได้ไม่มีปัญหา
			//สามารถ upload ไฟล์นามสกุล .gif, .png, .jpg, .zip, .docx, .pdf, .doc, .swf, .rar ได้
			$time = time() * microtime();
			if ( $type == "image/gif" ) {$Filename = $time.".gif"; $pic_type = 'GIF'; }
			else if ( $type == "image/png" ) {$Filename = $time.".png"; $pic_type = 'PNG'; }
			else if (( $type == "image/jpg") or ($type=="image/jpeg") or ($type == "image/pjpeg")) {$Filename = $time.".jpg"; $pic_type = 'JPG'; }
			else if ($type == "application/octet-stream" ) {$Filename = $time.".zip"; $pic_type = false;}
			else if ($type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" ) {$Filename = $time.".docx"; $pic_type = false;}
			else if ($type == "application/pdf" ) {$Filename = $time.".pdf"; $pic_type = false;}
			else if ($type == "application/msword" ) {$Filename = $time.".doc"; $pic_type = false;}
			else if ($type == "application/x-shockwave-flash" ) {$Filename = $time.".swf"; $pic_type = false;}
			else if ($type == "application/octet-stream" ) {$Filename = $time.".rar"; $pic_type = false;}
			
			//move ไฟล์ไปยังโฟลเดอร์ที่สร้างไว้ในที่นี้คือ fileupload
			if(move_uploaded_file($_FILES['file']['tmp_name'][$i], 'fileupload/'.$Filename)){
			
			//โค้ดในส่วนของการลดขนาดไฟล์รูปภาพ
				if($pic_type){
					$original_image = "fileupload/" . $Filename ; 
					$pic_size = getimagesize($original_image); //ดึงขนาดของไฟล์ภาพมา
					$desired_width = 250 ; //กำหนดความกว้าง
					//หาความสูงของภาพโดยคิดจากความกว้างซึ่งจะปรับความสูงอัตโนมัติให้มีขนาดพอดี 
					//อาจจะไม่เหมือนที่ทำกันทั่วไป เพราะทั่วไปจะกำหนดความสูงแล้วคำนวณความกว้าง
					$per_div = abs($desired_width - $pic_size[0]) * 100 / $pic_size[0];
					$desired_height = $pic_size[0] > $desired_width ?  $pic_size[1] - floor( $pic_size[1] * $per_div / 100) : $pic_size[1] + floor( $pic_size[1] * $per_div / 100);
					$image = new hft_image($original_image);
					$image->resize($desired_width, $desired_height, '0');
					$image->output_resized("myfile/".$Filename, "JPG");
				}
				
				//จัดเก็บชื่อไฟล์ลงฐานข้อมูล
				$sql = $db->query("INSERT INTO upfile (filename)
			 	VALUES ('{$Filename}') ");
				if($sql)
				{
			 		echo "Upload สำเร็จ <br>";
					
			 	}else{
			 		echo "Upload ล้มเหลว!! <br>";
				 }
			}
		}else{
			$count++;
		}
	}
	
}else{
	echo "คุณยังไม่ได้เลือกไฟล์ Upload";

}
?>