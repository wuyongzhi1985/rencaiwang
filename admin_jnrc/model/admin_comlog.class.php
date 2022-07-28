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
class admin_comlog_controller extends adminCommon{

    
    /**
     * @desc 后台职位记录 -- 职位申请记录
     */
    function index_action()
    {
        
        $JobM       =   $this -> MODEL('job');
        
        $search_list[] = array(
            "param" => "browse",
            "name" => '是否查看',
            "value" => array(
                "1" => "未查看",
                "2" => "已查看",
                "3" => "待通知",
                "4" => "不合适",
                "5" => "未接通"
            )
        );
        
        $ad_time = array(
            '1' => '今天',
            '3' => '最近三天',
            '7' => '最近七天',
            '15' => '最近半月',
            '30' => '最近一个月'
        );
        
        $search_list[] = array(
            "param" => "time",
            "name" => '申请时间',
            "value" => $ad_time
        );
        
        $this->yunset("search_list", $search_list);
        
        if (intval($_GET['comid'])) {
            
            $where['com_id']    =   intval($_GET['comid']);
            $urlarr['comid']    =   intval($_GET['comid']);
            
        }

        $typeStr    =   intval($_GET['type']);
        $keywordStr =   trim($_GET['keyword']);
        
        if (!empty($keywordStr)) {
            
            if ($typeStr == 1) {
                
                $where['job_name']      =   array('like', $keywordStr);
                
            } elseif ($typeStr == 2) {
                
                $where['com_name']      =   array('like', $keywordStr);
                
            } elseif ($typeStr == 3) {
                
                $resumeM                =   $this -> MODEL('resume');
                
                $rwhere['name']         =   array('like', $keywordStr);
                
                $rlist                  =   $resumeM -> getResumeList($rwhere, array('field'=>'`uid`'));
                
                if (is_array($rlist)) {
                    
                    foreach ($rlist as $v) {
                        
                        $muids[]        =   $v['uid'];
                    }
                }
                
                $where['uid']           =   array('in', pylode(',', $muids));
                 
            } elseif ($typeStr == 4) {
                
                $resumeM                =   $this -> MODEL('resume');
                
                $rwhere['name']         =   array('like', $keywordStr);
                
                $rlist                  =   $resumeM -> getList($rwhere, array('field'=>'`id`'));
                 
                if (is_array($rlist['list'])) {
                    
                    foreach ($rlist['list']  as  $v) {
                        
                        $eids[]         =   $v['id'];
                        
                    }
                    
                }
                
                $where['eid']           =   array('in', pylode(',', $eids));
                
            }
             
            $urlarr['type']             =   $typeStr;
            $urlarr['keyword']          =   $keywordStr;
        }
        
        if ($_GET['browse']) {
            
            $where['is_browse']         =   intval($_GET['browse']);
            
            $urlarr['browse']           =   intval($_GET['browse']);
            
        }
        
        if ($_GET['time']) {
            
            if ($_GET['time'] == '1') {
                
                $where['datetime']      =   array('>=', strtotime(date('Y-m-d 00:00:00')));
                 
            } else {
                
                $where['datetime']      =   array('>=', strtotime('-'.intval($_GET['time']).' day'));
                
            }
            
            $urlarr['time']             =   $_GET['time'];
        }

        if ($_GET['eid']){

            $where['eid']   =   $_GET['eid'];
            $urlarr['eid']  =   $_GET['eid'];
        }

        if ($_GET['uid']){

            $where['uid']   =   $_GET['uid'];
            $urlarr['uid']  =   $_GET['uid'];
        }
        
        //分页链接
		$urlarr        	=   $_GET;
        $urlarr['page']	=	'{{page}}';
        
        $pageurl		=	Url($_GET['m'],$urlarr,'admin');
        
        //提取分页
        $pageM			=	$this  -> MODEL('page');
        $pages			=	$pageM -> pageList('userid_job',$where,$pageurl,$_GET['page']);
        
        //分页数大于0的情况下 执行列表查询
        if($pages['total'] > 0){
            
            //limit order 只有在列表查询时才需要
            if($_GET['order']){
                
                $where['orderby']		=	$_GET['t'].','.$_GET['order'];
                $urlarr['order']		=	$_GET['order'];
                $urlarr['t']			=	$_GET['t'];
                
            }else{
                
                $where['orderby']		=	array('id,desc');
                
            }
            
            $where['limit']				=	$pages['limit'];
            
            $list    =   $JobM -> getSqJobList($where, array('utype' => 'admin'));
            
            $this -> yunset(array('list'=>$list));
            
        }
        
        $this->yuntpl(array('admin/admin_useridjob'));
        
    }

