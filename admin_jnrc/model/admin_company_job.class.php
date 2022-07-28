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

class admin_company_job_controller extends adminCommon{

    // 设置高级搜索功能
    function set_search($CacheList = array()){

		include(CONFIG_PATH.'db.data.php');

		$source   =   $arr_data['source'];

		$this -> yunset('source',$source);

		if (!$CacheList){

			$cacheM		=	$this -> MODEL('cache');
			$CacheList	=	$cacheM -> GetCache(array('com', 'job', 'city'));

			$setArr	=	array(
				'comdata'		=>	$CacheList['comdata'],
				'comclass_name'=>	$CacheList['comclass_name'],
				'job_name'		=>	$CacheList['job_name'],
				'city_name'		=>	$CacheList['city_name']
			);
			$this -> yunset($setArr);
        }

		$comdata		=	$CacheList['comdata'];
		$comclass_name	=	$CacheList['comclass_name'];


		foreach($comdata['job_edu'] as $k=>$v){

			$edu[$v]	=	$comclass_name[$v];
        }

		foreach($comdata['job_exp'] as $k=>$v){

            $exp[$v]	=	$comclass_name[$v];
        }

		$search_list      =   array();

		$search_list[]    =   array('param' => 'state','name'=>'审核状态', 'value' =>  array('1'=>'已审核','4'=>'未审核','3'=>'未通过','2'=>'已锁定'));

		$search_list[]    =   array('param' => 'status','name'=>'招聘状态', 'value' =>  array('1'=>'已下架','2'=>'招聘中'));

		$search_list[]    =   array('param' => 'jtype','name'=>'职位类型', 'value' =>  array('urgent'=>'紧急职位','xuanshang'=>'置顶职位','rec'=>'推荐职位'));

		$search_list[]    =   array('param' => 'exp','name'=>'工作经验', 'value' =>  $exp);

		$search_list[]    =   array('param' => 'edu','name'=>'学历要求', 'value' =>  $edu);

		$search_list[]    =   array('param' => 'source','name'=>'数据来源', 'value' =>  $source);

		$search_list[]    =   array('param' => 'adtime','name'=>'发布时间', 'value' =>  array('1'=>'今天','3'=>'最近三天','7'=>'最近七天','15'=>'最近半月','30'=>'最近一个月','31'=>'当月'));

 		$this->yunset('search_list', $search_list);

	}

    //  职位列表
	function index_action(){

	    //实例化职位类
        $JobM       =   $this->MODEL('job');

        //搜索条件
        if ($_GET['state']) {
            $state      =   intval($_GET['state']);

            if ($state == 2) {

                $where['r_status']  =   2;
            } else {

                $where['state']     =   $state == 4 ? 0 : $state;
            }

            $urlarr['state']        =   $state;
        }

        if ($_GET['status']) {

            $status             =   intval($_GET['status']);

            $where['status']    =   $status == 2 ? 0 : $status;

            $urlarr['status']   =   $status;

        }

        if($_GET['jtype']){

            $jtype      =   trim($_GET['jtype']);

            if($jtype   ==  'rec'){

                $where['rec_time']      =   array('>',time());

            }else if($jtype     ==  'urgent'){

                $where['urgent_time']   =   array('>',time());

            }else if($jtype     ==  'xuanshang'){

                 $where['xsdate']       =   array('>',time());

            }

            $urlarr['jtype']    =   $jtype;

        }

		if($_GET['edu']){
		    include_once PLUS_PATH.'com.cache.php';
		    $eduArr  = $comdata['job_edu'];
		    $eduSort = 0;
		    $eduIds  = array();
		    // 职位搜索，排序比搜索小的都符合条件。如搜“硕士”，类别排序小于等于“硕士”排序的（要排除不限）都符合
		    foreach ($eduArr as $k => $v) {
		        if ($v == $_GET['edu'] && $comclass_name[$v] != '不限') {
		            $eduSort = $k;
		            break;
		        }
		    }
		    foreach ($eduArr as $k => $v) {
		        if ($k <= $eduSort && $comclass_name[$v] != '不限') {
		            $eduIds[] = $v;
		        }
		    }
		    if (!empty($eduIds)) {
		        $where['edu'] = array('in', pylode(',', $eduIds));
		    }
			$urlarr['edu']	=   $_GET['edu'];
		}

		if($_GET['exp']){
		    include_once PLUS_PATH.'com.cache.php';
		    $expArr  = $comdata['job_exp'];
		    $expSort = 0;
		    $expIds  = array();
		    // 职位搜索，排序比搜索小的都符合条件。如搜“五年”，类别排序小于等于“五年”排序的（要排除不限）都符合
		    foreach ($expArr as $k => $v) {
		        if ($v == $_GET['exp'] && $comclass_name[$v] != '不限') {
		            $expSort = $k;
		            break;
		        }
		    }
		    foreach ($expArr as $k => $v) {
		        if ($k <= $expSort && $comclass_name[$v] != '不限') {
		            $expIds[] = $v;
		        }
		    }
		    if (!empty($expIds)) {
		        $where['exp'] = array('in', pylode(',', $expIds));
		    }
			$urlarr['exp']	=   $_GET['exp'];
		}

        if(isset($_GET['source'])){

            $where['source']        =   intval($_GET['source']);

            $urlarr['source']       =   intval($_GET['source']);
        }

        if(isset($_GET['adtime'])){

             if($_GET['adtime']  ==  '1'){

                $where['sdate']     =   array('>',strtotime('today'));

             }else if ($_GET['adtime']  ==  '31'){
                 $month = get_this_month(time());
                 $where['PHPYUNBTWSTART_A']    =   '';

                 $where['sdate'][]         =   array('>=', $month['start_month'],'AND');
                 $where['sdate'][]         =   array('<=',  $month['end_month'],'AND');

                 $where['PHPYUNBTWEND_A']      =   '';
             }else{

                $where['sdate']     =   array('>',strtotime('-'.intval($_GET['adtime']).' day'));
            }

            $urlarr['adtime']       =   $_GET['adtime'];

        }

		if($_GET['job_class']){

		    $where['PHPYUNBTWSTARTA'] = '';
		    $where['job1']	        =	array('findin', $_GET['job_class']);
		    $where['job1_son']	    =	array('findin', $_GET['job_class'], 'OR');
		    $where['job_post']	    =	array('findin', $_GET['job_class'], 'OR');
		    $where['PHPYUNBTWENDa']  = '';

			$urlarr['job_class']	=	$_GET['job_class'];
		}
		if($_GET['city_class']){

		    $where['PHPYUNBTWSTARTB'] = '';
		    $where['provinceid']	=	array('findin', $_GET['city_class']);
		    $where['cityid']	    =	array('findin', $_GET['city_class'], 'OR');
		    $where['three_cityid']	=	array('findin', $_GET['city_class'], 'OR');
		    $where['PHPYUNBTWENDB']  = '';

			$urlarr['city_class']	=	$_GET['city_class'];
		}

        if($_GET['keyword']){

            if ($_GET['type']=='1'){

                $where['com_name']  =	array('like',trim($_GET['keyword']));

            }elseif ($_GET['type']=='2'){

                $where['name']      =	array('like',trim($_GET['keyword']));
            }

            $urlarr['type']			=	$_GET['type'];

            $urlarr['keyword']		=	$_GET['keyword'];
        }

        if(isset($_GET['is_reserve'])){

            $where['is_reserve']    =   intval($_GET['is_reserve']);

            $urlarr['is_reserve']   =   intval($_GET['is_reserve']);
        }
        if($_GET['uid']){
            $where['uid']      =   array('=',trim($_GET['uid']));
        }
        //分页链接
		$urlarr        	=   $_GET;
        $urlarr['page']	=	'{{page}}';

        $pageurl		=	Url($_GET['m'],$urlarr,'admin');

        //提取分页
        $pageM			=	$this  -> MODEL('page');
        $pages			=	$pageM -> pageList('company_job',$where,$pageurl,$_GET['page']);


        //分页数大于0的情况下 执行列表查询
        if($pages['total'] > 0){

            //limit order 只有在列表查询时才需要
            if($_GET['order']){

                $where['orderby']		=	$_GET['t'].','.$_GET['order'];
                $urlarr['order']		=	$_GET['order'];
                $urlarr['t']			=	$_GET['t'];

            }else{

                $where['orderby']		=	'lastupdate,desc';

            }

            $where['limit']				=	$pages['limit'];

            $ListJob    =   $JobM -> getList($where,array('utype'=>'admin','cache'=>'1','isurl'=>'yes','reserve'=>1));

            unset($where['limit']);

            session_start();
            $_SESSION['jobXls'] = $where;

			$CacheList	=	$ListJob['cache'];

			$setArr	=	array(
				'rows'			=>	$ListJob['list'],
				'cache'			=>	$CacheList,
				'comdata'		=>	$CacheList['comdata'],
				'comclass_name' =>	$CacheList['comclass_name'],
				'job_name'		=>	$CacheList['job_name'],
				'city_name'		=>	$CacheList['city_name']
			);
            $this -> yunset($setArr);
        }

		$this->set_search($CacheList);

        $WhbM       =   $this->MODEL('whb');

        $syJobHb    =   $WhbM->getWhbList(array('type' => 1, 'isopen'=>'1'));

        $this->yunset('hbNum', count($syJobHb));

		$this->yuntpl(array('admin/admin_company_job'));
	}

