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
			session('begintime',time());
			$this->redirect('Exam/training');
		}else{
			$this->error('身份证号码不正确！','/index.php/Exam/login');
		}
	}
	
	//获得时间 将秒转换成 时分秒
	public function timer(){
		$begintime = session('begintime');
		$sec = time()-$begintime;
		
		$hours = floor($sec / 3600);
		$remainSeconds = $sec % 3600;
		$minutes = floor($remainSeconds / 60);
		$seconds = intval($sec-(3600*$hours)-(60*$minutes));
		
		echo str_pad($hours,2,"0",STR_PAD_LEFT).':'.str_pad($minutes,2,"0",STR_PAD_LEFT).':'.str_pad($seconds,2,"0",STR_PAD_LEFT);
	}
	
	//获得题目
	public function getQuestion(){
		if(!session('sutudyappid')){return false;}
		//1.判断当前用户是否购买了本套应用
		
		//2判断当前项目的类型，根据类型，选择不同的模板
		$questionid = $_POST['questionid'];
		
		$this->assign('questionid',$questionid);
		$this->display('questions');
	}
	
	//问题下面的按钮
	public function questionbuttons(){
		$questionid = $_POST['questionid'];
		$this->assign('pqid',$questionid-1);
		$this->assign('nqid',$questionid+1);
		$this->assign('mqid',$questionid);
		$this->display();
	}
	
}
?>