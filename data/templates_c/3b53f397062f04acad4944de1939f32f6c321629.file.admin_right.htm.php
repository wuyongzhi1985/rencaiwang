<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 13:47:55
         compiled from "D:\www\www\phpyun\app\template\admin\admin_right.htm" */ ?>
<?php /*%%SmartyHeaderCode:93146104662e2230b242991-51334349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b53f397062f04acad4944de1939f32f6c321629' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_right.htm',
      1 => 1658739611,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93146104662e2230b242991-51334349',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'index_lookstatistc' => 0,
    'dirname' => 0,
    'mruser' => 0,
    'pyu' => 0,
    'power' => 0,
    'pytoken' => 0,
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e2230b26fb01_72903214',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e2230b26fb01_72903214')) {function content_62e2230b26fb01_72903214($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	
	<link href="images/reset.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" /> 
	
	<?php echo '<script'; ?>
 src="../js/jquery-1.8.0.min.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/admin_public.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" language="javascript"><?php echo '</script'; ?>
> 
	
	<title>后台管理</title>
	
	<?php echo '<script'; ?>
> 
		/*屏蔽所有的js错误*/ 
		function killerrors() {return true;}
		window.onerror = killerrors;
		function logout(){
			if (confirm("您确定要退出控制面板吗？"))
			top.location = 'index.php?c=logout';
			return false;
		}
		var integral_pricename='<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
';
		var tjTbName = 'getweb';
	<?php echo '</script'; ?>
>

	<!--[if IE 6]>
	<?php echo '<script'; ?>
 src="./js/png.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
	  DD_belatedPNG.fix('.png,.header .logo,.header .nav li a,.header .nav li.on,.left_menu h3 span.on');
	<?php echo '</script'; ?>
>
	<![endif]-->
	
