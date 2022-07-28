<?php

/*
 * $Author ：PHPYUN开发团队
 *
 * 官网: http://www.phpyun.com
 *
 * 版权所有 2009-2021 宿迁鑫潮信息技术有限公司，并保留所有权利。
 *
 * 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
 */
class admin_right_controller extends adminCommon{

    function index_action(){
        
        global $db_config;
        // 获取当前版本，并比较，确认最新的升级文件是否允已运行
        $versionM = $this->MODEL('version');
        $version = $versionM->getVerion();
         
        $pyu = $versionM->phpyunVersionCompare($version);
        $this -> yunset(array('version'=>$version,'pyu'=>$pyu));
        
        $this -> yunset('db_config', $db_config);
        
        $base       =       base64_encode($db_config['coding'] . '|phpyun|' . $this->config['sy_webname'] . '|phpyun|' . $this->config['sy_weburl'] . '|phpyun|' . $this->config['sy_webemail'] . '|phpyun|' . $version);
        
        $this->yunset('base', $base);
        
        if (is_dir('../admin')) {
            
            $dirname[]      =       'admin';
        } else {
            // 生成admin是否更改
            $admindir       =   str_replace('/index.php', '', $_SERVER['PHP_SELF']);
            $admindir_arr   =   explode('/', $admindir);
            $newadmindir    =   $admindir_arr[count($admindir_arr) - 1];
            
            include (PLUS_PATH . '/admindir.php');
            if ($admindir != $newadmindir) {
                $cont       =       "<?php";
                $cont       .=       "\r\n";
                $cont       .=      "\$admindir='" . $newadmindir . "';";
                $cont       .=      "?>";
                
                $fp          =   @fopen(PLUS_PATH . '/admindir.php', 'w+');
                $filetouid   =   @fwrite($fp, $cont);
                @fclose($fp);
            }
        }
        if (is_dir('../install')){
            $dirname[] = 'install';
        }
        $this -> yunset('dirname', @implode(',', $dirname));
        
        $adminM		=     $this -> MODEL('admin');
        
        $nav_user	=	$adminM -> getPower(array('uid'=>$_SESSION['auid']));
        
        $mruser		=	$nav_user['username'] == 'admin' && $nav_user['password'] == $adminM->makePass('admin') ? 1 : 0;

        $this -> yunset('mruser', $mruser);

        $this -> yunset('power', $nav_user['power']);

        $this -> yunset('lasttime', $_COOKIE['lasttime']);
        $adminuser = $adminM->getAdminUser(array('uid'=>$_SESSION['auid']),array('field'=>'`index_lookstatistc`'));
        $this->yunset('index_lookstatistc',$adminuser['index_lookstatistc']);
        
        $soft           =   $_SERVER['SERVER_SOFTWARE'];
        $kongjian       =   round(@disk_free_space('.') / (1024 * 1024), 2);
        $banben         =   $this->db->mysql_server(1);
        $yonghu         =   @get_current_user();
        $server         =   $_SERVER['SERVER_NAME'];
        
        $this->yunset('soft', $soft);
        $this->yunset('kongjian', $kongjian);
        $this->yunset('banben', $banben);
        $this->yunset('phpbanben', PHP_VERSION);
        $this->yunset('yonghu', $yonghu);
        $this->yunset('server', $server);
        
        $this->yuntpl(array('admin/admin_right'));
    }

