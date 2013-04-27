<?php 
Class InitAction extends Action{
	public function _initialize(){
		header("Content-Type:text/html; charset=utf-8");
		
		//网址基本信息
		if(!session('website_sitename')){
			$rs = D('Config')->select();
			session('website_sitename2',$rs[10]['value']);
			session('website_siteurl',$rs[9]['value']);
			session('website_sitetonji',$rs[8]['value']);
			session('website_sitediscription',$rs[7]['value']);
			session('website_keywords',$rs[6]['value']);
			session('website_mymail',$rs[5]['value']);
			session('website_myqq',$rs[4]['value']);
			session('website_tel',$rs[3]['value']);
			session('website_beianhao',$rs[2]['value']);
			session('website_adminjiami',$rs[1]['value']);
			session('website_sitename',$rs[0]['value']);
		}
		
	}
}
?>