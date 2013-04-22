<?php
Class ExamAction extends CommonAction{
	
	public function _initialize(){
		parent::_initialize();
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
		//dump(session('身份证号'));exit;//座位号
		//dump(session('seatNo'));exit;//座位号
		$this->assign('pagetitle','练习');
		$this->display();
	}
	
	public function mark(){
		$this->assign('pagetitle','标记');
		$this->display();
	}
	
	public function doexamlogin(){
		if($_POST['idCard'] == $_SESSION['userinfo']['identitycard']){
			session('seatNo',$_POST['seatNo']);
			$this->redirect('Exam/training');
		}else{
			$this->error('身份证号码不正确！','/index.php/Exam/login');
		}
	}
	
}
?>