    // 后台首页：会员统计信息：今日新增会员总数、新增个人会员数、新增简历、新增企业、新增职位、
    // 待审核个人会员、企业、职位、简历、猎头
    // 后台首页：收益统计：总收益、
    function ajax_statis_action(){

        $UserinfoM	=	$this->MODEL('userinfo'); 
        $ResumeM	=	$this->MODEL('resume');
        $ArticleM	=	$this->MODEL('article');
        $OnceM		=	$this->MODEL('once');
        $JobM		=	$this->MODEL('job');
		//	$CompanyM	=	$this->MODEL('company');
        $CorderM	=	$this->MODEL('companyorder');
        $AdM		=	$this->MODEL('ad');
        $TinyM		=	$this->MODEL('tiny');
        $downresumeM		=	$this->MODEL('downresume');

        $today	=	strtotime('today');

        if (!empty($_POST['sdate']) && !empty($_POST['edate'])) {
            $sdate = strtotime($_POST['sdate']);
            $edate = strtotime($_POST['edate']. ' 23:59:59');
            $tw = array(
                array('>=', $sdate),
                array('<=', $edate)
            );
        } else {
            $month = strtotime(date('Y-m')); // 月初第一天
            $tw = array('>=', $month);
        }

        // 今日新增会员数
        $where['reg_date']	=	array(">=",$today);
        $memberNum			=	$UserinfoM->getMemberNum($where);
        
        $userwhere['reg_date']	=	array(">=",$today);
        $userwhere['usertype']	=	1;
        // 新增个人会员数
        $userNum				=	$UserinfoM->getMemberNum($userwhere);
        
        // 新增企业会员数
        $comwhere['reg_date']	=	array(">=",$today);
        $comwhere['usertype']	=	2;
        $comwhere['pid']		=	0;
        $companyNum        		=	$UserinfoM->getMemberNum($comwhere);
        
        $expectwhere['ctime']	=	array(">=",$today);
        $resumeNum        		=	$ResumeM->getExpectNum($expectwhere);

        $jobwhere['sdate']	    =	array(">=",$today);
        $jobNum          	    =	$JobM->getJobNum($jobwhere);
        
        // 总收益
        $owhere['order_state']	=	2;
        $owhere['order_time']	=	array('>=',$today);
        $owhere['type']	        =	array('<>', 6);
        $moneyTotal	=	$CorderM->getInfo($owhere,array('field'=>'sum(order_price) as `total`'));
        $moneyTotal = $moneyTotal['total'];

        // 增值套餐 收益
      
        $vwhere['order_state']	=	2;
        $vwhere['order_time']	=	array('>=',$today);
        $vwhere['type']			=	1;
        $moneyVip	=	$CorderM->getInfo($vwhere,array('field'=>'sum(order_price) as `total`'));
        $moneyVip	=	$moneyVip['total'];
        
        // 增值服务 收益
        $swhere['order_state']	=	2;
        $swhere['order_time']	=	array('>=',$today);
        $swhere['type']			=	5;
        $moneyService	=	$CorderM->getInfo($swhere,array('field'=>'sum(order_price) as `total`'));
        $moneyService	=	$moneyService['total'];
        
        // 其他收益（除去会员套餐和增值服务，都归为其他收益）
        $Iwhere['order_state']	    =	2;
        $Iwhere['order_time']	    =	array('>=',$today);
        $Iwhere['PHPYUNBTWSTART_A'] =   '';
        $Iwhere['type'][]			=	array('<>', 1, 'AND');
        $Iwhere['type'][]			=	array('<>', 5, 'AND');
        $Iwhere['type'][]			=	array('<>', 6, 'AND');
        $Iwhere['PHPYUNBTWEND_A']   =   '';
        $moneyIntegral	=	$CorderM->getInfo($Iwhere,array('field'=>'sum(order_price) as `total`'));
        $moneyIntegral	=	$moneyIntegral['total'];
        
        

        $mrewhere['ctime']	=	$tw;
        $resumeNumMon		=	$ResumeM->getExpectNum($mrewhere);
	
        $mjobwhere['sdate']	=	$tw;
        $jobNumMon			=	$JobM->getJobNum($mjobwhere);
        
        $mcomwhere['usertype']	=	2;
        $mcomwhere['reg_date']	=	$tw;
        $companyNumMon			=	$UserinfoM->getMemberNum($mcomwhere);

        $muserwhere['usertype']	=	1;
        $muserwhere['reg_date']	=	$tw;
        $userNumMon				=	$UserinfoM->getMemberNum($muserwhere);

        $madwhere['addtime']	=	$tw;
        $ggNumMon				=	$AdM->getAdClickNum($madwhere);

        $mujobwhere['datetime'] = $tw;
        $userjobNumMon = $JobM->getSqJobNum($mujobwhere);

        $myqmswhere['datetime'] = $tw;
        $yqmsNumMon = $JobM->getYqmsNum($myqmswhere);

        $mdownresumewhere['downtime'] = $tw;
        $downreusmeNumMon = $downresumeM->getDownNum($mdownresumewhere);

        echo json_encode(array(
            'memberNum'                  =>         $memberNum,
            'userNum'                    =>         $userNum,
            'companyNum'                 =>         $companyNum,
            'resumeNum'                  =>         $resumeNum,
            'jobNum'                     =>         $jobNum,
            'moneyTotal'                 =>         $moneyTotal,
            'moneyVip'                   =>         $moneyVip,
            'moneyIntegral'              =>         $moneyIntegral,
            'moneyService'               =>         $moneyService,
            'resumeNumMon'               =>         $resumeNumMon,
            'jobNumMon'                  =>         $jobNumMon,
            'companyNumMon'              =>         $companyNumMon,
            'userNumMon'                 =>         $userNumMon,
            'ggNumMon'                   =>         $ggNumMon,

            'userjobNumMon'              =>         $userjobNumMon,
            'yqmsNumMon'                 =>         $yqmsNumMon,
            'downreusmeNumMon'           =>         $downreusmeNumMon
        ));
        exit();
    }
    // 网站统计
    function getweb_action(){
        $this->tjl("member","login_log", array('reg_date','ctime'), array('个人注册','个人登录','上月个人注册','上月个人登录'), array('type'=>1));
    }

