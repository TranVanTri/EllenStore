<?php
// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer  dumpautoload


//$date2 là ngày lơn
//$date 1 là ngày nhỏ
//$tham số là 'd' ,'m' , 'y', 'H', 'i', s 
function tru2Ngay($date2, $date1,$thamso){
	$hieu_so = strtotime($date2) - strtotime($date1);//số giây
	$nam = floor($hieu_so / (365*60*60*24));  
	$thang = floor(($hieu_so - $nam * 365*60*60*24) / (30*60*60*24));  
	$ngay = floor(($hieu_so - $nam * 365*60*60*24 - $thang*30*60*60*24)/ (60*60*24));
	$gio = floor(($hieu_so - $nam * 365*60*60*24 - $thang*30*60*60*24- $ngay*60*60*24)/ (60*60));
	$phut = floor(($hieu_so - $nam * 365*60*60*24 - $thang*30*60*60*24- $ngay*60*60*24 - $gio*60*60)/ 60 );
	switch($thamso){
		case 'y':
		return $nam;
		case 'm':
		return $thang;
		case 'd':
		return $ngay;
		case 'H':
		return $gio;
		case 'i':
		return $phut;
		case 's':
		return $hieu_so;
	}
}

?>