<?php 
/**
 +公开访问的模块
*/
Class PublicAction extends InitAction{

	public function _initialize(){
		parent::_initialize();
		header("Content-Type:text/html; charset=utf-8");
	}
	
	public function _empty($name){
		redirect(__APP__.'/Public/login');
	}

	//数字，字母，验证码
	public function verify(){
		$type	 =	 isset($_GET['type'])?$_GET['type']:'gif';
		import('ORG.Util.Image');
   		Image::buildImageVerify($length=4, $mode=1, $type='png', $width=55, $height=20, $verifyName='verify');
	}

	//中文验证码
    Public function GBVerify(){
    	$type	 =	 isset($_GET['type'])?$_GET['type']:'gif';
	    import("ORG.Util.Image");
	    Image::GBVerify();
    }
    
    // 检查用户是否登录
    protected function checkUser() {
    	if(!isset($_SESSION[C('USER_AUTH_KEY')])) {
    		$this->error('没有登录',__APP__.'/Public/login');
    	}
    }
    
    // 用户登录页面
    public function login() {	
    	
    	if(!isset($_SESSION[C('USER_AUTH_KEY')])) {
    		if(browser()!="FF"){
    			echo '<html><body><div style="width:800px;margin:200px auto;text-align:center;">';
    			echo '<b>友情提示：</b>请用<a target="_blank" href="http://firefox.com.cn/download/">火狐浏览器</a>管理网站后台！';
    			echo '</div></body></html>';
    			exit;
    		}    		
    		$this->display();
    	}else{
    		redirect(__APP__);
    	}
    }
    
    public function index() {
    	//如果通过认证跳转到首页
    	redirect(__APP__);
    }
    
    // 登录检测
    public function checkLogin(){
    	//dump(session('website_adminjiami'));exit;
    	if($_POST['adminjiami'] != session('website_adminjiami')) {
    		$this->error('网站后台密匙错误！');
    	}elseif(empty($_POST['account'])) {
    		$this->error('帐号错误！');
    	}elseif (empty($_POST['password'])){
    		$this->error('密码必须！');
    	}elseif (empty($_POST['verify'])){
    		$this->error('验证码必须！');
    	}
    	//生成认证条件
    	$map            =   array();
    	// 支持使用绑定帐号登录
    	$map['account']	= $_POST['account'];
    	$map["status"]	=	array('gt',0);
    	if(session('verify') != md5($_POST['verify'])) {
    		$this->error('验证码错误！');
    	}
    	import ( 'ORG.Util.RBAC' );
    	$authInfo = RBAC::authenticate($map);
    	//使用用户名、密码和状态的方式进行认证
    	if(false === $authInfo) {
    		$this->error('帐号不存在或已禁用！');
    	}else {
    		if($authInfo['password'] != md5($_POST['password'])) {
    			$this->error('密码错误！');
    		}
    		$_SESSION[C('USER_AUTH_KEY')]	=	$authInfo['id'];
    		$_SESSION['email']	=	$authInfo['email'];
    		$_SESSION['loginUserName']		=	$authInfo['nickname'];
    		$_SESSION['lastLoginTime']		=	$authInfo['last_login_time'];
    		$_SESSION['login_count']	=	$authInfo['login_count'];
    		if($authInfo['account']=='admin') {
    			$_SESSION['administrator']		=	true;
    		}
    		//保存登录信息
    		$User	=	M('User');
    		$ip		=	get_client_ip();
    		$time	=	time();
    		$data = array();
    		$data['id']	=	$authInfo['id'];
    		$data['last_login_time']	=	$time;
    		$data['login_count']	=	array('exp','login_count+1');
    		$data['last_login_ip']	=	$ip;
    		$User->save($data);
    		
    		$admininfo['username'] = $authInfo['account'];
    		$admininfo['lastloginip'] = $ip;
    		session('admininfo',$admininfo);
    
    		// 缓存访问权限
    		RBAC::saveAccessList();
    		$this->success('登录成功！',__APP__.'/Index/index');
    
    	}
    }

    // 用户登出
    public function logout() {
    	if(isset($_SESSION[C('USER_AUTH_KEY')])) {
    		unset($_SESSION[C('USER_AUTH_KEY')]);
    		unset($_SESSION);
    		session_destroy();
    		$this->success('登出成功！',__URL__.'/login/');
    	}else {
    		$this->error('已经登出！');
    	}
    }

    // 更换密码
    public function changePwd() {
    	$this->checkUser();
    	//对表单提交处理进行处理或者增加非表单数据
    	if(md5($_POST['verify'])	!= $_SESSION['verify']) {
    		$this->error('验证码错误！');
    	}
    	$map	=	array();
    	$map['password']= pwdHash($_POST['oldpassword']);
    	if(isset($_POST['account'])) {
    		$map['account']	 =	 $_POST['account'];
    	}elseif(isset($_SESSION[C('USER_AUTH_KEY')])) {
    		$map['id']		=	$_SESSION[C('USER_AUTH_KEY')];
    	}
    	//检查用户
    	$User    =   M("User");
    	if(!$User->where($map)->field('id')->find()) {
    		$this->error('旧密码不符或者用户名错误！');
    	}else {
    		$User->password	=	pwdHash($_POST['password']);
    		$User->save();
    		$this->success('密码修改成功！');
    	}
    }
    
    //获得用户的信息
    public function profile() {
    	$this->checkUser();
    	$User	 =	 M("User");
    	$vo	=	$User->getById($_SESSION[C('USER_AUTH_KEY')]);
    	$this->assign('vo',$vo);
    	$this->display();
    }
    
    // 修改资料
    public function change() {
    	$this->checkUser();
    	$User	 =	 D("User");
    	if(!$User->create()) {
    		$this->error($User->getError());
    	}
    	$result	=	$User->save();
    	if(false !== $result) {
    		$this->success('资料修改成功！');
    	}else{
    		$this->error('资料修改失败!');
    	}
    }
    
}
?>