<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:20:49
         compiled from "D:\www\www\phpyun\app\template\admin\admin_cron_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:149086628862e22ac133df06-58693396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7e891d98e05043077f925d904f32124fbfa6563' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_cron_list.htm',
      1 => 1634559903,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149086628862e22ac133df06-58693396',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'rows' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22ac1375d71_17740916',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22ac1375d71_17740916')) {function content_62e22ac1375d71_17740916($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\www\\www\\phpyun\\app\\include\\libs\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

		<link href="images/reset.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
		<link href="images/system.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
		<link href="images/table_form.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
		<link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/css/layui.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet"
		 type="text/css" />
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
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
		<?php echo '<script'; ?>
 src="js/admin_public.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" language="javascript"><?php echo '</script'; ?>
>

		<title>????????????</title>
	</head>

	<body class="body_ifm">
		<div id="wname" style="display:none; width: 350px; ">
			<div style="height: 160px;" class="job_box_div">
				<div class="job_box_inp">
					<table class="table_form " style="width:100%">
						<tr>
							<td class='ui_content_wrap'>??????(CTRL+C)??????????????????????????????????????????</td>
						</tr>
						<tr>
							<td><input type="text" name="position" id='copy_url' class="input-text" size='45' style="width:310px;" /></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="infoboxp">
			<div class="tty-tishi_top">
				<div class="tabs_info">
					<ul>
						<li class="curr"> <a href="index.php?m=cron">????????????</a></li>
						<li> <a href="index.php?m=cron&c=cronLog">????????????</a></li>
					</ul>
				</div>
				<div class="admin_new_tip">
					<a href="javascript:;" class="admin_new_tip_close"></a>
					<a href="javascript:;" class="admin_new_tip_open" style="display:none;"></a>
					<div class="admin_new_tit"><i class="admin_new_tit_icon"></i>????????????</div>
					<div class="admin_new_tip_list_cont">
						<div class="admin_new_tip_list">
							???????????????????????????????????????????????????????????????????????????????????????XML???????????????????????????????????????????????????????????????????????????????????????
						</div>
					</div>
				</div>

				<div class="clear"></div>

				<div class="admin_new_search_box">
					
						<a href="index.php?m=cron&c=add" class="admin_new_cz_tj" style="margin-left:0px;">+ ????????????</a>
					<div class="clear"></div>
				</div>
			</div>
				
				<div class="tty_table-bom">
					<div class="table-list">
						<div class="admin_table_border">
							<form action="" name="myform" method="get">
								<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">

								<table width="100%">
									<thead>
										<tr class="admin_table_top">
											<th align="left">ID</th>
											<th align="left">
												<div style="padding-left:10px;">????????????</div>
											</th>
											<th align="left">????????????</th>
											<th align="left">????????????</th>
											<th align="left">????????????</th>
											<th align="left">??????????????????</th>
											<th align="left">??????????????????</th>
											<th align="left">????????????</th>
											<th width="180">??????</th>
										</tr>
									</thead>
									<tbody>
										<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
										<tr align="left">
											<td align="left" class="ud">
												<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>

											</td>
											<td align="left" class="td1">
												<div style="padding-left:10px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</div>
											</td>
											<td align="left" class="ud"><?php echo $_smarty_tpl->tpl_vars['v']->value['dir'];?>
</td>
											<td class="ud" align="left">
												<?php if ($_smarty_tpl->tpl_vars['v']->value['type']==1) {?>??????<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['v']->value['type']==2) {?>??????<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['v']->value['type']==3) {?>??????<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['v']->value['type']==4) {?>??????N???<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['v']->value['type']==5) {?>??????N??????<?php }?>
											</td>
											<td class="od" align="left">
												<?php if ($_smarty_tpl->tpl_vars['v']->value['display']==1) {?>???<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['v']->value['display']==2) {?>???<?php }?>
											</td>
											<td align="left" class="ud">
												<?php if ($_smarty_tpl->tpl_vars['v']->value['nowtime']) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['nowtime'],"%Y-%m-%d %H:%M");
} else { ?>-
												-<?php }?>
											</td>
											<td align="left" class="ud">
												<?php if ($_smarty_tpl->tpl_vars['v']->value['nexttime']) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['nexttime'],"%Y-%m-%d %H:%M");
} else { ?>-
												-<?php }?>
											</td>
											<td class="ud" align="center">
												<a href="javascript:void(0);" onclick="copy_url('????????????','<?php echo $_smarty_tpl->tpl_vars['v']->value['src'];?>
')" class="admin_cz_yl">??????</a>
											</td>
											<td align="center">

												<?php if ($_smarty_tpl->tpl_vars['v']->value['display']==1) {?>
												<a href="javascript:void(0)" onclick="layer_del('??????????????????????????????', 'index.php?m=cron&c=run&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');"
												 class="admin_new_c_bth">??????</a>
												<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['display']==2) {?>
												<a href="javascript:void(0)" onclick="layer_del('????????????????????????', 'index.php?m=cron');" class="admin_new_c_bth">??????</a>
												<?php }?>
												<a href="index.php?m=cron&c=add&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="admin_new_c_bth">??????</a>
												<a href="javascript:void(0)" onclick="layer_del('??????????????????', 'index.php?m=cron&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');"
												 class="admin_new_c_bth admin_new_c_bth_sc">??????</a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php }} ?>