    /**
     * 招聘/下架操作
     */
    function checkstate_action()
    {
        if ($_POST['id'] && $_POST['state']) {

            $_POST['state'] =   $_POST['state'] == 2 ? 0 : $_POST['state'];

            $JobM   =   $this->MODEL('job');
            $id     =   intval($_POST['id']);
            $postData['status'] =   intval($_POST['state']);
            $JobM->upInfo($postData, array('id' => $id));

            if ($_POST['state'] == 0){

                $logMsg =   "职位(ID" . $_POST['id'] . ")上架成功";
            }else{

                $logMsg =   "职位(ID" . $_POST['id'] . ")下架成功";
            }

            $this->MODEL('log')->addAdminLog($logMsg);
        }
        echo 1;
    }

    // 	职位置顶
	function xuanshang_action(){

        $id     =   trim($_POST['pid']);

        $data   =   array(

            'top'   =>  intval($_POST['s']),
            'days'  =>  intval($_POST['days'])

        );

        $JobM   =   $this -> MODEL('job');

        $arr    =   $JobM -> addTopJob($id, $data);

        $this  ->  ACT_layer_msg( $arr['msg'],$arr['errcode'],$_SERVER['HTTP_REFERER'],2,1);

	}

	//  职位推荐
	function recommend_action(){

	    $id     =   trim($_POST['pid']);

	    $data   =   array(

	        'rec'   =>  intval($_POST['s']),
	        'days'  =>  intval($_POST['days'])

	    );

	    $JobM   =   $this -> MODEL('job');

	    $arr    =   $JobM -> addRecJob($id, $data);

	    $this  ->  ACT_layer_msg( $arr['msg'],$arr['errcode'],$_SERVER['HTTP_REFERER'],2,1);

	}

	//  职位紧急招聘
	function urgent_action(){

	    $id     =   trim($_POST['pid']);

	    $data   =   array(

	        'urgent'   =>  intval($_POST['s']),
	        'days'     =>  intval($_POST['days'])

	    );

	    $JobM   =   $this -> MODEL('job');

	    $arr    =   $JobM -> addUrgentJob($id, $data);

	    $this  ->  ACT_layer_msg( $arr['msg'],$arr['errcode'],$_SERVER['HTTP_REFERER'],2,1);

	}

	//  职位审核
    function status_action()
    {
        $jobM       =   $this->MODEL('job');

        $statusData = array(

            'state'         =>  intval($_POST['status']),
            'statusbody'    =>  trim($_POST['statusbody'])
        );

        $return = $jobM -> statusJob($_POST['pid'], $statusData);
        
        if (isset($_POST['single'])){
            if ($return['errcode'] == 9){
                if($_POST['atype'] == 1){
                    // 仅保存
                    $this->layer_msg($return['msg'],9);
                }else{
                    // 下一个待审核职位
                    $jobM  =  $this->MODEL('job');
                    $row   =  $jobM->getInfo(array('state'=>0,'orderby'=>array('lastupdate,DESC')), array('field'=>'id'));
                    if (!empty($row)){
                        $this->layer_msg($return['msg'],9,0,'index.php?m=admin_company_job&c=jobAudit&id='.$row['id']);
                    }else{
                        $this->layer_msg($return['msg'],9);
                    }
                }
            }else{
                $this->layer_msg($return['msg'],8);
            }
        }else{
            $this -> ACT_layer_msg($return['msg'],$return['errcode'],$_SERVER['HTTP_REFERER'],2,1);
        }
    }

