<?php  
Class ConfigAction extends CommonAction{
	
	public function index(){
		$this->display();
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