    function comtj_action(){
        $this->tjl("member","login_log", array('reg_date','ctime'), array('企业注册','企业登录','上月企业注册','上月企业登录'), array('type'=>2));
    }

    function tjlData($tablename, $usertype, $field, $days, $sdate, $edate, $initM = true)
    {
        $TongjiM = $this->MODEL('tongji');
        $where['usertype'] = $usertype;
        $field == 'reg_date' && $where['pid'] = 0;
        $where[$field][] = array(">=", $sdate);
        $where[$field][] = array("<=", $edate);
        $where['groupby'] = 'td';
        $where['orderby'] = array('td,desc');
        $statistics = $TongjiM->tjtotal($tablename, $where, array('field' => 'FROM_UNIXTIME(' . $field . ',"%Y%m%d") as td,count(*) as cnt'));

        $list = $dateList = array();

        if (is_array($statistics)) {
            $allNum = 0;

            foreach ($statistics as $key => $value) {
                $allNum += $value['cnt'];
                $dateList[$value['td']] = $value;
            }

            if ($days > 0) {
                if ($initM) { // 每月1号开始
                    $d = (int)date('d', $edate);

                    if ($d == 1 || $d == '01') {// 月初第一天
                        $y = date('Y', $edate);
                        $m = date('m', $edate);
                        // 前一天数据单独单独处理
                        $days = 0;
                        $lastday = strtotime('-1 day');
                        $ly = date('Y', $lastday);
                        $lm = date('m', $lastday);
                        $ld = (int)date('d', $lastday);
                        $londay = $ly . $lm . $ld;
                        $ltd = "{$lm}-{$ld}";
                        $ldate = "{$ly}-{$lm}-{$ld}";
                        if (!empty($dateList[$londay])) {
                            $dateList[$londay]['td'] = $ltd;
                            $dateList[$londay]['date'] = $ldate;

                            $list[$londay] = $dateList[$londay];
                        } else {
                            $list[$londay] = array('td' => $ltd, 'cnt' => 0, 'date' => $ldate);
                        }
                    } else {
                        $y = date('Y', $sdate);
                        $m = date('m', $sdate);
                    }

                    // for ($i = 1; $i <= $d && $i <= $days + 1; $i++) {
                    for ($i = 1; $i <= $days + 1; $i++) {
                        $ds = $i < 10 ? '0' . $i : $i;
                        $onday = $y . $m . $ds;
                        $td = "{$m}-{$ds}";
                        $date = "{$y}-{$m}-{$ds}";

                        if (!empty($dateList[$onday])) {
                            $dateList[$onday]['td'] = $td;
                            $dateList[$onday]['date'] = $date;

                            $list[$onday] = $dateList[$onday];
                        } else {
                            $list[$onday] = array('td' => $td, 'cnt' => 0, 'date' => $date);
                        }
                    }
                } else { // 开放区间
                    for ($i = 0; $i <= $days; $i ++) {
                        $onday	=	date("Ymd", strtotime(' -' . $i . 'day', $edate));
                        $td		=	date('m-d', strtotime(' -' . $i . 'day', $edate));
                        $date	=	date('Y-m-d', strtotime(' -' . $i . 'day', $edate));

                        if (! empty($dateList[$onday])) {
                            $dateList[$onday]['td']		=	$td;
                            $dateList[$onday]['date']	=	$date;
                            $list[$onday]			=	$dateList[$onday];
                        } else {
                            $list[$onday]			=	array('td' => $td,'cnt' => 0,'date' => $date);
                        }
                    }
                }
            }
        }
        ksort($list);

        return array('count' => $allNum, 'list' => $list);
    }

