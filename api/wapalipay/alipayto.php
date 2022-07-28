<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>支付宝即时到账交易接口接口</title>
</head>
<body>
<?php
/* *
 * 功能：即时到账交易接口接入页
 * 版本：3.3
 * 修改日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************注意*************************
 * 如果您在接口集成过程中遇到问题，可以按照下面的途径来解决
 * 1、商户服务中心（https://b.alipay.com/support/helperApply.htm?action=consultationApply），提交申请集成协助，我们会有专业的技术工程师主动联系您协助解决
 * 2、商户帮助中心（http://help.alipay.com/support/232511-16307/0-16307.htm?sh=Y&info_type=9）
 * 3、支付宝论坛（http://club.alipay.com/read-htm-tid-8681712.html）
 * 如果不想使用扩展功能请把扩展功能参数赋空值。
 */
error_reporting(0);
//TODO:暂时不知道如何改成PLUS_PATH
require_once(dirname(dirname(dirname(__FILE__)))."/config/db.config.php");
require_once(dirname(dirname(dirname(__FILE__)))."/data/plus/config.php");
require_once(dirname(dirname(dirname(__FILE__)))."/config/db.safety.php");
if (substr(PHP_VERSION, 0, 1) == '7') {
	require_once(dirname(dirname(dirname(__FILE__)))."/app/include/mysqli.class.php");
}else{
	require_once(dirname(dirname(dirname(__FILE__)))."/app/include/mysql.class.php");
}
$db = new mysql($db_config['dbhost'], $db_config['dbuser'], $db_config['dbpass'], $db_config['dbname'], ALL_PS, $db_config['charset']);
if(!is_numeric($_GET['dingdan'])){die;}
if($_GET['token']){
    $member_sql=$db->query("SELECT * FROM `".$db_config["def"]."member` WHERE `uid`='".$_GET['uid']."' limit 1");
    $member=$db->fetch_array($member_sql);
    $mdtoken = md5($member['username'].$member['password'].$member['salt'].$member['usertype']);
    $uid = $member['uid'];
    if($_GET['token']!=$mdtoken){
        die;
    }
}else{
    $uid=(int)$_COOKIE['uid'];
    $_GET['balance']=(int)$_GET['balance'];
    $member_sql=$db->query("SELECT * FROM `".$db_config["def"]."member` WHERE `uid`='".$uid."' limit 1");
    $member=$db->fetch_array($member_sql);
    if($member['usertype'] != $_COOKIE['usertype']||md5($member['username'].$member['password'].$member['salt'])!=$_COOKIE['shell']){
        die;
    }
}
$sql=$db->query("select * from `".$db_config["def"]."company_order` where `order_id`='".$_GET['dingdan']."' AND `order_price`>=0");
$row=$db->fetch_array($sql);
if((!$row['uid']) || ($row['uid']!=$uid)){
	die;
}

require_once("alipay.config.php");
require_once("lib/alipay_submit.class.php");


/***/
/*if($config['alipaytype']=="1")
{
		$dir = "alipay";
}else{
		$dir = "alipaydual";
}

require_once(dirname(dirname(dirname(__FILE__)))."/api/".$dir."/alipay_data.php");

//合作身份者id，以2088开头的16位纯数字
$alipay_config['partner']		= $alipaydata['sy_alipayid'];

//安全检验码，以数字和字母组成的32位字符
//如果签名方式设置为"MD5"时，请设置该参数
$alipay_config['key']			= $alipaydata['sy_alipaycode'];

//商户的私钥（后缀是.pen）文件相对路径
//如果签名方式设置为"0001"时，请设置该参数
$alipay_config['private_key_path']	= 'key/rsa_private_key.pem';
unset($alipay_config['private_key_path']);

//支付宝公钥（后缀是.pen）文件相对路径
//如果签名方式设置为"0001"时，请设置该参数
$alipay_config['ali_public_key_path']= 'key/alipay_public_key.pem';
unset($alipay_config['ali_public_key_path']);

//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑


//签名方式 不需修改
$alipay_config['sign_type']    = 'MD5';

//字符编码格式 目前支持 gbk 或 utf-8
$alipay_config['input_charset']= 'GBK';

//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
$alipay_config['cacert']    = $config['sy_weburl']."/api/wapalipay/cacert.pem";

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
$alipay_config['transport']    = 'http';*/

/***/


/**************************调用授权接口alipay.wap.trade.create.direct获取授权码token**************************/

//服务器异步通知页面路径
$notify_url = $config['sy_weburl']."/api/wapalipay/notify_url.php";
//需http://格式的完整路径，不允许加?id=123这类自定义参数

