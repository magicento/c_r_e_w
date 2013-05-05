<?php  
Class UserAction extends CommonAction{
	
	public function _after_index(){
		$rs = $this->index();
		//查询用户的角色
		$list = $rs[0];
		$order = $rs[1];
		$roleuser = M('RoleUser');
		foreach ($list as $key=>$value){
			$userid = $value['id'];
			$rolelist = $roleuser->join('think_role ON think_role.id=think_role_user.role_id')->where('think_role_user.user_id='.$userid)->find();
			$list[$key]['rolename'] = $rolelist['name'];
		}
		$order = $this->getSortby($list[0]);
		
		$this->assign('list',$list);
		$this->assign('order',$order);
		$this->display();
	}
	
	public function _after_edit(){
		$vo = $this->edit();
		$role = M('role');
		$listrole = $role->field('id,name,pid,path,concat(path,"-",id) as bpath')->order('bpath')->select();
		$this->assign('listrole',$listrole);
		
		$roleuser = M('RoleUser');
		$userid = $vo['id'];
		$rolelist = $roleuser->join('think_role ON think_role.id=think_role_user.role_id')->where('think_role_user.user_id='.$userid)->find();
		$vo['roleid'] = $rolelist['id'];
		$vo['rolename'] = $rolelist['name'];
		
		$rsex = D('Userextend')->where('uid='.$userid)->find();
		$money = $rsex['money'];

		$this->assign('vo', $vo);
		$this->assign('money',$money);
		
		$this->display();
	}
	
 	//添加用户
	public function adduser(){
		$user = M('role');
		$listrole = $user->field('id,name,pid,path,concat(path,"-",id) as bpath')->order('bpath')->select();
		$this->assign('listrole',$listrole);
		$this->display();
	}

	//修改用户
	public function edituser(){
		$uid = $this->_request('uid');
		$model = D('User');
		$list = $model->where('User.id='.$uid)->find();
		$this->assign('list',$list);
// 		dump($list);		
		$user = M('role');
		$listrole = $user->field('id,name,pid,path,concat(path,"-",id) as bpath')->order('bpath')->select();
		$this->assign('listrole',$listrole);

		$this->display();
	}

	//删除用户
	public function deluser(){
		
		$delcid = $_POST['delcid'];
		$delcidarr = explode(',', $delcid);
		foreach ($delcidarr as $key=>$value){
			if($value != 1){
				//D('User')->where('id='.$value)->delete();
				$rs = D('User')->where('id='.$value)->field('block')->find();
				if($rs['block'] == 1){
					$data['block'] = 0;
				}else{
					$data['block'] = 1;
				}				
				D('User')->where('id='.$value)->save($data);
			}
		}
		
	}

	//添加用户add
	public function add(){
		$user = D('User');
		$validate = array(
			array('username','require','用户名必须！'), // 仅仅需要进行验证码的验证
			array('username','','用户名已经存在！',0,'unique',1),
			array('password','8,12','密码长度需要8-12位！',0,'length'), // 验证确认密码是否和密码一致
			array('repassword','password','两次密码不一致！',0,'confirm'), // 验证确认密码是否和密码一致
			// array('email','require','邮箱必须！'),
			array('email','email','邮箱地址不符合规则！'),
		);
		$auto = array(
			array('password','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
			array('createtime','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳
			// array('lastloginip','get_client_ip',1,'function'),
		);
		$user->setProperty("_validate",$validate);
		$user->setProperty("_auto",$auto);
		if($vo = $user->create()){
		 	if($newUserID = $user->add()){
		 		//添加用户到对应角色表
		 		$role = M('RoleUser');
		 		$data['role_id'] = $this->_post('userrole');
		 		$data['user_id'] = $newUserID;
		 		$role->add($data);
		 		$this->success('添加用户成功！');
		 	}else{
		 		$this->error('新增用户失败！');
		 	}
		}else{
		 	$this->error($user->getError());
		}
	}
	
	//修改用户save
	public function save(){
		if($_POST['money']){
			$where['id'] = $_POST['id'];
			$data['money'] = $_POST['money'];
			D('Userextend')->where($where)->save($data);
		}
		$this->redirect('User/index');
	}

	public function onlineapplylist(){
		$where['isdel'] = 0;
		//分页开始
		$count = D('Onlineapply')->where($where)->count();
		import('ORG.Util.Page');// 导入分页类
		$Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('header','条数据');
		
		//查询所有
		$list = D('Onlineapply')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		$show = $Page->show();// 分页显示输出
		
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('list',$list);
		
		$this->display();
	}
	
	public function deletonlineapply(){
		$delcid = $_POST['delcid'];
		$delcidarr = explode(',', $delcid);
		foreach ($delcidarr as $key=>$value){
			$data['isdel'] = 1;
			D('Onlineapply')->where('id='.$value)->save($data);

		}
	}
}
?>