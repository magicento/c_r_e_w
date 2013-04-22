<?php
class CityModel extends Model{

	protected $_validate = array(
		// array(验证字段,验证规则,错误提示,[,验证条件][,附加规则][,验证时间])
		array('name','','此地区已经存在！',0,'unique',3), // 在新增的时候验证name字段是否唯一
		array('verify','checkverify','验证码不正确', 1,'callback', 1), // 自定义函数验证密码格式
	);


	protected $_auto = array(
		// array(填充字段,填充内容,[填充条件,附加规则])
		array('path','mypath',1,'callback')
	);

	function mypath(){
		$pid=isset($_POST['pid'])?(int)$_POST['pid']:0;
		if($pid==0){
			return 0;
		}
		$list=$this->find($pid);
		$data = $list['path'].'-'.$pid;
		return $data;
	}
	function checkverify(){
		$verify = $_POST['verify'];
		if(session('verify') != md5($verify)) {
      		return false;
   		}else{
   			return true;
   		}
	}
}
?>