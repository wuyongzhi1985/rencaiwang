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
class jfdk_model extends model{

	/**
	 * @desc   引用log类，添加用户日志   
	 */
	private function addMemberLog($uid,$usertype,$content,$opera='',$type='') {

		require_once ('log.model.php');
		
		$LogM = new log_model($this->db, $this->def);
		
		return  $LogM -> addMemberLog($uid,$usertype,$content,$opera='',$type=''); 

	}
	
	/**
	 * @desc   引用statis类，获取账户套餐数据信息
	 */
	private function getStatisInfo($uid, $data = array()) {
	    require_once ('statis.model.php');
	    $StatisM = new statis_model($this->db, $this->def);
	    return  $StatisM -> getInfo($uid , $data);
	}
 
	
	/**
	 * @desc   积分支付
	 * @param  array $data
	 * @return array $return
	 */
	function dkBuy($data = array())
    {
        if ($data['uid']) {
            
            if($data['usertype']==2){
                $single_can = @explode(',', $this->config['com_single_can']);
            }

            if($data['server']!='vip' && $data['server']!='pack' && $data['server']!='autojob'){

                $serverCheck = $data['server'];
                if($data['server']=='sxpart'||$data['server']=='sxjob'){
                    $serverCheck = 'sxjob';
                }
                if($data['server']=='partrec'){
                    $serverCheck = 'jobrec';
                }
                if($serverCheck && !in_array($serverCheck,$single_can)){
                    return  array(
                        'error' => 1,
                        'msg'   => '该服务已关闭单项购买，请选择其它购买方式'
                    );
                }
            }

            if ($data['server'] == 'autojob') {
                
                $return = $this->buyAutoJob($data);
            } elseif ($data['server'] == 'jobtop') {
                
                $return = $this->buyZdJob($data);
            } elseif ($data['server'] == 'jobrec') {
                
                $return = $this->buyRecJob($data);
            } elseif ($data['server'] == 'joburgent') {
                
                $return = $this->buyUrgentJob($data);
            } elseif ($data['server'] == 'sxjob') {
                
                $return = $this->buyRefreshJob($data);
            }  elseif ($data['server'] == 'downresume') {
                
                $return = $this->downresume($data);
            } elseif ($data['server'] == 'issuejob') {
                
                $return = $this->buyIssueJob($data);
            } elseif ($data['server'] == 'invite') {
                
                $return = $this->buyInviteResume($data);
            } elseif ($data['server'] == 'pack') {
                
                $return = $this->buyPackOrder($data);
            } elseif ($data['server'] == 'vip') {
                
                $return = $this->buyVip($data);
            } elseif ($data['server'] == 'sxpart') {
                
                $return = $this->buyRefreshPart($data);
            } elseif ($data['server'] == 'partrec') {
                
                $return = $this->buyRecPart($data);
            } elseif ($data['server'] == 'zph') {
                
                $return = $this->buyZph($data);
                
            }
            if ($return['status'] == 1) {
                
                $status = 1;
                // 订单生成成功
                $return = array(
                    'error' => 0,
                    'msg'   => $return['msg']
                );
            } else {
                
                $status = 2;
                // 生成失败 返回具体原因
                $return = array(
                    'error' => 1,
                    'msg'   => $return['error'],
                    'url'   => $return['url']
                );
            }
        }else{
            $return = array(
                'error' => 1,
                'msg'   => '请先登录'
            );
        }
        return $return;
    }

    // 积分抵扣，自动刷新
    function buyAutoJob($data)
    {
        $uid        =   intval($data['uid']);
        $usertype   =   intval($data['usertype']);
        $username   =   trim($data['username']);
        
        $return     =   array();

        if ($this->config['com_integral_online'] != 2) {

            if ($data['jobautoids'] && ($data['days'] || $data['xdays'])) {

                $jobautoids =   pylode(',', @explode(',', $data['jobautoids']));

                // 判断自动刷新天数
                $autodays   =   intval($data['days']) > 0 ? intval($data['days']) : (intval($data['xdays']) > 1 ? intval($data['xdays']) : 1);
 
                if ($autodays > 0 && $jobautoids) {

                    // 判断职位ID真实性
                    $jobs   =   $this->select_all('company_job', array('uid' => $uid, 'id' => array( 'in', $jobautoids)), '`autotime`,`id`');

                    if (empty($jobs)) {

                        $return['error'] = '请选择正确的刷新职位！';
                    } else {

                        $jobnum     =   $this->select_num('company_job', array('uid' => $uid, 'id' => array('in', $jobautoids)));   // 计算自动刷新职位数量

                        
                        $price      =   $autodays * $jobnum * $this->config['job_auto'];
                        
                                                
                        $needJf      =   $price * $this->config['integral_proportion'];
                        
                        if($needJf > intval($needJf)){
                            $dkjf    =   intval($needJf) + 1;
                        }else{
                            $dkjf   =  intval($needJf);
                        }

                        $statis     =   $this -> getStatisInfo($uid,array('usertype' => $usertype, 'field'=>'`integral`'));

                        if ($statis['integral'] >= $dkjf) {

                            // 积分抵扣，直接完成自动刷新购买
                            $autoJob=   $this->select_all('company_job', array('uid' => $uid, 'id' => array('in', $jobautoids)), '`autotime`,`id`');

                            if (! empty($autoJob)) {

                                foreach ($autoJob as $v) {

                                    if ($v['autotime'] >= time()) {

                                        $autotime = $v['autotime'] + $autodays * 86400;
                                    } else {

                                        $autotime = time() + $autodays * 86400;
                                    }

                                    $status =   $this->update_once('company_job', array('autotime' => $autotime), array('uid' => $uid, 'id' => $v['id']));
                                }

                                if ($status) {
                                    require_once ('integral.model.php');

                                    $integral   =   new integral_model($this->db, $this->def, array('uid' => $uid, 'username' => $username, 'usertype' => $usertype));

                                    $integral->company_invtal($uid, $usertype, $dkjf, false, $this->config['integral_pricename'] . '抵扣购买自动刷新职位', true, 2, 'integral', 12);

                                   	$return['status'] = '1';

                                    $return['msg'] = '自动刷新职位购买成功';

                                    $this->addMemberLog($data['uid'], $data['usertype'], '自动刷新职位购买成功', 1, 4);
                                }
                            }
                        } else {

                            if ($this->config['com_integral_online'] == 3) {

                                $return['error'] = $this->config['integral_pricename'] . '不足，请先充值'.$this->config['integral_pricename'].'！';

                                $return['url'] = $this->config['sy_weburl'] . '/member/index.php?c=pay';
                            } else {

                                $return['error'] = $this->config['integral_pricename'] . '不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
                            }
                        }
                    }
                } else {

                    $return['error'] = '请正确选择自动刷新职位以及刷新天数！';
                }
            } else {

                $return['error'] = '参数填写错误，请重新设置！';
            }
        } else {

            $return['error'] = '系统目前只支持金额消费！';
        }
        return $return;
    }
	
