<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:21:05
         compiled from "D:\www\www\phpyun\app\template\admin\admin_email_tpl.htm" */ ?>
<?php /*%%SmartyHeaderCode:132465744162e22ad135c671-81398609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3385fb835a16b9301212af5446002326cf5f63f' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_email_tpl.htm',
      1 => 1634559901,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132465744162e22ad135c671-81398609',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'emailconfig' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22ad13da651_82875859',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22ad13da651_82875859')) {function content_62e22ad13da651_82875859($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/admin_public.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" language="javascript"><?php echo '</script'; ?>
>
<link href="images/reset.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
<link href="images/system.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" /> 
<link href="images/table_form.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/css/layui.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet">
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/layui.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/phpyun_layer.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>

<title>后台管理</title>
</head>

<style>
	.table_border{
		border: 1px solid #e8eaec;
		border-collapse: separate;
		border-spacing: 0px 0px;
		margin-top: 5px;
	}
	.table_border_tit{
		text-align: left;
		font-weight: bold;
		padding-left: 10px;
		font-size: 16px;
	}
	.table_border tr{
		display: block;
		height: 46px;
		line-height: 46px;
		border-bottom: 1px solid #e8eaec;
	}
	.table_border tr th{
		width: 180px;
	}
	.layui-form-mid{
		float: right;
		line-height: 29px;
		margin-left: 20px;
	}
	.layui-form-mid a{
		color: #2d8cf0;
		
	}
	.layui-form-radio{
		margin-top: 0;
		
	}
		
</style>


<body class="body_ifm">
<div class="infoboxp"> 
<div class="tty-tishi_top">
<div class="admin_new_tip">
<a href="javascript:;" class="admin_new_tip_close"></a>
<a href="javascript:;" class="admin_new_tip_open" style="display:none;"></a>
<div class="admin_new_tit"><i class="admin_new_tit_icon"></i>操作提示</div>
<div class="admin_new_tip_list_cont">
<div class="admin_new_tip_list">设置通知之前，请先配置好邮件设置,否则将无法收到邮件。</div>
</div>
</div>
<div class="clear"></div>

<div class="tag_box">
<div> 
<form class="layui-form">
<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"> 

    <table width="100%" class="table_form table_border">
    <tr class="admin_table_trbg" bgcolor="#f5f7fb">
		<th colspan="2" class="admin_bold_box">
			<div class="table_border_tit">公共设置</div>
		</th>
    </tr>
	  
		  <tr>
            <th width="160">会员到期提醒：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_vipmr" value="1" id="sy_email_vipmr_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_vipmr']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_vipmr" value="2" id="sy_email_vipmr_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_vipmr']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailvipmr">设置模板</a> </div>
               </div>
             </td>
        </tr>

        <tr>
            <th width="160">注册会员：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_reg" value="1" id="sy_email_reg_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_reg']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_reg" value="2" id="sy_email_reg_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_reg']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailreg">设置模板</a> </div>
               </div>
             </td>
        </tr>
		<tr>
            <th width="160">网站周年庆：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_webbirthday" value="1" id="sy_email_webbirthday_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_webbirthday']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_webbirthday" value="2" id="sy_email_webbirthday_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_webbirthday']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailwebbirthday">设置模板</a> </div>
               </div>
             </td>
        </tr>
         <tr class="admin_table_trbg">
            <th width="160">找回密码：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_getpass" value="1" id="sy_email_getpass_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_getpass']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_getpass" value="2" id="sy_email_getpass_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_getpass']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailgetpass">设置模板</a> </div>
               </div>
             </td>
        </tr>
        <tr class="admin_table_trbg">
            <th width="160">付款成功：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_fkcg" value="1" id="sy_email_fkcg_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_fkcg']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_fkcg" value="2" id="sy_email_fkcg_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_fkcg']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailfkcg">设置模板</a> </div>
               </div>
             </td>
        </tr>
        <tr>
            <th width="160">邮箱认证：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_cert" value="1" id="sy_email_cert_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_cert']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_cert" value="2" id="sy_email_cert_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_cert']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailcert">设置模板</a> </div>
               </div>
             </td>
        </tr>
		<tr class="admin_table_trbg">
				<th width="160">会员锁定：</th>
				<td>
				  <div class="layui-input-block">
					 <div class="layui-input-inline">
					   <input type="radio" name="sy_email_lock" value="1" id="sy_email_lock_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_lock']=="1") {?>checked<?php }?> title="通知">
					   <input type="radio" name="sy_email_lock" value="2" id="sy_email_lock_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_lock']=="2") {?>checked<?php }?> title="不通知">
					 </div>
					 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emaillock">设置模板</a> </div>
				   </div>
				 </td>
			</tr>
		<tr>
            <th width="160">会员审核：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_userstatus" value="1" id="sy_email_userstatus_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_userstatus']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_userstatus" value="2" id="sy_email_userstatus_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_userstatus']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailuserstatus">设置模板</a> </div>
               </div>
             </td>
        </tr>
     	<tr class="admin_table_trbg">
            <th width="160">会员提醒：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_remind" value="1" id="sy_email_remind_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_remind']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_remind" value="2" id="sy_email_remind_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_remind']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailremind">设置模板</a> </div>
               </div>
             </td>
        </tr>
     	<tr class="admin_table_trbg">
            <th width="160">认领会员：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_claim" value="1" id="sy_email_claim_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_claim']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_claim" value="2" id="sy_email_claim_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_claim']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailclaim">设置模板</a> </div>
               </div>
             </td>
        </tr>
     	<tr>
            <th width="160">充值提醒：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_recharge" value="1" id="sy_email_recharge_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_recharge']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_recharge" value="2" id="sy_email_recharge_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_recharge']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailrecharge">设置模板</a> </div>
               </div>
             </td>
        </tr>
		<tr>
            <th width="160">注销账号成功通知：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_logouted" value="1" id="sy_email_logouted_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_logouted']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_logouted" value="2" id="sy_email_logouted_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_logouted']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emaillogouted">设置模板</a> </div>
               </div>
             </td>
        </tr>
		<tr bgcolor="#f5f7fb">
			<th colspan="2" class="admin_bold_box">
				<div class="table_border_tit">个人邮件设置</div>
			</th>
		</tr>
		<tr>
            <th width="160">个人生日：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_birthday" value="1" id="sy_email_birthday_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_birthday']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_birthday" value="2" id="sy_email_birthday_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_birthday']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailbirthday">设置模板</a> </div>
               </div>
             </td>
        </tr>
		<tr>
            <th width="160">个人会员长期未登录：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_userwdl" value="1" id="sy_email_userwdl_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_userwdl']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_userwdl" value="2" id="sy_email_userwdl_2" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_userwdl']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailuserwdl">设置模板</a> </div>
               </div>
             </td>
        </tr>
		<tr>
            <th width="160">个人会员未更新简历：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_userup" value="1" id="sy_email_userup_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_userup']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_userup" value="2" id="sy_email_userup_2" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_userup']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailuserup">设置模板</a> </div>
               </div>
             </td>
        </tr>
		<tr>
            <th width="160">个人会员未发布简历：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_useradd" value="1" id="sy_email_useradd_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_useradd']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_useradd" value="2" id="sy_email_useradd_2" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_useradd']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailuseradd">设置模板</a> </div>
               </div>
             </td>
        </tr>
     	<tr >
            <th width="160">个人身份认证审核：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_usercert" value="1" id="sy_email_usercert_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_usercert']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_usercert" value="2" id="sy_email_usercert_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_usercert']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailusercert">设置模板</a> </div>
               </div>
             </td>
        </tr>
     	<tr>
            <th width="160">个人订阅：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_userdy" value="1" id="sy_email_userdy_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_userdy']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_userdy" value="2" id="sy_email_userdy_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_userdy']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailuserdy">设置模板</a> </div>
               </div>
             </td>
        </tr>


		<tr bgcolor="#f5f7fb">
			<th colspan="2" class="admin_bold_box">
				<div class="table_border_tit">企业邮件设置</div>
			</th>
		</tr>


		<tr>
            <th width="160">企业会员长期未登录：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_comwdl" value="1" id="sy_email_comwdl_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_comwdl']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_comwdl" value="2" id="sy_email_comwdl_2" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_comwdl']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailcomwdl">设置模板</a> </div>
               </div>
             </td>
        </tr> 
		<tr>
            <th width="160">企业未更新职位：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_upjob" value="1" id="sy_email_upjob_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_upjob']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_upjob" value="2" id="sy_email_upjob_2" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_upjob']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailupjob">设置模板</a> </div>
               </div>
             </td>
        </tr>
		<tr>
            <th width="160">企业未发布职位：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_addjob" value="1" id="sy_email_addjob_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_addjob']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_addjob" value="2" id="sy_email_addjob_2" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_addjob']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailaddjob">设置模板</a> </div>
               </div>
             </td>
        </tr>
        <tr>
            <th width="160">邀请面试：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_yqms" value="1" id="sy_email_yqms_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_yqms']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_yqms" value="2" id="sy_email_yqms_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_yqms']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailyqms">设置模板</a> </div>
               </div>
             </td>
        </tr>
         <tr>
            <th width="160">回复面试邀请：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_yqmshf" value="1" id="sy_email_yqmshf_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_yqmshf']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_yqmshf" value="2" id="sy_email_yqmshf_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_yqmshf']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailyqmshf">设置模板</a> </div>
               </div>
             </td>
        </tr>
        <tr>
            <th width="160">职位审核通过：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_zzshtg" value="1" id="sy_email_zzshtg_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_zzshtg']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_zzshtg" value="2" id="sy_email_zzshtg_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_zzshtg']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailzzshtg">设置模板</a> </div>
               </div>
             </td>
        </tr>
       <tr class="admin_table_trbg">
            <th width="160">职位审核未通过：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_zzshwtg" value="1" id="sy_email_zzshwtg_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_zzshwtg']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_zzshwtg" value="2" id="sy_email_zzshwtg_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_zzshwtg']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailzzshwtg">设置模板</a> </div>
               </div>
             </td>
        </tr>
        <tr>
            <th width="160">兼职审核通过：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_partshtg" value="1" id="sy_email_partshtg_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_partshtg']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_partshtg" value="2" id="sy_email_partshtg_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_partshtg']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailpartshtg">设置模板</a> </div>
               </div>
             </td>
        </tr>
       <tr class="admin_table_trbg">
            <th width="160">兼职审核未通过：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_partshwtg" value="1" id="sy_email_partshwtg_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_partshwtg']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_partshwtg" value="2" id="sy_email_partshwtg_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_partshwtg']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailpartshwtg">设置模板</a> </div>
               </div>
             </td>
        </tr>
		
        <tr>
            <th width="160">申请职位：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_sqzw" value="1" id="sy_email_sqzw_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_sqzw']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_sqzw" value="2" id="sy_email_sqzw_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_sqzw']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailsqzw">设置模板</a> </div>
               </div>
             </td>
        </tr>
         <tr>
            <th width="160">申请职位回复：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_sqzwhf" value="1" id="sy_email_sqzwhf_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_sqzwhf']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_sqzwhf" value="2" id="sy_email_sqzwhf_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_sqzwhf']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailsqzwhf">设置模板</a> </div>
               </div>
             </td>
        </tr>
     <tr class="admin_table_trbg">
            <th width="160">职位过期提醒：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_jobed" value="1" id="sy_email_jobed_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_jobed']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_jobed" value="2" id="sy_email_jobed_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_jobed']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailjobed">设置模板</a> </div>
               </div>
             </td>
        </tr>
        <tr class="admin_table_trbg">
            <th width="160">企业资质审核：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_comcert" value="1" id="sy_email_comcert_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_comcert']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_comcert" value="2" id="sy_email_comcert_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_comcert']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailcomcert">设置模板</a> </div>
               </div>
             </td>
        </tr>
     	<tr class="admin_table_trbg">
            <th width="160">企业订阅：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_comdy" value="1" id="sy_email_comdy_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_comdy']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_comdy" value="2" id="sy_email_comdy_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_comdy']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailcomdy">设置模板</a> </div>
               </div>
             </td>
        </tr>
     	<tr>
            <th width="160">自动发送职位通知：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_notice" value="1" id="sy_email_notice_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_notice']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_notice" value="2" id="sy_email_notice_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_notice']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailnotice">设置模板</a> </div>
               </div>
             </td>
        </tr>
     	<tr class="admin_table_trbg">
            <th width="160">兼职报名：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_partapply" value="1" id="sy_email_partapply_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_partapply']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_partapply" value="2" id="sy_email_partapply_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_partapply']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailpartapply">设置模板</a> </div>
               </div>
             </td>
        </tr>
        <tr>
            <th width="160">招聘会审核通过：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_zphshtg" value="1" id="sy_email_zphshtg_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_zphshtg']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_zphshtg" value="2" id="sy_email_zphshtg_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_zphshtg']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailzphshtg">设置模板</a> </div>
               </div>
             </td>
        </tr>
        <tr class="admin_table_trbg">
            <th width="160">招聘会审核未通过：</th>
            <td>
              <div class="layui-input-block">
                 <div class="layui-input-inline">
                   <input type="radio" name="sy_email_zphshwtg" value="1" id="sy_email_zphshwtg_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_zphshwtg']=="1") {?>checked<?php }?> title="通知">
                   <input type="radio" name="sy_email_zphshwtg" value="2" id="sy_email_zphshwtg_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_zphshwtg']=="2") {?>checked<?php }?> title="不通知">
                 </div>
                 <div class="layui-form-mid layui-word-aux"><a href="?m=emailconfig&c=settpl&name=emailzphshwtg">设置模板</a> </div>
               </div>
             </td>
        </tr>
		

        <tr style="height: 100px;padding-top: 40px;">
			<td style="display: block;text-align: center;">
				<input class="layui-btn tty_sub" id="msgconfig" type="button" name="msgconfig" value="提交" />
				<input class="layui-btn tty_cz" type="reset" value="重置" />
				
			</td>
        </tr>
    </table> 
</form>
</div>
</div>
<input type="hidden" id="emailconfig" value="<?php echo $_smarty_tpl->tpl_vars['emailconfig']->value;?>
">
<?php echo '<script'; ?>
> 
layui.use(['layer', 'form'], function(){
    var layer = layui.layer
    ,form = layui.form
    ,$ = layui.$;
});

$(function(){
	$("#msgconfig").click(function(){
		loadlayer();
		$.post("index.php?m=emailconfig&c=tplsave",{
			config : $("#msgconfig").val(),
			sy_email_dy : $("input[name=sy_email_dy]:checked").val(),
			sy_email_vipmr : $("input[name=sy_email_vipmr]:checked").val(),
			sy_email_yqms : $("input[name=sy_email_yqms]:checked").val(),
			sy_email_yqmshf : $("input[name=sy_email_yqmshf]:checked").val(),
			sy_email_getpass : $("input[name=sy_email_getpass]:checked").val(),
			sy_email_comwdl : $("input[name=sy_email_comwdl]:checked").val(), 
			sy_email_userwdl : $("input[name=sy_email_userwdl]:checked").val(),
			sy_email_userup : $("input[name=sy_email_userup]:checked").val(),
			sy_email_useradd : $("input[name=sy_email_useradd]:checked").val(),
			sy_email_upjob : $("input[name=sy_email_upjob]:checked").val(),
			sy_email_addjob : $("input[name=sy_email_addjob]:checked").val(),
			
			sy_email_reg : $("input[name=sy_email_reg]:checked").val(),
			sy_email_birthday : $("input[name=sy_email_birthday]:checked").val(),
			sy_email_webbirthday : $("input[name=sy_email_webbirthday]:checked").val(),
			sy_email_fkcg : $("input[name=sy_email_fkcg]:checked").val(),
			sy_email_zzshtg : $("input[name=sy_email_zzshtg]:checked").val(),
			sy_email_zzshwtg : $("input[name=sy_email_zzshwtg]:checked").val(),
      sy_email_spmsshtg : $("input[name=sy_email_spmsshtg]:checked").val(),
      sy_email_spmsshwtg : $("input[name=sy_email_spmsshwtg]:checked").val(),
      sy_email_spmsbg : $("input[name=sy_email_spmsbg]:checked").val(),
      
			sy_email_partshtg : $("input[name=sy_email_partshtg]:checked").val(),
			sy_email_partshwtg : $("input[name=sy_email_partshwtg]:checked").val(),
			sy_email_cert : $("input[name=sy_email_cert]:checked").val(),
			sy_email_lock : $("input[name=sy_email_lock]:checked").val(),
			sy_email_userstatus : $("input[name=sy_email_userstatus]:checked").val(),
			sy_email_yyspms : $("input[name=sy_email_yyspms]:checked").val(),
			sy_email_sqzw : $("input[name=sy_email_sqzw]:checked").val(),
			sy_email_sqzwhf : $("input[name=sy_email_sqzwhf]:checked").val(),
			sy_email_jobed : $("input[name=sy_email_jobed]:checked").val(),
			sy_email_comcert : $("input[name=sy_email_comcert]:checked").val(),
			sy_email_remind : $("input[name=sy_email_remind]:checked").val(),
			sy_email_userdy : $("input[name=sy_email_userdy]:checked").val(),
			sy_email_comdy : $("input[name=sy_email_comdy]:checked").val(),
			sy_email_notice : $("input[name=sy_email_notice]:checked").val(),
			sy_email_claim : $("input[name=sy_email_claim]:checked").val(),
			sy_email_recharge : $("input[name=sy_email_recharge]:checked").val(),
			sy_email_partapply : $("input[name=sy_email_partapply]:checked").val(),
			sy_email_subjectshtg : $("input[name=sy_email_subjectshtg]:checked").val(),
			sy_email_subjectshwtg : $("input[name=sy_email_subjectshwtg]:checked").val(),
			sy_email_zphshtg : $("input[name=sy_email_zphshtg]:checked").val(),
			sy_email_zphshwtg : $("input[name=sy_email_zphshwtg]:checked").val(),
			sy_email_logouted : $("input[name=sy_email_logouted]:checked").val(), 
			pytoken : $("#pytoken").val(),  
			sy_email_usercert : $("input[name=sy_email_usercert]:checked").val() 
		},function(data,textStatus){  
			parent.layer.closeAll('loading');
			config_msg(data); 
		});
	});
})

<?php echo '</script'; ?>
>
</div>
</body>
</html><?php }} ?>
