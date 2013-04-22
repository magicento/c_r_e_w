<?php  
/**
 *
 +--------------------------------------------------------------------
 * Description 友好显示时间
 +--------------------------------------------------------------------
 * @param int $time 要格式化的时间戳 默认为当前时间
 +--------------------------------------------------------------------
 * @return string $text 格式化后的时间戳
 +--------------------------------------------------------------------
 * @author yijianqing
 +--------------------------------------------------------------------
 */
function mdate($time = NULL) {
    $text = '';
    $time = $time === NULL || $time > time() ? time() : intval($time);
    $t = time() - $time; //时间差 （秒）
    if ($t == 0)
        $text = '刚刚';
    elseif ($t < 60)
        $text = $t . '秒前'; // 一分钟内
    elseif ($t < 60 * 60)
        $text = floor($t / 60) . '分钟前'; //一小时内
    elseif ($t < 60 * 60 * 24)
        $text = floor($t / (60 * 60)) . '小时前'; // 一天内
    elseif ($t < 60 * 60 * 24 * 2)
        $text = '昨天 ' . date('H:i', $time); //两天内
    elseif ($t < 60 * 60 * 24 * 3)
        $text = '前天 ' . date('H:i', $time); // 三天内
    elseif ($t < 60 * 60 * 24 * 30)
        $text = date('m月d日 H:i', $time); //一个月内
    elseif ($t < 60 * 60 * 24 * 365)
        $text = date('m月d日', $time); //一年内
    else
        $text = date('Y年m月d日', $time); //一年以前
    return $text;
}

/**
 * 获取客户端浏览器类型
 * @param  string $glue 浏览器类型和版本号之间的连接符
 * @return string|array 传递连接符则连接浏览器类型和版本号返回字符串否则直接返回数组 false为未知浏览器类型
 */
function get_client_browser($glue = null) {
    $browser = array();
    $agent = $_SERVER['HTTP_USER_AGENT']; //获取客户端信息
    
    /* 定义浏览器特性正则表达式 */
    $regex = array(
        'ie'      => '/(MSIE) (\d+\.\d)/',
        'chrome'  => '/(Chrome)\/(\d+\.\d+)/',
        'firefox' => '/(Firefox)\/(\d+\.\d+)/',
        'opera'   => '/(Opera)\/(\d+\.\d+)/',
        'safari'  => '/Version\/(\d+\.\d+\.\d) (Safari)/',
    );

    foreach($regex as $type => $reg) {
        preg_match($reg, $agent, $data);
        if(!empty($data) && is_array($data)){
            $browser = $type === 'safari' ? array($data[2], $data[1]) : array($data[1], $data[2]);
            break;
        }
    }

    return empty($browser) ? false : (is_null($glue) ? $browser : implode($glue, $browser));
}

/**
 * 根据文件后缀获取mime类型
 * @param  string $ext 文件后缀
 * @return string      mime类型
 */
