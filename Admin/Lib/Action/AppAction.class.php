<?php  
Class AppAction extends CommonAction{
	
	/*************************科目*******************************/
		
	public function listcourse(){
		
		//查询条件
		if($_GET['cid'] !== null){
			if($_GET['cid'] !== 0){
				$where['cid'] = $_GET['cid'];
			}
		}
		//分页开始
		$count = D('Appcourse')->where($where)->count();
		import('ORG.Util.Page');// 导入分页类
		$Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('header','条数据');
		
		//查询所有科目
		$join = ' think_appcatgory ON think_appcourse.cid = think_appcatgory.id';
		$field = 'think_appcourse.*,think_appcatgory.catgory as ctitle';
		$list = D('Appcourse')->where($where)->join($join)->field($field)->limit($Page->firstRow.','.$Page->listRows)->order('think_appcourse.id desc')->select();
		$show = $Page->show();// 分页显示输出
		
		//所有分类 
		$cid = D('Appcatgory')->select();
		
		$this->assign('page',$show);// 赋值分页输出		
		$this->assign('cid',$cid);
		$this->assign('postcid',$_GET['cid']);
		$this->assign('list',$list);
		$this->assign('order',$order);
		
		$this->display();
	}
	
	//添加科目
	public function addcourse(){
		//列表
		if($_GET['id']){
			$appcourse = D('Appcourse')->where('id='.$_GET['id'])->find();
			$this->assign('appcourse',$appcourse);
		}
	
		$cid = D('Appcatgory')->select();
		$this->assign('cid',$cid);
		$this->display();
	}
	
	public function doaddcourse(){
		//修改或者添加
		$_POST['ctime'] = time();

		if($_POST['id']){
			D('Appcourse')->save($_POST);
			$rs = $_POST['id'];
		}else{
			$rs = D('Appcourse')->add($_POST);
		}
	
		if($rs){
			$this->success('操作成功','__APP__/App/addcourse/id/'.$rs);
		}else{
			$this->success('操作失败','__APP__/App/addcourse/id/'.$rs);
		}
	
	}
	
	public function deletecourse(){
		$delcid = $_POST['delcid'];
		$delcidarr = explode(',', $delcid);
		foreach ($delcidarr as $key=>$value){
			D('Appcourse')->where('id='.$value)->delete();
		}
	}
	
	/*************************应用*******************************/
	public function listapp(){
	
		//查询条件 大类
		if($_GET['cid'] !== null){
			if($_GET['cid'] != 0){
				$where['think_appcatgory.id'] = $_GET['cid'];
				//获得当前分类的所有科目
				$course = D('Appcourse')->where('cid='.$_GET['cid'])->select();
				$this->assign('course',$course);
			}
		}
		if($_GET['courseid'] !== null){
			if($_GET['courseid'] != 0){
				$where['think_app.courseid'] = $_GET['courseid'];
				unset($where['think_appcatgory.id']);//忽略大类
			}
		}
	
		//分页开始
		$count = D('App')->where($where)->count();
		import('ORG.Util.Page');// 导入分页类
		$Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('header','条数据');
	
		//查询所有文章
		$join = 'think_appcourse ON think_appcourse.id = think_app.courseid';
		$join2 = 'think_appcatgory ON think_appcourse.cid = think_appcatgory.id';
		$field = 'think_app.*,think_appcourse.title as ctitle';
		$list = D('App')->join($join)->join($join2)->where($where)->field($field)->limit($Page->firstRow.','.$Page->listRows)->order('think_app.id desc')->select();
		//echo D('App')->getLastSql();
		$show = $Page->show();// 分页显示输出
	
		$cid = D('Appcatgory')->select();
	
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('cid',$cid);
		$this->assign('postcid',$_GET['cid']);
		$this->assign('postcourse',$_GET['courseid']);
		$this->assign('list',$list);
	
		$this->display();
	}
	
	//添加应用
	public function addapp(){
		//列表
		if($_GET['id']){
			$join = 'think_appcourse ON think_appcourse.id = think_app.courseid';
			$join2 = 'think_appcatgory ON think_appcourse.cid = think_appcatgory.id';
			$where = 'think_app.id='.$_GET['id'];
			$field = 'think_app.*,think_appcatgory.id as cid';
			$app = D('App')->join($join)->join($join2)->where($where)->field($field)->find();//dump($app);
			$this->assign('app',$app);
			
			//根据上面的父类ID查询科目
			$course = D('Appcourse')->where('cid='.$app['cid'])->select();//dump($course);

			//判断应用是下载类，还是试题类
			if(!empty($app['downloadurl'])){
				$showx = 'show';
			}
		}
	
		$cid = D('Appcatgory')->select();
		$this->assign('cid',$cid);
		$this->assign('course',$course);
		$this->assign('cid_cur',$cid_cur);
		$this->assign('showx',$showx);
		$this->display();
	}
	
	public function doaddapp(){

		$_POST['ctime'] = time();
		if(empty($_POST['isdel'])){
			$_POST['isdel'] = 0;
		}
		if($_POST['id']){
			D('App')->save($_POST);
			$rs = $_POST['id'];
		}else{
			$rs = D('App')->add($_POST);
		}
	
		if($rs){
			$this->success('操作成功','__APP__/App/addapp/id/'.$rs);
		}else{
			$this->success('操作失败','__APP__/App/addapp/id/'.$rs);
		}
	
	}
	
	//删除应用
	public function deleteapp(){
		$delcid = $_POST['delcid'];
		$delcidarr = explode(',', $delcid);
		foreach ($delcidarr as $key=>$value){
			$data['isdel'] = 1;
			D('App')->where('id='.$value)->save($data);
			unset($data);
		}
	}
	
	//上传LOGO
	public function doajaxfileupload(){
		$error = "";
		$msg = "";
		$fileElementName = 'fileToUpload';
		if(!empty($_FILES[$fileElementName]['error']))
		{
			switch($_FILES[$fileElementName]['error'])
			{
		
				case '1':
					$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
					break;
				case '2':
					$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
					break;
				case '3':
					$error = 'The uploaded file was only partially uploaded';
					break;
				case '4':
					$error = 'No file was uploaded.';
					break;
		
				case '6':
					$error = 'Missing a temporary folder';
					break;
				case '7':
					$error = 'Failed to write file to disk';
					break;
				case '8':
					$error = 'File upload stopped by extension';
					break;
				case '999':
				default:
					$error = 'No error code avaiable';
			}
		}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none')
		{
			$error = 'No file was uploaded..';
		}else
		{
			$msg .= " File Name: " . $_FILES['fileToUpload']['name'] . ", ";
			$msg .= " File Size: " . @filesize($_FILES['fileToUpload']['tmp_name']);
			//for security reason, we force to remove all uploaded file
						
			#允许的文件扩展名
			$allowed_types = array('jpg', 'gif', 'png');
			$filename = $_FILES['fileToUpload']['name'];
			#正则表达式匹配出上传文件的扩展名
			preg_match('|\.(\w+)$|', $filename, $ext);
			#print_r($ext);
			#转化成小写
			$ext = strtolower($ext[1]);
			#判断是否在被允许的扩展名里
			if(!in_array($ext, $allowed_types)){
				$error = '请上传jpg,gif,png三种类型的图片，大小最好控制为60*60';
			}else{
				$fname = time().'.'.$ext;
				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"./Public/images/appicon/".$fname);
			}
							
			@unlink($_FILES['fileToUpload']);
		}
		echo "{";
		echo				"error: '" . $error . "',\n";
		echo 				"fname:'".$fname."',\n";
		echo				"msg: '" . $msg . "'\n";
		echo "}";
	}
	
	public function getcourse(){
		$cid = $_POST['cid'];
		if(empty($cid)){
			echo '<option value="0">==请选择应用分类==</option>';
			exit;
		}
		$where['cid'] = $cid;
		$rs = D('Appcourse')->where($where)->select();
		echo '<option value="0">==请选择应用分类==</option>';
		foreach ($rs as $key=>$value){
			echo '<option value="'.$value['id'].'">';
			echo $value['title'];
			echo '</option>';
		}
	}
	
	/*************************题目*******************************/
	
	public function listquestions(){
	
		//查询条件 大类
		if($_GET['cid'] !== null){
			if($_GET['cid'] != 0){
				$where['think_question.cid'] = $_GET['cid'];
				//获得当前分类的所有科目
				$course = D('Appcourse')->where('cid='.$_GET['cid'])->select();
				$this->assign('course',$course);
			}
		}
		if($_GET['courseid'] !== null){
			if($_GET['courseid'] != 0){
				$where['think_question.courseid'] = $_GET['courseid'];
				 unset($where['cid']);//忽略大类
				//获得当前科目下面的应用
				$app = D('App')->where('courseid='.$_GET['courseid'])->select();
				$this->assign('app',$app);
			}
		}
		if($_GET['appid'] !== null){
			if($_GET['appid'] != 0){
				$where['think_question.appid'] = $_GET['appid'];
				unset($where['cid']);//忽略大类
				unset($where['courseid']);//忽略科目
			}
		}
	
		//分页开始
		$count = D('Question')->where($where)->count();
		import('ORG.Util.Page');// 导入分页类
		$Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('header','条数据');
	
		//查询所有题目
		$join = 'think_app ON think_app.id=think_question.appid';
		$field = 'think_question.*,think_app.title as apptitle';
		$list = D('Question')
				->join($join)
				->field($field)
				->where($where)
				->limit($Page->firstRow.','.$Page->listRows)
				->order('think_question.id desc')->select();
		//echo D('Question')->getLastSql();
		$show = $Page->show();// 分页显示输出
	
		$catogry = D('Appcatgory')->select();//dump($catogry);
	
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('catgory',$catogry);
		$this->assign('getcid',$_GET['cid']);
		$this->assign('getcourseid',$_GET['courseid']);
		$this->assign('getappid',$_GET['appid']);
		$this->assign('list',$list);
	
		$this->display();
	}
	
	//添加题目
	public function addquestions(){
		
		if($_GET['id']){
			$question = D('Question')->where('id='.$_GET['id'])->find();
			$this->assign('question',$question);
			
			$answers = D('QuestionAnswer')->where('questionid='.$question['id'])->select();
			
			$this->assign('answers',$answers);
		}
	
		$appid = D('App')->select();
		$this->assign('appid',$appid);
		$this->display();
	}
	
	//获得一个答案选项
	public function getnewanswer(){
		$answeridentify = $_POST['answeridentify'];
		$html = '<tr class="answertritembox">
				  <td width="20%" height="30" align="right" class="left_txt2">
					<input type="text" value="'.$answeridentify.'" name="answeridentify[]" class="answeridentifyid" />
				  </td>
				  <td width="3%">&nbsp;</td>
				  <td width="32%" height="30">
				  	<input type="text" name="answercontent[]" value="" class="answercontentid" /></td>
				  <td width="45%" height="30" class="left_txt rightansweridtd">
				  	正解:<input type="checkbox" name="rightanswer[]" class="rightanswerid" value="'.$answeridentify.'" />
				  	<img class="delansweritemimg" src="/Public/images/admin/publish_x.png" alt="删除" />
				  </td>
				</tr>';
		echo $html;
		
	}
	
	
	public function doaddquestion(){
		//修改或者添加
		$_POST['intro'] =  htmlspecialchars(stripslashes($_POST['intro']));
		$_POST['ctime'] = time();
		if(empty($_POST['isdel'])){
			$_POST['isdel'] = 0;
		}
		
		//获得当前appid的courseid 和 cid
		$app = D('App')->where('id='.$_POST['appid'])->field('courseid')->find();
		$course = D('Appcourse')->where('id='.$app['courseid'])->field('cid')->find();
		
		$_POST['cid'] = $course['cid'];
		$_POST['courseid'] = $app['courseid'];
		
		//正解
		$rightanswer = $_POST[rightanswer];
		sort($rightanswer);
		$_POST['answer'] = implode('',$rightanswer);
		
		//单选还是多选
		if(strlen($_POST['answer']) > 1){
			$_POST['type'] = '多选';
		}else{
			$_POST['type'] = '单选';
		}
		//dump($_POST);exit;
		//保存问题
		if($_POST['id']){
			D('Question')->save($_POST);
			$rs = $_POST['id'];
		}else{
			$rs = D('Question')->add($_POST);
		}
		
		//保存答案选项
		D('QuestionAnswer')->where('questionid='.$rs)->delete();
		
		foreach ($_POST['answeridentify'] as $key=>$value){
			$datas['questionid'] = $rs;
			$datas['answeridentify'] = $value;
			$datas['answercontent'] = $_POST['answercontent'][$key];
			D('QuestionAnswer')->add($datas);
			unset($datas);
		}
	
		if($rs){
			$this->success('操作成功','__APP__/App/addquestions/id/'.$rs);
		}else{
			$this->success('操作失败','__APP__/App/addquestions/id/'.$rs);
		}
	
	}
	
	//删除试题
	public function deletequestion(){
		$delcid = $_POST['delcid'];
		$delcidarr = explode(',', $delcid);
		foreach ($delcidarr as $key=>$value){
			$data['isdel'] = 1;
			D('Question')->where('id='.$value)->save($data);
		}
	}
}
?>