    // 职位审核同步企业审核
    function cjobstatus_action()
    {
        if ($_POST) {
            
            $id         =   intval($_POST['pid']);
            $uid        =   intval($_POST['uid']);
            $status     =   intval($_POST['status']);
            $statusbody =   trim($_POST['statusbody']);
            
            $jobM   =   $this->MODEL('job');
            
            $post   =   array(
                
                'uid'           =>  $uid,
                'state'         =>  $status,
                'statusbody'    =>  $statusbody
            );
            
            $return     =   $jobM -> status($id, $post);
            
            if (isset($_POST['single'])){
                if ($return['errcode'] == 9){
                    if($_POST['atype'] == 1){
                        // 仅保存
                        $this->layer_msg($return['msg'],9);
                    }else{
                        // 下一个待审核职位
                        $jobM  =  $this->MODEL('job');
                        $row   =  $jobM->getInfo(array('state'=>0,'orderby'=>array('lastupdate,DESC')), array('field'=>'id'));
                        if (!empty($row)){
                            $this->layer_msg($return['msg'],9,0,'index.php?m=admin_company_job&c=jobAudit&id='.$row['id']);
                        }else{
                            $this->layer_msg($return['msg'],9);
                        }
                    }
                }else{
                    $this->layer_msg($return['msg'],8);
                }
            }else{
                $this -> ACT_layer_msg($return['msg'],$return['errcode'],$_SERVER['HTTP_REFERER'],2,1);
            }
        }
    }
    
    //  修改浏览量/曝光量
    function upjobhits_action()
    {
        $jobM   =   $this->MODEL('job');
        $return =   $jobM->upJobHits($_POST['pid'], $_POST['jobhits'], $_POST['jobexpoure']);
        $this->ACT_layer_msg($return['msg'], $return['errcode'], "index.php?m=admin_company_job", 2, 1);
    }

    /**
     * @desc 后台 -- 会员 -- 企业 -- 企业管理 / 职位管理 -- 新增  /  修改
     */
	function show_action()
    {

        $cacheM     =   $this->MODEL('cache');
        $options    =   array('job', 'com', 'city', 'hy', 'user');
        $cache      =   $cacheM->GetCache($options);

        foreach ($cache['com_sex'] as $k=> $v){
            if ($v != '男') {
                $cache['com_sexreq'][$k] = $v;
            }
        }
        $this->yunset('cache', $cache);

        $JobM       =   $this->MODEL('job');

        $companyM   =   $this->MODEL('company');
        $addressM   =   $this->MODEL('address');

        if (isset($_GET['id']) && intval($_GET['id']) > 0) {

            $id     =   intval($_GET['id']);
            $info   =   $JobM->getInfo(array('id' => $id), array('lang' => 'isarray'));

            $this->yunset('show', $info);
            $this->yunset('lasturl', $_SERVER['HTTP_REFERER']);
            $uid    =   $info['uid'];
        }
        if (intval($_GET['uid'])) {

            $uid    =   intval($_GET['uid']);
        }

        $company    =   $companyM->getInfo($uid, array('field' => '`uid`,`r_status`,`linkman`,`linktel`,`linkphone`,`address`,`provinceid`,`cityid`,`three_cityid`,`x`,`y`'));

        $cityStr    =   $company['job_city_one'].$company['job_city_two'].$company['job_city_three'];

        if ($company['linktel']){

            $company['linkmsg'] =   $company['linkman'].' - '.$company['linktel'].' - '.$cityStr.' - '.$company['address'];
        }else if ($company['linkphone']){

            $company['linkmsg'] =   $company['linkman'].' - '.$company['linkphone'].' - '.$cityStr.' - '.$company['address'];
        }else{

            $company['linkmsg'] =   $company['linkman'].' - '.$cityStr.' - '.$company['address'];
        }
        $addressList=   $addressM->getAddressList(array('uid' => $uid));

        $this->yunset(array('company' => $company, 'addressList' => $addressList, 'uid' => $uid));


        if($_POST['update']){

		    $description	=	str_replace(array("&amp;","background-color:#ffffff","background-color:#fff","white-space:nowrap;"),array("&",'background-color:','background-color:','white-space:'),$_POST['content']);

		    if ($_POST['link_id'] == -1){

		        $provinceid     =   $company['provinceid'];
                $cityid         =   $company['cityid'];
                $three_cityid   =   $company['three_cityid'];

                $x              =   $company['x'];
                $y              =   $company['y'];

            }else if(intval($_POST['link_id']) > 0){

		        $addressInfo    =   $addressM->getAddressInfo(array('id' => $_POST['link_id'], 'uid' => $uid));

                $provinceid     =   $addressInfo['provinceid'];
                $cityid         =   $addressInfo['cityid'];
                $three_cityid   =   $addressInfo['three_cityid'];

                $x              =   $addressInfo['x'];
                $y              =   $addressInfo['y'];
            }

			$post	        =	array(
				'name'			=>	$_POST['name'],

				'job1'          =>  intval($_POST['job1']),
                'job1_son'      =>  intval($_POST['job1_son']),
                'job_post'      =>  intval($_POST['job_post']),

				'provinceid'    =>  intval($provinceid),
                'cityid'        =>  intval($cityid),
				'three_cityid'  =>  intval($three_cityid),

				'x'             =>  $x,
				'y'             =>  $y,

				'link_id'       =>  $_POST['link_id'],
                'is_link'       =>  intval($_POST['link_id']) > 0 ? 2 : 1,

				'minsalary'     =>  intval($_POST['salary_type']) == 1 ? 0 : intval($_POST['minsalary']),
				'maxsalary'     =>  intval($_POST['salary_type']) == 1 ? 0 : intval($_POST['maxsalary']),

				'description'	=>	$description,
				'r_status'      =>	$company['r_status'],
				'hy'            =>  intval($_POST['hy']),
				'number'        =>  intval($_POST['number']),
                'exp'           =>  intval($_POST['exp']),
                'report'        =>  intval($_POST['report']),
                'age'           =>  intval($_POST['age']),
                'sex'           =>  intval($_POST['sex']),
                'edu'           =>  intval($_POST['edu']),
                'is_graduate'   =>  intval($_POST['is_graduate']),
                'marriage'      =>  intval($_POST['marriage']),
				'lang'          =>  trim(pylode(',', $_POST['lang'])),
				'state'      	=> 	$company['r_status']==1 ? 1:0,
                'jobhits'       =>  intval($_POST['jobhits']),
                'jobexpoure'    =>  intval($_POST['jobexpoure']),

                'exp_req'       =>  trim($_POST['exp_req']),
                'edu_req'       =>  trim($_POST['edu_req']),

                'zp_num'        =>  intval($_POST['zp_num']),
                'zp_minage'     =>  intval($_POST['zp_minage']),
                'zp_maxage'     =>  intval($_POST['zp_maxage']),
                'minage_req'     =>  intval($_POST['minage_req']),
                'maxage_req'     =>  intval($_POST['maxage_req']),
                'sex_req'     =>  intval($_POST['sex_req']),
			);

			$data	        =	array(
				'post'			=>	$post,
				'id'			=>	intval($_POST['id']),
				'uid'			=>	$_POST['uid'],
				'utype'			=>	'admin'
			);

			$return	        =	$JobM->addJobInfo($data);

            if ($return['errcode'] == 9) {

                $this->ACT_layer_msg($return['msg'], $return['errcode'], 'index.php?m=admin_company_job');
            } else {

                $this->ACT_layer_msg($return['msg'], $return['errcode']);
            }
		}
		$this->yuntpl(array('admin/admin_company_job_show'));

	}

