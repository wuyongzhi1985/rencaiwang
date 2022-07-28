<?php
/* *
* $Author ：PHPYUN开发团队
*
* 官网: http://www.phpyun.com
*
* 版权所有 2009-2021 宿迁鑫潮信息技术有限公司，并保留所有权利。
*
* 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
*/
class wxoauth_controller extends common{
	function index_action(){
	    
		$app_id 	= $this->config['wx_appid'];
		$app_secret = $this->config['wx_appsecret'];
		$my_url 	= $this->config['sy_wapdomain']."/index.php?c=wxoauth";
		$code 		= $_GET['code'];
		session_start();

		if(empty($code)){
			$this->cookie->unset_cookie();
			$_SESSION['wx']['state']	=	md5(uniqid(rand(), TRUE));
			
			$dialog_url					=	"https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$app_id."&redirect_uri=".urlencode($my_url)."&response_type=code&scope=snsapi_base&state=".$_SESSION['wx']['state']."#wechat_redirect";

			header("location:".$dialog_url);die;
		}
		
		if($_GET['state'] == $_SESSION['wx']['state']){

			$token_url					=	"https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $app_id . "&secret=" . $app_secret . "&code=".$code."&grant_type=authorization_code";
			if(function_exists('curl_init')) {
				
				$ch			=	curl_init();
				curl_setopt($ch, CURLOPT_URL,$token_url);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				$response	=	curl_exec ($ch);
				curl_close ($ch);

				$params		=	json_decode($response);
				
				if($params->openid){
					//关注公众号并绑定帐号 或者 直接以微信注册的账户
					$userinfoM			=	$this->MODEL('userinfo');
					$uwhere['wxid']		=	$params->openid;
					if (!empty($params->openid)){
					    $uwhere['unionid']  =	array('=',$params->openid,'OR');
					}
					$data['field']		=	'`uid`,`username`,`salt`,`email`,`password`,`usertype`,`did`,`login_date`,`status`';
					$userinfo			=	$userinfoM->getInfo($uwhere,$data);
					if($userinfo['uid']>0){
					    // 更新登录时间
					    $userinfoM->upInfo(array('uid' => $userinfo['uid']), array('login_date'=>time()));
					    
					    if ($userinfo['usertype'] > 0){
					        if ($userinfo['status'] == '2' || $userinfo['status'] == '4') {
					            // 账号被锁定
					            echo "<script>window.location.href='".Url('wap',array('c'=>'login','a'=>'loginlock','type'=>1))."';</script>";
					            exit();
					        }
					        // 会员日志，记录手动登录
					        $LogM = $this->MODEL('log');
					        $LogM->addMemberLog($userinfo['uid'],$userinfo['usertype'], '微信oauth登录成功');
					        
					        $logtime	=	date("Ymd",$userinfo['login_date']);
					        $nowtime	=	date("Ymd",time());
					        
					        if($logtime!=$nowtime){
					            $this->MODEL('integral')->invtalCheck($userinfo['uid'],$userinfo['usertype'],"integral_login","会员登录",22);
					            //登录日志
					            $logdata['uid']		  =	 $userinfo['uid'];
					            $logdata['usertype']  =	 $userinfo['usertype'];
					            $logdata['did']		  =	 $userinfo['did'];
					            $logdata['content']   =  '微信oauth登录';
					            $LogM->addLoginlog($logdata);
					        }
					    }
					    
						$this->cookie->add_cookie($userinfo['uid'],$userinfo['username'],$userinfo['salt'],$userinfo['email'],$userinfo['password'],$userinfo['usertype'],$this->config['sy_logintime']);
					}
				}
			}
		}
		// 已绑定
		if($userinfo['uid']){
		    
		    echo "<script>window.location.href='".Url('wap')."member/';</script>";
		}else{
		    // 未绑定，进入微信绑定页面
		    echo "<script>window.location.href='".Url('wap',array('c'=>'wxconnect','wxoauth'=>1))."';</script>";
		    
		}
		exit();
	}
}
?>