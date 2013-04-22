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

		$this->assign('vo', $vo);
		
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
		// $this->display();
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

	} 
}
?>