	// 转移类别
    function saveclass_action(){

        $JobM   =   $this -> MODEL('job');

		if($_POST['hy']   ==  ''){
			$this -> ACT_layer_msg('请选择行业类别！',8,$_SERVER['HTTP_REFERER']);
		}

		if($_POST['job1'] ==  ''){
			$this -> ACT_layer_msg('请选择职位类别！',8,$_SERVER['HTTP_REFERER']);
		}

		$data['hy']       =   $_POST['hy'];
		$data['job1']     =   $_POST['job1'];
		$data['job1_son'] =   $_POST['job1_son'];
		$data['job_post'] =   $_POST['job_post'];

		$id               =   @explode(',',$_POST['jobid']);

		$listA            =   $JobM -> getList(array('id' => array('in', pylode(',',$id))), array('cache'=>'1','field'=>'id,uid,name'));

		$nid              =   $JobM -> upInfo($data, array('id' => array('in', pylode(',',$id))));

		$job              =   $listA['list'];

		$cache            =   $listA['cache'];

		if($job){

		    $msg          =   array();
		    $uids         =   array();

		    //  提取职位uid 和职位名称
		    foreach ($job   as  $k => $v){

                $uids[] =  $v['uid'];

                $msg[$v['uid']][]  =  '您的职位<a href="comjobtpl,'.$v['id'].'">《'.$v['name'].'》</a>管理员已修改，行业类别为：'.$cache[industry_name][$_POST['hy']].'，职位类别为：'.$cache[job_name][$_POST['job1']];

                if($_POST['job1_son']){
                    $msg[$v['uid']][]  .= ''.$cache[job_name][$_POST['job1_son']];
                }
                if($_POST['job_post']){
                    $msg[$v['uid']][]  .= ''.$cache[job_name][$_POST['job_post']];
                }
		    }

		    $sysmsgM    =   $this -> MODEL('sysmsg');

		    $sysmsgM    ->  addInfo(array('uid'=>$uids,'usertype'=>2, 'content'=>$msg));

		}


		$nid?$this->ACT_layer_msg('职位类别(ID:'.$_POST['jobid'].')修改成功！',9,$_SERVER['HTTP_REFERER'],2,1):$this->ACT_layer_msg('修改失败！',8,$_SERVER['HTTP_REFERER']);
	}

	// 删除职位
	function del_action(){

		$this->check_token();

		$JobM	=	$this -> Model('job');

		$delID	=	is_array($_GET['del']) ? $_GET['del'] : $_GET['id'];

		if (is_array($_GET['del'])) {

			$layer_type = 1; // 提示方式
		} else if ($_GET['del']) {

			$layer_type = 0; // 提示方式
		}

		$numwhere['jobid'] = array('in',pylode(',', $delID));

    	$addArr  =  $JobM -> delJob($delID, array('utype'=>'admin'));
		$this->layer_msg( $addArr['msg'],$addArr['errcode'],$addArr['layertype'],$_SERVER['HTTP_REFERER'],2,1);        
 	}

    function refresh_action()
    {

        $JobM   =   $this->MODEL('job');

        $ids    =   @explode(',', $_POST['ids']);

        $result =   $JobM->upInfo(array('lastupdate' => time()), array('id' => array('in', pylode(',', $ids))));

        if ($result){

            $logM   =   $this->MODEL('log');
            $jobS   =   $logM->getJobBySxLog(array('id' => array('in', pylode(',', $ids))), array('type' => 1, 'field' => 'id,uid'));

            $vData  =   array();

            foreach ($jobS as $k => $v) {

                $vData[$k]['uid']       =   $v['uid'];
                $vData[$k]['usertype']  =   2;
                $vData[$k]['jobid']     =   $v['id'];
                $vData[$k]['type']      =   1;
                $vData[$k]['r_time']    =   time();
                $vData[$k]['port']      =   5;
                $vData[$k]['ip']        =   fun_ip_get();
            }
            $logM->addJobSxLogS($vData);
        }

        $this->MODEL('log')->addAdminLog("职位(ID" . $_POST['ids'] . "刷新成功");
    }

