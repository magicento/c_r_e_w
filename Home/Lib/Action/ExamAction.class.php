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
		if(!$_GET['istest']){
			session('istest',null);
		}
		//cookie(null);
		$this->assign('pagetitle','船员身份验证');
		$this->display();
	}
	
	public function training(){
		//dump(session('身份证号'));exit;//座位号
		//dump(session('seatNo'));exit;//座位号
		
		//获得题目的总数 生成右上角类似日历的表格
		$topics_total = session('currentapp_question_num');
		$tables = ceil($topics_total/30);
		$alltables = '';
		for ($i = 0; $i < $tables; $i++){
			$alltables .= '<table class="topicslist topicslist'.$i.'">';
			for ($l = 1;$l <= 5;$l++){
				$alltables .= '<tr>';
				for ($r = 0;$r < 6;$r++){
					$alltables .= '<td>';
					$tid = $l+(5*$r)+($i*30);
					if($tid <= $topics_total){
						$alltables .= $tid;
					}
					$alltables .= '</td>';
				}
				$alltables .= '</tr>';
			}
			$alltables .= '</table>';
		}
		
		//dump(cookie('markquestionid'));
		$this->assign('alltables',$alltables);
		$this->assign('pagetitle','练习');
		$this->display();
	}
	
	public function mark(){
		$questionid = $_POST['questionid'];
		$topics_total = session('currentapp_question_num');
		$h = ceil($topics_total/4);
		$t = 1;
		
		//把当前APP中的题目再查询一次
		$questions = D('Question')->where('appid='.session('sutudyappid'))->select();
		$topicslistmark = '';
		$topicslistmark .= '<table class="topicslistmark">';
		for ($l = 1;$l <= $h;$l++){
			$topicslistmark .= '<tr>';
			for ($r = 0;$r < 4;$r++){
				
				//判断是否被标记了,如果有就标记当前题目
				if(strpos(cookie('markquestionid'), '__'.$t.'__') !== false){
					$biaojiti = "biaojiti";
				}else{
					$biaojiti = "";
				}
				
				//判断是否为当前题
				if($t == $questionid){
					$dangqianti = "dangqianti";
				}else{
					$dangqianti = '';
				}
				
				//如果当前题和标记题目重复，则标记题优先
				if($biaojiti && $dangqianti){
					$dangqianti = ' zhuangqiangliao';
				}
				
				$topicslistmark .= '<td><span class="'.$biaojiti.$dangqianti.' ">';
				$tid = $t++;
				if($tid <= $topics_total){
					$youranswer = cookie('studentanswerforid'.$questions[$t-2]['id']);
					$topicslistmark .= $tid.'.['.$questions[$t-2]['type'].']'.$youranswer;
				}
				$topicslistmark .= '</span></td>';
			}
			$topicslistmark .= '</tr>';
		}
		$topicslistmark .= '</table>';
		//dump($topicslistmark);exit;
		//echo cookie('markquestionid');
		$this->assign('topicslistmark',$topicslistmark);
		$this->assign('questionid',$questionid);
		$this->display();
	}
	
	public function doexamlogin(){
		if($_POST['idCard'] == $_SESSION['userinfo']['identitycard']){
			$rs = D('Question')->where('appid='.session('sutudyappid'))->count('id');
			session('seatNo',$_POST['seatNo']);
			session('begintime',time());
			session('currentapp_question_num',$rs);
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
		
		//2.判断是否是随机考试
		$questionid = $_POST['questionid'];
		if(session('istest')){
			//是测试
		}else{
			//是练习
			$questionid_ = $questionid-1;
			$question = D('Question')->limit($questionid_.",1")->select();
			$answer = D('QuestionAnswer')->where('questionid='.$question[0]['id'])->select();
		}
		
		if($question[0]['type'] == '多选'){
			$inputtype = 'checkbox';
		}
		if($question[0]['type'] == '单选'){
			$inputtype = 'radio';
		}
		
		$this->assign('studentanswerforid',cookie('studentanswerforid'.$question[0]['id']));
		$this->assign('question',$question[0]);
		$this->assign('inputtype',$inputtype);
		$this->assign('answer',$answer);
		$this->assign('questionid',$questionid);
		$this->display('questions');
	}
	
	//问题下面的按钮
	public function questionbuttons(){
		$questionid = $_POST['questionid'];
		
		if($questionid == session('currentapp_question_num')){
			$nqid = '';
		}else{
			$nqid = $questionid+1;
		}
		
		//判断是否被标记了
		if(strpos(cookie('markquestionid'),'__'.$questionid.'__') === false ){
			$undisabled = 'disabled';
			$this->assign('undisabled',$undisabled);
		}else{
			$disabled = 'disabled';
			$this->assign('disabled',$disabled);
		}
		
		$this->assign('pqid',$questionid-1);
		$this->assign('nqid',$nqid);
		$this->assign('mqid',$questionid);
		$this->display();
	}
	
	//标记题目
	public function markquestion(){
		$questionid = $_POST['questionid'];
		//cookie('markquestionid',null);
		if(cookie('markquestionid')){
			$markquestionid = cookie('markquestionid');
		}
		$markquestionid_new = $markquestionid.'__'.$questionid.'__';
		cookie('markquestionid',$markquestionid_new);
	}
	
	//取消标记题目
	public function unmarkquestion(){
		$questionid = $_POST['questionid'];
		//cookie('markquestionid',null);
		if(cookie('markquestionid')){
			$markquestionid = cookie('markquestionid');
		}

		$markquestionid_new = str_replace('__'.$questionid.'__', '', $markquestionid);
		if($markquestionid_new == ''){
			$markquestionid_new = null;
		}
		cookie('markquestionid',$markquestionid_new);
	}
	
	//保存答案
	public function saveAnswer(){
		$question_true_id = $_POST['question_true_id'];
		$answer = $_POST['answer'];
		$answertype = $_POST['answertype'];
		
		if($answertype == 'checkbox'){
			//判断已经存在的答案
			if(cookie('studentanswerforid'.$question_true_id)){
				$oldanswer = cookie('studentanswerforid'.$question_true_id);
			
				$newarray = array();
				for($i=0;$i<strlen($oldanswer);$i++){
					array_push($newarray, $oldanswer[$i]);
				}
				//添加新答案
				array_push($newarray, $answer);
				//排序A-Z,去重复，并把新答案赋值给$answer
				$newarray_ = array_unique($newarray);
				sort($newarray_);
				$answer = implode('',$newarray_);
			}
		}
		
		cookie('studentanswerforid'.$question_true_id,$answer);
	}
	
	//更新答案
	public function savecaneledAnswer(){
		$question_true_id = $_POST['question_true_id'];
		$answer = $_POST['answer'];
		$answertype = $_POST['answertype'];
		
		if($answertype == 'checkbox'){
			if(cookie('studentanswerforid'.$question_true_id)){
				$oldanswer = cookie('studentanswerforid'.$question_true_id);
				
				$newarray = array();
				for($i=0;$i<strlen($oldanswer);$i++){
					array_push($newarray, $oldanswer[$i]);
				}
				//删除当前答案
				foreach ($newarray as $key=>$value){
					if($value == $answer){
						unset($newarray[$key]);
					}
				}
				
				//排序A-Z,去重复，并把新答案赋值给$answer
				$newarray_ = array_unique($newarray);
				sort($newarray_);
				if(empty($newarray_)){
					$answer = null;
				}else{
					$answer = implode('',$newarray_);
				}
				
			}
		}
		
		cookie('studentanswerforid'.$question_true_id,$answer);
	}
	
	
	
	
}
?>