<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:21:05
         compiled from "D:\www\www\phpyun\app\template\admin\admin_emailmsg.htm" */ ?>
<?php /*%%SmartyHeaderCode:105529100062e22ad1b25b21-00491665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbad46a58d43959bec3569ca50f395456f98dcc4' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_emailmsg.htm',
      1 => 1635758116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105529100062e22ad1b25b21-00491665',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'rows' => 0,
    'key' => 0,
    'v' => 0,
    'total' => 0,
    'pagenum' => 0,
    'pages' => 0,
    'pagenav' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22ad1b6f8d0_25003214',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22ad1b6f8d0_25003214')) {function content_62e22ad1b6f8d0_25003214($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include 'D:\\www\\www\\phpyun\\app\\include\\libs\\plugins\\function.searchurl.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\www\\www\\phpyun\\app\\include\\libs\\plugins\\modifier.date_format.php';
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
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
	<link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/css/layui.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
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

<?php echo '<script'; ?>
>
	function ckemailmsg(){
		var sdate=$("#sdate").val();
		var edate=$("#edate").val(); 
		if(sdate&&edate&&toDate(edate)<toDate(sdate)){
			layer.msg("???????????????????????????????????????",2,8);return false;
		}
	}
<?php echo '</script'; ?>
>
<body class="body_ifm">

<div class="infoboxp">
	<div class="tty-tishi_top">

	<div class="clear"></div>

	<div class="admin_new_search_box">
		<form action="index.php" name="myform" method="get" style="float:left" onsubmit="return ckemailmsg()">
			<input name="m" value="emailconfiglist" type="hidden"/>
			<input type="hidden" name="state" value="<?php echo $_GET['state'];?>
"/>
			
			<div class="admin_new_search_name">???????????????</div>
			
			<div class="admin_Filter_text formselect" did="dtype">
				<input type="button" <?php if ($_GET['type']==''||$_GET['type']=='1') {?> value="??????"<?php } elseif ($_GET['type']=='2') {?> value="?????????"<?php } elseif ($_GET['type']=='3') {?> value="?????????"<?php } elseif ($_GET['type']=='4') {?> value="????????????"<?php }?> class="admin_Filter_but" id="btype">
				<input type="hidden" name="type" id="type" <?php if ($_GET['type']=='') {?>value="1"<?php } else { ?>value="<?php echo $_GET['type'];?>
"<?php }?>/>
				
				<div class="admin_Filter_text_box" style="display:none" id="dtype">
					<ul>
						<li><a href="javascript:void(0)" onClick="formselect('1','type','??????')">??????</a></li>
						<li><a href="javascript:void(0)" onClick="formselect('2','type','?????????')">?????????</a></li>
						<li><a href="javascript:void(0)" onClick="formselect('3','type','?????????')">?????????</a></li>
						<li><a href="javascript:void(0)" onClick="formselect('4','type','????????????')">????????????</a></li>
					</ul>
				</div>
			</div>
			
			<input class="admin_Filter_search" type="text" name="keyword"  size="25" style="float:left">
			<div class="admin_new_search_name">?????????</div>
			<input class="admin_Filter_search" type="text" name="date" id="date" style="float:left;" value="<?php echo $_GET['date'];?>
"> 
			<input class="admin_Filter_bth" type="submit" name="news_search" value="??????"/>
		</form>
		<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	
	<div class="clear"></div>
	</div>

<div class="tty_table-bom">
	<div class="table-list">
    <div class="admin_table_border">
		<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
		<form action="index.php?m=emailconfiglist&c=del" target="supportiframe" name="myform" method="post" id='myform'>
			<table width="100%">
				<thead>
					<tr class="admin_table_top">
						<th><label for="chkall"><input type="checkbox" id='chkAll' onclick='CheckAll(this.form)'/></label></th>
						<th align="left" width="50px"> 
							<?php if ($_GET['t']=="id"&&$_GET['order']=="asc") {?> 
								<a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'id','m'=>'emailconfiglist','untype'=>'order,t'),$_smarty_tpl);?>
">??????<img src="images/sanj.jpg"/></a> 
							<?php } else { ?> 
								<a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'id','m'=>'emailconfiglist','untype'=>'order,t'),$_smarty_tpl);?>
">??????<img src="images/sanj2.jpg"/></a> 
							<?php }?> 
						</th>
						<th align="left" width="150">??????</th>
						<th align="left">?????????</th>
						<th align="left">?????????</th>
						<th align="left">??????</th>
						<th width="120"> 
							<?php if ($_GET['t']=="ctime"&&$_GET['order']=="asc") {?> 
								<a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'ctime','m'=>'emailconfiglist','untype'=>'order,t'),$_smarty_tpl);?>
">??????<img src="images/sanj.jpg"/></a> 
							<?php } else { ?> 
								<a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'ctime','m'=>'emailconfiglist','untype'=>'order,t'),$_smarty_tpl);?>
">??????<img src="images/sanj2.jpg"/></a> 
							<?php }?> 
						</th>
						<th width="30">??????</th>
						<th class="admin_table_th_bg">??????</th>
					</tr>
				</thead>
				
				<tbody>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
					<tr align="center"<?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
						<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
						<td align="left" class="td1" style="text-align:center;"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span></td>
						<td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
</td>
						<td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['fname'];?>
</td>
						<td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['sname'];?>
</td>
						<td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</td>
						<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['ctime'],"%Y-%m-%d %H:%M");?>
</td>
						<td><?php if ($_smarty_tpl->tpl_vars['v']->value['state']==1) {?><font color="green">??????</font><?php } else { ?><font color="red">??????</font><?php }?></td>
						<td><a href="javascript:void(0)" onClick="layer_del('??????????????????', 'index.php?m=emailconfiglist&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');"class="admin_new_c_bth admin_new_c_bth_sc">??????</a></td>
					</tr>
				<?php } ?>
				<tr>
					<td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
					<td colspan="9" >
						<label for="chkAll2">??????</label>&nbsp;
						<input class="admin_button"  type="button" name="delsub" value="????????????" onClick="return really('del[]')" />
						<input class="admin_button" type="button" name="repeat" value="????????????" onClick="return repeatSend('del[]')" />
					</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['total']->value>$_smarty_tpl->tpl_vars['config']->value['sy_listnum']) {?>
					<tr>
						<?php if ($_smarty_tpl->tpl_vars['pagenum']->value==1) {?>
							<td colspan="3"> ??? 1 ??? <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_listnum'];?>
 ????????? <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ???</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['pagenum']->value>1&&$_smarty_tpl->tpl_vars['pagenum']->value<$_smarty_tpl->tpl_vars['pages']->value) {?>
							<td colspan="3"> ??? <?php echo ($_smarty_tpl->tpl_vars['pagenum']->value-1)*$_smarty_tpl->tpl_vars['config']->value['sy_listnum']+1;?>
 ??? <?php echo $_smarty_tpl->tpl_vars['pagenum']->value*$_smarty_tpl->tpl_vars['config']->value['sy_listnum'];?>
 ????????? <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ???</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['pagenum']->value==$_smarty_tpl->tpl_vars['pages']->value) {?>
							<td colspan="3"> ??? <?php echo ($_smarty_tpl->tpl_vars['pagenum']->value-1)*$_smarty_tpl->tpl_vars['config']->value['sy_listnum']+1;?>
 ??? <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ????????? <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ???</td>
						<?php }?>
						<td colspan="7" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
					</tr>
				<?php }?>
				</tbody>
			</table>
			<input type="hidden" name="pytoken"  id='pytoken'  value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
		</form>
    </div>
	</div>
</div>
<?php echo '<script'; ?>
>
	layui.use(['laydate'], function(){
		var laydate = layui.laydate,
			$ = layui.$;

		laydate.render({
			elem: '#date',
			range:'~'
		});
	});
	function repeatSend(name){
		var chk_value =[];
		$('input[name="'+name+'"]:checked').each(function(){
			chk_value.push($(this).val());
		});
		if(chk_value.length==0){
			parent.layer.msg("??????????????????????????????",2,8);return false;
		}else{
			var repeatcf = parent.layer.confirm("??????????????????????????????",function(){
				parent.layer.close(repeatcf);
				parent.layer.load('?????????????????????...',0);
				var pytoken=$("#pytoken").val();
				$.post('index.php?m=emailconfiglist&c=repeat',{pytoken:pytoken,id:chk_value},function(msg){
					parent.layer.closeAll();
					parent.layer.msg(msg,2,9,function(){location.reload();});
					return false;
				})
			});
		}
	}
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