	/* 职位匹配简历 */
	function matching_action(){

        $cacheM		=	$this -> MODEL('cache');
        $CacheList	=	$cacheM -> GetCache(array('user', 'job', 'city'));

        $setArr	    =	array(
            'userdata'		=>	$CacheList['userdata'],
            'userclass_name'=>	$CacheList['userclass_name'],
            'job_name'		=>	$CacheList['job_name'],
            'city_name'		=>	$CacheList['city_name']
        );
        $this -> yunset($setArr);

		if($_GET['id']){

            $id     =   intval($_GET['id']);
            $where = '1';
            $where .= ' and state=1';
            $where .= ' and status=1';
            $where .= ' and r_status=1';
            $where .= ' and defaults=1';
            $ResumeM   =   $this -> MODEL('resume');
            $JobM       =   $this->MODEL('job');
            $jobinfo    =   $JobM->getInfo(array('id' => $id), array('field'=>'id,uid,job1,job1_son,job_post,provinceid,cityid,three_cityid'));
			$this->yunset('comid', $jobinfo['uid']);

			if($jobinfo){
                if($_GET['keyword']){
                    $keyword = trim($_GET['keyword']);
                    $workWhere  =   array(
                        'name'      =>  array('like', $keyword),
                        'title'     =>  array('like', $keyword, 'OR'),
                    );
                    $work       =   $ResumeM->getResumeWorks($workWhere, 'eid');
                    if ($work) {
                        $eids = array();
                        foreach ($work as $v) {
                            $eids[] = $v['eid'];
                        }
                    }
                    $eduWhere   =   array(
                        'name'      =>  array('like', $keyword),
                        'specialty' =>  array('like', $keyword, 'OR')
                    );

                    $edu        =   $ResumeM->getResumeEdus($eduWhere, 'eid');

                    if ($edu) {

                        $eids = array();
                        foreach ($edu as $v) {

                            $eids[] = $v['eid'];
                        }
                    }
                    $UserinfoM	=	$this -> MODEL('userinfo');
                    $mwhere['description']     =   array('like', $keyword);
                    if(!empty($mwhere)){
                        $uidList	=	$UserinfoM  ->  getUserInfoList($mwhere, array('usertype'=>1,'field' => '`uid`'));
                        if(!empty($uidList)){
                            foreach($uidList as $uv){
                                $mUids[]	=	$uv['uid'];
                            }
                        }
                    }
                    $where .= " and (a.name like '%$keyword%'";
                    if (!empty($mUids)){
                        $where .= " or a.uid in (".pylode(',', $mUids).")";
                    }
                    if (!empty($eids)){
                        $where .= " or a.id in (".pylode(',', $eids).")";
                    }
                    $where .= ")";
                    $urlarr['keyword'] = $keyword;
                }
                //学历要求
                if ($_GET['edu']) {

                    $eduKey = $this->obj->select_once('userclass', array('variable' => 'user_edu'), "`id`");
                    $eduReq = $this->obj->select_once('userclass', array('id' => $_GET['edu']), "`sort`,`name`");
                    if ($eduReq['name'] != "不限") {

                        $eduArr = $this->obj->select_all('userclass', array('keyid' => $eduKey['id'], 'sort' => array('>=', $eduReq['sort'])), "`id`");
                        $eduIds = array();
                        foreach ($eduArr as $v) {
                            $eduIds[] = $v['id'];
                        }

                        $where .= " and a.edu in (".pylode(',', $eduIds).") ";
                    }

                    $urlarr['edu'] = intval($_GET['edu']);
                }
                //工作经验
                if ($_GET['exp']) {

                    $expKey = $this->obj->select_once('userclass', array('variable' => 'user_word'), "`id`");
                    $expReq = $this->obj->select_once('userclass', array('id' => $_GET['exp']), "`sort`,`name`");
                    if (isset($expReq) && $expReq['name'] != "不限") {

                        $expArr = $this->obj->select_all('userclass', array('keyid' => $expKey['id'], 'sort' => array('>=', $expReq['sort'])), "`id`");
                        $expIds = array();
                        foreach ($expArr as $v) {
                            $expIds[] = $v['id'];
                        }

                        $where .= " and a.exp in (".pylode(',', $expIds).") ";
                    }

                    $urlarr['exp'] = intval($_GET['exp']);
                }
                if($_GET['city_class']){
                    $cityclass = explode(',',$_GET['city_class']);
                    $this->yunset('cityArr',$cityclass);
                }
                if ($_GET['job_class']){
                    $jobclass = explode(',',$_GET['job_class']);
                    $this->yunset('jobArr',$jobclass);
                }


                if($_GET['label']){
                    $where .= ' and a.label='.intval($_GET['label']);
                    $urlarr['label'] = intval($_GET['label']);
                }
                if($_GET['content']){
                    $where .= " and a.content like '%".trim($_GET['content'])."%'";
                    $urlarr['content'] = $_GET['content'];
                }

                if($jobinfo['job_post']){
                    $jobstrid = $jobinfo['job_post'];
                }elseif($jobinfo['job1_son']){
                    $jobstrid = $jobinfo['job1_son'];
                }elseif ($jobinfo['job1']){
                    $jobstrid = $jobinfo['job1'];
                }

                if($jobinfo['three_cityid']){
                    $citystrid = $jobinfo['three_cityid'];
                }elseif($jobinfo['cityid']){
                    $citystrid = $jobinfo['cityid'];
                }elseif ($jobinfo['provinceid']){
                    $citystrid = $jobinfo['provinceid'];
                }

                $this->yunset('citystrid',$citystrid);
                $this->yunset('jobstrid',$jobstrid);
                $this->yunset('edu',$jobinfo['edu']);

                if(isset($_GET['one'])){
                    header("location:index.php?m=admin_company_job&c=matching&id=".$jobinfo['id']."&city_class=".$citystrid."&job_class=".$jobstrid."&edu=".$jobinfo['edu']);
                }

	        }


	        $record    =   $ResumeM -> getResTsList(array('jobid'=>$id),array('field'=>'`eid`'));
	        if(!empty($record)){
    			foreach($record as $v){

    				$eids[]     =   $v['eid'];
    			}
                $where .= " and a.id not in (".pylode(',', $eids).") ";
	        }

	        $noUids     =   array();

	        $blackM		=	$this->MODEL('black');
            $black      =   $blackM->getBlackList(array('p_uid' => $jobinfo['uid']));
            if(!empty($black)){
    			foreach($black as $v){

    			    $buids[]    =   $v['c_uid'];
    			}
    			if(!empty($buids)){
    			    $noUids =   $buids;
                }
            }

            $applyList          =   $JobM->getSqJobList(array('job_id' => $jobinfo['id']),array('field' => '`uid`', 'utype' => 'simple'));
            if (!empty($applyList)){
                $sqUids         =   array();
                foreach ($applyList as $v) {
                    $sqUids[]   =   $v['uid'];
                }
                if(!empty($sqUids)){
                    $noUids =   !empty($noUids) ? array_merge($noUids, $sqUids) : $sqUids;
                }
            }
            $yqList             =   $JobM->getYqmsList(array('fid' => $jobinfo['uid']),array('field' => '`uid`', 'utype' => 'simple'));
            if (!empty($yqList)){
                $yqUids         =   array();
                foreach ($yqList as $v) {
                    $yqUids[]   =   $v['uid'];
                }
                if(!empty($yqUids)){
                    $noUids =   !empty($noUids) ? array_merge($noUids, $yqUids) : $yqUids;
                }
            }
            if (!empty($noUids)){
                $where .= " and a.uid not in (".pylode(',', $noUids).") ";
            }
            include(PLUS_PATH . 'city.cache.php');
            include(PLUS_PATH . 'cityparent.cache.php');
            include(PLUS_PATH . 'job.cache.php');
            include(PLUS_PATH . 'jobparent.cache.php');
            $city_job_class = '';
            if ($_GET['job_class'] || $_GET['city_class']) {
                $city_col = $job_col = '';
                $cjwhere = '';
                if ($_GET['job_class']) {
                    if ($job_parent[$_GET['job_class']] == '0') {
                        $job_col = "job1";
                        $cjwhere .= "$job_col = {$_GET['job_class']}";
                    } elseif (in_array($job_parent[$_GET['job_class']], $job_index)) {
                        $job_col = "job1_son";
                        $cjwhere .= "$job_col = {$_GET['job_class']}";
                    } elseif ($job_parent[$_GET['job_class']] > 0) {
                        $job_col = "job_post";
                        $cjwhere .= "$job_col = {$_GET['job_class']}";
                    }
                    $urlarr['job_class'] = $_GET['job_class'];
                }
                if ($_GET['city_class']) {
                    $cjand = $cjwhere ? ' AND ' : '';
                    if ($city_parent[$_GET['city_class']] == '0') {
                        $city_col = "provinceid";
                        $cjwhere .= "{$cjand}$city_col = {$_GET['city_class']}";
                    } elseif (in_array($city_parent[$_GET['city_class']], $city_index)) {
                        $city_col = "cityid";
                        $cjwhere .= "{$cjand}$city_col = {$_GET['city_class']}";
                    } elseif ($city_parent[$_GET['city_class']] > 0) {
                        $city_col = "three_cityid";
                        $cjwhere .= "{$cjand}$city_col = {$_GET['city_class']}";
                    }
                    $urlarr['city_class'] = $_GET['city_class'];
                }
                // 拼接唯一标识字段
                if ($city_col || $job_col) {
                    if ($city_col && $job_col) {
                        $cjwhere .= " AND {$city_col}_{$job_col}_num = 1";
                    } elseif ($city_col) {
                        $cjwhere .= " AND {$city_col}_num = 1";
                    } elseif ($job_col) {
                        $cjwhere .= " AND {$job_col}_num = 1";
                    }
                }
                $city_job_class = ",(select `eid` from `".$this->def."resume_city_job_class` where $cjwhere) cj";
                $where .= " and a.id = cj.eid";
            }
            $countSql = "select count(*) as num from `".$this->def."resume_expect` a{$city_job_class} where {$where}";

            //分页链接
            $urlarr        	=   $_GET;
            $urlarr['page'] = '{{page}}';
            $pageurl = Url('admin_company_job&c=matching&id='.$id.'', $urlarr, 'admin');
            //提取分页
            $pageM = $this->MODEL('page');
            $pages = $pageM->pageList('resume_expect', $where, $pageurl, $_GET['page'], '', $countSql);
            $order = '';
            //分页数大于0的情况下 执行列表查询
            if ($pages['total'] > 0) {
                //limit order 只有在列表查询时才需要
                if ($_GET['order']) {

                    if ($_GET['t'] == 'time') {

                        $order .= "order by a.lastupdate ". $_GET['order'];
                    } else {

                        $order .= 'order by a.' . $_GET['t'] . ' ' . $_GET['order'];
                    }

                    $urlarr['order'] = $_GET['order'];
                    $urlarr['t'] = $_GET['t'];
                } else {
                    $order .= 'order by a.lastupdate desc';
                }
                $sql        =   "select a.* from `".$this->def."resume_expect` a{$city_job_class} where {$where} {$order} limit {$pages['limit'][0]},{$pages['limit'][1]}";

                $List       =   $ResumeM->getList(array(), array('cache' => 1, 'utype' => 'admin', 'sql' => $sql));
                $this -> yunset(array('resumes'=>$List['list']));
            }
	        $this->yuntpl(array('admin/admin_matching'));
	    }
	}