    function tjl($tablename1, $tablename2, $field = array(), $name = array(), $data = array())
    {
        $TimeDate = $this->day();
        $sdate = $TimeDate['sdate'];
        $edate = $TimeDate['edate'];
        $days = $TimeDate['days'];
        $initM = empty($_GET['days']);
        $startTime = strtotime($sdate);
        $endTime = strtotime($edate . ' 23:59:59');

        if ($field[0]) {
            $list[] = $this->tjlData($tablename1, $data['type'], $field[0], $days, $startTime, $endTime, $initM);
        }
        if ($field[1]) {
            $list[] = $this->tjlData($tablename2, $data['type'], $field[1], $days, $startTime, $endTime, $initM);
        }
        if ($initM) {
            $lastEndtTime = $startTime - 1;
            isset($field[0]) && $list[] = $this->tjlData($tablename1, $data['type'], $field[0], $days, strtotime(date('Y-m', $lastEndtTime)), $lastEndtTime);
            isset($field[1]) && $list[] = $this->tjlData($tablename2, $data['type'], $field[1], $days, strtotime(date('Y-m', $lastEndtTime)), $lastEndtTime);
        }else{
            unset($name[2]);
            unset($name[3]);
        }
        $this->yunset('list', json_encode($list, JSON_UNESCAPED_UNICODE));
        $this->yunset('name', json_encode($name, JSON_UNESCAPED_UNICODE));
        $this->yunset('type', "tj");

        $this->yuntpl(array('admin/admin_right_web'));
    }

