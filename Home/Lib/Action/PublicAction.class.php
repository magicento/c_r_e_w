<?php
Class PublicAction extends Action{
	
	public function _initialize(){
		header("Content-Type:text/html; charset=utf-8");
		$this->assign('browser',browser());
	}
	
	public function _empty(){
		$this->redirect('/');
	}
	
	public function reg(){
		// $user = new Model('user');
		$user = M('user');
		$list = $user->find();//查询一条记录
		$list = $user->select();
		$list = $user->where('id=1 and username="admin"')->select();
		$list = $user->getField('username,email,status',':');
		$list = $user->select(array('where'=>'id>1','limit'=>'2','order'=>'id desc'));
		$list = $user->where('id=1')->field('username,email')->select();
		 
		//多表查询table方法之数组
		$list = $user->table(array('think_user'=>'user','think_user_message'=>'message'))->where('user.id=message.uid')->select();
		//多表查询table方法之字符串
		$list = $user->table('think_user user,think_user_message message')->where('user.id=message.uid')->select();
		//另外还有：data();field();group();lmite();having();join();distinac();relation();lock();
		//$list = $user->distinac(true)->select();
	
		// dump($list);
	
		//更新表中的数据用save()方法，数据存放在data数组中。
		// $data['password'] = 'aaaa';
		// $list = $user->where('id=4')->save($data);
		//如果没有where，那data中得有主键元素
		// $data['id']= '4';
		// $data['password'] = 'cccc';
		// $list = $user->where('id=4')->save($data);
		//或者用data()方法
		// $list = $user->where('id=4')->data($data)->save();
		// dump($list);
		//这里的$list 为受影响的行数。
		/*
		 // $user2 = new UserModel();//自定义的model
		$user2 = D('User');//它可以实例后台的类  eg. $user = D('admin','user');或者分组后用 $user = D('admin.user');
		$list2 = $user2->aa();
		dump($list2);
	
		// $user3 = new Model();
		$user3 = M();
		$list3 = $user3->query('select * from think_user');
		dump($list3);
		*/
	
		//删除数据
		// $list = $user->delete(4);
		// $list = $user->where('id>4')->delete();
	
		//字段更新   加一 ，减一
		/*        $user->where('id=1')->setInc('money',2);//如不写2默认为1
		 $user->where('id=2')->setDec('money',1);//如不写2默认为1
		$user->where('id=3')->setField('money','100');*/
		$this->assign('pagetitle','会员注册');
		$this->display();
	}
	
	public function doreg(){
		$data = $_POST;
		//验证码
		if(md5($data['verify']) != session('verify')){
			$this->error('验证码不正确！');
		}
		//密码
		if(strlen(trim($data['password']))<6){
			$this->error('密码太短了，至少6位！');
		}
		if($data['password'] != $data['password2']){
			$this->error('两次密码不一致！');
		}
		//邮箱
		$rs = D('User')->where('email="'.$data['email'].'" or identitycard="'.$data['email'].'" or tel="'.$data['email'].'"')->find();
		if($rs){
			$this->error('此邮箱已经被注册！');
		}
		//身份证
		$rs = D('User')->where('identitycard="'.$data['identitycard'].'" or email="'.$data['identitycard'].'" or tel="'.$data['identitycard'].'"')->find();
		if($rs){
			$this->error('此身份证已经被注册！');
		}
		//电话安全，不能是邮箱，也不能是身份证
		$rs = D('User')->where('tel="'.$data['tel'].'" or email="'.$data['tel'].'" or identitycard="'.$data['tel'].'"')->find();
		if($rs){
			$this->error('此手机已经被注册！');
		}			
		
		//echo $_POST['Province'].'--'.$_POST['City'].'--'.$_POST['Area'];exit;
		
		
		$data['create_time'] = time();
		$data['last_login_time'] = $data['create_time'];
		$data['status'] = 1;
		$data['login_count'] = 1;
		$data['last_login_ip'] = get_client_true_ip();
		$data['password'] = md5($_POST['password']);
		$data['address'] = $_POST['Province'].'--'.$_POST['City'].'--'.$_POST['Area'];
		if($id = D('User')->add($data)){
			session('user_id',$id);
			$this->redirect('index.php/User/uploadavatar');
		}else{
			$this->redirect('index.php/Public/reg');
		}
	}
	
	public function checkidentitycard(){
		
		$identitycard = $_POST['identitycard'];
		//$identitycard = '420624198612117217x';
		if($identitycard){
			$baseurl = 'http://www.youdao.com/smartresult-xml/search.s?type=id&q='.$identitycard;
			$xml = file_get_contents($baseurl);
			$json = json_encode(simplexml_load_string($xml));
			echo $json;
			/* $data = json_decode($json);
			$location = $data->product->location;
			$birthday = $data->product->birthday;
			$gender = $data->product->gender; */
		}
	}
	
	public function dologin(){
		$data['email'] = $_POST['uaccount'];
		$data['tel'] = $_POST['uaccount'];
		$data['identitycard'] = $_POST['uaccount'];
		$data['_logic'] = 'OR';
		$map['_complex'] = $data;
		$map['password']  = array('eq',md5($_POST['password']));
		
		if(strlen(trim($_POST['uaccount'])) == 0){
			$this->error('用户名不能为空！');
		}
		if(strlen(trim($_POST['password'])) == 0){
			$this->error('密码不能为空！');
		}
		
		$rs = D('User')->where($map)->find();
		if($rs){
			$datas['last_login_time'] = time();
			$datas['last_login_ip'] = get_client_true_ip();
			D('User')->where('id='.$rs['id'])->setInc('login_count');
			D('User')->where('id='.$rs['id'])->save($datas);
			session('user_id',$rs['id']);
			//是否自动登陆 
			if($_POST['autoLogin']){
				cookie('autoLoginuserid',$rs['id'],360000);
			}			
			$this->redirect('index.php/User/allapp');

		}else{
			$this->error('用户名或者密码不正确！');
		}
	}
	
	public function logout(){
		session(null);//删除所有的session
		cookie('autoLoginuserid',null);
		$this->redirect('index.php');
	}
	
	function news(){
		$this->assign('pagetitle','新闻');
		$this->display();
		
	}
	
	function newslist(){
		$gid = $_GET['gid'];//新闻分类
		$this->assign('pagetitle','新闻列表');
		$this->display();
	
	}
	
	public function selectapp(){
		$sutudyappid = $_POST['sutudyappid'];
		if($sutudyappid){
			session('sutudyappid',$sutudyappid);
		}
	}
	
	public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}
	
	public function GBVerify(){
		import("ORG.Util.Image");
		Image::GBVerify($length=3, $type='png', $width=150, $height=50, $fontface='fanzhenjianzhiti.ttf', $verifyName='verify');
	}
}
?>