//页面跳转同步通知页面路径
$call_back_url = $config['sy_weburl']."/api/wapalipay/call_back_url.php";
//需http://格式的完整路径，不允许加?id=123这类自定义参数

//操作中断返回地址
$merchant_url = $config['sy_weburl']."/api/wapalipay/interrupt_back_url.php";
//用户付款中途退出返回商户的地址。需http://格式的完整路径，不允许加?id=123这类自定义参数

//商户订单号
$out_trade_no = $row['order_id'];
//商户网站订单系统中唯一订单号，必填

//订单名称,暂时使用订单号作为订单名称
$subject = $row['order_id'];
//必填

//付款金额
$total_fee = $row['order_price'];
//必填

if($alipay_config['sign_type'] == 'MD5'){
//返回格式
$format = "xml";
//必填，不需要修改

//返回格式
$v = "2.0";
//必填，不需要修改

//请求号
$req_id = date('Ymdhis');
//必填，须保证每次请求都是唯一

//**req_data详细信息**

//卖家支付宝帐户
$seller_email = $alipaydata['sy_alipayemail'];

//请求业务参数详细
$req_data = '<direct_trade_create_req><notify_url>' . $notify_url . '</notify_url><call_back_url>' . $call_back_url . '</call_back_url><seller_account_name>' . $seller_email . '</seller_account_name><out_trade_no>' . $out_trade_no . '</out_trade_no><subject>' . $subject . '</subject><total_fee>' . $total_fee . '</total_fee><merchant_url>' . $merchant_url . '</merchant_url></direct_trade_create_req>';
//必填

/************************************************************/

//构造要请求的参数数组，无需改动
$para_token = array(
		"service" => "alipay.wap.trade.create.direct",
		"partner" => trim($alipay_config['partner']),
		"sec_id" => trim($alipay_config['sign_type']),
		"format"	=> $format,
		"v"	=> $v,
		"req_id"	=> $req_id,
		"req_data"	=> $req_data,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);


//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestHttp($para_token);

//URLDECODE返回的信息
$html_text = urldecode($html_text);

//解析远程模拟提交后返回的信息
$para_html_text = $alipaySubmit->parseResponse($html_text);

//获取request_token
$request_token = $para_html_text['request_token'];


/**************************根据授权码token调用交易接口alipay.wap.auth.authAndExecute**************************/

//业务详细
$req_data = '<auth_and_execute_req><request_token>' . $request_token . '</request_token></auth_and_execute_req>';
//必填

//构造要请求的参数数组，无需改动
$parameter = array(
		"service" => "alipay.wap.auth.authAndExecute",
		"partner" => trim($alipay_config['partner']),
		"sec_id" => trim($alipay_config['sign_type']),
		"format"	=> $format,
		"v"	=> $v,
		"req_id"	=> $req_id,
		"req_data"	=> $req_data,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter, 'get', '确认');
header('Location: '.$html_text);
}else{

    require_once dirname(dirname(dirname(__FILE__))).'/api/aop/wap/AopClient.php';
    require_once dirname(dirname(dirname(__FILE__))) . '/api/aop/wap/request/AlipayTradeWapPayRequest.php';
    $aop = new AopClient ();
    $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
    $aop->appId = $alipaydata['sy_alipayappid'];
    $aop->rsaPrivateKey = $alipaydata['sy_alipayprivatekey'];
    $aop->alipayrsaPublicKey = $alipaydata['sy_alipaypublickey'];
    $aop->apiVersion = '1.0';
    $aop->signType = 'RSA2';
    $aop->postCharset='UTF-8';
    $aop->format='json';

    $request = new AlipayTradeWapPayRequest ();
    $request->setBizContent("{" .
        "\"body\":\"{$body}\"," .
        "\"subject\":\"{$subject}\"," .
        "\"out_trade_no\":\"{$out_trade_no}\"," .
        "\"total_amount\":\"{$total_fee}\"," .
        "\"quit_url\":\"{$merchant_url}\"," .
        "\"product_code\":\"QUICK_WAP_PAY\"," .
        "  }");
    $request->setReturnUrl($call_back_url);
    $request->setNotifyUrl($notify_url);

    $result = $aop->pageExecute ($request);
    echo $result;

    // $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
    //
    // $resultCode = $result->$responseNode->code;
    // if(!empty($resultCode)&&$resultCode == 10000){
    //     echo "成功";
    // } else {
    //     echo "失败";
    // }
}
?>
</body>
</html>