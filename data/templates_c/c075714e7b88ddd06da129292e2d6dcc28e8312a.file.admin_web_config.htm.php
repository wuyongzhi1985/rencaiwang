<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 13:49:41
         compiled from "D:\www\www\phpyun\app\template\admin\admin_web_config.htm" */ ?>
<?php /*%%SmartyHeaderCode:94003811562e223751416b4-15191124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c075714e7b88ddd06da129292e2d6dcc28e8312a' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_web_config.htm',
      1 => 1650462146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94003811562e223751416b4-15191124',
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
  'unifunc' => 'content_62e223751a0491_77923762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e223751a0491_77923762')) {function content_62e223751a0491_77923762($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
 src="../js/jquery-1.8.0.min.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
		<link href="../js/layui/css/layui.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
		<?php echo '<script'; ?>
 src="../js/layui/layui.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="../js/layui/phpyun_layer.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/admin_public.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" type="text/javascript"><?php echo '</script'; ?>
>
		<title>????????????</title>
	</head>
	<body class="body_ifm">
		<div class="infoboxp">

			<div class="main_tag">

				<div class="tabs_info">
					<ul>
						<li class="on">????????????</li>
						<li>????????????</li>
						<li>???????????????</li>
						<li>??????LOGO</li>
						<li>????????????</li>
						<li>????????????</li>
						<li>????????????</li>
					</ul>
				</div>
				<div class="admin_new_tip">
					<a href="javascript:;" class="admin_new_tip_close"></a>
					<a href="javascript:;" class="admin_new_tip_open" style="display:none;"></a>
					<div class="admin_new_tit"><i class="admin_new_tit_icon"></i>????????????</div>
					<div class="admin_new_tip_list_cont">
						<div class="admin_new_tip_list">????????????????????????????????????????????????????????????LOGO?????????????????????????????????????????????????????????</div>
						<div class="admin_new_tip_list">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</div>
					</div>
				</div>
				<div class="clear"></div>
				<div style="height:10px;"></div>



				<div class="tag_box tty_xitongshezhi">

					<div>
						<form class="layui-form">

							<div class="layui-form-item">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_webname" id="sy_webname" placeholder="?????????????????????" autocomplete="off" class="layui-input" type="text"
									 value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
" size="63" />
								</div>
								<div class="layui-form-mid layui-word-aux">??????hr?????????</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_weburl" id="sy_weburl" placeholder="?????????????????????" autocomplete="off" class="layui-input" type="text"
									 value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
" size="63" />
								</div>
								<div class="layui-form-mid layui-word-aux">??????http://www.hr135.com</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-block">
									<input type="checkbox" name="sy_web_online" lay-skin="switch" lay-text="??????|??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_web_online']=="1") {?> checked <?php }?> />
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">??????????????????????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_listnum" id="sy_listnum" placeholder="???????????????????????????" autocomplete="off" class="layui-input" type="text"
									 value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_listnum'];?>
" size="63" />
								</div>
								<span style="line-height:38px; display:inline-block">???</span>
							</div>
							<div class="layui-form-item layui-form-text">
								<label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-inline t_w480">
									<textarea name="sy_webclose" id="sy_webclose" class="web_text_textarea" placeholder="???????????????????????????"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webclose'];?>
</textarea>
								</div>
							</div>
							<div class="layui-form-item layui-form-text">
								<label class="layui-form-label">??????????????????</label>
								<div class="layui-input-inline t_w480">
									<textarea name="sy_webkeyword" id="sy_webkeyword" rows="3" cols="50" class="web_text_textarea" placeholder="????????????????????????"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webkeyword'];?>
</textarea>
									<span class="admin_web_tip">??????????????????????????????????????????????????????????????????-???SEO??????????????????</span>
								</div>
							</div>
							<div class="layui-form-item layui-form-text">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-inline t_w480">
									<textarea name="sy_webmeta" id="sy_webmeta" class="web_text_textarea" placeholder="?????????????????????"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webmeta'];?>
</textarea>
									<span class="admin_web_tip">??????????????????????????????????????????????????????????????????-???SEO????????????</span>
								</div>
							</div>
							<div class="layui-form-item layui-form-text">
								<label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-inline t_w480">
									<textarea name="sy_webcopyright" id="sy_webcopyright" placeholder="???????????????????????????" class="web_text_textarea"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['sy_webcopyright']);?>
</textarea>
									<span class="admin_web_tip">??????????? ???????????????</span>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">??????EMAIL???</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_webemail" id="sy_webemail" placeholder="???????????????EMAIL" autocomplete="off" class="layui-input"
									 type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webemail'];?>
" size="63" />
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_webmoblie" id="sy_webmoblie" placeholder="?????????????????????" autocomplete="off" class="layui-input" type="text"
									 value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webmoblie'];?>
" size="63" />
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_webtel" id="sy_webtel" placeholder="?????????????????????" autocomplete="off" class="layui-input" type="text"
									 value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webtel'];?>
" size="63" />
								</div>
								<div class="layui-form-mid layui-word-aux">??????021-61190281</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">ICP????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_webrecord" id="sy_webrecord" placeholder="?????????ICP?????????" autocomplete="off" class="layui-input" type="text"
									 value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webrecord'];?>
" size="63" />
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">??????????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_websecord" id="sy_websecord" placeholder="????????????????????????" autocomplete="off" class="layui-input" type="text"
										   value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_websecord'];?>
" size="63" />
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">ICP????????????????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_perfor" id="sy_perfor" placeholder="?????????ICP?????????????????????" autocomplete="off" class="layui-input" type="text"
										   value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_perfor'];?>
" size="63" />
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">????????????????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_hrlicense" id="sy_hrlicense" placeholder="??????????????????????????????" autocomplete="off" class="layui-input" type="text"
										   value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_hrlicense'];?>
" size="63" />
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_freewebtel" id="sy_freewebtel" placeholder="?????????????????????" autocomplete="off" class="layui-input"
									 type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
" size="63" />
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_comwebtel" id="sy_comwebtel" placeholder="???????????????????????????" autocomplete="off" class="layui-input"
									 type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_comwebtel'];?>
" size="63" />
								</div>
								<div class="layui-form-mid layui-word-aux">???????????????????????????????????????????????????????????????????????????????????????</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_worktime" id="sy_worktime" placeholder="?????????????????????" autocomplete="off" class="layui-input" type="text"
									 value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_worktime'];?>
" size="63" />
								</div>
								<div class="layui-form-mid layui-word-aux">??????????????? 9:00-18:00</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">??????QQ???</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_qq" id="sy_qq" placeholder="???????????????QQ" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_qq'];?>
"
									 size="63" />
									<span class="admin_web_tip">???????????????????????????????????????</span>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_webadd" id="sy_webadd" placeholder="?????????????????????" autocomplete="off" class="layui-input" type="text"
									 value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webadd'];?>
" size="63" />
								</div>
								<div class="layui-form-mid layui-word-aux">??????????????????????????????????????????14A???</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-inline t_w480">
									<textarea name="sy_webtongji" id="sy_webtongji" placeholder="?????????????????????" class="web_text_textarea"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webtongji'];?>
</textarea>
								</div>
							</div>
							<div class="layui-form-item layui-form-text tty_form_btn" style="padding-left: 180px;">
								<input class="tty_sub layui-btn" id="config" type="button" name="config" value="??????" />&nbsp;&nbsp;
								<input class="tty_cz layui-btn" type="reset" value="??????" />
							</div>

						</form>
					</div>

					<div class="hiddendiv">
						<form class="layui-form">
							<div class="layui-form-item">
								<label class="layui-form-label">??????????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_safekey" id="sy_safekey" placeholder="????????????????????????" autocomplete="off" class="layui-input" type="text"
									 value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_safekey'];?>
" size="63" />
								</div>
								<span class="admin_web_tip">?????????????????????????????????????????????986jhgyutw.*x</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">CSRF?????????</label>
								<div class="layui-input-block">
									<input type="checkbox" name="sy_iscsrf" lay-skin="switch" lay-text="??????|??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_iscsrf']=="1") {?>
									 checked <?php }?> />
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-block">
									<input type="checkbox" name="sy_istemplate" lay-skin="switch" lay-text="??????|??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_istemplate']=="1") {?> checked <?php }?> />
								</div>
							</div>
							<div class="layui-form-item layui-form-text">
								<label class="layui-form-label">??????????????????</label>
								<div class="layui-input-inline">
									<textarea name="sy_fkeyword" id="sy_fkeyword" class="web_text_textarea"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_fkeyword'];?>
</textarea>
								</div>
								<span class="admin_web_tip">????????????,??????</span>
							</div>
							<div class="layui-form-item layui-form-text">
								<label class="layui-form-label">????????????????????????</label>
								<div class="layui-input-inline">
									<textarea name="sy_fkeyword_all" id="sy_fkeyword_all" class="web_text_textarea"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_fkeyword_all'];?>
</textarea>
								</div>
								<span class="admin_web_tip">????????????????????????</span>
							</div>
							<div class="layui-form-item layui-form-text">
								<label class="layui-form-label">USER_AGENT?????????</label>
								<div class="layui-input-inline">
									<textarea name="sy_useragent" id="sy_useragent" class="web_text_textarea"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_useragent'];?>
</textarea>
								</div>
								<span class="admin_web_tip">?????????????????????????????????HTTP_USER_AGENT????????????????????????????????????????????????CC??????</span>
							</div>
							<div class="layui-form-item layui-form-text">
								<label class="layui-form-label">??????IP?????????</label>
								<div class="layui-input-inline">
									<textarea id="sy_bannedip" name="sy_bannedip" class="web_text_textarea"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_bannedip'];?>
</textarea>
								</div>
								<span class="admin_web_tip">??????127.0.0.1|192.168.1.1</span>
							</div>
							<div class="layui-form-item layui-form-text">
								<label class="layui-form-label">??????IP???????????????</label>
								<div class="layui-input-inline">
									<textarea name="sy_bannedip_alert" id="sy_bannedip_alert" class="web_text_textarea"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_bannedip_alert'];?>
</textarea>
								</div>
								<span class="admin_web_tip">??????????????????</span>
							</div>
							<div class="layui-form-item layui-form-text tty_form_btn" style="padding-left: 180px;">
								<input class="layui-btn tty_sub" id="otherconfig" type="button" name="otherconfig" value="??????" />&nbsp;&nbsp;
								<input class="layui-btn tty_cz" type="reset" value="??????" />
							</div>

						</form>
					</div>

					<div class="hiddendiv">
						<form class="layui-form">

							<div class="layui-form-item">
								<label class="layui-form-label">????????????????????????</label>
								<div class="layui-input-block">
									<input name="code_web" title="????????????" value="????????????" <?php if (strstr($_smarty_tpl->tpl_vars['config']->value['code_web'],'????????????')) {?> checked <?php }?>
									 type="checkbox" />
									<input name="code_web" title="????????????" value="????????????" <?php if (strstr($_smarty_tpl->tpl_vars['config']->value['code_web'],'????????????')) {?> checked <?php }?>
									 type="checkbox" />
									<input name="code_web" title="????????????" value="????????????" <?php if (strstr($_smarty_tpl->tpl_vars['config']->value['code_web'],'????????????')) {?> checked <?php }?>
									 type="checkbox" />
									<input name="code_web" title="????????????" value="????????????" <?php if (strstr($_smarty_tpl->tpl_vars['config']->value['code_web'],'????????????')) {?> checked <?php }?>
									type="checkbox" />
									<input name="code_web" title="????????????" value="????????????" <?php if (strstr($_smarty_tpl->tpl_vars['config']->value['code_web'],'????????????')) {?> checked <?php }?>
									 type="checkbox" />
									<input name="code_web" title="????????????" value="????????????" <?php if (strstr($_smarty_tpl->tpl_vars['config']->value['code_web'],'????????????')) {?> checked <?php }?>
									 type="checkbox" />
									<input name="code_web" title="????????????" value="????????????" <?php if (strstr($_smarty_tpl->tpl_vars['config']->value['code_web'],'????????????')) {?> checked <?php }?>
									 type="checkbox" />
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">??????????????????</label>
								<div class="layui-input-block">
									<input name="code_kind" value="1" title="???????????????" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']=="1") {?> checked <?php }?>
									 type="radio" />
									<input name="code_kind" value="4" title="????????????????????????" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']=="4") {?> checked <?php }?>type="radio"/>
									<input name="code_kind" value="5" title="???????????????vaptcha???" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']=="5") {?> checked <?php }?>
									 type="radio" />
									 <input name="code_kind" value="3" title="?????????????????????" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']=="3") {?> checked <?php }?>
									 type="radio" />
								</div>
							</div>
							<div class="layui-form-item character" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']!="1") {?>style="display:none;"<?php }?>>
							 <label class="layui-form-label">??????????????????????????????</label>
								<div class="layui-input-block">
									<input name="code_type" value="1" title="??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_type']=="1") {?> checked <?php }?>
									 type="radio" />
									<input name="code_type" value="2" title="??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_type']=="2") {?> checked <?php }?>
									 type="radio" />
									<input name="code_type" value="3" title="??????+??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_type']=="3") {?> checked <?php }?>
									 type="radio" />
								</div>
							</div>
							<div class="layui-form-item character" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']!="1") {?>style="display:none;"<?php }?>>
							 <label class="layui-form-label">??????????????????????????????</label>
								<div class="layui-input-block">
									<input name="code_filetype" value="jpg" title="JPG" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_filetype']=="jpg") {?> checked
									 <?php }?> type="radio" />
									<input name="code_filetype" value="png" title="PNG" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_filetype']=="png") {?> checked
									 <?php }?> type="radio" />
									<input name="code_filetype" value="gif" title="GIF" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_filetype']=="gif") {?> checked
									 <?php }?> type="radio" />
								</div>
							</div>
							<div class="layui-form-item character" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']!="1") {?>style="display:none;"<?php }?>>
							 <label class="layui-form-label">????????????????????????</label>
								<div class="layui-input-block">
									<span>??????</span>
									<input class="input-text" type="text" name="code_width" id="code_width" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['code_width'];?>
"
									 size="10" maxlength="255" />px&nbsp;&nbsp;
									<span style="margin-left: 30px;">??????</span>
									<input class="input-text" type="text" name="code_height" id="code_height" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['code_height'];?>
"
									 size="10" maxlength="255" />px
								</div>
							</div>
							<div class="layui-form-item character" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']!="1") {?>style="display:none;"<?php }?>>
							 <label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-inline t_w480">
									<input class="layui-input" type="text" name="code_strlength" id="code_strlength" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['code_strlength'];?>
"
									 size="10" maxlength="1" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" />
								</div>
								<span class="admin_web_tip">??????????????????????????????4</span>
							</div>
							<div class="layui-form-item dingxiang" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']!="4") {?>style="display:none;"<?php }?>>
							 <label class="layui-form-label">??????appId???</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_dxappid" id="sy_dxappid" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_dxappid'];?>
"
									 size="60" maxlength="255" />
								</div>
								<span class="admin_web_tip">
									???????????????<a href='https://user.dingxiang-inc.com/user/register' target='_blank'>https://www.dingxiang-inc.com</a>
								</span>
							</div>
							<div class="layui-form-item dingxiang" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']!="4") {?>style="display:none;"<?php }?>>
							 <label class="layui-form-label">??????appSecret???</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_dxappsecret" id="sy_dxappsecret" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_dxappsecret'];?>
"
									 size="60" maxlength="255" />
								</div>
								<span class="admin_web_tip">
									???????????????<a href='https://user.dingxiang-inc.com/user/register' target='_blank'>https://www.dingxiang-inc.com</a>
								</span>
							</div>
							<div class="layui-form-item vaptcha" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']!="5") {?>style="display:none;"<?php }?>>
							 <label class="layui-form-label">VID???</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_vaptcha_vid" id="sy_vaptcha_vid" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_vaptcha_vid'];?>
"
									 size="60" maxlength="255" />
								</div>
								
								<span class="admin_web_tip">
									???????????????<a href='https://www.vaptcha.com' target='_blank'>https://www.vaptcha.com</a>
								</span>
							</div>
							<div class="layui-form-item vaptcha" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']!="5") {?>style="display:none;"<?php }?>>
							 <label class="layui-form-label">KEY???</label>
								
								<div class="layui-input-inline t_w480">
									<input name="sy_vaptcha_key" id="sy_vaptcha_key" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_vaptcha_key'];?>
"
									 size="60" maxlength="255" />
								</div>
								
							</div>
							<div class="layui-form-item geetest" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']!="3") {?>style="display:none;"<?php }?>>
							 <label class="layui-form-label">??????ID???</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_geetestid" id="sy_geetestid" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_geetestid'];?>
"
									 size="60" maxlength="255" />
								</div>
								<span class="admin_web_tip">
									???????????????<a href='http://www.geetest.com/' target='_blank'>http://www.geetest.com/</a>
								</span>
							</div>
							<div class="layui-form-item geetest" <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']!="3") {?>style="display:none;"<?php }?>>
							 <label class="layui-form-label">??????KEY???</label>
								<div class="layui-input-inline t_w480">
									<input name="sy_geetestkey" id="sy_geetestkey" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_geetestkey'];?>
"
									 size="60" maxlength="255" />
								</div>
								<span class="admin_web_tip">
									???????????????<a href='http://www.geetest.com/' target='_blank'>http://www.geetest.com/</a>
								</span>
							</div>
							<div class="layui-form-item layui-form-text tty_form_btn" style="padding-left: 180px;">
								<input class="layui-btn tty_sub" id="codeconfig" type="button" name="codeconfig" value="??????" />&nbsp;&nbsp;
								<input class="layui-btn tty_cz" type="reset" value="??????" />
							</div>

						</form>
					</div>

					<div class="hiddendiv">
						<iframe id="supportiframe" name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
						<form class="layui-form" action="index.php?m=config&c=save_logo" method="post" enctype="multipart/form-data" target="supportiframe">
							
							<div class="layui-form-item">
								<label class="layui-form-label">??????LOGO???</label>
								<div class="layui-input-inline t_w480">
									
									
									<button type="button" class="yun_bth_pic adminupload" lay-data="{name: 'sy_logo',imgid: 'imglogo',path: 'logo',source:'back'}">????????????</button>
									<input type="hidden" id="layupload_type" value="2" />
									<img id="imglogo" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_logo'];?>
" style="max-width:300px;" <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_logo']) {?>class="none"<?php }?>>
									<div class="layui-form-mid layui-word-aux" style="font-size: 12px;">300px X 45px</div>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">??????????????????LOGO???</label>
								<div class="layui-input-inline t_w480">
									
									
									<button type="button" class="yun_bth_pic adminupload" lay-data="{name: 'sy_member_logo',imgid: 'imgmember',path: 'logo',path: 'logo',source:'back'}">????????????</button>
									<img id="imgmember" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_logo'];?>
" style="max-width:300px;"
									 <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_member_logo']) {?>class="none"<?php }?>>
									<div class="layui-form-mid layui-word-aux" style="font-size: 12px;">300px X 45px</div>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">??????????????????LOGO???</label>
								<div class="layui-input-inline t_w480">
									
									<button type="button" class="yun_bth_pic adminupload" lay-data="{name: 'sy_unit_logo',imgid: 'imgunit',path: 'logo',source:'back'}">????????????</button>
									<img id="imgunit" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_unit_logo'];?>
" style="max-width:300px;"
									 <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_unit_logo']) {?>class="none"<?php }?>>
									<div class="layui-form-mid layui-word-aux" style="font-size: 12px;">300px X 45px</div>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">??????LOGO???</label>
								<div class="layui-input-inline t_w480">
									
									<button type="button" class="yun_bth_pic adminupload" lay-data="{name: 'sy_wap_logo',imgid: 'imgwaplogo',path: 'logo',source:'back'}">????????????</button>
									<img id="imgwaplogo" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wap_logo'];?>
" style="max-width:300px;"
									 <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_wap_logo']) {?>class="none"<?php }?>>
									<div class="layui-form-mid layui-word-aux" style="font-size: 12px;">300px X 45px</div>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">WAP????????????</label>
								<div class="layui-input-inline t_w480">
									
									
									<button type="button" class="yun_bth_pic adminupload" lay-data="{name: 'sy_wap_qcode',imgid: 'imgwapqcode',path: 'logo',source:'back'}">????????????</button>
									<img id="imgwapqcode" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wap_qcode'];?>
" style="max-width:100px;"
									 <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_wap_qcode']) {?>class="none"<?php }?>>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">android????????????</label>
								<div class="layui-input-inline t_w480">
									
									
									<button type="button" class="yun_bth_pic adminupload" lay-data="{name: 'sy_androidu_qcode',imgid: 'imgandroid',path: 'logo',source:'back'}">????????????</button>
									<img id="imgandroid" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_androidu_qcode'];?>
" style="max-width:100px;"
									 <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_androidu_qcode']) {?>class="none"<?php }?>>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">IOS????????????</label>
								<div class="layui-input-inline t_w480">
									
									<button type="button" class="yun_bth_pic adminupload" lay-data="{name: 'sy_iosu_qcode',imgid: 'imgios',path: 'logo',source:'back'}">????????????</button>
									<img id="imgios" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_iosu_qcode'];?>
" style="max-width:100px;"
									 <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_iosu_qcode']) {?>class="none"<?php }?>>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-inline t_w480">
									
									<button type="button" class="yun_bth_pic adminupload" lay-data="{name: 'sy_zph_icon',imgid: 'imgzph',path: 'logo',source:'back'}">????????????</button>
									<img id="imgzph" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_zph_icon'];?>
" style="max-width:100px;"
									 <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_zph_icon']) {?>class="none"<?php }?>>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">??????????????????</label>
								<div class="layui-input-inline t_w480">
									
									<button type="button" class="yun_bth_pic adminupload" lay-data="{name: 'sy_zphbanner_icon',imgid: 'imgzphbanner',path: 'logo',source:'back'}">????????????</button>
									<img id="imgzphbanner" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_zphbanner_icon'];?>
" style="max-width:100px;"
									 <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_zphbanner_icon']) {?>class="none"<?php }?>>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">??????????????????</label>
								<div class="layui-input-inline t_w480">
									
									
									<button type="button" class="yun_bth_pic adminupload" lay-data="{name: 'sy_cplogo',imgid: 'cpimglogo',path: 'logo',source:'back'}">????????????</button>
									<img id="cpimglogo" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_cplogo'];?>
" style="max-width:100px;"
									 <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_cplogo']) {?>class="none"<?php }?>>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">??????????????????</label>
								<div class="layui-input-inline t_w480">
									
									
									<button type="button" class="yun_bth_pic adminupload" lay-data="{name: 'sy_gongzhaologo',imgid: 'gongzhaologo',path: 'logo',source:'back'}">????????????</button>
									<img id="gongzhaologo" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_gongzhaologo'];?>
" style="max-width:100px;"
									 <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_gongzhaologo']) {?>class="none"<?php }?>>
									<div class="layui-form-mid layui-word-aux" style="font-size: 12px;">410px X 170px</div>
								</div>
							</div>
							<div class="layui-form-item layui-form-text tty_form_btn" style="padding-left: 180px;">
								<input class="layui-btn tty_sub" type="submit" name="waterconfig" value="??????" />&nbsp;&nbsp;
								<input class="layui-btn tty_cz" type="reset" value="??????" />
							</div>
							

							<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
						</form>
					</div>

					<div class="hiddendiv">
						<form class="layui-form">
							
							<div class="layui-form-item">
								<label class="layui-form-label">IP????????????????????????</label>
								<div class="layui-input-block">
									<input name="map_tocity" value="1" title="??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['map_tocity']=="1") {?> checked <?php }?>
									 type="radio" />
									<input name="map_tocity" value="2" title="??????????????????" <?php if ($_smarty_tpl->tpl_vars['config']->value['map_tocity']=="2") {?> checked <?php }?>
									 type="radio" />
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">????????????KEY???</label>
								<div class="layui-input-inline t_w480">
									<input name="map_key" id="map_key" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['map_key'];?>
"
									 size="60" maxlength="255" />
								</div>
								<a href="http://lbsyun.baidu.com/apiconsole/key?application=key" target="_blank" class="set_bth" style=" float:left; margin-top:8px; margin-right:10px;">????????????</a> 
								<span class="admin_web_tip">
							???????????????1.5
								</span>
							</div>
							<div class="layui-form-item">
							 <label class="layui-form-label">???????????????</label>
								<div class="layui-input-block">
									<div class="layui-input-inline">
										<input class="input-text" type="text" name="map_x" id="map_x" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['map_x'];?>
" size="20" maxlength="255" placeholder="X??????" style="width: 130px; padding-left: 50px;"/>
										<span class="admin_comclass_add_n_dw" style="height: 36px; top: 1px; left: 0;border-right: 1px solid #dcdee2;">X</span>
									</div>
									<div class="layui-input-inline">
										<input class="input-text" type="text" name="map_y" id="map_y" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['map_y'];?>
" size="20" maxlength="255" placeholder="Y??????" style="width: 130px; padding-left: 50px;"/>
										<span class="admin_comclass_add_n_dw" style="height: 36px; top: 1px; left: 0;border-right: 1px solid #dcdee2;">Y</span>
									</div>
									
									<a href="javascript:;" id="getclick" class="set_bth"style=" float:left; margin-top:10px; margin-left:5px;">????????????</a>
								</div>
							</div>
							
							<div class="layui-form-item" id="getmapxy" style="display:none;" class="admin_table_trbg">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-block" style=" position:relative; z-index:0px;width: 850px;left: 180px;top: -35px;">
									<div id="map_container" style="width:100%;height:300px; position:relative; z-index:1"></div>
								</div>
							</div>
							
							
							
							<div class="layui-form-item layui-form-text tty_form_btn" style="padding-left: 180px;">
								<input class="layui-btn tty_sub" id="mapconfig" type="button" name="mapconfig" value="??????" />&nbsp;&nbsp;
								<input class="layui-btn tty_cz" type="reset" value="??????" /></td>
							</div>
							
							
						</form>
					</div>

					<div class="hiddendiv">
						<form class="layui-form">
							
							<div class="layui-form-item">
								<label class="layui-form-label">Memcache?????????</label>
								<div class="layui-input-inline">
									<input type="checkbox" name="ismemcache" lay-skin="switch" lay-text="??????|??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['ismemcache']=="1") {?> checked <?php }?> />
								</div>
								<span class="admin_web_tip">?????????????????????????????????Memcache,????????????????????????</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">Memcache????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="memcachehost" id="memcachehost3" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['memcachehost'];?>
"
									 size="60" maxlength="255" />
								</div>
								<span class="admin_web_tip">?????????IP?????????127.0.0.1</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">Memcache?????????</label>
								<div class="layui-input-inline t_w480">
									<input name="memcacheport" id="memcacheport3" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['memcacheport'];?>
"
									 size="60" maxlength="255" />
								</div>
								<span class="admin_web_tip">??????11211</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">Memcache???????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="memcachetime" id="memcachetime" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['memcachetime'];?>
"
									 size="60" maxlength="255" />
								</div>
								<span class="admin_web_tip">????????????,?????????3600???</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-block t_w480">
									<input type="checkbox" name="webcache" lay-skin="switch" lay-text="??????|??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['webcache']=="1") {?>
									 checked <?php }?> />
									 <a href="?m=config&amp;c=settplcache" class="set_bth">??????????????????</a>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="webcachetime" id="webcachetime" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['webcachetime'];?>
"
									 size="60" maxlength="255" />
								</div>
								<span class="admin_web_tip">????????????,?????????3600???</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">smarty?????????</label>
								<div class="layui-input-block t_w480">
									<input type="checkbox" name="issmartycache" lay-skin="switch" lay-text="??????|??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['issmartycache']=="1") {?> checked <?php }?> />
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">smarty???????????????</label>
								<div class="layui-input-inline t_w480">
									<input name="smartycachetime" id="smartycachetime" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smartycachetime'];?>
"
									 size="60" maxlength="255" />
								</div>
								<span class="admin_web_tip">????????????,?????????3600???</span>
							</div>
							<div class="layui-form-item layui-form-text tty_form_btn" style="padding-left: 180px;">
								<input class="layui-btn tty_sub" id="cacheconfig" type="button" name="mapconfig" value="??????" />&nbsp;&nbsp;
								<input class="layui-btn tty_cz" type="reset" value="??????" /></td>
							</div>
							
						</form>
					</div>

					<div class="hiddendiv tty_uploadsz">
						<form class="layui-form">
							
							<div class="layui-form-item">
								<label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-inline t_w250">
									<input name="pic_maxsize" id="pic_maxsize" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['pic_maxsize'];?>
"
									 size="30" />
								</div>
								<span style="line-height:38px; display:inline-block">M</span>
								<span class="admin_web_tip" style="margin-left: 20px;">????????????????????????????????????????????? M??????????????????5M</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-inline t_w250">
									<input name="file_maxsize" id="file_maxsize" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['file_maxsize'];?>
"
									 size="30" />
								</div>
								<span style="line-height:38px; display:inline-block">M</span>
								<span class="admin_web_tip" style="margin-left: 20px;">????????????????????????????????????????????? M??????????????????5M</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-inline t_w250">
									<input name="pic_type" id="pic_type" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['pic_type'];?>
"
									 size="30" />
								</div>
								<span class="admin_web_tip">????????????????????????????????????????????????????????????,???????????????????????????jpg,png,jpeg,bmp,gif</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-inline t_w250">
									<input name="file_type" id="file_type" autocomplete="off" class="layui-input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['file_type'];?>
"
									 size="30" />
								</div>
								<span class="admin_web_tip">????????????????????????????????????????????????????????????,???????????????????????????rar,zip,doc,docx,xls</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-inline t_w250">
									<input type="checkbox" name="is_picself" lay-skin="switch" lay-text="??????|??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['is_picself']=="1") {?> checked <?php }?> />
								</div>
								<span class="admin_web_tip">????????????????????????????????????????????????????????????</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">?????????????????????</label>
								<div class="layui-input-inline t_w250">
									<input type="checkbox" name="is_picthumb" lay-skin="switch" lay-text="??????|??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['is_picthumb']=="1") {?> checked <?php }?> />
								</div>
								<span class="admin_web_tip">??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-inline t_w250">
									<input type="checkbox" name="is_watermark" lay-skin="switch" lay-text="??????|??????" <?php if ($_smarty_tpl->tpl_vars['config']->value['is_watermark']=="1") {?> checked <?php }?> />
								</div>
								<span class="admin_web_tip">??????????????????????????????????????????</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">???????????????</label>
								<div class="layui-input-inline t_w250">
									<select name="wmark_position" lay-filter="wmark_position" id="wmark_position">
										<option value="0">?????????</option>
										<option value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['wmark_position']=='1') {?>selected<?php }?>>?????? </option> 
										<option value="3" <?php if ($_smarty_tpl->tpl_vars['config']->value['wmark_position']=='3') {?>selected<?php }?>>?????? </option> 
										<option value="5" <?php if ($_smarty_tpl->tpl_vars['config']->value['wmark_position']=='5') {?>selected<?php }?>>?????? </option> 
										<option value="7" <?php if ($_smarty_tpl->tpl_vars['config']->value['wmark_position']=='7') {?>selected<?php }?>>?????? </option> 
										<option value="9" <?php if ($_smarty_tpl->tpl_vars['config']->value['wmark_position']=='9') {?>selected<?php }?>>?????? </option> 
									</select> 
								</div>
								<span class="admin_web_tip">?????????????????????????????????</span>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">??????LOGO???</label>
								<div class="layui-input-inline">
									<div class="admin_uppicbox">
										<input type="hidden" id="layupload_type" value="2" />
									
										<div class="admin_uppicimg">
											<img id="imgwm" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_watermark'];?>
" style="width: 140px; height: 140px;" <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_watermark']) {?>class="none"<?php }?>>
										</div>
									
										<span>
											<button type="button" class="adminupbtn adminupload" lay-data="{name: 'sy_watermark',imgid: 'imgwm',path: 'logo',source:'back'}">????????????</button>		
										</span>
									</div>
									
									
								</div>
							</div>
							<div class="layui-form-item layui-form-text tty_form_btn" style="padding-left: 180px;">
								<input class="layui-btn tty_sub" id="uploadconfig" type="button" name="uploadconfig" value="??????" />&nbsp;&nbsp;
								<input class="layui-btn tty_cz" type="reset" value="??????" />
							</div>
						</form>
					</div>
				</div>

			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['mapurl'];?>
"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/map.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				layui.use(['layer', 'form'], function() {
					var layer = layui.layer,
						form = layui.form,
						$ = layui.$;

					$("input[name=code_kind]").each(function() {
						$(this).next().click(function() {
							var kindvalue = $(this).prev().val();
							if (kindvalue == 1) {
								$(".character").show();
								$(".geetest").hide();
								$(".dingxiang").hide();
								$(".vaptcha").hide();
							} else if (kindvalue == 3) {
								$(".geetest").show();
								$(".character").hide();
								$(".dingxiang").hide();
								$(".vaptcha").hide();
							} else if (kindvalue == 4) {
								$(".character").hide();
								$(".geetest").hide();
								$(".vaptcha").hide();
								$(".dingxiang").show();
							}else if (kindvalue == 5) {
								$(".character").hide();
								$(".geetest").hide();
								$(".dingxiang").hide();
								$(".vaptcha").show();
							}
						});
					}); //end each

				}); //end layui.use()


				if (window["context"] == undefined) {
					if (!window.location.origin) {
						window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' +
							window.location.port : '');
					}
					window["context"] = location.origin + "/V6.0";
				}
				var weburl = '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
';
				var $switchtag = $("div.main_tag ul li");
				$switchtag.click(function() {
					$(this).addClass("on").siblings().removeClass("on");
					var index = $switchtag.index(this);
					$("div.tag_box > div").eq(index).show().siblings().hide();
				});
				$(".tips_class").hover(function() {
					var msg_id = $(this).attr('id');
					var msg = $('#' + msg_id + ' + font').html();
					if ($.trim(msg) != '') {
						layer.tips(msg, this, {
							guide: 1,
							style: ['background-color:#5EA7DC; color:#fff;top:-7px', '#5EA7DC']
						});
						$(".xubox_layer").addClass("xubox_tips_border");
					}
				}, function() {
					var msg_id = $(this).attr('id');
					var msg = $('#' + msg_id + ' + font').html();
					if ($.trim(msg) != '') {
						layer.closeAll('tips');
					}
				});

				getmapnoshowcont('map_container',
					"<?php if ($_smarty_tpl->tpl_vars['config']->value['map_x']) {
echo $_smarty_tpl->tpl_vars['config']->value['map_x'];
} else { ?>116.404<?php }?>",
					"<?php if ($_smarty_tpl->tpl_vars['config']->value['map_y']) {
echo $_smarty_tpl->tpl_vars['config']->value['map_y'];
} else { ?>39.915<?php }?>", "map_x", "map_y");
				//????????????????????????
				var map = new BMap.Map("map_container");

				setLocation('map_container',
					"<?php if ($_smarty_tpl->tpl_vars['config']->value['map_x']) {
echo $_smarty_tpl->tpl_vars['config']->value['map_x'];
} else { ?>116.404<?php }?>",
					"<?php if ($_smarty_tpl->tpl_vars['config']->value['map_y']) {
echo $_smarty_tpl->tpl_vars['config']->value['map_y'];
} else { ?>39.915<?php }?>", "map_x", "map_y");

				function setLocation(id, x, y, xid, yid) {
					var data = get_map_config();
					if (data) {
						var config = eval('(' + data + ')');
						var rating, map_control_type, map_control_anchor;
						if (!x && !y) {
							x = config.map_x;
							y = config.map_y;
						}
						var point = new BMap.Point(x, y);
						var marker = new BMap.Marker(point);
						var opts = {
							type: BMAP_NAVIGATION_CONTROL_LARGE
						}
						map.enableScrollWheelZoom(true);
						map.addControl(new BMap.NavigationControl(opts));
						map.centerAndZoom(point, 13);
						map.addOverlay(marker);
						map.addEventListener("click", function(e) {
							var info = new BMap.InfoWindow('', {
								width: 260
							});
							var projection = this.getMapType().getProjection();
							var lngLat = e.point;
							document.getElementById(xid).value = lngLat.lng;
							document.getElementById(yid).value = lngLat.lat;
							map.clearOverlays();
							var point = new BMap.Point(lngLat.lng, lngLat.lat);
							var marker = new BMap.Marker(point);
							map.addOverlay(marker);
						});
					}
				}
				$(function() {

					$("#getclick").click(function() {

						$('#getmapxy').toggle();
						var bodycont = $('#getmapxy').css("display");
						if (bodycont == "none") {
							$(this).html("??????????????????");
						} else {

							$(this).html("??????????????????");
						}
					})
					$("#cacheconfig").click(function() {
						loadlayer();
						$.post("index.php?m=config&c=save", {
							config: $("#cacheconfig").val(),
							ismemcache: $("input[name=ismemcache]").is(":checked") ? 1 : 2,
							issmartycache: $("input[name=issmartycache]").is(":checked") ? 1 : 2,
							memcachehost: $("input[name=memcachehost]").val(),
							memcacheport: $("input[name=memcacheport]").val(),
							memcachetime: $("input[name=memcachetime]").val(),
							smartycachetime: $("input[name=smartycachetime]").val(),
							webcache: $("input[name=webcache]").is(":checked") ? 1 : 2,
							pytoken: $("#pytoken").val(),
							webcachetime: $("input[name=webcachetime]").val()
						}, function(data, textStatus) {
							parent.layer.closeAll('loading');
							config_msg(data);
						});
					});


					$("#mapconfig").click(function() {
						loadlayer();
						$.post("index.php?m=config&c=save", {
							config: $("#mapconfig").val(),
							map_tocity: $("input[name=map_tocity]:checked").val(),
							map_key: $("#map_key").val(),
							pytoken: $("#pytoken").val(),
							map_x: $("#map_x").val(),
							map_y: $("#map_y").val()
						}, function(data, textStatus) {
							parent.layer.closeAll('loading');
							config_msg(data);
						});
					});
					$("#otherconfig").click(function() {
						loadlayer();
						$.post("index.php?m=config&c=save", {
							config: $("#otherconfig").val(),
							sy_safekey: $("#sy_safekey").val(),
							sy_istemplate: $("input[name=sy_istemplate]").is(":checked") ? 1 : 2,
							sy_iscsrf: $("input[name=sy_iscsrf]").is(":checked") ? 1 : 2,
							sy_bannedip: $("#sy_bannedip").val(),
							sy_fkeyword_all: $("#sy_fkeyword_all").val(),
							sy_useragent	: $('#sy_useragent').val(),
							sy_bannedip_alert: $("#sy_bannedip_alert").val(),
							pytoken: $("#pytoken").val(),
							sy_fkeyword: $("#sy_fkeyword").val()
						}, function(data, textStatus) {
							parent.layer.closeAll('loading');
							config_msg(data);
						});
					});
					$("#uploadconfig").click(function() {
						loadlayer();
						$.post("index.php?m=config&c=save", {
							config: 'uploadconfig',
							pic_maxsize: $("#pic_maxsize").val(),
							file_maxsize: $("#file_maxsize").val(),
							pic_type: $("#pic_type").val(),
							file_type: $("#file_type").val(),
							is_picself: $("input[name=is_picself]").is(":checked") ? 1 : 2,
							is_picthumb: $("input[name=is_picthumb]").is(":checked") ? 1 : 2,
							is_watermark: $("input[name=is_watermark]").is(":checked") ? 1 : 2,
							wmark_position: $("#wmark_position").val(),
							pytoken: $("#pytoken").val(),
							sy_fkeyword: $("#sy_fkeyword").val()
						}, function(data, textStatus) {
							parent.layer.closeAll('loading');
							config_msg(data);
						});
					});
					$("#codeconfig").click(function() {
						if ($("#code_strlength").val() > 4) {
							layer.msg("??????????????????????????????4???", 2, 8);
							return false;
						}
						loadlayer();
						var codewebarr = "";
						$("input[name=code_web]:checked").each(function() { //???????????????????????????????????????,???????????????????????? 
							if (codewebarr == "") {
								codewebarr = $(this).val();
							} else {
								codewebarr = codewebarr + "," + $(this).val();
							}
						});
						$.post("index.php?m=config&c=save", {
							config: $("#codeconfig").val(),
							code_web: codewebarr,
							code_kind: $("input[name=code_kind]:checked").val(),
							code_type: $("input[name=code_type]:checked").val(),
							code_filetype: $("input[name=code_filetype]:checked").val(),
							code_width: $("#code_width").val(),
							code_height: $("#code_height").val(),
							sy_geetestid: $("#sy_geetestid").val(),
							sy_geetestkey: $("#sy_geetestkey").val(),
							sy_dxappid: $("#sy_dxappid").val(),
							sy_dxappsecret: $("#sy_dxappsecret").val(),
							sy_geetestmid: $("#sy_geetestmid").val(),
							sy_geetestmkey: $("#sy_geetestmkey").val(),
							sy_vaptcha_vid: $("#sy_vaptcha_vid").val(),
							sy_vaptcha_key: $("#sy_vaptcha_key").val(),
							pytoken: $("#pytoken").val(),
							code_strlength: $("#code_strlength").val()
						}, function(data, textStatus) {
							parent.layer.closeAll('loading');
							config_msg(data);
						});
					});
					$("#config").click(function() {
						loadlayer();
						$.post("index.php?m=config&c=save", {
							config: $("#config").val(),
							sy_webname: $("#sy_webname").val(),
							sy_weburl: $("#sy_weburl").val(),
							sy_webkeyword: $("#sy_webkeyword").val(),
							sy_webmeta: $("#sy_webmeta").val(),
							sy_webcopyright: $("#sy_webcopyright").val(),
							sy_webtongji: $("#sy_webtongji").val(),
							sy_webemail: $("#sy_webemail").val(),
							sy_webmoblie: $("#sy_webmoblie").val(),
							sy_webrecord: $("#sy_webrecord").val(),
							sy_websecord: $("#sy_websecord").val(),
							sy_perfor: $("#sy_perfor").val(),
							sy_hrlicense: $("#sy_hrlicense").val(),
							sy_webtel: $("#sy_webtel").val(),
							sy_qq: $("#sy_qq").val(),
							sy_freewebtel: $("#sy_freewebtel").val(),
							sy_comwebtel: $("#sy_comwebtel").val(),
							sy_worktime: $("#sy_worktime").val(),
							sy_listnum: $("#sy_listnum").val(),
							sy_webadd: $("#sy_webadd").val(),
							sy_webclose: $("#sy_webclose").val(),
							sy_web_online: $("input[name=sy_web_online]").is(":checked") ? 1 : 2,
							pytoken: $("#pytoken").val()
						}, function(data, textStatus) {
							parent.layer.closeAll('loading');
							config_msg(data);
						});
					});
				});
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui.upload.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" type='text/javascript'><?php echo '</script'; ?>
>
		</div>
	</body>
</html>
<?php }} ?>
