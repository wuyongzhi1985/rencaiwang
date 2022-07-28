<?php
/*
* $Author ：PHPYUN开发团队
*
* 官网: http://www.phpyun.com
*
* 版权所有 2009-2021 宿迁鑫潮信息技术有限公司，并保留所有权利。
*
* 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。

* 注:本文件为系统文件，请不要修改
*/
$arr_data = array (
	'pay' => array ('alipay'=>'支付宝','tenpay'=>'财富通','bank'=>'银行转帐','alipaydual'=>'支付宝双接口','alipayescow'=>'担保交易','adminpay'=>'管理员充值','balance'=>'余额支付','admincut'=>'管理员扣款','wapalipay'=>'支付宝手机支付'),
	'source' => array ('1'=>'网页','2'=>'手机','4'=>'微信','6'=>'采集','8'=>'QQ登录','9'=>'微信扫一扫','10'=>'微博','11'=>'PC快速投递','12'=>'WAP快速投递','21'=>'账户分离'),


	'sex' => array ('3'=>'不限','1'=>'男','2'=>'女'),	
    'paystate' => array ('<font color=red>支付失败</font>','<font color=green>等待付款</font>','<font color=#3d7dfd>支付成功</font>','<font color=#c30ad9>等待确认</font>','<font color=red>交易关闭</font>'),
	//订单类型
	'ordertype' => array(
			1  => '会员充值（购买会员）',
			2  => '积分充值',
			3  => '银行转帐',
			4  => '金额充值',
			5  => '购买增值包',
			10 => '职位置顶',
			11 => '职位紧急',
			12 => '职位推荐',
			13 => '自动刷新',
			14 => '简历置顶',
			16 => '刷新职位',
			17 => '刷新兼职',
			19 => '下载简历',
			20 => '发布职位',
			21 => '发布兼职',
			23 => '面试邀请',
			24 => '兼职推荐',
			25 => '店铺招聘',
			28 => '招聘会报名'
	    ),

 	//简历完整度，用于前后台列表筛选
	'integrity_name' => array('1'=>'55%以上','2'=>'65%以上','3'=>'75%以上','4'=>'85%以上'),
	'integrity_val' => array('1'=>'55','2'=>'65','3'=>'75','4'=>'85'),
	
	'cache' => array (
	    '1'=>'区域分类',
	    '2'=>'行业分类',
	    '3'=>'职位分类',
	    '4'=>'个人分类',
	    '5'=>'企业分类',
	    '6'=>'分站缓存',
	    '7'=>'网站缓存',
	    '8'=>'SEO设置',
	    '9'=>'网站导航',
	    '10'=>'兼职分类',
	    '11'=>'友情链接',
	    '12'=>'新闻分类',
	    '13'=>'商品分类',
	    '14'=>'广告缓存',
	    '15'=>'举报原因',
	    '16'=>'积分优惠',
	    '18'=>'自定义WAP导航',
	    '19'=>'网站地图',
	    '20'=>'问答分类',
	    '23'=>'自我介绍',
	    '24'=>'关键字',
	    '25'=>'单页面分类',
	    '26'=>'数据库',
	    '27'=>'邮件服务器',
		'29'=>'计划任务'
	),
	'faceurl' => '/config/face/',
	'imface' => array ('CNM'=>'shenshou_org.gif','SM'=>'horse2_org.gif','FU'=>'fuyun_org.gif','GL'=>'geili_org.gif','WG'=>'wg_org.gif','VW'=>'vw_org.gif','XM'=>'panda_org.gif','TZ'=>'rabbit_org.gif','OTM'=>'otm_org.gif','JU'=>'j_org.gif','HF'=>'hufen_org.gif','LW'=>'liwu_org.gif','HH'=>'smilea_org.gif','XX'=>'tootha_org.gif','HH2'=>'laugh.gif','TZA'=>'tza_org.gif','KL'=>'kl_org.gif','WBS'=>'kbsa_org.gif','CJ'=>'cj_org.gif','HX'=>'shamea_org.gif','ZY'=>'zy_org.gif','BZ'=>'bz_org.gif','BS2'=>'bs2_org.gif','LOVE'=>'lovea_org.gif','LEI'=>'sada_org.gif','TX'=>'heia_org.gif','QQ'=>'qq_org.gif','SB'=>'sb_org.gif','TKX'=>'mb_org.gif','LD'=>'ldln_org.gif','YHH'=>'yhh_org.gif','ZHH'=>'zhh_org.gif','XU'=>'x_org.gif','cry'=>'cry.gif','WQ'=>'wq_org.gif','T'=>'t_org.gif','DHQ'=>'k_org.gif','BBA'=>'bba_org.gif','N'=>'angrya_org.gif','YW'=>'yw_org.gif','CZ'=>'cza_org.gif','88'=>'88_org.gif','SI'=>'sk_org.gif','HAN'=>'sweata_org.gif','sl'=>'sleepya_org.gif','SJ'=>'sleepa_org.gif','P'=>'money_org.gif','SW'=>'sw_org.gif','K'=>'cool_org.gif','HXA'=>'hsa_org.gif','H'=>'hatea_org.gif','GZ'=>'gza_org.gif','YD'=>'dizzya_org.gif','BS'=>'bs_org.gif','ZK'=>'crazya_org.gif','HX2'=>'h_org.gif','YX'=>'yx_org.gif','NM'=>'nm_org.gif','XIN'=>'hearta_org.gif','SX'=>'unheart.gif','PIG'=>'pig.gif','ok'=>'ok_org.gif','ye'=>'ye_org.gif','good'=>'good_org.gif','no'=>'no_org.gif','Z'=>'z2_org.gif','go'=>'come_org.gif','R'=>'sad_org.gif','lz'=>'lazu_org.gif','CL'=>'clock_org.gif','ht'=>'m_org.gif','dg'=>'cake.gif'),
	'datacall' => array(
		'resume'=>array('简历','order'=>array('id,desc'=>'最新简历','hits,desc'=>'热门简历','lastedit,desc'=>'更新时间'),'field'=>array('resumename'=>'简历名称','name'=>'姓名','url'=>'链接','birthday'=>'年龄','edu'=>'学历','lastedit'=>'更新时间','hits'=>'浏览次数','big_pic'=>'大头像','small_pic'=>'小头像','email'=>'EMAIL','tel'=>'电话','moblie'=>'手机','hy'=>'期望从事行业','hyurl'=>'期望从事行业链接','job_classid'=>'期望从事职位','report'=>'到岗时间','salary'=>'期望薪水','type'=>'期望工作性质','gz_city'=>'期望工作地点(江苏-南京)','domicile'=>'户籍所在地','living'=>'现居住地','exp'=>'工作经验','address'=>'详细地址','description'=>'个人简介','idcard'=>'身份证号码','homepage'=>'个人主页/博客')),
		'member'=>array('用户','order'=>array('uid,desc'=>'最新用户','login_date,desc'=>'最后登录时间','login_hits,desc'=>'热门用户'),'field'=>array('name'=>'用户名','url'=>'链接','email'=>'EMAIL','moblie'=>'手机','usertype'=>'用户类型','hits'=>'登录次数','reg_date'=>'注册时间','login_date'=>'登录时间'),'where'=>array('usertype'=>array('0'=>'用户类型','1'=>'个人用户','2'=>'企业用户'))),
		'company'=>array('公司','order'=>array('uid,desc'=>'最新企业','hits,desc'=>'热门企业','lastedit,desc'=>'更新时间'),'field'=>array('companyname'=>'公司名称','url'=>'公司链接','hy'=>'行业','hy_url'=>'行业链接','pr'=>'公司性质','city'=>'企业地址','mun'=>'企业规模','address'=>'企业地址','linkphone'=>'固定电话','linkmail'=>'联系邮箱','sdate'=>'创办时间','money'=>'注册资金','zip'=>'邮政编码','linkman'=>'联系人','job_num'=>'职位数','linkqq'=>'联系QQ','linktel'=>'联系电话','website'=>'企业网址','logo'=>'企业LOGO')),
		'job'=>array('职位','order'=>array('id,desc'=>'最新职位','hits,desc'=>'热门职位','rec_time,desc'=>'推荐职位','urgent_time,desc'=>'紧急职位','lastedit,desc'=>'更新时间'),'field'=>array('jobname'=>'职位名称','companyname'=>'公司名称','url'=>'职位链接','com_url'=>'公司链接','hy'=>'从事行业','hy_url'=>'行业链接','num'=>'招聘人数','jobtype'=>'职位类型','edu'=>'学历要求','age'=>'年龄要求','report'=>'到岗时间','exp'=>'工作经验','lang'=>'语言要求','salary'=>'提供月薪','welfare'=>'福利待遇','time'=>'更新时间','city'=>'工作地点')),
		'zph'=>array('招聘会','order'=>array('id,desc'=>'最新招聘会'),'field'=>array('title'=>'招聘会标题','url'=>'链接','organizers'=>'主办方','time'=>'举办时间','address'=>'举办会场','phone'=>'咨询电话','linkman'=>'联系人','website'=>'网址','logo'=>'招聘会LOGO','com_num'=>'参与企业数')),
		'news'=>array('新闻','order'=>array('id,desc'=>'最新新闻','hits,desc'=>'热门新闻'),'field'=>array('title'=>'新闻标题','url'=>'链接','keyword'=>'关键字','author'=>'作者','time'=>'发布时间','hits'=>'点击率','description'=>'描述','thumb'=>'缩略图','source'=>'来源')),
		'ask'=>array('问答','order'=>array('id,desc'=>'最新问答','answer_num,desc'=>'热门问答'),'field'=>array('title'=>'问答标题','url'=>'问答链接','content'=>'问答内容','name'=>'发布人','time'=>'发布时间','answer_num'=>'回答人数','img'=>'发布人头像','user_url'=>'发布人链接')),
		'link'=>array('友情链接','order'=>array('id,desc'=>'最新友链','link_sorting,desc'=>'排序(大前小后)','link_sorting,asc'=>'排序(小前大后)'),'field'=>array('link_name'=>'名称','link_url'=>'链接','link_src'=>'图片地址(图片链接使用)'),'where'=>array('img_type'=>array('0'=>'友链类型','1'=>'文字连接','2'=>'图片链接'))),
	    'once'=>array('店铺招聘','order'=>array('id,desc'=>'最新店铺招聘','lastedit,desc'=>'更新时间'),'field'=>array('jobname'=>'职位名称','url'=>'链接','companyname'=>'公司名称','mans'=>'招聘人数','require'=>'招聘要求','phone'=>'联系电话','linkman'=>'联系人','address'=>'联系地址','time'=>'更新时间')),
		'tiny'=>array('普工简历','order'=>array('id,desc'=>'最新普工简历','lastedit,desc'=>'更新时间'),'field'=>array('name'=>'姓名','url'=>'链接','sex'=>'性别','exp'=>'工作经验','job'=>'应聘职位','mobile'=>'联系电话','describe'=>'个人说明','time'=>'更新时间')),
		'keyword'=>array('热门关键字','order'=>array('num,desc'=>'搜索次数'),'field'=>array('name'=>'关键字名称','url'=>'链接','num'=>'搜索次数'),'where'=>array('keytype'=>array('0'=>'关键字类型','1'=>'店铺招聘','3'=>'职位','4'=>'公司','5'=>'简历')))
	),
	'seomodel'=>array('index'=>'首页','job'=>'找工作','resume'=>'找人才','part'=>'兼职','company'=>'公司','article'=>'新闻公告','hr'=>'工具箱','zph'=>'招聘会','ask'=>'问答','evaluate'=>'测评','once'=>'店铺','tiny'=>'普工','redeem'=>'商城','map'=>'地图','special'=>'专题','login'=>'登录注册','other'=>'其它'
	),
    'modelconfig'=>array('job'=>'找工作','resume'=>'找人才','part'=>'兼职','company'=>'找企业','wap'=>'手机端','article'=>'资讯','announcement'=>'公告','hr'=>'工具箱','zph'=>'招聘会','ask'=>'问答','evaluate'=>'测评','once'=>'店铺招聘','tiny'=>'普工简历','redeem'=>'商城','map'=>'地图','special'=>'专题招聘','login'=>'登录','register'=>'注册', 'gongzhao'=>'公招', 'error'=>'错误提醒'),
	'seoconfig'=>array(
		'public'=>array(
			'webname'=>'网站名称',
			'webkeyword'=>'网站关键字',
			'webdesc'=>'网站描述',
			'weburl'=>'网址',
			'city'=>'当前城市',
			'seacrh_class'=>'搜索类别',
		    'search_city'=>'搜索城市',
		    'search_job'=>'搜索职能',
		),
		'other'=>array(
			'spename'=>'专题名称', 
		),
		'article'=>array(
			'news_class'=>'新闻类别',
			'news_title'=>'新闻标题',
			'news_keyword'=>'新闻关键字',
			'news_source'=>'新闻来源',
			'news_author'=>'新闻作者',
			'news_desc'=>'新闻描述',
			'gg_title'=>'公告标题',
			'gg_desc'=>'公告描述',
		    'gz_title'=>'公招标题',
		    'gz_desc'=>'公招描述',
		),
		'company'=>array(
			'company_name'=>'企业名称',
			'company_name_desc'=>'企业简介',
			'company_product'=>'企业产品',
			'company_news'=>'企业新闻',
			'company_news_desc'=>'企业新闻描述',
			'industry_class'=>'行业类别',
		),
		'job'=>array(
			'industry_class'=>'行业类别',
			'job_class'=>'职位类别',
			'job_name'=>'职位名称',
			'job_desc'=>'职位描述',
			'job_salary'=>'职位薪资',
			'company_name'=>'企业名称',
		),
		'part'=>array(
			'part_name'=>'兼职名称',
		),
		'zph'=>array(
			'zph_title'=>'招聘会标题',
			'zph_desc'=>'招聘会描述',
		),
		'ask'=>array(
			'ask_title'=>'问答标题',
			'ask_desc'=>'问答描述',
			'ask_class_name'=>'分类名称',
		),
		'resume'=>array(
			'resume_username'=>'简历姓名',
			'resume_job'=>'简历意向职位',
			'resume_city'=>'简历工作城市',
		),
		'tiny'=>array(
			'tiny_username'=>'普工简历名称',
			'tiny_job'=>'普工简历职位',
			'tiny_desc'=>'普工简历描述',
		),
		'once'=>array(
			'once_name'=>'店铺名称',
			'once_job'=>'店铺招聘职位',
			'once_desc'=>'店铺招聘描述',
		),
		'hr'=>array(
			'hr_class'=>'类别名称',
			'hr_desc'=>'类别描述',
		    'hr_name'=>'工具箱详情',
		),
		'gg'=>array(
			'gg_title'=>'公告标题',
			'gg_desc'=>'公告描述',
		),
		
		'friend'=>array(
			'company_name'=>'企业名称'
			
		),
		
	),
    'msgreturn'=>array(
        401=>'手机号为空',
        402=>'短信内容为空',
        403=>'appKey为空',
        404=>'appSecret为空',
        405=>'手机号码格式错误',
        406=>'禁用手机号',
        407=>'短信内容含有敏感字词',
        410=>'短信秘钥认证错误',
        411=>'网站无有效短信签名',
        412=>'短信余额不足',
        413=>'短信发送失败',
        501=>'检测是空号',
        502=>'空号检测归属地失败'
    ),
    'port' => array(1 => 'PC', 2 => 'WAP', 3 => '小程序', 4 => 'APP', 5 => 'Admin')
);
?>