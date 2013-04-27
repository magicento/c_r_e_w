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
}
?>