	//积分抵扣，置顶职位
	function buyZdJob($data)
    {
        $uid        =   intval($data['uid']);
        $usertype   =   intval($data['usertype']);
        $username   =   trim($data['username']);

        $return     =   array();
        
        if ($this->config['com_integral_online'] != 2) {

            if ($data['zdjobid'] && ($data['days'] || $data['xdays'])) {

                $jobid  =   $data['zdjobid'];
                
                // 判断置顶天数
                $xsdays =   intval($data['days']) > 0 ? intval($data['days']) : (intval($data['xdays']) > 1 ? intval($data['xdays']) : 1);

                if ($xsdays > 0 && $jobid) {

                    // 判断职位ID真实性
                    $job    =   $this -> select_once('company_job', array('uid' => $uid, 'id' => $jobid));

                    if (empty($job)) {

                        $return['error'] = '请选择正确的职位置顶！';
                        
                    } else {
                        
                        
                        $price      =   $xsdays * $this->config['integral_job_top'];
                        
                      	$needJf      =   $price * $this->config['integral_proportion'];
                        
                        if($needJf > intval($needJf)){
                            $dkjf    =   intval($needJf) + 1;
                        }else{
                            $dkjf   =  intval($needJf);
                        }

                        $statis =   $this -> select_once('company_statis', array('uid' => $uid), '`integral`');

                        if ($statis['integral'] >= $dkjf) {

                            $xsjob  =   $this->select_once('company_job', array('id' => $jobid), 'name,xsdate');

                            if (! empty($xsjob)) {
                                
                                if ($xsjob['xsdate'] > time()) {

                                    $xsdate = $xsjob['xsdate'] + $xsdays * 86400;
                                } else {

                                    $xsdate = strtotime('+' . $xsdays . ' day');
                                }

                                $status     =   $this->update_once('company_job', array('xsdate' => $xsdate), array('uid' => $uid, 'id' => $jobid));

                                if ($status) {

                                    require_once ('integral.model.php');

                                    $integral   =   new integral_model($this->db, $this->def, array('uid' => $uid, 'username' => $username, 'usertype' => $usertype));

                                    $integral->company_invtal($uid, $usertype, $dkjf, false, $this->config['integral_pricename'] . '抵扣购买职位置顶', true, 2, 'integral', 12);
                                    $return['status']   =   '1';

                                    $return['msg']      =   '职位置顶购买成功';

                                    $this->addMemberLog($uid, $usertype, '职位置顶购买成功', 1, 4);
                                }
                            }
                        } else {

                            if ($this->config['com_integral_online'] == 3) {

                                $return['error'] = $this->config['integral_pricename'] . '不足，请先充值'.$this->config['integral_pricename'].'！';

                                $return['url'] = $this->config['sy_weburl'] . '/member/index.php?c=pay';
                            } else {

                                $return['error'] = $this->config['integral_pricename'] . '不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
                            }
                        }
                    }
                } else {

                    $return['error'] = '请正确选择职位置顶以及置顶的天数！';
                }
            } else {

                $return['error'] = '参数填写错误，请重新设置！';
            }
        } else {

            $return['error'] = '系统目前只支持金额消费！';
        }
        return $return;
    }

