<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:19:39
         compiled from "D:\www\www\phpyun\app\template\admin\admin_company.htm" */ ?>
<?php /*%%SmartyHeaderCode:196784768662e22a7b3eae65-45723277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a744147b5ad0839413bcdf5cbd6379e82b9cb8a7' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_company.htm',
      1 => 1656982671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196784768662e22a7b3eae65-45723277',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'hbBgA' => 0,
    'k' => 0,
    'v' => 0,
    'ratingarr' => 0,
    'key' => 0,
    'ratlist' => 0,
    'total' => 0,
    'rows' => 0,
    'today' => 0,
    'source' => 0,
    'Dname' => 0,
    'email_promiss' => 0,
    'moblie_promiss' => 0,
    'pagenum' => 0,
    'pages' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22a7b48f989_47976887',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22a7b48f989_47976887')) {function content_62e22a7b48f989_47976887($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include 'D:\\www\\www\\phpyun\\app\\include\\libs\\plugins\\function.searchurl.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\www\\www\\phpyun\\app\\include\\libs\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
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
	<?php echo '<script'; ?>
 type="text/javascript" src="js/admin_public.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/show_pub.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
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
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/viewer/viewer.min.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>

	<link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/viewer/viewer.min.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
	<link href="images/reset.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
	<link href="images/system.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
	<link href="images/table_form.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
	<title>????????????</title>
</head>

<body class="body_ifm">

	<!--???????????????-->
	<div id="manage" class="" style="display:none;">
		<div class="admin_comtck_box">
			<div class="admin_comtck_hd">
				<div class="comtck_hd_name">
					<a class="name"  id="m_name" target="_blank"></a>
					<div class="comtck_hd_btn">
						<a href="" class="b1" id="m_center" target="_blank">????????????</a>
						<a href="javascript:;" onClick="resetpassword();" class="b2">????????????</a>
						<a href="javascript:;" class="b3" id="m_ztstatus" data-rstatus="" data-zttime="">????????????</a>
					</div>
				</div>
				<div class="comtck_hd_userInfo">
					<span>????????????<em id="m_username"></em></span>
					<span>??????ID???<em id="m_comid"></em></span>
					<span>IP???<em id="m_regip"></em></span>
				</div>
			</div>

			<div class="admin_comtck_md">
				<ul class="comtck_md_list">
					<li><a href="javascript:void(0)" id="m_integral"><div id="m_integral_num">10</div><span>????????????</span></a></li>
					<li><a href="javascript:void(0)" id="m_order"><div id="m_order_num">10</div><span>????????????</span></a></li>
					<li><a href="javascript:void(0)" id="m_down"><div id="m_down_num">10</div><span>????????????</span></a></li>
					<li><a href="javascript:void(0)" id="m_apply"><div id="m_apply_num">10</div><span>????????????</span></a></li>
					<li><a href="javascript:void(0)" id="m_invite"><div id="m_invite_num">10</div><span>????????????</span></a></li>
					<li><a href="javascript:void(0)" id="m_job"><div id="m_job_num">10</div><span>????????????</span></a></li>
					<li><a href="javascript:void(0)" id="m_show"><div id="m_show_num">10</div><span>????????????</span></a></li>
				</ul>
				<div class="comtck_md_gn">
					<a href="javascript:;" id="m_tongji"><i class="comtck_md_i1"></i>????????????</a>
					<a href="javascript:;" id="m_whb"><i class="comtck_md_i2"></i>?????????</a>
					<a href="javascript:;" id="m_comtpl"><i class="comtck_md_i3"></i>????????????</a>
					<a href="javascript:;" id="m_sendmsg"><i class="comtck_md_i4"></i>?????????</a>
					<a href="javascript:;" id="m_sendemail" style="margin-right: 0;"><i class="comtck_md_i5"></i>?????????</a>
				</div>
			</div>

			<div class="com_telbox">
				<span class="com_tel"><em id="m_linkman"></em></span>
              	<span class="com_tel"><em id="m_phone"></em> </span>
              	<span class="com_tel"><em id="m_email"></em> </span>
                <span class="com_tel">???????????????<em id="m_adviser"></em></span>
            </div>
            <input type="hidden" id="m_linktel" value="" />
            <input type="hidden" id="m_linkmail" value="" />
            <input type="hidden" id="m_uid" value="" />
        </div>
	</div>
   	<!--??????????????? end-->

    <!-- ????????????????????? -->
	<div id="renemail" style="display:none;text-align:center; ">
       	<div class="mt10">
			<form class="layui-form" action="index.php?m=admin_company&c=comcert" target="supportiframe" method="post" autocomplete="off">
				<table cellspacing='1' cellpadding='1' class="admin_examine_table">
           			 <tr>
						<th width="80">?????????</th>
						<td align="left">
							<div class="layui-input-block">
								<input type="text" id="comemail" class="tty_input t_w200" name="comemail" value="">
							</div>
						</td>
					</tr>
					<tr>
						<th width="80">???????????????</th>
						<td align="left">
							<div class="layui-input-block">
								<input name="estatus" id="estatus1"  value="1" title="?????????" type="radio" />
							</div>
						</td>
					</tr>

					<tr>
						<td colspan='2' align="center">
							<input type="submit" onclick="loadlayer();" value='??????' class="admin_examine_bth">
							<input type="button" class="admin_examine_bth_qx closebutton" value='??????'>
						</td>
					</tr>
				</table>

				<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
				<input type="hidden" name="uid" id="uid" value="0" >
			</form>
		</div>
	</div>
	<!-- ?????????????????????END -->

	<!--?????????????????????-->
	<div id="renphone" style="display:none;text-align:center; ">
		<div class="mt10">
		 	<form class="layui-form" action="index.php?m=admin_company&c=comcert" target="supportiframe" method="post" autocomplete="off">
			 	<table cellspacing='1' cellpadding='1' class="admin_examine_table">
				 	<tr>
					 	<th width="80">???????????????</th>
					 	<td align="left">
							<div class="layui-input-block">
								<input type="text" class="tty_input t_w200" id="comlinktel" name="comlinktel" value="">
							</div>
					 	</td>
				 	</tr>
				 	<tr>
						<th width="80">???????????????</th>
					 	<td align="left">
							<div class="layui-input-block">
								<input name="mstatus" id="pstatus1"  value="1" title="?????????" type="radio" />
							</div>
					 	</td>
				 	</tr>

					<tr>
						<td colspan='2' align="center">
							<input type="submit" onclick="loadlayer();" value='??????' class="admin_examine_bth">
							<input type="button" class="admin_examine_bth_qx closebutton" value='??????'>
						</td>
					</tr>
			 	</table>

			 	<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
			 	<input type="hidden" name="uid" id="phoneuid" value="0" >
		 	</form>
	 	</div>
	</div>
   	<!-- ????????????end -->

   	<!-- ????????????????????? -->
   	<div id="preview" style="display:none;width:450px ">
     	<div style="height:500px; overflow:auto;width:650px;">
 			<form class="layui-form" name="formstatus" action="index.php?m=admin_company&c=comcert" target="supportiframe" method="post" onsubmit="return tcdiv();">

            	<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">

          		<table cellspacing='1' cellpadding='1' class="admin_examine_table">
                	<tr>
                   		<th>???????????????</th>
                       	<td align="left"><span id="comname"></span></td>
                   	</tr>
                   	<?php if ($_smarty_tpl->tpl_vars['config']->value['com_social_credit']=="1") {?>
                   	<tr>
                        <th>???????????????????????????</th>
                        <td align="left"><span id="social_credit"></span></td>
                        </tr>
               		<tr>
               		<?php }?>
                        <th class="t_fr">???????????????</th>
                        <td align="left">
							<div class="zj_box_list">
								<div id="preview_show" class="zj_box"></div>
								<div class="zj_box_name">????????????/?????????</div>
							</div>
							<?php if ($_smarty_tpl->tpl_vars['config']->value['com_cert_owner']=="1") {?>
							<div class="zj_box_list">
								<div id="owner_cert_show" class="zj_box"></div>
								<div class="zj_box_name"> ??????????????????</div>
							</div>

							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['config']->value['com_cert_wt']=="1") {?>

							<div class="zj_box_list">
								<div id="wt_cert_show" class="zj_box"></div>
								<div class="zj_box_name">   ?????????/?????????</div>
							</div>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['config']->value['com_cert_other']=="1") {?>
							<div class="zj_box_list">
								<div id="other_cert_show" class="zj_box"></div>
								<div class="zj_box_name">   ????????????</div>
							</div>
							<?php }?>
							<div class="clear"></div>
							<div class=""><span class="admin_web_tip">?????????????????????????????????</span></div>
						</td>
					</tr>

                	<tr>
                  		<th width="130">???????????????</th>
                 		<td align="left">
							<div class="layui-input-block">
								<input name="r_status" id="comstatus1" value="1" title="??????" type="radio" />
								<input name="r_status" id="comstatus2" value="2" title="?????????" type="radio" />
							</div>
                     	</td>
                  	</tr>
               		<?php if ($_smarty_tpl->tpl_vars['config']->value['com_free_status']=='1') {?>
                  		<tr>
                        	<th>???????????????</th>
                        	<td align="left">
								<div class="layui-input-block">
									<input name="job_status" value="1" title="??????" type="checkbox" />
									??????????????????????????????????????????????????????
								</div>
                        	</td>
                   		</tr>
                	<?php }?>

                   	<tr>
                       	<th class="t_fr">???????????????</th>
                       	<td align="left"><textarea id="renzhencontent" name="statusbody" class="admin_explain_textarea"></textarea></td>
                   	</tr>
                   	<tr>
                    	<td colspan='2' align="center">
                           	<div class=""> <input type="submit" value='??????' class="admin_examine_bth"> <input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='??????'></div>
                       	</td>
                   	</tr>
            	</table>
        		<input name="noyyzz" id="noyyzz" value="" type="hidden">
             	<input name="uid" id="comuid" value="0" type="hidden">
      		</form>

       	</div>
	</div>
	<!-- ?????????????????????end -->

	<!-- ???????????? -->
	<div id="batchrezhen" style="display:none;width:360px ">
		<div style="overflow:auto;width:360px;">
			<form class="layui-form" action="index.php?m=admin_company&c=comcert" target="supportiframe" method="post">
				<table cellspacing='1' cellpadding='1' class="admin_examine_table">
					<tr>
						<th width="80">???????????????</th>
						<td align="left">
							<input name="comname_email" title="??????" type="checkbox" lay-skin="primary"/>
							<input name="comname_moblie" title="??????" type="checkbox" lay-skin="primary"/>
							<input name="comname_yyzz" title="????????????" type="checkbox" lay-skin="primary"/>
						</td>
					</tr>
					<tr>
						<th width="80">???????????????</th>
						<td align="left">
							<input name="plstatus" id="batchstatis0" value="0" title="?????????" type="radio" />
							<input name="plstatus" id="batchstatis1" value="1" title="?????????" type="radio" />
						</td>
					</tr>

					<tr>
						<td colspan='2' align="center">
							<div class="admin_Operating_sub">
								<input type="submit" onclick="loadlayer();" value='??????' class="admin_examine_bth">
								<input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='??????'>
							</div>
						</td>
					</tr>
				</table>
				<input name="uid" id="btachuid" value="0" type="hidden">
				<input name="batchfirm" value="1" type="hidden">
				<input type="hidden" name="pytoken" id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
			</form>
		</div>
	</div>
	<!-- ????????????End -->

	<!-- ??????LOGO -->
	<div id="logoHb" style="display:none;">
		<div class="  ">
			<ul id="logo_ul" class="comlogo_tit">
				<li class="curr" data-id="one">????????????</li>
				<li data-id="two">????????????</li>
			</ul>
			<div class="logo_box logo_one">
				<table cellspacing='1' cellpadding='1' class="admin_examine_table">
					<tr>
						<th width="80">???????????????</th>
						<td align="left">
							<div class="layui-input-block">
								<input type="text" id="logoComName" class="tty_input t_w200" value="" placeholder="???????????????????????????????????? ">
							</div>
						</td>
					</tr>
					<tr>
						<th width="80">???????????????</th>
						<td>
							<ul id="hb_ul">
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['hbBgA']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<li class="logo_box_img" data-hb="<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
">
									<img src="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" width="40" height="40" />
								</li>
								<?php } ?>
							</ul>
							<div class="logo_box_imgtip ">??????????????????????????????</div>
						</td>
					</tr>
					<tr>
						<th width="80"></th>
						<td align="left">
							<div class="logo_box_bthbox">
								<input type="button" onclick="makeLogoHb();" class="logo_box_bth" value='??????'>
								<input type="submit" onclick="previewLogoHb();" value='??????' class="logo_box_bth_y">
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div class="logo_box logo_two none">
				<div class="" id="logoTd">
					<div class="logo_box_sc">
						<div class="logo_box_sc_c"><img id="logo" src="" width="140" height="140" class="none"></div>
					</div>
					<div class="logo_box_button">
						<div class="logo_box_button_c">
							<button type="button" class="yun_bth_pic adminupload">????????????</button>
							<input type="hidden" id="layupload_type" value="2"/>
							<input type="hidden" id="notoken" value="1"/>
						</div>
					</div>
					<div class="logo_box_p">??????????????????logo</div>
				</div>
			</div>
			<input id="logoUid" value="" type="hidden"/>
			<input id="logoBg" value="" type="hidden"/>
		</div>
	</div>
	<!-- ??????LOGOend -->

	<!-- ?????????????????????????????? Start-->
	<div id="twtask" style="display:none;width:450px;padding: 10px 0;">
		<div style="overflow:auto;width:450px;">
			<form class="layui-form">
				<span id="twTip"  style="display: none;" class="admin_web_tip admin_resume_dc_tip"></span>
				<table cellspacing='1' cellpadding='1' class="admin_examine_table">
					<tr id="twname">
						<th>???????????????</th>
						<td align="left"><span id="twtask_name"></span></td>
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
							<input id="twtask_uid" name="twtask_uid" value="0" type="hidden">
							<input type="button" onclick="addTwTask();" value='??????' class="admin_examine_bth">
							<input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='??????'>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<!-- ?????????????????????????????? End-->

	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['adminstyle']->value)."/member_send_email.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div id="comrating" style="display: none;">
		<div style="width: 710px;">
			<form class="layui-form" action="index.php?m=admin_company&c=uprating" target="supportiframe" method="post" autocomplete="off">
				<table cellspacing='1' cellpadding='1' class="table_form contentWrap" width="100%" style="border-spacing: 5px 18px;margin: 0;">
					<tr>
						<th align="right">???????????????</th>
						<td align="left">
							<div class="layui-input-block" style="width: 162px;">
								<select name="rating" id="ratingid" lay-filter="rating">
									<?php  $_smarty_tpl->tpl_vars['ratlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ratlist']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ratingarr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ratlist']->key => $_smarty_tpl->tpl_vars['ratlist']->value) {
$_smarty_tpl->tpl_vars['ratlist']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ratlist']->key;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['ratlist']->value;?>
</option>
									<?php } ?>
								</select>
							</div>
						</td>
						<th align="right" class="comp_hotjob_line">??????<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
???</th>
						<td>
							<div class="admin_company_width220">
								<input type="text" name="integral" id="integral" size="15" class="tty_input t_w150" value="" />
							</div>
						</td>
					</tr>
					<tr class="admin_table_trbg">
						<th align="right">???????????????</th>
						<td id="vipetime_container">
							<input type="text" name="vipetime" id="vipetime" lay-verify="required" autocomplete="off" class="tty_input t_w150 t_w150time">
						</td>
						<th align="right" class="comp_hotjob_line">???????????????</th>
						<td>
							<input type="checkbox" name="hotjob" id="hotjob" title="????????????" />
						</td>
					</tr>
					<tr>
						<th align="right">??????????????????</th>
						<td>
							<input type="text" name="job_num" id="job_num" size="15" class="tty_input t_w150" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" />
						</td>
						<th align="right" class="comp_hotjob_line">??????????????????</th>
						<td>
							<input type="text" name="breakjob_num" id="breakjob_num" size="15" class="tty_input t_w150" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" />
						</td>
					</tr>
					<tr class="admin_table_trbg">
						<th align="right">??????????????????</th>
						<td><input type="text" name="down_resume" id="down_resume" size="15" class="tty_input t_w150" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" /></td>
						<th align="right" class="comp_hotjob_line">???????????????</th>
						<td><input type="text" name="invite_resume" id="invite_resume" size="15" class="tty_input t_w150" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" /></td>
					</tr>
					<tr class="admin_table_trbg">
						<th align="right">????????????????????????</th>
						<td><input type="text" name="zph_num" id="zph_num" size="15" class="tty_input t_w150" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" /></td>
						<th align="right" class="comp_hotjob_line">???????????????</th>
						<td><input type="text" name="top_num" id="top_num" size="15" class="tty_input t_w150" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" /></td>

					</tr>
					<tr>
						<th align="right">???????????????</th>
						<td>
							<input type="text" name="urgent_num" id="urgent_num" size="15" class="tty_input t_w150" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" />
						</td>
						<th align="right" class="comp_hotjob_line">???????????????</th>
						<td>
							<input type="text" name="rec_num" id="rec_num" size="15" class="tty_input t_w150" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" />
						</td>
					</tr>
					<tr>
						<th align="center" colspan="4" style="text-align: center; border-right: 0px;">
							<input type="submit" value='??????' class="admin_examine_bth" />
							<input type="button" class="admin_examine_bth_qx closebutton" value='??????' />
						</th>
					</tr>
				</table>
				<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
				<input type="hidden" name="rating_name" id="rating_name" value="">
				<input type="hidden" name="oldetime" id="oldetime" value="">
				<input name="ratuid" id="ratuid" value="0" type="hidden">
			</form>
		</div>
	</div>

	<!-- ??????????????? -->
	<div id="infobox2" style="display:none;">
    	<form class="layui-form" action="index.php?m=admin_company&c=status" target="supportiframe" method="post" onsubmit="return htStatus()">
           	<table cellspacing='1' cellpadding='1' class="admin_examine_table">
               	<tr>
                   	<th width="80">???????????????</th>
                   	<td align="left">
						<div class="layui-input-block">
							<input name="status" id="status0" value="0" title="?????????" type="radio" />
							<input name="status" id="status1" value="1" title="?????????" type="radio" />
							<input name="status" id="status3" value="3" title="?????????" type="radio" />
						</div>
                   	</td>
               	</tr>
               	<tr>
                   	<th class="t_fr">???????????????</th>
                   	<td align="left"><textarea id="statusbody" name="statusbody" class="admin_explain_textarea"></textarea></td>
               	</tr>
               	<tr>
                   	<td colspan='2' align="center">
                       	<input type="submit" value='??????' class="admin_examine_bth">
                       	<input type="button" class="admin_examine_bth_qx closebutton" value='??????'>
                   	</td>
               	</tr>
           	</table>
           	<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
           	<input name="uid" value="0" type="hidden">
       	</form>
   	</div>
	<!-- ???????????????End -->

	<div id="deleS_div" style="display:none; width: 390px; ">
    	<form class="layui-form" action="index.php?m=admin_company&c=del" target="supportiframe" method="post" onsubmit="return loadlayer();">
           	<table cellspacing='1' cellpadding='1' class="admin_examine_table">
               	<tr>
					<td align="center">
						<input type="checkbox" value='1' name="delAccount" title="??????????????????" lay-skin="primary" />
					</td>
				</tr>
				<tr>
					<td align="center">
						<span class="admin_web_tip">????????????????????????????????????</span>
					</td>
				</tr>
				<tr>
					<td colspan='2' align="center">
						<input type="submit" value='??????' class="admin_examine_bth">
						<input type="button" id="zxxCancelBtn" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='??????'>
					</td>
				</tr>
           	</table>
           	<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
           	<input name="del" value="0" type="hidden">
       	</form>
   	</div>

   	<div class="infoboxp">

		<div class="tty-tishi_top">
			<div class="tabs_info">
				<ul>
					<li <?php if ($_GET['time']!=5&&!$_GET['c']) {?>class="curr" <?php }?>>
						<a href="index.php?m=admin_company">????????????</a>
					</li>
					<li <?php if ($_GET['time']==5&&!$_GET['c']) {?>class="curr" <?php }?>>
						<a href="index.php?m=admin_company&time=5">????????????</a>
					</li>
					<li <?php if ($_GET['c']) {?>class="curr" <?php }?>>
						<a href="index.php?m=user_member&c=writtenOffLog&utype=2" >????????????</a>
					</li>
					<li <?php if ($_GET['c']) {?>class="curr" <?php }?>>
						<a href="index.php?m=admin_company&c=member_log">????????????</a>
					</li>
				</ul>
			</div>



			<div class="clear"></div>

			<div class="admin_new_search_box">

				<div class="admin_new_search_name">???????????????</div>

				<form action="index.php" name="myform" method="get">

						<input type="hidden" name="m" value="admin_company" />
						<input type="hidden" name="status" value="<?php echo $_GET['status'];?>
" />
						<input type="hidden" name="rec" value="<?php echo $_GET['rec'];?>
" />
						<input type="hidden" name="time" value="<?php echo $_GET['time'];?>
" />
						<input type="hidden" name="rating" value="<?php echo $_GET['rating'];?>
" />

						<div class="admin_Filter_text formselect" did="dcom_type">
							<input type="button" <?php if ($_GET['type']=='1'||$_GET['type']=='') {?> value="????????????/??????" <?php } elseif ($_GET['type']=='2') {?> value="????????????" <?php } elseif ($_GET['type']=='3') {?> value="?????????" <?php } elseif ($_GET['type']=='4') {?> value="????????????" <?php } elseif ($_GET['type']=='5') {?> value="????????????" <?php } elseif ($_GET['type']=='6') {?> value="??????ID" <?php }?> class="admin_new_select_text" id="bcom_type">

							<input type="hidden" name="type" id="com_type" value="<?php if ($_GET['type']) {
echo $_GET['type'];
} else { ?>1<?php }?>" />

							<div class="admin_Filter_text_box" style='display: none' id="dcom_type">
								<ul>
									<li><a href="javascript:void(0)" onClick="formselect('1','com_type','????????????/??????')">????????????/??????</a></li>
									<li><a href="javascript:void(0)" onClick="formselect('2','com_type','????????????')">????????????</a></li>
									<li><a href="javascript:void(0)" onClick="formselect('3','com_type','?????????')">?????????</a></li>
									<li><a href="javascript:void(0)" onClick="formselect('4','com_type','????????????')">????????????</a></li>
									<li><a href="javascript:void(0)" onClick="formselect('5','com_type','????????????')">????????????</a></li>
									<li><a href="javascript:void(0)" onClick="formselect('6','com_type','??????ID')">??????ID</a></li>
								</ul>
							</div>
						</div>
						<input type="text" placeholder="??????????????????????????????" name="keyword" class="admin_new_text">
					<input type="submit" name='news_search' value="??????" class="admin_new_bth" />

					<a href="javascript:void(0)" onclick="$('.admin_screenlist_box').toggle();" class="admin_new_search_gj">????????????</a>
					<a href="index.php?m=admin_company&c=add" class="admin_new_cz_tj">+ ????????????</a>
				</form>

				<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


			</div>

			<div class="clear"></div>
		</div>

		<div class="tty_table-bom">
			<div class="admin_statistics">
				<span class="tty_sjtj_color">???????????????</span>
				<em class="admin_statistics_s">?????????<a href="index.php?m=admin_company" class="ajaxcompanyall">0</a></em>
				<em class="admin_statistics_s">????????????<a href="index.php?m=admin_company&status=4" class="ajaxcompanystatus1">0</a></em>
				<em class="admin_statistics_s">????????????<a href="index.php?m=admin_company&status=3" class="ajaxcompanystatus2">0</a></em>
				<em class="admin_statistics_s">????????????<a href="index.php?m=admin_company&status=2" class="ajaxcompanystatus3">0</a></em>
				???????????????<span><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>???
			</div>

			<div class="clear"></div>

			<div class="table-list" style="color:#898989">
				<div class="admin_table_border">
					<iframe id="supportiframe" name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
					<form action="index.php" name="myform" method="get" id='myform' target="supportiframe">

						<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
						<input name="m" value="admin_company" type="hidden" />
						<input name="c" value="del" type="hidden" />
						<table width="100%">
							<thead>
								<tr class="admin_table_top">
									<th style="width: 20px;">
										<label for="chkall"><input type="checkbox" id='chkAll' onclick='CheckAll(this.form)' /></label>
									</th>
									<th>
										<?php if ($_GET['t']=="uid"&&$_GET['order']=="asc") {?>
											<a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'uid','m'=>'admin_company','untype'=>'order,t'),$_smarty_tpl);?>
">??????ID<img	src="images/sanj.jpg" /></a>
										<?php } else { ?>
											<a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'uid','m'=>'admin_company','untype'=>'order,t'),$_smarty_tpl);?>
">??????ID<img src="images/sanj2.jpg" /></a>
										<?php }?>
									</th>
									<th align="left" width="150">??????/?????????/??????</th>
									<th align="left">??????/????????????</th>
									<th align="left">????????????/??????/??????</th>
									<th align="left">??????Logo</th>
									<th>??????/??????/??????</th>
									<th>?????????</th>
									<th>????????????</th>
									<th>??????</th>
									<th>????????????</th>
									<th width="60">??????</th>
									<th width="120">??????</th>
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
										<td>
											<input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" class="check_all" data-lastupdate="<?php echo $_smarty_tpl->tpl_vars['v']->value['lastupdate'];?>
" data-r_status="<?php echo $_smarty_tpl->tpl_vars['v']->value['r_status'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" />
										</td>
										<td align="left" class="td1" style="text-align: center;">
											<span><?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
</span>
										</td>
										<td align="left">
											<div class="">
												<a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['comUrl'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
 <?php if ($_smarty_tpl->tpl_vars['v']->value['shortname']) {?>????????????<?php echo $_smarty_tpl->tpl_vars['v']->value['shortname'];?>
???<?php }?>">
													<?php echo mb_substr($_smarty_tpl->tpl_vars['v']->value['name'],0,10,"utf-8");?>

													<?php if (mb_strlen($_smarty_tpl->tpl_vars['v']->value['name'])>10) {?>...<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['v']->value['shortname']) {?>???<?php echo $_smarty_tpl->tpl_vars['v']->value['shortname'];?>
???<?php }?>
												</a>
											</div>
											<div class="mt5">
												<a href="javascript:void(0)" class="admin_com_name" onclick="toMember('index.php?m=admin_company&c=Imitate&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['usertype'];?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a>
												<?php if ($_smarty_tpl->tpl_vars['v']->value['status']==2) {?> <img src="../config/ajax_img/suo.png" title="?????????" width="15"><?php }?>
											</div>
										</td>

										<td align="left">
											<?php if ($_smarty_tpl->tpl_vars['today']->value<=$_smarty_tpl->tpl_vars['v']->value['vipetime']||($_smarty_tpl->tpl_vars['v']->value['vipetime']=='0'&&$_smarty_tpl->tpl_vars['v']->value['rating']>'0')) {?>
												<?php echo $_smarty_tpl->tpl_vars['v']->value['rating_name'];?>

											<?php } else { ?>
												<b style="color: red;" class="oldrating">
													<?php if ($_smarty_tpl->tpl_vars['v']->value['oldrating_name']) {?>
														<?php echo $_smarty_tpl->tpl_vars['v']->value['oldrating_name'];?>

													<?php } else { ?>
														<?php echo $_smarty_tpl->tpl_vars['v']->value['rating_name'];?>

													<?php }?>
												</b>
											<?php }?>
											<a data-uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" href="javascript:void(0);" class="comrating">
												<span class="admin_company_xg_icon">[??????]</span>
											</a>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['vipetime']=='0') {?>
												<div class="mt5">??????</div>
											<?php } else { ?>
												<?php if ($_smarty_tpl->tpl_vars['today']->value<=$_smarty_tpl->tpl_vars['v']->value['vipetime']) {?>
													<div class="mt5"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['vipetime'],"%Y-%m-%d");?>
</div>
												<?php } else { ?>
													<div class="mt5" style="color: red;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['vipetime'],"%Y-%m-%d");?>
</div>
												<?php }?>
											<?php }?>
										</td>
										<td align="left">
											<div>
												<?php if ($_smarty_tpl->tpl_vars['v']->value['linktel']) {?>
													<span class="admin_new_sj"><?php echo $_smarty_tpl->tpl_vars['v']->value['linktel'];?>
</span>


												<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['linkphone']) {?>
													<span class="admin_new_sj"><?php echo $_smarty_tpl->tpl_vars['v']->value['linkphone'];?>
</span>

												<?php }?>
											</div>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['linkmail']) {?>
											<div class="mt5">
												<span class="admin_new_yx"><?php echo $_smarty_tpl->tpl_vars['v']->value['linkmail'];?>
</span>
										   </div>
										   <?php }?>
										   <div class="mt5">
											<?php if ($_smarty_tpl->tpl_vars['v']->value['moblie_status']==1) {?>
											<img src="../config/ajax_img/2-1.png" msg="???????????????" data-status="<?php echo $_smarty_tpl->tpl_vars['v']->value['moblie_status'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"  data-phone="<?php echo $_smarty_tpl->tpl_vars['v']->value['linktel'];?>
"  data-name="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
"  class="company_rzpng  mt_phone" width="20" height="20">
											<?php } else { ?>
											<img src="../config/ajax_img/2-2.png" msg="???????????????" data-status="<?php echo $_smarty_tpl->tpl_vars['v']->value['moblie_status'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"  data-phone="<?php echo $_smarty_tpl->tpl_vars['v']->value['linktel'];?>
"  data-name="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
"  class="company_rzpng  mt_phone" width="20" height="20">
											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['v']->value['wxid']!='') {?>
											<img src="../config/ajax_img/4-1.png" class="wxBindmsgs" msg="<?php echo $_smarty_tpl->tpl_vars['v']->value['wxBindmsg'];?>
" onclick="showQrcode('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['wxid'];?>
')" width="20" height="20" />
											<?php } else { ?>
											<img src="../config/ajax_img/4-2.png" class="wxBindmsgs" msg="<?php echo $_smarty_tpl->tpl_vars['v']->value['wxBindmsg'];?>
" onclick="showQrcode('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['wxid'];?>
')" width="20" height="20" />
											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['v']->value['yyzz_status']==1) {?>
												<img src="../config/ajax_img/3-1.png" msg="?????????????????????" data-url="<?php echo $_smarty_tpl->tpl_vars['v']->value['yyzzurl'];?>
" data-ourl="<?php echo $_smarty_tpl->tpl_vars['v']->value['owner_cert_url'];?>
" data-wurl="<?php echo $_smarty_tpl->tpl_vars['v']->value['wt_cert_url'];?>
" data-otherurl="<?php echo $_smarty_tpl->tpl_vars['v']->value['other_cert_url'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" data-status="<?php echo $_smarty_tpl->tpl_vars['v']->value['yyzz_status'];?>
" data-scredit="<?php echo $_smarty_tpl->tpl_vars['v']->value['social_credit'];?>
" class="company_rzpng m_yyzz" width="20" height="20">
											<?php } else { ?>
												<img src="../config/ajax_img/3-2.png" msg="?????????????????????" data-url="<?php echo $_smarty_tpl->tpl_vars['v']->value['yyzzurl'];?>
" data-ourl="<?php echo $_smarty_tpl->tpl_vars['v']->value['owner_cert_url'];?>
" data-wurl="<?php echo $_smarty_tpl->tpl_vars['v']->value['wt_cert_url'];?>
" data-otherurl="<?php echo $_smarty_tpl->tpl_vars['v']->value['other_cert_url'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" data-status="<?php echo $_smarty_tpl->tpl_vars['v']->value['yyzz_status'];?>
" data-scredit="<?php echo $_smarty_tpl->tpl_vars['v']->value['social_credit'];?>
" class="company_rzpng m_yyzz" width="20" height="20">
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['email_status']==1) {?>
												<img src="../config/ajax_img/1-1.png"  msg="???????????????" data-status="<?php echo $_smarty_tpl->tpl_vars['v']->value['email_status'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"  data-mail="<?php echo $_smarty_tpl->tpl_vars['v']->value['linkmail'];?>
"   data-name="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" class="company_rzpng mt_email" width="20" height="20">
											<?php } else { ?>

												<img src="../config/ajax_img/1-2.png"  msg="???????????????" data-status="<?php echo $_smarty_tpl->tpl_vars['v']->value['email_status'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"  data-mail="<?php echo $_smarty_tpl->tpl_vars['v']->value['linkmail'];?>
"  data-name="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
"  class="company_rzpng mt_email" width="20" height="20">
											<?php }?>
											</div>
										</td>
										<td align="left">
											<?php if ($_smarty_tpl->tpl_vars['v']->value['logo']) {?>
											<a href="javascript:;" onclick="makeLogo('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
', '<?php echo $_smarty_tpl->tpl_vars['v']->value['shortname'];?>
', '<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
', 2);">
												<img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['logo'];?>
" width="88px" height="88px" style="height: 88px; width: 88px; border-radius: 10px;" />
											</a>
											<?php } else { ?>
												<a href="javascript:void(0);" onclick="makeLogo('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
', '<?php echo $_smarty_tpl->tpl_vars['v']->value['shortname'];?>
', '<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
', 1);"  class="layui-btn layui-btn-small">??????LOGO</a>
											<?php }?>
										</td>
										<td>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['login_date']) {?>
												<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['login_date'],"%Y-%m-%d %H:%M");?>

											<?php } else { ?>
												?????????
											<?php }?>
											<div class=""><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['reg_date'],"%Y-%m-%d %H:%M");?>
</div>
											<div class=""><?php echo $_smarty_tpl->tpl_vars['source']->value[$_smarty_tpl->tpl_vars['v']->value['source']];?>
</div>
										</td>

										<td align="center">
											<div>
												<a href="index.php?m=admin_company_job&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" class="admin_cz_sc"><?php if ($_smarty_tpl->tpl_vars['v']->value['jobnum']>0) {
echo $_smarty_tpl->tpl_vars['v']->value['jobnum'];
} else { ?><font color="red">0</font><?php }?>???</a>
											</div>
											<div>
												<a href="index.php?m=admin_company_job&c=show&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" class="admin_cz_sc"><span class="admin_company_xg_icon">??????</span></a>
											</div>
										</td>
										<td>
											<div style="width: 84px;">
												<?php if ($_smarty_tpl->tpl_vars['v']->value['hottime']&&$_smarty_tpl->tpl_vars['v']->value['rec']==1) {?>
													<div class="">
														<?php if ($_smarty_tpl->tpl_vars['v']->value['hottime']>=time()) {?>
															<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['hottime'],"%Y-%m-%d");?>

														<?php } else { ?>
															<font color='red'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['hottime'],"%Y-%m-%d");?>
</font>
														<?php }?>
													</div>
													<a href="javascript:void(0);" onClick="showdiv3('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_cz_sc">
														<span class="admin_company_xg_icon">??????</span>
													</a>/
													<a href="javascript:void(0);" onClick="layer_del('???????????????????????????','index.php?m=admin_hotjob&c=del&del=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_cz_sc">
														<span class="admin_company_xg_icon">??????</span>
													</a>

												<?php } else { ?>
													<?php if ($_smarty_tpl->tpl_vars['v']->value['name']) {?>
														<a href="javascript:void(0);" onClick="showdiv('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_cz_sc">
														<span class="admin_company_xg_icon">????????????</span></a>
													<?php } else { ?>
														<a href="javascript:void(0);" onClick="layer.msg('????????????????????????',2,8);" class="admin_cz_sc">
														<span class="admin_company_xg_icon">????????????</span></a>
													<?php }?>
												<?php }?>
											</div>
										</td>

										<td>
											<div><?php echo $_smarty_tpl->tpl_vars['Dname']->value[$_smarty_tpl->tpl_vars['v']->value['did']];?>
</div>
											<div>
												<a href="javascript:;" onclick="checksite('<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
','index.php?m=admin_company&c=checksitedid');" class="admin_company_xg_icon">
													<span class="admin_company_xg_icon">??????</span>
												</a>
											</div>
										</td>

										<td align="center">
											<?php if ($_smarty_tpl->tpl_vars['v']->value['crm_uid']) {?>
												<div><?php echo $_smarty_tpl->tpl_vars['v']->value['crm_name'];?>
</div>
												<div>
													<a href="javascript:void(0);" onclick="checkguwen('<?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
','index.php?m=admin_company&c=checkguwen');" class="admin_company_xg_icon">
														<span class="admin_company_xg_icon">??????</span>
													</a>
												</div>
											<?php } else { ?>
												<div>?????????</div>
												<div>
													<a href="javascript:void(0);" onclick="checkguwen('<?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
','index.php?m=admin_company&c=checkguwen');" class="admin_company_xg_icon">
														<span class="admin_company_xg_icon">??????</span>
													</a>
												</div>
											<?php }?>
										</td>

										<td>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['r_status']=='1') {?>
												<span class="admin_com_Audited">?????????</span>
											<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['r_status']=='2') {?>
												<span class="admin_com_Lock">?????????</span>
											<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['r_status']=='3') {?>
												<span class="admin_com_tg">?????????</span>
											<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['r_status']=='4') {?>
												<span class="admin_com_tg">?????????</span>
											<?php } else { ?>
												<span class="admin_com_noAudited">?????????</span>
											<?php }?>

										</td>

									<td align="left">
											<a href="javascript:void(0);" uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" status="<?php echo $_smarty_tpl->tpl_vars['v']->value['r_status'];?>
"  class="admin_new_c_bth admin_new_c_bthsh status" title="??????">??????</a>
											<a href="index.php?m=admin_company&c=edit&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
&rating=<?php echo $_smarty_tpl->tpl_vars['v']->value['rating'];?>
" class="admin_new_c_bth" title="??????????????????????????????">??????</a>
											<br>
											<a href="index.php?m=admin_company&c=member_log&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" class="admin_new_c_bth admin_new_c_rz mt5" title="????????????????????????">??????</a>
											<a href="javascript:void(0);" class="admin_new_c_bth admin_new_c_bth_sc deleS" uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"  title="?????????????????????????????????">??????</a>
											<br>
											<a href="javascript:void(0)"  class="admin_new_c_bth admin_new_c_rz mt5 logtj" loguid='<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
'  logusertype='2'>??????</a>
											<a href="javascript:;" onclick="manage('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['comUrl'];?>
')" class="admin_new_c_bth admin_new_c_bth_more  mt5" title="??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????">??????</a>
											<br>
											<a href="javascript:;" onclick="addTuiWenTask('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['lastupdate'];?>
');" style=" display:inline-block;width:112px;border:1px solid #e9e9e9;height:22px; line-height:22px; text-align:center;color:#999;border-radius: 3px; background:#fff; font-size:13px; margin-top: 5px;;">????????????</a>
										</td> 
									</tr>
								<?php } ?>
								<tr>
									<td align="center"><label for="chkall2"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></label></td>
									<td colspan="12">
										<label for="chkAll2">??????</label>
										<input class="admin_button" type="button" name="delsub" value="????????????" onClick="audall();" />

										<?php if ($_smarty_tpl->tpl_vars['email_promiss']->value) {?>
											<input class="admin_button" type="button" value="?????????"	onclick="return confirm_email('?????????????????????','email_div')" />
										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['moblie_promiss']->value) {?>
											<input	class="admin_button" type="button" value="?????????" onclick="return confirm_email('?????????????????????','moblie_div')" />
										<?php }?>

										<input class="admin_button" type="button" name="delsub" value="????????????" onClick="return delUser('del[]')" />

										<input class="admin_button" type="button" name="delsub" value="??????????????????" onClick="checksiteall('index.php?m=admin_company&c=checksitedid');" />
										<input class="admin_button" type="button" name="delsub" value="??????????????????" onClick="checkguwenall('index.php?m=admin_company&c=checkguwen');" />
										<input class="admin_button" type="button" name="delsub" value="????????????" onclick="return batch('del[]')" />
										<input class="admin_button" type="button" name="delsub" value="????????????" onClick="return twtaskall('del[]')" />
									</td>
								</tr>

								<?php if ($_smarty_tpl->tpl_vars['total']->value>$_smarty_tpl->tpl_vars['config']->value['sy_listnum']) {?>
									<tr>
										<?php if ($_smarty_tpl->tpl_vars['pagenum']->value==1) {?>
											<td colspan="3">??? 1 ??? <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_listnum'];?>
 ????????? <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ???</td>
										<?php } elseif ($_smarty_tpl->tpl_vars['pagenum']->value>1&&$_smarty_tpl->tpl_vars['pagenum']->value<$_smarty_tpl->tpl_vars['pages']->value) {?>
											<td colspan="3">??? <?php echo ($_smarty_tpl->tpl_vars['pagenum']->value-1)*$_smarty_tpl->tpl_vars['config']->value['sy_listnum']+1;?>
 ???  <?php echo $_smarty_tpl->tpl_vars['pagenum']->value*$_smarty_tpl->tpl_vars['config']->value['sy_listnum'];?>
 ????????? <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ???</td>
										<?php } elseif ($_smarty_tpl->tpl_vars['pagenum']->value==$_smarty_tpl->tpl_vars['pages']->value) {?>
											<td colspan="3">??? <?php echo ($_smarty_tpl->tpl_vars['pagenum']->value-1)*$_smarty_tpl->tpl_vars['config']->value['sy_listnum']+1;?>
 ??? <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ????????? <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ???</td>
										<?php }?>
										<td colspan="10" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
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
	<div id="acwxbind" class="wx_login_show none">
		<div class="job_tel_wx_box">
			<div id="wx_login_qrcode" class=" job_tel_wx_zs">?????????????????????...</div>
			<div class="job_tel_wx_p"><span class="job_tel_wx_bth">????????????????????????????????????????????????</span></div>
			<div id="wx_sx" class="none">
				<div class="fast_login_show_sxbox"><a href="javascript:void(0);" onclick="getwxlogincode()" class="fast_login_show_sxicon"></a>??????????????????????????????</div>
			</div>
		</div>
	</div>

	<?php echo '<script'; ?>
>
		var needLoad = false;
		$(document).ready(function() {
			$('body').click(function(evt) {
				if ($(evt.target).parents("#gw_name").length == 0 && evt.target.id != "gw_name") {
					$('#gw_select').hide();
				}
			});

			$(".preview").hover(function(){
				var pic_url=$(this).attr('url');
				layer.tips("<img src="+pic_url+" style='max-width:120px'>", this, {
					guide:3,
					style: ['background-color:#5EA7DC; color:#fff;top:-7px;left:-20px', '#5EA7DC']
				});
				$(".xubox_layer").addClass("xubox_tips_border");
			},function(){layer.closeAll('tips');});
			$(".oldrating").hover(function(){
				if($(this).text().trim() != '????????????'){
					layer.tips("?????????????????????", this, {tips:1});
				}
			},function(){layer.closeAll('tips');});
		});
        /* ????????????????????????????????????????????????????????????????????????????????? */
        function updateVipEtimeInput(){
            $("input[name='vipetime']").remove();
            $('#vipetime_container').append('<input type="text" name="vipetime" id="vipetime" lay-verify="required" autocomplete="off" class="tty_input t_w150 t_w150time">');
        }

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
				parent.layer.msg('???????????????????????????????????????', 2, 8);
				return false;
			} else {
				$("input[name=uid]").val(codewebarr);
				$("#statusbody").val('');
				$("input[name='status']").attr('checked', false);
				$.layer({
					type : 1,
					title : '??????????????????',
					closeBtn : [ 0, true ],
					border : [ 10, 0.3, '#000', true ],
					area : [ '410px', '240px' ],
					page : {
						dom : "#infobox2"
					}
				});
			}
		}

		$(function() {
			/* ???????????? */
			$(".status").click(function() {
				var uid = $(this).attr("uid");
				var status = $(this).attr("status");
				if(status==2 || status==4){
					var status_msg = '??????';
					if(status==4){
						status_msg = '??????';
					}
					parent.layer.msg('??????????????????'+ status_msg +'?????????????????????????????????', 2, 8);
					return false;
				}

				$('body').css('overflow-y', 'hidden');
				$.layer({
					type: 2,
					shadeClose: true,
					title: '??????????????????',
					area: ['1220px', ($(window).height() - 30) +'px'],
					iframe: {src: 'index.php?m=admin_company&c=companyAudit&uid='+uid},
					close: function(){
						if(needLoad){
							window.location.reload();
						}else{
							$('body').css('overflow-y', '');
						}
					}
				});
			});

			/* ?????????,??????????????????APP???????????????????????? */
			$(".wxBindmsgs").hover(function(){
				var msg=$(this).attr('msg');
				msg += '<br/>?????????????????????????????????????????????';
				layer.tips(msg, this, {guide: 1, style: ['background-color:#5EA7DC; color:#fff;top:-7px', '#5EA7DC'],area: ['250px', 'auto'],time:5000});
				$(".xubox_layer").addClass("xubox_tips_border");
			},function(){

				layer.closeAll('tips');

			});

			/* ???????????????????????? */
			$(".mt_email").hover(function(){
				var msg=$(this).attr('msg');
				msg += '<br/>????????????????????????????????????';
				layer.tips(msg, this, {guide: 1, style: ['background-color:#5EA7DC; color:#fff;top:-7px', '#5EA7DC'],area: ['200px', 'auto'],time:5000});
				$(".xubox_layer").addClass("xubox_tips_border");
			},function(){

				layer.closeAll('tips');

			});

			/* ??????????????????????????? */
			$(".mt_phone").hover(function(){
				var msg=$(this).attr('msg');
				msg += '<br/>???????????????????????????????????????';
				layer.tips(msg, this, {guide: 1, style: ['background-color:#5EA7DC; color:#fff;top:-7px', '#5EA7DC'],area: ['200px', 'auto'],time:5000});
				$(".xubox_layer").addClass("xubox_tips_border");
			},function(){

				layer.closeAll('tips');

			});

			/* ?????????????????????????????? */
			$(".m_yyzz").hover(function(){
				var msg=$(this).attr('msg');
				msg += '<br/>??????????????????????????????????????????';
				layer.tips(msg, this, {guide: 1, style: ['background-color:#5EA7DC; color:#fff;top:-7px', '#5EA7DC'],area: ['200px', 'auto'],time:5000});
				$(".xubox_layer").addClass("xubox_tips_border");
			},function(){
				layer.closeAll('tips');
			});

			/* ???????????? */
			$(".mt_email").click(function(data){
				var status = $(this).attr("data-status");
				var uid    = $(this).attr("data-url");
				var email  = $(this).attr("data-mail");
				$('#comname').html(name);
				$('#comemail').val(email);
				$('#uid').val(uid);
				$("#estatus" + status).attr("checked", true);
				layui.use([ 'form' ], function() {
					var form = layui.form;
					form.render();
				});
				$.layer({
					type : 1,
					title : '????????????',
					closeBtn : [ 0, true ],
					offset : [ '80px', '' ],
					border : [ 10, 0.3, '#000', true ],
					area : [ '350px', '220px' ],
					page : {
						dom : '#renemail'
					}
				});
			})

			/* ???????????? */
			$(".mt_phone").click(function(data){
			  var status   = 	$(this).attr("data-status");
			  var uid      = 	$(this).attr("data-url");
			  var linktel  = 	$(this).attr("data-phone");
				$('#comlinktel').val(linktel);
				 $('#phoneuid').val(uid);
				$("#pstatus" + status).attr("checked", true);
				layui.use([ 'form' ], function() {
				  var form = layui.form;
				  form.render();
				});
				$.layer({
					type : 1,
					title : '????????????',
					closeBtn : [ 0, true ],
					offset : [ '80px', '' ],
					border : [ 10, 0.3, '#000', true ],
					area : [ '350px', '220px' ],
					page : {
					  dom : '#renphone'
					}
				});
			})

			/* ???????????? */
			$(".m_yyzz").click( function() {
              var url = $(this).attr("data-url");
              var ourl = $(this).attr("data-ourl");
              var wurl = $(this).attr("data-wurl");
              var otherurl = $(this).attr("data-otherurl");
              var name = $(this).attr("data-name");
              var social_credit = $(this).attr("data-scredit");
              var uid = $(this).attr("data-uid");
              var pytoken = $('#pytoken').val();
              var picobj = {
                    'preview':url,
                    <?php if ($_smarty_tpl->tpl_vars['config']->value['com_cert_owner']=="1") {?>'owner_cert':ourl,<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['config']->value['com_cert_wt']=="1") {?>'wt_cert'   :wurl,<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['config']->value['com_cert_other']=="1") {?>'other_cert':otherurl<?php }?>
              };
              $("#comname").html(name);
				if($("#social_credit")){
					$("#social_credit").html(social_credit);
				}
              $("#comuid").val(uid);
              $("#comstatus" + status).attr("checked", true);
                layui.use([ 'form' ], function() {
                    var form = layui.form;
                    form.render();
                });
                $.post("index.php?m=admin_company&c=comcert&sbody=1", {uid: uid,pytoken: pytoken}, function(msg) {
                	$("#renzhencontent").val(msg);
					for(let i in picobj){
						if($("#"+i+"_show")){
							$("#"+i+"_show").html("<img src='" + picobj[i] + "' style='width:100px;height:100px' />");
							if(picobj[i]){
								// $("#"+i+"_url").attr("href",picobj[i]);
								$("#zw_"+i).hide();
								$("#"+i+"_url").show();
							}else{
								$("#"+i+"_url").hide();
								$("#noyyzz").val('1');
								$("#zw_"+i).show();
							}
						}
					}

					$.layer({
						type : 1,
						title : '????????????',
						closeBtn : [ 0, true ],
						offset : [ '80px', '' ],
						border : [ 10, 0.3, '#000', true ],
						area : [ '650px', 'auto' ],
						page : {
							dom : '#preview'
						}
					});
					var viewer = new Viewer(document.getElementById('preview'), {
						url: 'lay-src',
						toolbar: true,  //???????????????
						show: function (){        // ????????????????????????????????????
							viewer.update();
						},
					});
                });
			});

			/* ????????? */
			$("#m_sendmsg").click(function() {
				var linktel = $('#m_linktel').val();
				if (!linktel) {
					parent.layer.msg('?????????????????????????????????', 2, 8);
				} else {
					send_moblie(linktel);
				}
			});

			/* ????????? */
			$("#m_sendemail").click(function() {
				var linkmail = $('#m_linkmail').val();
				if (!linkmail) {
					parent.layer.msg('?????????????????????????????????', 2, 8);
				} else {
					send_email(linkmail);
				}
			});

			/* ????????????????????? */
			$("#m_ztstatus").click(function() {

				var rstatus = $(this).attr('data-rstatus'),
					zttime = $(this).attr('data-zttime'),
					comid = $("#m_uid").val(),
					pytoken = $('#pytoken').val();

				if(rstatus!='4'){

					if(rstatus=='2'){
						parent.layer.msg('???????????????????????????????????????????????????', 2, 8);
						return false;
					}

					var pwcf = parent.layer.confirm("??????????????????????????????",function(){
						loadlayer();
						$.post("index.php?m=admin_company&c=suspend",{uid:comid,pytoken:pytoken},function(data){

							parent.layer.closeAll('loading');
							var dataJson = eval("(" + data + ")");

							if(dataJson.st=='9'){
								parent.layer.msg('???????????????', 2, 9,function(mdata){
									location.href = dataJson.url;
								});
							}else{
								parent.layer.msg('????????????????????????', 2, 8);
							}

						});

					});

				}else{
					var pwcf = parent.layer.confirm('?????????' + zttime + '?????????????????????????????????????????????', {
								btn: ['???', '???', '??????']
							},
							function () {

								setupcom(comid, 1);
							},
							function () {

								setupcom(comid, 0);
							},
							function () {
								parent.layer.closeAll();
							}
					);
				}
			});

			//????????????
			function setupcom(comid,addzttime){
				var pytoken = $('#pytoken').val();
				loadlayer();
				$.post("index.php?m=admin_company&c=setupcom",{uid:comid,addzttime:addzttime,pytoken:pytoken},function(data){

					parent.layer.closeAll();
					var dataJson = eval("(" + data + ")");

					if(dataJson.errcode=='9'){
						parent.layer.msg('???????????????????????????', 2, 9,function(mdata){
							location.href = dataJson.url;
						});
					}else{
						parent.layer.msg('????????????????????????', 2, 8);
					}

				});
			}

			/* ?????????????????? */
			$(".comrating").click(function() {

				var uid = $(this).attr("data-uid");
				var pytoken = $("#pytoken").val();
				$.post("index.php?m=admin_company&c=getstatis", {
					uid : uid,
					pytoken : pytoken
				},function(data) {
					if (data) {

						var dataJson = eval("(" + data + ")");
						$('#top_num').val(dataJson.top_num);
						$('#urgent_num').val(dataJson.urgent_num);
						$('#rec_num').val(dataJson.rec_num);
						$('#job_num').val(dataJson.job_num);
						$('#down_resume').val(dataJson.down_resume);
						$('#invite_resume').val(dataJson.invite_resume);
						$('#breakjob_num').val(dataJson.breakjob_num);
						$('#zph_num').val(dataJson.zph_num);
						$('#oldetime').val(dataJson.vip_etime);
						$('#pay').val(dataJson.pay);
						$('#integral').val(dataJson.integral);
						$('#ratuid').val(uid);
						$("#ratingid").val(dataJson.rating);

						if(dataJson.hotjob==1){
							$('#hotjob').prop("checked",true);
						}else{
							$('#hotjob').prop("checked",false);
						}
                        updateVipEtimeInput()
						layui.use(['laydate'], function() {
							var laydate = layui.laydate;
							if (dataJson.vipetime != '??????') {
                                laydate.render({
                                    elem: '#vipetime',
                                    min: dataJson.vip_etime*1000,
                                    value:dataJson.vipetime,
                                });
                            } else {
							    $('#vipetime').val('??????')
                            }
						});

						var ratingname = $("#ratingid").find("option:selected").text();

						$('#rating_name').val(ratingname);

						layui.form.render();
						$.layer({
							type : 1,
							title : '????????????????????????',
							closeBtn : [ 0, true ],
							border : [ 10, 0.3, '#000', true ],
							area : [ '710px', 'auto' ],
							offset : [ '20px', '' ],
							page : {
								dom : "#comrating"
							}
						});

					} else {
						parent.layer.msg('???????????????????????????', 2, 8);
						return false;
					}
				});
			});

			/* ?????????????????? */
			$(".deleS").click(function() {

				var uid = $(this).attr("uid");

				layui.use(['form'], function() {
					var form = layui.form;
					form.render();
				});

				$("input[name=del]").val(uid);

				$.layer({
					type: 1,
					title: '??????????????????',
					closeBtn: [0, true],
					border: [10, 0.3, '#000', true],
					area: ['390px', '240px'],
					page: {
						dom: "#deleS_div"
					}
				});

			});
				});

		/* ???????????????????????? */
		function resetpassword() {
			var pytoken = $('#pytoken').val();
			var username = $("#m_username").html(); //????????????????????????????????????
			var uid = $("#m_uid").val(); //?????????????????????????????????ID???
			parent.layer.confirm("????????????????????????", function() { //????????????
				parent.layer.closeAll();
				loadlayer();
				$.get("index.php?m=admin_company&c=reset_companypassword&uid=" + uid + "&pytoken=" + pytoken, function(data) {
					parent.layer.closeAll('loading');
					parent.layer.alert("???????????????" + username + "?????????????????????123456???", 9);
					return false;
				});

			});
		}

		function showDIVMore(url, title) {
			layer.open({
				type : 2,
				title : title,
				shadeClose : true,
				shade : false,
				maxmin : true, //??????????????????????????????
				area : [ '1100px', '495px' ],
				content : url
			});
		}

		function manage(comid, url) {
			var pytoken = $("#pytoken").val();
			$('#m_comid').html(comid);
			$('#m_uid').val(comid);
			$('#m_name').attr('href', url);
			$('#m_taocan').attr('data-uid', comid);
			$('#m_zengzhi').attr('data-uid', comid);
			$('#m_center').attr('href', 'index.php?m=admin_company&c=Imitate&uid=' + comid);
			$('#m_integral').attr('onclick', "showDIVMore('index.php?m=company_pay&comid=" + comid + "','????????????')");
			$('#m_order').attr('onclick', "showDIVMore('index.php?m=company_order&comid=" + comid + "','??????/??????')");
			$('#m_apply').attr('onclick', "showDIVMore('index.php?m=admin_comlog&comid=" + comid + "','????????????')");
			$('#m_down').attr('onclick', "showDIVMore('index.php?m=admin_userlog&comid=" + comid + "','????????????')");
			$('#m_invite').attr( 'onclick', "showDIVMore('index.php?m=admin_comlog&c=useridmsg&comid=" + comid + "','????????????')");
			$('#m_job').attr('onclick', "showDIVMore('index.php?m=admin_company_job&uid=" + comid + "','????????????')");
			$('#m_show').attr('onclick', "showDIVMore('index.php?m=admin_company_pic&c=show&comid="	+ comid + "','????????????')");
			$('#m_comtpl').attr('onclick',"showDIVMore('index.php?m=admin_company&c=mcomtpl&comid="	+ comid + "','????????????')");
			$('#m_memberlog').attr('href','index.php?m=admin_company&c=member_log&comid=' + comid);

			$('#m_tongji').attr('href',	'index.php?m=admin_company&c=Imitate&uid=' + comid	+ '&type=tongji');
			$('#m_tongji').attr('target', '_blank');

			$('#m_whb').attr('href','index.php?m=admin_company&c=mwhb&comid='+comid);

			$('#m_addjob').attr('href',	'index.php?m=admin_company_job&c=show&uid=' + comid);
			var i = loadlayer();
			$.post("index.php?m=admin_company&c=getinfo", {
				comid : comid,
				pytoken : pytoken
			}, function(data) {
				parent.layer.closeAll();
				if (data) {
					var comdata = eval("(" + data + ")");
					if (comdata.name != "") {
						$('#m_name').html(comdata.name);
					} else {
						$('#m_name').html("????????????????????????");
					}

					$('#m_ztstatus').attr('data-rstatus',comdata.r_status);
					if(comdata.r_status=='4'){
						$('#m_ztstatus').html('????????????');
						$('#m_ztstatus').attr('data-zttime',comdata.zt_days);
					}else{
						$('#m_ztstatus').html('????????????');
						$('#m_ztstatus').attr('data-zttime','');
					}


					$('#m_username').html(comdata.username);
					if (comdata.linkman != "") {
						$('#m_linkman').html("????????????" + comdata.linkman + "&nbsp;&nbsp;");
					} else {
						$('#m_linkman').html("????????????" + "????????????");
					}
					if (comdata.linktel != "") {
						$('#m_linktel').html("?????????" + comdata.linktel);
					} else {
						$('#m_linktel').html("?????????" + "????????????");
					}
					if (comdata.phone != "") {
						$('#m_phone').html("?????????" + comdata.phone);
					} else {
						$('#m_phone').html("?????????" + "????????????");
					}
					if (comdata.linkmail != "") {
						$('#m_email').html("?????????" + comdata.linkmail);
					} else {
						$('#m_email').html("?????????" + "????????????");
					}
					if (comdata.adviser != "") {
						$('#m_adviser').html(comdata.adviser);
					} else {
						$('#m_adviser').html("???????????????????????????");
					}
					if (comdata.integralNum != "") {
						$('#m_integral_num').html(comdata.integralNum);
					}
					if (comdata.orderNum != "") {
						$('#m_order_num').html(comdata.orderNum);
					}
					if (comdata.downNum != "") {
						$('#m_down_num').html(comdata.downNum);
					}
					if (comdata.applyNum != "") {
						$('#m_apply_num').html(comdata.applyNum);
					}
					if (comdata.inviteNum != "") {
						$('#m_invite_num').html(comdata.inviteNum);
					}
					if (comdata.showNum != "") {
						$('#m_show_num').html(comdata.showNum);
					}
					if (comdata.jobNum != "") {
						$('#m_job_num').html(comdata.jobNum);
					}

					$('#m_status').val(comdata.status);
					$('#m_regip').html(comdata.reg_ip);
					$('#m_rating').val(comdata.rating);
					$('#m_info').attr('href','index.php?m=admin_company&c=edit&id=' + comid+ '&rating=' + comdata.rating);
					$('#m_password').attr('href','index.php?m=admin_company&c=edit&id=' + comid+ '&rating=' + comdata.rating);
					$('#m_yyzzurl').val(comdata.yyzzurl);
					$('#m_yyzz').attr('data-name', comdata.name);
					$('#m_yyzz').attr('data-status', comdata.comyyzzstatus);
					$('#m_linktel').val(comdata.linktel);
					$('#m_linkmail').val(comdata.linkmail);
					$('#m_user').val(comdata.username);
					$('#m_resetpassword').val(comdata.username);

					$.layer({
						type : 1,
						title : '????????????',
						closeBtn : [ 0, true ],
						border : [ 10, 0.3, '#000', true ],
						area : [ '610px', 'auto' ],
						offset : [ '20px', '' ],
						page : {
							dom : "#manage"
						}
					});
				}
			});
		}

  		layui.use(['layer', 'form'], function() {
        	var layer = layui.layer,
            	form = layui.form,
            	$ = layui.$,
            	url = "index.php?m=admin_company&c=getrating";

           	var pytoken = $("#pytoken").val();
			form.on('select(rating)', function(data) {
               	$.post(url, {
                   	id: data.value,
					uid:$('#ratuid').val(),
                   	pytoken: pytoken
               	}, function(htm) {
               		if(htm) {
                       	var dataJson = eval("(" + htm + ")");
						$('#top_num').val(dataJson.top_num);
						$('#urgent_num').val(dataJson.urgent_num);
						$('#rec_num').val(dataJson.rec_num);
                       	$('#job_num').val(dataJson.job_num);
                       	$('#down_resume').val(dataJson.down_resume);
                       	$('#invite_resume').val(dataJson.invite_resume);
                       	$('#breakjob_num').val(dataJson.breakjob_num);
                       	$('#zph_num').val(dataJson.zph_num);
                       	$('#oldetime').val(dataJson.oldetime);
                       	$('#rating_name').val(dataJson.rating_name);
                       	$('#com_rating_val').val(dataJson.rating);
						
                        updateVipEtimeInput()
						layui.use(['laydate'], function() {
							var laydate = layui.laydate;
                            if (dataJson.vipetime != '??????') {
                                laydate.render({
                                    elem: '#vipetime',
                                    min: dataJson.oldetime*1000,
                                    value:dataJson.vipetime,
									ready: function () {},
                                });
                            } else {
                                $('#vipetime').val('??????');
                            }
						});


                   	} else {
                       	parent.layer.msg('?????????????????????',2,8);
                   	}
                   	form.render('select');
               	});
           	});
		});

		$(document).ready(function(){
			$.get("index.php?m=admin_company&c=companyNum", function(data) {
				var datas = eval('(' + data + ')');
				if(datas.companyAllNum) {
					$('.ajaxcompanyall').html(datas.companyAllNum);
				}
				if(datas.companyStatusNum1) {
					$('.ajaxcompanystatus1').html(datas.companyStatusNum1);
				}
				if(datas.companyStatusNum2) {
					$('.ajaxcompanystatus2').html(datas.companyStatusNum2);
				}
				if(datas.companyStatusNum3) {
					$('.ajaxcompanystatus3').html(datas.companyStatusNum3);
				}
			});
		});

		function xlsAll(form){
			for (var i=0;i<form.elements.length;i++){
				var e = form.elements[i];
				if (e.name == 'type[]' && e.disabled == false){
					e.checked = form.xlsAllCheck.checked;
				}
			}
			for (var i=0;i<form.elements.length;i++){
				var e = form.elements[i];
				if (e.name == 'rtype[]' && e.disabled == false){
					e.checked = form.xlsAllCheck.checked;
				}
			}
		}

		//????????????
		function batch(name){
			var chk_value =[];

			$('input[name="'+name+'"]:checked').each(function(){
				chk_value.push($(this).val());
			});

			if(chk_value.length==0){
				layer.msg("????????????????????????????????????",2,8);return false;
			}else{

				$('#btachuid').val(chk_value);
				$.layer({
					type : 1,
					title : '????????????',
					closeBtn : [ 0, true ],
					offset : [ '80px', '' ],
					border : [ 10, 0.3, '#000', true ],
					area : [ '350px', '235px' ],
					page : {
						dom : '#batchrezhen'
					}
				});
			}
		}

		function toMember(url, usertype){
			if (usertype !='2'){
				if(usertype == '0'){
					parent.layer.confirm("????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????", function() {
						parent.layer.closeAll();
						window.open(url);
					});
				}else{
					if(usertype == '1'){
						var u = '?????????';
					}
					parent.layer.confirm("????????????????????????"+u+"???????????????????????????????????????????????????????????????????????????????????????????????????", function() {
						parent.layer.closeAll();
						window.open(url);
					});
				}
			}else{
				window.open(url);
			}
		}

		var setval,
			setwout;
		// ??????????????????????????????????????????????????????
		function showQrcode(comid,wxid){
			if(wxid == ''){
				var pytoken = $("#pytoken").val();
				loadlayer();
				$.post('index.php?m=admin_company&c=comcert&acwxbind=1', {
						comid: comid,
						pytoken: pytoken
					}, function(data) {
						parent.layer.closeAll('loading');
						if(data == 0) {
							$('#wx_login_qrcode').html('?????????????????????..');
						} else {
							$('#wx_login_qrcode').html('<img src="' + data + '" width="140" height="140">');
							setval = setInterval(function(){
								$.post('index.php?m=admin_company&c=getacbindstatus', {
									comid: comid,
									pytoken: pytoken
								}, function(data) {
									var data = eval('(' + data + ')');
									if(data.msg != '') {
										clearInterval(setval);
										setval = null;
										layer.msg(data.msg, 2, 9, function() {
											window.location.reload();
										});
									}
								});
							}, 2000);
							if(setwout){
								clearTimeout(setwout);
								setwout = null;
							}
							setwout = setTimeout(function(){
								if(setval){
									clearInterval(setval);
									setval = null;
								}
								var wx_sx = $("#wx_sx").html();
								$('#wx_login_qrcode').html(wx_sx);
							},300*1000);
						}
						$.layer({
							type: 1,
							title: '??????????????????',
							closeBtn: [0, true],
							offset: ['100px', ''],
							border: [10, 0.3, '#000', true],
							area: ['300px', '300px'],
							page: {
								dom: "#acwxbind"
							},
							close: function(){
								if(setval){
									clearInterval(setval);
									setval = null;
								}
								if(setwout){
									clearTimeout(setwout);
									setwout = null;
								}
							}
						});
					});
			}else{
				layer.msg('?????????????????????',2,9);
			}
		}

		/* ??????Logo Start */
		function makeLogo(uid, short, name, type) {

			$('#logoUid').val(uid);

			if (short != '' && short != undefined){

				$('#logoComName').val(short);
			}else{

				$('#logoComName').val(name);
			}

			if (type == 1){

				$('.logo_box_bth').val('??????');
			}else if(type==2){

				$('.logo_box_bth').val('??????');
			}

			var btn = document.getElementsByClassName('adminupload')[0];
			btn.setAttribute ('lay-data', "{path: 'company',usertype: 2, uid: "+uid+", imgid: 'logo'}");

			$.layer({
				type : 1,
				title : '??????LOGO',
				closeBtn : [ 0, true ],
				offset : [ '80px', '' ],
				border : [ 10, 0.3, '#000', true ],
				area : [ '450px', 'auto' ],
				page : {
					dom : '#logoHb'
				},
				close: function(){
					window.location.reload();
				}
			});
		}

		$(function() {
			var switchtag = $("ul#logo_ul li");
			switchtag.click(function() {
				$(this).addClass("curr").siblings().removeClass("curr");
				var index = this.getAttribute('data-id');
				$(".logo_box").addClass('none');
				$(".logo_" + index).removeClass('none');
			});

			var switchImg = $("ul#hb_ul li");
			switchImg.click(function() {
				$(this).addClass("logo_box_img_cur").siblings().removeClass("logo_box_img_cur");
				var index = this.getAttribute('data-hb');
				$('#logoBg').val(index);
			});
		})

		function previewLogoHb() {

			var name = $('#logoComName').val();
			var bg = $('#logoBg').val();

			if (name == ''){

				layer.msg('????????????????????????',2,8);
				return false;
			}else if (name.length < 2 || name.length > 4){

				layer.msg('?????????2-4??????',2,8);
				return false;
			}else if(bg == ''){

				layer.msg('?????????????????????',2,8);
				return false;
			}

			loadlayer('?????????');

			var weburl = '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
';
			const url   =   weburl + '/index.php?m=ajax&c=getLogoHb&name=' + name +'&hb=' + bg;

			setTimeout(function () {

				parent.layer.closeAll('loading');
				layer.open({
					type: 1,
					title: false,
					content: '<div><img src="' + url + '" style="max-width: 100%;"></div>',
					area: ['200px', '200px'],
					offset: '155px',
					closeBtn: 0,
					shadeClose: true
				});
			}, 1000);

		}

		function makeLogoHb() {

			var name = $('#logoComName').val();
			var bg = $('#logoBg').val();


			if (name == ''){

				layer.msg('????????????????????????',2,8);
				return false;
			}else if (name.length < 2 || name.length > 4){

				layer.msg('?????????2-4??????',2,8);
				return false;
			}else if(bg == ''){

				layer.msg('?????????????????????',2,8);
				return false;
			}

			loadlayer('?????????');

			var weburl = '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
';
			const url   =   weburl + '/index.php?m=ajax&c=getLogoHb&name='+name+'&hb='+bg+'&out=1';
			$.get(url, function(data) {

				if (data){
					setLogo(data);
				}else{
					parent.layer.closeAll();
					parent.layer.msg('??????LOGO??????',2, 8);
					return false;
				}
			});
		}

		function setLogo(logo) {

			var uid = $('#logoUid').val();
			var formdata = new FormData();
			formdata.append('logo',logo);
			formdata.append('uid',uid);
			formdata.append('pytoken',$("#pytoken").val());

			$.ajax({
				url:  'index.php?m=admin_company&c=setLogo',
				type:'post',
				processData:false,
				contentType:false,
				data: formdata,
				success:function (res) {
					var data=eval('('+res+')');
					parent.layer.closeAll();
					parent.layer.msg(data.msg,2, data.errcode, function () {
						window.location.reload();
					});
				}
			})
		}
		/* ??????Logo End */

		/*???????????? Start*/
		function twtaskall(){
			var nowTime = parseInt(new Date().getTime()/1000);
			var codearr = "";
			var lastupdate = '';
			var twTip = '';
			var statusMsg = '';

			$(".check_all:checked").each(function() {

				if (codearr == "") {
					codearr = $(this).val();
				} else {
					codearr = codearr + "," + $(this).val();
				}

				lastupdate = Number($(this).attr('data-lastupdate'));

				if(twTip=='' && nowTime-lastupdate>60*60*24*7){
					twTip = '????????????????????????7??????????????????????????????????????????';
				}

				if ($(this).attr('data-r_status') == '0') {
					statusMsg = '?????????';
				}
				if ($(this).attr('data-r_status') == '2') {
					statusMsg = '?????????';
				}
				if ($(this).attr('data-r_status') == '3') {
					statusMsg = '?????????';
				}
				if ($(this).attr('data-r_status') == '4') {
					statusMsg = '?????????';
				}
			});
			if(statusMsg!=''){
				var msg = '??????????????????????????????????????????????????????';
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

				$('#twtask_uid').val(codearr);
				$('#twname').hide();
				$('#twtask_name').text('');
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

		function addTuiWenTask(id,name,lastupdate){

			var nowTime = parseInt(new Date().getTime()/1000);
			lastupdate = Number(lastupdate);

			var twTip = '';
			if(nowTime-lastupdate>60*60*24*7){
				twTip = '???????????????7??????????????????????????????????????????';
			}

			if(twTip!=''){
				$('#twTip').text(twTip);
				$('#twTip').show();
			}else{
				$('#twTip').text('');
				$('#twTip').hide();
			}

			$('#twtask_uid').val(id);
			$('#twtask_name').text(name);
			$('#twname').show();
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
					twtask_uid = $("#twtask_uid").val(),
					twtask_content = $("#twtask_content").val(),
					twtask_urgent = $("#twtask_urgent").val(),
					twtask_wcmoments = $("#twtask_wcmoments").val(),
					twtask_gzh = $("#twtask_gzh").val();

			var param = {
				twtask_uid: twtask_uid,
				twtask_content: twtask_content,
				twtask_urgent: twtask_urgent,
				twtask_wcmoments: twtask_wcmoments,
				twtask_gzh: twtask_gzh,
				pytoken: pytoken
			};

			$.post("index.php?m=admin_company&c=addTuiWenTask",param, function(data) {

				layer.closeAll();

				var data = eval("(" + data + ")");

				parent.layer.msg(data.msg,2,data.code);
			});
		}
		/*???????????? End*/
	<?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui.upload.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" type='text/javascript'><?php echo '</script'; ?>
>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['adminstyle']->value)."/checkdomain.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body>
</html>
<?php }} ?>
