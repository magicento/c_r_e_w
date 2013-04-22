<?php
Class ExamAction extends CommonAction{
	
	public function _initialize(){
		parent::_initialize();
		
		//判断来源是否是从个人中心来的。
		if(!session('sutudyappid')){
			$this->redirect('index.php/User/myapp');
		}
	}
	
	public function _empty(){
		$this->redirect('/');
	}
	
	public function index(){
		
	}
	
	public function login(){
		$this->assign('pagetitle','船员身份验证');
		$this->display();
	}
	
	public function training(){
		$this->assign('pagetitle','练习');
		$this->display();
	}
	
	public function mark(){
		$this->assign('pagetitle','标记');
		$this->display();
	}
	
	public function doexamlogin(){
		if($_POST['idCard'] == $_SESSION['userinfo']['identitycard']){
			session('sutudyappid',$_POST['sutudyappid']);
			$this->redirect('Exam/training');
		}else{
			$this->redirect('Exam/login');
		}
	}
	
}
?>