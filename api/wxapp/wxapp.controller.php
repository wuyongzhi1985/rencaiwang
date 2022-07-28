<?php

/**
 * $Author ：PHPYUN开发团队
 *
 * 官网: http://www.phpyun.com
 *
 * 版权所有 2009-2021 宿迁鑫潮信息技术有限公司，并保留所有权利。
 *
 * 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
 */
class wxapp_controller extends common
{

    public $member      =   array();
    public $comInfo     =   array();
    public $platform    =   '';
    public $plat        =   '';     

    function __construct($tpl, $db, $def = '', $model = 'index', $m = '')
    {
        $_POST = $this->undefinedToEnpty($_POST);
        
        $this->common($tpl, $db, $def, 'wxapp');

        if (isset($_GET['h']) && ($_GET['h'] == 'user' || $_GET['h'] == 'com')) {
            // 请求会员中心链接
            $this->yzTokenNew(1, $_POST['uid'], $_POST['token']);
            
        }else if ($_POST['uid'] && $_POST['token'] && !in_array($_GET['c'], array('talentpool','invitesave'))){
            // 前台链接
            $this->yzTokenNew(0, $_POST['uid'], $_POST['token']);
        }
    }

    /**
     * @desc    将接口返回数据以统一格式的JSON输出
     *
     * @param string $error 执行结果标识码
     * @param string $msg   执行结果描述信息
     * @param array $data   执行结果输出的数据
     * @param int $total
     */
    public function render_json($error = '', $msg = '', $data = array(), $total = 0)
    {

        $data   =   $this->nullToEnpty($data);

        $result =   array(
            'error' =>  $error,
            'msg'   =>  isset($msg) ? $msg : '',
            'data'  =>  isset($data) ? $data : array(),
            'total' =>  $total
        );
        header('content-type:application/json; charset=utf-8');
        echo json_encode($result);
        exit;
    }

    function yzToken($uid = '', $token = '')
    {
        if(empty($this->member)){
            // 容错机制，防止传的身份ID字段不是uid
            $this->yzTokenNew(0, $uid, $token);
        }
        return $this->member;
    }
    
