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
function quotesGPC() {
	
	if(version_compare(PHP_VERSION,'5.4.0','<')) {
		ini_set('magic_quotes_runtime',0);
		define('MAGIC_QUOTES_GPC',get_magic_quotes_gpc()? true : false);
	}else{
		define('MAGIC_QUOTES_GPC',false);
	}


	if(!MAGIC_QUOTES_GPC){
		$_POST		=	array_map("addSlash", $_POST);
		$_GET		=	array_map("addSlash", $_GET);
		$_COOKIE	=	array_map("addSlash", $_COOKIE);
	}
}
function addSlash($el) {
	if (is_array($el))
		return array_map("addSlash", $el);
	else
		return addslashes($el);
}
function gpc2sql($str,$str2) {

    $arr=array("sleep"=>"Ｓleep"," and "=>" an d "," or "=>" Ｏr ","xor"=>"xＯr","%20"=>" ","select"=>"Ｓelect","update"=>"Ｕpdate","count"=>"Ｃount","chr"=>"Ｃhr","truncate"=>"Ｔruncate","union"=>"Ｕnion","delete"=>"Ｄelete","insert"=>"Ｉnsert","load_file"=>"Ｌoad_file","outfile"=>"Ｏutfile","\""=>"“","'"=>"“","--"=>"- -","\("=>"（","\)"=>"）","00000000"=>"OOOOOOOO","0x"=>"Ox");

	foreach($arr as $key=>$v){
    	$str = preg_replace('/'.$key.'/isU',$v,$str);
	}
	return $str;
}
function safeid($v){
	if(strstr($v,",")){
		$arr=explode(',',$v);
		foreach($arr as $val){
			$value[]=(int)$val;
		}
		$v=implode(',',$value);
	}elseif(is_array($v)){
		foreach($v as $val){
			$value[]=(int)$val;
		}
		$v=$value;
	}else{
		$v=intval($v);	
	}
	return $v;
}
function safesql($StrFiltKey,$StrFiltValue,$type){
	$getfilter = "\\<.+javascript:window\\[.{1}\\\\x|<.*=(&#\\d+?;?)+?>|<.*(data|src)=data:text\\/html.*>|\\b(alert\\(|confirm\\(|expression\\(|prompt\\(|benchmark\s*?\\(\d+?|sleep\s*?\(.*\)|load_file\s*?\\()|<[a-z]+?\\b[^>]*?\\bon([a-z]{4,})\s*?=|^\\+\\/v(8|9)|\\b(and|or)\\b\\s*?([\\(\\)'\"\\d]+?=[\\(\\)'\"\\d]+?|[\\(\\)'\"a-zA-Z]+?=[\\(\\)'\"a-zA-Z]+?|>|<|\s+?[\\w]+?\\s+?\\bin\\b\\s*?\(|\\blike\\b\\s+?[\"'])|\\/\\*.+?\\*\\/|\\/\\*\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT(\\(.+\\)|\\s+?.+?)|UPDATE(\\(.+\\)|\\s+?.+?)SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE)(\\(.+\\)|\\s+?.+?\\s+?)FROM(\\(.+\\)|\\s+?.+?)|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
	$postfilter = "<.*=(&#\\d+?;?)+?>|<.*data=data:text\\/html.*>|<.*svg.*>|\\b(alert\\(|confirm\\(|expression\\(|prompt\\(|benchmark\s*?\\(\d+?|sleep\s*?\(.*\)|load_file\s*?\\()|<[^>]*?\\b(onerror|onmousemove|onload|onclick|onmouseover)\\b|\\b(and|or)\\b\\s*?([\\(\\)'\"\\d]+?=[\\(\\)'\"\\d]+?|[\\(\\)'\"a-zA-Z]+?=[\\(\\)'\"a-zA-Z]+?|>|<|\s+?[\\w]+?\\s+?\\bin\\b\\s*?\(|\\blike\\b\\s+?[\"'])|\\/\\*.+?\\*\\/|\\/\\*\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT(\\(.+\\)|\\s+?.+?)|UPDATE(\\(.+\\)|\\s+?.+?)SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE)(\\(.+\\)|\\s+?.+?\\s+?)FROM(\\(.+\\)|\\s+?.+?)|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
	$cookiefilter = "benchmark\s*?\\(\d+?|sleep\s*?\(.*\)|load_file\s*?\\(|\\b(and|or)\\b\\s*?([\\(\\)'\"\\d]+?=[\\(\\)'\"\\d]+?|[\\(\\)'\"a-zA-Z]+?=[\\(\\)'\"a-zA-Z]+?|>|<|\s+?[\\w]+?\\s+?\\bin\\b\\s*?\(|\\blike\\b\\s+?[\"'])|\\/\\*.+?\\*\\/|\\/\\*\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT(\\(.+\\)|\\s+?.+?)|UPDATE(\\(.+\\)|\\s+?.+?)SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE)(\\(.+\\)|\\s+?.+?\\s+?)FROM(\\(.+\\)|\\s+?.+?)|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
	if($type=="GET"){
		$ArrFiltReq = $getfilter;
	}elseif($type=="POST"){		
		$ArrFiltReq = $postfilter;        
	}elseif($type=="COOKIE"){
		$ArrFiltReq = $cookiefilter;
	}
	if(is_array($StrFiltValue)){
		foreach($StrFiltValue as $key=>$value){
			safesql($key,$value,$type);
		}
	}else{
		if (preg_match("/".$ArrFiltReq."/is",$StrFiltValue)==1){
            exit(safe_pape());
		}
	}
	if (preg_match("/".$ArrFiltReq."/is",$StrFiltKey)==1){
        exit(safe_pape());
	}
}
function common_htmlspecialchars($key,$str,$str2,$config){	

	if(is_array($str)){
		
		foreach($str as $str_k=>$str_v){
			$str[$str_k] = common_htmlspecialchars($str_k,$str_v,$str2,$config);

		}
	}else{
		$str = preg_replace('/([\x00-\x08\x0b-\x0c\x0e-\x19])/', '', $str);
		
		if(!in_array((string)$key,array('content','config','group_power','description','body','job_desc','eligible','other','code','intro','doc','traffic','media','packages','booth','participate','expinfo','eduinfo','skillinfo','projectinfo','chat_id', 'userId'))){
			
			$str = strip_tags($str);
			
			$str = gpc2sql($str,$str2);
			
		}else{
			
			$str = RemoveXSS(urldecode($str));
				
			
		}
	}
	return $str;
}
function RemoveXSS($val) {
    $val = preg_replace('/([\x00-\x08\x0b-\x0c\x0e-\x19])/', '', $val);
    
    $search = 'abcdefghijklmnopqrstuvwxyz';
    $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $search .= '1234567890!@#$%^&*()';   
    $search .= '~`";:?+/={}[]-_|\'\\';   
    for ($i = 0; $i < strlen($search); $i++) {   
        $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;   
        $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;   
    }
	
    $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'base');   
    $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
    $ra = array_merge($ra1, $ra2);   
    
    $found = true; 
    while ($found == true) {   
        $val_before = $val;   
        for ($i = 0; $i < sizeof($ra); $i++) {   
            $pattern = '/';   
            for ($j = 0; $j < strlen($ra[$i]); $j++) {
                if ($j > 0) {   
                    $pattern .= '(';
                    $pattern .= '(&#[xX]0{0,8}([9ab]);)';   
                    $pattern .= '|';
                    $pattern .= '|(&#0{0,8}([9|10|13]);)';   
                    $pattern .= ')*';
                }   
                $pattern .= $ra[$i][$j];   
            }   
            $pattern .= '/i';    
            $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2);
            $val = preg_replace($pattern, $replacement, $val);
            if ($val_before == $val) {    
                $found = false;    
            }
        }    
    }
	$val = preg_replace('/ on/isU'," Ｏn",$val);
    return $val;    
}  
function sfkeyword($v,$config){	
    if($config['sy_fkeyword']){		
        $fkey = @explode(",",$config['sy_fkeyword']);		
		$safe_keyword = $config['sy_fkeyword_all'];		
		return str_replace($fkey, $safe_keyword, $v);
    }
    return $v;
}

