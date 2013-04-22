<?php
class CommonAction extends Action {
	
	public function _empty($name){
		redirect(__APP__.'/Public/login');
	}
	
	public function _initialize() {
		header ( "Content-Type:text/html; charset=utf-8" );
		import ( 'ORG.Util.Cookie' );
		// 用户权限检查
		if (C ( 'USER_AUTH_ON' ) && ! in_array ( MODULE_NAME, explode ( ',', C ( 'NOT_AUTH_MODULE' ) ) )) {
			import ( 'ORG.Util.RBAC' );
			if (! RBAC::AccessDecision ()) {
				// 检查认证识别号
				if (! $_SESSION [C ( 'USER_AUTH_KEY' )]) {
					// 跳转到认证网关
					redirect ( PHP_FILE . C ( 'USER_AUTH_GATEWAY' ) );
				}
				// 没有权限 抛出错误
				if (C ( 'RBAC_ERROR_PAGE' )) {
					// 定义权限错误页面
					redirect ( C ( 'RBAC_ERROR_PAGE' ) );
				} else {
					if (C ( 'GUEST_AUTH_ON' )) {
						$this->assign ( 'jumpUrl', PHP_FILE . C ( 'USER_AUTH_GATEWAY' ) );
					}
					// 提示错误信息
					$this->error ( L ( '_VALID_ACCESS_' ) );
				}
			}
		}
	}
	
	public function index(){
		$name = $this->getActionName();
		$model = D($name);		
		//分页开始
		$count = $model->count();
		import('ORG.Util.Page');// 导入分页类
		$Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('header','条数据');
	 	//搜索条件
	 	$searchtext = $this->_post('searchtext');
		$map = $this->_searchs($searchtext);
		if(empty($searchtext)){
			$map = null;
		} 
		$list = $model->limit($Page->firstRow.','.$Page->listRows)->where($map)->select();
		
		
		//排序
		if($this->_request('sortby')){
			$list = $this->sortby($list, $this->_request('sortby'),$this->_request('order'));
		}
		
		//排序切换
		$order = $this->getSortby($list[0]);
	
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		
		return array($list,$order,$show);
	} 
	
		
	//新增一条记录
	function insert() {
		$name = $this->getActionName();
		$model = D($name);
		if (false === $model->create()) {
			$this->error($model->getError());
		}
		//保存当前数据对象
		$list = $model->add();
		if ($list !== false) { //保存成功
			$this->success('新增成功!',cookie('_currentUrl_'));
		} else {
			//失败提示
			$this->error('新增失败!');
		}
	}
	
	//读取一条记录
	function read() {
		$this->edit();
	}
	
	function edit() {
		$name = $this->getActionName();
		$model = M($name);
		$id = $_REQUEST [$model->getPk()];
		$vo = $model->getById($id);
		return $vo;
	}
	
	//更新一条记录
	function update() {
		$name = $this->getActionName();
		$model = D($name);
		if (false === $model->create()) {
			$this->error($model->getError());
		}
		// 更新数据
		$list = $model->save();
		if (false !== $list) {
			//成功提示
			$this->success('编辑成功!',cookie('_currentUrl_'));
		} else {
			//错误提示
			$this->error('编辑失败!');
		}
	}
	
	public function delete() {
		//删除指定记录
		$name = $this->getActionName();
		$model = M($name);
		if (!empty($model)) {
			$pk = $model->getPk();
			$id = $_REQUEST [$pk];
			if (isset($id)) {
				$condition = array($pk => array('in', explode(',', $id)));
				$list = $model->where($condition)->setField('status', - 1);
				if ($list !== false) {
					$this->success('删除成功！');
				} else {
					$this->error('删除失败！');
				}
			} else {
				$this->error('非法操作');
			}
		}
	}
	
