<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:24:32
         compiled from "D:\www\www\phpyun\app\template\admin\admin_xml.htm" */ ?>
<?php /*%%SmartyHeaderCode:118797031462e22ba0d7d908-09635519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dc5d998e642ce9474e3f52de41a07dc6e1036bc' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_xml.htm',
      1 => 1634559903,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118797031462e22ba0d7d908-09635519',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22ba0da12d4_30926499',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22ba0da12d4_30926499')) {function content_62e22ba0da12d4_30926499($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
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
" rel="stylesheet"
		 type="text/css" />
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/layui.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/phpyun_layer.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>

		<title></title>
	</head>
	<body class="body_ifm">
		<div class="infoboxp">
			<div class="tty-tishi_top">
				<div class="admin_new_tip">
					<a href="javascript:;" class="admin_new_tip_close"></a>
					<a href="javascript:;" class="admin_new_tip_open" style="display:none;"></a>
					<div class="admin_new_tit"><i class="admin_new_tit_icon"></i>????????????</div>
					<div class="admin_new_tip_list_cont">
						<div class="admin_new_tip_list">????????????????????????????????????????????????????????????</div>
						<div class="admin_new_tip_list">??????????????????????????????????????????</div>
					</div>
				</div>
				<div class="clear"></div>

				<form class="layui-form">
					<table width="100%" class="table_form ">
						<tr>
							<th width="120">???????????????</th>
							<td>
								<div class="layui-input-inline t_w480">
									<select name="" id="datetype_val">
										<option value="sitemap">??????</option>
										<option value="company">??????</option>
										<option value="job">??????</option>
										<option value="resume">??????</option>
										<option value="ask">??????</option>
										<option value="news">??????</option>
									</select>
								</div>


							</td>
						</tr>
						<tr class="admin_table_trbg">
							<th width="120">???????????????</th>
							<td>
								<div class="layui-input-inline t_w480">
									<select name="" id="order_val">
										<option value="uptime">????????????</option>
										<option value="addtime">????????????</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<th width="120">???????????????</th>
							<td>
								<div class="layui-input-inline t_w480">
									<select name="" id="frequency_val">
										<option value="always">??????</option>
										<option value="hourly">?????????</option>
										<option value="daily">??????</option>
										<option value="weekly">??????</option>
										<option value="monthly">??????</option>
										<option value="yearly">??????</option>
										<option value="never">??????</option>
									</select>

								</div>
							</td>
						</tr>
						<tr class="admin_table_trbg">
							<th width="120">???????????????</th>
							<td>
								<div class="layui-input-block">
									<div class="layui-input-inline t_w480">
										<input type="text" id="limit" lay-verify="required" placeholder="?????????????????????" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"
										 value="100" size="30" autocomplete="off" class="layui-input"> 
									</div>
									<span class="admin_web_tip">?????????????????????</span>
								</div>
							</td>
						</tr>
						<tr>
							<th width="120">???????????????</th>
							<td>
								<div class="layui-input-block">
									<div class="layui-input-inline t_w480">
										<input type="text" id="xfilename" lay-verify="required" placeholder="?????????????????????" value="sitemap" size="30"
										 autocomplete="off" class="layui-input">
									</div>
									<span class="admin_web_tip">??????sitemap??????????????????</span>
								</div>
							</td>
						</tr>
						<tr class="admin_table_trbg">
							<th width="120"></th>
							<td>
								<input class="layui-btn tty_sub" type="button" id="archive" value="????????????" />&nbsp;&nbsp;
							</td>
						</tr>
					</table>
					<input type="hidden" id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
				</form>
			</div>
		</div>
		<?php echo '<script'; ?>
 language="javascript">
			layui.use(['layer', 'form', 'element'], function() {
				var layer = layui.layer,
					form = layui.form,
					element = layui.element,
					$ = layui.$;
			}); //end layui.use()

			$(document).ready(function() {
				dchange();
				$("#archive").click(function() {
					var pytoken = $("#pytoken").val();
					var datetype = $("#datetype_val").val();
					var order = $("#order_val").val();
					var limit = $.trim($("#limit").val());
					var filename = $("#xfilename").val();
					var frequency = $("#frequency_val").val();
					if (limit < 1 || limit == '') {
						parent.layer.msg('?????????????????????', 2, 8);
						return false;
					}
					parent.layer.load('????????????????????????', 0);
					$.post("index.php?m=admin_xml&c=archive", {
						type: datetype,
						order: order,
						limit: limit,
						name: filename,
						frequency: frequency,
						pytoken: pytoken
					}, function(data) {
						parent.layer.closeAll('loading');
						var data = eval('(' + data + ')');
						parent.layer.msg(data.msg, Number(data.tm), Number(data.st), function() {
							location.reload();
						});
						return false;
					})
				})
			})
			
			function dchange(){
				var datetype=$("#datetype").val();
				$("#filename").val(datetype);
			}
		<?php echo '</script'; ?>
>
	</body>
</html>
<?php }} ?>
