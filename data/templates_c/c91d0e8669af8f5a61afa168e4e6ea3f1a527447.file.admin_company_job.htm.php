<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:19:43
         compiled from "D:\www\www\phpyun\app\template\admin\admin_company_job.htm" */ ?>
<?php /*%%SmartyHeaderCode:27721932662e22a7f41fe78-74173561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c91d0e8669af8f5a61afa168e4e6ea3f1a527447' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_company_job.htm',
      1 => 1656982671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27721932662e22a7f41fe78-74173561',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'cache' => 0,
    'v' => 0,
    'total' => 0,
    'rows' => 0,
    'key' => 0,
    'source' => 0,
    'hbNum' => 0,
    'pagenum' => 0,
    'pages' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22a7f483645_35720438',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22a7f483645_35720438')) {function content_62e22a7f483645_35720438($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include 'D:\\www\\www\\phpyun\\app\\include\\libs\\plugins\\function.searchurl.php';
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
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/clipboard/clipboard.min.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" language="javascript"><?php echo '</script'; ?>
>
		<title>????????????</title>
	</head>

	<body class="body_ifm">
		<!-- ????????????????????? -->
		<div id="upjobhits" style="display:none;width:450px;padding: 10px 0;">
			<div style="overflow:auto;width:450px;">
				<form class="layui-form" name="formstatus" action="index.php?m=admin_company_job&c=upjobhits" target="supportiframe" onsubmit="return checkHits();" method="post">

					<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">

					<table cellspacing='1' cellpadding='1' class="admin_examine_table">
						<tr>
							<th>???????????????</th>
							<td align="left"><span id="comnamejob"></span></td>
						</tr>						
						<tr>
							<th class="t_fr">????????????</th>
							<td align="left"><input name="jobhits" id="jobhits" class="input-text" maxlength='10' type="number"></td>
						</tr>
						<tr>
							<th class="t_fr">????????????</th>
							<td align="left"><input name="jobexpoure" id="jobexpoure" class="input-text" maxlength='10' type="number"></td>
						</tr>
						<tr>
							<td colspan='2' align="center">
								<input name="pid" value="0" type="hidden">
								<input type="submit" value='??????' class="admin_examine_bth"> 
								<input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='??????'>
							</td>
						</tr>
					</table>					
				</form>
			</div>
		</div>
		<!-- ????????????????????? -->
		<div id="status_div" style="display:none; width:390px; ">
			<form action="index.php?m=admin_company_job&c=status" target="supportiframe" method="post" onsubmit="return htStatus()"
			 class="layui-form" autocomplete="off">
				<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
				<table cellspacing='1' cellpadding='1' class="admin_examine_table">
					<tr>
						<th width="80">???????????????</th>
						<td align="left">
							<div class="layui-input-block">
								<input name="status" id="status1" value="1" title="??????" type="radio" />
								<input name="status" id="status3" value="3" title="?????????" type="radio" />
							</div>
						</td>
					</tr>
					<tr>
						<th class="t_fr">???????????????</th>
						<td align="left"><textarea id="alertcontent" name="statusbody" class="admin_explain_textarea"></textarea></td>
					</tr>
					<tr>
						<td colspan='2' align="center">
							<div>
								<input name="pid" value="0" type="hidden">
								<input type="submit" value='??????' class="admin_examine_bth">
								<input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='??????'>
							</div>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<!-- ????????????????????? -->
		<div id="infobox3" style="display:none;text-align:center;margin-top:20px">
			<form action="index.php?m=admin_company_job&c=xuanshang" target="supportiframe" method="post">
				<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">

				<div class=" admin_com_smbox_list_b">
					<span class="admin_com_smbox_span">???????????????</span>
					<input class="admin_com_smbox_text" value="" name="days" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')">
					<span class="admin_com_smbox_list_s">???</span>
				</div>

				<div class="xsdiv" style="display:none">
					<span class="admin_com_smbox_span">?????????????????????</span>
					<span class="admin_com_smbox_list_s edate" style="colo2r:#f60"></span>
				</div>

				<div class="admin_com_smbox_qx_box">
					????????????????????????????????? <input type="checkbox" id="xtype" name="s" value="1"> ??????????????????
				</div>

				<div class="admin_com_smbox_opt admin_com_smbox_opt_mt" style="width:300px;">
					<input type="submit" onclick="loadlayer();" value='??????' class="admin_examine_bth">
					<input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='??????'>
				</div>

				<input name="pid" value="0" type="hidden">
			</form>
		</div>
		<!-- ????????????????????? -->
		<div id="infobox6" style="display:none;">
			<div class="admin_com_t_box">
				<form action="index.php?m=admin_company_job&c=recommend" target="supportiframe" method="post">
					<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">

					<div class=" admin_com_smbox_list_pd">
						<span class="admin_com_smbox_span">???????????????</span>
						<input class="admin_com_smbox_text" value="" name="days" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')">
						<span class="admin_com_smbox_list_s">???</span>
					</div>

					<div class="recdiv" style="display:none">
						<span class="admin_com_smbox_span">?????????????????????</span>
						<span class="admin_com_smbox_list_s edate" style="color:#f60"></span>
					</div>

					<div class="admin_com_smbox_qx_box">
						????????????????????????????????? <input type="checkbox" name="s" value="1"> ??????????????????
					</div>

					<div class="admin_com_smbox_opt admin_com_smbox_opt_mt">
						<input type="submit" onclick="loadlayer();" value='??????' class="admin_examine_bth">
						<input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='??????'>
					</div>

					<input name="pid" value="0" type="hidden">

				</form>
			</div>
		</div>
		<!-- ????????????????????? -->
		<div id="infobox5" style="display:none;text-align:center;">
			<div class="admin_com_t_box">
				<form action="index.php?m=admin_company_job&c=urgent" target="supportiframe" method="post">
					<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">

					<div class="admin_com_smbox_list_pd">
						<span class="admin_com_smbox_span">???????????????</span>
						<input class="admin_com_smbox_text" value="" name="days" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')">
						<span class="admin_com_smbox_list_s">???</span>
					</div>

					<div class="eurdiv" style="display:none">
						<span class="admin_com_smbox_span">?????????????????????</span>
						<span class="admin_com_smbox_list_s edate" style="color:#f60"></span>
					</div>

					<div class="admin_com_smbox_qx_box">
						????????????????????????????????? <input type="checkbox" name="s" value="1"> ??????????????????
					</div>

					<div class="admin_com_smbox_opt admin_com_smbox_opt_mt">
						<input type="submit" onclick="loadlayer();" value='??????' class="admin_examine_bth">
						<input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='??????'>
					</div>

					<input name="pid" value="0" type="hidden">

				</form>
			</div>
		</div>
		<!-- ?????????????????????????????? -->
		<div id="twtask" style="display:none;width:450px;padding: 10px 0;">
			<div style="overflow:auto;width:450px;">
				<form class="layui-form">
					<span id="twTip"  style="display: none;" class="admin_web_tip admin_resume_dc_tip"></span>
					<table cellspacing='1' cellpadding='1' class="admin_examine_table">
						<tr id="twjobname">
							<th>???????????????</th>
							<td align="left"><span id="twtask_jobname"></span></td>
						</tr>	
						<tr>
							<th>?????????</th>
							<td align="left">
								<div>
									<a id="twtask_urgent_tag" href="javascript:void(0);" onclick="twTaskTag('twtask_urgent');" class="twtask_urgent_y">??????</a>
									<a id="twtask_wcmoments_tag" href="javascript:void(0);"  onclick="twTaskTag('twtask_wcmoments');" class="twtask_wcmoments_y">?????????</a>
									<a id="twtask_gzh_tag" href="javascript:void(0);"  onclick="twTaskTag('twtask_gzh');" class="twtask_gzh_y">?????????</a>

									<input id="twtask_urgent" name="twtask_urgent" value="0" type="hidden" />
									<input id="twtask_wcmoments" name="twtask_wcmoments" value="0" type="hidden" />
									<input id="twtask_gzh" name="twtask_gzj" value="0" type="hidden" />
								</div>
							</td>
						</tr>					
						<tr>
							<th class="t_fr">?????????</th>
							<td align="left">
								<textarea id="twtask_content" name="twtask_content" class="admin_explain_textarea"></textarea>
							</td>
						</tr>
						<tr>
							<td colspan='2' align="center">
								<input id="twtask_jobid" name="twtask_jobid" value="0" type="hidden">
								<input type="button" onclick="addTwTask();" value='??????' class="admin_examine_bth"> 
								<input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='??????'>
							</td>
						</tr>
					</table>					
				</form>
			</div>
		</div>
		 
		<!-- ????????????????????? -->
		<div id="infobox4" style="display:none;">
			<div class="admin_com_t_box_hy">
				<form action="index.php?m=admin_company_job&c=saveclass" target="supportiframe" method="post" onSubmit="return checkmove();">
					<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">

					<div class="admin_com_select_list">
						<span class="admin_com_smbox_span">???????????????</span>

						<div class="admin_com_smbox_select_box">
							<select name="hy" id="hy" class="admin_com_smbox_select">
								<option value="">--????????????--</option>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cache']->value['industry_index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['cache']->value['industry_name'][$_smarty_tpl->tpl_vars['v']->value];?>
</option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="admin_com_select_list">
						<span class="admin_com_smbox_span">???????????????</span>

						<div class="admin_com_smbox_select_box">
							<select name="job1" id="job1" class="admin_com_smbox_select job1" lid="job1_son">
								<option value="">--?????????--</option>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cache']->value['job_index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<option value='<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['cache']->value['job_name'][$_smarty_tpl->tpl_vars['v']->value];?>
</option>
								<?php } ?>
							</select>

							<select name="job1_son" id="job1_son" class="admin_com_smbox_select job1" lid="job1_son1">
								<option value="">--?????????--</option>
							</select>

							<select name="job_post" id="job1_son1" class="admin_com_smbox_select">
								<option value="">--?????????--</option>
							</select>
						</div>
					</div>

					<div class="admin_com_smbox_opt admin_com_smbox_opt_mt">
						<input type="submit" value='??????' class="admin_examine_bth">
						<input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='??????'>
					</div>

					<input name="jobid" value="0" type="hidden">
				</form>
			</div>
		</div>

		<div class="infoboxp">

			<div class="tty-tishi_top">
				<div class="tabs_info">
					<ul>
						<li class="<?php if (!$_GET['is_reserve']) {?>curr<?php }?>"><a href="index.php?m=admin_company_job&uid=<?php echo $_GET['uid'];?>
">????????????</a></li>
						<li><a href="index.php?m=admin_company_job&uid=<?php echo $_GET['uid'];?>
&c=sxLog&type=1">????????????</a></li>
						<li><a href="index.php?m=admin_partjob&uid=<?php echo $_GET['uid'];?>
">????????????</a></li>
						<li><a href="index.php?m=admin_company_job&uid=<?php echo $_GET['uid'];?>
&c=reserveJob">????????????</a></li>
					</ul>
				</div>

				<div class="clear"></div>

				<div class="admin_new_search_box">
					<form id="jobFormSearch" action="index.php" name="myform" method="get">
						<input type="hidden" name="m" value="admin_company_job" />
						<?php if ($_GET['state']) {?>
						<input type="hidden" name="state" value="<?php echo $_GET['state'];?>
" />
						<?php }?>
						<?php if ($_GET['job_type']) {?>
						<input type="hidden" name="job_type" value="<?php echo $_GET['job_type'];?>
" />
						<?php }?>
						<?php if ($_GET['jtype']) {?>
						<input type="hidden" name="jtype" value="<?php echo $_GET['jtype'];?>
" />
						<?php }?>
						<?php if ($_GET['salary']) {?>
						<input type="hidden" name="salary" value="<?php echo $_GET['salary'];?>
" />
						<?php }?>
						<?php if ($_GET['edu']) {?>
						<input type="hidden" name="edu" value="<?php echo $_GET['edu'];?>
" />
						<?php }?>
						<?php if ($_GET['exp']) {?>
						<input type="hidden" name="exp" value="<?php echo $_GET['exp'];?>
" />
						<?php }?>

						<div class="admin_new_search_name">???????????????</div>
						<div class="admin_Filter_text formselect" did='dtype'>
							<input type="button" value="<?php if ($_GET['type']=='1'||$_GET['type']=='') {?>????????????<?php } elseif ($_GET['type']=='2') {?>????????????<?php }?>"
							 class="admin_new_select_text" id="btype">
							<input type="hidden" id='type' value="<?php if ($_GET['type']=='1'||$_GET['type']=='') {?>1<?php } else { ?>2<?php }?>"
							 name='type'>
							<div class="admin_Filter_text_box" style="display:none" id='dtype'>
								<ul>
									<li><a href="javascript:void(0)" onClick="formselect('1','type','????????????')">????????????</a></li>
									<li><a href="javascript:void(0)" onClick="formselect('2','type','????????????')">????????????</a></li>
								</ul>
							</div>
						</div>

						<input type="text" placeholder="??????????????????????????????" name="keyword" class="admin_new_text">
						<input type="button" onclick="jobFormSearch()" value="??????" class="admin_new_bth">
						<a href="javascript:void(0)" onclick="$('.admin_screenlist_box').toggle();" class="admin_new_search_gj">????????????</a>
					</form>
					<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				</div>

				<div class="clear"></div>
			</div>


			<div class="tty_table-bom">
				<div class="admin_statistics">
					<span class="tty_sjtj_color">???????????????</span>
					<?php if ($_GET['uid']!='') {?>
					<span><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>???
					<?php } else { ?>
					<em class="admin_statistics_s">?????????<a href="index.php?m=admin_company_job" class="ajaxjoball">0</a></em>
					<em class="admin_statistics_s">????????????<a href="index.php?m=admin_company_job&state=4" class="ajaxjobstatus1">0</a></em>
					<em class="admin_statistics_s">????????????<a href="index.php?m=admin_company_job&state=3" class="ajaxjobstatus2">0</a></em>
					<em class="admin_statistics_s">????????????<a href="index.php?m=admin_company_job&status=1" class="ajaxjobstatus3">0</a></em>
					???????????????<span><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>???
					<?php }?>
				</div>

				<div class="clear"></div>

				<div class="table-list">
					<div class="admin_table_border">
						<iframe id="supportiframe" name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
						<form action="index.php" name="myform" method="get" id='myform' target="supportiframe">
							<input name="m" value="admin_company_job" type="hidden" />
							<input name="c" value="del" type="hidden" />
							<table width="100%">
								<thead>
									<tr class="admin_table_top">
										<th style="width:20px;">
											<label for="chkall"><input type="checkbox" id='chkAll' onclick='CheckAll(this.form)' /></label>
										</th>
										<?php if ($_GET['t']=="id"&&$_GET['order']=="asc") {?>
										<th><a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'id','m'=>'admin_company_job','untype'=>'order,t'),$_smarty_tpl);?>
">??????<img src="images/sanj.jpg" /></a></th>
										<?php } else { ?>
										<th><a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'id','m'=>'admin_company_job','untype'=>'order,t'),$_smarty_tpl);?>
">??????<img src="images/sanj2.jpg" /></a></th>
										<?php }?>
										<th align="left" width="180">????????????/????????????</th>
										<th>????????????</th>
										<th>??????</th>
										<th>??????/????????????</th>
										<th>?????????/?????????</th>
										<th>??????</th>
										<th>????????????</th>
										<th>????????????</th>
										<th>??????</th>
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
									<tr align="center" <?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
										<td>
											<input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="check_all" data-lastupdate="<?php echo $_smarty_tpl->tpl_vars['v']->value['lastupdate'];?>
" data-status="<?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
" data-state="<?php echo $_smarty_tpl->tpl_vars['v']->value['state'];?>
" data-rstatus="<?php echo $_smarty_tpl->tpl_vars['v']->value['r_status'];?>
" name='del[]' onclick='unselectall()' rel="del_chk" />
										</td>
										<td class="td1" style="text-align:center;width:50px;"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span></td>
										<td align="left">
											<a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['joburl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a>
											<div class="admin_job_comname">
												<a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['comurl'];?>
" target="_blank" class="admin_cz_sc"><?php echo $_smarty_tpl->tpl_vars['v']->value['com_name'];?>
</a>
												<?php if ($_smarty_tpl->tpl_vars['v']->value['c_status']!=1) {?>
												<a href="javascript:void(0)" class="job_name_all" v="<?php if ($_smarty_tpl->tpl_vars['v']->value['c_status']==0) {?>???????????????<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['c_status']==3) {?>?????????????????????<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['c_status']==2) {?>???????????????<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['c_status']==4) {?>???????????????<?php }?>">
													<img src="images/bg_wechat_help.png">
												</a>
												<?php }?>
											</div>
                                         
                                            
										</td>
										<td>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['rating_name']) {?>[<?php echo $_smarty_tpl->tpl_vars['v']->value['rating_name'];?>
]<?php }?>

										</td>
										<td class="td" align="center">
											<div class="admin_new_t_j"> ????????????<?php echo $_smarty_tpl->tpl_vars['v']->value['snum'];?>
</div>
											<div class="admin_new_t_j">????????????<?php echo $_smarty_tpl->tpl_vars['v']->value['browseNum'];?>
</div>
											<div class="admin_new_t_j"> ????????????<?php echo $_smarty_tpl->tpl_vars['v']->value['inviteNum'];?>
</div>
										</td>
										<td class="td" align="center">
											<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['sdate'],"%Y-%m-%d %H:%M");?>

											<div class="mt8"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['lastupdate'],"%Y-%m-%d %H:%M");?>
</div>
										</td>
										<td class="td jobhits" uid='<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
' rstatus='<?php echo $_smarty_tpl->tpl_vars['v']->value['r_status'];?>
' pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" comnamejob='<?php echo $_smarty_tpl->tpl_vars['v']->value['com_name'];?>
' jobhits='<?php echo $_smarty_tpl->tpl_vars['v']->value['jobhits'];?>
' jobexpoure='<?php echo $_smarty_tpl->tpl_vars['v']->value['jobexpoure'];?>
' align="center" style=" cursor:pointer"><?php echo $_smarty_tpl->tpl_vars['v']->value['jobhits'];?>
 / <?php echo $_smarty_tpl->tpl_vars['v']->value['jobexpoure'];?>
	<img src="images/xg.png"></td>
										<td><?php echo $_smarty_tpl->tpl_vars['source']->value[$_smarty_tpl->tpl_vars['v']->value['source']];?>
</td>
										<td>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['state']==1) {?>
											<span class="admin_com_Audited">?????????</span>
											<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['state']==0) {?>
											<span class="admin_com_noAudited">?????????</span>
											<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['state']==3) {?>
											<span class="admin_com_tg">?????????</span>
											<?php }?>
										</td>

										<td class="layui-form" id="state<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
											<input id="status_switch_<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['v']->value['status']!=1) {?>checked<?php }?> lay-skin="switch" lay-text="?????????|?????????" lay-filter="status_switch" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
										</td>

										<td>
											<div class="admin_new_t_j">
												????????? <a href="javascript:void(0);" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" edate="<?php echo $_smarty_tpl->tpl_vars['v']->value['xstime'];?>
" etime="<?php echo $_smarty_tpl->tpl_vars['v']->value['xsdate'];?>
"
												 class="admin_new_tg <?php if ($_smarty_tpl->tpl_vars['v']->value['xsdate']>time()) {?>admin_new_tg_cur<?php }?> xuanshang"></a>
											</div>

											<div class="admin_new_t_j">
												?????????
												<?php if ($_smarty_tpl->tpl_vars['v']->value['rec_time']>time()) {?>
												<a href="javascript:void(0);" class="admin_new_tg admin_new_tg_cur rec" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" edate="<?php echo $_smarty_tpl->tpl_vars['v']->value['recdate'];?>
"
												 etime="<?php echo $_smarty_tpl->tpl_vars['v']->value['rec_time'];?>
"></a>
												<?php } else { ?>
												<a href="javascript:void(0);" class="admin_new_tg rec" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"></a>
												<?php }?>
											</div>

											<div class="admin_new_t_j">
												?????????
												<?php if ($_smarty_tpl->tpl_vars['v']->value['urgent_time']>time()) {?>
												<a href="javascript:void(0);" class="admin_new_tg admin_new_tg_cur urgent" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" edate="<?php echo $_smarty_tpl->tpl_vars['v']->value['eurgent'];?>
"
												 etime="<?php echo $_smarty_tpl->tpl_vars['v']->value['urgent_time'];?>
"></a>
												<?php } else { ?>
												<a href="javascript:void(0);" class="admin_new_tg urgent" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"></a>
												<?php }?>
											</div>
										</td>

										<td>
											<div class="admin_new_bth_c">
												<a href="javascript:;" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" rstatus='<?php echo $_smarty_tpl->tpl_vars['v']->value['r_status'];?>
' class="admin_new_c_bth admin_new_c_bthsh status">??????</a>
												<?php if ($_smarty_tpl->tpl_vars['v']->value['status']==1) {?>
												<a href="javascript:void(0)" onclick="layer.msg('??????????????????',2,8)" class="admin_new_c_bth admin_new_c_bth_pp">??????</a>
												<?php } else { ?>
												<a href="index.php?m=admin_company_job&c=matching&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&one=1" class="admin_new_c_bth admin_new_c_bth_pp">??????</a>
												<?php }?>
											</div>

											<div class="admin_new_bth_c">
												<a href="index.php?m=admin_company_job&c=show&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="admin_new_c_bth ">??????</a>
												<a href="javascript:;" onClick="layer_del('??????????????????', 'index.php?m=admin_company_job&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');"
												 class="admin_new_c_bth admin_new_c_bth_sc">??????</a> 
											</div>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['status']==0&&$_smarty_tpl->tpl_vars['v']->value['state']==1&&$_smarty_tpl->tpl_vars['v']->value['r_status']==1) {?>
												<?php if ($_smarty_tpl->tpl_vars['hbNum']->value>0&&$_smarty_tpl->tpl_vars['config']->value['sy_haibao_isopen']==1) {?>
												<div class="admin_new_bth_c">
													<a href="javascript:;" onclick="getJobHtml('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" style=" display:inline-block;width:56px;border:1px solid #e9e9e9;height:22px; line-height:22px; text-align:center;color:#999;border-radius: 3px; background:#fff; font-size:12px; float:left; margin-bottom:5px;">????????????</a>
													<a href="index.php?m=admin_company_job&c=whb&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style=" display:inline-block;width:56px;border:1px solid #e9e9e9;height:22px; line-height:22px; text-align:center;color:#999;border-radius: 3px; background:#fff; font-size:12px; float:right;">????????????</a>
												</div>
												<?php } else { ?>
												<div class="admin_new_bth_c">
													<a href="javascript:;" onclick="getJobHtml('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" style=" display:inline-block;width:112px;border:1px solid #e9e9e9;height:22px; line-height:22px; text-align:center;color:#999;border-radius: 3px; background:#fff; font-size:12px;">????????????</a>
												</div>
													<?php }?>
												<div class="admin_new_bth_c">
													<a href="javascript:;" onclick="addTuiWenTask('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['lastupdate'];?>
');" style=" display:inline-block;width:112px;border:1px solid #e9e9e9;height:22px; line-height:22px; text-align:center;color:#999;border-radius: 3px; background:#fff; font-size:12px;">????????????</a>
												</div>
											<?php }?>
										</td>
									</tr>
									<?php } ?>

									<tr>
										<td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
										<td colspan="11">
											<label for="chkAll2">??????</label>
											<input class="admin_button" type="button" name="delsub" value="??????" onClick="audall();" />
											<input class="admin_button" type="button" name="delsub" value="??????" onClick="Refresh();" />
											<input class="admin_button" type="button" name="delsub" value="??????" onClick="setTop();" />
											<input class="admin_button" type="button" name="delsub" value="??????" onClick="recommend();" />
											<input class="admin_button" type="button" name="delsub" value="??????" onClick="urgent();" />
											<input class="admin_button" type="button" name="delsub" value="????????????" onClick="audall3();" />
											
											<input class="admin_button" type="button" name="delsub" value="??????" onClick="return really('del[]')" /> 

											<input class="admin_button" type="button" name="delsub" value="????????????" onClick="return twtaskall('del[]')" /> 

										</td>

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
											<td colspan="9" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
									</tr>
									<?php }?>
								</tbody>
							</table>
							<input type="hidden" id="pytoken" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<?php echo '<script'; ?>
>
			var needLoad = false;
			layui.use(['form'], function() {
				var form = layui.form;
				form.render('checkbox');
				form.on('switch(status_switch)', function(data){
                    var id = data.value,
                        status = data.elem.checked ? 2: 1;//1:????????????2????????????
                    checkstate(id, status);
                });

			});

			var weburl = "<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
";

			/* ???????????? / ???????????? */
			function checkstate(id, state) {
				var pytoken = $('#pytoken').val();
				$.post("index.php?m=admin_company_job&c=checkstate", {
					id: id,
					state: state,
					pytoken: pytoken
				}, function(data) {
					if (data != 1) {
                        parent.layer.msg('????????????', 2, 8);
					    if (state == 1) {// ??????????????????????????????????????????????????????
                            $('#status_switch_'+id).attr('checked','checked');
						} else {
                            $('#status_switch_'+id).removeAttr('checked');
						}
                        form.render();
					}
				});
			}

			$(function() {
				/* ???????????????????????? */
				$(".job_name_all").hover(function() {

					var job_name = $(this).attr('v');
					if ($.trim(job_name) != '') {
						layer.tips(job_name, this, {
							guide: 1,
							style: ['background-color:#5EA7DC; color:#fff;top:-7px', '#5EA7DC']
						});
						$(".xubox_layer").addClass("xubox_tips_border");
					}
				}, function() {
					var job_name = $(this).attr('v');
					if ($.trim(job_name) != '') {
						layer.closeAll('tips');
					}
				});

				/* ???????????? */
				$(".xuanshang").click(function() {

					$('input[name=pid]').val($(this).attr('pid'));
					var edate = $(this).attr('edate');
					$("input[name='days']").val('');

					$(".xsdiv").hide();

					if (edate) {
						$(".edate").html(edate);
						$(".xsdiv").show();
						add_class('????????????', '300', '270', '#infobox3', '');
					} else {
						add_class('????????????', '300', '250', '#infobox3', '');
					}

				});

				/* ???????????? */
				$(".rec").click(function() {

					$("input[name=pid]").val($(this).attr("pid"));
					var edate = $(this).attr("edate");
					$("input[name='days']").val('');

					$(".recdiv").hide();

					if (edate) {
						$(".edate").html(edate);
						$(".recdiv").show();
						add_class('????????????', '290', '280', '#infobox6', '');
					} else {
						add_class('????????????', '290', '260', '#infobox6', '');
					}

				});

				/* ???????????? */
				$(".urgent").click(function() {

					$("input[name=pid]").val($(this).attr("pid"));
					var edate = $(this).attr("edate");
					$(".eurdiv").hide();

					if (edate) {
						$(".edate").html(edate);
						$(".eurdiv").show();
						add_class('????????????', '290', '280', '#infobox5', '');
					} else {
						add_class('????????????', '290', '260', '#infobox5', '');
					}

				});

				/* ??????????????? */
				$(".jobhits").click(function(){
					var id = $(this).attr("pid");
					
					var rstatus = $(this).attr("rstatus");
					var comname = $(this).attr("comnamejob");					
					$("input[name=pid]").val($(this).attr("pid"));

					$("input[name=jobhits]").val($(this).attr("jobhits"));
					$("input[name=jobexpoure]").val($(this).attr("jobexpoure"));
					if (rstatus == 0) {
						$("#comnamejob").html(comname + '<font color="red">???????????????</font>');
					} else if (rstatus == 3) {
						$("#comnamejob").html(comname + '<font color="red">???????????????</font>');
					}else{
						$("#comnamejob").html(comname);
					}
					if (rstatus == 2) {
						parent.layer.msg("???????????????,????????????????????????", 2, 8);
						return false;
					} else {							
						$.layer({
							type: 1,
							title: '???????????????',
							closeBtn: [0, true],
							offset: ['80px', ''],
							border: [10, 0.3, '#000', true],
							area: ['450px', 'auto'],
							page: {
								dom: '#upjobhits'
							}
						});
					}
					layui.use(['form'], function() {
						var form = layui.form;
						form.render();
					});
				})

				/* ???????????? */
				$(".status").click(function() {
					if ($(this).attr("rstatus") == 2) {
						parent.layer.msg("???????????????,????????????????????????", 2, 8);
						return false;
					}
					var id = $(this).attr("pid");
					$('body').css('overflow-y', 'hidden');
					$.layer({
						type: 2,
						shadeClose: true,
						title: '????????????',
						area: ['1220px', ($(window).height() - 30) +'px'],
						iframe: {src: 'index.php?m=admin_company_job&c=jobAudit&id='+id},
						close: function(){
							if(needLoad){
								window.location.reload();
							}else{
								$('body').css('overflow-y', '');
							}
						}
					});
				});
			});

			/* ???????????? */
			function audall() {
				var codewebarr = "";
				$(".check_all:checked").each(function() {

					if (codewebarr == "") {
						codewebarr = $(this).val();
					} else {
						codewebarr = codewebarr + "," + $(this).val();
					}

				});
				if (codewebarr == "") {

					parent.layer.msg("??????????????????????????????", 2, 8);
					return false;

				} else {

					$("input[name=pid]").val(codewebarr);
					$("#alertcontent").val(''); //?????????????????????????????????????????????????????????
					$("input[name=status]").attr("checked", false);
					add_class('????????????', '390', '260', '#status_div', '');

				}
			}

			/* ???????????? */
			function Refresh() {
				var codewebarr = "";
				$(".check_all:checked").each(function() {
					if (codewebarr == "") {
						codewebarr = $(this).val();
					} else {
						codewebarr = codewebarr + "," + $(this).val();
					}
				});
				if (codewebarr == "") {
					parent.layer.msg("??????????????????????????????", 2, 8);
					return false;
				} else {
					loadlayer();
					$.post("index.php?m=admin_company_job&c=refresh", {
						ids: codewebarr,
						pytoken: $('#pytoken').val()
					}, function(data) {
						parent.layer.closeAll('loading');
						parent.layer.msg("???????????????", 2, 9, function() {
							location.reload();
						});
						return false;
					})
				}
			}

			/* ???????????? */
			function setTop() {
				var codearr = "";
				$(".check_all:checked").each(function() {
					if (codearr == "") {
						codearr = $(this).val();
					} else {
						codearr = codearr + "," + $(this).val();
					}
				});
				if (codearr == "") {
					parent.layer.msg("??????????????????????????????", 2, 8);
					return false;
				} else {
					$("input[name=pid]").val(codearr);
					$(".xsdiv").hide();
					add_class('??????????????????', '290', '240', '#infobox3', '');
				}
			}

			/* ???????????? */
			function recommend() {
				var codearr = "";
				$(".check_all:checked").each(function() {
					if (codearr == "") {
						codearr = $(this).val();
					} else {
						codearr = codearr + "," + $(this).val();
					}
				});
				if (codearr == "") {
					parent.layer.msg("??????????????????????????????", 2, 8);
					return false;
				} else {
					$("input[name=pid]").val(codearr);
					$(".edatediv").hide();
					add_class('??????????????????', '290', '240', '#infobox6', '');
				}
			}

			/* ???????????? */
			function urgent() {
				var codeugent = "";
				$(".check_all:checked").each(function() {
					if (codeugent == '') {
						codeugent = $(this).val();
					} else {
						codeugent = codeugent + "," + $(this).val();
					}
				});
				if (codeugent == "") {
					parent.layer.msg("??????????????????????????????", 2, 8);
					return false;
				} else {
					$("input[name=pid]").val(codeugent);
					$(".eurgentdiv").hide();
					add_class('??????????????????', '290', '240', '#infobox5', '');
				}
			}

			/*	????????????????????????????????????????????? */
			function audall3() {
				var codewebarr = "";
				$(".check_all:checked").each(function() {

					if (codewebarr == "") {
						codewebarr = $(this).val();
					} else {
						codewebarr = codewebarr + "," + $(this).val();
					}

				});
				if (codewebarr == "") {

					parent.layer.msg("??????????????????????????????", 2, 8);
					return false;

				} else {

					$("input[name=jobid]").val(codewebarr);
					add_class('????????????????????????', '320', '280', '#infobox4', '');

				}
			}

			function checkmove() {
				if ($("#hy").val() == "") {
					layer.msg("????????????????????????", 2, 8);
					return false;
				}
				if ($("#job1_son").val() == "") {
					layer.msg("????????????????????????", 2, 8);
					return false;
				}
			}

			/* ???????????????????????? */
			function isxs() {
				var xtype = $("#xtype").attr("checked");
				var days = $.trim($("input[name='xsdays']").val());
				layer.closeAll();

				if (xtype == "checked") {
					parent.layer.confirm("??????????????????????????????", function() {
						setTimeout(function() {
							$('.xssubmit').submit()
						}, 0);
						parent.layer.load('?????????????????????...', 0);
					}, function() {
						layer.closeAll();
					});
				} else {
					if (days < 1) {
						parent.layer.msg("???????????????????????????", 2, 8, function() {
							add_class('????????????', '300', '200', '#infobox3', '');
						});
						return false;
					} else {
						parent.layer.confirm("??????????????????????????????" + days + "??????????????????", function() {
							setTimeout(function() {
								$('.xssubmit').submit()
							}, 0);
							parent.layer.load('?????????????????????...', 0);
						}, function() {
							layer.closeAll();
						});
					}
				}
			}
			function jobFormSearch(){
				parent.layer.load('?????????????????????...', 0);
				
				var job_class = $("#job_class").val(),
					city_class = $("#city_class").val();
				
				if($("#form_job_class").length > 0){
					$("#form_job_class").val(job_class);
				}else if(job_class){
					$("#jobFormSearch").prepend('<input type="hidden" id="form_job_class" name="job_class" value="'+job_class+'" />');
				}
				if($("#form_city_class").length > 0){
					$("#form_city_class").val(city_class);
				}else if(city_class){
					$("#jobFormSearch").prepend('<input type="hidden" id="form_city_class" name="city_class" value="'+city_class+'" />');
				}
				$("#jobFormSearch").submit();
			}
			$(document).ready(function() {
				$(".job1").change(function() {
					var job = $(this).val();
					var lid = $(this).attr("lid");
					if (job == "") {
						$("#" + lid + " option").remove()
						$("<option value=''>--?????????--</option>").appendTo("#" + lid);
					}
					lid2 = $("#" + lid).attr("lid");
					if (lid2) {
						$("#" + lid2 + " option").remove();
						$("<option value=''>--?????????--</option>").appendTo("#" + lid2);
					}
					$.post(weburl + "/index.php?m=ajax&c=ajax_job", {
						"str": job
					}, function(data) {
						if (lid != "" && data != "") {
							$('#' + lid + ' option').remove();
							$(data).appendTo("#" + lid);
						}
					})
				})
			})

			/* ???????????????????????????????????? */
			$(document).ready(function() {
				$.get("index.php?m=admin_company_job&c=jobNum", function(data) {
					var datas = eval('(' + data + ')');
					if (datas.jobAllNum) {
						$('.ajaxjoball').html(datas.jobAllNum);
					}
					if (datas.jobStatusNum1) {
						$('.ajaxjobstatus1').html(datas.jobStatusNum1);
					}
					if (datas.jobStatusNum2) {
						$('.ajaxjobstatus2').html(datas.jobStatusNum2);
					}
					if (datas.jobStatusNum3) {
						$('.ajaxjobstatus3').html(datas.jobStatusNum3);
					}
				});
			});

			function getJobHtml(id) {

				var pytoken = $('#pytoken').val();

				$.post("index.php?m=admin_company_job&c=getJobHtml", {
					id: id,
					pytoken: pytoken
				}, function(data) {
				
					var html= '<div class="fzwbbox">\n' +
							'\t\t\t\t<div class="fzwbbox_c">\n' +
							'\t\t\t\t\t<div class="fzwbbox_b" id="copyBoxText">' +data+'</div>\n' +
							'\t\t\t\t\t<div class="fzwbbox_bth"><a href="javascript:;" class="fzwb" data-clipboard-action="copy" data-clipboard-target="#copyBoxText">????????????</a></div>\n' +
							'\t\t\t\t</div>\n' +
							'\t\t\t</div>';
							
					layer.open({
						type: 1,
						title:false,
						skin: 'layui-layer-demo', //????????????
						closeBtn: 1,
						anim: 2,
						shadeClose: true, //??????????????????
						area: ['290px', '360px'],
						content: html
					});
				})
			}
			$(function () {
				var clipboard = new ClipboardJS(".fzwb");
				clipboard.on('success', function(e) {
					//console.info('Action:', e.action);
					//console.info('Text:', e.text);
					//console.info('Trigger:', e.trigger);
					layer.msg('???????????????');
					e.clearSelection();
				});
				clipboard.on('error', function(e) {
					//console.error('Action:', e.action);
					//console.error('Trigger:', e.trigger);
				});
			});

			function checkHits() {

				var jobhits = $.trim($('#jobhits').val());
				var jobexpoure = $.trim($('#jobexpoure').val());

				if (parseInt(jobexpoure) < parseInt(jobhits)){
					parent.layer.msg("?????????????????????????????????", 2, 8);
					return false;
				}
			}
			function twtaskall(){
				var nowTime = parseInt(new Date().getTime()/1000);
				var codearr = "";
				var lastupdate = '';
				var twTip = '';
				var statusMsg = '';
				var stateMsg = '';
				var rstatusMsg = '';
				
				$(".check_all:checked").each(function() {

					if (codearr == "") {
						codearr = $(this).val();
					} else {
						codearr = codearr + "," + $(this).val();
					}
					
					lastupdate = Number($(this).attr('data-lastupdate'));

					if(twTip=='' && nowTime-lastupdate>60*60*24*3){
						twTip = '????????????????????????3??????????????????????????????????????????';
					}
					
					if($(this).attr('data-status')!='0'){
						statusMsg = '?????????';
					}
					if($(this).attr('data-state')!='1'){
						stateMsg = '?????????';
					}
					if($(this).attr('data-rstatus')!='1'){
						rstatusMsg = '?????????????????????';
					}

				});
				if(statusMsg!='' || stateMsg!='' || rstatusMsg!=''){
					var msg = '??????????????????';
					var douhao = '';
					if(statusMsg!=''){
						msg +=douhao+statusMsg;
						douhao = '???';
					}
					if(stateMsg!=''){
						msg +=douhao+stateMsg;
						douhao = '???';
					}
					if(rstatusMsg!=''){
						msg +=douhao+rstatusMsg;
						douhao = '???';
					}
					msg	+='?????????????????????';
					parent.layer.msg(msg, 2, 8);
					return false;
				}
				if (codearr == "") {
					parent.layer.msg("??????????????????????????????????????????", 2, 8);
					return false;
				} else {
					
					if(twTip!=''){
						$('#twTip').text(twTip);
						$('#twTip').show();
					}else{
						$('#twTip').text('');
						$('#twTip').hide();
					}

					$('#twtask_jobid').val(codearr);
					$('#twjobname').hide();
					$('#twtask_jobname').text('');
					$('#twtask_content').val('');
					$('#twtask_wcmoments').val(0);
					$('#twtask_wcmoments_tag').attr('class','twtask_wcmoments_n');
					$('#twtask_urgent').val(0);
					$('#twtask_urgent_tag').attr('class','twtask_urgent_n');
					$('#twtask_gzh').val(0);
					$('#twtask_gzh_tag').attr('class','twtask_gzh_n');

					layer.open({
						type : 1,
						title : '???????????????????????????',
						closeBtn : 1,
						border : [ 10, 0.3, '#000', true ],
						area : [ '450px', '300px' ],
						content : $('#twtask')
					});
				}
			}
			function addTuiWenTask(id,jobname,lastupdate){

				var nowTime = parseInt(new Date().getTime()/1000);
				lastupdate = Number(lastupdate); 
				
				var twTip = '';
				if(nowTime-lastupdate>60*60*24*3){
					twTip = '???????????????3??????????????????????????????????????????';
				}

				if(twTip!=''){
					$('#twTip').text(twTip);
					$('#twTip').show();
				}else{
					$('#twTip').text('');
					$('#twTip').hide();
				}

				$('#twtask_jobid').val(id);
				$('#twtask_jobname').text(jobname);
				$('#twjobname').show();
				$('#twtask_content').val('');

				$('#twtask_gzh').val(0);
				$('#twtask_gzh_tag').attr('class','twtask_gzh_n');

				$('#twtask_wcmoments').val(0);
				$('#twtask_wcmoments_tag').attr('class','twtask_wcmoments_n');

				$('#twtask_urgent').val(0);
				$('#twtask_urgent_tag').attr('class','twtask_urgent_n');

				layer.open({
					type : 1,
					title : '???????????????????????????',
					closeBtn : 1,
					border : [ 10, 0.3, '#000', true ],
					area : [ '450px', '300px' ],
					content : $('#twtask')
				});
				
			}
			function twTaskTag(type){

				var type_v = $('#'+type).val();

				if(type_v==1){
					$('#'+type).val(0);
					$('#'+type+'_tag').attr('class',type+'_n');
				}else{
					$('#'+type).val(1);
					$('#'+type+'_tag').attr('class',type+'_y');
				}
			}
			function addTwTask(){

				var pytoken = $("#pytoken").val(),
					twtask_jobid = $("#twtask_jobid").val(),
					twtask_content = $("#twtask_content").val(),
					twtask_urgent = $("#twtask_urgent").val(),
					twtask_wcmoments = $("#twtask_wcmoments").val(),
					twtask_gzh = $("#twtask_gzh").val();

				var param = {
					twtask_jobid: twtask_jobid,
					twtask_content: twtask_content,
					twtask_urgent: twtask_urgent,
					twtask_wcmoments: twtask_wcmoments,
					twtask_gzh: twtask_gzh,
					pytoken: pytoken
				};

				$.post("index.php?m=admin_company_job&c=addTuiWenTask",param, function(data) {

					layer.closeAll();

					var data = eval("(" + data + ")");

					parent.layer.msg(data.msg,2,data.code);
				});
			}
		<?php echo '</script'; ?>
>

	</body>
</html>
<?php }} ?>