	public function foreverdelete(){
		//删除指定记录
		$name = $this->getActionName();
		$model = D($name);
		if (!empty($model)) {
			$pk = $model->getPk();
			$id = $_REQUEST [$pk];
			if (isset($id)) {
				$condition = array($pk => array('in', explode(',', $id)));
				if (false !== $model->where($condition)->delete()) {
					$this->success('删除成功！');
				} else {
					$this->error('删除失败！');
				}
			} else {
				$this->error('非法操作');
			}
		}
		$this->forward();
	}
	
	public function clear() {
		//删除指定记录
		$name = $this->getActionName();
		$model = D($name);
		if (!empty($model)) {
			if (false !== $model->where('status=1')->delete()) {
				$this->success(L('_DELETE_SUCCESS_'),$this->getReturnUrl());
			} else {
				$this->error(L('_DELETE_FAIL_'));
			}
		}
		$this->forward();
	}
	
	/**
	 +----------------------------------------------------------
	 * 默认禁用操作
	 *
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @return string
	 +----------------------------------------------------------
	 * @throws FcsException
	 +----------------------------------------------------------
	 */
	public function forbid() {
		$name = $this->getActionName();
		$model = D($name);
		$pk = $model->getPk();
		$id = $_REQUEST [$pk];
		$condition = array($pk => array('in', $id));
		$list = $model->forbid($condition);
		if ($list !== false) {
			$this->success('状态禁用成功',$this->getReturnUrl());
		} else {
			$this->error('状态禁用失败！');
		}
	}
	
	public function checkPass() {
		$name = $this->getActionName();
		$model = D($name);
		$pk = $model->getPk();
		$id = $_GET [$pk];
		$condition = array($pk => array('in', $id));
		if (false !== $model->checkPass($condition)) {
			$this->success('状态批准成功！',$this->getReturnUrl());
		} else {
			$this->error('状态批准失败！');
		}
	}
	
	public function recycle() {
		$name = $this->getActionName();
		$model = D($name);
		$pk = $model->getPk();
		$id = $_GET [$pk];
		$condition = array($pk => array('in', $id));
		if (false !== $model->recycle($condition)) {
			$this->success('状态还原成功！',$this->getReturnUrl());
		} else {
			$this->error('状态还原失败！');
		}
	}
	
	public function recycleBin() {
		$map = $this->_search();
		$map ['status'] = - 1;
		$name = $this->getActionName();
		$model = D($name);
		if (!empty($model)) {
			$this->_list($model, $map);
		}
		$this->display();
	}
	
	/**
	 +----------------------------------------------------------
	 * 默认恢复操作
	 *
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @return string
	 +----------------------------------------------------------
	 * @throws FcsException
	 +----------------------------------------------------------
	 */
	function resume() {
		//恢复指定记录
		$name = $this->getActionName();
		$model = D($name);
		$pk = $model->getPk();
		$id = $_GET [$pk];
		$condition = array($pk => array('in', $id));
		if (false !== $model->resume($condition)) {
			$this->success('状态恢复成功！',$this->getReturnUrl());
		} else {
			$this->error('状态恢复失败！');
		}
	}
	
	function saveSort() {
		$seqNoList = $_POST ['seqNoList'];
		if (!empty($seqNoList)) {
			//更新数据对象
			$name = $this->getActionName();
			$model = D($name);
			$col = explode(',', $seqNoList);
			//启动事务
			$model->startTrans();
			foreach ($col as $val) {
				$val = explode(':', $val);
				$model->id = $val [0];
				$model->sort = $val [1];
				$result = $model->save();
				if (!$result) {
					break;
				}
			}
			//提交事务
			$model->commit();
			if ($result !== false) {
				//采用普通方式跳转刷新页面
				$this->success('更新成功');
			} else {
				$this->error($model->getError());
			}
		}
	}
	
	
	
