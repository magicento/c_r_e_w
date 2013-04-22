var jq = jQuery.noConflict();
var __APP__ = '/index.php/';

//系统错误提示
function alerts(msg){
	jq('div.bshade').show();
	art.dialog({title:'系统提示',content: msg,icon:'face-sad',cancelVal: '关闭',cancel: true,fixed: true,close:function(){
		jq('div.bshade').hide();
    }});
}

//身份证号码的验证 （15/18位） 
//欢迎验证、给予指正错误，从好多地方查来的资料修改的...已用本人身份证验证...  由于以前修改的问题无法验证带 X 的身份证号码，已修复!  
//为值添加0 
function Append_zore(temp)  
{  
    if(temp<10)   
    {  
        return "0"+temp;  
    }  
    else   
    {  
        return temp;  
    }  
}  

//身份证验证方法
//身份证号码验证     
function checkusrcardnum(ths){  
	//ths为input对象，在input上添加onchange(this)即可
    if(jq(ths).val()!=""){     
        //身份证的地区代码对照  
        var aCity = { 11: "北京", 12: "天津", 13: "河北", 14: "山西", 15: "内蒙古", 21: "辽宁", 22: "吉林", 23: "黑龙江", 31: "上海", 32: "江苏", 33: "浙江", 34: "安徽", 35: "福建", 36: "江西", 37: "山东", 41: "河南", 42: "湖北", 43: "湖南", 44: "广东", 45: "广西", 46: "海南", 50: "重庆", 51: "四川", 52: "贵州", 53: "云南", 54: "西藏", 61: "陕西", 62: "甘肃", 63: "青海", 64: "宁夏", 65: "新疆", 71: "台湾", 81: "香港", 82: "澳门", 91: "国外" };           
        //获取证件号码  
        var person_id=jq(ths).val();  
        //合法性验证  
        var sum = 0;  
        //出生日期  
        var birthday;  
        //验证长度与格式规范性的正则  
        var pattern=new RegExp(/(^\d{15}$)|(^\d{17}(\d|x|X)$)/i);         
        if (pattern.exec(person_id)) {  
            //验证身份证的合法性的正则  
            pattern=new RegExp(/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/);  
            if(pattern.exec(person_id)) {     
                //获取15位证件号中的出生日期并转位正常日期       
                birthday = "19"+person_id.substring(6,8)+"-"+person_id.substring(8,10)+"-"+person_id.substring(10,12);            
            }                 
            else   
            {     
                person_id = person_id.replace(/x|X$/i,"a");                       
                //获取18位证件号中的出生日期  
                birthday =person_id.substring(6,10)+"-"+person_id.substring(10,12)+"-"+person_id.substring(12,14);  
                  
                //校验18位身份证号码的合法性  
                for (var i = 17; i >= 0; i--)   
                {  
                    sum += (Math.pow(2, i) % 11) * parseInt(person_id.charAt(17 - i), 11);  
                }  
                if (sum % 11 != 1) {
                	alerts('对不起，身份证号码不符合国定标准，请核对！');
                    //jq("#person_id").val("");  
                    jq("#birthday").val("")                    
                    return false;  
                }             
            }  
            //检测证件地区的合法性                                  
            if (aCity[parseInt(person_id.substring(0, 2))] == null)   
            { 
            	alerts('对不起，证件地区未知，请核对！');
                //jq("#person_id").val("");  
                jq("#birthday").val("");               
                return false;  
            }  
            var dateStr = new Date(birthday.replace(/-/g, "/"));                  
              
            //alert(birthday +":"+(dateStr.getFullYear()+"-"+ Append_zore(dateStr.getMonth()+1)+"-"+ Append_zore(dateStr.getDate())))  
            if (birthday != (dateStr.getFullYear()+"-"+ Append_zore(dateStr.getMonth()+1)+"-"+ Append_zore(dateStr.getDate()))) { 
            	alerts('对不起，证件出生日期非法！');
                //jq("#person_id").val("");  
                jq("#birthday").val("");                   
                return false;  
            }    
            jq("#birthday").val(birthday);                 
        }  
        else  
        {           
        	alerts('对不起，证件号码格式非法！');
            jq("#person_id").val("");
            jq("#birthday").val("");
            return false;  
        }

    }  
    else  
    {  
    	alerts('对不起，请输入身份证号码！');
        jq("#birthday").val("");
        return false;
    }  
}//身份证方法结束