quotesGPC();

if(!empty($config['sy_useragent'])){
	$userAgent = explode("\n",$config['sy_useragent']);
	
	foreach($userAgent as $key => $value){
		if(stripos($_SERVER['HTTP_USER_AGENT'],trim($value))!==false){
		
			safe_pape('网站升级中，暂停访问....');
		}
	}
}


if(!empty($_POST)){
    
  
    
	if(empty($config['sy_safekey']) || $_SESSION['xsstooken'] != sha1($config['sy_safekey']))
	{
		// 前台
		foreach($_POST  as $id=>$v){
		    // 对数组键名过滤，只允许字母数字下划线，键名长度1-30个字符
		    if (preg_match('/^[_0-9a-z]{1,30}$/i', $id)) {
		        if(!in_array($id,array('preview','wt_cert','owner_cert','other_cert','base','base_wt_cert','base_owner_cert','base_other_cert','uimage','safekey','notify_data','token','deviceToken','xcxCode','rsaSign','sign','fund_bill_list','buyer_logon_id','openid','unionid','code','appid','username','password'))){
		            $str = html_entity_decode($v,ENT_QUOTES);
		            
		            $v = common_htmlspecialchars($id,$v,$str,$config);
		            safesql($id,$v,"POST",$config);
                    $id = sfkeyword($id,$config);
                    $v = sfkeyword($v,$config);
		        }else{
		            
		            $v = strip_tags($v);
		        }

		        if(trim($id)){
		            $_POST[$id] = $v;
		        }
		    }else{
		        unset($_POST[$id]);
		    }
		}
	}else{
	    // 后台
		$arr=array("sleep"=>"Ｓleep"," and "=>" an d "," or "=>" Ｏr ","xor"=>"xＯr","%20"=>" ","select"=>"Ｓelect","update"=>"Ｕpdate","count"=>"Ｃount","chr"=>"Ｃhr","truncate"=>"Ｔruncate","union"=>"Ｕnion","delete"=>"Ｄelete","insert"=>"Ｉnsert","--"=>"- -","\("=>"（","\)"=>"）","00000000"=>"OOOOOOOO","0x"=>"Ox","\*"=>"＊");
		
		foreach($_POST  as $id=>$v){
			if (preg_match('/^[_0-9a-z]{1,30}$/i',$id)){
				foreach($arr as $arrkey=>$arrv){
				    if(!in_array($id,array('preview','wt_cert','owner_cert','other_cert','uimage','content','config','group_power','description','body','job_desc','eligible','other','code','intro','doc','traffic','media','packages','booth','participate','expinfo','eduinfo','skillinfo','projectinfo','sy_publicKey','sy_privateKey','verify_token','wx_qy_secret','header','body','footer','sy_alipayprivatekey','sy_alipaypublickey','preview_man','preview_woman', 'sy_weburl','wx_welcom','chat_id', 'userId'))){
						$v = preg_replace('/'.$arrkey.'/isU',$arrv,$v);
						
					}
				}
				$_POST[$id] = $v;
			}else{
				unset($_POST[$id]);
			}
		}
	}
}

