<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 13:47:54
         compiled from "D:\www\www\phpyun\app\template\default\register\index.htm" */ ?>
<?php /*%%SmartyHeaderCode:16763528262e2230a4ba7c9-94124236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '514aa6d4df87efd0c6aca41304a46020a458b5ee' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\default\\register\\index.htm',
      1 => 1650462143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16763528262e2230a4ba7c9-94124236',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'config' => 0,
    'type' => 0,
    'bind' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e2230a5185d7_22904771',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e2230a5185d7_22904771')) {function content_62e2230a5185d7_22904771($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'D:\\www\\www\\phpyun\\app\\include\\libs\\plugins\\function.url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
        <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" type="text/css" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/login.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" type="text/css" />
        <?php echo '<script'; ?>
>
            var weburl = "<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
",
                integral_pricename = '<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
',
                pricename = '<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
',
                code_web = '<?php echo $_smarty_tpl->tpl_vars['config']->value['code_web'];?>
',

                reg_namemaxlen =   '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_reg_namemaxlen'];?>
',//????????????????????????
                reg_nameminlen =   '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_reg_nameminlen'];?>
',//????????????????????????
                reg_name_sp    =   '<?php echo $_smarty_tpl->tpl_vars['config']->value['reg_name_sp'];?>
',//??????????????????????????????@!#.$-_
                reg_name_zm    =   '<?php echo $_smarty_tpl->tpl_vars['config']->value['reg_name_zm'];?>
',//????????????????????????
                reg_name_num   =   '<?php echo $_smarty_tpl->tpl_vars['config']->value['reg_name_num'];?>
',//????????????????????????
                reg_name_han   =   '<?php echo $_smarty_tpl->tpl_vars['config']->value['reg_name_han'];?>
',//????????????????????????

                code_kind = '<?php echo $_smarty_tpl->tpl_vars['config']->value['code_kind'];?>
';
        <?php echo '</script'; ?>
>
    </head>

    <body class="register_bg">
        <div class="register_header">
            <div class="reg_w980">
                <div class="reg_logo">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_ossurl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_logo'];?>
" class="png"></a>
                </div>
                <div class="reg_msg">????????????</div>
                <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
" class="reg_fh yun_text_color fr">????????????</a>
            </div>
        </div>
        <div class="clear"></div>
        <!--content  start-->
        <div class="reg_content">
        <div class="reg_stepbox">
        <ul class="reg_stepbox_list">
        <li class="reg_stepcur"><span class="reg_stepbox_n">1</span><em class="reg_stepbox_name">????????????</em></li>
        <li class="reg_stepcur"><span class="reg_stepbox_line"></span></li>
        <li><span class="reg_stepbox_n">2</span><em class="reg_stepbox_name">??????????????????</em></li>
        <li><span class="reg_stepbox_line"></span></li>
        <li><span class="reg_stepbox_n"><i class="reg_stepbox_cgicon"></i></span><em class="reg_stepbox_name">????????????</em></li>
        </ul>
        </div>
            <div class="logoin_cont fl">
                <div class="register_left">

                    <div class="reg_newtit_box">
                        <ul class="reg_newtit">

                            <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_moblie']=='1') {?>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['type']->value==2) {?>reg_newtit_cur<?php }?>">
                                <a class="reg_h1_icon" href="<?php if ($_smarty_tpl->tpl_vars['bind']->value) {
echo smarty_function_url(array('m'=>'register','usertype'=>1,'type'=>2,'bind'=>$_smarty_tpl->tpl_vars['bind']->value),$_smarty_tpl);
} else {
echo smarty_function_url(array('m'=>'register','usertype'=>1,'type'=>2),$_smarty_tpl);
}?>"><i class="reg_newtit_icon"></i>????????????</a>
                            </li>
                            <?php }?> 
							<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_email']=='1') {?>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['type']->value==3) {?>reg_newtit_cur<?php }?>">
                                <a class="reg_h1_icon" href="<?php if ($_smarty_tpl->tpl_vars['bind']->value) {
echo smarty_function_url(array('m'=>'register','usertype'=>1,'type'=>3,'bind'=>$_smarty_tpl->tpl_vars['bind']->value),$_smarty_tpl);
} else {
echo smarty_function_url(array('m'=>'register','usertype'=>1,'type'=>3),$_smarty_tpl);
}?>"><i class="reg_newtit_icon"></i>????????????</a>
                            </li>
                            <?php }?> 
							<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_user']=='1') {?>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['type']->value==1) {?>reg_newtit_cur<?php }?>">
                                <a class="reg_h1_icon" href="<?php if ($_smarty_tpl->tpl_vars['bind']->value) {
echo smarty_function_url(array('m'=>'register','usertype'=>1,'type'=>1,'bind'=>$_smarty_tpl->tpl_vars['bind']->value),$_smarty_tpl);
} else {
echo smarty_function_url(array('m'=>'register','usertype'=>1,'type'=>1),$_smarty_tpl);
}?>"><i class="reg_newtit_icon"></i>???????????????</a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>

                    <?php if (($_smarty_tpl->tpl_vars['type']->value==2||$_smarty_tpl->tpl_vars['type']->value=='')&&$_smarty_tpl->tpl_vars['config']->value['reg_moblie']) {?>
                    <div class="register_Switching_box" id="regtype2">
                        <ul class="register_list">
                            <li class="mt30"><em><font color="#FF0000">*</font> ???????????????</em>
                                <input type="text" class="logoin_text tips_class" id="moblie" onblur="reg_checkAjax('moblie');" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" placeholder="???????????????????????????" />
                                <span class="reg_tips reg_tips_red none" id="ajax_moblie"></span>
                            </li>

                            <?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"????????????")!==false) {?>
                      
                                <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']>2) {?>
								<div class="gtdx-captcha">
									<div id="bind-captcha" data-id='subreg' data-type='click'></div>
									<input type='hidden' id="verify_token"  name="verify_token" value="">
									<input type='hidden' id="popup-submit">	
									<input type='hidden' id="bind-submit">
								</div>
                                <?php } else { ?>
                                     <li class="mt30"> <em><font color="#FF0000">*</font> ????????????</em>
                                <div class="reg_textbox">
                                    <input id="CheckCode" type="text" class="logoin_textw150 tips_class" onblur="reg_checkAjax('CheckCode');" maxlength="6" placeholder="????????????????????????" autocomplete="off"/>
                                    <a href="javascript:void(0);" onclick="checkCode('vcode_img');" class="registe_yzm"> <img id="vcode_img" class="authcode" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" /></a>
                                </div>
                                <span class="reg_tips reg_tips_red none" id="ajax_CheckCode"></span> <?php }?>
                            </li>
                            <?php }?> 
							<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_msg_regcode']=="1"||$_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=="1") {?>
                            <li class="mt30"><em><font color="#FF0000">*</font> ???????????????</em>
                                <div class="reg_textbox"><input type="text" id="moblie_code" class="logoin_text tips_class" onblur="reg_checkAjax('moblie_code');" placeholder="????????????????????????" />
                                    <i class="reg_textbox_line"></i>
                                    <a class="reg_dxyz" href="javascript:void(0);" id="subreg" onclick="sendmsg('vcode_img');"><span id="time">??????????????????</span></a>
                                </div>
                                <span class="reg_tips reg_tips_red none" id="ajax_moblie_code"></span>
                            </li>
                            <?php }?>

                            <li class="mt30"><em><font color="#FF0000">*</font> ???&nbsp;&nbsp;??????</em>
                                <span id="pass2"><input type="password" onkeyup="uppassword(2)" id="password" onblur="reg_checkAjax('password');" class="logoin_text tips_class" value="" placeholder="?????????6-20?????????????????????????????????"/></span>
                                <span class="reg_tips reg_tips_red none" id="ajax_password"></span>
                            </li>

                            <li><em>&nbsp;</em>
                                <div class="kg_lgn_psw_strong">
                                    <div class="kg_lgn_psw_txt">????????????:</div>
                                    <div class="kg_lgn_psw_strong_cnt">
                                        <span id="pass1_2" class="psw_span">??????</span>
                                        <span id="pass2_2" class="psw_span ">??????</span>
                                        <span id="pass3_2" class="psw_span ">??????</span>
                                    </div>
                                    <div class="psw_xs" onmousemove="showtip(2)" onmouseout="hidetip(2)">
                                        <a href="javascript:void(0);" onclick="showpw(2)" id="showpw2" class="psw_xs_a">????????????</a>
                                        <i class="psw_xs_icon"></i>
                                        <div class="psw_xs_tips none" id="tip2">?????????????????????????????????????????????</div>
                                    </div>
                                </div>
								<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_pw_sp']=='1'||$_smarty_tpl->tpl_vars['config']->value['reg_pw_num']=='1'||$_smarty_tpl->tpl_vars['config']->value['reg_pw_zm']=='1') {?>
                            
                                <div class="mmset">
                                    ??????????????????<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_pw_num']=='1') {?>?????? <?php }
if ($_smarty_tpl->tpl_vars['config']->value['reg_pw_zm']=='1') {?>?????? <?php }
if ($_smarty_tpl->tpl_vars['config']->value['reg_pw_sp']=='1') {?>????????????@!#.$-_<?php }?>
                                </div>
                       
                            <?php }?>
                            </li>
                            
                            <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_passconfirm']=='1') {?>
                            <li class="mt20"><em><font color="#FF0000">*</font> ???????????????</em>
                                <span id="pass1"><input type="password" id="passconfirm" onblur="reg_checkAjax('passconfirm');" class="logoin_text tips_class" value=""placeholder="???????????????????????????"/></span>
                                <span class="reg_tips reg_tips_red none" id="ajax_passconfirm"></span>
                            </li>
                            <?php }?>
							

                            <li class="mt20"><em>&nbsp;</em><input type="button" class="register_submit" value="????????????" onclick="check_user(2,'vcode_img');" /></li>
                            <li class="m10">
                                <em>&nbsp;</em>
                                <div class="reg_xy">
                                    <input type="checkbox" id="xieyi2" class="logoin_check" value="1" checked="checked" />????????????
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/about/service.html" target="_blank" class="reg_yhxy">??????????????????</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==3&&$_smarty_tpl->tpl_vars['config']->value['reg_email']==1) {?>
                    <div class="register_Switching_box" id="regtype3">
                        <ul class="register_list">
                            <li class="mt30 reg_re"><em><font color="#FF0000">*</font> ???&nbsp;&nbsp;??????</em>
                                <input type="text" class="logoin_text tips_class" id="email3" onkeyup="get_def_email(this.value,'3');" placeholder="?????????????????????????????????" />
                                <div class="reg_email_box none" id="defemail3"></div>
                                <span class="reg_tips reg_tips_red none" id="ajax_email3"></span>
                            </li>

                            <?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"????????????")!==false) {?>
                         
                                <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']>2) {?>
								<div class="gtdx-captcha">
									<div id="bind-captcha" data-id='subreg' data-type='click'></div>
									<input type='hidden' id="verify_token"  name="verify_token" value="">
									<input type='hidden' id="popup-submit">	
									<input type='hidden' id="bind-submit">
								</div>
                                <?php } else { ?>
                                  <li class="mt30"> <em><font color="#FF0000">*</font> ????????????</em>
                                <div class="reg_textbox"> <input id="CheckCode" type="text" class="logoin_textw150 tips_class" onblur="reg_checkAjax('CheckCode');" maxlength="6" placeholder="????????????????????????" autocomplete="off"/>
                                    <a href="javascript:void(0);" onclick="checkCode('vcodeimg');" class="registe_yzm"> <img id="vcodeimg" class="authcode" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" /></a>
                                </div>
                                <span class="reg_tips reg_tips_red none" id="ajax_CheckCode"></span> <?php }?>
                            </li>
                            <?php }?> <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=='1') {?>
                            <li class="mt30"><em><font color="#FF0000">*</font> ???&nbsp;&nbsp;??????</em>
                                <input type="text" class="logoin_text tips_class" id="moblie" onblur="reg_checkAjax('moblie');" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" placeholder="???????????????????????????" />
                                <span class="reg_tips reg_tips_red none" id="ajax_moblie"></span>
                            </li>
                            
                            <li class="mt30"><em><font color="#FF0000">*</font> ???????????????</em>
                                <div class="reg_textbox"><input type="text" id="moblie_code" class="logoin_text tips_class" onblur="reg_checkAjax('moblie_code');" placeholder="?????????????????????" /><i class="reg_textbox_line"></i>
                                    <a class="reg_dxyz" href="javascript:void(0);" id="subreg" onclick="sendmsg('vcodeimg');"><span id="time">??????????????????</span></a>
                                </div>
                                <span class="reg_tips reg_tips_red none" id="ajax_moblie_code"></span>
                            </li>
                            <?php }?>

                            <li class="mt30"><em><font color="#FF0000">*</font> ???&nbsp;&nbsp;??????</em>
                                <span id="pass3"><input type="password" onkeyup="uppassword(3)" id="password" onblur="reg_checkAjax('password');" class="logoin_text tips_class" value=""placeholder="?????????6-20?????????????????????????????????"/></span>
                                <span class="reg_tips reg_tips_red none" id="ajax_password"></span>
                            </li>

                            <li><em>&nbsp;</em>
                                <div class="kg_lgn_psw_strong">
                                    <div class="kg_lgn_psw_txt">????????????:</div>
                                    <div class="kg_lgn_psw_strong_cnt">
                                        <span id="pass1_3" class="psw_span">??????</span>
                                        <span id="pass2_3" class="psw_span ">??????</span>
                                        <span id="pass3_3" class="psw_span ">??????</span>
                                    </div>
                                    <div class="psw_xs" onmousemove="showtip(3)" onmouseout="hidetip(3)">
                                        <a href="javascript:void(0);" onclick="showpw(3)" id="showpw3" class="psw_xs_a">????????????</a>
                                        <i class="psw_xs_icon"></i>
                                        <div class="psw_xs_tips none" id="tip3">?????????????????????????????????????????????</div>
                                    </div>
                                </div>
								 <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_pw_sp']=='1'||$_smarty_tpl->tpl_vars['config']->value['reg_pw_num']=='1'||$_smarty_tpl->tpl_vars['config']->value['reg_pw_zm']=='1') {?>
                           
                                <div class="mmset">
                                    ??????????????????<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_pw_num']=='1') {?>?????? <?php }
if ($_smarty_tpl->tpl_vars['config']->value['reg_pw_zm']=='1') {?>?????? <?php }
if ($_smarty_tpl->tpl_vars['config']->value['reg_pw_sp']=='1') {?>????????????@!#.$-_<?php }?>
                                </div>
                                <?php }?>
							
                            </li>
                           
                            <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_passconfirm']=='1') {?>
                            <li class="mt20"><em><font color="#FF0000">*</font> ???????????????</em>
                                <span id="pass1"><input type="password" id="passconfirm" onblur="reg_checkAjax('passconfirm');" class="logoin_text tips_class" value=""placeholder="???????????????????????????"></span>
                                <span class="reg_tips reg_tips_red none" id="ajax_passconfirm"></span>
                            </li>
                            <?php }?> 

                            <li class="mt30"><em>&nbsp;</em>
							<input type="button" class="register_submit" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=='0') {?> id='subreg' <?php }?> value="????????????" onclick="check_user(3,'vcodeimg');" /></li>
                            <li class="m10">
                                <em>&nbsp;</em>
                                <div class="reg_xy">
                                    <input type="checkbox" id="xieyi3" class="logoin_check" value="1" checked="checked" />????????????
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/about/service.html" target="_blank" class="reg_yhxy">??????????????????</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==1&&$_smarty_tpl->tpl_vars['config']->value['reg_user']==1) {?>
                    <div class="register_Switching_box" id="regtype1">
                        <ul class="register_list">

                            <li class="mt30"><em><font color="#FF0000">*</font> ????????????</em>
                                <input type="text" id="username1" class="logoin_text tips_class" onblur="reg_checkAjax('username1');" placeholder="??????????????????????????????" />
                                <span class="reg_tips reg_tips_red none" id="ajax_username1"></span>
                            <div class="mmset mmsetpd">?????????????????????<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_reg_nameminlen'];?>
-<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_reg_namemaxlen'];?>
???
                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_name_han']=='1'||$_smarty_tpl->tpl_vars['config']->value['reg_name_sp']=='1'||$_smarty_tpl->tpl_vars['config']->value['reg_name_num']=='1'||$_smarty_tpl->tpl_vars['config']->value['reg_name_zm']=='1') {?>
                                        ,????????????
                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_name_han']=='1') {?>?????? <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_name_num']=='1') {?>?????? <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_name_zm']=='1') {?>?????? <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_name_sp']=='1') {?>????????????@!#.$-_<?php }?>
                                    <?php }?>
                                    </div>
									</li>
                           
                            <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=="1") {?>
                            <li class="mt30"><em><font color="#FF0000">*</font> ???&nbsp;&nbsp;??????</em>
                                <input type="text" class="logoin_text tips_class" id="moblie" onblur="reg_checkAjax('moblie');" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" placeholder="???????????????????????????" />
                                <span class="reg_tips reg_tips_red none" id="ajax_moblie"></span>
                            </li>
                            <?php }?> 
							<?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"????????????")!==false) {?>
                         
                                <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']>2) {?>
									<div class="gtdx-captcha">
										<div id="bind-captcha" data-id='subreg' data-type='click'></div>
										
										<input type='hidden' id="verify_token"  name="verify_token" value="">
										<input type='hidden' id="popup-submit">	
										<input type='hidden' id="bind-submit">
									</div>
                                <?php } else { ?>
                                   <li class="mt30"><em><font color="#FF0000">*</font> ????????????</em>
                                <div class="reg_textbox">
                                    <input id="CheckCode" type="text" class="logoin_textw150 tips_class" onblur="reg_checkAjax('CheckCode');" maxlength="6" placeholder="????????????????????????" autocomplete="off"/>
                                    <a href="javascript:void(0);" onclick="checkCode('vcode_imgs');" class="registe_yzm"><img id="vcode_imgs" class="authcode" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" /></a>

                                </div>
                                <span class="reg_tips reg_tips_red none" id="ajax_CheckCode"></span> <?php }?>
                            </li>
                            <?php }?> <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=='1') {?>
                            <li class="mt30">
                                <em><font color="#FF0000">*</font> ???????????????</em>
                                <div class="reg_textbox">
                                    <input type="text" id="moblie_code" class="logoin_text tips_class" onblur="reg_checkAjax('moblie_code');" placeholder="????????????????????????" /><i class="reg_textbox_line"></i>
                                    <a class="reg_dxyz" href="javascript:void(0);" id="subreg" onclick="sendmsg('vcode_imgs');"><span id="time">??????????????????</span></a>
                                </div>
                                <span class="reg_tips reg_tips_red none" id="ajax_moblie_code"></span>
                            </li>
                            <?php }?>

                            <li class="mt30"><em><font color="#FF0000">*</font> ???&nbsp;&nbsp;??????</em>
                                <span id="pass1"><input type="password" onkeyup="uppassword(1)" id="password" onblur="reg_checkAjax('password')" class="logoin_text tips_class" value=""placeholder="?????????6-20?????????????????????????????????"/></span>
                                <span class="reg_tips reg_tips_red none" id="ajax_password"></span>
                            </li>

                            <li class="reg_re"><em>&nbsp;</em>
                                <div class="kg_lgn_psw_strong">
                                    <div class="kg_lgn_psw_txt">????????????:</div>
                                    <div class="kg_lgn_psw_strong_cnt">
                                        <span id="pass1_1" class="psw_span">??????</span>
                                        <span id="pass2_1" class="psw_span ">??????</span>
                                        <span id="pass3_1" class="psw_span ">??????</span>
                                    </div>
                                    <div class="psw_xs" onmousemove="showtip(1)" onmouseout="hidetip(1)">
                                        <a href="javascript:void(0);" onclick="showpw(1);" id="showpw1" class="psw_xs_a">????????????</a>
                                        <i class="psw_xs_icon"></i>
                                        <div class="psw_xs_tips none" id="tip1">?????????????????????????????????????????????</div>
                                    </div>
                                </div>
								 <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_pw_sp']=='1'||$_smarty_tpl->tpl_vars['config']->value['reg_pw_num']=='1'||$_smarty_tpl->tpl_vars['config']->value['reg_pw_zm']=='1') {?>
                           
                                <div class="mmset">
                                    ??????????????????<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_pw_num']=='1') {?>?????? <?php }
if ($_smarty_tpl->tpl_vars['config']->value['reg_pw_zm']=='1') {?>?????? <?php }
if ($_smarty_tpl->tpl_vars['config']->value['reg_pw_sp']=='1') {?>????????????@!#.$-_<?php }?>
                                </div>
                         
                            <?php }?>
                            </li>
                           
                            <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_passconfirm']=='1') {?>
                            <li class="mt20"><em><font color="#FF0000">*</font> ???????????????</em>
                                <span id="pass1"><input type="password" id="passconfirm" onblur="reg_checkAjax('passconfirm');" class="logoin_text tips_class" value=""placeholder="???????????????????????????"//></span>
                                <span class="reg_tips reg_tips_red none" id="ajax_passconfirm"></span>
                            </li>
                            <?php }?> 

                            <li class="mt30"><em>&nbsp;</em><input type="button" class="register_submit" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=='0') {?> id="subreg" <?php }?> value="????????????" onclick="check_user('1','vcode_imgs');" /></li>
                            <li class="m10">
                                <em>&nbsp;</em>
                                <div class="reg_xy">
                                    <input type="checkbox" id="xieyi1" class="logoin_check" value="1" checked="checked" />????????????
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/about/service.html" target="_blank" class="reg_yhxy">??????????????????</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php }?>

                    <input type="hidden" id="default" value="-1" />
                    <input type="hidden" id="def" value="" />
                    <input type="hidden" id="event" value="" />
                    <input type="hidden" id="allnum" value="0" />
                    <input type="hidden" id="send" value="0" />
                    <input type="hidden" id="usertype" value="1" />
                    <input type="hidden" id="defEmail" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_def_email'];?>
" />
					<input type="hidden" id="reg_bind" value="<?php echo $_smarty_tpl->tpl_vars['bind']->value;?>
"/>
                </div>
                <div class="register_right">
                   <div class="register_right_icon"></div>
                    <div class="register_right_c">

                        ????????????? <a href="<?php echo smarty_function_url(array('m'=>'login'),$_smarty_tpl);?>
">????????????></a>
                       
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']==1||$_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']==1||$_smarty_tpl->tpl_vars['config']->value['wx_author']==1) {?>
                    <div class="register_right_c">?????????????????? </div>
                    <div class="box_third">

                        <?php if ($_smarty_tpl->tpl_vars['config']->value['wx_author']==1) {?>
                        <a href="<?php echo smarty_function_url(array('m'=>'wxconnect'),$_smarty_tpl);?>
"><i class="l-icon weixin-icon"></i></a>
                        <?php }?> <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']==1) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/qqlogin.php"><i class="l-icon qq-icon"></i></a> <?php }?> <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']==1&&$_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']==1) {
}?> <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']==1) {?>
                        <a href="<?php echo smarty_function_url(array('m'=>'sinaconnect'),$_smarty_tpl);?>
"><i class="l-icon sina-icon"></i></a> <?php }?>
                    </div>

                    <?php }?> </div>
            </div>
        </div>
        <div class="clear"></div>
        
        
        <!--????????????????????????-->
        <div class="" style="width:550px; background:#fff; margin:20px auto; display: none;" id="written_off">
            <div class="reg_have_tip">
                <i class="reg_have_tip_icon"></i>
                <div class="reg_have_tip_tit"><span id="zy_type">????????????????????????</span></div>
                <div class="reg_have_tip_zc" id="zy_name"></div>
            </div>

            <div class="reg_have_tip_p_c">
                <div class="reg_have_tip_p">1. ???????????????????????????????????????????????????????????????
                    <a href="<?php echo smarty_function_url(array('m'=>'forgetpw'),$_smarty_tpl);?>
" class="reg_have_tip_bth">????????????</a>
                </div>
                <div class="reg_have_tip_p">
					<span id="desc_toast">2. ???????????????????????????????????????????????????????????????????????????????????????????????????</span>
                    <a href="javascript:void(0);" onclick="CheckPW()" class="reg_have_tip_bth">????????????</a>
                </div>
            </div>
            <div class="reg_have_tip_kf">??????????????????????????????????????????<span class="reg_have_tip_kf_tel"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</span></div>
			<input type="hidden" id="zy_uid" value="" />
			<input type="hidden" id="zy_mobile" value="" />
			<input type="hidden" id="zy_email" value="" />
        </div>
        <!--???????????????????????? end-->
        
        <!--?????????????????????-->
        <div class="none" id="postpw">
          	<ul class="reg_have_jc">
              	<li> 
                 	<span class="reg_have_jc_name"><font color="#FF3300">*</font> ???????????????</span>
              		<input id="pw" type='password' class="reg_have_jc_name_text" placeholder="?????????????????????" />
            	</li>
            	 
             	<li> 
                 	<span class="reg_have_jc_name"><font color="#FF3300">*</font> ???&nbsp;???&nbsp;??????</span>
                   	<input type="text" id="code" class="reg_have_jc_name_textyz"  maxlength="6" autocomplete="off"/>
                  	<a><img id="vcode_imgss" onclick="checkCode('vcode_imgss');" src="" /></a>
            	</li>
            	 
           		<li> 
                  	<span class="reg_have_jc_name">&nbsp; </span>
                  	<input class="reg_have_jc_bth" type="button" value="????????????" onclick="post_pass('vcode_imgss');" />
             	</li>
             	
             	
          	</ul>
        </div>
        <!--?????????????????????End-->
        
        <style>
            .icon2 {
                background-image: none;
                background-repeat: no-repeat;
            }
        </style>
        
        <!--content  end-->
        <div class="clear"></div>
        <div class="reg_footer">???????????????????????????????????????????????????????????????????????????????????????????????????????????????
           <div class="">????????? <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
 <span class="reg_footer_yz">??????QQ???<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_qq'];?>
</span> </div>
                     </div>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" language="javascript"><?php echo '</script'; ?>
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
/js/public.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" language="javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/reg_ajax.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" type="text/javascript"><?php echo '</script'; ?>
>
        
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/verify/verify_js.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <!--[if IE 6]>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
		  DD_belatedPNG.fix('.png,.#bg');
		<?php echo '</script'; ?>
>
		<![endif]-->
        <?php echo '<script'; ?>
>
            <?php if ($_smarty_tpl->tpl_vars['type']->value==1) {?>
               	$(document).ready(function() {
                 	$(document).keydown(function(e) {
                        var ev = document.all ? window.event : e;
                        if(ev.keyCode == 13) {
                         	check_user(1, 'vcode_imgs');
                   		}
                 	});
                	$("#xieyi1").keyup(function(event) {
                     	var myEvent = event || window.event;
                     	if(myEvent.keyCode == 13) {
                        	check_user(1, 'vcode_imgs');
                     	} else {
                        	 return;
                     	};
                	});
             	}) 
      		<?php } elseif ($_smarty_tpl->tpl_vars['type']->value==2) {?>
            	$(document).ready(function() {
                 	$(document).keydown(function(e) {
                      	var ev = document.all ? window.event : e;
                     	if(ev.keyCode == 13) {
                         	check_user(2, 'vcode_img');
                     	}
                 	});
            		$("#xieyi2").keyup(function(event) {
                    	var myEvent = event || window.event;
                     	if(myEvent.keyCode == 13) {
                        	check_user(2, 'vcode_img');
                  		} else {
                         	return;
                    	};
               		});
              	}) 
         	<?php } elseif ($_smarty_tpl->tpl_vars['type']->value==3) {?>
             	$(document).ready(function() {
              		$(document).keydown(function(e) {
                    	var ev = document.all ? window.event : e;
                    	if(ev.keyCode == 13) {
                       		check_user(3, 'vcodeimg');
                     	}
                 	});
                	$("#xieyi3").keyup(function(event) {
                      	var myEvent = event || window.event;
                     	if(myEvent.keyCode == 13) {
                        	check_user(3, 'vcodeimg');
                       	} else {
                          	return;
                     	};
                  	});
             	}) 
            <?php }?>
        <?php echo '</script'; ?>
>
        
        <div style="display:none"><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div><?php }} ?>
