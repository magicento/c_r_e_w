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
		if(jq('input.uservali').val() == ''){
			alerts('验证码不能为空！');
			return false;
		}
	});
	
	//添加文章验证
	jq('input.submitnews').click(function(){
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
			jq('tr.articledownlink').show();
		}else{
			jq('tr.articlecontentstr,tr.articledestr,tr.articlekeywordstr').show();
			jq('tr.articledownlink').hide();
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
	
});