    // 积分抵扣，推荐职位
    function buyRecJob($data)
    {
        $uid        =   intval($data['uid']);
        $usertype   =   intval($data['usertype']);
        $username   =   trim($data['username']);
        
        $return     =   array();
        
        if ($this->config['com_integral_online'] != 2) {

            if ($data['recjobid'] && ($data['days'] || $data['xdays'])) {

                $jobid      =   $data['recjobid'];

                // 判断推荐天数
                $recdays    =   intval($data['days']) > 0 ? intval($data['days']) : (intval($data['xdays']) > 1 ? intval($data['xdays']) : 1);
                 
                if ($recdays > 0 && $jobid) {

                    // 判断职位ID真实性
                    $job    =   $this -> select_once('company_job', array('uid' => $uid, 'id' => $jobid));

                    if (empty($job)) {

                        $return['error']    =   '请选择正确的职位推荐！';
                    } else {
                        
                        
                        $price      =   $recdays * $this->config['com_recjob'];
                       
                        $needJf      =   $price * $this->config['integral_proportion'];
                        
                        if($needJf > intval($needJf)){
                            $dkjf    =   intval($needJf) + 1;
                        }else{
                            $dkjf   =  intval($needJf);
                        }
                        
                        $statis     =   $this -> getStatisInfo($uid,array('usertype' => $usertype, 'field'=>'`integral`'));

                        if ($statis['integral'] >= $dkjf) {

                            $recjob     =   $this -> select_once('company_job', array('id' => $jobid), '`name`,`rec_time`');

                            if (! empty($recjob)) {

                                if ($recjob['rec_time'] > time()) {

                                    $rec_time = $recjob['rec_time'] + $recdays * 86400;
                                } else {

                                    $rec_time = time() + $recdays * 86400;
                                }

                                $status =   $this->update_once('company_job', array('rec_time' => $rec_time, 'rec' => '1' ), array('uid' => $uid, 'id' => $jobid));

                                if ($status) {

                                    require_once ('integral.model.php');

                                    $integral   =   new integral_model($this->db, $this->def, array('uid' => $uid,  'username' => $username, 'usertype' => $usertype));

                                    $integral -> company_invtal($uid, $usertype, $dkjf, false, $this->config['integral_pricename'].'抵扣购买职位推荐', true, 2, 'integral', 12);
                                    
                                    $return['status']   =   '1';

                                    $return['msg']      =   '职位推荐购买成功';

                                    $this -> addMemberLog($uid, $usertype, '职位推荐购买成功', 1, 4);
                                }
                            }
                        } else {

                            if ($this->config['com_integral_online'] == 3) {

                                $return['error'] = $this->config['integral_pricename'].'不足，请先充值'.$this->config['integral_pricename'].'！';

                                $return['url'] = $this->config['sy_weburl'] . '/member/index.php?c=pay';
                            } else {

                                $return['error'] = $this->config['integral_pricename'].'不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
                            }
                        }
                    }
                } else {

                    $return['error'] = '请正确选择职位推荐以及推荐的时长！';
                }
            } else {

                $return['error'] = '参数填写错误，请重新设置！';
            }
        } else {

            $return['error'] = '系统目前只支持金额消费！';
        }
        return $return;
    }
    
    //积分抵扣，推荐兼职
    function buyRecPart($data)
    {
        
        $uid        =   intval($data['uid']);
        $usertype   =   intval($data['usertype']);
        $username   =   trim($data['username']);
        
        $return     =   array();
        
        if ($this->config['com_integral_online'] != 2) {
            
            if ($data['recpartid'] && ($data['days'] || $data['xdays'])) {
                
                $partid     =   $data['recpartid'];
                
                // 判断推荐天数
                $recdays    =   intval($data['days']) > 0 ? intval($data['days']) : (intval($data['xdays']) > 1 ? intval($data['xdays']) : 1);
                
                if ($recdays > 0 && $partid) {
                    
                    // 判断职位ID真实性
                    $part   =   $this->select_once('partjob', array('uid' => $data['uid'], 'id' => $partid));
                    
                    if (empty($part)) {
                        
                        $return['error'] = '请选择正确的职位推荐！';
                        
                    } else {
                        
                        
                        $price      =   $recdays * $this->config['com_recjob'];
                        
                                                
                        $needJf      =   $price * $this->config['integral_proportion'];
                        
                        if($needJf > intval($needJf)){
                            $dkjf    =   intval($needJf) + 1;
                        }else{
                            $dkjf   =  intval($needJf);
                        }
                        
                        $statis     =   $this -> getStatisInfo($uid,array('usertype' => $usertype, 'field'=>'`integral`'));
                        
                        if ($statis['integral'] >= $dkjf) {
                            
                            $recjob     =   $this->select_once('partjob', array('id' => $partid), '`name`,`rec_time`');
                            
                            if (! empty($recjob)) {
                                
                                if ($recjob['rec_time'] > time()) {
                                    
                                    $rec_time = $recjob['rec_time'] + $recdays * 86400;
                                } else {
                                    
                                    $rec_time = time() + $recdays * 86400;
                                }
                                
                                $status     =    $this->update_once('partjob', array('rec_time' => $rec_time), array('uid' => $uid, 'id' => $partid));
                                
                                if ($status) {
                                    
                                    require_once ('integral.model.php');
                                    
                                    $integral   =   new integral_model($this->db, $this->def, array('uid' => $uid, 'username' => $username, 'usertype' => $usertype));
                                    
                                    $integral->company_invtal($uid, $usertype, $dkjf, false, $this->config['integral_pricename'] . '抵扣购买兼职推荐', true, 2, 'integral', 12);
                                                                     
                                    $return['status']   =   '1';
                                    
                                    $return['msg']      =   '兼职推荐购买成功';
                                    
                                    $this->addMemberLog($uid, $data['usertype'], '兼职推荐购买成功', 9, 4);
                                }
                            }
                        } else {
                            
                            if ($this->config['com_integral_online'] == 3) {
                                
                                $return['error'] = $this->config['integral_pricename'].'不足，请先充值'.$this->config['integral_pricename'].'！';
                                
                                $return['url'] = $this->config['sy_weburl'] . '/member/index.php?c=pay';
                            } else {
                                
                                $return['error'] = $this->config['integral_pricename'].'不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
                            }
                        }
                    }
                } else {
                    
                    $return['error'] = '请正确选择职位推荐以及推荐的时长！';
                }
            } else {
                
                $return['error'] = '参数填写错误，请重新设置！';
            }
        } else {
            $return['error'] = '系统目前只支持金额消费！';
        }
        return $return;
    }
    
