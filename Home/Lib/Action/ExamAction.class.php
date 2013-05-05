<?php
Class ExamAction extends CommonAction{
	
	public function _initialize(){
		parent::_initialize();
		if(!session('sutudyappid')){
			$this->redirect('/User/myapp');
		}
	}
	
	public function _empty(){
		$this->redirect('/');
	}
	
	public function index(){
		
	}
	
	public function login(){
		//cookie(null);
		$this->assign('pagetitle','船员身份验证');
		$this->display();
	}
	
	
	public function training(){
		//dump(session('身份证号'));exit;//座位号
		//dump(session('seatNo'));exit;//座位号
		
		//获得题目的总数 生成右上角类似日历的表格
		$url = $_SERVER["HTTP_REFERER"];//获取完整的来路URL
		
		if(strpos($url, '/selecttype/sutudyappid/') === false){
			$this->redirect('/User/myapp');
		}
		
		//初始化
		$this->init_question();
		$idarr = session('all_questions_id');
		session('currentapp_question_num',count($idarr));
		
		$topics_total = session('currentapp_question_num');
		$tables = ceil($topics_total/30);
		$getidjointtrueidarray = getidjointtrueid();
		//dump($getidjointtrueidarray);
		
		//应用相关信息
		$sappid = session('sutudyappid');
		$join = 'think_appcourse ON think_appcourse.id = think_app.courseid';
		$field = 'think_app.*,think_appcourse.title as coursetitle';
		$where['think_app.id'] = $sappid;
		$rs = D('App')->join($join)->field($field)->where($where)->find();
		$this->assign('rs',$rs);

		$alltables = '';
		for ($i = 0; $i < $tables; $i++){
			$alltables .= '<table class="topicslist topicslist'.$i.'">';
			for ($l = 1;$l <= 5;$l++){
				$alltables .= '<tr>';
				for ($r = 0;$r < 6;$r++){
					$tid = $l+(5*$r)+($i*30);
					//曾经回答过的当前题目的答案
					$youranswer = cookie('studentanswerforid'.$getidjointtrueidarray[$tid]);
					if($youranswer){
						$trueanswer = D('Question')->where('id='.$getidjointtrueidarray[$tid])->find();
						if($youranswer == $trueanswer['answer']){
							$m = 'r';
						}else{
							$m = 'w';
						}
						if(session('istest')){
							$m = 't';
						}
						unset($youranswer);
					}
					$alltables .= '<td class="'.$m.'">';	
					unset($m);				
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
		$this->assign('pagetitle','题库练习与考试');
		$this->display();
	}
	
	public function mark(){
		$questionid = $_POST['questionid'];
		$topics_total = session('currentapp_question_num');
		$h = ceil($topics_total/4);
		$t = 1;
		
		//把当前APP中的题目再查询一次
		$questions = session('all_questions_id');
		
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
					if($youranswer == ''){
						$youranswer = '未做答';
					}
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
			session('seatNo',$_POST['seatNo']);
						
			//清空之前的做题 COOKIE 信息
			emptycookie('markquestionid');
			emptycookie('studentanswerforid');
			emptycookie('listquestionid');
			session('all_questions_id',null);

			$this->redirect('Public/selecttype','sutudyappid='.session('sutudyappid'));
		}else{
			$this->error('身份证号码不正确！','/index.php/Exam/login');
		}
	}
	
	public function doexamlogin2(){

			//清空之前的做题 COOKIE 信息
			emptycookie('markquestionid');
			emptycookie('studentanswerforid');
			emptycookie('listquestionid');
			session('all_questions_id',null);
			session('begintime',time());
	
			$this->redirect('Exam/training');
	}
	
	//获得时间 将秒转换成 时分秒
	public function timer(){
		$begintime = session('begintime');
		$sec = time()-$begintime;
		
		$hours = floor($sec / 3600);
		$remainSeconds = $sec % 3600;
		$minutes = floor($remainSeconds / 60);
		$seconds = intval($sec-(3600*$hours)-(60*$minutes));
		
		$gotime = str_pad($hours,2,"0",STR_PAD_LEFT).':'.str_pad($minutes,2,"0",STR_PAD_LEFT).':'.str_pad($seconds,2,"0",STR_PAD_LEFT);
		
		//剩下多少题没有做
		$leftquestionum = session('currentapp_question_num') - countcookie('studentanswerforid');
		
		echo $gotime.'##'.$leftquestionum;
		
	}
	
	//题目ID初始化
	private function init_question(){
		
		//判断当前用户是否购买了本套应用
		$uid = session('user_id');
		$myappid = D('Userextend')->where('uid='.$uid)->find();
			
		$myappidarr = split(',', $myappid['appid']);
		if(!in_array(session('sutudyappid'), $myappidarr)){
			echo 'nopermission';exit;
		}
		
		$where['appid'] = session('sutudyappid');
		$where['isdel'] = 0;
		
		if(session('istest')){
			//echo session('istest');//是测试
			//如果是考试，那么第一次进来 就要把所有题目的ID和顺序存入Cookie
			if(!session('all_questions_id')){
				$all_rand_questions = D('Question')->where($where)->field('id,type,answer')->order('rand()')->limit(session('website_examquestionnum'))->select();
				session('all_questions_id',$all_rand_questions);
			}
		}else{
			//是练习，也存入COOKIE，统一操作。
			if(!session('all_questions_id')){
				$all_questions = D('Question')->where($where)->field('id,type,answer')->select();
				session('all_questions_id',$all_questions);
			}
		}
	}
	
	//获得题目
	public function getQuestion(){
		if(!session('sutudyappid')){return false;}
		
		$questionid = $_POST['questionid'];
		$questionid_ = $questionid-1;
		
		//初始化
		$this->init_question();
		
		$idarr = session('all_questions_id');
		
		$question = D('Question')->where('id='.$idarr[$questionid_]['id'])->select();
		$answer = D('QuestionAnswer')->where('questionid='.$question[0]['id'])->select();
		
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
		$questionid = $_POST['questionid'];
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
		cookie('listquestionid_'.$questionid,$question_true_id);
	}
	
	//更新答案
	public function savecaneledAnswer(){
		$question_true_id = $_POST['question_true_id'];
		$questionid = $_POST['questionid'];
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
		cookie('listquestionid_'.$questionid,$question_true_id);
	}
	
	//点击答案，更新右上角的题目列表对错显示
	public function updatequestionlistanswer(){

		$question_true_id  = $_POST['question_true_id'];
		$youranswer = cookie('studentanswerforid'.$question_true_id);
		$trueanswer = D('Question')->where('id='.$question_true_id)->find();
		//没有做答
		if(!$youranswer){
			echo 'null';
			exit;
		}
		//回答正确
		if($youranswer == $trueanswer['answer']){
			$r = 'right';
			if(session('istest')){
				$r = 'test';
			}
			echo $r;
			exit;
		}else{
			//回答错误
			$w = 'wrong';
			if(session('istest')){
				$w = 'test';
			}
			echo $w;
			exit;
		}
	}
	
	//交卷
	public function handinpaper(){
// 		dump($_SESSION);
// 		echo '<hr>';
// 		dump($_COOKIE);
		
		//每题平均多少分
		$per_score = 100/session('currentapp_question_num');
		$righti = 0;
		//取出所有题目的答案 根据正确答案去核对用户的选择
		$rightanswerarr = session('all_questions_id');
		foreach ($rightanswerarr as $key=>$value){
			$questiontureid = $value['id'];
			$questiontureanswer = $value['answer'];
			
			$questionyouranswer = cookie('studentanswerforid'.$questiontureid);
			if($questionyouranswer == $questiontureanswer){
				$righti++;
			}
		}
		
		emptycookie('markquestionid');
		emptycookie('studentanswerforid');
		emptycookie('listquestionid');
		session('all_questions_id',null);
		session('begintime',null);
		session('sutudyappid',null);

		$score = $righti*$per_score;
		$this->assign('score',round($score,1));
		
		$this->assign('pagetitle','考生成绩');
		$this->display();
	}
	
	
}
?>