	/**
	 * +-----------------------------------------------------------
	 * 查询列表根据字段返回 三种状态 用于输出到模板
	 * +-----------------------------------------------------------
	 */
	protected function getSortby($list){
		$map = array();
		foreach ($list as $key => $val) {
			if (isset($_REQUEST ['sortby']) && $_REQUEST ['sortby'] == $key) {
				//正向
				if($_REQUEST['order']=='asc'){
					$map[$key]['s'] = 'desc';
					$map[$key]['p'] = 'asc';
				}
				//反向
				if($_REQUEST['order']=='desc'){
					$map[$key]['s'] = 'nat';
					$map[$key]['p'] = 'desc';
				}
				//自然
				if($_REQUEST['order']=='nat'){
					$map[$key]['s'] = 'asc';
					$map[$key]['p'] = '';
				}
			}else{
				$map[$key]['s'] = 'asc';
			}
		}
		return $map;
	}
	
	/**
	 * +----------------------------------------------------------
	 * 数据排序
	 * +----------------------------------------------------------
	 */
	protected function sortby($list,$field,$sortby='asc'){
		if(is_array($list)){
			$refer = $resultSet = array();
			foreach($list as $i => $data){
				$refer[$i] = &$data[$field];
			}
			switch($sortby){
				case 'asc': // 正向排序
					asort($refer);
					break;
				case 'desc':// 逆向排序
					arsort($refer);
					break;
				case 'nat': // 自然排序
					natcasesort($refer);
					break;
			}
			foreach($refer as $key=> $val){
				$resultSet[] = &$list[$key];
			}
			return $resultSet;
		}
		return false;
	}
	
	/**
	 * +----------------------------------------------------------
	 * 数据查询，生成查询where的条件。
	 * +----------------------------------------------------------
	 */
	protected function _searchs($searchtext) {
        $name = $this->getActionName();
        $model = D($name);
        $map = '';
        $fields = '';
        foreach ($model->getDbFields() as $key => $val) {
				if($key==0){
					$fields .= $val;
				}else{
					$fields .= '|'.$val;
				}
        }
        $map[$fields] = array('like','%'.$searchtext.'%','OR');
        return $map;
    } 
	
	/**
	 * +----------------------------------------------------------
	 * 系统取回当前路径
	 * +----------------------------------------------------------
	 */
	public function location($model = '', $action = '', $root_id = 24) {
		$model = $model == '' ? MODULE_NAME : $model;
		$action = ACTION_NAME;
		$action = $action == '' ? 'index' : $action;
		$filename = DATA_PATH . "~location.php";
		if (file_exists ( $filename )) {
			// 存在缓存文件
			$cloation = Include $filename;
			$var = '当前位置:' . $cloation [strtoupper ( $model )] ['title'] . '>>' . $cloation [strtoupper ( $model )] ['_ch'] [$action] ['title'];
			return $var;
		} else {
			// 不存在缓存
			$conditon ['status'] = array (
					'eq',
					1 
			);
			$_model_ = D ( "Node" );
			$list = $_model_->where ( $conditon )->Findall ( array (
					'Field' => 'id,name,title,remark,level,pid' 
			) );
			if (( int ) $root_id == 0) {
				// 取回RBAC 相关值 建议手动输入 以减少服务器开销
				$node_info = $_model_->getByName ( APP_NAME );
				$root_id = $node_info ['id'];
			}
			$cloation = array ();
			if (is_array ( $list )) {
				// 创建基于主键的数组引用
				$refer = array ();
				foreach ( $list as $key => $data ) {
					$refer [$data ["id"]] = & $list [$key];
				}
				foreach ( $list as $key => $data ) {
					// 判断是否存在parent
					$parentId = $data ["pid"];
					if ($root_id == $parentId) {
						$cloation [$data ['name']] = & $list [$key];
					} else {
						if (isset ( $refer [$parentId] )) {
							$parent = & $refer [$parentId];
							$parent ["_ch"] [$data ['name']] = & $list [$key];
						}
					}
				}
			}
			$content = "<?php\nreturn " . var_export ( array_change_key_case ( $cloation, CASE_UPPER ), true ) . ";\n?>";
			file_put_contents ( $filename, $content );
			$var = '当前位置:' . $cloation [$model] ['title'] . '>>' . $cloation [$model] ['_ch'] [$action] ['title'];
			return $var;
		}
	}

}
?>