	//积分抵扣，紧急招聘
	function buyUrgentJob($data)
    {
	    
        $uid        =   intval($data['uid']);
        $usertype   =   intval($data['usertype']);
        $username   =   trim($data['username']);
        
        $return     =   array();
        
        if ($this->config['com_integral_online'] != 2 ) {

            if ($data['ujobid'] && ($data['days'] || $data['xdays'])) {

                $jobid  =   $data['ujobid'];

                // 判断紧急招聘天数
                $udays  =   intval($data['days']) > 0 ? intval($data['days']) : (intval($data['xdays']) > 1 ? intval($data['xdays']) : 1);
                
                if ($udays > 0 && $jobid) {

                    // 判断职位ID真实性
                    $job    =   $this -> select_once('company_job', array('uid' => $uid, 'id' => $jobid));

                    if (empty($job)) {

                        $return['error']    =   '请选择正确的职位！';
                    } else {
                        
                        $price      =   $udays * $this->config['com_urgent'];
                                                
                        $needJf      =   $price * $this->config['integral_proportion'];
                        
                        if($needJf > intval($needJf)){
                            $dkjf    =   intval($needJf) + 1;
                        }else{
                            $dkjf   =  intval($needJf);
                        }
                        
                        $statis =   $this -> getStatisInfo($uid, array('usertype' => $usertype, 'field'=>'`integral`'));

                         
                        if (intval($statis['integral']) >= $dkjf) {

                            $ujob   =   $this -> select_once('company_job', array('id' => $jobid), '`name`,`urgent_time`');

                            if (! empty($ujob)) {

                                if ($ujob['urgent_time'] > time()) {

                                    $urgent_time = $ujob['urgent_time'] + $udays * 86400;
                                } else {

                                    $urgent_time = strtotime('+' . $udays . ' day');
                                }

                                $status =   $this -> update_once('company_job', array('urgent_time' => $urgent_time, 'urgent' => '1'), array('uid' => $uid, 'id' => $jobid));

                                if ($status) {

                                    require_once ('integral.model.php');

                                    $integral   =   new integral_model($this->db, $this->def, array('uid' => $uid, 'username' => $username, 'usertype' => $usertype));

                                    $integral -> company_invtal($uid,$usertype, $dkjf, false, $this->config['integral_pricename'] . '抵扣购买紧急职位', true, 2, 'integral', 12);
                                    
                                    
                                    $return['status'] = '1';

                                    $return['msg'] = '紧急职位购买成功';

                                    $this->addMemberLog($uid, $usertype, '紧急职位购买成功', 1, 4);
                                }
                            }
                        } else {

                            if ($this->config['com_integral_online'] == 3) {

                                $return['error'] = $this->config['integral_pricename'] . '不足，请先充值'.$this->config['integral_pricename'].'！';

                                $return['url'] = $this->config['sy_weburl'] . '/member/index.php?c=pay';
                            } else {

                                $return['error'] = $this->config['integral_pricename'] . '不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
                            }
                        }
                    }
                } else {

                    $return['error'] = '请正确选择职位以及紧急招聘天数！';
                }
            } else {

                $return['error'] = '参数填写错误，请重新设置！';
            }
        } else {

            $return['error'] = '系统目前只支持金额消费！';
        }
        return $return;
    }
	
	//积分抵扣，购买会员
	function buyVip($data){
	    
	    $uid       =   intval($data['uid']);
	    $username  =   trim($data['username']);
	    $usertype  =   intval($data['usertype']);
		 
	    $return    =   array();
 
		if($this->config['com_integral_online']!=2){

			if($data['ratingid']){

				$id         =   intval($data['ratingid']);
				
				
				//判断套餐ID真实性
				$ratinginfo	=	$this -> select_once('company_rating',array('id'=>$id));
				
				$statis     =   $this -> getStatisInfo($uid,array('usertype' => $usertype));
			
				if(empty($ratinginfo)){
	
					$return['error']	=	'该会员套餐已下架，请重新选择！';

				}else {

									
					$needJf      =   $price * $this->config['integral_proportion'];
					
					if($needJf > intval($needJf)){
					    $dkjf    =   intval($needJf) + 1;
					}else{
					    $dkjf   =  intval($needJf);
					}
					
					$integral_dk  =   $dkjf;
					
					if($statis['integral'] >= $integral_dk){

						require_once('rating.model.php');

						$rating = new rating_model($this->db,$this->def,array('uid'=>$uid,'username'=>$username,'usertype'=>$usertype));

						if($usertype == 2){

							$value				=	$rating	->	ratingInfo($id, $uid);

							$return['status']	=   $this -> update_once('company_statis',$value,array('uid' => $uid));
              
							if ($return['status']) {
							    
							    $companydata     =	array(
							        'rating'	    =>	$value['rating'],
							        'rating_name'	=>	$value['rating_name'],
							        'vipetime'		=>	$value['vip_etime'],
							        'vipstime'		=>	$value['vip_stime']
							    );
							    
							    $this -> update_once('company', $companydata, array('uid' => $uid));
							}
							
							$this	->	update_once('company_job',array('rating' => $id),array('uid'=> $uid));
							
						}

						require_once('integral.model.php');

						$integral	=	new integral_model($this->db,$this->def,array('uid'=>$uid,'username'=>$username,'usertype'=>$usertype));

						$integral	->	company_invtal($uid, $usertype, $integral_dk, false, $this->config['integral_pricename'].'抵扣，购买会员', true, 2, 'integral', 27);

						
						$return['status']	=	'1';

						$return['msg']		=	'会员购买成功';

						$this	->	addMemberLog($uid,$usertype,'全额使用'.$this->config['integral_pricename'].'抵扣，'.$ratinginfo['name'].'购买成功');

					}else{

						if($this->config['com_integral_online']==3){

							$return['error']	=	$this->config['integral_pricename'].'不足，请先充值'.$this->config['integral_pricename'].'！';

							$return['url']		=	$this->config['sy_weburl'].'/member/index.php?c=pay';

						}else{

							$return['error']	=	$this->config['integral_pricename'].'不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
						}
					}
				}
			} else {

				$return['error'] = '参数填写错误，请重新设置！';
			}
		}else{

			$return['error'] = '系统目前只支持金额消费！';
		}
		return $return;
	}

	//积分抵扣，购买增值套餐

