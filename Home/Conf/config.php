<?php
$config1 =  array(
	//'配置项'=>'配置值'

	// 'URL_CASE_INSENSITIVE' =>true，//URL不区分大小写
	
	'DEFAULT_THEME'=>'default',//默认模板
	'TMPL_L_DELIM'=>'<{',
	'TMPL_R_DELIM'=>'}>',

	//默认错误跳转对应的模板文件
	'TMPL_ACTION_ERROR' => 'Public:error',
	//默认成功跳转对应的模板文件
	'TMPL_ACTION_SUCCESS' => 'Public:success',
		
	'TOKEN_ON'=>true,  // 是否开启令牌验证
    'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE'=>'MD5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true
	'URL_MODEL' => '2',
	'URL_CASE_INSENSITIVE' =>true, //忽略大小写

	// 'SHOW_RUN_TIME'=>true,  //运行时间显示
	// 'SHOW_ADV_TIME'=>true,//显示详细的运行时间
	// 'SHOW_DB_TIMES'=>true,//显示数据库的操作次数
	// 'SHOW_CACHE_TIMES'=>true,//显示缓存操作次数
	// 'SHOW_USE_MEM'=>true,//显示内存开销
	
	'MAIL_ADDRESS'=>'kf@ship123.com', // 邮箱地址
    'MAIL_SMTP'=>'smtp.exmail.qq.com', // 邮箱SMTP服务器
	'MAIL_PASSWORD'=>'ship123', // 邮箱密码
	'MAIL_PORT'=>'465',
		


);
$config2 = include './config.inc.php';
return array_merge($config1,$config2);
?>