<?php
Class EmptyAction extends CommonAction{
	
	public function _initialize(){
		parent::_initialize();
	}
	
	public function index(){
		$this->redirect('/');
	}

}
?>