	function buyPackOrder($data){

		$uid      =   intval($data['uid']);
		$usertype =   intval($data['usertype']);
		$username =   trim($data['username']);
		
		$return   =   array();
		
		if($this->config['com_integral_online']!=2){

			if($data['tcid']){

				$tid        =	intval($data['tcid']);
				
				
				if($tid){

					//判断套餐ID真实性
                    $tb_service =   'company_service_detail';
                    
                    $service	=	$this -> select_once($tb_service , array('id' => $tid));
                    
					if(empty($service)){

						$return['error']		=	'请选择正确增值套餐！';

					}else {
                        
					    $statis	=	$this -> getStatisInfo($uid, array('usertype' => $usertype, 'field'=>'`integral`,`rating`,`vip_etime`'));
					    
					    if(!isVip($statis['vip_etime'])){

	
							$return['error'] =	'您的会员已到期，请先购买会员！';
 
						}else{

							$rating			=	$this -> select_once('company_rating',array('id'=>$statis['rating']),'service_discount');//增值服务折扣

							if($rating['service_discount']){

								$discount	=	intval($rating['service_discount']);

								$price		=	$service['service_price'] * $discount * 0.01 ;

							}else{

								$price		=	$service['service_price'];

							}	
							
							$needJf     =   $price * $this->config['integral_proportion'];

                            if ($needJf > intval($needJf)) {

                                $dkjf   =   intval($needJf) + 1;
                            } else {

                                $dkjf   =   intval($needJf);
                            }
							
							if($statis['integral'] >= $dkjf){
                                
							    if($usertype == 2){
    								
							        $value		=	array(
    								
    								    'job_num'		=>	array('+', $service['job_num']?$service['job_num']:0),
    								    'breakjob_num'	=>	array('+', $service['breakjob_num']?$service['breakjob_num']:0),
    								    'down_resume'	=>	array('+', $service['resume']?$service['resume']:0),
    								    'invite_resume'	=>	array('+', $service['interview']?$service['interview']:0),
    								    'zph_num'	    =>	array('+', $service['zph_num']?$service['zph_num']:0),
    								    'top_num'	    =>	array('+', $service['top_num']?$service['top_num']:0),
    								    'rec_num'	    =>	array('+', $service['rec_num']?$service['rec_num']:0),
    								    'urgent_num'    =>	array('+', $service['urgent_num']?$service['urgent_num']:0)
     								);
    							
							        $status	=	$this	->	update_once('company_statis',$value,array('uid' => $uid));
							        
							    }

								if($status){

									require_once('integral.model.php');

									$integral	=	new integral_model($this->db,$this->def,array('uid'=>$uid,'username'=>$username,'usertype'=>$usertype));

									$integral	->	company_invtal($uid, $usertype, $dkjf,false,$this->config['integral_pricename'].'抵扣购买增值包',true,2,'integral',12);
                                   
									
									$return['status']	=	'1';

									$return['msg']		=	'增值包购买成功';

									$this	->	addMemberLog($uid,$usertype,'增值包购买成功');
								}
								
							}else{

								if($this->config['com_integral_online']==3){

									$return['error']	=	$this->config['integral_pricename'].'不足，请先充值'.$this->config['integral_pricename'].'！';
			
									$return['url']		=	$this->config['sy_weburl'].'/member/index.php?c=pay';
	
								}else{

									$return['error']	=	$this->config['integral_pricename'].'不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
						
								}
							}
						}
					}
				}else{

					$return['error']	=	'请正确选择增值服务套餐！';
				}
			} else {
			
				$return['error']	=	'参数填写错误，请重新设置！';
			}
		}else{
		
			$return['error']	=	'系统目前只支持金额消费！';
		}
		return $return;
	}

	//积分抵扣，刷新职位

	function buyRefreshJob($data)
    {
        $uid        =   intval($data['uid']);
        $usertype   =   intval($data['usertype']);
        $username   =   trim($data['username']);
        
        $return     =   array();
        if ($this->config['com_integral_online'] != 2) {

            if ($data['sxjobid']) {
                if($data['sxjobid'] == 'all'){
                    $sxjobids    =   array();
                    $jobwhere['uid']     =   $uid;
                    $jobwhere['state']      =   1;
                    $jobwhere['r_status']   =   array('<>',2);
                    $jobwhere['status']     =   array('<>',1);
                    $sxjobs   = $this->select_all('company_job', $jobwhere, '`id`');

                    foreach($sxjobs as $sk=>$sv){

                        $sxjobids[] = $sv['id'];

                    }
                    $sxjobid = pylode(',', $sxjobids);
                    
                }else{

                    $sxjobid = pylode(',', @explode(',', $data['sxjobid']));

                }
                

                if ($sxjobid) {

                    $statis     =   $this -> getStatisInfo($uid,array('usertype' => $usertype, 'field'=>'`integral`,`breakjob_num`'));
                    
                    $breakjob_num   =   intval($statis['breakjob_num']);
                    
                    // 判断职位ID真实性
                    $jobs   = $this->select_all('company_job', array('uid' => $uid, 'id' => array('in', $sxjobid)), '`id`,`name`');
                    
                    if (empty($jobs)) {

                        $return['error'] = '请选择正确的职位刷新！';
                    } else {

                        $jobnum     =   $this->select_num('company_job', array('uid' => $uid, 'id' => array('in', $sxjobid)));

                        // 优先扣除套餐

                        if ($breakjob_num) {

                            $jobnum = $jobnum - $breakjob_num;
                        }
                        
                        $price      =   $jobnum * $this->config['integral_jobefresh'];
                        
                        $needJf      =   $price * $this->config['integral_proportion'];
                        
                        if($needJf > intval($needJf)){
                            $dkjf    =   intval($needJf) + 1;
                        }else{
                            $dkjf   =  intval($needJf);
                        }

                        if ($statis['integral'] >= $dkjf) {

                            // 积分抵扣，直接职位刷新
                            $status =   $this->update_once('company_job', array('lastupdate' => time()), array('id' => array('in', $sxjobid)));

                            $this->update_once('company', array('lastupdate' => time()), array('uid' => $uid));
                            $this->update_once('hot_job', array('lastupdate' => time()), array('uid' => $uid));

                            if ($breakjob_num) {

                                $this->update_once('company_statis', array('breakjob_num' => '0'), array('uid' => $uid));
                            }

                            if ($status) {

                                require_once ('integral.model.php');

                                $integral = new integral_model($this->db, $this->def, array('uid' => $uid, 'username' => $username, 'usertype' => $usertype));

                                $integral->company_invtal($data['uid'], $data['usertype'], $dkjf, false, $this->config['integral_pricename'] . '抵扣购买刷新职位', true, 2, 'integral', 12);
                              
								if ($jobnum == 1) {

                                    $this->addMemberLog($data['uid'], $data['usertype'], '刷新职位(ID:'.$jobs[0]['id'].')《'.$jobs[0]['name'].'》', 1, 4);
                                } else {

                                    $this->addMemberLog($data['uid'], $data['usertype'], '批量刷新职位', 1, 4);
                                }

                                $return['status'] = '1';

                                $return['msg'] = '职位刷新成功';
                            }
                        } else {

                            if ($this->config['com_integral_online'] == 3) {

                                $return['error'] = $this->config['integral_pricename'] . '不足，请先充值'.$this->config['integral_pricename'].'！';

                                $return['url'] = $this->config['sy_weburl'] . '/member/index.php?c=pay';
                            } else {

                                $return['error'] = $this->config['integral_pricename'] . '不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
                            }
                        }
                    }
                } else {

                    $return['error'] = '请先选择职位！';
                }
            } else {

                $return['error'] = '参数填写错误，请重新设置！';
            }
        } else {

            $return['error'] = '系统目前只支持金额消费！';
        }
        return $return;
    }