function get_mime_type($ext){
    static $mime_types = array (
        'apk'     => 'application/vnd.android.package-archive',
        '3gp'     => 'video/3gpp', 
        'ai'      => 'application/postscript', 
        'aif'     => 'audio/x-aiff', 
        'aifc'    => 'audio/x-aiff', 
        'aiff'    => 'audio/x-aiff', 
        'asc'     => 'text/plain', 
        'atom'    => 'application/atom+xml', 
        'au'      => 'audio/basic', 
        'avi'     => 'video/x-msvideo', 
        'bcpio'   => 'application/x-bcpio', 
        'bin'     => 'application/octet-stream', 
        'bmp'     => 'image/bmp', 
        'cdf'     => 'application/x-netcdf', 
        'cgm'     => 'image/cgm', 
        'class'   => 'application/octet-stream', 
        'cpio'    => 'application/x-cpio', 
        'cpt'     => 'application/mac-compactpro', 
        'csh'     => 'application/x-csh', 
        'css'     => 'text/css', 
        'dcr'     => 'application/x-director', 
        'dif'     => 'video/x-dv', 
        'dir'     => 'application/x-director', 
        'djv'     => 'image/vnd.djvu', 
        'djvu'    => 'image/vnd.djvu', 
        'dll'     => 'application/octet-stream', 
        'dmg'     => 'application/octet-stream', 
        'dms'     => 'application/octet-stream', 
        'doc'     => 'application/msword', 
        'dtd'     => 'application/xml-dtd', 
        'dv'      => 'video/x-dv', 
        'dvi'     => 'application/x-dvi', 
        'dxr'     => 'application/x-director', 
        'eps'     => 'application/postscript', 
        'etx'     => 'text/x-setext', 
        'exe'     => 'application/octet-stream', 
        'ez'      => 'application/andrew-inset', 
        'flv'     => 'video/x-flv', 
        'gif'     => 'image/gif', 
        'gram'    => 'application/srgs', 
        'grxml'   => 'application/srgs+xml', 
        'gtar'    => 'application/x-gtar', 
        'gz'      => 'application/x-gzip', 
        'hdf'     => 'application/x-hdf', 
        'hqx'     => 'application/mac-binhex40', 
        'htm'     => 'text/html', 
        'html'    => 'text/html', 
        'ice'     => 'x-conference/x-cooltalk', 
        'ico'     => 'image/x-icon', 
        'ics'     => 'text/calendar', 
        'ief'     => 'image/ief', 
        'ifb'     => 'text/calendar', 
        'iges'    => 'model/iges', 
        'igs'     => 'model/iges', 
        'jnlp'    => 'application/x-java-jnlp-file', 
        'jp2'     => 'image/jp2', 
        'jpe'     => 'image/jpeg', 
        'jpeg'    => 'image/jpeg', 
        'jpg'     => 'image/jpeg', 
        'js'      => 'application/x-javascript', 
        'kar'     => 'audio/midi', 
        'latex'   => 'application/x-latex', 
        'lha'     => 'application/octet-stream', 
        'lzh'     => 'application/octet-stream', 
        'm3u'     => 'audio/x-mpegurl', 
        'm4a'     => 'audio/mp4a-latm', 
        'm4p'     => 'audio/mp4a-latm', 
        'm4u'     => 'video/vnd.mpegurl', 
        'm4v'     => 'video/x-m4v', 
        'mac'     => 'image/x-macpaint', 
        'man'     => 'application/x-troff-man', 
        'mathml'  => 'application/mathml+xml', 
        'me'      => 'application/x-troff-me', 
        'mesh'    => 'model/mesh', 
        'mid'     => 'audio/midi', 
        'midi'    => 'audio/midi', 
        'mif'     => 'application/vnd.mif', 
        'mov'     => 'video/quicktime', 
        'movie'   => 'video/x-sgi-movie', 
        'mp2'     => 'audio/mpeg', 
        'mp3'     => 'audio/mpeg', 
        'mp4'     => 'video/mp4', 
        'mpe'     => 'video/mpeg', 
        'mpeg'    => 'video/mpeg', 
        'mpg'     => 'video/mpeg', 
        'mpga'    => 'audio/mpeg', 
        'ms'      => 'application/x-troff-ms', 
        'msh'     => 'model/mesh', 
        'mxu'     => 'video/vnd.mpegurl', 
        'nc'      => 'application/x-netcdf', 
        'oda'     => 'application/oda', 
        'ogg'     => 'application/ogg', 
        'ogv'     => 'video/ogv', 
        'pbm'     => 'image/x-portable-bitmap', 
        'pct'     => 'image/pict', 
        'pdb'     => 'chemical/x-pdb', 
        'pdf'     => 'application/pdf', 
        'pgm'     => 'image/x-portable-graymap', 
        'pgn'     => 'application/x-chess-pgn', 
        'pic'     => 'image/pict', 
        'pict'    => 'image/pict', 
        'png'     => 'image/png', 
        'pnm'     => 'image/x-portable-anymap', 
        'pnt'     => 'image/x-macpaint', 
        'pntg'    => 'image/x-macpaint', 
        'ppm'     => 'image/x-portable-pixmap', 
        'ppt'     => 'application/vnd.ms-powerpoint', 
        'ps'      => 'application/postscript', 
        'qt'      => 'video/quicktime', 
        'qti'     => 'image/x-quicktime', 
        'qtif'    => 'image/x-quicktime', 
        'ra'      => 'audio/x-pn-realaudio', 
        'ram'     => 'audio/x-pn-realaudio', 
        'ras'     => 'image/x-cmu-raster', 
        'rdf'     => 'application/rdf+xml', 
        'rgb'     => 'image/x-rgb', 
        'rm'      => 'application/vnd.rn-realmedia', 
        'roff'    => 'application/x-troff', 
        'rtf'     => 'text/rtf', 
        'rtx'     => 'text/richtext', 
        'sgm'     => 'text/sgml', 
        'sgml'    => 'text/sgml', 
        'sh'      => 'application/x-sh', 
        'shar'    => 'application/x-shar', 
        'silo'    => 'model/mesh', 
        'sit'     => 'application/x-stuffit', 
        'skd'     => 'application/x-koan', 
        'skm'     => 'application/x-koan', 
        'skp'     => 'application/x-koan', 
        'skt'     => 'application/x-koan', 
        'smi'     => 'application/smil', 
        'smil'    => 'application/smil', 
        'snd'     => 'audio/basic', 
        'so'      => 'application/octet-stream', 
        'spl'     => 'application/x-futuresplash', 
        'src'     => 'application/x-wais-source', 
        'sv4cpio' => 'application/x-sv4cpio', 
        'sv4crc'  => 'application/x-sv4crc', 
        'svg'     => 'image/svg+xml', 
        'swf'     => 'application/x-shockwave-flash', 
        't'       => 'application/x-troff', 
        'tar'     => 'application/x-tar', 
        'tcl'     => 'application/x-tcl', 
        'tex'     => 'application/x-tex', 
        'texi'    => 'application/x-texinfo', 
        'texinfo' => 'application/x-texinfo', 
        'tif'     => 'image/tiff', 
        'tiff'    => 'image/tiff', 
        'tr'      => 'application/x-troff', 
        'tsv'     => 'text/tab-separated-values', 
        'txt'     => 'text/plain', 
        'ustar'   => 'application/x-ustar', 
        'vcd'     => 'application/x-cdlink', 
        'vrml'    => 'model/vrml', 
        'vxml'    => 'application/voicexml+xml', 
        'wav'     => 'audio/x-wav', 
        'wbmp'    => 'image/vnd.wap.wbmp', 
        'wbxml'   => 'application/vnd.wap.wbxml', 
        'webm'    => 'video/webm', 
        'wml'     => 'text/vnd.wap.wml', 
        'wmlc'    => 'application/vnd.wap.wmlc', 
        'wmls'    => 'text/vnd.wap.wmlscript', 
        'wmlsc'   => 'application/vnd.wap.wmlscriptc', 
        'wmv'     => 'video/x-ms-wmv', 
        'wrl'     => 'model/vrml', 
        'xbm'     => 'image/x-xbitmap', 
        'xht'     => 'application/xhtml+xml', 
        'xhtml'   => 'application/xhtml+xml', 
        'xls'     => 'application/vnd.ms-excel', 
        'xml'     => 'application/xml', 
        'xpm'     => 'image/x-xpixmap', 
        'xsl'     => 'application/xml', 
        'xslt'    => 'application/xslt+xml', 
        'xul'     => 'application/vnd.mozilla.xul+xml', 
        'xwd'     => 'image/x-xwindowdump', 
        'xyz'     => 'chemical/x-xyz', 
        'zip'     => 'application/zip' 
    );
    
    return isset($mime_types[$ext]) ? $mime_types[$ext] : 'application/octet-stream';
}

