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
	art.dialog.load(__APP__+'User/buyapp/appid/'+appid,{title: '立即购买此应用', width: 380, height: 150,fixed: true,close:function(){
		jq('div.bshade').hide();
    }});
}

//时间转换
function gettime(){
	jq.post(__APP__+'Exam/timer/r/'+new Date().getTime(),{},function(data,status){
		$arr = data.split('##');
		jq('span.trlefttime.hasgo').html($arr[0]);
		jq('span.leftquestion.red').html($arr[1]);
	});
}

//更新右上角题目列表的答案对错显示
function updatequestionlistanswer(questionid,question_true_id){
	jq.post(__APP__+'Exam/updatequestionlistanswer',{"question_true_id":question_true_id},function(data,status){
		jq('div.trainingtopbox table.topicslist tr td').each(function(){
			var num = jq(this).text();
			if(questionid == num){
				if(data == "right"){
					jq(this).addClass('r');
					jq(this).removeClass('w');
					jq(this).removeClass('t');
				}
				if(data == "wrong"){
					jq(this).removeClass('r');
					jq(this).addClass('w');
					jq(this).removeClass('t');
				}
				if(data == "null"){
					jq(this).removeClass('r');
					jq(this).removeClass('w');
					jq(this).removeClass('t');
				}
				if(data == "test"){
					jq(this).removeClass('r');
					jq(this).removeClass('w');
					jq(this).addClass('t');
				}
			}
		});
	});	
}
//返回顶部
function initScrollTop() {
    var change_speed = 800;
    if (!jQuery.browser.opera) {
        jQuery('body').animate({
            scrollTop: 0
        }, {
            queue: false,
            duration: change_speed
        })
    }
    jQuery('html').animate({
        scrollTop: 0
    }, {
        queue: false,
        duration: change_speed
    });
    return false
}
function openwin(url){ 
	window.open (url, "newwindow", "height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no")
} 

//下载开始
function clicktodownload(id){
	jq.post(__APP__+'User/dodownloadapp',{'id':id},function(data,status){
		if(data != 'error'){
			art.dialog.open(data,{
				title: '下载',
				init:function(){
					this.close();
				},
				cancelVal:"关闭",
				cancel: true
			});
			return false;
		}else{
			alerts('下载失败，请联系我们的客服人员！');
		}
	})
}
 