    /**
     * 验证登录状态,需要会员登录后才能操作的都需要验证
     * @param $uid
     * @param string $token
     * @return array
     */
    function yzTokenNew($isMember = 0, $uid = '', $token = '')
    {
        if (!empty($this->uid) && !empty($this->usertype)){
            // wap登录信息
            $this->member  =  array(
                'uid'       =>  $this->uid,
                'username'  =>  $this->username,
                'usertype'  =>  $this->usertype,
                'did'       =>  $this->userdid,
                'app_push'  =>  ''
            );
            $this->wxappMember(array('uid'=>$this->uid), $isMember);
            
        }elseif (!empty($uid) && !empty($token)){
            // 移动端登录信息
            $this->wxappMember(array('uid'=>$uid,'token'=>$token), $isMember);
            
        }elseif($_GET['c']!='advice'){
            $this -> render_json(1002, '用户信息缺失');
        }
    }
    // 登录信息验证
    private function wxappMember($param = array(), $isMember = 0){
        
        $field = '`uid`,`username`,`usertype`,`password`,`salt`,`did`,`status`,`login_date`,`wxid`';
        // 版本没有APP的，查询要排除
        if (isset($this->config['sy_push_open']) && $this->config['sy_push_open'] == 1){
            $field .= ',`app_push`';
        }
        $userInfoM  =  $this->MODEL('userinfo');
        $member     =  $userInfoM->getInfo(array('uid'=>$param['uid']),array('field'=>$field));
        $user  =  array(
            'uid'       =>  $member['uid'],
            'username'  =>  $member['username'],
            'usertype'  =>  $member['usertype'],
            'did'       =>  $member['did'],
            'status'    =>  $member['status'],
            'wxid'      =>  $member['wxid'],
            'gzhtoken'  =>  $this->generateToken('gzh', $member['uid'], $member['password'])
        );
        
        if (empty($this->member)){
            $this->member = $user;
        }else{
            $this->member['status']   = $user['status'];
            $this->member['wxid']     = $user['status'];
            $this->member['gzhtoken'] = $user['gzhtoken'];
        }
        if ($member){
            if ($member['status'] == 2){
                
                $logoutM  =  $this->MODEL('logout');
                $logout	  =	 $logoutM->getInfo(array('uid'=>$param['uid'],'status'=>1));
                
                if (!empty($logout)){
                    $this -> render_json(1002, '您的账号已注销');
                }else{
                    $this -> render_json(1002, '您的账号已被锁定，请联系网站客服');
                }
            }
            // 移动端验证token。没传token的就是wap，登录信息在common中验证
            if (!empty($param['token'])){
                $mdtoken  =  md5($member['username'].$member['password'].$member['salt'].$member['usertype']);
                if($param['token'] != $mdtoken){
                    
                    $this -> render_json(1002, '登录信息有误，请重新登录');
                }
            }
            // 会员中心的请求链接，需要额外信息和判断
            if ($isMember == 1){
                if (($member['usertype'] == 2 && $_GET['h']=='com') || ($member['usertype'] == 1 && $_GET['h']=='user')) {
                    
                    if ($member['usertype'] == 2) {
                        
                        $comM = $this->MODEL('company');
                        
                        $this->comInfo = $comM->getInfo($member['uid'], array('logo' => 1, 'utype' => 'user'));
                        
                        $this->comInfo = !empty($this->comInfo) ? $this->comInfo : array();
                        
                        if ($this->comInfo['r_status'] == 4){
                            $this -> render_json(1002, '您的账号已被暂停，请联系网站客服');
                        }
                        if (empty($this->comInfo)) {
                            
                            $userInfoM->activUser($member['uid'], 2);
                        }
                    } elseif ($member['usertype'] == 1) {
                        
                        $resumeM = $this->MODEL('resume');
                        
                        $resume = $resumeM->getResumeInfo(array('uid' => $member['uid']), array('field' => '`uid`'));
                        
                        if (empty($resume)) {
                            
                            $userInfoM->activUser($member['uid'], 1);
                        }
                    }
                }else{
                    $this -> render_json(1003, '登录身份不符，请重新登录');
                }
            }else{
                // 前台判断企业是否有暂停的情况，因没有$this->comInfo简单查询就行
                if ($member['usertype'] == 2){
                    
                    $comM    = $this->MODEL('company');
                    $comInfo = $comM->getInfo($member['uid'], array('field' => 'r_status'));
                    if ($comInfo['r_status'] == 4){
                        $this -> render_json(1002, '您的账号已被暂停，请联系网站客服');
                    }
                }
            }
            //今日没有登录的，记录登录日志。排除其他控制器，防止并发
            if ($member['login_date'] < strtotime('today')){
                if (!in_array($_GET['m'], array('index','version','public')) || ($_GET['m'] == 'index' && !empty($_GET['h']))){
                    if ($member['usertype'] > 0){
                        // 有身份的，记录登录日志
                        $time  =  time();
                        $ip    =  fun_ip_get();
                        
                        if ($_POST['provider'] == 'app'){
                            $content = 'app';
                        }elseif ($_POST['provider'] == 'weixin'){
                            $content = '微信小程序';
                        }
                        
                        $logindata  =  array(
                            'uid'      => $member['uid'],
                            'usertype' => $member['usertype'],
                            'content'  => $content.'端口延续登录'
                        );
                        $logM = $this -> MODEL('log');
                        $logM->addLoginlog($logindata);
                        
                        $userInfoM -> upInfo(array('uid'=>$member['uid']), array('login_ip'=>$ip,'login_date'=>$time));
                        // 同步个人、企业基本信息表登录信息
                        if ($member['usertype'] == 1){
                            
                            $rData    = array('login_date' => $time);
                            $resumeM  =  $this -> MODEL('resume');
                            //登录自动简历刷新，根据后台配置判断
                            if ($this->config['resume_sx'] == 1) {
                                $expect   =  $resumeM->getExpectByUid($member['uid'], array('field' => '`id`'));
                                if (!empty($expect)) {
                                    if ($_POST['provider'] == 'app'){
                                        $port   =   4;
                                    }elseif ($_POST['provider'] == 'weixin'){
                                        $port   =   3;
                                    }
                                    $rData['lastupdate'] = $time;
                                }
                            }
                            $resumeM->upResumeInfo(array('uid' => $member['uid']), array('rData' => $rData, 'port' => $port));
                        }elseif ($member['usertype'] == 2){
                            
                            if (!isset($comM)){
                                $comM = $this->MODEL('company');
                            }
                            $comM->upInfo($member['uid'], array('login_date' => $time));
                        }
                    }
                }
            }
        }else{
            $this -> render_json(1002, '用户信息错误，请重新登录');
        }
    }