	function jobNum_action(){
		$MsgNum=$this->MODEL('msgNum');
		echo $MsgNum->jobNum();
	}

    /**
     * @desc 企业微海报
     */
    function whb_action()
    {

        $id         =   intval($_GET['id']);
        $this->yunset('job_id', $id);

        $WhbM       =   $this->MODEL('whb');

        $imgList    =   $WhbM->getWhbList(array('type' => 1,'isopen' => '1', 'orderby' => 'sort,desc'));

        $this->yunset('imgList', $imgList);

        $this->yuntpl(array('wap/hb_job/admin_whb'));
    }

    function getJobHtml_action(){

        if ($_POST['id']){

            $wxpubtempM =   $this->MODEL('wxpubtemp');

            $html = $wxpubtempM->getOneJob($_POST['id'],'admin');

            echo $html;

        }
    }

    function addTuiWenTask_action(){

        if($_POST['twtask_jobid']){

            $jobids       =   @explode(',', $_POST['twtask_jobid']);

            $jobM =     $this->MODEL('job');

            $joblist = $jobM->getList(array('id'=>array('in',pylode(',', $jobids))),array('field'=>'`id`,`uid`,`name`,`com_name`,`sdate`'));

            $wxpubtempM =   $this->MODEL('wxpubtemp');

            $twtasks = $wxpubtempM->getTwTaskList(array('jobid'=>array('in',pylode(',', $jobids)),'type' => 1,'orderby'=>'ctime,desc'),array('field'=>'`id`,`jobid`,`urgent`,`wcmoments`,`gzh`,`status`'));

            $taskjobs = array();
            $bqjobs = array();
            foreach ($twtasks as $key => $value) {
                if(!in_array($value['jobid'],$taskjobs)){
                    $taskjobs[$value['jobid']] = $value['id'];
                }
            }
            foreach ($twtasks as $tk=>$tv){
                if ($tv['urgent'] == 0 && $tv['wcmoments'] == 0 && $tv['gzh'] == 0 && $tv['status']==0) {
                    //已存在空白标签
                    $bqjobs[$tv['jobid']]['kbq'] = 1;
                } else {
                    if ($tv['urgent'] !=0 && $tv['status']==0){
                        $bqjobs[$tv['jobid']]['jj'] = 1;
                    }
                    if ($tv['wcmoments'] !=0 && $tv['status']==0){
                        $bqjobs[$tv['jobid']]['pyq'] = 1;
                    }
                    if ($tv['gzh'] !=0 && $tv['status']==0){
                        $bqjobs[$tv['jobid']]['gzh'] = 1;
                    }
                }
            }
            $bq = '';
            if ($_POST['twtask_urgent']==0 && $_POST['twtask_wcmoments']==0 && $_POST['twtask_gzh']==0){
                //添加空白标签
                $bq = 'kbq';
            }else{
                if ($_POST['twtask_urgent']!=0){
                    $bq = 'jj';
                }
                if ($_POST['twtask_wcmoments'] !=0){
                    if ($bq !=''){
                        $bq .=',pyq';
                    }else{
                        $bq = 'pyq';
                    }
                }
                if($_POST['twtask_gzh'] !=0){
                    if ($bq !=''){
                        $bq .=',gzh';
                    }else{
                        $bq = 'gzh';
                    }
                }
            }
            $cztj =  @explode(',', $bq);
            foreach ($joblist['list'] as $k => $v) {
                $data = array(
                    'jobid'     =>  $v['id'],
                    'cuid'      =>  $v['uid'],
                    'jobname'   =>  $v['name'],
                    'comname'   =>  $v['com_name'],
                    'jobsdate'  =>  $v['sdate'],
                    'auid'      =>  $_SESSION['auid'],
                    'content'   =>  trim($_POST['twtask_content']),
                    'urgent'    =>  $_POST['twtask_urgent'],
                    'wcmoments' =>  $_POST['twtask_wcmoments'],
                    'gzh'       =>  $_POST['twtask_gzh'],
                    'status'    =>  0,
                    'ctime'     =>  time()
                );

                //推文任务里有存在该职位的，只更新
                foreach ($cztj as $cv){
                    if ($bqjobs[$v['id']][$cv] !=1){
                        if ($cv=='jj'){
                            $data['urgent'] = 1;
                            $data['wcmoments'] = 0;
                            $data['gzh'] = 0;
                        }elseif ($cv=='kbq'){
                            $data['urgent'] = 0;
                            $data['wcmoments'] = 0;
                            $data['gzh'] = 0;
                        }elseif ($cv=='pyq'){
                            $data['urgent'] = 0;
                            $data['wcmoments'] = 1;
                            $data['gzh'] = 0;
                        }elseif ($cv == 'gzh'){
                            $data['urgent'] = 0;
                            $data['wcmoments'] = 0;
                            $data['gzh'] = 1;
                        }
                        $wxpubtempM->addTwTask($data);
                    }
                }
            }

            $res['msg'] = '推文任务添加成功';
            $res['code'] = '9';

        }else{
            $res['msg'] = '参数错误请重试';
            $res['code'] = '8';
        }
        echo json_encode($res);
    }

