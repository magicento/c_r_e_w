<?php 
Class CommonAction extends InitAction{

	public function _initialize(){
		parent::_initialize();
		//dump(session('userinfo'));
		header("Content-Type:text/html; charset=utf-8");
		//session('user_id','36');
		$this->resetpwd();
		if(!session('user_id')){
			$this->redirect('/');
		}else{
			if(!session('userinfo')){
				$this->getUserinfo();
			}
		}
		$this->assign('browser',browser());
	}
    
	protected function getUserinfo(){
		$uid = session('user_id');
		$rs =  D('User')->where('id='.$uid)->field('account,email,password,create_time,identitycard,sex,job,tel,address,birthday')->find();
		session('userinfo',$rs);
	}
	
	protected function resetpwd(){
		if($_GET['secretkey']){
			$rs = D('User')->where("secretkey='".$_GET['secretkey']."'")->find();
			session('user_id',$rs['id']); 
			session('resetpwd',1);//标识,当前用户登陆是为了修改密码的.
		}
	}
}
?>