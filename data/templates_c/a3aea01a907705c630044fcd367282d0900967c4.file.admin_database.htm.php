<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:20:59
         compiled from "D:\www\www\phpyun\app\template\admin\admin_database.htm" */ ?>
<?php /*%%SmartyHeaderCode:119703108562e22acb1ec0c5-01742830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3aea01a907705c630044fcd367282d0900967c4' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_database.htm',
      1 => 1634559902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119703108562e22acb1ec0c5-01742830',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'list' => 0,
    'v' => 0,
    'vv' => 0,
    'basename' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22acb214119_94963997',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22acb214119_94963997')) {function content_62e22acb214119_94963997($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
	<title>后台管理</title> 
</head>

<body class="body_ifm">

<div class="infoboxp">
	<div class="tty-tishi_top">
	<div class="tabs_info">
		<ul>
			<li class="curr"><a href="index.php?m=database">备份数据</a></li>
			<li><a href="index.php?m=database&c=backin">恢复数据</a></li>
			<li><a href="index.php?m=database&c=optimizing">优化数据</a></li>
			<li><a href="index.php?m=database&c=clearList">数据清理</a></li>
		</ul>
	</div>
	
	<div class="admin_new_tip">
		<a href="javascript:;" class="admin_new_tip_close"></a>
		<a href="javascript:;" class="admin_new_tip_open" style="display:none;"></a>
		<div class="admin_new_tit"><i class="admin_new_tit_icon"></i>操作提示</div>
		<div class="admin_new_tip_list_cont">
			<div class="admin_new_tip_list">该页面展示了网站数据库信息，可对数据库进行备案还原操作，也可通过其它软件进行操作。</div>
		</div>
	</div>

	<div class="clear"></div>
	
	<div class="table-list mt10" id="databaseshow">
		<div class="admin_table_border">
			<iframe id="supportiframe" name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
			<form class="layui-form">
				
				<input type="hidden" name="pytoken" id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
				
				<table width="100%">
					<thead>
						<tr class="admin_table_top">
							<th colspan="4" align="left"><span style="padding-left:10px;">备份类型</span></th>
						</tr>
					</thead>
					<tr>
						<td colspan="4"> 
							<div class="layui-form-item" style="float:left; margin-bottom:0px;">
								<div class="layui-input-block" >
									<input name="basetype" value="1" title="全部备份 -- 备份数据库所有表"  type="radio" lay-filter="batesave" checked/>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="4"align="left">
							<div class="layui-form-item" style="float:left; margin-bottom:0px;">
								<div class="layui-input-block" >
									<input name="basetype" value="2" title="自定义备份 -- 根据自行选择备份数据表" type="radio" lay-filter="batesave"/>
								</div>
							</div>
						</td>
					</tr>

					<tr class="batabaseselect"  style="display:none">
						<td colspan="4" width="40" align="left">
							<input type="checkbox" id='chkAll' lay-filter="chkall" title="全选"  lay-skin="primary"  checked/>&nbsp;
						</td>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>  
						<tr style="display:none"   class="batabaseselect">
							<?php  $_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['v']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->key => $_smarty_tpl->tpl_vars['vv']->value) {
$_smarty_tpl->tpl_vars['vv']->_loop = true;
?>  
								<td >
									<input type="checkbox" name="table[]" value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['vv']->value['name'];?>
" checked onclick='unselectall()' class="check_all"  lay-skin="primary" >
								</td>
							<?php } ?>  
						</tr>
					<?php } ?>

					<thead>
						<tr class="admin_table_top">
							<th colspan="4" align="left"><span style="padding-left:10px;">其他选项</span></th>
						</tr>
					</thead>
					<tr>
						<td>分卷备份 - 文件长度限制(kb)</td>
						<td colspan="3">
							<input type="text" name="maxfilesize" id="maxfilesize" value="2048"class="admin_comedity_text"/>
						</td>
					</tr>
					<tr>
						<td>备份文件名</td>
						<td colspan="3">
							<input type="text" name="basename" value="<?php echo $_smarty_tpl->tpl_vars['basename']->value;?>
" class="admin_comedity_text"/>
						</td>
					</tr>

					<tr align="center">
						<td colspan="4"><input type="button" class="layui-btn tty_sub" onclick="check_backup()" value="提交备份"/></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	</div>
	
	<div class="table-list mt10" style="display:none;" id="success">
		<div class="admin_table_border">

			<div class="layui-progress layui-progress-big" lay-showpercent="true" lay-filter="demo">
				<div class="layui-progress-bar layui-bg-red" lay-percent="0%"></div>
			</div>

		</div>
	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
	layui.use(['layer', 'form', 'element'], function(){
		var layer = layui.layer
			,form = layui.form
			,element = layui.element
			,$ = layui.$;
		
		form.on('checkbox(chkall)', function(data){
			$(".check_all").prop("checked", this.checked);
			form.render();
		});
		
		form.on('radio(batesave)', function(data){
			if(data.value==1){
				$(".batabaseselect").hide();
				$(".check_all").prop("checked", "true");
			}else{
				$(".batabaseselect").show();
				 $(".check_all").removeProp("checked");
				 $("#chkAll").removeProp("checked");
			}
			form.render();
		});
	});

	function accMul(arg1, arg2) {
        var m = 0,
            s1 = arg1.toString(),
            s2 = arg2.toString();
        try {
            m += s1.split(".")[1].length
        } catch(e) {}
        try {
            m += s2.split(".")[1].length
        } catch(e) {}
        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
    }

    function accDiv(arg1, arg2) {
        var t1 = 0,
            t2 = 0,
            r1, r2;
        try {
            t1 = arg1.toString().split(".")[1].length
        } catch(e) {}
        try {
            t2 = arg2.toString().split(".")[1].length
        } catch(e) {}
        with(Math) {
            r1 = Number(arg1.toString().replace(".", ""));
            r2 = Number(arg2.toString().replace(".", ""));
            return(r1 / r2) * pow(10, t2 - t1);
        }
    }

	function check_backup(){
		var pytoken=$("#pytoken").val();
		var maxfilesize=$("#maxfilesize").val();
		var chk_value =[];
		$('input[name="table[]"]:checked').each(function(){
			chk_value.push($(this).val());
		});
		var basetype=$('input[name="basetype"]:checked').val();
		if(chk_value.length==0 && basetype==2){
			parent.layer.msg("请选择要备份的数据！",2,8);return false;
		}else{
			parent.layer.confirm("确定备份吗？",function(){
				parent.layer.closeAll();
				$.post('index.php?m=database&c=backup',{pytoken:pytoken,table:chk_value,maxfilesize:maxfilesize},function(data){
 					var data=eval("("+data+")");
					$("#databaseshow").hide();
					$("#success").show();
					BackupDatabaseFileSize(data.c,data.t,data.s,data.p,data.mypath,'','','','',data.waitbaktime,pytoken,chk_value.length);
				})
			});
		} 
	}
	function BackupDatabaseFileSize(c,t,s,p,mypath,alltotal,thenof,fnum,stime,waitbaktime,pytoken,count){
		$.get('index.php?m=database&c='+c,{pytoken:pytoken,t:t,s:s,p:p,mypath:mypath,alltotal:alltotal,thenof:thenof,fnum:fnum,stime:stime},function(arr){
			var arr=eval("("+arr+")");
			
			if(arr.t){
				
				var n = parseInt(accMul(accDiv(arr.t, count),100)); 
				
				layui.use('element', function(){
					var $ = layui.jquery,
						element = layui.element; 
					element.progress('demo', n+'%');
				});
				
				BackupDatabaseFileSize(c,arr.t,arr.s,arr.p,arr.mypath,arr.alltotal,arr.thenof,arr.fnum,arr.stime,arr.waitbaktime,pytoken,count);

			}else if(arr.bt){
			
				var n = parseInt(accMul(accDiv(arr.bt, count),100)); 
				
				layui.use('element', function(){
					var $ = layui.jquery,
						element = layui.element; 
					element.progress('demo', n+'%');
				});

				parent.layer.msg(arr.msg, 2,9,function(){
					location=location ;
				});
				return false;
			}	
			
		})
	}
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