    // 职位单个审核，带职位详情
    function jobAudit_action(){
        
        $jobid =  intval($_GET['id']);
        $JobM  =  $this->MODEL('job');
        $Info  =  $JobM->getInfo(array('id' => $jobid));

        if ($Info['is_link'] == 2){

            $link               =   $this->obj->select_once('company_job_link', array('id' => $Info['link_id']));
            $Info['tel']        =   $link['link_moblie'];
            $Info['phone']      =   $link['link_phone'];
            $Info['address']    =   $link['link_address'];
            $Info['linkman']    =   $link['link_man'];
        }else{

            $comInfo            =   $this->obj->select_once('company', array('uid' => $Info['uid']), '`linkman`, `linktel`,`linkphone`,`linkmail`, `address`');
            $Info['tel']        =   $comInfo['linktel'];
            $Info['phone']      =   $comInfo['linkphone'];
            $Info['address']    =   $comInfo['address'];
            $Info['linkman']    =   $comInfo['linkman'];
        }

        $this->yunset('Info', $Info);
        
        $cacheM    =  $this->MODEL('cache');
        $cacheList =  $cacheM->GetCache('com');
        $this->yunset($cacheList);
        
        // 待审核数量
        $snum = $JobM->getJobNum(array('state'=>0,'id'=>array('<>', $jobid)));
        $this->yunset('snum', $snum);
        
        $this->yuntpl(array('admin/admin_company_job_audit'));
    }

    function reserveJob_action()
    {

        $JobM   =   $this->MODEL('job');

        if (isset($_GET['keyword'])) {

            $keyStr     =   trim($_GET['keyword']);
            $typeStr    =   (int)$_GET['type'];

            if ($typeStr == 1) {

                $where['com_name']  =   array('like', $keyStr);
            } elseif ($typeStr == 2) {

                $where['name']      =   array('like', $keyStr);
            }

            $urlarr['type']     =   $_GET['type'];
            $urlarr['keyword']  =   $_GET['keyword'];
        }

        $where['is_reserve']    =   1;

        if (isset($_GET['uid']) && !empty($uid)) {

            $where['uid']       =   $_GET['uid'];
        }
		$urlarr        			=   $_GET;
        $urlarr['c']            =   'reserveJob';
        $urlarr['page']         =   '{{page}}';

        $pageurl                =   Url($_GET['m'], $urlarr, 'admin');

        $pageM  =   $this->MODEL('page');
        $pages  =   $pageM->pageList('company_job', $where, $pageurl, $_GET['page']);

        if ($pages['total'] > 0) {
            if ($_GET['order']) {

                $where['orderby']   =   $_GET['t'] . ',' . $_GET['order'];
                $urlarr['order']    =   $_GET['order'];
                $urlarr['t']        =   $_GET['t'];

            } else {

                $where['orderby']   =   'lastupdate,desc';
            }

            $where['limit'] =   $pages['limit'];

            $ListJob        =   $JobM->getList($where, array('utype' => 'admin', 'isurl' => 'yes', 'reserve' => 1));
            $setArr         =   array('rows' => $ListJob['list']);
            $this->yunset($setArr);
        }
        $this->yuntpl(array('admin/admin_company_reserve_job'));
    }

