<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:19:39
         compiled from "D:\www\www\phpyun\app\template\admin\member_send_email.htm" */ ?>
<?php /*%%SmartyHeaderCode:110180776462e22a7b4a2021-44423551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a086c5bf31b8180b482bc76661bd99014d6acb64' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\member_send_email.htm',
      1 => 1650462146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110180776462e22a7b4a2021-44423551',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22a7b4a4683_68354438',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22a7b4a4683_68354438')) {function content_62e22a7b4a4683_68354438($_smarty_tpl) {?><?php echo '<script'; ?>
>
	$(function(){
	   $('.closebutton').on('click', function(){
			var index = layer.index;  
			layer.close(index);     
		});
	})
	function send_email(email){
		$("#email_user").val(email);
		$.layer({
			type : 1,
			title :'发送邮件', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['430px','310px'],
			page : {dom :"#email_div"}
		});
	}
	function send_moblie(moblie){
		$("#userarr").val(moblie);
		$.layer({
			type : 1,
			title :'发送短信', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['410px','250px'],
			page : {dom :"#moblie_div"}
		});
	}
	function send_sysmsg(uid,username){
		$("#sysmsg_user").val(uid);
		$("#sys_username").val(username);
		$.layer({
			type : 1,
			title :'发送系统消息', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['410px','220px'],
			page : {dom :"#sysmsg_div"}
		});
	}
	function confirm_email(msg,name){
		var chk_value=[];
		var email=moblie=[];
		$('input[name="del[]"]:checked').each(function(){
			chk_value.push($(this).val());
		});
		if(chk_value.length==0){
			parent.layer.msg("请选择账户！",2,8);return false;
		}else{
			var cf=parent.layer.confirm(msg,function(){
				parent.layer.close(cf);
				if(name=='email_div'){
					$('input[name="del[]"]:checked').each(function(){
						email.push($(this).attr('email'));
					});
					$("#email_user").val(email);
					$.layer({
						type : 1,
						title :'发送邮件',  
						offset: ['20px', ''],
						area : ['410px','250px'],
						page : {dom :"#email_div"}
					});
				}else{
					$('input[name="del[]"]:checked').each(function(){
						moblie.push($(this).attr('moblie'));
					});
					$("#userarr").val(moblie);
					$.layer({
						type : 1,
						title :'发送短信', 
						offset: ['20px', ''],
						area : ['410px','220px'],
						page : {dom :"#moblie_div"}
					});
				}
			});
		}
	}
	  
	function sysmsgload(){
		if($.trim($("#syscontent").val())==''){
			parent.layer.msg('请输入系统消息内容！', 2, 8);return false;
		}
		layer.closeAll();
		parent.layer.load('执行中，请稍候...',0);
	}

	function message_submit() {
		var utype = 5;
		var userarr = $("#userarr").val();
		var pytoken=$("input[name='pytoken']").val();	
		var content = $.trim($("#mcontent").val());
		if(content == '') {
			parent.layer.msg('短信内容不能为空！', 2, 8);
			return false;
		}
		sendDivMsg(utype,content,userarr,pytoken,3,50,0,0,0,"正在发送，请稍候。。。");
	}
	function sendDivMsg(utype,content,userarr,pytoken,status,pagelimit,value,sendok,sendno,msg){
		if(status=="3"){
			var pagelimit=50;
			var pytoken=$("input[name='pytoken']").val();
			var ii = parent.layer.msg(msg,20,{
				icon:16,shade:0.01
			});
			$.post("index.php?m=admin_member&c=msgsave",{
				utype:utype,content:content,userarr:userarr,pytoken:pytoken,
				pagelimit:pagelimit,value:value,sendok:sendok,sendno:sendno},
				function(data){
					parent.layer.close(ii);
					var data=eval('('+data+')');
					sendDivMsg(utype,content,userarr,pytoken,data.status,pagelimit,data.value,data.sendok,data.sendno,data.msg)
				})
		}else{
			parent.layer.close(ii);
			if(status==2){
				parent.layer.alert(msg, 8);
			}else{
				parent.layer.alert(msg, 9);
				location.reload();
			}
		}
	}

	function chsendemail(){
		var title=$("input[name='email_title']").val();
		if(title==''){
			parent.layer.msg("请输入邮件主题！",2,8);return false;
		}
		var content = $.trim($("#content").val());
		if(content==''){
			parent.layer.msg("请输入邮件内容！",2,8);return false;
		}
		var utype = 5;
		var email=$("input[name='email_user']").val();
		var pytoken=$("input[name='pytoken']").val();
		sendDivEmail(utype,title,content,email,pytoken,3,20,0,0,0,"正在发送，请稍候。。。");
	}

	function sendDivEmail(utype,title,content,email,pytoken,status,pagelimit,value,sendok,sendno,msg){
		if(status=="3"){
			var pagelimit=20;
			var pytoken=$("input[name='pytoken']").val();
			var ii = parent.layer.msg(msg,20,{
				icon:16,shade:0.01
			});

			$.post("index.php?m=admin_member&c=send",{
				utype:utype,email_title:title,content:content,email_user:email,pytoken:pytoken,
				pagelimit:pagelimit,value:value,sendok:sendok,sendno:sendno},
				function(data){
					parent.layer.close(ii);
					var data=eval('('+data+')');
					sendDivEmail(utype,title,content,email,pytoken,data.status,pagelimit,data.value,data.sendok,data.sendno,data.msg)
				})
		}else{
			parent.layer.close(ii);
			if(status==2){
				parent.layer.alert(msg, 8);
			}else{
				parent.layer.alert(msg, 9);
				location.reload();
			}
		}
	}
<?php echo '</script'; ?>
>
<div id="moblie_div" style=" display:none;">
	<form id="formstatus" method="post" target="supportiframe" action="index.php?m=email&c=msgsave" >
		<table class="table_form ">
			<tr>
				<td>短信内容：</td>
				<td>
					<div class="formstatus_t_box">
						<textarea name="content" id="mcontent" style="width:220px;height:90px;border:1px solid #ddd" class="text"></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan='2' style='border-bottom:none'>
					<div class="admin_Operating_sub" style="margin-top:0px">
					<input class="submit_btn" type="button" name='message_send' value="确认" onClick="message_submit();">
					<input  class="cancel_btn closebutton" type="button" value="取消">
					</div>
				</td>
			</tr>
		</table>
  		<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"/>
		<input type="hidden" id='userarr' name="userarr"/>
 	 </form>
</div>

<div id="email_div" style=" display:none;">
	<form id="formstatus" method="post" target="supportiframe" action="index.php?m=email&c=send">
		<table class="table_form "  id="">
			<tr><td>邮件标题：</td><td><input name="email_title"  class="input-text" type="text" size="40"></td></tr>
			<tr><td>邮件内容：</td><td>
            <div class="formstatus_t_box"><textarea name="content" id="content" style="width:220px;height:70px;border:1px solid #ddd" class="text"></textarea></div></td></tr>
			<tr>
				<td colspan='2' style='border-bottom:none'>
					<div class="admin_Operating_sub" style="margin-top:0px">
					<input class="submit_btn" type="button" name='email_send' value="确认"  onclick="chsendemail();">
					<input  class="cancel_btn closebutton" type="button" value="取消">
					</div>
				</td>
			</tr>
		</table>
		<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"/>
 		<input type="hidden" id='email_user' name="email_user"/>
	</form>
</div>

<div id="sysmsg_div" style=" display:none;">
	<form id="formstatus" method="post" target="supportiframe" action="index.php?m=admin_company&c=sendsysmsg" onsubmit="return sysmsgload();" >
		<table class="table_form ">
			<tr><td>内容：</td>
				<td>
					<div class="formstatus_t_box">
						<textarea name="content" id="syscontent" style="width:220px;height:90px;border:1px solid #ddd" class="text"></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan='2' style='border-bottom:none'>
					<div class="admin_Operating_sub" style="margin-top:0px">
					<input class="submit_btn" type="submit" name='sysmsg_send' value="确认">
					<input  class="cancel_btn closebutton" type="button" value="取消">
					</div>
				</td>
			</tr>
		</table>
  		<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"/>
		<input type="hidden" id='sysmsg_user' name="sysmsg_user"/>
		<input type="hidden" id='sys_username' name="sys_username"/>
	 </form>
</div><?php }} ?>