//用有道api进行身份证号码验证     
function checkidentitycard(ths){
	var id = jq(ths).val();
	var flag = false;
	jq.post(__APP__+'Public/checkidentitycard',{'identitycard':id},function(data,status){
		var jStr=JSON.stringify(data);
		if((data == null) || (jStr == '{}')){
			art.dialog({title:'系统提示',content: '身份证不合法，请重新输入！',icon:'face-sad',cancelVal: '确定',cancel: true,close:function(){
				jq('input#person_id').focus();
				jq('input#person_id').val('');
			}});
			
			flag = false;		
		}else{
			var birthday = data.product.birthday;
			var birthday = birthday.substring(0,4)+"-"+birthday.substring(4,6)+"-"+birthday.substring(6,8);
			jq("#birthday").val(birthday);
			
			var gender = data.product.gender;
			if(gender == 'm'){
				jq('input#sexman').attr('checked','checked');
			}else{
				jq('input#sexwoman').attr('checked','checked');
			}
			
			var location = data.product.location;
			jq('span.defaultarea').html('如：'+location);
			
			flag = true;
		}
		
	},"json");
	
	return flag;
}
//我要报名
function iwantapply(appid){
	jq('div.bshade').show();
	art.dialog.load(__APP__+'User/iwantapply/appid/'+appid,{title: '我要报名', width: 430, height: 475,fixed: true,close:function(){
		jq('div.bshade').hide();
    }});
}

//购买 app
function clicktobuy(appid){
	jq('div.bshade').show();
	art.dialog.load(__APP__+'User/buyapp/'+appid,{title: '立即购买此应用', width: 400, height: 150,fixed: true,close:function(){
		jq('div.bshade').hide();
    }});
}