    /**
     * @desc  删除职位申请记录
     */
    function deluseridjob_action()
    {
        
        $this->check_token();
        
        $JobM   =   $this -> MODEL('job');
        
        if(is_array($_GET['del'])){
            
            $id =   $_GET['del'];
            
        }else{
            
            $id =   intval($_GET['del']);
            
        }
        
        $arr    =   $JobM -> delSqJob($id,array('utype'=>'admin'));
        
        $this ->  layer_msg($arr['msg'], $arr['errcode'], $arr['layertype'],$_SERVER['HTTP_REFERER']);
        
    }
    
    /**
     * @desc 后台职位记录 -- 邀请面试记录
     */
    function useridmsg_action()
    {
        
        $JobM       =   $this -> MODEL('job');
        
        $search_list[] = array(
            "param" => "browse",
            "name" => '是否查看',
            "value" => array(
                "1" => "未查看",
                "2" => "已查看",
                "3" => "已同意",
                "4" => "已拒绝"
            )
        );
        $ad_time = array(
            '1' => '今天',
            '3' => '最近三天',
            '7' => '最近七天',
            '15' => '最近半月',
            '30' => '最近一个月'
        );
        $search_list[] = array(
            "param" => "time",
            "name" => '邀请时间',
            "value" => $ad_time
        );
        $this->yunset("search_list", $search_list);
        
        if (intval($_GET['comid'])) {
            
            $where['fid']       =   intval($_GET['comid']);
            $urlarr['comid']    =   intval($_GET['comid']);
            
            $comM   =   $this -> MODEL('company');
            $ccom   =   $comM -> getInfo(intval($_GET['comid']), array('field'=>'`name`'));
            $this   ->  yunset("ccname", $ccom['name']);
        }
        
        $typeStr    =   intval($_GET['type']);
        $keywordStr =   trim($_GET['keyword']);
        
        if (!empty($keywordStr)) {
            
            if ($typeStr == 1) {
                
                $resumeM                =   $this -> MODEL('resume');
                
                $rwhere['name']         =   array('like', $keywordStr);
                
                $rlist                  =   $resumeM -> getResumeList($rwhere, array('field'=>'`uid`'));
                
                if (is_array($rlist)) {
                    
                    foreach ($rlist as $v) {
                        
                        $muids[]        =   $v['uid'];
                    }
                }
                
                $where['uid']           =   array('in', pylode(',', $muids));
                
            } elseif ($typeStr == 2) {
                
                $where['fname']         =   array('like', $keywordStr);
                
            } elseif ($typeStr == 3) {
                
                $where['title']         =   array('like', $keywordStr);
                 
            } elseif ($typeStr == 4) {
                
                $where['content']       =   array('like', $keywordStr);
                 
            }
            
            $urlarr['type']         =   $typeStr;
            $urlarr['keyword']      =   $keywordStr;
        }
        
        if ($_GET['browse']) {
            
            $where['is_browse']         =   intval($_GET['browse']);
            
            $urlarr['browse']           =   intval($_GET['browse']);
            
        }
        
        if ($_GET['time']) {
            
            if ($_GET['time'] == '1') {
                
                $where['datetime']      =   array('>=', strtotime(date('Y-m-d 00:00:00')));
                
            } else {
                
                $where['datetime']      =   array('>=', strtotime('-'.intval($_GET['time']).' day'));
                
            }
            
            $urlarr['time']             =   $_GET['time'];
        }
        
        //分页链接
		$urlarr        	=   $_GET;
        $urlarr['page']	=	'{{page}}';
        
        $urlarr['c']	=	$_GET['c'];
        
        $pageurl		=	Url($_GET['m'],$urlarr,'admin');
        
        //提取分页
        $pageM			=	$this  -> MODEL('page');
        $pages			=	$pageM -> pageList('userid_msg',$where,$pageurl,$_GET['page']);
        
        //分页数大于0的情况下 执行列表查询
        if($pages['total'] > 0){
            
            //limit order 只有在列表查询时才需要
            if($_GET['order']){
                
                $where['orderby']		=	$_GET['t'].','.$_GET['order'];
                $urlarr['order']		=	$_GET['order'];
                $urlarr['t']			=	$_GET['t'];
                
            }else{
                
                $where['orderby']		=	array('id,desc');
                
            }
            
            $where['limit']				=	$pages['limit'];
            
            $list    =   $JobM -> getYqmsList($where,array('utype'=>'admin'));
            
            $this -> yunset(array('list'=>$list));
            
        }
        $this->yuntpl(array('admin/admin_useridmsg'));
        
    }
    