</head>
<?php if ($_smarty_tpl->tpl_vars['index_lookstatistc']->value==2) {?>
<body style="font-size:14px; padding-bottom:0; ">
	
	<div id="yunshengji"></div>
	
	<div class="clear"></div>
	
	<?php if (($_smarty_tpl->tpl_vars['dirname']->value||$_smarty_tpl->tpl_vars['mruser']->value==1||$_smarty_tpl->tpl_vars['pyu']->value)&&in_array('161',$_smarty_tpl->tpl_vars['power']->value)) {?>
		<div class="admin_indextip">
			<?php if ($_smarty_tpl->tpl_vars['dirname']->value) {?>为了您的网站安全考虑，强烈建议将 admin,install 文件夹名改为其它名称！<?php }?> 
			<?php if ($_smarty_tpl->tpl_vars['mruser']->value==1) {?>您还没有更改默认的管理员用户名和密码!<a href="index.php?m=admin_user&c=pass" class="admin_index_info_box_a">【马上修改】</a><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['pyu']->value) {?>您的网站本次升级，升级文件还未运行<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/update/index.php" class="admin_index_info_box_a" target="_blank">【马上运行】</a><?php }?>
		</div>
	<?php }?>
	
	<div class="adminR_profit">
		<div class="adminR_profit_r">
			<div class="adminR_profit_r_box">
				<div class="adminR_profit_r_todayuser">
					<div class="adminR_profit_r_todayuser_name">今日新增会员总数</div>
					<div class="adminR_profit_r_todayuser_n" id="ajax_new_member_num">0</div>
				</div>
				<div class="adminR_profit_r_todaymoney">				
					<div class="adminR_profit_r_todayuser_name">今日总收益</div>
					<?php if (!in_array('161',$_smarty_tpl->tpl_vars['power']->value)) {?>
						<div class="admin_index_today_sy_tip">您的权限未能查看，请联系管理员开通财务权限。</div>
					<?php } else { ?>
					<div class="adminR_profit_r_todayuser_n" id="ajax_money_total">0</div>
					<?php }?>
				</div>
			</div>
		</div>
		
		<div class="adminR_profit_m">
			<div class="adminR_profit_m_box">
				<div class="adminR_profit_m_todayqy">
					<div class="adminR_profit_tit"><i class="adminR_profit_todayqy_i3 adminR_profit_todayqy_i"></i>今日新增企业</div>
					<div class="adminR_profit_m_con">
						<div class="d_con">
							<div class="d_con_c_box">
								<i class="adminR_profit_m_con_i1"></i>
								<div class="d_con_c">
									<div class="nub" id='ajax_new_company_num'>0</div>
									<a href="index.php?m=admin_company&adtime=1" class="name">新增企业会员</a>
								</div>
							</div>
						</div>
						<div class="d_con">
							<div class="d_con_c_box">
								<i class="adminR_profit_m_con_i2"></i>
								<div class="d_con_c">
									<div class="nub" id="ajax_new_job_num">0</div>
									<a href="index.php?m=admin_company_job&adtime=1" class="name">新增职位</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="adminR_profit_m_todayqy" style="margin-top: 15px;">
				<div class="adminR_profit_tit"><i class="adminR_profit_todauser_i5 adminR_profit_todauser_i"></i>今日新增人才</div>
				<div class="adminR_profit_m_con">
					<div class="d_con">
						<div class="d_con_c_box">
							<i class="adminR_profit_m_con_i3"></i>
							<div class="d_con_c">
								<div class="nub" id="ajax_new_user_num">0</div>
								<a href="index.php?m=user_member&adtime=1" class="name">新增个人会员</a>
							</div>
						</div>
					</div>
					<div class="d_con">
						<div class="d_con_c_box">
							<i class="adminR_profit_m_con_i4"></i>
							<div class="d_con_c">
								<div class="nub" id="ajax_new_resume_num">0</div>
								<a href="index.php?m=admin_resume&adtime=1" class="name">新增个人简历</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		
		<div class="adminR_profit_l">
			<div class="adminR_profit_l_box">
				<div class="adminR_profit_tit"><i class="adminR_profit_qk_i adminR_profit_qk_i"></i>今日收益情况</div>
				<div class="adminR_profit_l_con">
				<div class="d_con">
					<div class="d_con_box">
						<i class="adminR_profit_l_i1"></i>
						<div class="nub" id="ajax_money_vip">￥0.00</div>
						<a href="index.php?m=company_order&typedd=1&order_state=2&time=1" class="name">会员套餐</a>
					</div>
				</div>
				<div class="d_con">
					<div class="d_con_box">
						<i class="adminR_profit_l_i2"></i>
						<div class="nub" id="ajax_money_service">￥0.00</div>
						<a href="index.php?m=company_order&typedd=5&order_state=2&time=1" class="name">增值服务</a>
					</div>
				</div>
				<div class="d_con">
					<div class="d_con_box">
						<i class="adminR_profit_l_i3"></i>
						<div class="nub" id="ajax_money_integral">￥0.00</div>
						<a href="index.php?m=company_order&order_state=2&time=1" class="name">其他服务</a>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	
	<div class="clear"></div>

	<div class="adminR_tj">
		<div class="adminR_tj_Data_cont" style=" position:relative">
		    <div class="admin_index_Data_cont_box">
				
				<div class="adminR_profit_tit"><i class="adminR_profit_todayqy_i adminR_profit_todayqy_i4"></i>月数据统计</div>
		        
		        <div class="admin_index_date_list">
		            <ul style="width: 100.1%;">
		         		<li class="admin_index_tj_gr admin_index_date_list_cur"><a href="javascript:clicktb('getweb');"><div class="admin_tj_n"><span class="ajax_user">0</span></div>个人注册统计</a><i class="tj_line"></i></li>
		                <li class="admin_index_tj_jl"><a href="javascript:clicktb('resumetj');"><div class="admin_tj_n"><span class="ajax_resume">0</span></div>简历统计</a><i class="tj_line"></i></li>
		              	<li class="admin_index_tj_qy"><a href="javascript:clicktb('comtj');"><div class="admin_tj_n"><span class="ajax_company">0</span></div>企业注册统计</a><i class="tj_line"></i></li>
		                <li class="admin_index_tj_zw"><a href="javascript:clicktb('jobtj');"><div class="admin_tj_n"><span class="ajax_job">0</span></div>职位统计</a><i class="tj_line"></i></li>		                	                
		                <li class="admin_index_tj_ujob"><a href="javascript:clicktb('ujobtj');"><div class="admin_tj_n"><span class="ajax_uj">0</span></div>简历投递统计</a><i class="tj_line"></i></li>		                                
		                <li class="admin_index_tj_yqms"><a href="javascript:clicktb('yqmstj');"><div class="admin_tj_n"><span class="ajax_yqms">0</span></div>邀请面试统计</a><i class="tj_line"></i></li>
		                <li class="admin_index_tj_downresume"><a href="javascript:clicktb('downresumetj');"><div class="admin_tj_n"><span class="ajax_downresume">0</span></div>简历下载统计</a><i class="tj_line"></i></li>		                
						<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_chat_open']==1) {?>
						<li class="admin_index_tj_pg"><a href="javascript:clicktb('chattj');"><div class="admin_tj_n"><span class="ajax_chat">0</span></div>聊天统计</a></li>
						<?php } else { ?>
						<li class="admin_index_tj_gg"><a href="javascript:clicktb('adtj');"><div class="admin_tj_n"><span class="ajax_gg">0</span></div>广告点击统计</a></li>
						<?php }?>
		            </ul>
		        </div>
				
				<div class="admin_index_Data_cont_left">
				    <div class="admin_index_fw" id="main22">
						<div class="bodyIfmData">
							<!--暂时注释，别删！！！-->
							<!--<span class="tjDays" data-cur="1">近7天</span>-->
							<!--<span class="tjDays" data-cur="2">近30天</span>-->
							<span class="data_boxtime spanClickut" id="tjTime" style="cursor:pointer;"><input type="text" id="tjTimev" autocomplete="false" placeholder="年月" /></span>
						</div>
				        <iframe name="right" id="tbrightMain" src="index.php?m=admin_right&c=getweb" frameborder="false" scrolling="auto" style="border:none;" width="100%" height="350" allowtransparency="true"></iframe>
				    </div>
				</div>
		    </div>
		</div>
		
		
		<div class="admin_index_bgboxpd">
		
			<div class="admin_index_bgbox">
				<div class="adminR_profit_tit"><i class="adminR_profit_todayqy_i adminR_profit_todayqy_i5"></i>待处理事项</div>
				<div class="ajax_msgnum">
				<?php if (in_array('999',$_smarty_tpl->tpl_vars['power']->value)) {?>
				<div class="admin_index_dshbox">
				<a href="index.php?m=admin_message&status=1" class="admin_index_dsh_xw ajaxhandle_hide"><div class="admin_index_db_n"><span class="ajaxhandle" >0</span></div>待处理意见反馈</a>
				<a href="index.php?m=admin_company&status=4" class="admin_index_dsh_qy ajaxcompany_hide"><div class="admin_index_db_n"><span class="ajaxcompany" >0</span></div>待审核企业会员</a>
				<a href="index.php?m=admin_company_job&state=4" class="admin_index_dsh_zw ajaxjob_hide"><div class="admin_index_db_n"><span class="ajaxjob" >0</span></div>待审核职位</a>
				<a href="index.php?m=admin_partjob&state=4" class="admin_index_dsh_jz ajaxpartjob_hide"><div class="admin_index_db_n"><span class="ajaxpartjob" >0</span></div>待审核兼职</a>
				<a href="index.php?m=productnews&status=3" class="admin_index_dsh_cp ajaxcomproduct_hide"><div class="admin_index_db_n"><span class="ajaxcomproduct" >0</span></div>待审核企业产品</a>
				<a href="index.php?m=productnews&c=comnews&status=3" class="admin_index_dsh_xw ajaxcomnews_hide"><div class="admin_index_db_n"><span class="ajaxcomnews" >0</span></div>待审核企业新闻</a>
				<a href="index.php?m=comcert&status=3" class="admin_index_dsh_rz ajaxcomcert_hide"><div class="admin_index_db_n"><span class="ajaxcomcert" >0</span></div>待审核企业资质</a>
				<a href="index.php?m=admin_company_pic&status=1" class="admin_index_dsh_logo ajaxcomlogo_hide"><div class="admin_index_db_n"><span class="ajaxcomlogo" >0</span></div>待审核企业LOGO</a>
				<a href="index.php?m=admin_company_pic&c=show&status=1" class="admin_index_dsh_logo ajaxcomshow_hide"><div class="admin_index_db_n"><span class="ajaxcomshow" >0</span></div>待审核企业环境</a>
				<a href="index.php?m=admin_company_pic&c=banner&status=1" class="admin_index_dsh_logo ajaxcombanner_hide"><div class="admin_index_db_n"><span class="ajaxcombanner" >0</span></div>待审核企业横幅</a>
				<a href="index.php?m=admin_resume&status=4" class="admin_index_dsh_jl ajaxresume_hide"><div class="admin_index_db_n"><span class="ajaxresume" >0</span></div>待审核简历</a>
				<a href="index.php?m=usercert&status=2" class="admin_index_dsh_rz ajaxusercert_hide"><div class="admin_index_db_n"><span class="ajaxusercert" >0</span></div>待审核个人认证</a>
				<a href="index.php?m=admin_user_pic&status=1" class="admin_index_dsh ajaxuserpic_hide"><div class="admin_index_db_n"><span class="ajaxuserpic" >0</span></div>待审核个人头像</a>
				<a href="index.php?m=admin_user_pic&c=show&status=1" class="admin_index_dsh ajaxusershow_hide"><div class="admin_index_db_n"><span class="ajaxusershow" >0</span></div>待审核个人作品</a>
				<a href="index.php?m=admin_once&status=3" class="admin_index_dsh_dp ajaxonce_hide"><div class="admin_index_db_n"><span class="ajaxonce" >0</span></div>待审核店铺招聘</a>
				<a href="index.php?m=admin_tiny&status=2" class="admin_index_dsh_pg ajaxtiny_hide"><div class="admin_index_db_n"><span class="ajaxtiny" >0</span></div>待审核普工简历</a>
				
				<a href="index.php?m=zhaopinhui&c=com&status=3" class="admin_index_dsh_ch ajaxzphcom_hide"><div class="admin_index_db_n"><span class="ajaxzphcom" >0</span></div>待审核参会企业</a>
				<a href="index.php?m=admin_question&status=0" class="admin_index_dsh_wd ajaxask_hide"><div class="admin_index_db_n"><span class="ajaxask" >0</span></div>待审核问答</a>
				<a href="index.php?m=reward_list&status=-1" class="admin_index_dsh_dh ajaxredeem_hide"><div class="admin_index_db_n"><span class="ajaxredeem" >0</span></div>待审核商品兑换</a>
				<a href="index.php?m=company_order&order_state=1" class="admin_index_dsh_cz ajaxorder_hide"><div class="admin_index_db_n"><span class="ajaxorder" >0</span></div>待处理充值订单</a>
				
				<a href="index.php?m=special" class="admin_index_dsh_qyzt ajaxspecialcom_hide"><div class="admin_index_db_n"><span class="ajaxspecialcom" >0</span></div>待审核企业专题</a>
				
				<a href="index.php?m=report" class="admin_index_dsh_jb ajaxreportjob_hide"><div class="admin_index_db_n"><span class="ajaxreportjob" >0</span></div>待处理举报职位</a>
				<a href="index.php?m=report&ut=2" class="admin_index_dsh_jb ajaxreportresume_hide"><div class="admin_index_db_n"><span class="ajaxreportresume" >0</span></div>待处理举报简历</a>
				<a href="index.php?m=report&type=1 "class="admin_index_dsh_jb ajaxreportask_hide"><div class="admin_index_db_n"><span class="ajaxreportask" >0</span></div>待处理举报问答</a>
				<a href="index.php?m=admin_appeal" class="admin_index_dsh_ss ajaxappeal_hide"><div class="admin_index_db_n"><span class="ajaxappeal" >0</span></div>待处理账号申诉</a>
				<a href="index.php?m=report&type=2" class="admin_index_dsh_ts ajaxreportgw_hide"><div class="admin_index_db_n"><span class="ajaxreportgw" >0</span></div>待处理投诉顾问</a>
				
				<a href="index.php?m=link&state=2" class="admin_index_dsh_lj ajaxlink_hide"><div class="admin_index_db_n"><span class="ajaxlink" >0</span></div>待审核友情链接</a>
				
				<a href="index.php?m=admin_member_logout&status=1" class="admin_index_dsh_pg ajaxlogout_hide"><div class="admin_index_db_n"><span class="ajaxlogout" >0</span></div>待处理注销账号</a>
				
				<a href="index.php?m=admin_yqmb&status=0" class="admin_index_dsh_xw ajaxyqmb_hide"><div class="admin_index_db_n"><span class="ajaxyqmb" >0</span></div>待审核面试模板</a>
				<a href="index.php?m=admin_msg&status=0" class="admin_index_dsh_xw ajaxusermsg_hide"><div class="admin_index_db_n"><span class="ajaxusermsg" >0</span></div>待审核求职咨询</a>
				<a href="index.php?m=admin_question&c=getanswer&status=0" class="admin_index_dsh_xw ajaxanswer_hide"><div class="admin_index_db_n"><span class="ajaxanswer" >0</span></div>待审核问答回复</a>
				<a href="index.php?m=admin_question&c=getcomment&status=0" class="admin_index_dsh_xw ajaxanswerreview_hide"><div class="admin_index_db_n"><span class="ajaxanswerreview" >0</span></div>待审核问答评论</a>
				
			</div>
			
			<?php }?>	
		</div>
		<div class="zwtip">暂时没有待处理事项哦</div>
		
			</div>
	</div>
		
	</div>

	<div class="admin_index_center">
		<div class="admin_index_Data">
			<div class="admin_index_Data_bor">
				<div class="admin_message_h1">
					<div class="admin_message_h1_tit">
					    <span class="admin_message_h1_s admin_message_h1_cur" data-a="index_dt">网站动态</span>
					    <span class="admin_message_h1_s" data-a="index_rz">会员日志</span>
					    </div>
					</div>
					
		    		<div class="admin_index_Data_cont" style="position:relative; display:block" id="index_dt">
		   
			 			<div class="admin_index_Data_cont_rz">
			 				
			 				<div class="admin_index_Data_cont_rz_tit admin_dt1">
		         				<ul>
					                <li><a href="javascript:clicktbdt('downresumedt');" class="admin_index_Data_cont_rz_tit_li">下载简历动态</a></li>
					                <li><a href="javascript:clicktbdt('useridjobdt');">职位申请动态</a></li>
					                <li><a href="javascript:clicktbdt('lookjobdt');" >职位浏览动态</a></li>
					                <li><a href="javascript:clicktbdt('lookresumedt');" >简历浏览动态</a></li>
					                <li><a href="javascript:clicktbdt('favjobdt');" >职位收藏动态</a></li>
					                <li><a href="javascript:clicktbdt('payorderdt');" >充值动态</a></li>
					            </ul> 
		            		</div>
		      
					        <div class="admin_index_Data_cont_left">
					            <div class="" id="main22">
					                <iframe name="right" id="tbrightMaindt" src="index.php?m=admin_right&c=downresumedt" frameborder="false" scrolling="auto" style="border:none;" width="100%" height="300" allowtransparency="true"></iframe>
					            </div>
					        </div>
					
						</div>
		    		</div>
		   
					<div class="admin_index_Data_cont" style="position:relative; display:none" id="index_rz">
						<div class="admin_index_Data_cont_rz">
					   		<div class="admin_index_Data_cont_rz_tit admin_dt2">
					       		<ul>
					            	<li><a href="javascript:clicktbrz('userrz');" class="admin_index_Data_cont_rz_tit_li">个人会员日志</a></li>
					                <li><a href="javascript:clicktbrz('comrz');">企业会员日志</a></li>
					            </ul>
					 		</div>
					 		
					        <div class="admin_index_Data_cont_left" >
					            <div class="" id="main22">
					                <iframe name="right" id="tbrightMainrz" src="index.php?m=admin_right&c=userrz" frameborder="false" scrolling="auto" style="border:none;" width="100%" height="300" allowtransparency="true"></iframe>
					            </div>
					        </div>
					    </div>
				    </div>
				</div>
		</div>
	</div>
	<input type="hidden" name="pytoken" id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"/>

	<?php echo '<script'; ?>
 type="text/javascript">
		//获取完整的日期
		var date=new Date;
		var year=date.getFullYear();
		var month=date.getMonth()+1;
		month = month < 10 ? "0"+month : month;

		var tjTime = (year.toString() + '-' + month.toString()),
			toTjTime = (year.toString() + '-' + month.toString()),
			edate = '',
			tjDaysCur = '';
		var pytoken	=	$('#pytoken').val();
		function dk(){$("#edition_box_yun").show();$(".edition_box_bg").show();}
		function gb(){$("#edition_box_yun").hide();$(".edition_box_bg").hide();}
		function clicktb(name){
			tjTbName = name;
			tjChangeSrc(tjDaysCur);
		}
		function clicktbdt(name){
			$("#tbrightMaindt").attr("src","index.php?m=admin_right&c="+name);
		}
		function clicktbrz(name){
			$("#tbrightMainrz").attr("src","index.php?m=admin_right&c="+name);
		}
		$(document).ready(function(){
			$(".admin_message_h1_s").click(function(){
				$(".admin_message_h1_s").attr("class","admin_message_h1_s");
				$(this).attr("class","admin_message_h1_s admin_message_h1_cur");
				var a=$(this).attr("data-a");
				$(".admin_index_Data_cont").hide();
				$("#"+a).show();
			});
		})
	<?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="https://init.phpyun.com/site.php?site=<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
">//此代码为远程获取补丁及通知，请不要删除<?php echo '</script'; ?>
>
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

	<?php echo '<script'; ?>
 type="text/javascript">
		function monthTj() {
			let param = {
				pytoken: '<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
'
			};
			if(edate != '') {
				param.sdate = tjTime;
				param.edate = edate;
			}

			$.post("index.php?m=admin_right&c=ajax_statis", param, function(data){
				var o = eval( '(' + data + ')' );

				$('#ajax_new_member_num').html(o.memberNum);

				if(o.moneyTotal){
					$('#ajax_money_total').html(o.moneyTotal);
				}

				$('#ajax_new_company_num').html(o.companyNum);
				$('#ajax_new_job_num').html(o.jobNum);

				$('#ajax_new_user_num').html(o.userNum);
				$('#ajax_new_resume_num').html(o.resumeNum);

				if(o.moneyVip){
					$('#ajax_money_vip').html('￥'+o.moneyVip);
				}
				if(o.moneyService){
					$('#ajax_money_service').html('￥'+o.moneyService);
				}
				if(o.moneyIntegral){
					$('#ajax_money_integral').html('￥'+o.moneyIntegral);
				}

				if(o.resumeNumMon) {
					$('.ajax_resume').html(o.resumeNumMon);
				}
				if(o.jobNumMon) {
					$('.ajax_job').html(o.jobNumMon);
				}
				if(o.companyNumMon) {
					$('.ajax_company').html(o.companyNumMon);
				}
				if(o.userNumMon) {
					$('.ajax_user').html(o.userNumMon);
				}
				if(o.newsNumMon) {
					$('.ajax_news').html(o.newsNumMon);
				}
				if(o.userjobNumMon){
					$('.ajax_uj').html(o.userjobNumMon);
				}
				if(o.ggNumMon) {
					$('.ajax_gg').html(o.ggNumMon);
				}
				if(o.onceNumMon) {
					$('.ajax_once').html(o.onceNumMon);
				}
				if(o.yqmsNumMon){
					$('.ajax_yqms').html(o.yqmsNumMon);
				}
				if(o.downreusmeNumMon){
					$('.ajax_downresume').html(o.downreusmeNumMon);
				}
				if(o.tinyNumMon) {
					$('.ajax_tiny').html(o.tinyNumMon);
				}
				if(o.chatNumMon){
					$('.ajax_chat').html(o.chatNumMon);
				}
			});
		}

		$(document).ready(function(){
			monthTj();
			
			$.get("index.php?c=msgNum", function(data) {
				var datas = eval('(' + data + ')');
				if(datas.handlenum > 0){
					$('.ajaxhandle').html(datas.handlenum);
				}else{
					$('.ajaxhandle_hide').hide();
				}
				
				if(datas.msgNum > 0){
					$('.ajax_msgnum').show();
				}else{
					$('.ajax_msgnum').hide();
				}
				
				if(datas.company_job) {
					$('.ajaxjob').html(datas.company_job);
				}else{
					$('.ajaxjob_hide').hide();
				}
				if(datas.userchangenum){
					$('.ajaxuserchange').html(datas.userchangenum);
				}else{
					$('.ajaxuserchange_hide').hide();
				}
				if(datas.company) {
					$('.ajaxcompany').html(datas.company);
				}else{
					$('.ajaxcompany_hide').hide();
				}
				
				if(datas.partjob) {
					$('.ajaxpartjob').html(datas.partjob);
				}else{
					$('.ajaxpartjob_hide').hide();
				}
				
				if(datas.company_product) {
					$('.ajaxcomproduct').html(datas.company_product);
				}else{
					$('.ajaxcomproduct_hide').hide();
				}
				
				if(datas.company_news) {
					$('.ajaxcomnews').html(datas.company_news);
				}else{
					$('.ajaxcomnews_hide').hide();
				}
				
				if(datas.company_cert) {
					$('.ajaxcomcert').html(datas.company_cert);
				}else{
					$('.ajaxcomcert_hide').hide();
				}
				
				if(datas.comlogo) {
					$('.ajaxcomlogo').html(datas.comlogo);
				}else{
					$('.ajaxcomlogo_hide').hide();
				}
				
				if(datas.comshow) {
					$('.ajaxcomshow').html(datas.comshow);
				}else{
					$('.ajaxcomshow_hide').hide();
				}
				
				if(datas.combanner) {
					$('.ajaxcombanner').html(datas.combanner);
				}else{
					$('.ajaxcombanner_hide').hide();
				}
				
				
				if(datas.resume_expect) {
					$('.ajaxresume').html(datas.resume_expect);
				}else{
					$('.ajaxresume_hide').hide();
				}
				
				if(datas.usercertNum) {
					$('.ajaxusercert').html(datas.usercertNum);
				}else{
					$('.ajaxusercert_hide').hide();
				}
				
				if(datas.resumetrust) {
					$('.ajaxresumetrust').html(datas.resumetrust);
				}else{
					$('.ajaxresumetrust_hide').hide();
				}
				
				if(datas.userpic) {
					$('.ajaxuserpic').html(datas.userpic);
				}else{
					$('.ajaxuserpic_hide').hide();
				}
				
				if(datas.usershow) {
					$('.ajaxusershow').html(datas.usershow);
				}else{
					$('.ajaxusershow_hide').hide();
				}
				
				if(datas.once_job) {
					$('.ajaxonce').html(datas.once_job);
				}else{
					$('.ajaxonce_hide').hide();
				}
				if(datas.tiny) {
					$('.ajaxtiny').html(datas.tiny);
				}else{
					$('.ajaxtiny_hide').hide();
				}
				if(datas.zphcom) {
					$('.ajaxzphcom').html(datas.zphcom);
				}else{
					$('.ajaxzphcom_hide').hide();
				}
				if(datas.ask) {
					$('.ajaxask').html(datas.ask);
				}else{
					$('.ajaxask_hide').hide();
				}
				if(datas.redeem) {
					$('.ajaxredeem').html(datas.redeem);
				}else{
					$('.ajaxredeem_hide').hide();
				}
				if(datas.invoiceNum) {
					$('.ajaxinvoice').html(datas.invoiceNum);
				}else{
					$('.ajaxinvoice_hide').hide();
				}
				if(datas.order) {
					$('.ajaxorder').html(datas.order);
				}else{
					$('.ajaxorder_hide').hide();
				}
				if(datas.withdrawNum) {
					$('.ajaxwithdraw').html(datas.withdrawNum);
				}else{
					$('.ajaxwithdraw_hide').hide();
				}
				if(datas.adorder) {
					$('.ajaxadorder').html(datas.adorder);
				}else{
					$('.ajaxadorder_hide').hide();
				}
				if(datas.specialcom) {
					$('.ajaxspecialcom').html(datas.specialcom);
				}else{
					$('.ajaxspecialcom_hide').hide();
				}
				if(datas.reportjob) {
					$('.ajaxreportjob').html(datas.reportjob);
				}else{
					$('.ajaxreportjob_hide').hide();
				}
				if(datas.reportresume) {
					$('.ajaxreportresume').html(datas.reportresume);
				}else{
					$('.ajaxreportresume_hide').hide();
				}
				if(datas.reportask) {
					$('.ajaxreportask').html(datas.reportask);
				}else{
					$('.ajaxreportask_hide').hide();
				}
				if(datas.reportgw) {
					$('.ajaxreportgw').html(datas.reportgw);
				}else{
					$('.ajaxreportgw_hide').hide();
				}
				
		  
				if(datas.appealnum) {
					$('.ajaxappeal').html(datas.appealnum);
				}else{
					$('.ajaxappeal_hide').hide();
				}
				if(datas.linkNum) {
					$('.ajaxlink').html(datas.linkNum);
				}else{
					$('.ajaxlink_hide').hide();
				}
				
				if(datas.logout) {
					$('.ajaxlogout').html(datas.logout);
				}else{
					$('.ajaxlogout_hide').hide();
				}
				
				if(datas.yqmb_msg) {
					$('.ajaxyqmb').html(datas.yqmb_msg);
				}else{
					$('.ajaxyqmb_hide').hide();
				}
				if(datas.usermsg_msg) {
					$('.ajaxusermsg').html(datas.usermsg_msg);
				}else{
					$('.ajaxusermsg_hide').hide();
				}
				if(datas.answer_msg) {
					$('.ajaxanswer').html(datas.answer_msg);
				}else{
					$('.ajaxanswer_hide').hide();
				}
				if(datas.answerreview_msg) {
					$('.ajaxanswerreview').html(datas.answerreview_msg);
				}else{
					$('.ajaxanswerreview_hide').hide();
				}
			});
		});


		$('.admin_index_date_list li').each(function(){
			$(this).click(function(){
				$('.admin_index_date_list li').removeClass("admin_index_date_list_cur")
				$(this).addClass("admin_index_date_list_cur")
			})
		})

		$('.admin_dt1 li a').each(function(){
			$(this).click(function(){
				$('.admin_dt1 li a').removeClass("admin_index_Data_cont_rz_tit_li")
				$(this).addClass("admin_index_Data_cont_rz_tit_li")
			})
		})
		$('.admin_dt2 li a').each(function(){
			$(this).click(function(){
				$('.admin_dt2 li a').removeClass("admin_index_Data_cont_rz_tit_li")
				$(this).addClass("admin_index_Data_cont_rz_tit_li")
			})
		})

		layui.use(['form', 'laydate', 'element'], function () {
			var form = layui.form
				, element = layui.element
				, laydate = layui.laydate
				, $ = layui.$;

			laydate.render({
				elem: '#tjTime'
				,btns: ['now', 'confirm']
				, type: 'month'
				, max: year.toString() + '-' + month.toString()
				, value: tjTime
				, done: function (value, date) {
					$("#tjTime").addClass("spanClickut").siblings().removeClass('spanClickut');
					tjTime = value;
					let ym = new Date(date.year,date.month,0).getDate(); // 月未最后一天
					if (toTjTime == value) {
						edate = '';
					} else {
						edate = value + '-' + (ym < 10 ? "0" + ym : ym);
					}
					monthTj();
					tjChangeSrc('');
				}
			});
		});

		$(".bodyIfmData .tjDays").click(function () {
            $(this).addClass("spanClickut").siblings().removeClass('spanClickut');
			tjChangeSrc($(this).data('cur'));
        });

		function tjChangeSrc(tjDays) {
			tjDaysCur = tjDays;
			let url = "index.php?m=admin_right&c=" + tjTbName;
			if (tjDays == 1) {
				$("#tbrightMain").attr("src", url + "&days=" + 7);
			} else if (tjDays == 2) {
				$("#tbrightMain").attr("src", url + "&days=" + 30);
			} else if(edate != '') {
				$("#tbrightMain").attr("src", url + "&sdate=" + tjTime + "&edate=" + edate);
			} else {
				$("#tbrightMain").attr("src", url);
			}
		}
	<?php echo '</script'; ?>
>
</body>
<?php } else { ?>
<body style="font-size:14px; padding-bottom:0; ">
	<div class="layui-form-item">
	 	<div class="zwtip">可点击所需栏目，开启工作哟~ </div>
		
	</div>
</body>
<?php }?>

</html><?php }} ?>