////获得访客浏览器类型
function GetBrowser(){
	if(!empty($_SERVER['HTTP_USER_AGENT'])){
	$br = $_SERVER['HTTP_USER_AGENT'];
	if (preg_match('/MSIE/i',$br)) {    
	           $br = 'MSIE';
	         }elseif (preg_match('/Firefox/i',$br)) {
	 $br = 'Firefox';
	}elseif (preg_match('/Chrome/i',$br)) {
	 $br = 'Chrome';
	   }elseif (preg_match('/Safari/i',$br)) {
	 $br = 'Safari';
	}elseif (preg_match('/Opera/i',$br)) {
	    $br = 'Opera';
	}else {
	    $br = 'Other';
	}
	return $br;
	}else{return "获取浏览器信息失败！";} 
}

////获得访客浏览器语言
function GetLang(){
	if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
	$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	$lang = substr($lang,0,5);
	if(preg_match("/zh-cn/i",$lang)){
	 $lang = "简体中文";
	}elseif(preg_match("/zh/i",$lang)){
	 $lang = "繁体中文";
	}else{
	    $lang = "English";
	}
	return $lang;

	}else{return "获取浏览器语言失败！";}
}

////获取访客操作系统
function GetOs(){
	if(!empty($_SERVER['HTTP_USER_AGENT'])){
	$OS = $_SERVER['HTTP_USER_AGENT'];
	  if (preg_match('/win/i',$OS)) {
	 $OS = 'Windows';
	}elseif (preg_match('/mac/i',$OS)) {
	 $OS = 'MAC';
	}elseif (preg_match('/linux/i',$OS)) {
	 $OS = 'Linux';
	}elseif (preg_match('/unix/i',$OS)) {
	 $OS = 'Unix';
	}elseif (preg_match('/bsd/i',$OS)) {
	 $OS = 'BSD';
	}else {
	 $OS = 'Other';
	}
	      return $OS;  
	}else{return "获取访客操作系统信息失败！";}   
}
  
