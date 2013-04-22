<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends CommonAction {

	public function _initialize(){
		parent::_initialize();
	}
	
	public function _empty(){
		$this->redirect('/');
	}
	
	public function iwantapply(){
		$this->display();
	}
	
    public function login(){
    	
    }

    public function insert(){
    	//注册用户的信息写入数据库
        $user = D('User');    
        $vo = $user->field('username,password,email,photo')->create();

        if($vo){
            $photoinfo = $this->upload();
            // dump($photoinfo);exit;
            $user->photo = $photoinfo[0]['savename'];
            if($user->add()){
                $this->success('注册成功');
            }else{
                $this->error('注册失败');
            }
        }else{
            $this->error($user->getError());
        }

    }

    public function update(){
        //注册用户的信息写入数据库
        $user =  M('user');
        if($user->create()){
            $user->password =  md5($user->password);
            $user->name = $user->username;
            if($user->save()){
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
        }
    }

    // 图片上传
    Public function upload(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  './Uploads/images/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
            }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
        }
        return $info;
    }
    
    //用户app
    public function myapp(){
    	$this->assign('appslist',array('a','b','c','d','a','b','c','d','a','b','c','d'));
    	$this->assign('pagetitle','我的应用');
    	$this->display();
    } 
    
    public function profile(){
    	$this->assign('pagetitle','修改资料');
    	$this->display();
    }
    
    public function changepwd(){
    	$this->assign('pagetitle','修改密码');
    	$this->display();
    }
    
    public function uploadavatar(){
    	$this->assign('pagetitle','上传头像');
    	$this->display();
    }
    
    public function allapp(){
    	$this->assign('appslist',array('a','b','c','d','a','b','c','d','a','b','c','d'));
    	switch ($_GET['gid']){
    		case 1:
    			$pagetitle = '适任证书（驾驶）';
    			break;
    		case 2:
    			$pagetitle = '适任证书（轮机）';
    			break;
    		case 3:
    			$pagetitle = '船员基本证书';
    			break;
    		case 4:
    			$pagetitle = '特殊船舶证书';
    			break;
    		case 5:
    			$pagetitle = '其它证书';
    			break;
    		default:
    			$pagetitle = '全部船员题库练习与模拟考试';
    	}
    	$this->assign('pagetitle',$pagetitle);
    	$this->display();
    }
    
    //购买APP
    public function buyapp(){
    	
    	$this->display();
    }
    //购买APP操作
    public function dobuy(){
    	//$rs：1/成功， 2/已经购买 ，3/购买失败
    	echo $rs = 1;
    }
    
    //修改用户资料
    public function domodifyuserinfo(){
    	$data = $_POST;
    	//验证码
    	if(md5($data['verify']) != session('verify')){
    		$this->error('验证码不正确！');
    	}
    	$data['address'] = $_POST['Province'].'--'.$_POST['City'].'--'.$_POST['Area'];
    	
    	//电话安全，不能是邮箱，也不能是身份证
    	$rs = D('User')->where('tel="'.$data['tel'].'" or email="'.$data['tel'].'" or identitycard="'.$data['tel'].'"')->find();
    	if($rs){
    		$this->error('修改失败，此手机已经被注册！');
    	}
    	$id = D('User')->where('id='.session('user_id'))->save($data);
    	parent::getUserinfo();
    	$this->redirect('index.php/User/profile');
    }
    
    //修改用户密码
    public function dochangepwd(){
    	$data = $_POST;
    	if(md5($data['password0']) != $_SESSION['userinfo']['password']){
    		$this->error('原密码不正确！');
    	}
    	if(strlen(trim($data['password'])) < 7){
    		$this->error('密码长度不能小于7位');
    	}
    	if(trim($data['password']) != trim($data['password2'])){
    		$this->error('两次密码不一致，请重新输入！');
    	}
    	$data['password'] = md5($data['password']);
    	D('User')->where('id='.session('user_id'))->save($data);
    	parent::getUserinfo();
    	$this->success('恭喜您：密码修改成功!');
    }

}