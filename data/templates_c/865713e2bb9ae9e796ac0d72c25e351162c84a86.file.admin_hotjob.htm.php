<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:20:07
         compiled from "D:\www\www\phpyun\app\template\admin\admin_hotjob.htm" */ ?>
<?php /*%%SmartyHeaderCode:128441610662e22a975d9020-77943170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '865713e2bb9ae9e796ac0d72c25e351162c84a86' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_hotjob.htm',
      1 => 1650462146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128441610662e22a975d9020-77943170',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'total' => 0,
    'pytoken' => 0,
    'rows' => 0,
    'key' => 0,
    'v' => 0,
    'pagenum' => 0,
    'pages' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22a9761cc74_36901830',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22a9761cc74_36901830')) {function content_62e22a9761cc74_36901830($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include 'D:\\www\\www\\phpyun\\app\\include\\libs\\plugins\\function.searchurl.php';
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
	<!--[if IE 6]>
	<?php echo '<script'; ?>
 src="./js/png.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
	  DD_belatedPNG.fix('.png,.admin_infoboxp_tj,');
	<?php echo '</script'; ?>
>
	<![endif]-->
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
 type="text/javascript" src="js/admin_public.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/show_pub.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>  
	<title>????????????</title>
	<?php echo '<script'; ?>
>
		$(document).ready(function() {
			$(".preview").hover(function(){  
				var pic_url=$(this).attr('url');
				layer.tips("<img src="+pic_url+" style='max-width:120px'>", this, {
					guide:3,
					style: ['background-color:#5EA7DC; color:#fff;top:-7px;left:-20px', '#5EA7DC']
				});
				$(".xubox_layer").addClass("xubox_tips_border");
			},function(){layer.closeAll('tips');});  
			$.get("index.php?m=admin_hotjob&c=hotNum", function(data) {
				var datas = eval('(' + data + ')');
				if(datas.hotAllNum) {
					$('.ajaxhotall').html(datas.hotAllNum);
				}
				if(datas.hoted) {
					$('.ajaxhoted').html(datas.hoted);
				}
				 
			});
			 
		});
	<?php echo '</script'; ?>
>
</head>

<body class="body_ifm" style="font-size:12px; line-height:20px;">
	<div class="infoboxp"> 
		<div class="tty-tishi_top">
		<div class="clear"></div>
		
		<div class="admin_new_search_box">
		 	<form action="index.php" name="myform" method="get" >
		 		<input type="hidden" name="m" value="admin_hotjob"/>
				<input type="hidden" name="status" value="<?php echo $_GET['status'];?>
"/>
				<input type="hidden" name="rec" value="<?php echo $_GET['rec'];?>
"/>
				<input type="hidden" name="time" value="<?php echo $_GET['time'];?>
"/>
				<input type="hidden" name="rating" value="<?php echo $_GET['rating'];?>
"/>
				
				<div class="admin_new_search_name">???????????????</div>
		
				<div class="admin_Filter_text formselect" did="dctype">
			    	<input type="button" <?php if ($_GET['ctype']=='1'||$_GET['ctype']=='') {?> value="????????????" <?php } else { ?> value="??????" <?php }?> class="admin_new_select_text" id="bctype">
			        <input type="hidden" name="ctype" id="ctype" value="<?php if ($_GET['ctype']) {
echo $_GET['ctype'];
} else { ?>1<?php }?>"/>
			        <div class="admin_Filter_text_box" style="display:none" id="dctype">
			          	<ul>
				            <li><a href="javascript:void(0)" onClick="formselect('1','ctype','????????????')">????????????</a></li>
				            <li><a href="javascript:void(0)" onClick="formselect('2','ctype','??????')">??????</a></li>
			          	</ul>
			        </div>
		      	</div>
		 		
		 		<input type="text" placeholder="??????????????????????????????" name="keyword" class="admin_new_text">
		 		<input type="submit" value="??????" class="admin_new_bth"/>
				<a  href="javascript:void(0)" onclick="$('.admin_screenlist_box').toggle();"   class="admin_new_search_gj">????????????</a>
		  	</form>
		 	<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		</div>
		
		<div class="clear"></div>
		</div>
	
		<div class="tty_table-bom">
		<div class="admin_statistics">
			<span class="tty_sjtj_color">???????????????</span>
			<em class="admin_statistics_s">?????????<a href="index.php?m=admin_hotjob" class="ajaxhotall">0</a></em>
		 	<em class="admin_statistics_s">????????????<a href="index.php?m=admin_hotjob&time=5" class="ajaxhoted">0</a></em>
			???????????????<span><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>???
		</div>

 <div class="table-list">
    <div class="admin_table_border">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form action="index.php" name="myform" method="get" id='myform' target="supportiframe">
      <input type="hidden" name="pytoken"  id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <input name="m" value="admin_hotjob" type="hidden"/>
        <input name="c" value="del" type="hidden"/>
        <table width="100%">
          <thead>
            <tr class="admin_table_top" >
              <th style="width:20px;"> <label for="chkall"><input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)'/></label></th>
              <th> <?php if ($_GET['t']=="uid"&&$_GET['order']=="asc") {?> <a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'uid','m'=>'admin_hotjob','untype'=>'order,t'),$_smarty_tpl);?>
">??????ID<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'uid','m'=>'admin_hotjob','untype'=>'order,t'),$_smarty_tpl);?>
">??????ID<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th align="left">????????????</th>
              <th  width="78" align="center">????????????</th>
              <th width="78">????????????</th>
              <th width="70">????????????</th>
              <th width="70">????????????</th>
              <th width="70">????????????</th>
              <th width="70"><?php if ($_GET['t']=="sort"&&$_GET['order']=="asc") {?> <a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'sort','m'=>'admin_hotjob','untype'=>'order,t'),$_smarty_tpl);?>
">??????<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'sort','m'=>'admin_hotjob','untype'=>'order,t'),$_smarty_tpl);?>
">??????<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th>??????</th>
              <th width="150" class="admin_table_th_bg">??????</th>
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
          <tr align="center" <?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
">
            <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" class="check_all"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
           <td align="left" class="td1" style="text-align:center;"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
</span></td>
            <td  style="width:180px" align="left">
			<div style="width:180px;"><a href="index.php?m=admin_company&c=Imitate&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" target="_blank" class="admin_cz_sc"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a></div></td>            
			<td align="center"><div class="admin_table_w84"><?php echo $_smarty_tpl->tpl_vars['v']->value['rating'];?>
</div></td>
            <td><div class="admin_table_w84"><?php if ($_smarty_tpl->tpl_vars['v']->value['hot_pic']) {?><a href="javascript:void(0)" class="preview admin_n_img" url="<?php echo $_smarty_tpl->tpl_vars['v']->value['hot_pic'];?>
"></a><?php } else { ?>???<?php }?></div></td>
             <td><div class="admin_table_w84"><?php echo $_smarty_tpl->tpl_vars['v']->value['service_price'];?>
???</div></td>
			<td><div class="admin_table_w84"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['time_start'],"%Y-%m-%d");?>
</div></td>
			<td>
				<div class="admin_table_w84">
					<?php if ($_smarty_tpl->tpl_vars['v']->value['time_end']<=time()) {?>
						<b style="color:red;">?????????</b>
					<?php } else { ?>
						<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['time_end'],"%Y-%m-%d");?>

					<?php }?>
				</div>
			</td>
			<td><?php echo $_smarty_tpl->tpl_vars['v']->value['sort'];?>
</td>
             <td><div  class=""><?php if ($_smarty_tpl->tpl_vars['v']->value['beizhu']) {
echo $_smarty_tpl->tpl_vars['v']->value['beizhu'];
} else { ?>?????????<?php }?></div></td>
            <td>
      
          <div class="admin_new_bth_c"> <a href="javascript:void(0);" onClick="showdiv3('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_new_c_bth admin_new_c_bthxg">??????</a> <a href="javascript:void(0);" onClick="layer_del('???????????????????????????','index.php?m=admin_hotjob&c=del&del=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_new_c_bth  admin_new_c_bth_sc">??????</a></div>
          
            </td>
          </tr>
          <?php } ?>
		<tr>
			<td align="center"><label for="chkall2"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></label></td>
			<td colspan="10" >
				<input class="admin_button" type="button" name="delsub" value="????????????" onClick="return really('del[]')" />
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
				<td colspan="8" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
			</tr>
		<?php }?>
          </tbody>

        </table>
      </form>
    </div>
  </div>
</div> 
</div>


</body>
</html><?php }} ?>
