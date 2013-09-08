<?php
@include("cache-kit.php");  // ���¡����� php class
$cache_active = true;  // ��˹����ӡ�� cache
$cache_folder = 'cache/';  // ��˹����������������� cache
?>
<?php    
function callback($buffer) {    // �ѧ��ѹ����Ѻ�纤�� html ���㹵����
     return $buffer;   
}    
?>    
<?php
$page_cache = acmeCache::fetch('page_cache', 10); 
// �ӡ�� cache ˹�����䫵����� ���㹵���� $page_cache �ء� 10 �Թҷ� ����ö��˹��繤�������
if(!$page_cache){  // ��Ǩ�ͺ��Ҷ������բ����ŷ�� cache ��� ���ӡ���纤�� html �������Ѻ�ѹ�֡ cache
	ob_start("callback");  // ������鹡�úѹ�֡ html
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
	$page_cache=ob_get_contents(); // �红����� html ���㹵���� $page_cache
	ob_end_flush();  // ���˹�����ش 
	acmeCache::save('page_cache',$page_cache); // �ӡ�úѹ�֡ html �ҡ����� $page_cache ���� cache ���� page_cache
}else{
	echo $page_cache;  // �ʴ������ŷ��ӡ�� cache
	echo "Cache Data"; // ����Ѻ���ͺ��� �繢����ŷ����ҡ��� cache �������
} 
?>