    function ujobtj_action(){
        $this->tj("userid_job", array('datetime'), array('简历投递统计','上月简历投递统计'));
    }
    function yqmstj_action(){
        $this->tj("userid_msg", array('datetime'), array('邀请面试统计','上月邀请面试统计'));
    }
    function downresumetj_action(){
        $this->tj("down_resume", array('downtime'), array('简历下载统计','上月简历下载统计'));
    }
    function resumetj_action(){
        $this->tj("resume_expect", array('ctime','r_time'), array('简历新增','简历刷新','上月简历新增','上月简历刷新'));
    }
    function newstj_action(){
        $this->tj("news_base", array('datetime'), array('新闻新增','上月新闻新增'));
    }
    function adtj_action(){
        $this->tj("adclick", array('addtime'), array('广告点击统计','上月广告点击统计'));
    }
    function jobtj_action(){
        $this->tj("company_job", array('sdate','r_time'), array('职位新增','职位刷新','上月职位新增','上月职位刷新'));
    }
    function wzptj_action(){
        $this->tj("once_job", array('ctime','sxtime'), array('店铺招聘新增','店铺招聘刷新','上月店铺招聘新增','上月店铺招聘刷新'));
    }
    function wjltj_action(){
        $this->tj("resume_tiny", array('time','lastupdate'), array('普工简历新增','普工简历刷新','上月普工简历新增','上月普工简历刷新'));
    }
    function payordertj_action(){
        $this->tj("company_order", array('order_time'), array('充值统计','上月充值统计'));
    }

    function tjData($tablename, $field, $days, $sdate, $edate, $initM = true)
    {
        $TongjiM = $this->MODEL('tongji');

        $where[$field][]	=	array(">=", $sdate);
        $where[$field][]	=	array("<=", $edate);
        $where['groupby']	=	'td';
        $where['orderby']	=	array('td,desc');
         $statistics = $TongjiM->tjtotal($tablename, $where, array('field' => 'FROM_UNIXTIME(' . $field . ',"%Y%m%d") as td,count(*) as cnt'));

        $list = $dateList = array();

        if (is_array($statistics)) {
            $allNum = 0;

            foreach ($statistics as $key => $value) {
                $allNum += $value['cnt'];
                $dateList[$value['td']] = $value;
            }

            if ($days > 0) {
                if ($initM) { // 每月1号开始
                    $d = (int)date('d', $edate);

                    if ($d == 1 || $d == '01') {// 月初第一天
                        $y = date('Y', $edate);
                        $m = date('m', $edate);
                        // 前一天数据单独单独处理
                        $days = 0;
                        $lastday = strtotime('-1 day');
                        $ly = date('Y', $lastday);
                        $lm = date('m', $lastday);
                        $ld = (int)date('d', $lastday);
                        $londay = $ly . $lm . $ld;
                        $ltd = "{$lm}-{$ld}";
                        $ldate = "{$ly}-{$lm}-{$ld}";
                        if (!empty($dateList[$londay])) {
                            $dateList[$londay]['td'] = $ltd;
                            $dateList[$londay]['date'] = $ldate;

                            $list[$londay] = $dateList[$londay];
                        } else {
                            $list[$londay] = array('td' => $ltd, 'cnt' => 0, 'date' => $ldate);
                        }
                    } else {
                        $y = date('Y', $sdate);
                        $m = date('m', $sdate);
                    }

                    // for ($i = 1; $i <= $d && $i <= $days + 1; $i++) {
                    for ($i = 1; $i <= $days + 1; $i++) {
                        $ds = $i < 10 ? '0' . $i : $i;
                        $onday = $y . $m . $ds;
                        $td = "{$m}-{$ds}";
                        $date = "{$y}-{$m}-{$d}";

                        if (!empty($dateList[$onday])) {
                            $dateList[$onday]['td'] = $td;
                            $dateList[$onday]['date'] = $date;

                            $list[$onday] = $dateList[$onday];
                        } else {
                            $list[$onday] = array('td' => $td, 'cnt' => 0, 'date' => $date);
                        }
                    }
                } else { // 开放区间
                    for ($i = 0; $i <= $days; $i ++) {
                        $onday	=	date("Ymd", strtotime(' -' . $i . 'day', $edate));
                        $td		=	date('m-d', strtotime(' -' . $i . 'day', $edate));
                        $date	=	date('Y-m-d', strtotime(' -' . $i . 'day', $edate));

                        if (! empty($dateList[$onday])) {
                            $dateList[$onday]['td']		=	$td;
                            $dateList[$onday]['date']	=	$date;
                            $list[$onday]			=	$dateList[$onday];
                        } else {
                            $list[$onday] = array('td' => $td,'cnt' => 0,'date' => $date);
                        }
                    }
                }
            }
        }
        ksort($list);

        return array('count' => $allNum, 'list' => $list);
    }

