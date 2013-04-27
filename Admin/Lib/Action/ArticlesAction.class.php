<?php  
Class ArticlesAction extends CommonAction{
	
	public function index(){

		//查询条件
		if($_GET['cid'] !== null){
			if($_GET['cid'] !== 0){
				$where['cid'] = $_GET['cid'];
			}
		}
		
		//分页开始
		$count = D('Articles')->where($where)->count();
		import('ORG.Util.Page');// 导入分页类
		$Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('header','条数据');
		
		//查询所有文章 
		$list = D('Articles')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		$show = $Page->show();// 分页显示输出
		
		$cid = D('ArticlesCatogery')->select();
		
		$this->assign('page',$show);// 赋值分页输出		
		$this->assign('cid',$cid);
		$this->assign('postcid',$_GET['cid']);
		$this->assign('list',$list);

		$this->display();
	} 
	
	//添加文章
	public function add(){
		//列表
		if($_GET['id']){
			$article = D('Articles')->where('id='.$_GET['id'])->find();
			$this->assign('article',$article);
			//判断文章是下载类，还是展示类
			if(($article['cid'] == 4) || ($article['cid'] == 5)){
				$hidden1 = 'hidden';
			}else{
				$hidden2 = 'hidden';
			}
		}
		
		$cid = D('ArticlesCatogery')->select();
		$this->assign('cid',$cid);
		$this->assign('hidden1',$hidden1);
		$this->assign('hidden2',$hidden2);
		$this->display();
	} 
	
	public function kindedtor(){
		dump($_POST);
		$this->display();
	}
	
	public function doadd(){
		//修改或者添加
		$_POST['content'] =  htmlspecialchars(stripslashes($_POST['content']));
		$_POST['ctime'] = time();
		if(empty($_POST['isdel'])){
			$_POST['isdel'] = 0;
		}
		if($_POST['id']){
			D('Articles')->save($_POST);
			$rs = $_POST['id'];
		}else{
			$rs = D('Articles')->add($_POST);
		}
		
		if($rs){
			$this->success('操作成功','__APP__/Articles/add/id/'.$rs);
		}else{
			$this->success('操作失败','__APP__/Articles/add/id/'.$rs);
		}
		
	}
	
	//删除文章
	public function deletenews(){
		$delcid = $_POST['delcid'];
		$delcidarr = explode(',', $delcid);
		foreach ($delcidarr as $key=>$value){
			D('Articles')->where('id='.$value)->delete();
		}
	}
}
?>