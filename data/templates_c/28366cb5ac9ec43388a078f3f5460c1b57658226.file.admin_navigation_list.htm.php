<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:20:44
         compiled from "D:\www\www\phpyun\app\template\admin\admin_navigation_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:206049927562e22abc3f8496-79237672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28366cb5ac9ec43388a078f3f5460c1b57658226' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_navigation_list.htm',
      1 => 1641437893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206049927562e22abc3f8496-79237672',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'nclass' => 0,
    'k' => 0,
    'v' => 0,
    'nav' => 0,
    'key' => 0,
    'total' => 0,
    'pagenum' => 0,
    'pages' => 0,
    'pagenav' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22abc438b39_38332083',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22abc438b39_38332083')) {function content_62e22abc438b39_38332083($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
		<?php echo '<script'; ?>
 src="js/admin_public.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" language="javascript"><?php echo '</script'; ?>
>
		<title>????????????</title>
	</head>
	<body class="body_ifm">
		<div class="infoboxp">
			<div class="tty-tishi_top">


				<div class="clear"></div>

				<div class="admin_new_search_box">
					<form action="index.php" name="myform" method="get">
						<input name="m" value="navigation" type="hidden" />
						<div class="admin_new_search_name">???????????????</div>
						<div class="admin_Filter_text formselect" did='dtype'>
							<input type="button" value="<?php if ($_GET['nid']) {
echo $_smarty_tpl->tpl_vars['nclass']->value[$_GET['nid']];
} else { ?>?????????<?php }?>"
							 class="admin_Filter_but" id="btype">
							<input type="hidden" id='type' value="<?php echo $_GET['nid'];?>
" name='nid'>
							<div class="admin_Filter_text_box" style="display:none" id='dtype'>
								<ul>
									<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['nclass']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<li><a href="javascript:void(0)" onClick="formselect('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
','type','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<input class="admin_Filter_search" type="text" name="keyword" size="25" style="float:left" placeholder="?????????????????????????????????">
						<input class="admin_Filter_bth" type="submit" name="news_search" value="??????" />
						<a href="index.php?m=navigation&c=add" class="admin_new_cz_tj">+ ????????????</a>
						<a href="index.php?m=navigation&c=group" class="admin_new_cz_tj">+ ????????????</a>
					</form>

				</div>
				<div class="clear"></div>
			</div>

			<div class="tty_table-bom">
				<div class="table-list">
					<div class="admin_table_border">
						<iframe id="supportiframe" name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
						<form action="index.php" name="myform" id='myform' method="get" target="supportiframe">
							<input name="m" value="navigation" type="hidden" />
							<input name="c" value="del" type="hidden" />
							<table width="100%">
								<thead>
									<tr class="admin_table_top">
										<th><label for="chkall"><input type="checkbox" id='chkAll' onclick='CheckAll(this.form)' /></label></th>
										<th>????????????</th>
										<th align="left">????????????</th>
										<th align="left">????????????</th>
										<th align="left">????????????</th>
										<th>????????????</th>
										<th><?php if ($_GET['t']=="sort"&&$_GET['order']=="desc") {?> <a href="index.php?m=navigation&order=asc&t=sort">??????<img
												 src="images/sanj2.jpg" /></a> <?php } else { ?> <a href="index.php?m=navigation&order=desc&t=sort">??????<img
												 src="images/sanj.jpg" /></a> <?php }?></th>
										<th>????????????</th>
										<th>??????</th>
										<th class="admin_table_th_bg">??????</th>
									</tr>
								</thead>
								<tbody>
									<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<tr align="center" <?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
										<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name='del[]' onclick='unselectall()' rel="del_chk" /></td>
										<td align="left" class="td1" style="text-align:center;"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span></td>
										<td class="od" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
										<td class="ud" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>
</td>
										<td class="gd" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
</td>
										<td class="td"><?php if ($_smarty_tpl->tpl_vars['v']->value['type']=='1') {?>????????????<?php } else { ?>????????????<?php }?></td>
										<td class="td"><?php echo $_smarty_tpl->tpl_vars['v']->value['sort'];?>
</td>
										<td class="td" id="eject<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
											<?php if ($_smarty_tpl->tpl_vars['v']->value['eject']=='1') {?>
											<a href="javascript:void(0);" onClick="tanchu('index.php?m=navigation&c=nav_xianshi','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','0','eject');">?????????</a>
											<?php } else { ?>
											<a href="javascript:void(0);" onClick="tanchu('index.php?m=navigation&c=nav_xianshi','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','1','eject');">?????????</a>
											<?php }?>
										</td>
										<td class="td" id="display<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
											<?php if ($_smarty_tpl->tpl_vars['v']->value['display']=='1') {?>
											<a href="javascript:void(0);" onClick="rec_up('index.php?m=navigation&c=nav_xianshi','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','0','display');"><img
												 src="../config/ajax_img/doneico.gif"></a>
											<?php } else { ?>
											<a href="javascript:void(0);" onClick="rec_up('index.php?m=navigation&c=nav_xianshi','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','1','display');"><img
												 src="../config/ajax_img/errorico.gif"></a>
											<?php }?>
										</td>
										<td><a href="index.php?m=navigation&c=add&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="admin_new_c_bth ">??????</a> <a href="javascript:void(0)"
											 onClick="layer_del('??????????????????', 'index.php?m=navigation&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="admin_new_c_bth admin_new_c_bth_sc">??????</a></td>
									</tr>
									<?php } ?>
									<tr>
										<td align="center"><label for="chkall2"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></label></td>
										<td colspan="9"><label for="chkAll2">??????</label>
											<input class="admin_button" type="button" name="delsub" value="????????????" onclick="return really('del[]')" /></td>
									</tr>
									<?php if ($_smarty_tpl->tpl_vars['total']->value>$_smarty_tpl->tpl_vars['config']->value['sy_listnum']) {?>
									<tr>
										<?php if ($_smarty_tpl->tpl_vars['pagenum']->value==1) {?>
										<td colspan="3"> ??? 1 ??? <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_listnum'];?>
 ????????? <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ???</td>
										<?php } elseif ($_smarty_tpl->tpl_vars['pagenum']->value>1&&$_smarty_tpl->tpl_vars['pagenum']->value<$_smarty_tpl->tpl_vars['pages']->value) {?> <td colspan="3"> ??? <?php echo ($_smarty_tpl->tpl_vars['pagenum']->value-1)*$_smarty_tpl->tpl_vars['config']->value['sy_listnum']+1;?>
 ??? <?php echo $_smarty_tpl->tpl_vars['pagenum']->value*$_smarty_tpl->tpl_vars['config']->value['sy_listnum'];?>
 ????????? <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ???</td>
											<?php } elseif ($_smarty_tpl->tpl_vars['pagenum']->value==$_smarty_tpl->tpl_vars['pages']->value) {?>
											<td colspan="3"> ??? <?php echo ($_smarty_tpl->tpl_vars['pagenum']->value-1)*$_smarty_tpl->tpl_vars['config']->value['sy_listnum']+1;?>
 ??? <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ?????????
												<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ???</td>
											<?php }?>
											<td colspan="7" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
									</tr>
									<?php }?>
								</tbody>
							</table>
							<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php echo '<script'; ?>
>
			function tanchu(url, id, rec, type) {
				var pytoken = $("#pytoken").val();
				$.get(url + "&id=" + id + "&rec=" + rec + "&type=" + type + "&pytoken=" + pytoken, function(data) {
					if (data == 1) {
						if (rec == "1") {
							$("#" + type + id).html("<a href=\"javascript:void(0);\" onClick=\"tanchu('" + url + "','" + id + "','0','" +
								type + "');\">?????????</a>");
						} else {
							$("#" + type + id).html("<a href=\"javascript:void(0);\" onClick=\"tanchu('" + url + "','" + id + "','1','" +
								type + "');\">?????????</a>");
						}
					}
				});
			}
		<?php echo '</script'; ?>
>
	</body>
</html>
<?php }} ?>