foreach ($_GET as $id => $v) {
    // 对数组键名过滤，只允许字母数字下划线，键名长度1-30个字符
    if (preg_match('/^[_0-9a-z]{1,30}$/i', $id)) {
        $str    =   html_entity_decode($v, ENT_QUOTES);
        if (!in_array($id, array('wxid', 'unionid', 'token'))) {
            
            $v  =   common_htmlspecialchars($id, $v, $str, $config);
        }
        safesql($id, $v, "GET", $config);
        $id     =   sfkeyword($id, $config);
        $v      =   sfkeyword($v, $config);
        if (!is_array($v) && $id != 'sign')
            $v  =   substr(strip_tags($v), 0, 80);
            $_GET[$id]  =   $v;
            if ($id == 'yunurl') {
                $encode =   mb_detect_encoding($v, array('UTF-8', 'GB2312', 'GBK'));
                if ($encode != 'UTF-8') {
                    $_GET[$id]  =   iconv('gbk', 'utf-8', $v);
                }
            }
    }else{
        unset($_GET[$id]);
    }
}

foreach($_COOKIE  as $id=>$v){	
	$str = html_entity_decode($v,ENT_QUOTES);
	if(!in_array($id,array('wxid','unionid'))){
		$v = common_htmlspecialchars($id,$v,$str,$config);
	}
	safesql($id,$v,"COOKIE",$config);
	$id  =  sfkeyword($id,$config);
	$v   =  sfkeyword($v,$config);
	$v   =  mb_substr(strip_tags($v),0,200,'utf8');
	$_COOKIE[$id]=$v;
}


$serverArray = array('HTTP_REFERER','HTTP_HOST','REQUEST_URI');

foreach($serverArray as $v){
    $_SERVER[$v] = common_htmlspecialchars($v,$_SERVER[$v],$_SERVER[$v],$config);
}

function safe_pape($msg = '您提交的数据存在安全隐患，已被禁止！'){
	
   
    echo $msg;
	exit();
}
?>