////获得访客真实ip
function Getip(){
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){   
	  $ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ //获取代理ip
	$ips = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
	}
	if($ip){
	  $ips = array_unshift($ips,$ip); 
	}

	$count = count($ips);
	for($i=0;$i<$count;$i++){   
	 if(!preg_match("/^(10|172\.16|192\.168)\./i",$ips[$i])){//排除局域网ip
	  $ip = $ips[$i];
	  break;    
	  }  
	}  
	$tip = empty($_SERVER['REMOTE_ADDR']) ? $ip : $_SERVER['REMOTE_ADDR']; 
	if($tip=="127.0.0.1"){ //获得本地真实IP
	  return $this->get_onlineip();   
	}else{
	  return $tip; 
	}
}
  
////获得本地真实IP
function get_onlineip() {
  $mip = file_get_contents("http://city.ip138.com/city0.asp");
   if($mip){
       preg_match("/\[.*\]/",$mip,$sip);
       $p = array("/\[/","/\]/");
       return preg_replace($p,"",$sip[0]);
   }else{return "获取本地IP失败！";}
}
  
////根据ip获得访客所在地地名
function Getaddress($ip=''){
	if(empty($ip)){
	   $ip = $this->Getip();    
	}
	$ipadd = file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=".$ip);//根据新浪api接口获取
	if($ipadd){
	$charset = iconv("gbk","utf-8",$ipadd);   
	preg_match_all("/[\x{4e00}-\x{9fa5}]+/u",$charset,$ipadds);

	return $ipadds;   //返回一个二维数组
	}else{return "addree is none";}  
} 
 
/**
 +----------------------------------------------------------
 * 对查询结果集进行排序
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @param array $list 查询结果
 * @param string $field 排序的字段名
 * @param string $sortby 排序类型
 * asc正向排序 desc逆向排序 nat自然排序
 +----------------------------------------------------------
 * @return array
 +----------------------------------------------------------
 */
function list_sort_by($list,$field, $sortby='asc') {
   if(is_array($list)){
       $refer = $resultSet = array();
       foreach ($list as $i => $data)
           $refer[$i] = &$data[$field];
       switch ($sortby) {
           case 'asc': // 正向排序
                asort($refer);
                break;
           case 'desc':// 逆向排序
                arsort($refer);
                break;
           case 'nat': // 自然排序
                natcasesort($refer);
                break;
       }
       foreach ( $refer as $key=> $val)
           $resultSet[] = &$list[$key];
       return $resultSet;
   }
   return false;
}

/**
+----------------------------------------------------------
*用于对字符串进行XSS安全过滤
+----------------------------------------------------------
*return string
+----------------------------------------------------------
*/
function remove_xss($val) {
   // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
   // this prevents some character re-spacing such as <java\0script>
   // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
   $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);

   // straight replacements, the user should never need these since they're normal characters
   // this prevents like <IMG SRC=@avascript:alert('XSS')>
   $search = 'abcdefghijklmnopqrstuvwxyz';
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $search .= '1234567890!@#$%^&*()';
   $search .= '~`";:?+/={}[]-_|\'\\';
   for ($i = 0; $i < strlen($search); $i++) {
      // ;? matches the ;, which is optional
      // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

      // @ @ search for the hex values
      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
      // @ @ 0{0,7} matches '0' zero to seven times
      $val = preg_replace('/(�{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
   }

   // now the only remaining whitespace attacks are \t, \n, and \r
   $ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
   $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
   $ra = array_merge($ra1, $ra2);

   $found = true; // keep replacing as long as the previous round replaced something
   while ($found == true) {
      $val_before = $val;
      for ($i = 0; $i < sizeof($ra); $i++) {
         $pattern = '/';
         for ($j = 0; $j < strlen($ra[$i]); $j++) {
            if ($j > 0) {
               $pattern .= '(';
               $pattern .= '(&#[xX]0{0,8}([9ab]);)';
               $pattern .= '|';
               $pattern .= '|(�{0,8}([9|10|13]);)';
               $pattern .= ')*';
            }
            $pattern .= $ra[$i][$j];
         }
         $pattern .= '/i';
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
         if ($val_before == $val) {
            // no replacements were made, so exit the loop
            $found = false;
         }
      }
   }
   return $val;
}


?>