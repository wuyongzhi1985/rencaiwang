<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:20:09
         compiled from "D:\www\www\phpyun\app\template\admin\admin_makenews.htm" */ ?>
<?php /*%%SmartyHeaderCode:56781380762e22a996147d9-67997962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b52300d18a3ee9c2b5e3c9d1b90154048d99251' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_makenews.htm',
      1 => 1634559902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56781380762e22a996147d9-67997962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'type' => 0,
    'rows' => 0,
    'v' => 0,
    'pytoken' => 0,
    'classid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22a9964ea82_33918242',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22a9964ea82_33918242')) {function content_62e22a9964ea82_33918242($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
		<title></title>
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

	</head>
	<body class="body_ifm">

		<div class="infoboxp">
			<div class="tty-tishi_top">
				<div class="admin_new_tip">
					<a href="javascript:;" class="admin_new_tip_close"></a>
					<a href="javascript:;" class="admin_new_tip_open" style="display:none;"></a>
					<div class="admin_new_tit"><i class="admin_new_tit_icon"></i>操作提示</div>
					<div class="admin_new_tip_list_cont">
						<div class="admin_new_tip_list">生成请确保目录有可写权限，否则无法生成。</div>
						<div class="admin_new_tip_list">添加导航的时候，链接可以填写 <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/ 保存路径</div>
					</div>
				</div>
				<div class="clear"></div>

			<iframe id="supportiframe" name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
				<form target="supportiframe" action="" method="post" class="layui-form">
					<div class="tag_box mt10">
						<?php if ($_smarty_tpl->tpl_vars['type']->value=="once") {?>
						<table width="100%" class="table_form ">
							<tr>
								<th width="28%">选择栏目：</th>
								<td>
									<div class="layui-input-inline t_w480">
										<select name="group" id="once_val">
											<option value="全部">全部</option>
											<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
											<?php } ?>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td class="ud" align="center" colspan="2">
									<input class="layui-btn tty_sub" type="button" id="cache_once" value="更新单页面" />
								</td>
							</tr>
							<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
						</table>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['type']->value=="all") {?>
						<table width="100%" class="table_form ">
							<tr>
								<th width="28%">首页保存路径：</th>
								<td>
									<div class="layui-input-block">
										<div class="layui-input-inline t_w480">
											<input type="text" name="make_index_url" lay-verify="required" placeholder="请输入首页保存路径" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['make_index_url'];?>
"
											 size="30" autocomplete="off" class="layui-input">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<th width="28%">新闻首页保存路径：</th>
								<td>
									<div class="layui-input-block">
										<div class="layui-input-inline t_w480">
											<input type="text" name="make_new_url" lay-verify="required" placeholder="请输入新闻首页保存路径" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['make_new_url'];?>
"
											 size="30" autocomplete="off" class="layui-input">
										</div>
									</div>
								</td>
							</tr>
							<tr class="admin_table_trbg">
								<td class="ud" align="center" colspan="2">
									<input class="layui-btn tty_sub" type="button" id="madeall" value="一键更新" />
								</td>
							</tr>
							<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
						</table>
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['type']->value=="index") {?>
						<table width="100%" class="table_form ">
							<tr>
								<th width="28%">首页保存路径：</th>
								<td>
									<div class="layui-input-block">
										<div class="layui-input-inline t_w480">
											<input type="text" name="make_index_url" lay-verify="required" placeholder="请输入首页保存路径" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['make_index_url'];?>
"
											 size="30" autocomplete="off" class="layui-input">
										</div>
									</div>
								</td>
							</tr>
							<tr class="admin_table_trbg">
								<td class="ud" align="center" colspan="2">
									<input class="layui-btn tty_sub" type="submit" id='madeindex' name="madeall" value="更新首页" />
								</td>
							</tr>
							<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
						</table>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['type']->value=="news") {?>
						<table target="supportiframe" width="100%" class="table_form  " action="">
							<tr>
								<th width="28%">新闻首页保存路径：</th>
								<td>
									<div class="layui-input-block">
										<div class="layui-input-inline t_w480">
											<input type="text" name="make_new_url" lay-verify="required" placeholder="请输入新闻首页保存路径" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['make_new_url'];?>
"
											 size="30" autocomplete="off" class="layui-input">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="ud" align="center" colspan="2"><input class="layui-btn tty_sub" type="submit" id='madenindex' name="madeall"
									 value="更新新闻首页" />
								</td>
							</tr>
							<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
						</table>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['type']->value=="newsclass") {?>
						<table width="100%" class="table_form ">
							<input id="classid" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['classid']->value;?>
">
							<tr>
								<th width="28%">选择栏目：</th>
								<td>
									<div class="layui-input-inline t_w480">
										<select name="group" id="group_val">
											<option value="all">请选择</option>
											<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
											<?php } ?>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td class="ud" align="center" colspan="2">
									<input class="layui-btn tty_sub" type="button" id="newsclass" value="更新内容" />
								</td>
							</tr>
							<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
						</table>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['type']->value=="archive") {?>
						<table width="100%" class="table_form ">
							<tr class="admin_table_trbg">
								<th width="120">选择栏目：</th>
								<td>
									<div class="layui-input-inline t_w480">
										<select name="group" id="groupcont_val">
											<option value="0">全部</option>
											<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
											<?php } ?>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<th>发布时间：</th>
								<td>
									<div class="layui-input-inline t_w480">
										<input type="text" name="time" id="time" lay-verify="date" autocomplete="off" class="layui-input" size="30">
									</div>
								</td>
							</tr>
							<tr class="admin_table_trbg">
								<th>开始编号：</th>
								<td>
									<div class="layui-input-inline t_w480">
										<input type="text" id="start_id" lay-verify="required" placeholder="0" value="0" size="30" autocomplete="off"
										 class="layui-input">
									</div>
									<span class="admin_web_tip"> 0从头开始</span>
								</td>
							</tr>
							<tr>
								<th>结束编号：</th>
								<td>
									<div class="layui-input-inline t_w480">
										<input type="text" id="end_id" lay-verify="required" placeholder="0" value="0" size="30" autocomplete="off"
										 class="layui-input">
									</div>
									<span class="admin_web_tip">0到最后一条</span>
								</td>
							</tr>
							<tr class="admin_table_trbg">
								<th>每页生成：</th>
								<td>
									<div class="layui-input-inline t_w480">
										<input type="text" id="limit" lay-verify="required" placeholder="20" value="20" size="30" autocomplete="off"
										 class="layui-input">
									</div>
									<span class="admin_web_tip">注：每页生成数不要设置太大</span>
								</td>
							</tr>
							<tr>
								<th></th>
								<td>
									<input class="layui-btn tty_sub" type="button" id="archive" value="更新内容" />
								</td>
							</tr>
							<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
						</table>
						<?php }?>
					</div>
				</form>
			</div>
		</div>
		<input type="hidden" id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
		<?php echo '<script'; ?>
 language="javascript">
			layui.use(['layer', 'form', 'element', 'laydate'], function() {
				var layer = layui.layer,
					form = layui.form,
					laydate = layui.laydate,
					element = layui.element,
					$ = layui.$;
				//日期
				laydate.render({
					elem: '#time',
					range: '~'
				});
			}); //end layui.use()

			$(document).ready(function() {
				$("#archive").click(function() {
					var times = $.trim($("#time").val()).split('~');
					var stime = times[0];
					var etime = times[1];
					var group = $("#groupcont_val").val();
					var startid = $("#start_id").val();
					var endid = $("#end_id").val();
					var limit = $("#limit").val();
					makearchive(stime, etime, group, startid, endid, limit, "archive", 0, '正在获取新闻总数');
				})
				$("#madeall").click(function() {
					var make_index_url = $("input[name=make_index_url]").val();
					var make_new_url = $("input[name=make_new_url]").val();
					make_all(make_index_url, make_new_url, "cache", 0, '正在生成区域');
				})
				$("#newsclass").click(function() {
					var group = $("#group_val").val();
					makenewsclass(group, "class", 0, '正在获取新闻类别信息');
				});
				$("#madeindex").click(function() {
					var ii = parent.layer.load("正在生成...", 0);
				});
				$("#madenindex").click(function() {

					var ii = parent.layer.load("正在生成...", 0);
				});
				$("#cache_once").click(function() {
					var desc = $("#once_val").val();
					var pytoken = $("#pytoken").val();
					var ii = parent.layer.load("正在生成", 0);
					$.post("index.php?m=cache&c=once", {
						desc: desc,
						pytoken: pytoken,
						make: 1
					}, function(data) {
						parent.layer.close(ii);
						if (data == 1) {
							parent.layer.msg("生成成功！", 2, 9);
						}
					})
				})
			})

			function make_all(make_index_url, make_new_url, type, value, msg) {
				if (type != "ok") {
					var ii = parent.layer.load(msg, 0);
					var pytoken = $("#pytoken").val();
					$.post("index.php?m=cache&c=all", {
						action: "makeall",
						make_index_url: make_index_url,
						make_new_url: make_new_url,
						type: type,
						value: value,
						pytoken: pytoken
					}, function(data) {
						parent.layer.close(ii);
						var data = eval('(' + data + ')');
						make_all(make_index_url, make_new_url, data.type, data.value, data.msg);
					})
				} else {
					parent.layer.close(ii);
					parent.layer.alert(msg, 9);
				}
			}

			function makenewsclass(group, type, value, msg) {
				if (type != "ok") {
					var ii = parent.layer.load(msg, 0);
					var pytoken = $("#pytoken").val();
					$.post("index.php?m=cache&c=newsclass", {
						action: "makeclass",
						group: group,
						type: type,
						value: value,
						pytoken: pytoken
					}, function(data) {
						parent.layer.close(ii);
						var data = eval('(' + data + ')');
						makenewsclass(group, data.type, data.value, data.msg);
					})
				} else {
					parent.layer.close(ii);
					parent.layer.alert(msg, 9);
				}
			}

			function makearchive(stime, etime, group, startid, endid, limit, type, value, msg) {

				$("#make_l").html(msg);

				if (type != "ok") {
					var ii = parent.layer.msg(msg, {
						icon: 16,
						shade: 0.01
					})
					var pytoken = $("#pytoken").val();
					$.post(
						"index.php?m=cache&c=archive", {
							action: "makearchive",
							group: group,
							startid: startid,
							endid: endid,
							limit: limit,
							type: type,
							value: value,
							pytoken: pytoken,
							stime: stime,
							etime: etime
						},
						function(data) {
							parent.layer.close(ii);
							var data = eval('(' + data + ')');
							makearchive(stime, etime, group, startid, endid, limit, data.type, data.value, data.msg);
						})
				} else {
					parent.layer.close(ii);
					parent.layer.alert(msg, 9);
				}
			}
		<?php echo '</script'; ?>
>
	</body>
</html>
<?php }} ?>
