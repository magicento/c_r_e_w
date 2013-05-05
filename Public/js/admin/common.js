var jq = jQuery.noConflict();
var __APP__ = '/admin.php/';

//获得选中复选框的值
function jqchk(name){  //jquery获取复选框值    
  var chk_value =[];    
  jq('input[name="'+name+'"]:checked').each(function(){    
   chk_value.push(jq(this).val());    
  });    
  if(chk_value.length==0){
  	art.dialog({
			title:'操作失败',
		    content: '对不起，您至少要选择一条记录！',
		    icon:'warning',
		    cancelVal: '关闭',
		    cancel: true //为true等价于function(){}
		});
	return false;
  }else{
  	return chk_value;
  }
}

//全选
function checkAll(name,ths){
	//alert(jq(ths).attr("checked"));
	if(jq(ths).attr("checked")!='checked'){
		jq("[name='"+name+"']").removeAttr("checked");//取消全选
	}else{
		jq("[name='"+name+"']").attr("checked",'true');//全选 
	}	
}

//系统错误提示
function alerts(msg){
	jq('div.bshade').show();
	art.dialog({title:'系统提示',content: msg,icon:'face-sad',cancelVal: '关闭',cancel: true,fixed: true,close:function(){
		jq('div.bshade').hide();
    }});
}

//应用图片上传
function ajaxFileUpload()
{
	jq.ajaxFileUpload
	(
		{
			url:__APP__+'App/doajaxfileupload',
			secureuri:false,
			fileElementId:'fileToUpload',
			dataType: 'json',
			data:{name:'logan', id:'id'},
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined')
				{
					if(data.error != '')
					{
						alerts(data.error);
					}else
					{
						//alerts(data.msg);
						jq('img.applogo').attr('src','/Public/images/appicon/'+data.fname);
						jq('img.applogo').show();
						jq('input#logo').val(data.fname);
					}
				}
			},
			error: function (data, status, e)
			{
				alerts(e);
			}
		}
	)
	
	return false;

}

//手动确认订单
function sdqrsk(orderid){
	
	art.dialog({
		title:'警告',
	    content: '如果点击确认，就代表您已经收到款项，此用户将会购买成功！',
	    icon:'warning',
	    ok: function () {
	    	jq.post(__APP__+'Config/confirmorder',{"orderid":orderid},function(data,status){
	    		if(status == 'success'){
	    			if(data == 'ok'){
	    				alerts('操作成功');
	    				window.location.reload();
	    			}else{
	    				alerts(data);
	    			}
	    		}else{
	    			alerts('网络延时，操作失败，请稍后重试！');
	    		}
	    	});
	    },
	    cancelVal: '关闭',
	    cancel: true //为true等价于function(){}
	});
	return false;

}