	// 积分抵扣，刷新兼职
	function buyRefreshPart($data)
    { 
	    
        $uid        =   intval($data['uid']);
        $usertype   =   intval($data['usertype']);
        $username   =   trim($data['username']);
 
        $return     =   array();
        if ($this->config['com_integral_online'] != 2) {

            if ($data['sxpartid']) {

                $sxpartid   =   pylode(',', @explode(',', $data['sxpartid']));

                if ($sxpartid) {

                    $statis     =   $this -> getStatisInfo($uid,array('usertype' => $usertype, 'field'=>'`integral`,`breakjob_num`'));

                    $breakjob_num   =   intval($statis['breakjob_num']);

                    // 判断职位ID真实性
                    $parts  =   $this->select_all('partjob', array('uid' => $uid,'id' => array('in', $sxpartid)), '`id`,`name`');

                    if (empty($parts)) {

                        $return['error'] = '请选择正确的职位刷新！';
                    } else {

                        $partnum = $this->select_num('partjob', array('uid' => $uid,'id' => array('in', $sxpartid)));

                        // 优先扣除套餐
                        if ($breakjob_num) {

                            $partnum = $partnum - $breakjob_num;
                        }
                        
                        $price      =   $partnum * $this->config['integral_jobefresh'];
                        
						$needJf      =   $price * $this->config['integral_proportion'];
                        
                        if($needJf > intval($needJf)){
                            $dkjf    =   intval($needJf) + 1;
                        }else{
                            $dkjf   =  intval($needJf);
                        }

                        if ($statis['integral'] >= $dkjf) {

                            // 积分抵扣，直接刷新兼职
                            $status =   $this->update_once('partjob', array('lastupdate' => time()), array('id' => array('in', $sxpartid)));
                            
                            if ($status) {
                                
                                if ($breakjob_num) {
                                    
                                    $this->update_once('company_statis', array('breakjob_num' => '0'), array('uid' => $uid));
                                }
                                $this->update_once('company', array('lastupdate' => time()), array('uid' => $uid));
                                $this->update_once('hot_job', array('lastupdate' => time()), array('uid' => $uid));
                                
                                require_once ('integral.model.php');
                                
                                $integral = new integral_model($this->db, $this->def, array('uid' => $uid, 'username' => $username, 'usertype' => $usertype));
                                
                                $integral->company_invtal($uid, $usertype, $dkjf, false, $this->config['integral_pricename'].'抵扣购买刷新兼职', true, 2, 'integral', 12);
                                                                
                                if ($partnum == 1) {
                                    
                                    $this->addMemberLog($uid, $data['usertype'], '刷新兼职《'.$parts[0]['name'].'》', 9, 4);
                                } else {
                                    
                                    $this->addMemberLog($uid, $data['usertype'], '批量刷新职位', 9, 4);
                                }
                                
                                $return['status'] = '1';
                                
                                $return['msg'] = '兼职刷新成功';
                            }
                            
                        } else {

                            if ($this->config['com_integral_online'] == 3) {

                                $return['error'] = $this->config['integral_pricename'].'不足，请先充值'.$this->config['integral_pricename'].'！';

                                $return['url'] = $this->config['sy_weburl'] . '/member/index.php?c=pay';
                            } else {

                                $return['error'] = $this->config['integral_pricename'].'不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
                            }
                        }
                    }
                } else {

                    $return['error'] = '请正确选择的职位刷新！';
                }
            } else {

                $return['error'] = '参数填写错误，请重新设置！';
            }
        } else {

            $return['error'] = '系统目前只支持金额消费！';
        }
        return $return;
    }
	
	
    
	 
    