/**************************************************************/
jq(function(){
	
	jq('div.gototop').click(function(){
		initScrollTop();
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
	
	//忘记密码
	jq('span.getpassword a').click(function(){
		jq('div.bshade').show();
		art.dialog.load(__APP__+'Public/getpwd',{title: '找回密码！', width: 430, height: 50,fixed: true,close:function(){
			jq('div.bshade').hide();
	    }})
	});

	jq('form.getuserpwdform input.getpwdsubmit').die().live('click',function(){
		var youremail = jq('input#youremail').val();
		if(youremail == ''){
			alerts('请输入注册的邮箱地址');return false;
		}
		
		var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
		if(!myreg.test(youremail)){
			alerts('邮箱不能符合规则，请填写常用邮箱');
			return false;
		}

		jq('img.sendingemail').show();
		jq.post(__APP__+'Public/dogetpwd',{"youremail":youremail},function(data,status){
			
			if(status == 'success'){
				jq('img.sendingemail').hide();
				if(data == 'noemail'){
					alerts('查无此人，请联系客服人员！');
				}else{
					alerts('邮箱发送成功，请到你的邮箱中查看新密码！');
				}
			}else{
				jq('img.sendingemail').hide();
				alerts('发送失败，请稍后重试，或者联系客服人员！');
			}
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
	jq('table.answerbox tr td.abcheck input').die().live('click',function(){
		var answer = jq(this).val();
		var answername = jq(this).attr("name");
		var answertype = jq(this).attr('type');
		var answernames = answername.split('_');
		var question_true_id = answernames[1];
		var questionid = jq(this).attr('questionid');
		
		if(jq(this).attr("checked")=='checked'){
			if(answertype == 'radio'){
				jq(this).parent().parent().parent().find('tr').removeClass('checked');
			}
			jq(this).parent().parent().addClass('checked');
			//将答案保存
			jq.post(__APP__+'Exam/saveAnswer',{"question_true_id":question_true_id,"questionid":questionid,"answer":answer,"answertype":answertype},function(data,status){
				//...记录COOKIE,没有返回
				updatequestionlistanswer(questionid,question_true_id);
			});
		}else{
			jq(this).parent().parent().removeClass('checked');
			//更新答案,从现有的答案中去掉这个被取消的值 
			jq.post(__APP__+'Exam/savecaneledAnswer',{"question_true_id":question_true_id,"questionid":questionid,"answer":answer,"answertype":answertype},function(data,status){
				//...记录COOKIE,没有返回
				updatequestionlistanswer(questionid,question_true_id);
			});
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
			alerts('请输入正确的电话号码');
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
	
	//确定购买应用
	jq('button.oktobuyappbtn').die().live('click',function(){
		if(jq('input#aplyxieyi').attr('checked') == "checked"){
			//。。。。
		}else{
			alerts('您必须接受我们的协议才可以购买此产品！');
			return false;
		}
	});
	
	//应用中心的应用选中按钮
	jq('button.sutudyappcenter').click(function(){
		var sutudyappid = jq(this).attr('title');
		jq.post(__APP__+'Public/selectapp',{'sutudyappid':sutudyappid},function(data,status){
			if(status == 'success'){
				if(data == 'nopermission'){
					alerts('对不想，没有权限！');
				}else{
					window.location.href=__APP__+'Exam/login';
				}
			}else{
				alerts('系统忙，请刷新重试！');
			}
		});
		return false;
	})
	
	//二选一页面 学习类应用点击
	jq('button.sutudyapp').click(function(){
		var sutudyappid = jq(this).attr('title');
		jq.post(__APP__+'Public/selectapp',{'sutudyappid':sutudyappid},function(data,status){
			if(status == 'success'){
				if(data == 'nopermission'){
					alerts('对不想，没有权限！');
				}else{
					window.location.href=__APP__+'Exam/doexamlogin2';
				}
			}else{
				alerts('系统忙，请刷新重试！');
			}
		});
		return false;
	})
	
	
	//二选一页面，学习类应用点击（随机100题的考试）
	jq('button.gototest').click(function(){
		var sutudyappid = jq(this).attr('title');
		jq.post(__APP__+'Public/selectapp',{'sutudyappid':sutudyappid,"type":"istest"},function(data,status){
			if(status == 'success'){
				if(data == 'nopermission'){
					alerts('对不想，没有权限！');
				}else{
					window.location.href=__APP__+'Exam/doexamlogin2';
				}
			}else{
				alerts('系统忙，请刷新重试！');
			}
		});
		return false;
	});
	
	//座位号
	if(jq('div.input_title input#additem').length != 0){
		jq('div.input_title input#additem').focus(function(){
			var additem = 'B'+Math.ceil(Math.random()*10000000000000);
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
	
	jq('div.shownewspage div').each(function(){
		if(jq(this).text() == ''){
			jq(this).remove();
		}
	});
	
	//增大字体
	jq('button.biggerfont').click(function(){
		var curf = jq('div.trainingmiddleboxcontent.item').css('font-size');
		curf = parseInt(curf)+1;
		jq('div.trainingmiddleboxcontent.item').css({"font-size":curf+"px"});
	});
	
	//默认字体
	jq('button.defaultfont').click(function(){
		jq('div.trainingmiddleboxcontent.item').css({"font-size":"12px"});
	});
	
	//计时
	if(jq('span.trlefttime.hasgo').length != 0){
		se = setInterval("gettime()",1000);
		//clearInterval(se);//暂停
		//clearInterval(se);//停止
	}else{
		clearInterval(se);
	}
	
	//加载题目(上一个，下一个)
	jq('button.nextquestion,button.prevquestion').die().live('click',function(){
		jq('div.trainingmiddleboxtitle').addClass('loadingline');
		var questionid = jq(this).attr("value");
		if(questionid === ''){alerts('已经是最后一题了，后面没有了！');jq('div.trainingmiddleboxtitle').removeClass('loadingline');return false;}
		if(questionid <= 0){alerts('已经是第一题了，前面没有了！');jq('div.trainingmiddleboxtitle').removeClass('loadingline');return false;}
		jq.post(__APP__+'Exam/getQuestion',{"questionid":questionid},function(data,status){
			jq('div.questionbox').html(data);
		});
		jq.post(__APP__+'Exam/questionbuttons',{"questionid":questionid},function(data,status){
			jq('div.trainingbottombox').html(data);
			jq('div.trainingmiddleboxtitle').removeClass('loadingline');
		});
		//当前是第一几题 更新
		jq('span.trlefttime.currenttm').text(questionid);
		
		//自动锁定 题目列表到当前页面
		var flag_currentpage = false;
		jq('table.topicslist:visible tr td').each(function(i){
			if(parseInt(jq(this).text()) == questionid ){
				flag_currentpage = true;
			}
		});
		if(flag_currentpage == false){
			jq('table.topicslist:hidden tr td').each(function(i){
				if(parseInt(jq(this).text()) == questionid){
					jq('table.topicslist').hide();
					jq(this).parent().parent().parent('table').show();
				}
			});
		}
	});
	
/*	//选题上一页，下一页遇到30，60联动
	jq('button.nextquestion').die().live('click',function(){
		var questionid = jq(this).attr("value");
		if(questionid%30-1 == 0){
			//jq('span.upanddown2').click();
		}
	})
	jq('button.prevquestion').die().live('click',function(){
		var questionid = jq(this).attr("value");
		if(questionid%30 == 0){
			//jq('span.upanddown1').click();
		}
	})*/
	
	if(jq('div.questionbox').length != 0){
		if(jq('div.questionbox').html() == ''){
			//输出第一题
			jq.post(__APP__+'Exam/getQuestion',{"questionid":1},function(data,status){
				jq('div.questionbox').html(data);
			});
			jq.post(__APP__+'Exam/questionbuttons',{"questionid":1},function(data,status){
				jq('div.trainingbottombox').html(data);
			});
		}
	}
	//加载题目(乱入选择)
	jq('table.topicslist tr td,table.topicslistmark tr td span').die().live('click',function(){
		
		if(jq(this).text() == ''){
			return false;
		}
		
		jq('div.trainingmiddleboxtitle').addClass('loadingline');
		jq('button.markquestion,button.unmarkquestion').removeClass('markbtnhidden');
		var questionid = parseInt(jq(this).text());
		jq.post(__APP__+'Exam/getQuestion',{"questionid":questionid},function(data,status){
			jq('div.questionbox').html(data);
		});
		jq.post(__APP__+'Exam/questionbuttons',{"questionid":questionid},function(data,status){
			jq('div.trainingbottombox').html(data);
			jq('div.trainingmiddleboxtitle').removeClass('loadingline');
			jq('div.trainingmiddleboxtitle').removeClass('loadingline');
		});
		//当前是第一几题 更新
		jq('span.trlefttime.currenttm').text(questionid);
	});
	
	//题目的上一页，下一页
	jq('span.upanddown1').click(function(){
		var currenttable = jq('table.topicslist:visible');
		var currenttablenext = currenttable.prev('table');
		if(currenttablenext.length != 0){
			currenttable.hide();
			currenttablenext.show();
		}else{
			alerts('已经是第一页了，前面没有了!');
			return false;
		}
	});
	
	jq('span.upanddown2').click(function(){
		var currenttable = jq('table.topicslist:visible');
		var currenttablenext = currenttable.next('table');
		if(currenttablenext.length != 0){
			currenttable.hide();
			currenttablenext.show();
		}else{
			alerts('已经是最后一页了，后面没有了!');
			return false;
		}
	});
	
	//标记题目禁止 在Mark页面
	jq('button.markquestion.markbtnhidden,button.unmarkquestion.markbtnhidden').die().live('click',function(){
		return false;
	});
	
	//标记题目
	jq('button.markquestion').die().live("click",function(){
		if(jq(this).hasClass('disabled')){
			//alerts('此题目已经被标记过了，请不要重复标记！');
			return false;
		}
		jq(this).addClass('disabled');
		var questionid = jq(this).attr('value');
		jq.post(__APP__+'Exam/markquestion',{'questionid':questionid},function(data,status){
			if(status = 'success'){
				//alerts('标记成功！');
				jq('button.unmarkquestion').removeClass('disabled');
			}else{
				alerts('系统忙，标记失败，请稍后重试！');
			}
		});
	});
	
	//取消标记的题目
	jq('button.unmarkquestion').die().live('click',function(){
		if(jq(this).hasClass('disabled')){
			//alerts('此题目还未曾做过标记！');
			return false;
		}
		var ths = jq(this);
		var questionid = jq(this).attr('value');
		jq.post(__APP__+'Exam/unmarkquestion',{'questionid':questionid},function(data,status){
			if(status = 'success'){
				//alerts('取消标记成功！');
				ths.addClass('disabled');
				jq('button.markquestion').removeClass('disabled');
			}else{
				alerts('系统忙，标记失败，请稍后重试！');
			}
		});
	});
	
	//选题
	jq('button.selectquestion').die().live('click',function(){
		var questionid = jq(this).attr("value");
		jq.post(__APP__+'Exam/mark',{'questionid':questionid},function(data,status){
			if(status = 'success'){
				jq('div.questionbox').html(data);
				jq('button.markquestion,button.unmarkquestion').addClass('markbtnhidden');
			}else{
				alerts('系统忙，标记失败，请稍后重试！');
			}			
		});
	});
	
	//交卷:s1
	jq('button.handinpaper').die().live('click',function(){
		jq('div.testoverbox,div.firsttip').show();
	});
	//s2
	jq('button.areyousureovertest1y').die().live('click',function(){
		jq('div.firsttip').hide();
		jq('div.secondtip').show();
	});
	//s3
	jq('button.areyousureovertest2y').die().live('click',function(){
		jq('div.secondtip').hide();
		jq('div.thirdtip').show();
	});
	//s4
	jq('button.areyousureovertest3y').die().live('click',function(){
		window.location.href=__APP__+'Exam/handinpaper';
	});
	//取消交卷
	jq('button.areyousureovertest1n,button.areyousureovertest2n,button.areyousureovertest3n').click(function(){
		jq('div.testoverbox,div.testoverbox div').hide();
	});
	
	//标记页面返回按钮
	jq('div img.markgobackimg').die().live('click',function(){
		jq('span.dangqianti,span.zhuangqiangliao').click();
	});
	
	
});