    function closeReserve_action(){

        $JobM	=	$this -> Model('job');
        if ($_GET['id']){

            $this->check_token();
            $ids    =   $_GET['id'];
            $layer_type = 0; // 提示方式
        }else if($_POST['ids']){

            $ids    =   $_POST['ids'];
            $layer_type = 1; // 提示方式
        }

        $return =   $JobM -> closeReserve($ids, array('utype'=>'admin'));
        if ($return['errcode'] == 9){

            $this->MODEL('log')->addAdminLog("关闭职位（ID".$ids."）预约刷新");
        }

        $this->layer_msg( $return['msg'],$return['errcode'],$layer_type,$_SERVER['HTTP_REFERER'],2,1);
    }

    /**
     * @desc 职位匹配简历投递
     */
    function applyJob_action()
    {

        $where  =   array(

            'eid'       =>  intval($_GET['eid']),
            'uid'       =>  intval($_GET['uid']),
            'job_id'    =>  intval($_GET['id']),
            'com_id'    =>  intval($_GET['comid'])
        );

        $jobM   =   $this->MODEL('job');

        $return =   $jobM->applyJobByAdmin($where, array('auid' => $_SESSION['auid']));

        $err    =   array(
            'msg'   =>  $return['msg'],
            'type'  =>  $return['errcode']
        );

        echo json_encode($err);
        die;

    }

    function sxLog_action()
    {

        $logM   =   $this->MODEL('log');

        $where  =   array();

        $type   =   1;

        if ($_GET['type']){

            $type           =   (int)$_GET['type'];
            $where['type']  =   $_GET['type'];
            $urlarr['type'] =   $_GET['type'];
        }

        $keyStr =   trim($_GET['keyword']);
        $typeStr=   (int)$_GET['ktype'];

        if (!empty($keyStr)) {

            $jobWhere   =   array();

            if ($typeStr == 1) {

                $jobWhere['com_name']   =   array('like', $keyStr);
            } elseif ($typeStr == 2) {

               if($type=='3'){
                   $jobWhere['job_name']   =   array('like', $keyStr);
               }else{
                   $jobWhere['name']       =   array('like', $keyStr);
               }
            }

            $jobS   =   $logM->getJobBySxLog($jobWhere, array('field' => 'id', 'type' => $type));

            $jobIds =   array();

            foreach ($jobS as $jk => $jv) {
                if (!in_array($jv['id'], $jobIds)){
                    $jobIds[]   =   $jv['id'];
                }
            }

            $where['jobid']     =   array('in', pylode(',', $jobIds));

            $urlarr['type']     =   $_GET['type'];
            $urlarr['keyword']  =   $_GET['keyword'];
        }

        if (isset($_GET['uid']) && !empty($uid)) {

            $where['uid']       =   $_GET['uid'];
        }
        $urlarr        			=   $_GET;
        $urlarr['c']            =   'sxLog';
        $urlarr['page']         =   '{{page}}';

        $pageurl                =   Url($_GET['m'], $urlarr, 'admin');

        $pageM  =   $this->MODEL('page');
        $pages  =   $pageM->pageList('job_refresh_log', $where, $pageurl, $_GET['page']);

        if ($pages['total'] > 0) {
            if ($_GET['order']) {

                $where['orderby']   =   $_GET['t'] . ',' . $_GET['order'];
                $urlarr['order']    =   $_GET['order'];
                $urlarr['t']        =   $_GET['t'];

            } else {

                $where['orderby']   =   'id,desc';
            }

            $where['limit'] =   $pages['limit'];

            $List           =   $logM->getSxJobLogList($where, array('utype' => 'admin'));

            $this->yunset(array('rows' => $List));
        }
        $this->yuntpl(array('admin/admin_sx_job_log'));
    }

    function delSxLog_action()
    {

        $this->check_token();

        $LogM   =   $this -> MODEL('log');

        if($_GET['del']){

            $id =   $_GET['del'];
        }else{

            $id =   $_GET['id'];
        }

        $arr    =   $LogM -> delSxJobLog($id,array('utype'=>'admin'));

        $this->layer_msg($arr['msg'], $arr['errcode'], $arr['layertype'], $_SERVER['HTTP_REFERER']);
    }

    function saveAddress_action()
    {

        $addressM   =   $this->MODEL('address');

        $linkData   =   array(

            'uid'           =>  $_POST['uid'],
            'link_man'      =>  $_POST['link_man'],
            'link_moblie'   =>  $_POST['link_moblie'],
            'link_phone'    =>  $_POST['link_phone'],
            'email'         =>  $_POST['email'],
            'link_address'  =>  $_POST['link_address'],
            'provinceid'    =>  $_POST['provinceid'],
            'cityid'        =>  $_POST['cityid'],
            'three_cityid'  =>  $_POST['three_cityid'],
            'x'             =>  $_POST['x'],
            'y'             =>  $_POST['y']
        );

        $result         =   $addressM->saveAddress($linkData);
        $msg            =   $result ? '工作地址添加成功' : '工作地址添加失败';
        $link_id        =   $result;

        $errcode            =   $result ? 9 : 8;

        if ($result && (int)$_POST['is_link'] == 2){

            $addressList    =   $addressM->getAddressList(array('uid' => $_POST['uid']));
            $comM           =   $this->MODEL('company');
            $this->comInfo  =   $comM->getInfo($_POST['uid'], array('info' => '1', 'edit' => '1', 'logo' => '1', 'utype' => 'user'));
            $defLink        =   array(

                'link_man'      =>  $this->comInfo['linkman'],
                'link_moblie'   =>  $this->comInfo['linktel'],
                'link_phone'    =>  $this->comInfo['linkphone'],
                'email'         =>  $this->comInfo['linkmail'],
                'city'          =>  $this->comInfo['job_city_one'].$this->comInfo['job_city_two'].$this->comInfo['job_city_three'],

                'provinceid'    =>  $this->comInfo['provinceid'],
                'cityid'        =>  $this->comInfo['cityid'],
                'three_cityid'  =>  $this->comInfo['three_cityid'],
                'address'       =>  $this->comInfo['address'],
                'x'             =>  $this->comInfo['x'],
                'y'             =>  $this->comInfo['y']
            );


            echo json_encode(array('errcode' => $errcode, 'msg' => $msg, 'defLink' => $defLink, 'addressList' => $addressList, 'link_id' => $link_id));
            exit();
        }else{

            echo json_encode(array('errcode' => $errcode, 'msg' => $msg));
            exit();
        }
    }

}
?>