<?php 

class UserModel extends Model
{
	protected $_validate = array(
		array('username','require','用户名必须！'), //默认情况下用正则进行验证
		array('username','','用户名已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		array('password','require','密码必须！'), //默认情况下用正则进行验证
		array('email','','用邮箱已经被占用！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		array('email','email','邮箱不符合规则！'), //默认情况下用正则进行验证
	);

	protected $_auto = array(
		array('status','1'),  // 新增的时候把status字段设置为1
		array('block','0'),  // 新增的时候把block字段设置为0,未激活状态
	    array('password','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	    array('name','getName',1,'callback'), // 对name字段在新增的时候回调getName方法
	    array('registerDate','time',1,'function'), // 对注册时间字段在新增的时候写入当前时间戳
	    array('lastvisitDate','time',3,'function'), // 对最后登陆时间字段在创建和修改的时候写入当前时间戳
	);


	function getName(){
		$data = $_POST['username'];
		return $data;
	}

	function aa(){
		$user = M('user');
        $list = $user->find();
        return $list;
	}
}
 ?>