    /**
     * @desc 删除邀请面试记录
     */
    function deluseridmsg_action()
    {
        
        $this->check_token();
        
        $JobM   =   $this -> MODEL('job');
        
        if(is_array($_GET['del'])){
            
            $id =   $_GET['del'];
            
        }else{
            
            $id =   intval($_GET['del']);
            
        }
        
        $arr    =   $JobM -> delYqms($id,array('utype'=>'admin'));
        
        $this ->  layer_msg($arr['msg'], $arr['errcode'], $arr['layertype'],$_SERVER['HTTP_REFERER']);
        
    }
    
    /**
     * @desc 后台职位记录 --职位浏览记录
     */
    function lookjob_action()
    {   
        
        $JobM       =   $this -> MODEL('job');
        
        $ad_time = array(
            '1' => '今天',
            '3' => '最近三天',
            '7' => '最近七天',
            '15' => '最近半月',
            '30' => '最近一个月'
        );
        $search_list[] = array(
            "param" => "time",
            "name" => '浏览时间',
            "value" => $ad_time
        );
        if (intval($_GET['comid'])) {
            
            $where['com_id']    =   intval($_GET['comid']);
            $urlarr['comid']    =   intval($_GET['comid']);
        }
        $this->yunset("search_list", $search_list);
        
        $typeStr    =   intval($_GET['type']);
        $keywordStr =   trim($_GET['keyword']);
         
        if (!empty($keywordStr)) {
            
            if ($typeStr    == 1) { 
                
                $resumeM                =   $this -> MODEL('resume');
                
                $rwhere['name']         =   array('like', $keywordStr);
                
                $rlist                  =   $resumeM -> getResumeList($rwhere, array('field'=>'`uid`'));
                
                if (is_array($rlist)) {
                    
                    foreach ($rlist as $v) {
                        
                        $muids[]        =   $v['uid'];
                    }
                }
                
                $where['uid']           =   array('in', pylode(',', $muids));
                
            } else {
                
                $JobM   =   $this -> MODEL('job');
                
                if ($typeStr    == 2) {
                    
                    $job    =   $JobM -> getList(array('name'=>array('like', $keywordStr)), array('field'=>'`id`'));
                    
                    $jobids = array();
                    
                    if (is_array($job['list'])) {
                        
                        foreach ($job['list'] as $v) {
                            
                            $jobids[] = $v['id'];
                            
                        }
                        
                    }
                    
                    $where['jobid']     =   array('in', pylode(',', $jobids));
                    
                } elseif ($typeStr == 3) {
                    
                    $job    =   $JobM -> getList(array('com_name'=>array('like', $keywordStr)), array('field'=>'`uid`'));
                
                    $cuids = array();
                    
                    if (is_array($job['list'])) {
                        
                        foreach ($job['list'] as $v) {
                            
                            $cuids[] = $v['uid'];
                            
                        }
                        
                    }
                    
                    $where['com_id']    =   array('in', pylode(',', $cuids));
                }
            }
            
            $urlarr['type']             =   $typeStr;
            $urlarr['keyword']          =   $keywordStr;
            
        }
        
        if ($_GET['time']) {
            
            if ($_GET['time'] == '1') {
                
                $where['datetime']      =   array('>=', strtotime(date('Y-m-d 00:00:00')));
                
            } else {
                
                $where['datetime']      =   array('>=', strtotime('-'.intval($_GET['time']).' day'));
                
            }
            
            $urlarr['time']             =   $_GET['time'];
        }
        
        //分页链接
		$urlarr        	=   $_GET;
        $urlarr['page']	=	'{{page}}';
        
        $urlarr['c']	=	$_GET['c'];
        
        $pageurl		=	Url($_GET['m'],$urlarr,'admin');
        
        //提取分页
        $pageM			=	$this  -> MODEL('page');
        $pages			=	$pageM -> pageList('look_job',$where,$pageurl,$_GET['page']);
        
        //分页数大于0的情况下 执行列表查询
        if($pages['total'] > 0){
            
            //limit order 只有在列表查询时才需要
            if($_GET['order']){
                
                $where['orderby']		=	$_GET['t'].','.$_GET['order'];
                $urlarr['order']		=	$_GET['order'];
                $urlarr['t']			=	$_GET['t'];
                
            }else{
                
                $where['orderby']		=	array('id,desc');
                
            }
            
            $where['limit']				=	$pages['limit'];
            
            $list    =   $JobM -> getLookJobList($where,array('utype'=>'admin'));
            
            $this -> yunset(array('list'=>$list));
            
        }
        
        $this->yuntpl(array('admin/admin_lookjob'));
        
    }
    
