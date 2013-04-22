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

jq(function(){
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
	jq('a.deluseralink').click(function(){
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
	
});
