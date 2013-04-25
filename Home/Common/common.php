<?php  

/*获得客户端真实的IP地址*/
function get_client_true_ip() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		} else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
				$ip = getenv("REMOTE_ADDR");
			} else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
					$ip = $_SERVER['REMOTE_ADDR'];
				} else {
					$ip = "unknown";
				}
	return ($ip);
}

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
function getuseravatar(){
	$uid = session('user_id');
	$uid = abs(intval($uid));
	$uid = sprintf("%09d", $uid);
	$dir1 = substr($uid, 0, 3);
	$dir2 = substr($uid, 3, 2);
	$dir3 = substr($uid, 5, 2);
	$savepath = $dir1.'/'.$dir2.'/'.$dir3.'/'.substr($uid, -2)."_avatar_middle.jpg";
	
	
	$path	=	'./Uploads/avatar/'.$savepath;
	if(!file_exists($path)){
		$path = '/Public/images/home/defaultav.png';
	}else{
		$path	=	'/Uploads/avatar/'.$savepath;
	}
		
	return $path;
}

//自动登陆
function userautologin(){
	$uid = cookie('autoLoginuserid');
	//dump($uid);
	if($uid && !session('user_id')){
		session('user_id',$uid);
		redirect('index.php');
	}
}

//清空指定的Cookie，ThinkPHP官方的这个 cookie(null,"think_")好像有问题
function emptycookie($identify){
	// 默认设置
	$config = array(
			'prefix'    =>  C('COOKIE_PREFIX'), // cookie 名称前缀
			'expire'    =>  C('COOKIE_EXPIRE'), // cookie 保存时间
			'path'      =>  C('COOKIE_PATH'), // cookie 保存路径
			'domain'    =>  C('COOKIE_DOMAIN'), // cookie 有效域名
	);
	
	foreach ($_COOKIE as $key => $val) {
		if (0 === stripos($key, $identify)) {
			setcookie($key, '', time() - 3600, $config['path'], $config['domain']);
			unset($_COOKIE[$key]);
		}
	}
}

//获得指定cookie的数量
function countcookie($identify){
	$num = 0;
	foreach ($_COOKIE as $key => $val) {
		if (0 === stripos($key, $identify)) {
			$num++;
		}
	}
	return $num;
}

//获得Cookie中题目ID和题目顺序编号的关系　
function getidjointtrueid(){
	$arr = array();
	foreach ($_COOKIE as $key => $val) {
		if (0 === stripos($key, 'listquestionid')) {
			$a = explode("_", $key);
			$arr[$a[1]] = $val;
		}
	}
	return $arr;
}

?>