    function getBdOpenid($code){
        include(dirname(dirname(dirname(__FILE__))).'/data/api/baidu/baidu_data.php');
        $appKey = $baiduData['sy_bdlogin_appKey'];
        $sk = $baiduData['sy_bdlogin_appSecret'];
        $token_url = 'https://spapi.baidu.com/oauth/jscode2sessionkey?code='.$code.'&client_id='.$appKey.'&sk='.$sk;
        if(function_exists('curl_init')) {

            $result  =  CurlGet($token_url);
            $user    = json_decode($result,true);

            $user['appid']  =  $appKey;
            return $user;
        }else{
            $this->render_json(1005, '不支持curl');
        }
    }

	function getOpenid($code)
	{
	    
	    include(dirname(dirname(dirname(__FILE__))).'/data/api/wxpay/wxpay_data.php');
	    $appid   =  $wxpaydata['sy_xcxappid']; // APPId
	    $secert  =  $wxpaydata['sy_xcxsecret']; // 秘钥
	    
	    $token_url = 'https://api.weixin.qq.com/sns/jscode2session?appid=' . $appid . '&secret=' . $secert . '&js_code='.$code.'&grant_type=authorization_code';
	    
	    if(function_exists('curl_init')) {
	        
	        $result  =  CurlGet($token_url);
	        $user    = json_decode($result,true);
	        
	        $user['appid']  =  $appid;
	        return $user;
	    }else{
	        $this->render_json(1005, '不支持curl');
	    }
	}
	
	 
	function salaryArr($data = false,$type=0)
	{
	    
	    if ($data){
	        $salary  =  array(
	            1  =>  array('minsalary'=>0, 'maxsalary'=>2000),
	            2  =>  array('minsalary'=>2000, 'maxsalary'=>4000),
	            3  =>  array('minsalary'=>4000, 'maxsalary'=>6000),
	            4  =>  array('minsalary'=>6000, 'maxsalary'=>8000),
	            5  =>  array('minsalary'=>8000, 'maxsalary'=>10000),
	            6  =>  array('minsalary'=>10000, 'maxsalary'=>0)
	        );
	    }else{
	    	if($type==1){
	    		$salary  =  array(
	    			array('id'=>'0' ,'name'=>'全部'),
		            array('id'=>'2' ,'name'=>'2000-4000'),
		            array('id'=>'3' ,'name'=>'4000-6000'),
		            array('id'=>'4' ,'name'=>'6000-8000'),
		            array('id'=>'5' ,'name'=>'8000-10000'),
		            array('id'=>'6' ,'name'=>'10000以上')
		        );
	    	}else{
		        $salary  =  array(
		            'id'    =>  array(0,1,2,3,4,5,6),
		            'name'  =>  array('全部','2000-4000','4000-6000','6000-8000','8000-10000','10000以上')
		        );
		    }
	    }
	    return $salary;
	}
	function fktype()
	{
	    $fktype  =  array(
	        'goumai' => '购买',
	        'fuhao'  => '￥',
	        'fkjg'   => '价格',
	        'wxsrc'  => $this->config['sy_weburl'].'/api/wxapp/static/image/wxzf.png',
	        'alsrc'  => $this->config['sy_weburl'].'/api/wxapp/static/image/zfb.png',
	    );
	   
	    if($this->config['alipay']=='1' &&  $this->config['alipaytype']=='1'){
	        $fktype['fkal']  =  '支付宝';
	    }
	    return $fktype;
	}
	function preghtml($str){
	    $return  =  strip_tags($str,'<div> <p> <img> <br>');
	    $return = preg_replace("/<div[^>]*?>(.*?)<\/div>/is","<div>$1</div>",$return);
	    $return = preg_replace("/<p[^>]*?>(.*?)<\/p>/is","<p>$1</p>",$return);
	    return $return;
	}
	/*
	 * 百度地图BD09坐标---->中国正常GCJ02坐标
	 * 腾讯地图用的也是GCJ02坐标
	 * @param double $lat 纬度
	 * @param double $lng 经度
	 * @return array();
	 */
	function Convert_BD09_To_GCJ02($lng,$lat)
	{
	    $x_pi = 3.14159265358979324 * 3000.0 / 180.0;
	    $x = $lng - 0.0065;
	    $y = $lat - 0.006;
	    $z = sqrt($x * $x + $y * $y) - 0.00002 * sin($y * $x_pi);
	    $theta = atan2($y, $x) - 0.000003 * cos($x * $x_pi);
	    $lng = $z * cos($theta);
	    $lat = $z * sin($theta);
	    return array('lng'=>$lng,'lat'=>$lat);
	}
	/*
	 * 中国正常GCJ02坐标---->百度地图BD09坐标
	 * 腾讯地图用的也是GCJ02坐标
	 * @param double $lat 纬度
	 * @param double $lng 经度
	 */
	function Convert_GCJ02_To_BD09($lng,$lat)
	{
	    $x_pi = 3.14159265358979324 * 3000.0 / 180.0;
	    $x = $lng;
	    $y = $lat;
	    $z =sqrt($x * $x + $y * $y) + 0.00002 * sin($y * $x_pi);
	    $theta = atan2($y, $x) + 0.000003 * cos($x * $x_pi);
	    $lng = $z * cos($theta) + 0.0065;
	    $lat = $z * sin($theta) + 0.006;
	    return array('lng'=>$lng,'lat'=>$lat);
	}
	/**
	 * 将undefined字段值转为空
	 * @param array $arr
	 * @return string
	 */
	function undefinedToEnpty($arr = array()){
	    
	    if (!empty($arr)){
	        
	        foreach ($arr as $k=>$v){
	            
	            if (is_array($v)){
	                
	                $arr[$k]  =  $this->undefinedToEnpty($v);
	                
	            }elseif ($v == 'undefined'){
	                
	                $arr[$k] = '';
	            }
	        }
	    }
	    return $arr;
	}
	/**
	 * 将null字段值转为空
	 * @param array $arr
	 * @return string
	 */
	function nullToEnpty($arr = array()){
	    
	    if (!empty($arr)){
	        
	        foreach ($arr as $k=>$v){
	            
	            if (is_null($v)){
	                
	                $arr[$k] = '';
	                
	            }elseif (is_array($v)){
	                
	                $arr[$k]  =  $this->nullToEnpty($v);
	            }
	        }
	    }
	    return $arr;
	}
	/**
	 * 处理分站参数
	 * @param unknown $did
	 */
	function getDomain($did, $needCache = FALSE){
	    
	    $fz_type = 0;
	    
	    include(PLUS_PATH.'domain_cache.php');
	    include(PLUS_PATH.'cityparent.cache.php');
	    foreach ($site_domain as $v){
	        if($v['id'] == $did){
	            if ($v['fz_type'] == 1){
	                
	                $fz_type  =  1;
	                
	                if(!empty($v['province'])){
	                    $return['provinceid'] = $v['province'];
	                }
	                if(!empty($v['cityid'])){
	                    $return['cityid']     = $v['cityid'];
	                    $return['provinceid'] = $city_parent[$return['cityid']];
	                }
	                if(!empty($v['three_cityid'])){
	                    $return['three_cityid'] = $v['three_cityid'];
	                    $return['cityid']       = $city_parent[$return['three_cityid']];
	                    $return['provinceid']   = $city_parent[$return['cityid']];
	                }
	            }elseif ($v['fz_type'] == '2'){
	                
	                $fz_type  =  2;
	                
	                if ($v['hy']){
	                    $return['hyclass']  =  $v['hy'];
	                }
	            }
	        }
	    }
	    if ($needCache){
	        
	        if ($fz_type == 1){
	            // 地区分站，处理城市类别缓存
	            $cacheM		=  $this->MODEL('cache');
	            $cacheList	=  $cacheM->GetCache('city');
	            $city_index	=  $cacheList['city_index'];
	            $city_type	=  $cacheList['city_type'];
	            $city_name	=  $cacheList['city_name'];
	            
	            $didcity    =  $city_name[$return['provinceid']];
	            $cityone[]  =  array('value'=>$return['provinceid'],'label'=>$city_name[$return['provinceid']]);
	            
	            if (!empty($return['cityid'])){
	                // 分站是2级类别分站
	                $didcity    =  $city_name[$return['cityid']];
	                
	                $citytwo[0][]  =  array('value'=>$return['cityid'],'label'=>$city_name[$return['cityid']]);
	                
	            }elseif(!empty($return['provinceid']) && empty($return['cityid'])){
	                // 分站是1级类别分站，要展示2级类别
	                foreach ($city_type[$return['provinceid']] as $v){
	                    
	                    $citytwo[0][]  =  array('value'=>$v,'label'=>$city_name[$v]);
	                }
	            }
	            if (!empty($return['three_cityid'])){
	                // 分站是3级类别分站
	                $didcity      =  $city_name[$return['three_cityid']];
	                
	                $citythree[0][0][]  =  array('value'=>$return['three_cityid'],'label'=>$city_name[$return['three_cityid']]);
	                
	            }elseif(!empty($return['cityid']) && empty($return['three_cityid'])){
	                // 分站是2级类别分站，要展示3级类别
	                foreach ($city_type[$return['cityid']] as $v){
	                    
	                    $citythree[0][0][]  =  array('value'=>$v,'label'=>$city_name[$v]);
	                }
	            }
	            
	            $return['didcity']    =  $didcity;
	            $return['cityone']    =  !empty($cityone) ? $cityone : array();
	            $return['citytwo']    =  !empty($citytwo) ? $citytwo : array();
	            $return['citythree']  =  !empty($citythree) ? $citythree : array();
	            $return['city_name']  =  $city_name;
	            
	        } elseif ($fz_type == 2){
	            
	            $cacheM		=  $this->MODEL('cache');
	            $cacheList	=  $cacheM->GetCache('hy');
	            $industry_name  =  $cacheList['industry_name'];
	            
	            if ($return['hyclass']){
	                
	                $return['didhy']  =  $industry_name[$return['hyclass']];
	                
	                $return['hydata']  =  array(
	                    'id'    =>  array($return['hyclass']),
	                    'name'  =>  array($return['didhy'])
	                );
	            }
	        } 
	    }
	    
	    return $return;
	}
	/**
	 * 前台职位、简历、企业列表区域默认查询,按后台设置处理（后台-页面设置-列表页区域默认设置）
	 */
	function listCity($search_cityid = '', $search_threecityid = ''){
	    
	    $return = array();
	    
	    if (!empty($this->config['sy_web_city_one'])) {
	        $return['provinceid']  =  $this->config['sy_web_city_one'];
	    }
	    if (!empty($this->config['sy_web_city_two'])) {
	        $return['cityid']  =  $this->config['sy_web_city_two'];
	    }
	    // 搜索条件带二级城市类别
	    if (!empty($search_cityid)){
	        $return['cityid']  =  $search_cityid;
	    }
	    // 搜索条件带三级城市类别
	    if (!empty($search_threecityid)){
	        $return['three_cityid']  =  $search_threecityid;
	    }
	    if (!empty($return)){
	        $cacheM		=  $this->MODEL('cache');
	        $cacheList	=  $cacheM->GetCache(array('city','cityfs'));
	        $city_index	=  $cacheList['city_index'];
	        $city_type	=  $cacheList['city_type'];
	        $city_name	=  $cacheList['city_name'];
	        $city_three =  $cacheList['city_three'];
	        
	        $listcity   =  $city_name[$return['provinceid']];
	        $cityone[]  =  array('value'=>$return['provinceid'],'label'=>$city_name[$return['provinceid']]);
	        $citytwo    =  $citythree  =  array();
	        
	        
	        if(!empty($this->config['sy_web_city_one']) && empty($this->config['sy_web_city_two'])){
	            // 只设置了一级城市
	            $provinceid        =  $this->config['sy_web_city_one'];
	            $citytwo[0][]      =  array('value'=>0,'label'=>'全部');//第二列 全部
	            $citythreetwoArr[$provinceid][]	=  array(array());//用做 一级-全部-''
	            foreach ($city_type[$provinceid] as $v){
	                
	                $citytwo[0][]  =  array('value'=>$v,'label'=>$city_name[$v]);
	                if (is_array($city_type[$v]) && !empty($city_three)){
	                    $citythreeArr  =  array();
	                    $citythreeArr[] =  array('value'=>0,'label'=>'全部');
	                    foreach ($city_type[$v] as $ka=>$va){
	                        $citythreeArr[]  =	array('value'=>$va,'label'=>$city_name[$va]);
	                    }
	                    $citythreetwoArr[$provinceid][]   =	$citythreeArr;
	                }
	            }
	            if (!empty($city_three)){
	                $citythree	=  array_values($citythreetwoArr);
	            }
	        }
	        
	        if (!empty($this->config['sy_web_city_two'])) {
	            // 设置了二级城市
	            $cityid        =  $this->config['sy_web_city_two'];
	            $citytwo[0][]  =  array('value'=>$cityid,'label'=>$city_name[$cityid]);
	            if (!empty($city_three)){
	                // 二级城市，要展示3级类别
	                $citythree[0][0][]  =  array('value'=>0,'label'=>'全部');//第三列 全部
	                foreach ($city_type[$cityid] as $v){
	                    
	                    $citythree[0][0][]  =  array('value'=>$v,'label'=>$city_name[$v]);
	                }
	            }
            }
            if (!empty($return['cityid'])) {
                $listcity  =  $city_name[$return['cityid']];
            }
            if (!empty($return['three_cityid'])) {
                $listcity  =  $city_name[$return['three_cityid']];
            }
	        $return['listcity']   =  $listcity;
	        $return['cityone']    =  !empty($cityone) ? $cityone : array();
	        $return['citytwo']    =  !empty($citytwo) ? $citytwo : array();
	        $return['citythree']  =  !empty($citythree) ? $citythree : array();
	    }
	    return $return;
	}
	/**
	 * 发送注册验证码接口防护验证
	 */
	function checkMcsdk($moblie = '')
	{
	    $mcsdk = $_SERVER['HTTP_MCSDK'];
	    if (empty($mcsdk)){
	        $this -> render_json(-1, '手机号异常');
	    }else{
	        $phone = '';
	        $day   = date('j');
	        
	        if ($this->plat == 'mini'){
	            
	            $openssl  = new OpensslCrypt($this->xcxKey, $this->xcxPy);
	            $decrypt  = $openssl->miniDecrypt($mcsdk);
	            $phone = str_replace($this->xcxShell.$day,'',$decrypt);
	            
	        }elseif ($this->plat == 'app'){
	            
	            $openssl  = new OpensslCrypt($this->appKey, $this->appPy);
	            $decrypt  = $openssl->miniDecrypt($mcsdk);
	            $phone = str_replace($this->appShell.$day,'',$decrypt);
	            
	        }else{
	            
	            return false;
	        }
	        if (!empty($moblie) && $phone != $moblie){
	            $this -> render_json(-1, '手机号验证异常');
	        }
	    }
	}
	/**
	 * 随机取一条数据
	 */
	public function randomArr($data, $random){
	    if ($random && count($data) > $random) {
	        $temp = [];
	        $random_keys = array_rand($data, $random);
	        
	        if($random == 1) {
	            $temp[] = $data[$random_keys];
	        } else {
	            foreach ($data as $key => $value) {
	                if (in_array($key, $random_keys)) {
	                    $temp[$key] = $value;
	                }
	            }
	        }
	        $data = $temp;
	    }
	    
	    return  $data;
	}
	// 获取广告
	public function ad_wxapp($param = array(), $ad_label = null){
	    
	    $did  = !empty($_POST['did']) ? $_POST['did'] : 0;
	    
	    if (!empty($param['class_id'])){
	        $adid = (int)$param['class_id'];
	    }elseif (!empty($param['name'])){
	        // 按位置获取广告类别
	        $flagArray = [
	            'job_show'    => 512,
	            'resume'      => 505,
	            'job'         => 504,
	            'popup_ad'    => 502,
	            'com_center'  => 501,
	            'user_center' => 500
	        ];
	        $adid = $flagArray[$param['name']];
	    }
	    $adpics = array();
	    
	    if (!empty($adid)){
	        if (!isset($ad_label)){
	            include PLUS_PATH.'pimg_cache.php';
	        }
	        $time  =  time();
	        foreach ($ad_label[$adid] as $k=>$v){
	            // 图片广告、没过期、全站使用或者与分站对应
	            if($v['type']=='pic' && $v['start']<$time && $v['end']>$time && ($v['did'] == -1 || $v['did'] == $did)){
	                $appad = array('pic_url'=>$v['pic'],'src'=>$v['pic']);
	                if (!empty($v['appurl'])){
	                    // 处理跳转链接路径，开头没有/的，加上/
	                    $appad['appurl']  =  stripos($v['appurl'],'/') == 0 ? $v['appurl'] : '/'.$v['appurl'];
	                }else{
	                    $appad['appurl']  =  '';
	                }
	                
	                $adpics[]  =  $appad;
	            }
	        }
	        
	        $random = isset($_POST['random']) ? $_POST['random'] : 0; // 判断是否取随机条数
	        if ($adpics && $random) {
	            $adpics = $this->randomArr($adpics, $random);
	        }
	    }
	    return $adpics;
	}
	/**
	 * 6.1版开始对注册、登录传的相关参数进行加密，这里需要解密
	 */
	function decryptRequest($str = '')
	{
	    $res = '';
	    $day   = date('j');
	    
	    if ($this->plat == 'mini'){
	        
	        $openssl  = new OpensslCrypt($this->xcxKey, $this->xcxPy);
	        $decrypt  = $openssl->miniDecrypt($str);
	        $res = str_replace($this->xcxShell.$day,'',$decrypt);
	        
	    }elseif ($this->plat == 'app'){
	        
	        $openssl  = new OpensslCrypt($this->appKey, $this->appPy);
	        $decrypt  = $openssl->miniDecrypt($str);
	        $res = str_replace($this->appShell.$day,'',$decrypt);
	        
	    }
	    return $res;
	}
	// 生成二维码传图的密钥（放到二维码中）
	private function generateToken($type, $uid, $password = '')
	{
	    // 考虑到二维码承载的信息长度有限，tokenSalt和password都限定字符串长度，以得到较短的token
	    $password = substr($password, 0, 8);
	    
	    $this->tokenSalt = $this->config['sy_safekey'];
	    
	    return yunEncrypt("{$type}|{$uid}|{$password}", $this->tokenSalt);
	}
}
?>