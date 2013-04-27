<?php 
Class CommonAction extends InitAction{

	public function _initialize(){
		parent::_initialize();
		//dump(session('userinfo'));
		header("Content-Type:text/html; charset=utf-8");
		//session('user_id','36');
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
}
?>