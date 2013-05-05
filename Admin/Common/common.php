<?php  

//判断浏览器
function browser(){
	if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 8.0"))
	$browser = "IE8";
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 7.0"))
	$browser = "IE7";
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 9.0"))
	$browser = "IE9";
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 6.0"))
	$browser =  "IE6";
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox"))
	$browser =  "FF";
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Chrome"))
	$browser = "Chrome";
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Safari"))
	$browser =  "Safari";
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Opera"))
	$browser =  "Opera";
	else $browser =  $_SERVER["HTTP_USER_AGENT"];

	return $browser;
}

//用户头像
function getuseravatar($uid){
	//$uid = session('user_id');
	$uid = abs(intval($uid));
	$uid = sprintf("%09d", $uid);
	$dir1 = substr($uid, 0, 3);
	$dir2 = substr($uid, 3, 2);
	$dir3 = substr($uid, 5, 2);
	$savepath = $dir1.'/'.$dir2.'/'.$dir3.'/'.substr($uid, -2)."_avatar_big.jpg";


	$path	=	'./Uploads/avatar/'.$savepath;
	if(!file_exists($path)){
		$path = '/Public/images/home/defaultav.png';
	}else{
		$path	=	'/Uploads/avatar/'.$savepath;
	}

	return $path;
}


?>