<?php  
Class ConfigAction extends CommonAction{
	
	public function index(){
		$config = D('Config')->select();
		$this->assign('config',$config);
		$this->display();
	}
	
	//保存数据
	public function dosaveconfig(){
		foreach($_POST as $key=>$value){
			$data['value'] = $value;
			$rs = D('Config')->where('`key`="'.$key.'"')->save($data);
			unset($data);
		}
		$this->redirect('admin.php/Config/index');
	}

	public function create(){
		$this->show('创建成功！');
	}

	public function update(){
		$this->show('修改成功！');
	}

	public function delete(){
		$this->show('删除成功！');
	}
	
	//交易管理
	public function order(){
		$where['isdel'] = 0;
		
		//分页开始
		$count = D('Order')->where($where)->count();
		import('ORG.Util.Page');// 导入分页类
		$Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('header','条数据');
		$show = $Page->show();// 分页显示输出
		$join = 'think_user ON think_order.uid=think_user.id';
		$field = 'think_user.account,think_order.*';
		$list = D('Order')->where($where)->join($join)->field($field)->order('think_order.id desc')->select();
		$this->assign('list',$list);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	//删除记录
	public function delorder(){
		$delcid = $_POST['delcid'];
		$delcidarr = explode(',', $delcid);
		foreach ($delcidarr as $key=>$value){
			$data['isdel'] = 1;
			D('Order')->where('id='.$value)->save($data);
		}
	}
	
	public function confirmorder(){
		$orderid = $_POST['orderid'];
		$where['orderid'] = $orderid;
		$rs = D('Order')->where($where)->find();
		if($rs){
			$field = array("trade_status"=>"TRADE_FINISHED");
			D('Order')->where($where)->setField($field);
			//更新扩展表
			$where2['uid'] = $rs['uid'];
			$rs2 = D('Userextend')->where($where2)->find();
			
			$rs_appid_arr = explode(',', $rs2['appid']);
			if(in_array($rs['appid'], $rs_appid_arr)){
				echo "此用户已经购买过此产品了！";
				exit;
			}else{
				if(empty($rs2['appid'])){
					$data2['appid'] = $rs['appid'];
				}else{
					$data2['appid'] = $rs2['appid'].','.$rs['appid'];
				}
				$rs = D('Userextend')->where('uid='.$rs['uid'])->save($data2);
				echo 'ok';
			}
		}
	}
}
?>