	//积分抵扣，下载简历
	function downresume($data){
	     
        $uid	  =	  intval($data['uid']);
        $usertype =   intval($data['usertype']);
        $username =   trim($data['username']);
        $did      =   $data['did'] ? $data['did'] : $this -> config['did'];
        
        $return   =   array();
        
		require_once('integral.model.php');

		$integral 		= 		new integral_model($this->db,$this->def,array('uid'=>$uid,'username'=>$username,'usertype'=>$usertype));
		
		require_once ('resume.model.php');
		
		$resumeM		=		new resume_model($this->db, $this->def);
		
		if($this->config['com_integral_online']!=2){

			if($data['eid']){

				$eid = intval($data['eid']);

				if($eid){

				    $isDownresume   =   $this->select_once('down_resume', array('eid' => $eid, 'comid' => $uid,'usertype'=>$usertype));
				    
				    if (!empty($isDownresume)) {
				        
				        $return['msg']      =   '您已经下载过该份简历，请直接查看！';
				        $return['status']   =   '1';
				        
				        return $return;
				    }
				    
					//判断简历ID真实性
				    $user       =  $this->select_once('resume_expect',array('id'=>$eid), '`id`,`uid`,`height_status`,`name`');
                   
				    $downdata   =   array();
                    
                    $downdata['eid']        =   $user['id'];
                    $downdata['uid']        =   $user['uid'];
                    $downdata['comid']      =   $uid;
                    $downdata['usertype']   =   $usertype;
                    $downdata['did']        =   $did;
                    $downdata['type']       =   $user['height_status'];
                    $downdata['downtime']   =   time();
                    
                    if(empty($user)){
                        
                        $return['error']    =   '请选择正确的简历下载！';
                        
                    }else {
                        
                        $price      =   $resumeM -> setDayprice($eid);
                        
                        $needJf      =   $price * $this->config['integral_proportion'];
                        
                        if($needJf > intval($needJf)){
                            $dkjf    =   intval($needJf) + 1;
                        }else{
                            $dkjf   =  intval($needJf);
                        }
						
						$statis     =   $this -> getStatisInfo($uid,array('usertype' => $usertype, 'field'=>'`integral`'));

						if($statis['integral'] >= $dkjf){

							//积分抵扣，直接下载简历
							$nid = $this -> insert_into('down_resume',$downdata);

							if($nid){
	
							    $integral -> company_invtal($uid,$usertype,$dkjf,false,$this->config['integral_pricename'].'抵扣购买下载简历',true,2,'integral',12,$eid);
                                
							   	$this -> update_once('resume_expect',array('dnum'=>array('+','1')),array('id'=>$eid));

								$this	->	addMemberLog($uid,$usertype,'下载了简历：'.$user['name'],3,1);

								$return['status']   =   '1';

								$return['msg']      =   '购买简历下载成功';
							}
							
						}else{

							if($this->config['com_integral_online']==3){

								$return['error']    =   $this->config['integral_pricename'].'不足，请先充值'.$this->config['integral_pricename'].'！';

								$return['url']      =   $this->config['sy_weburl'].'/member/index.php?c=pay';
							
							}else{

								$return['error']    =   $this->config['integral_pricename'].'不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
							}
						}
					}
				}
			} else {

				$return['error'] = '参数填写错误，请重试！';
			}
		}else{

			$return['error'] = '系统目前只支持金额消费！';
		}
		return $return;
	}

	//积分抵扣，发布职位
	function buyIssueJob($data)
    {
        
        $uid        =   intval($data['uid']);
        $usertype   =   intval($data['usertype']);
        $username   =   trim($data['username']);
        
        $return     =   array();
        
        require_once ('statis.model.php');
        $StatisM    =   new statis_model($this->db, $this->def);

        require_once ('integral.model.php');
        $integral   =   new integral_model($this->db, $this->def, array('uid' => $uid, 'username' => $username, 'usertype' => $usertype));
        
        if ($this->config['com_integral_online'] != 2) {

            $price      =   $this->config['integral_job'];
            
            $needJf      =   $price * $this->config['integral_proportion'];
            
            if($needJf > intval($needJf)){
                $dkjf    =   intval($needJf) + 1;
            }else{
                $dkjf   =  intval($needJf);
            }
            
            $statis =   $this -> getStatisInfo($uid, array('usertype' => $usertype, 'field'=>'`integral`'));
            
            if ($statis['integral'] >= $dkjf) {
                
                $msg    =   '购买上架职位数';
                // 积分抵扣，会员发布职位套餐加1
                $sValue =   array('job_num' => array('+', 1));
                
                $status =   $StatisM -> upInfo($sValue, array('uid' => $uid, 'usertype' => $usertype));
                
                if ($status) {
                    
                    $integral->company_invtal($uid, $usertype, $dkjf, false, $this->config['integral_pricename'].'抵扣，'.$msg, true, 2, 'integral', 12);
                    
                   	$return['status']   =   '1';
                    
                    $return['msg']      =   $msg . '成功';
                    
                    $this->addMemberLog($uid, $usertype, $return['msg'], 1, 1);
                }
            } else {
                
                if ($this->config['com_integral_online'] == 3) {
                    
                    $return['error'] = $this->config['integral_pricename'].'不足，请先充值'.$this->config['integral_pricename'].'！';
                    
                    $return['url'] = $this->config['sy_weburl'] . '/member/index.php?c=pay';
                } else {
                    
                    $return['error'] = $this->config['integral_pricename'].'不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
                }
            }
        } else {

            $return['error'] = '系统目前只支持金额消费！';
        }
        return $return;
    }