    function tj($tablename, $field = array(), $name = array(), $where = '')
    {
        $TimeDate = $this->day();
        $sdate = $TimeDate['sdate'];
        $edate = $TimeDate['edate'];
        $days = $TimeDate['days'];
        $initM = empty($_GET['days']);
        $startTime = strtotime($sdate);
        $endTime = strtotime($edate . ' 23:59:59');

        if ($field[0]) {
            $list[] = $this->tjData($tablename, $field[0], $days, $startTime, $endTime, $initM);
        }
        if ($field[1]) {
            $ntablename = $tablename;
            if ($tablename == 'resume_expect') {
                $ntablename = 'resume_refresh_log';
            }
            if ($tablename == 'company_job') {
                $ntablename = 'job_refresh_log';
                $loginWhere['type'] = 1;
            }

            $list[] = $this->tjData($ntablename, $field[1], $days, $startTime, $endTime, $initM);
        }
        if ($initM) {
            $lastEndtTime = $startTime - 1;
            isset($field[0]) && $list[] = $this->tjData($tablename, $field[0], $days, strtotime(date('Y-m', $lastEndtTime)), $lastEndtTime);
            isset($field[1]) && $list[] = $this->tjData($ntablename, $field[1], $days, strtotime(date('Y-m', $lastEndtTime)), $lastEndtTime);
        }
        $lnum = count($list);
        $nnum = count($name);
        if ($lnum < $nnum) {
            for ($i = $lnum; $i < $nnum; $i++) {
                unset($name[$i]);
            }
        }
        $this->yunset('list', json_encode($list, JSON_UNESCAPED_UNICODE));
        $this->yunset('name', json_encode($name, JSON_UNESCAPED_UNICODE));
        $this->yunset('type', "tj");

        $this->yuntpl(array('admin/admin_right_web'));
    }