    /**
     * @desc 删除职位浏览记录
     */
    function dellookjob_action()
    {
        $this->check_token();
        
        $JobM   =   $this -> MODEL('job');
        
        if(is_array($_GET['del'])){
            
            $id =   $_GET['del'];
            
        }else{
            
            $id =   intval($_GET['del']);
            
        }
        
        $arr    =   $JobM -> delLookJob($id,array('utype'=>'admin'));
        
        $this ->  layer_msg($arr['msg'], $arr['errcode'], $arr['layertype'],$_SERVER['HTTP_REFERER']);
    }

    /**
     * @desc 兼职报名
     */
    function partapply_action()
    {
        
        $partM  =   $this -> MODEL('part');
        $ComM   =   $this -> MODEL('company');
        
        $search_list[]  =   array(
            'param' =>  'status',
            'name'  =>  '标记状态',
            'value' =>  array(
                '1' => '未查看',
                '2' => '已查看'
            )
        );
        
        $search_list[]  =   array(
            'param' =>  'time',
            'name'  =>  '申请时间',
            'value' =>  array(
                '1'     =>  '今天',
                '3'     =>  '最近三天',
                '7'     =>  '最近七天',
                '15'    =>  '最近半月',
                '30'    =>  '最近一个月'
            )
        );
        
        $this->yunset('search_list', $search_list);
        if ($_GET['jobid']) {
			
            $where['jobid']     =   $_GET['jobid'];
			$urlarr['jobid']	=   $_GET['jobid'];
        }
        if (intval($_GET['comid'])) {
            
            $where['comid']     =   intval($_GET['comid']);
            $urlarr['comid']    =   intval($_GET['comid']);
        }
        $typeStr                =   intval($_GET['type']);
        $keywordStr             =   trim($_GET['keyword']);
        
        if (!empty($keywordStr)) {
            
            if ($typeStr    == 1) {
                
                $resumeM                =   $this -> MODEL('resume');
                
                $rwhere['name']         =   array('like', $keywordStr);
                
                $rlist                  =   $resumeM -> getResumeList($rwhere, array('field'=>'`uid`'));
                
                if (is_array($rlist)) {
                    
                    foreach ($rlist as $v) {
                        
                        $muids[]        =   $v['uid'];
                    }
                }
                
                $where['uid']           =   array('in', pylode(',', $muids));
                
            } else {
                
                if ($typeStr    == 2) {
                    
                    $job                =   $partM -> getList(array('name' => array('like', $keywordStr)), array('field' => '`id`'));
                    
                    $jobids             =   array();
                    
                    if (is_array($job)) {
                        
                        foreach ($job as $v) {
                            
                            $jobids[]   = $v['id'];
                        }
                    }
                     
                    $where['jobid']     =   array('in', pylode(',', $jobids));
                    
                } elseif ($typeStr == 3) {
                    
                    $job                =   $partM -> getList(array('com_name' => array('like', $keywordStr)), array('field' => '`uid`'));
                    
                    $cuids = array();
                    
                    if (is_array($job)) {
                        
                        foreach ($job as $v) {
                            
                            $cuids[]    = $v['uid'];
                        }
                    }
                    
                    $where['comid']     =   array('in', pylode(',', $cuids));
                }
            }
            
            $urlarr['type']             =   $typeStr;
            $urlarr['keyword']          =   $keywordStr;
            
        }
       
        if ($_GET['status']) {
         
            $where['status']            =   intval($_GET['status']);
            $urlarr['status']           =   intval($_GET['status']);
        }
        
        if ($_GET['time']) {
            
            if ($_GET['time'] == '1') {
                
                $where['ctime']     =   array('>=', strtotime(date('Y-m-d 00:00:00')));
            } else {
                
                $where['ctime']     =   array('>=', strtotime('-'.intval($_GET['time']).'  day'));
            }
             
            $urlarr['time']         =   $_GET['time'];
        }
        //分页链接
		$urlarr        	=   $_GET;
        $urlarr['page']	=	'{{page}}';
        
        $urlarr['c']	=	$_GET['c'];
        
        $pageurl		=	Url($_GET['m'],$urlarr,'admin');
        
        //提取分页
        $pageM			=	$this  -> MODEL('page');
        $pages			=	$pageM -> pageList('part_apply',$where,$pageurl,$_GET['page']);
        
        //分页数大于0的情况下 执行列表查询
        if($pages['total'] > 0){
            
            //limit order 只有在列表查询时才需要
            if($_GET['order']){
                
                $where['orderby']		=	$_GET['t'].','.$_GET['order'];
                $urlarr['order']		=	$_GET['order'];
                $urlarr['t']			=	$_GET['t'];
            }else{
                
                $where['orderby']		=	array('id,desc');
            }
            
            $where['limit']				=	$pages['limit'];
            
            $list                       =   $partM -> getPartSqList($where);
            
            $this -> yunset(array('list' => $list));
            
        }
        $this->yuntpl(array('admin/admin_partapply'));
    }
    
