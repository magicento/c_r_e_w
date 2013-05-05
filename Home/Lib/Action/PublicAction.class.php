<?php
Class PublicAction extends InitAction{
	
	public function _initialize(){
		parent::_initialize();
		header("Content-Type:text/html; charset=utf-8");
		date_default_timezone_set('PRC');
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
			//添加用户扩展表
			$dataextend['uid'] = $id;
			D('Userextend')->add($dataextend);
			session('user_id',$id);
			//邮件通知，注册成功
			$body = '
			<html>
			  <body style="background:#DCEEFC url(\"http://img.cnbeta.com/bg.png\")">
			    <a href="http://www.crewexam.com/"><img style="border:none;" src="http://www.crewexam.com/Public/images/home/herderlogo.png" /></a><br /><br />
				您好:'.$rs['account'].',欢迎注册本站会员<br />
				请牢记您的注册信息如下：<br />
				邮箱：'.$data['email'].'<br />
				电话：'.$data['tel'].'<br />
				身份证：'.$data['identitycard'].'<br />
				<b>密码：'.$_POST['password'].'</b>
				<br /><br />
				说明：此邮件来自《中国航运导航网》系统，请不要回复。
			  </body>
			</html>';
			SendMail($data['email'],session('website_sitename')." 注册成功",$body);
			
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
		if($rs['block'] == 1){$this->error('此用户已经被锁定，请联系客服！');}
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
			$this->redirect('User/allapp');

		}else{
			$this->error('用户名或者密码不正确！');
		}
	}
	
	public function logout(){
		session(null);//删除所有的session
		cookie(null);
		cookie('autoLoginuserid',null);
		$this->redirect('index.php');
	}
	
	function news(){
		$id = $_GET['id'];
		$article = D('Articles')->where('id='.$id)->find();
		if($article['cid'] != 6){
			$description = true;
		}
		if($article['cid'] == 1){
			$morearticle = true;
			
			$randarticles = D('Articles')->where('cid=1')->order('rand()')->limit(6)->select();
			$this->assign('randarticles',$randarticles);
		}
		if($article['cid'] == 2 || $article['cid'] == 3){
			$description = false;
			$morearticle = false;
		}
		
		$this->assign('description',$description);
		$this->assign('morearticle',$morearticle);
		
		if(!empty($article['discription'])){
			$pagediscription = $article['discription'];
		}
		$this->assign('pagediscription',$pagediscription);

		$this->assign('pagetitle',$article['title']);
		$this->assign('article',$article);
		$this->display();
		
	}
	
	function newslist(){
		$cid = $_GET['cid'];//新闻分类
		
		$where['cid'] = $cid;
		
		$articlecatgory = D('ArticlesCatogery')->where('id='.$cid)->find();
		$this->assign('articlecatgory',$articlecatgory);
		
		//分页开始
		$count = D('Articles')->where($where)->count();
		import('ORG.Util.Page');// 导入分页类
		$Page = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('header','条');
		$Page->setConfig('theme','<div class="ttt">%upPage%</div> <div class="ttt">%downPage%</div> <div class="ttt">%prePage%</div>  <div class="linkPage">%linkPage%</div>  <div class="ttt">%nextPage%</div> <div class="ttt">%end%</div><div class="ttt">%totalRow%%header%</div>');
		
		$article = D('Articles')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		
		$pagetitle = $articlecatgory['ctitle'];
		
		$show = $Page->show();// 分页显示输出
		if($count > 15 ){
			$this->assign('page',$show);// 赋值分页输出
		}
		$this->assign('article',$article);
		$this->assign('pagetitle',$pagetitle);
		$this->display();
	
	}
	
	//ajax 把你的app ID 定下来
	public function selectapp(){
		$sutudyappid = $_POST['sutudyappid'];
		
		//判断是否有权限
		$uid = session('user_id');
		$myappid = D('Userextend')->where('uid='.$uid)->find();
		 
		$myappidarr = split(',', $myappid['appid']);
		if(!in_array($sutudyappid, $myappidarr)){
			echo 'nopermission';exit;
		}
		
		
		$type = $_POST['type'];
		if($sutudyappid){
			session('sutudyappid',$sutudyappid);
			if(empty($type)){
				session('istest',null);
			}else{
				session('istest',$type);
			}
			//echo session('istest');
		}
	}
	
	//点击进入考场时
	public function selecttype(){
		$sappid = $_GET['sutudyappid'];
		
		//判断当前用户是否购买了本套应用
		$uid = session('user_id');
		$myappid = D('Userextend')->where('uid='.$uid)->find();
			
		$myappidarr = split(',', $myappid['appid']);
		if(!in_array($sappid, $myappidarr)){
			$this->redirect('User/myapp');
			exit;
		}
	
		//应用相关信息
		$join = 'think_appcourse ON think_appcourse.id = think_app.courseid';
		$field = 'think_app.*,think_appcourse.title as coursetitle';
		$where['think_app.id'] = $sappid;
		$rs = D('App')->join($join)->field($field)->where($where)->find();
		
		$this->assign('rs',$rs);
		$this->assign('sappid',$sappid);
		$this->assign('pagetitle','考生基本信息');
		$this->display();
	}
	
	public function getpwd(){
		$this->display();
	}
	
	public function dogetpwd(){
		//发邮件
		$youremail = $_POST['youremail'];
		$rs = D('User')->where("email='".$youremail."'")->find();
		if(!$rs){
			echo 'noemail';exit;
		}
		//生成服务器端的KEY,保存在用户信息中
		$key = md5(md5(time()).time());
		$data['secretkey'] = $key;
		D('User')->where("email='".$youremail."'")->save($data);  
		$link = '<a tyle="color:red;font-weight:bolder;" href="http://www.crewexam.com/index.php/User/changepwd/secretkey/'.$key.'">点击这里修改密码！！！！</a>';
		$body = '
		<html>
		  <body style="background:#DCEEFC url(\"http://img.cnbeta.com/bg.png\")">
		    <a href="http://www.crewexam.com/"><img style="border:none;" src="http://www.crewexam.com/Public/images/home/herderlogo.png" /></a><br /><br />
			您好:'.$rs['account'].',<br />
			您点击链接重置密码：'.$link.',<font color="green">请登陆后，立即更新您的密码，以确保账户的安全！</font><br /><br />
			说明：此邮件来自《中国航运导航网》系统，请不要回复。
		  </body>
		</html>';
		
		SendMail($youremail,session('website_sitename')."修改新密码",$body);
		
		//$this->display('index');
	}
	
	public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}
	
	public function GBVerify2(){
		import("ORG.Util.Image");
		Image::GBVerify($length=3, $type='png', $width=150, $height=50, $fontface='fanzhenjianzhiti.ttf', $verifyName='verify');
	}
	
	public function GBVerify(){
		vendor('Yzm.checkcode');//用第三方验证码类
		YL_Security_Secoder::$useNoise = true;  // 要更安全的话改成true
		YL_Security_Secoder::$useCurve = true;
		YL_Security_Secoder::entry();
	}
	
	//支付
	public function doalipay(){
		//权限判断
		if(empty($_POST['appid'])){
			$this->error('无效操作！');
			exit;
		}
		$where['uid'] = session('user_id');
		$rs = D('Userextend')->where($where)->find();
		
		$rs_appid_arr = explode(',', $rs['appid']);
		if(in_array($_POST['appid'], $rs_appid_arr)){
			$this->error('请不要重复购买此产品！');
		}
		
		$appinfo = D('App')->where('id='.$_POST['appid'])->field('id,title,price')->find();
		
		//商户订单号
		$out_trade_no = time();
		$subject = '应用：'.$appinfo['id'].'--'.$appinfo['title'];
		
		//1.使用账户余额支付
		if($rs['money'] >= $appinfo['price']){
			D('Userextend')->where('uid='.session('user_id'))->setDec('money',$appinfo['price']);
			if(empty($rs['appid'])){
				$data['appid'] = $appinfo['id'];
			}else{
				$data['appid'] = $rs['appid'].','.$appinfo['id'];
			}
			$rs = D('Userextend')->where('uid='.session('user_id'))->save($data);
			if($rs){
				$order['orderid'] = $out_trade_no;
				$order['uid'] = session('user_id');
				$order['subject'] = $subject;
				$order['appid'] = $appinfo['id'];
				$userinfo = session('userinfo');
				$order['buyer_email'] = $userinfo['email'];
				$order['trade_no'] = '站内全额交易';
				$order['price'] = $appinfo['price'];
				$order['total_fee'] = $appinfo['price'];
				$order['trade_status'] = 'TRADE_FINISHED';
				$order['gmt_create'] = $out_trade_no;
				$order['gmt_payment'] = $out_trade_no;

				D('Order')->add($order);			
				$this->success('购买成功！','User/myapp');
			}else{
				D('Userextend')->where('uid='.session('user_id'))->setInc('money',$appinfo['price']);
				$this->success('购买失败！','User/allapp');
			}
			exit;
		}
		
		//2.账户余额+支付宝一起支付
		if(($rs['money'] > 0) && ($rs['money'] < $appinfo['price'])){
			$chajia = $appinfo['price'] - $rs['money'];
			D('Userextend')->where('uid='.session('user_id'))->setDec('money',$rs['money']);
						
			$order['orderid'] = $out_trade_no;
			$order['uid'] = session('user_id');
			$order['subject'] = $subject;	
			$order['appid'] = $appinfo['id'];
			$userinfo = session('userinfo');
			$order['buyer_email'] = $userinfo['email'];
			$order['trade_no'] = '站内部分余额交易';
			$order['price'] = $rs['money'];
			$order['total_fee'] = $rs['money'];
			$order['trade_status'] = 'TRADE_FINISHED';
			$order['gmt_create'] = $out_trade_no;
			$order['gmt_payment'] = $out_trade_no;
			
			D('Order')->add($order);
			
			//重新定义支付宝应该付款的金额和订单ID
			$appinfo['price'] = $chajia;
			$out_trade_no = $out_trade_no.'_alipay';
		}
		
		//3.使用支付宝余额支付
		vendor('Alipay.alipay#config');
		vendor('Alipay.lib.alipay_submit#class');
		$alipaySubmit = new AlipaySubmit($alipay_config);
		/**************************请求参数**************************/
		//支付类型
		$payment_type = "1";
		//必填，不能修改
		//服务器异步通知页面路径
		$notify_url = "http://www.crewexam.com/index.php/Public/alipay_notify";
		//需http://格式的完整路径，不能加?id=123这类自定义参数
		
		//页面跳转同步通知页面路径
		$return_url = "http://www.crewexam.com/index.php/Public/alipay_return";
		//需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
		
		//卖家支付宝帐户
		$seller_email = session('website_alipayemail');
		//必填
		
		//商户订单号
		//$out_trade_no = $out_trade_no;
		//商户网站订单系统中唯一订单号，必填
		
		//订单名称
		//$subject = '应用：'.$appinfo['id'].'--'.$appinfo['title'];
		//必填
		
		//付款金额
		$total_fee = $appinfo['price'];
		//必填
		
		//订单描述
		
		$body = 'crewexam.app.com';
		//商品展示地址
		$show_url = 'http://www.crewexam.com/index.php';
		//需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html
		
		//防钓鱼时间戳
		$anti_phishing_key = $alipaySubmit->query_timestamp();
		//若要使用请调用类文件submit中的query_timestamp函数
		
		//客户端的IP地址
		$exter_invoke_ip = get_client_ip();
		//非局域网的外网IP地址，如：221.0.0.1
		
		/************************************************************/
		
		//构造要请求的参数数组，无需改动
		$parameter = array(
				"service" => "create_direct_pay_by_user",
				"partner" => trim($alipay_config['partner']),
				"payment_type"	=> $payment_type,
				"notify_url"	=> $notify_url,
				"return_url"	=> $return_url,
				"seller_email"	=> $seller_email,
				"out_trade_no"	=> $out_trade_no,
				"subject"	=> $subject,
				"total_fee"	=> $total_fee,
				"body"	=> $body,
				"show_url"	=> $show_url,
				"anti_phishing_key"	=> $anti_phishing_key,
				"exter_invoke_ip"	=> $exter_invoke_ip,
				"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
		);
		
		//保存订单
		$order['orderid'] = $out_trade_no;
		$order['uid'] = session('user_id');
		$order['subject'] = $subject;
		$order['appid'] = $appinfo['id'];
		$userinfo = session('userinfo');
		$order['price'] = $total_fee;
		$order['total_fee'] = $total_fee;
		$order['trade_status'] = 'TRADE_PENDDING';
		$order['gmt_create'] = $out_trade_no;
			
		D('Order')->add($order);
		
		//建立请求
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "正在连接支付宝……");
		echo $html_text;
	}
	
	public function alipay_notify(){
		//业务逻辑处理
		vendor('Alipay.alipay#config');
		vendor('Alipay.lib.alipay_notify#class');
		
		//计算得出通知验证结果
		$alipayNotify = new AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyNotify();
		
		if($verify_result) {
			//商户订单号
			$out_trade_no = $_POST['out_trade_no'];
			//支付宝交易号
			$trade_no = $_POST['trade_no'];
			$trade_status = $_POST['trade_status'];
			
			if($_POST['trade_status'] == 'TRADE_FINISHED') {
				//普通即时到账...
				$where['trade_no'] = $out_trade_no;
				
				$data['buyer_email'] = $_POST['buyer_email'];
				$data['trade_status'] = $trade_status;
				$data['gmt_payment'] = $_POST['gmt_payment'];
				D('Order')->where($where)->save($data);
				$rs = D('Order')->where($where)->find();
				
				$where2['uid'] = $rs['uid'];
				$rs2 = D('Userextend')->where($where2)->find();
						
				$rs_appid_arr = explode(',', $rs2['appid']);
				if(in_array($rs['appid'], $rs_appid_arr)){
					echo "fail";
					exit;
				}else{
					if(empty($rs2['appid'])){
						$data2['appid'] = $rs['appid'];
					}else{
						$data2['appid'] = $rs2['appid'].','.$rs['appid'];
					}
					$rs = D('Userextend')->where('uid='.$rs['uid'])->save($data2);
				}
				
			}else if($_POST['trade_status'] == 'TRADE_SUCCESS'){
				//高级即时到账...
			}
			echo "success";
			exit;
		}else{
			echo "fail";
			exit;
		}
	}
	
	public function alipay_return(){
		vendor('Alipay.alipay#config');
		vendor('Alipay.lib.alipay_notify#class');
		
		$alipayNotify = new AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyReturn();
		if($verify_result) {
			$out_trade_no = $_GET['out_trade_no'];

			$trade_no = $_GET['trade_no'];
			
			$out_trade_no = $_GET['out_trade_no'];

			$trade_status = $_GET['trade_status'];

			if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
				//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//如果有做过处理，不执行商户的业务程序
				$where['trade_no'] = $trade_no;
				$where['orderid'] = $out_trade_no;
				$where['trade_status'] = $trade_status;
				$rs = D('Order')->where($where)->find();
				if(!$rs){
					$data['trade_status'] = $trade_status;
					$data['buyer_email'] = $_GET['buyer_email'];
					$data['gmt_payment'] = $_GET['gmt_payment'];
					D('Order')->where($where)->save($data);
					
					$rs = D('Order')->where($where)->find();
					
					$where2['uid'] = $rs['uid'];
					$rs2 = D('Userextend')->where($where2)->find();
					
					$rs_appid_arr = explode(',', $rs2['appid']);
					if(in_array($rs['appid'], $rs_appid_arr)){
						echo "fail";
						exit;
					}else{
						if(empty($rs2['appid'])){
							$data2['appid'] = $rs['appid'];
						}else{
							$data2['appid'] = $rs2['appid'].','.$rs['appid'];
						}
						$rs = D('Userextend')->where('uid='.$rs['uid'])->save($data2);
					}
				}
			}
			else {
				//echo "trade_status=".$_GET['trade_status'];
				$this->error($trade_status,'User/myapp');
			}
			
			$this->success('恭喜您，购买成功','User/myapp');
		}else{
			$this->error('支付失败，请联系客服或者重新操作！','User/myapp');
		}
	}
}
?>