    // 网站动态
    function downresumedt_action(){

        $where['orderby']	=	array('downtime,desc');
        $this->dt('down_resume', 'downtime', '下载简历动态', $where);
    }
    function lookjobdt_action(){

        $where['orderby']	=	array('datetime,desc');
        $this->dt('look_job', 'datetime', '职位浏览动态', $where);
    }
    function lookresumedt_action(){

        $where['orderby']	=	array('datetime,desc');
        $this->dt('look_resume', 'datetime', '简历浏览动态', $where);
    }
    function useridjobdt_action(){

        $where['orderby']	=	array('datetime,desc');
        $this->dt('userid_job', 'datetime', '职位申请动态', $where);
    }
    function favjobdt_action(){
		
        $where['orderby']	=	array('datetime,desc');
        $this->dt('fav_job', 'datetime', '职位收藏动态', $where);
    }
    function payorderdt_action(){
		
        $where['orderby']		=	array('order_time,desc');
        $where['order_state']	=	2;
        $this->dt('company_order', 'order_time', '充值动态', $where);
    }
    function dt($tablename, $field, $name, $where=array()){

        $UserinfoM	=	$this->MODEL('userinfo'); 
        $TongjiM	=	$this->MODEL('tongji');
        $JobM		=	$this->MODEL('job');
        $ResumeM	=	$this->MODEL('resume');
        
        $where['limit']	=	'14';
        $List			=	$TongjiM->tjtotal($tablename,$where);
 
        if (is_array($List)) {
            foreach ($List as $v) {
                if (!empty($v['uid'])) {
                    $uid[] = $v['uid'];
                }
                if (!empty($v['comid'])) {
                    if ($v['usertype'] == 2){
                        $comid[] = $v['comid'];
                    }
                }
                if (!empty($v['com_id'])) {
                    $com_id[] = $v['com_id'];
                }
                if (!empty($v['jobid'])) {
                    $jobid[] = $v['jobid'];
                }
            }
            
            $uidwhere['uid']	=	array('in',pylode(',',array_unique($uid)));
            if ($tablename == 'company_order'){
                $member2		=	$UserinfoM->getUserList($uidwhere);
            }else{
                // 非订单表，只查个人
                $member2		=	$UserinfoM->getUserInfoList($uidwhere, array('usertype'=>1,'field'=>'`uid`,`name`'));
            }
            if (!empty($comid)){
                $comidwhere['uid']	=	array('in',pylode(',',array_unique($comid)));
                $member			=	$UserinfoM->getUserInfoList($comidwhere, array('usertype'=>2,'field'=>'`uid`,`name`'));
            }else{
                $com_idwhere['uid']	=	array('in',pylode(',',array_unique($com_id)));
                $member3		=	$UserinfoM->getUserList($com_idwhere);
            }
                     
            
            $resumewhere['uid']	=	array('in',pylode(',',array_unique($uid)));
            $resume				=	$ResumeM->getResumeList($resumewhere);

            $jobwhere['id']	=	array('in',pylode(',',array_unique($jobid)));
            $jobA			=	$JobM->getList($jobwhere);
            $job			=	$jobA['list'];
         
            foreach ($List as $k => $v) {

                foreach ($resume as $val) {

                    if ($v['uid'] == $val['uid']) {

                        $List[$k]['username']       =	$val['name'];
                    }
                }
                foreach ($job as $val) {

                    if ($v['jobid'] == $val['id']) {

                        $List[$k]['jobname']		=	$val['name'];
                    }
                }
                foreach ($member as $val) {

                    if ($v['comid'] == $val['uid']) {

                        $List[$k]['comusername']    =	$val['name'];
                    }
                }
                foreach ($member2 as $val) {

                    if ($v['uid'] == $val['uid']) {

                        $List[$k]['username']		=	$val['name'];
                    }
                }
                foreach ($member3 as $val) {

                    if ($v['com_id'] == $val['uid']) {

                        $List[$k]['comusername']	=	$val['name'];
                    }
                }
                $time	=	time() - $v['downtime'];

                if ($time > 86400 && $time < 604800) {

                    $List[$k]['time']	=	ceil($time / 86400) . "天前";

                } elseif ($time > 3600 && $time < 86400) {

                    $List[$k]['time']	=	ceil($time / 3600) . "小时前";
	
                } elseif ($time > 60 && $time < 3600) {

                    $List[$k]['time']	=	ceil($time / 60) . "分钟前";

                } elseif ($time < 60) {

                    $List[$k]['time']	=	"刚刚";
                } else {
                    $List[$k]['time']	=	date("Y-m-d", $v['downtime']);
                }
                $times	=	time() - $v['datetime'];

                if ($times > 86400 && $times < 604800) {

                    $List[$k]['times']	=	ceil($times / 86400) . "天前";

                } elseif ($times > 3600 && $times < 86400) {

                    $List[$k]['times']	=	ceil($times / 3600) . "小时前";

                } elseif ($times > 60 && $times < 3600) {

                    $List[$k]['times']	=	ceil($times / 60) . "分钟前";

                } elseif ($times < 60) {

                    $List[$k]['times']	=	"刚刚";
                } else {
                    $List[$k]['times']	=	date("Y-m-d", $v['datetime']);
                }
                $timess	=	time() - $v['order_time'];

                if ($timess > 86400 && $timess < 604800) {

                    $List[$k]['timess']	=	ceil($timess / 86400) . "天前";

                } elseif ($timess > 3600 && $timess < 86400) {

                    $List[$k]['timess']	=	ceil($timess / 3600) . "小时前";

                } elseif ($timess > 60 && $timess < 3600) {

                    $List[$k]['timess']	=	ceil($timess / 60) . "分钟前";

                } elseif ($timess < 60) {

                    $List[$k]['timess']	=	"刚刚";
                } else {
                    $List[$k]['timess']	=	date("Y-m-d", $v['order_time']);
                }
            }
        }
        
        $this->yunset('list', $List);
        $this->yunset('name', $name);
        $this->yunset('type', "dt");

        $this->yuntpl(array('admin/admin_right_web'));
    }

