<?php 
Class CityAction extends Action{
	public function index(){
		$city = D('city');	
		$alist = $city->field('id,name,pid,path,concat(path,"-",id) as bpath')->order('bpath')->select();
		$this->assign('alist',$alist);
		//dump($alist);

		// 分页 开始
		$count = $city->count();
		import('ORG.Util.Page');// 导入分页类
		$Page = new Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		// $list = $city->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
		$list = $city->field('id,name,pid,path,concat(path,"-",id) as bpath')->order('bpath')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		// 分页结束

		$this->display();
	}

	public function insert(){
		// $city = new CityModel();
		$city = D('City');
		$vo = $city->create();
		if($vo){
			if($city->add()){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}else{
			$this->error($city->getError());
		}
	}

	public function update(){
		$city = D('City');
		$id = $this->_get('id');
		$name = $this->_get('name');
		if(empty($id)){
			$this->error('参数ID有误！');
		}
		if($city->where("name='".$name."'")->find()){
			$this->error('已经存在，请重新输入！');
		}
		$city->id = $id;
		$city->name = $name;
		if($city->save()){
			$this->success('更新成功！');
		}else{
			$this->error('更新失败！');
		}	
	}

	public function updateAjax(){
		$city = D('City');
		$vo = $city->create();
		if($vo){
			if($city->save()){
				$this->ajaxReturn($this->_post('name'),'success',1);
			}else{
				$this->ajaxReturn('修改失败','error',0);
			}
		}else{
			$this->ajaxReturn($city->getError(),'create-error',0);
		}
	}


	public function delete(){
		$city = D('city');
		$id = $this->_get('id',intval,0);
		$onecity = $city->find($id);
		if(empty($onecity)){
			$this->error('此地区不存在！');
		}else{
			$fid = $city->where('pid='.$onecity['id'])->find();
			if($fid){
				$this->error('请先删除此地区下面的子区域！');
			}else{
				$city->delete($cityid);
				$this->success('删除成功！');
			}
		}


	}
}
?>