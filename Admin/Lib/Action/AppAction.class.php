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
	
		//查询条件
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
			$app = D('App')->where('id='.$_GET['id'])->find();
			$this->assign('app',$app);
			//获得应用的分类
			$field = 'think_appcatgory.id as cid';
			$join = ' think_appcourse ON think_appcatgory.id = think_appcourse.cid';
			$where = 'think_appcourse.cid ='.$app['courseid'];
			$rs = D('Appcatgory')->field($field)->join($join)->where($where)->find();

			$cid_cur = $rs['cid'];
			
			//根据上面的父类ID查询科目
			$course = D('Appcourse')->where('cid='.$cid_cur)->select();

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
}
?>