    /**
     * @desc   删除兼职报名记录
     */
    function delpartapply_action(){
        
        $this->check_token();
        
        $partM  =   $this -> MODEL('part');
        
        if(is_array($_GET['del'])){
            
            $id =   $_GET['del'];
            
        }else{
            
            $id =   intval($_GET['del']);
            
        }
        
        $arr    =   $partM -> delPartApply($id);
        
        $this ->  layer_msg($arr['msg'], $arr['errcode'], $arr['layertype'],$_SERVER['HTTP_REFERER']);
        
    }
    	/**
     * 会员-职位收藏记录
     */
	function favjob_action(){

	    if($_GET['keyword']){

	        $keytype  =   intval($_GET['type']);

	        $keyword  =   trim($_GET['keyword']);

	        if ($keytype == 1){
	            //搜企业/猎头名称
	            $where['com_name']    =  array('like',$keyword);

	        }elseif ($keytype == 2){
	            //职位名称
	            $where['job_name']    =  array('like',$keyword);
	        }elseif ($keytype == 3){
	            //个人用户名
	            $userinfoM             =  $this -> MODEL('userinfo');

	            $muser                 =  $userinfoM -> getList(array('username'=>array('like',$keyword),'usertype'=>1),array('field'=>'uid'));

	            if ($muser){
	                $uids              =  array();

	                foreach($muser as $v){

	                    $uids[]        =  $v['uid'];
	                }
	                $where['uid']      =  array('in',pylode(',', $uids));
	            }


	        }elseif ($keytype == 4){
	            //个人姓名/手机号
	            $resumeM               =  $this -> MODEL('resume');
	            $res['PHPYUNBTWSTART'] =  '';
	            $res['telphone']       =  array('like',$keyword);
	            $res['name']           =  array('like',$keyword,'OR');
	            $res['PHPYUNBTWEND']   =  '';
	            $resume                =  $resumeM -> getResumeList($res,array('field'=>'uid'));

	            if ($resume){
	                $uids              =  array();

	                foreach($resume as $v){

	                    $uids[]        =  $v['uid'];
	                }
	                $where['uid']      =  array('in',pylode(',', $uids));
	            }else{
	                $where['uid']      =  '';
                }

	        }
	        $urlarr['keytype']	       =  $keytype;

	        $urlarr['keyword']	       =  $keyword;
	    }
	    if($_GET['time']){

	        $time                      =  intval($_GET['time']);

	        if($time == 1){

	            $where['datetime']	   =  array('>',strtotime('today'));

	        }else{

	            $where['datetime']	   =  array('>',strtotime('-'.$time.' day'));
	        }

	        $urlarr['time']            =  $time;
	    }
		$urlarr        	=   $_GET;
	    $urlarr['page']	=	'{{page}}';
	    $urlarr['c']	=	'favjob';
	    $pageurl		=	Url($_GET['m'],$urlarr,'admin');

	    //提取分页
	    $pageM			=	$this  -> MODEL('page');
	    $pages			=	$pageM -> pageList('fav_job',$where,$pageurl,$_GET['page']);

	    //分页数大于0的情况下 执行列表查询
	    if($pages['total'] > 0){
	        //limit order 只有在列表查询时才需要
	        if($_GET['order']){

	            $where['orderby']	    =	$_GET['t'].','.$_GET['order'];
	            $urlarr['order']		=	$_GET['order'];
	            $urlarr['t']			=	$_GET['t'];
	        }else{
	            $where['orderby']		=	'id';
	        }
	        $where['limit']				=	$pages['limit'];

	        $jobM  =  $this->MODEL('job');

	        $List   =  $jobM -> getFavJobList($where,array('datatype'=>'moreinfo'));

	        $this -> yunset(array('list'=>$List));
	    }

		$lotime    =  array('1'=>'今天','3'=>'最近三天','7'=>'最近七天','15'=>'最近半月','30'=>'最近一个月');

		$search[]  =  array('param'=>'time','name'=>'下载时间','value'=>$lotime);

		$this->yunset('search_list',$search);

		$this->yuntpl(array('admin/favjob'));
	}
	/**
	 * 会员-个人-简历记录管理:职位收藏记录（删除）
	 */
	function delfavjob_action(){

	    if ($_GET['del']){

	        $this -> check_token();

	        $id   =  intval($_GET['del']);

	    }elseif ($_POST['del']){

	        $id   =  $_POST['del'];
	    }
	    $jobM    =  $this->MODEL('job');

	    $return   =  $jobM -> delFavJob($id,array('utype'=>'admin'));

	    $this -> layer_msg($return['msg'],$return['errcode'],$return['layertype'],$_SERVER['HTTP_REFERER']);
	}
}

?>