/**************************************************************/
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

	//修改信息
	jq('table.cityliststb td a.update').click(function(){
		var alink= jq(this).attr('href');
		var atd = jq(this).parent().prev('td');
		function getNewcityName(name){
			return jq('input#'+name).val();
		}
		art.dialog({
			title:'请输入您要修改的内容！',
		    content: '<input tpye="text" id="newcityname" />',
		    icon:'face-smile',
		    ok: function () {
		    	newURL = alink+'/name/'+getNewcityName("newcityname");
		    	window.location.href=newURL;
		    	this.close;
		    },
		    cancelVal: '关闭',
		    cancel: true //为true等价于function(){}
		});
		return false;
	});	

	jq('table.cityliststb td a.updateajax').click(function(){
		var id = jq(this).attr('title');
		var atd = jq(this).parent().prev('td');
		var url = jq('span#cityajaxupdateurl').text();
		art.dialog({
			title:'请输入您要修改的内容！',
		    content: '<input tpye="text" id="newcityname" />',
		    icon:'face-smile',
		    ok: function () {
		    	var newcityname = jQuery('input#newcityname').val();
		    	jQuery.post(url,{"id":id,"name":newcityname,"__hash__":jQuery('input[name=__hash__]').val()},function(data,status){
		    		if(data.data == newcityname){
		    			jQuery(atd).html(data.data);
						art.dialog({
						    time: 1,
						    icon:'succeed',
						    content: '修改成功！'
						});
		    		}else{
		    			art.dialog({title:'错误！',icon:'warning',content:data.data,ok:true});
		    		}
		    	},'json');
		    	this.close;
		    },
		    cancelVal: '关闭',
		    cancel: true //为true等价于function(){}
		});
	})
	
	//用户登陆
	jq('form#loginForm input#email').focus(function(){
		var defaultv = '邮箱/身份证/电话号码';
		if(jq(this).val()==defaultv){
			jq(this).val('');
		}
	});
	jq('form#loginForm input#email').blur(function(){
		var defaultv = '邮箱/身份证/电话号码';
		if(jq(this).val()==''){
			jq(this).val(defaultv);
		}
	});
	jq('form#loginForm input#password').focus(function(){
		if(jq(this).val()==''){
			jq('.login-form dl.pwd .pwdtip').hide();
		}
	});
	jq('form#loginForm input#password').blur(function(){
		if(jq(this).val()==''){
			jq('.login-form dl.pwd .pwdtip').show();
		}
	});
	
	//首页点击登陆 
	jq('form#loginForm input#login.input-submit').click(function(){
		if((jq('input#email').val() == '邮箱/身份证/电话号码') || (jq('input#email').val() == '')){
			alerts('登陆用户名不能为空！');
			return false;
		}
		if(jq('input#password').val() == ''){
			alerts('登陆密码不能为空！');
			return false;
		}
	});
	
		
	//选择答案
	jq('table.answerbox tr td.abcheck input').click(function(){
		if(jq(this).attr("checked")=='checked'){
			jq(this).parent().parent().addClass('checked');
		}else{
			jq(this).parent().parent().removeClass('checked');
		}
	});
	
	if(jq(".reg-form #birthday").length != 0){
		//注册，用户的生日，日期选择器
		jq(".reg-form #birthday").datepicker();
	}
	
	if(jq(".reg-form #telephone").length != 0){
		//注册 输入框信息提示
		jq('.reg-form #person_id,.reg-form #usereamil,.reg-form #account,.reg-form #birthday,.reg-form #password,.reg-form #password2,.reg-form #telephone,.reg-form #verify').poshytip({
			className: 'tip-yellowsimple',
			showOn: 'focus',
			alignTo: 'target',
			alignX: 'right',
			alignY: 'center',
			offsetX: 5
		});
	}
	
	//点击购买
	jq('button.dobuy').live('click',function(){
		jq.post(__APP__+'User/dobuy',{},function(data,status){
			if(data == '1'){
				art.dialog({title:'系统提示',content: '恭喜你，购买成功！',icon:'succeed',cancelVal: '到我的应用中心查看',cancel: true,close:function(){
					window.location.href=__APP__+'User/myapp';
				}});
			}else if(data == 2){
				art.dialog({title:'系统提示',content: '很抱歉，你已经购买过此应用！',icon:'face-sad',cancelVal: '关闭',cancel: true,close:function(){
					//window.location.href=__APP__+'User/myapp';
				}});
			}else{
				art.dialog({title:'系统提示',content: '很抱歉，购买失败！系统忙，稍后重试！',icon:'error',cancelVal: '关闭',cancel: true,close:function(){
					//window.location.href=__APP__+'User/myapp';
				}});
			}
		})
	});
	
	//点击注册
	jq('input.regsubbutton').click(function(){
		if(jq('input#person_id').val() == ''){
			alerts('身份证号码不能为空');
			return false;
		}
		if(jq('input#account').val() == ''){
			alerts('姓名不能为空');
			return false;
		}
		if(jq('input#usereamil').val() == ''){
			alerts('邮箱不能为空');
			return false;
		}
		var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
		if(!myreg.test(jq('input#usereamil').val())){
			alerts('邮箱不能符合规则，请填写常用邮箱');
			return false;
		}
		if(jq('input#birthday').val() == ''){
			alerts('生日不能为空');
			return false;
		}
		if(jq('input#password').val() == ''){
			alerts('密码不能为空');
			return false;
		}
		if(jq('input#password2').val() == ''){
			alerts('重复密码不能为空');
			return false;
		}
		if(jq('input#password2').val() != jq('input#password').val()){
			alerts('两次密码不一致！');
			return false;
		}
		
		if(jq('input#telephone').val().length < 7){
			alerts('电话号码不太正常');
			return false;
		}
		if(jq('select[name=Province]').val() == '' || jq('select[name=City]').val() == '' || jq('select[name=Area]').val() == ''){
			alerts('请填写完整的所在地');
			return false;
		}
		
		if(jq('input#verify').val() == ''){
			alerts('验证码不能为空');
			return false;
		}
		if(jq('input#xieyi:checked').length <= 0){
			alerts('您必须接受我们的服务条款！');
			return false;
		}
	});
	
	//个人应用中心，学习类应用点击
	jq('button.sutudyapp').click(function(){
		var sutudyappid = jq(this).attr('title');
		jq.post(__APP__+'Public/selectapp',{'sutudyappid':sutudyappid},function(data,status){
			if(status == 'success'){
				window.location.href=__APP__+'Exam/login';
			}else{
				alerts('系统忙，请刷新重试！');
			}
		});
		return false;
	});
	
	//座位号
	if(jq('div.input_title input#additem').length != 0){
		jq('div.input_title input#additem').focus(function(){
			var additem = Math.ceil(Math.random()*100000000000000000000);
			jq(this).val(additem);
		});
	}
	//用户考试登陆
	jq('div.examloginbtn input.examloginbtnsubt').click(function(){
		
		if(jq('div.input_title #person_id').val()==''){
			alerts('身份证号码必填！');
			return false;
		}
		if(jq('div.input_title input#additem').val()==''){
			alerts('座位编号可随意填写！');
			return false;
		}

	});
	
});