	//积分抵扣，邀请面试
	function buyInviteResume($data)
    {
        $uid        =   intval($data['uid']);
        $usertype   =   intval($data['usertype']);
        $username   =   trim($data['username']);

        $return     =   array();

        require_once ('statis.model.php');

        $StatisM    = new statis_model($this->db, $this->def);

        require_once ('integral.model.php');

        $integral   = new integral_model($this->db, $this->def, array('uid' => $uid, 'username' => $username, 'usertype' => $usertype));

        if ($this->config['com_integral_online'] != 2) {

            if (!$data['uid']) {
                
                $return['error'] = '用户不存在，请重新登录';
            } else {
                
                $price      =   $this->config['integral_interview'];
                
				$needJf      =   $price * $this->config['integral_proportion'];
                
                if($needJf > intval($needJf)){
                    $dkjf    =   intval($needJf) + 1;
                }else{
                    $dkjf   =  intval($needJf);
                }
                
                $statis =   $this -> getStatisInfo($uid,array('usertype' => $usertype, 'field'=>'`integral`'));
                
                if ($statis['integral'] >= $dkjf) {
                    
                    $status = $StatisM -> upInfo(array('invite_resume' => array('+', 1)), array('uid' => $uid, 'usertype' => $usertype));
                    
                    if ($status) {
                        
                        $integral -> company_invtal($data['uid'], $data['usertype'], $dkjf, false, $this->config['integral_pricename'] . '抵扣购买邀请面试', true, 2, 'integral', 12);                                               
                        $return['status']   =   '1';
                        
                        $return['msg']      =   '购买面试邀请成功';
                        
                        $this->addMemberLog($data['uid'], $uid, '购买邀请面试', 4, 1);
                    }
                } else {
                    
                    if ($this->config['com_integral_online'] == 3) {
                        
                        $return['error'] = $this->config['integral_pricename'].'不足，请先充值'.$this->config['integral_pricename'].'！';
                        
                        $return['url'] = $this->config['sy_weburl'] . '/member/index.php?c=pay';
                    } else {
                        
                        $return['error'] = $this->config['integral_pricename'].'不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
                    }
                }
            }
        } else {

            $return['error'] = '系统目前只支持金额消费！';
        }
        return $return;
    }
 
    /**
     * 积分抵扣，报名招聘会
     */
	function buyZph($data = array()){
	    
	    $uid       =   intval($data['uid']);
	    $username  =   trim($data['username']);
	    $usertype  =   intval($data['usertype']);
	    
	    $return    =   array();
	    
	    require_once ('statis.model.php');
	    $StatisM   =   new statis_model($this->db, $this->def);
	    
	    require_once ('company.model.php');
	    $comM      =   new company_model($this->db, $this->def);
		
		require_once('integral.model.php');
        $integralM =   new integral_model($this->db,$this->def,array('uid'=>$uid,'username'=>$username,'usertype'=>$usertype));
		
		require_once('zph.model.php');
		$zphM      =   new zph_model($this->db,$this->def);
		
		
		if($this->config['com_integral_online']!=2){
		    
			if($data['zid'] && $data['bid']){
			    
			    $zid     =   $data['zid'] ? intval($data['zid']) : '';
			    $bid     =   $data['bid'] ? intval($data['bid']) : '';
			    
			    $com     =   $comM -> getInfo($uid, array('field' => '`name`'));
			    $zph     =   $zphM -> getInfo(array('id' => $zid));
			    
			    $zphcom  =   $zphM -> getZphComInfo(array('uid' => $uid, 'zid' => $zid));
			    
			    if ($zphcom && is_array($zphcom)) {
			        
			        if ($zphcom['status'] == 2) {
			            
			            $return['error'] = '您的报名未通过审核，请联系管理员！';
			        } else {
			            
			            $return['error'] = '您已报名该招聘会！';
			        }
 			        
			    } else if (empty($zph)) {
			        
			        $return['error']     =	'参数错误，请重新预定 ！';
			    }else{
			        
			        $space               =   $zphM -> getZphSpaceInfo(array('id' => $bid));
			        $sid                 =   $zphM -> getZphSpaceInfo(array('id' => $space['keyid']));
			        $zData               =   array();
			        
			        $zData['uid']        =   $uid;
			        $zData['com_name']   =   $com['name'];
			        $zData['zid']        =   $zid;
 			        $zData['ctime']      =   time();
			        $zData['status']     =   0;
			        $zData['sid']        =   $sid['keyid'];
			        $zData['cid']        =   $space['keyid'];
			        $zData['bid']        =   $bid;
 			        $zData['price']      =   $space['price'];
 			        // 参会职位处理
 			        if (!empty($data['jobid'])){
 			            // pc
 			            $zData['jobid']  =   $data['jobid'];
 			            
 			        }elseif (!empty($_COOKIE['zphjobid'])){
 			            // wap
 			            $zData['jobid']  =   $_COOKIE['zphjobid'];
 			        }
 			        
 			        $price      =   $space['price'] / $this->config['integral_proportion'];
 			         			        
 			        $needJf      =   $price * $this->config['integral_proportion'];
 			        
 			        if($needJf > intval($needJf)){
 			            $dkjf    =   intval($needJf) + 1;
 			        }else{
 			            $dkjf   =  intval($needJf);
 			        }
    			    
    			    $statis	             =   $StatisM -> getInfo($uid, array('usertype'=>$usertype, 'field' => '`integral`'));
    			    
    			    if($statis['integral'] >= $dkjf){
                        
    			        $status          =   $this->insert_into('zhaopinhui_com', $zData);
    			        
    			        if($status){
    			            
    			            $integralM -> company_invtal($uid, $usertype,$dkjf, false,$this->config['integral_pricename'].'抵扣预定招聘会',true,2,'integral');//积分操作记录    			               			           
    			            $this->addMemberLog($uid, $usertype,'报名招聘会,ID:'.$data['zid'].',展位：'.$bid,14,1);
    			                			             
    			            $return['status']  =   1;
    			            $return['msg']     =   '报名成功,等待管理员审核！';
    			        }
    			        
    			    }else{
    			        
    			        if($this->config['com_integral_online']==3){
    			        
    			            $return['error'] 	= 	$this->config['integral_pricename'].'不足，请先充值'.$this->config['integral_pricename'].'！';
    			            $return['url'] 		= 	$this->config['sy_weburl'].'/member/index.php?c=pay';
    			            
    			        }else{
    			            
    			            $return['error'] 	= 	$this->config['integral_pricename'].'不足，请正确输入抵扣'.$this->config['integral_pricename'].'！';
    			        }
    			    }
			    }
			}else{
				$return['error']	=	'参数异常'; 
			}
		}else{
			$return['error']	=	'系统目前只支持金额消费！';
		}
		return $return;
	}
		
}
?>