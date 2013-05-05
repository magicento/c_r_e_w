<?php

class IndexAction extends CommonAction{
	
	public function _empty($name){
        redirect(__APP__.'/Index/index');
    }
    
    public function index(){
    	
    	$this->display();
    }

    public function main(){
    	$this->display();
    }

    public function admin_top(){
        $yourip = get_client_ip();
        if($yourip=='127.0.0.1'){$yourip = '58.49.177.2';}
        import('ORG.Net.IpLocation');// 导入IpLocation类
        $Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
        $area = $Ip->getlocation($yourip); // 获取某个IP地址所在的位置
        // dump($area);
        
        $where['key'] = 'sitename';
        $rs = D('Config')->where($where)->find();

        $this->assign('sitename',$rs['value']);
        $this->assign('area',$area);

    	$this->display();
    }

    public function admin_menu(){
    	$this->display();
    }

    // 后台首页 查看系统信息
    public function welcome() {
        $info = array(
            '操作系统'=>PHP_OS,
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式'=>php_sapi_name(),
            'ThinkPHP版本'=>THINK_VERSION.' [ <a href="http://thinkphp.cn" target="_blank">查看最新版本</a> ]',
            '上传附件限制'=>ini_get('upload_max_filesize'),
            '执行时间限制'=>ini_get('max_execution_time').'秒',
            '服务器时间'=>date("Y年n月j日 H:i:s"),
            '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            '剩余空间'=>round((@disk_free_space(".")/(1024*1024)),2).'M',
            'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
            'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
            'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
            );
        $this->assign('info',$info);
        
        //会员查询
        $usernum = D('User')->where('block=0')->count();
        $ordernum = D('Order')->where('trade_status<>"TRADE_FINISHED"')->count();
        $allmoney = D('Order')->where('trade_status="TRADE_FINISHED"')->sum('total_fee');
        
        $this->assign('usernum',$usernum);
        $this->assign('ordernum',$ordernum);
        $this->assign('allmoney',$allmoney);
        
        $this->display();
    }

}