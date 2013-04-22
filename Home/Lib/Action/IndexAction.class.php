<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

	public function _initialize(){
		header("Content-Type:text/html; charset=utf-8");
		$this->assign('browser',browser());
		userautologin();
	}
    public function index(){
        $ip = get_client_ip();
        $ip = get_client_true_ip();
        import('ORG.Net.IpLocation');// 导入IpLocation类
        $Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
        $area = $Ip->getlocation('175.189.217.197'); // 获取某个IP地址所在的位置
        //dump($area);
		//$this->show('我来了','utf-8');		
		//$this->show(C('DB_USER'));

		

		$this->assign('pagetitle','网站首页');
		$this->display();
		// $this->display('index','utf-8','text/html');
		// $this->display('login');
		// $this->display('User:login');
		// $this->display('./Home/Tpl/default/Index/index.html');
    }

    public function login(){
    	echo __ROOT__.'<br>';
    	echo __APP__.'<br>';
    	echo __URL__.'<br>';
    	echo __ACTION__.'<br>';
    	echo __SELF__.'<br>';
    	echo APP_NAME.'<BR>';
    	echo APP_PATH.'<BR>';
    	echo NOW_TIME.'<br>';
    	echo DATA_PATH.'<BR>';
    	echo THEME_NAME.'<br>';
    }
}