jq(function(){
	//登陆自动到输入框
	if(jq('input.useraccount').length !=0 ){
		jq('input.useraccount')[0].focus();
	}
	jq('form.loginform input#Submit').click(function(){
		if(jq('input.useraccount').val() == ''){
			alerts('用户名不能为空！');
			return false;
		}
		if(jq('input.userpwd').val() == ''){
			alerts('密码不能为空！');
			return false;
		}
		if(jq('input.userpwdmishi').val() == ''){
			alerts('密匙不能为空！');
			return false;
		}
		if(jq('input.uservali').val() == ''){
			alerts('验证码不能为空！');
			return false;
		}
	});
	
	//添加文章验证
	jq('form.addarticleform input.submitnews').click(function(){
		if(jq('input[name="title"]').val().length == 0){
			alerts('标题必填！');return false;
		}
		if(jq('select#cid').val() == 0){
			alerts('请选择分类！');return false;
		}
	});
		
	//如果添加的是下载链接，那么，则不显示文章选项、
	jq('select.addormodifyarticlecid').change(function(){
		var cid = jq(this).val();
		if((cid == 4) || (cid == 5)){
			jq('tr.articlecontentstr,tr.articledestr,tr.articlekeywordstr').hide();
			jq('tr.articledownlinks').show();
		}else{
			jq('tr.articlecontentstr,tr.articledestr,tr.articlekeywordstr').show();
			jq('tr.articledownlinks').hide();
		}
	});
	
	//过虑指定分类的文章 
	jq('form#newslistform select#cid,form#newslistform select.applistpage').change(function(){
		jq('form#newslistform').submit();
	});
	
	//发布应用，分类和科目的联动、
	jq('select.addormodifyappcatgoryid').change(function(){
		var cid = jq(this).val();
		jq.post(__APP__+'App/getcourse',{'cid':cid},function(data,status){
			if(status == 'success'){
				jq('select#courseid').html(data);
			}
		});
	});
	
	jq('span.isdownload input').click(function(){
		if(jq(this).attr("checked") == 'checked'){
			jq('tr.articledownlink').show();
		}else{
			jq('tr.articledownlink').hide();			
		}
	});
	
	//添加一个答案
	jq('span.addnewanswer').click(function(){
		
	    Array.prototype.S=String.fromCharCode(2);  
	    Array.prototype.in_array=function(e)  
	    {  
	    	var r=new RegExp(this.S+e+this.S);  
	    	return (r.test(this.S+this.join(this.S)+this.S));  
	    }  
	    
		var arrabc = new Array();
		jq('table.answertable tr.answertritembox input.answeridentifyid').each(function(){
			arrabc.push(jq(this).val());
		});
		var abcd = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
		for(i = 0; i < abcd.length;i++){
			if(!(arrabc.in_array(abcd[i]))){
				answeridentify = abcd[i];
				break;
			}
		}		
		//alert(answeridentify);return false;
		jq.post(__APP__+'App/getnewanswer',{"answeridentify":answeridentify},function(data,status){
			if(status == 'success'){
				if(jq('table.answertable tr.answertritembox:last').length == 0){
					jq('table.answertable tr.submitquestitemtrbox').before(data);
				}else{
					jq('table.answertable tr.answertritembox:last').after(data);
				}				
			}
		});
		
	});
	
	//删除一个答案选项
	jq('img.delansweritemimg').die().live('click',function(){
		var thsanswer = jq(this).parent().parent();
		art.dialog({
			title:'警告',
		    content: '您确定真的要删除此答案选项么？',
		    icon:'warning',
		    ok: function () {
		    	thsanswer.remove();
		    },
		    cancelVal: '关闭',
		    cancel: true //为true等价于function(){}
		});
		return false;
	});
	
	//提交问题
	jq('form.postquestionform input.submitnews').click(function(){
		if(jq('input#title').val() == ''){
			alerts('问题必填！');
			return false;
		}
		if(jq('select#appid').val() == 0){
			alerts('应用分类必选！');
			return false;
		}
		if(jq('input.answercontentid').length < 2){
			alerts('至少要添加2个答案选项！');
			return false;
		}
		if(jq('input.answercontentid').val() == 0){
			alerts('答案选项的内容必填！');
			return false;
		}
		if(jq('input.rightanswerid:checked').length == 0){
			alerts('至少要指定一个正确的答案！');
			return false;
		}
		
	});
	
	//添加科目
	jq('form.addcourseform input.submitcourse').click(function(){
		if(jq('input#title').val() == ''){
			alerts('科目标题必填！');
			return false;
		}
		if(jq('select#cid').val() == 0){
			alerts('科目所属分类必选！');
			return false;
		}
	});
	
	//添加应用
	jq('form.addappform input.submitapp').click(function(){
		if(jq('input#title').val() == ''){
			alerts('请填写应用名称！');
			return false;
		}
		if(jq('select#cid').val() == 0){
			alerts('请选择分类！');
			return false;
		}
		if(jq('select#courseid').val() == 0){
			alerts('请选择科目！');
			return false;
		}
		if(jq('input#logo').val() == ''){
			alerts('请先上传LOGO！');
			return false;
		}
		if(jq('input#testqishu').val() == ''){
			alerts('请输入期数！');
			return false;
		}
		if(jq('input#testcode').val() == ''){
			alerts('请输入应用代码！');
			return false;
		}
		if(jq('input#suitableusers').val() == ''){
			alerts('请输入对象描述！');
			return false;
		}
		if(jq('input#price').val() == ''){
			alerts('请输入价格！');
			return false;
		}
		if(jq('input#hitnum').val() == ''){
			alerts('请输入（基数）应用上线以后的默认下载量！');
			return false;
		}
		if(jq('textarea#discription').val() == ''){
			alerts('应用描述必填！');
			return false;
		}
		if(jq('input#downloadurlcheckbox').attr("checked") == 'checked'){
			if(jq('input#downloadurl').val() == ''){
				alerts('下载的文件名必填！');
				return false;
			}
		}
	});
	
	//删除信息
	jq('table.cityliststb td a.delete').click(function(){
		var alink= jq(this).attr('href');
		art.dialog({
			title:'警告',
		    content: '您确定真的要删除此区域么？',
		    icon:'warning',
		    ok: function () {
		    	window.location.href=alink;
		        return false;
		    },
		    cancelVal: '关闭',
		    cancel: true //为true等价于function(){}
		});
		return false;
	});	

	//删除用户
	jq('a.delalink.user').click(function(){
		var chk_value = jqchk('cid');
		var ajaxparam = 'delcid=';
		for(i = 0; i < chk_value.length; i++){
			ajaxparam += chk_value[i]+',';
		}
		var ajaxparam = ajaxparam.substring(0,ajaxparam.length-1);
		if(chk_value){
			art.dialog({
			title:'警告',
		    content: '您确定真的要删除选中的用户么？',
		    icon:'warning',
		    ok: function () {
		    	jq.post(__APP__+'User/deluser',ajaxparam,function(data,status){
		    		if(status == 'success'){
		    			window.location.reload();
		    		}else{
		    			art.dialog({
							title:'警告',
						    content: '删除失败！',
						    icon:'warning',
						    cancelVal: '关闭',
						    cancel: true //为true等价于function(){}
						});
		    		}
		    	});
		    },
		    cancelVal: '关闭',
		    cancel: true //为true等价于function(){}
			});
		}
	});
	
	//删除文章
	jq('a.delalink.news').click(function(){
		var chk_value = jqchk('cid');
		var ajaxparam = 'delcid=';
		for(i = 0; i < chk_value.length; i++){
			ajaxparam += chk_value[i]+',';
		}
		var ajaxparam = ajaxparam.substring(0,ajaxparam.length-1);
		if(chk_value){
			art.dialog({
			title:'警告',
		    content: '您确定真的要删除选中的文章么？',
		    icon:'warning',
		    ok: function () {
		    	jq.post(__APP__+'Articles/deletenews',ajaxparam,function(data,status){
		    		if(status == 'success'){
		    			window.location.reload();
		    		}else{
		    			art.dialog({
							title:'警告',
						    content: '删除失败！',
						    icon:'warning',
						    cancelVal: '关闭',
						    cancel: true //为true等价于function(){}
						});
		    		}
		    	});
		    },
		    cancelVal: '关闭',
		    cancel: true //为true等价于function(){}
			});
		}
	});
	
	//删除科目
	jq('a.delalink.course').click(function(){
		var chk_value = jqchk('cid');
		var ajaxparam = 'delcid=';
		for(i = 0; i < chk_value.length; i++){
			ajaxparam += chk_value[i]+',';
		}
		var ajaxparam = ajaxparam.substring(0,ajaxparam.length-1);
		if(chk_value){
			art.dialog({
			title:'警告',
		    content: '您确定真的要删除选中的科目么？',
		    icon:'warning',
		    ok: function () {
		    	jq.post(__APP__+'App/deletecourse',ajaxparam,function(data,status){
		    		if(status == 'success'){
		    			window.location.reload();
		    		}else{
		    			art.dialog({
							title:'警告',
						    content: '删除失败！',
						    icon:'warning',
						    cancelVal: '关闭',
						    cancel: true //为true等价于function(){}
						});
		    		}
		    	});
		    },
		    cancelVal: '关闭',
		    cancel: true //为true等价于function(){}
			});
		}
	});
	
	//删除应用
	jq('a.delalink.app').click(function(){
		var chk_value = jqchk('cid');
		var ajaxparam = 'delcid=';
		for(i = 0; i < chk_value.length; i++){
			ajaxparam += chk_value[i]+',';
		}
		var ajaxparam = ajaxparam.substring(0,ajaxparam.length-1);
		if(chk_value){
			art.dialog({
			title:'警告',
		    content: '您确定真的要删除选中的应用么？',
		    icon:'warning',
		    ok: function () {
		    	jq.post(__APP__+'App/deleteapp',ajaxparam,function(data,status){
		    		if(status == 'success'){
		    			window.location.reload();
		    		}else{
		    			art.dialog({
							title:'警告',
						    content: '删除失败！',
						    icon:'warning',
						    cancelVal: '关闭',
						    cancel: true //为true等价于function(){}
						});
		    		}
		    	});
		    },
		    cancelVal: '关闭',
		    cancel: true //为true等价于function(){}
			});
		}
	});
	
	//删除考题
	jq('a.delalink.onlineapply').click(function(){
		var chk_value = jqchk('cid');
		var ajaxparam = 'delcid=';
		for(i = 0; i < chk_value.length; i++){
			ajaxparam += chk_value[i]+',';
		}
		var ajaxparam = ajaxparam.substring(0,ajaxparam.length-1);
		if(chk_value){
			art.dialog({
			title:'警告',
		    content: '您确定真的要删除选中的题目么？',
		    icon:'warning',
		    ok: function () {
		    	jq.post(__APP__+'App/deletequestion',ajaxparam,function(data,status){
		    		if(status == 'success'){
		    			window.location.reload();
		    		}else{
		    			art.dialog({
							title:'警告',
						    content: '删除失败！',
						    icon:'warning',
						    cancelVal: '关闭',
						    cancel: true //为true等价于function(){}
						});
		    		}
		    	});
		    },
		    cancelVal: '关闭',
		    cancel: true //为true等价于function(){}
			});
		}
	});
	
	//删除在线报名
	jq('a.delalink.onlineapply').click(function(){
		var chk_value = jqchk('cid');
		var ajaxparam = 'delcid=';
		for(i = 0; i < chk_value.length; i++){
			ajaxparam += chk_value[i]+',';
		}
		var ajaxparam = ajaxparam.substring(0,ajaxparam.length-1);
		if(chk_value){
			art.dialog({
			title:'警告',
		    content: '您确定真的要删除选中的信息么？',
		    icon:'warning',
		    ok: function () {
		    	jq.post(__APP__+'User/deletonlineapply',ajaxparam,function(data,status){
		    		if(status == 'success'){
		    			window.location.reload();
		    		}else{
		    			art.dialog({
							title:'警告',
						    content: '删除失败！',
						    icon:'warning',
						    cancelVal: '关闭',
						    cancel: true //为true等价于function(){}
						});
		    		}
		    	});
		    },
		    cancelVal: '关闭',
		    cancel: true //为true等价于function(){}
			});
		}
	});
	
	//删除订单
	jq('a.delalink.order').click(function(){
		var chk_value = jqchk('cid');
		var ajaxparam = 'delcid=';
		for(i = 0; i < chk_value.length; i++){
			ajaxparam += chk_value[i]+',';
		}
		var ajaxparam = ajaxparam.substring(0,ajaxparam.length-1);
		if(chk_value){
			art.dialog({
			title:'警告',
		    content: '您确定真的要删除选中的信息么？',
		    icon:'warning',
		    ok: function () {
		    	jq.post(__APP__+'Config/delorder',ajaxparam,function(data,status){
		    		if(status == 'success'){
		    			window.location.reload();
		    		}else{
		    			art.dialog({
							title:'警告',
						    content: '删除失败！',
						    icon:'warning',
						    cancelVal: '关闭',
						    cancel: true //为true等价于function(){}
						});
		    		}
		    	});
		    },
		    cancelVal: '关闭',
		    cancel: true //为true等价于function(){}
			});
		}
	});
	
});
