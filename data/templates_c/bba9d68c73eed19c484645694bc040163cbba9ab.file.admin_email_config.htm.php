<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:21:04
         compiled from "D:\www\www\phpyun\app\template\admin\admin_email_config.htm" */ ?>
<?php /*%%SmartyHeaderCode:116118538962e22ad00346d8-10443228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bba9d68c73eed19c484645694bc040163cbba9ab' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_email_config.htm',
      1 => 1634559901,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116118538962e22ad00346d8-10443228',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'emailconfig' => 0,
    'eclist' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22ad0066b31_23606144',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22ad0066b31_23606144')) {function content_62e22ad0066b31_23606144($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta http-equiv="Pragma" content="no-cache" /> 
	<meta http-equiv="Cache-Control" content="no-cache" /> 
	<meta http-equiv="Expires" content="0" />
	
	<link href="images/reset.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
	<link href="images/system.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
	<link href="images/table_form.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/admin_public.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" language="javascript"><?php echo '</script'; ?>
>
	<link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/css/layui.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet">
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/layui.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" language="javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/phpyun_layer.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>

	<title>????????????</title>

</head>

<body class="body_ifm">
	<div class="infoboxp"> 
	<div class="tty-tishi_top">
		<div class="admin_new_tip">
			<a href="javascript:;" class="admin_new_tip_close"></a>
			<a href="javascript:;" class="admin_new_tip_open" style="display:none;"></a>
			<div class="admin_new_tit"><i class="admin_new_tit_icon"></i>????????????</div>
			
			<div class="admin_new_tip_list_cont">
				<div class="admin_new_tip_list">????????????QQ/163????????????465??????????????????SSL????????????????????????????????????????????????????????????????????????</div>
			</div>
		</div>

		<div class="clear"></div>

			<div class="tag_box">

				<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
				<form  target="supportiframe" name="myform" action="index.php?m=emailconfig&c=save" method="post"  onSubmit="return checkform(this);" class="layui-form">

					<table width="100%" class="table_form">
						<tr>
							<th width="200">?????????????????????</th>
							<td>
								<div class="layui-input-block">
									<input type="radio" name="sy_email_online" value="1" lay-filter="type" id="sy_email_online_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_online']=="1") {?>checked<?php }?> title="SMTP?????????????????????" >
									<input type="radio" name="sy_email_online" value="2" lay-filter="type" id="sy_email_online_2" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_online']=="2") {?>checked<?php }?> title="?????????DirectMail" >
								</div>
							</td>
						</tr>
					</table> 

					<div id="emailtable" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_online']=="2") {?>style="display:none;"<?php }?>>
						<?php  $_smarty_tpl->tpl_vars['eclist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['eclist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['emailconfig']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['eclist']->key => $_smarty_tpl->tpl_vars['eclist']->value) {
$_smarty_tpl->tpl_vars['eclist']->_loop = true;
?>
							<table width="100%" class="table_form">
								<tr class="email admin_table_trbg">
									<th width="200">SMTP????????????</th>
									<td><input class="tty_input t_w480" type="text" name="smtpserver_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['eclist']->value['smtpserver'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">??????smtp.qq.com</span></td>
								</tr>
								<tr class="email">
									<th width="200">SMTP???????????????????????????</th>
									<td><input class="tty_input t_w480" type="text" name="smtpuser_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['eclist']->value['smtpuser'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">??????phpyun@qq.com</span></td>
								</tr>
								<tr class="email">
									<th width="200" class="t_fr">???????????????</th>
									<td><input class="tty_input t_w480" type="password" name="smtppass_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
"  value="<?php echo $_smarty_tpl->tpl_vars['eclist']->value['smtppass'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</span></td>
								</tr>
								<tr class="email admin_table_trbg">
									<th width="200" class="t_fr">SMTP???????????????: </th>
									<td><input class="tty_input t_w480" type="text" name="smtpport_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['eclist']->value['smtpport'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">???????????????????????????25 ?????????????????????465????????????465?????? ????????????????????????SSL??????</span></td>
								</tr>
								<tr>
									<th width="200">???????????????: </th>
									<td><input class="tty_input t_w480" type="text" name="smtpnick_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['eclist']->value['smtpnick'];?>
" size="30" maxlength="255"/></td>
								</tr>
								
								<tr class="admin_table_trbg">
										<th width="200" class="t_fr">???????????????</th>
										<td>
										  <div class="layui-input-block">
											 <div class="layui-input-inline">
											   <input id="default_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
_0" type="radio" <?php if ($_smarty_tpl->tpl_vars['eclist']->value['default']!='1') {?>checked=""<?php }?> value="0" name="default_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
" title="??????" >
											   <input id="default_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
_1" type="radio" <?php if ($_smarty_tpl->tpl_vars['eclist']->value['default']=='1') {?>checked=""<?php }?> value="1" name="default_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
" title="??????" >
											 </div>
										   </div>
										</td>
									</tr>
								<input type='hidden' name='emailid[]' value='<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
'>
								<tr class="email admin_table_trbg">
									<th width="200">&nbsp;</th>
									<td align="left">
										<input class="admin_submit_bthy deleteconfig" data-id='<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
' type="button" value="??????" >&nbsp;&nbsp;
										<input class="admin_submit_bthy testconfig"  data-id='<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
' type="button"  value="??????">
									</td>
								</tr>
							</table>
						<?php }
if (!$_smarty_tpl->tpl_vars['eclist']->_loop) {
?>
							<?php echo '<script'; ?>
>
								$(function(){  
									$('#emailtable').append($('#appendconfig').html());
								});   
							<?php echo '</script'; ?>
>
						<?php } ?>
					</div>

					<table width="100%" class="table_form emailtable" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_online']=="2") {?>style="display:none;"<?php }?>>
						<tr class="email admin_table_trbg">
						 <th width="200">&nbsp;</th>
							<td align="left">
								<input class="layui-btn tty_sub"  type="submit" name="config" value="??????" />&nbsp;&nbsp;
								<input class="layui-btn tty_cz" type="button" value="??????" onclick="javascript:$('#emailtable').append($('#appendconfig').html());" />
							</td>
						</tr>
					</table>




					<div id="aliyunemail" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_online']=="1") {?>style="display:none;"<?php }?>>
						<table width="100%" class="table_form">
							<tr class="email admin_table_trbg">
								<th width="200">AccessKey ID???</th>
								<td><input class="tty_input t_w480" type="text" name="accesskey" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['accesskey'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">??????js4Blub11sd14BwQEe</span></td>
							</tr>
							<tr class="email">
								<th width="200">Access Key Secret???</th>
								<td><input class="tty_input t_w480" type="text" name="accesssecret" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['accesssecret'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">??????phpyun@qq.com</span></td>
							</tr>
							<tr class="email">
								<th width="200">???????????????</th>
								<td><input class="tty_input t_w480" type="text" name="ali_email"  value="<?php echo $_smarty_tpl->tpl_vars['config']->value['ali_email'];?>
" size="30" maxlength="255"/></td>
							</tr>
							<tr class="email admin_table_trbg">
								<th width="200">??????: </th>
								<td><input class="tty_input t_w480" type="text" name="ali_tag" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['ali_tag'];?>
" size="30" maxlength="255"/></td>
							</tr>
							<tr>
								<th width="200">???????????????: </th>
								<td><input class="tty_input t_w480" type="text" name="ali_name" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['ali_name'];?>
" size="30" maxlength="255"/></td>
							</tr>
						</table>
					</div>

					<table width="100%" class="table_form aliyunemail" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_online']=="1") {?>style="display:none;"<?php }?>>
						<tr class="email admin_table_trbg">
							<th width="200">&nbsp;</th>
							<td align="left">
								<input class="layui-btn tty_sub"  type="submit" name="aliconfig" value="??????" />&nbsp;&nbsp;
								<input class="layui-btn tty_cz testconfig" data-id="aliyun" type="button" value="??????" />
							</td>
						</tr>
					</table>
				<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"> 
			</form>
		</div>
	</div>






<div style="display:none;" id="appendconfig">
	<table width="100%" class="table_form">
		<tr class="email admin_table_trbg">
			<th width="200">SMTP????????????</th>
			<td><input class="tty_input t_w480" type="text" name="smtpserver[]"  value="" size="30" maxlength="255"/><span class="admin_web_tip">??????smtp.qq.com</span></td>
		</tr>
		<tr class="email">
			<th width="200">SMTP???????????????????????????</th>
			<td><input class="tty_input t_w480" type="text" name="smtpuser[]"  value="" size="30" maxlength="255"/><span class="admin_web_tip">??????phpyun@qq.com</span></td>
		</tr>
		<tr class="email">
			<th width="200" style="float: left;margin-top: 10px;">???????????????</th>
			<td><input class="tty_input t_w480" type="password" name="smtppass[]"  value="" size="30" maxlength="255"/><span class="admin_web_tip">??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</span></td>
		</tr>
		<tr class="email admin_table_trbg">
			<th width="200" style="float: left;margin-top: 10px;">SMTP???????????????: </th>
			<td><input class="tty_input t_w480" type="text" name="smtpport[]"  value="" size="30" maxlength="255"/><span class="admin_web_tip">???????????????????????????25 ?????????????????????465????????????465?????? ????????????????????????SSL??????</span></td>
		</tr>
		<tr>
			<th width="200">???????????????: </th>
			<td><input class="tty_input t_w480" type="text" name="smtpnick[]"  value="" size="30" maxlength="255"/></td>
		</tr>
		
	</table>
</div>

<?php echo '<script'; ?>
> 
	layui.use(['layer', 'form'], function(){
		var layer = layui.layer
		,form = layui.form
		,$ = layui.$;
		form.on('radio(type)', function(data){
			if(data.value=='1'){
				$('#aliyunemail').hide();
				$('#emailtable').show();
				$('.aliyunemail').hide();
				$('.emailtable').show();
			}else{
				$('#aliyunemail').show();
				$('#emailtable').hide();
				$('.aliyunemail').show();
				$('.emailtable').hide();
			}
			form.render();
		}); 
	});
	$(function(){  
		$('.testconfig').click(function(){
			var id = $(this).attr('data-id');
			if(!id){
				layer.msg('??????????????????????????????????????????',2,8);
			}else{
				layer.prompt({height:'20px',title: '??????????????????',top:'50px'}, function(value){ 
					if(value){
						var myreg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/;
						var pytoken=$("#pytoken").val();
						if(!myreg.test(value)){
							parent.layer.msg('??????????????????????????????????????????', 2, 8);return false;
						}else{ 
							var ii = parent.layer.load('????????????',0);
							$.post("index.php?m=emailconfig&c=ceshi",{ceshi_email:value,id:id,pytoken:pytoken},function(data){
								var data=eval('('+data+')');
								parent.layer.close(ii);
								parent.layer.msg(data.msg, 2, Number(data.type));return false; 
							}); 
						}
					}else{
						parent.layer.msg('??????????????????',2,8);return false; 
					} 
				})
			}
		});
		$('.deleteconfig').click(function(){
			var id = $(this).attr('data-id');
			if(!id){
				layer.msg('??????????????????????????????????????????',2,8);
			}else{
				var pytoken=$("#pytoken").val();
				layer.confirm("??????????????????",function(){
					var ii = layer.load('????????????',0);
					$.post('index.php?m=emailconfig&c=delconfig',{id:id,pytoken:pytoken},function(data){
						parent.layer.close(ii);
						var data=eval('('+data+')');
						layer.msg(data.msg, 2, Number(data.type),function(){location.reload();});
					})
				});
			}
		});
	});  
	
	function checkform(){

		var sy_email_online = $("input:radio[name='sy_email_online']:checked").val();
		if(sy_email_online==''){
			layer.msg('??????????????????????????????',2,8);
		}
 		
	}
<?php echo '</script'; ?>
>
</div>
</body>
</html><?php }} ?>