    // 会员日志
    function userrz_action(){
		 
        $where['usertype']	=	1;
        $where['orderby']	=	array('ctime,desc');
        $this->rz("member_log", "ctime", "个人会员日志", $where);
    }
    function comrz_action(){
        $where['usertype']	=	2;
        $where['orderby']	=	array('ctime,desc');
        $this->rz("member_log", "ctime", "企业会员日志", $where);
    }
    function rz($tablename, $field, $name, $where=array()){

        $UserinfoM	=	$this->MODEL('userinfo'); 
        $TongjiM	=	$this->MODEL('tongji');

        $where['limit']	=	14;
        $List			=	$TongjiM->tjtotal($tablename,$where);
        
        if (is_array($List)) {

            foreach ($List as $v) {

                $uid[]	=	$v['uid'];
            }
            $uidwhere['uid']	=	array('in',pylode(',',$uid));
            if ($where['usertype'] != 5){
                $member         =	$UserinfoM->getUserList($uidwhere);
           }else{
                $member         =	$UserinfoM->getUserInfoList($uidwhere,array('usertype'=>$where['usertype'],'field'=>'`uid`,`name`'));
            }

            foreach ($List as $k => $v) {

                foreach ($member as $val) {

                    if ($v['uid'] == $val['uid']) {

                        $List[$k]['username']	=	$val['name'];
                    }
                }
                $time	=	time() - $v['ctime'];

                if ($time > 86400 && $time < 604800) {

                    $List[$k]['time']   =	ceil($time / 86400) . "天前";

                } elseif ($time > 3600 && $time < 86400) {

                    $List[$k]['time']   =	ceil($time / 3600) . "小时前";

                } elseif ($time > 60 && $time < 3600) {

                    $List[$k]['time']   =	ceil($time / 60) . "分钟前";

                } elseif ($time < 60) {

                    $List[$k]['time']   =	"刚刚";
                } else {
                    $List[$k]['time']   =	date("Y-m-d", $v['ctime']);
                }
            }
        }
        $this->yunset('list', $List);
        $this->yunset('name', $name);
        $this->yunset('type', "rz");

        $this->yuntpl(array('admin/admin_right_web'));
    }
	
    function getMostElements($arr){
        $arr		=	array_count_values($arr);
        asort($arr);
        
        $findNum	=	end($arr);

        foreach ($arr as $k => $v) {

            if ($v != $findNum) {

                unset($arr[$k]);
            }
        }
        return array_keys($arr);
    }
    // 时间获取
    function day(){

        if ((int) $_GET['days'] > 0) {

            $days	=	(int) $_GET['days'];
            $sdate	=	date('Y-m-d', (time() - $days * 86400));
            $edate	=	date('Y-m-d');

        } elseif ($_GET['sdate']) {

            $sdate	=	$_GET['sdate'];
            $days	=	ceil(abs(time() - strtotime($sdate)) / 86400);

            if ($_GET['edate']) {

                $edate  =	$_GET['edate'];
                $days	=	ceil(abs(strtotime($edate) - strtotime($sdate)) / 86400);
            }
        } else {
            
        	$days	=	intval(date('d')) - 1;
        	
            $days	=	$days == 0 ? 1 : $days;
            
            $sdate	=	date('Y-m-d', (time() - $days * 86400));
            $edate	=	date('Y-m-d');
        }
        return array('sdate' => $sdate,'days' => $days,'edate' => $edate);
    }
}
?>