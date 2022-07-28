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

class comtc_model extends model
{
	
    private function addMemberLog($uid, $usertype, $content, $opera = '', $type = '', $num = '')
    {
        require_once ('log.model.php');
        
        $LogM   =   new log_model($this->db, $this->def);
        
        return $LogM->addMemberLog($uid, $usertype, $content, $opera, $type, $num);
    }

    /**
     * @desc 错误日志
     * @param $uid
     * @param string $type
     * @param $content
     */
    private function addErrorLog($uid, $type = '', $content)
    {
        require_once('errlog.model.php');
        $ErrlogM    =   new errlog_model($this->db, $this->def);
        return $ErrlogM->addErrorLog($uid, $type, $content);
    }

    /**
     * @desc 职位刷新日志
     * @param array $data
     * @return void
     */
    private function addJobSxLog($data = array())
    {

        require_once('log.model.php');
        $logM   =   new log_model($this->db, $this->def);
        return $logM->addJobSxLog($data);
    }

    /**
     * @param $uid
     * @param $userType
     * @param $port
     * @param $type
     * @param array $jobIdS
     */
    private function addJobSxLogs($uid, $userType, $port, $type, $jobIdS = array())
    {

        $vData  =   array();
        foreach ($jobIdS as $k => $v) {

            $vData[$k]['uid']       =   $uid;
            $vData[$k]['usertype']  =   $userType;
            $vData[$k]['jobid']     =   $v;
            $vData[$k]['type']      =   $type;
            $vData[$k]['r_time']    =   time();
            $vData[$k]['port']      =   $port;
            $vData[$k]['ip']        =   fun_ip_get();
        }

        $this->DB_insert_multi('job_refresh_log', $vData);
    }

    /**
     * @desc    邀请面试操作
     * @param   $data
     * @return  array
     */
    function invite_resume($data)
    {

        require_once 'statis.model.php';
        $statisM    =   new statis_model($this->db, $this->def);

        require_once 'job.model.php';
        $jobM       =   new job_model($this->db, $this->def);

        require_once 'black.model.php';
        $blackM     =   new black_model($this->db, $this->def);

        $uid        =   intval($data['uid']);
        $username   =   trim($data['username']);
        $usertype   =   intval($data['usertype']);
        $ruid       =   intval($data['ruid']);  //  人才UID

        $return     =   array();

        if ($data['show_job'] || $data['jobid'] || $data['jobtype']) {

            $jobtype    =   intval($data['jobtype']);
            $show_job   =   $data['show_job'];
            $jobid      =   intval($data['jobid']);
        }

        if (empty($uid) || empty($usertype)) {

            $return['login']    =   1;
            $return['status']   =   -1;
            $return['msg']      =   '请先登录';
        } else {

            if ($usertype != 2) {

                $typename           =   array('1' => '个人账户', '2' => '企业账户');
                $return['typename'] =   $typename[$usertype];
                $return['username'] =   $username;
                $return['typeurl']  =   Url('wap', array('c' => 'ajax', 'a' => 'notuserout'));
                $return['login']    =   2;
                $return['status']   =   -1;
                $return['msg']      =   '您不是企业用户，请先登录';
            } else {

                // 查询黑名单 
                $blackInfo  =   $blackM->getBlackInfo(array('p_uid' => $uid, 'c_uid' => $ruid));

                if (!empty($blackInfo)) {

                    $return['status']   =   -1;
                    $return['msg']      =   '该用户暂不接受面试邀请！';
                    return $return;
                }

                $company=   $this->select_once('company', array('uid' => $uid), "`r_status`,`linktel`,`linkphone`,`linkman`,`address`");

                $suid   =   $uid;
                $statis =   $statisM->getInfo($suid, array('usertype' => $usertype, 'field' => '`rating`,`vip_etime`,`invite_resume`,`rating_type`,`integral`'));

                if ($company['r_status'] != 1) {

                    $return['msg']      =   '您的帐号未通过审核，请联系客服加快审核进度！';
                    $return['status']   =   -1;
                    return $return;
                } else if (isset($show_job)) {


                    $company_job    =   $this->select_all('company_job', array('uid' => $uid, 'state' => '1', 'r_status' => 1, 'status' => 0), '`name`,`id`,`is_link`,`link_id`');
                    

                    if (isset($company_job) && !empty($company_job)) {

//                        $joblink        =   $this->select_once('company_job_link', array('jobid' => $jobid, 'uid' => $uid), '`link_man`,`link_moblie`,`link_address`');

                        foreach ($company_job as $val) {

                            if ($jobid && $val['id'] == $jobid) {
                                $jobname    =   $val['name'];
                            }
							if ($jobid && $val['id'] == $jobid) {
								if ($jobtype == '2') {

									$return['linkman']  =   $company['link_man'];
									$return['linktel']  =   $company['link_moblie'];
								} else {
									if (isset($val['link_id']) && $val['link_id'] > 0) {
										$joblink = $this->select_once('company_job_link', array('id' => $val['link_id'], 'uid' => $uid), '`link_man`,`link_moblie`,`link_address`');
										$return['linkman']  =   $joblink['link_man'];
										$return['linktel']  =   $joblink['link_moblie'];
										$return['address']  =   $joblink['link_address'];
									} else {
										$return['linkman']  =   $company['linkman'];
										$return['linktel']  =   $company['linktel'] ? $company['linktel'] : $company['linkphone'];
										$return['address']  =   $company['address'];
									}
	//                                if ($val['is_link'] == '1') {
	//
	//                                    $return['linkman']  =   $company['linkman'];
	//                                    $return['linktel']  =   $company['linktel'] ? $company['linktel'] : $company['linkphone'];
	//                                    $return['address']  =   $company['address'];
	//                                } else if ($val['is_link'] == '2') {
	//
	//                                    $return['linkman']  =   $joblink['link_man'];
	//                                    $return['linktel']  =   $joblink['link_moblie'];
	//                                    $return['address']  =   $joblink['link_address'];
	//                                }
								}
							}
                        }

                        if ($return['linkman'] == "" && ($return['linktel'] == "" || $return['linkphone'] == "") && $return['address'] == "") {

                            $return['linkman']  =   $company['linkman'];
                            $return['linktel']  =   $company['linktel'] ? $company['linktel'] : $company['linkphone'];
                            $return['address']  =   $company['address'];
                        }

                        $return['jobname']      =   $jobname;
                    } else {

                        if (isVip($statis['vip_etime'])) {

                            // 发布职位条件查询
                            $msgList    =   $jobM->getAddJobNeedInfo($uid);

                            if (!empty($msgList)) {
                                $return['msgList']  =   $msgList;
                            }
                            $return['invite']   =   1;
                            $return['status']   =   1;
                            $return['msg']      =   '暂无发布中的职位！';
                        }
                    }
                }
            }
        }
        //判断后台是否开启该单项购买
        $single_can =   @explode(',', $this->config['com_single_can']);
        $serverOpen =   1;
        if (!in_array('invite', $single_can)) {
            $serverOpen =   0;
        }

        if (empty($return['status'])) {

            $return['address']  =   $return['address'] ? $return['address'] : $company['address'];

            $online             =   (int)$this->config['com_integral_online'];

            if (isVip($statis['vip_etime'])) {

                if ($this->config['integral_interview'] == 0 && $statis['invite_resume'] == 0) {

                    $statisM->upInfo(array('invite_resume' => 1), array('uid' => $suid, 'usertype' => $usertype));
                    $statis =   $statisM->getInfo($suid, array('usertype' => $usertype, 'field' => '`rating`,`vip_etime`,`invite_resume`,`rating_type`,`integral`'));
                }

                if ($statis['rating_type'] == '1') { // 套餐会员
                    if ($statis['invite_resume'] > 0) {

                        $return['status']   =   3;
                    } else {

                        if ($online != 4) {
                            if ($online == 3 && !in_array('invite', explode(',', $this->config['sy_only_price']))) { // 积分消费

                                $return['jifen']    =   $this->config['integral_interview'] * $this->config['integral_proportion'];
                                $return['integral'] =   $statis['integral'];
                                $return['pro']      =   $this->config['integral_proportion'];

                                if ($serverOpen) {

                                    $return['msg']  =   '您的会员套餐已用完，继续邀请将扣除<span style=color:red;>' . $return['jifen'].'</span>' . $this->config['integral_pricename'] . '，是否继续？';
                                } else {

                                    $return['msg']  =   '您的会员套餐已用完，请先购买套餐，是否继续？';
                                }

                                $return['url']      =   $this->config['sy_weburl'] . 'wap/member/index.php?c=getserver&id=' . $uid . '&server=11';
                            } else {
                                if ($serverOpen) {

                                    $return['msg']  =   '您的会员套餐已用完，继续邀请将扣除<span style=color:red;>' . $this->config['integral_interview'] . '</span>元，是否继续？';
                                } else {

                                    $return['msg']  =   '您的会员套餐已用完，请先购买套餐，是否继续？';
                                }
                                $return['url']      =   $this->config['sy_weburl'] . 'wap/member/index.php?c=getserver&id=' . $uid . '&server=11';
                                $return['price']    =   $this->config['integral_interview'];
                            }
                        } else {

                            $return['msg']          =   '您的会员套餐已用完，请先购买套餐，是否继续？';
                        }

                        $return['type']     =   $online;
                        $return['online']   =   $online;
                        $return['status']   =   2;
                    }
                } else if ($statis['rating_type'] == '2') { // 时间会员

                    $return['status']   =   3;
                }
            } else { // 会员已到期
                if ($online != 4) {
                    if ($online == 3 && !in_array('invite', explode(',', $this->config['sy_only_price']))) { // 积分消费

                        $return['jifen']    =   $this->config['integral_interview'] * $this->config['integral_proportion'];
                        $statis             =   $statisM->getInfo($uid, array('usertype' => 2, 'field' => '`integral`'));
                        $return['integral'] =   $statis['integral'];
                        $return['pro']      =   $this->config['integral_proportion'];
                    } else {

                        $return['price']    =   $this->config['integral_interview'];
                    }
                }

                $return['msg']      =   '您的会员已到期，请先购买会员特权！';
                $return['online']   =   $online;
                $return['status']   =   2;
            }
        }
        return $return;
    }

    /**
     * 会员套餐操作：刷新职位
     */
    function refresh_job($data)
    {
        $uid        =   intval($data['uid']);
        $usertype   =   intval($data['usertype']);

        $single_can =   @explode(',', $this->config['com_single_can']);
        $serverOpen =   1;
        if(!in_array('sxjob',$single_can)){
            $serverOpen =   0;
        }

        $return     =   array();
        $return['serverOpen']   =   $serverOpen;

        if ($data['jobid']) {
            
            $jobid  =   @explode(',', $data['jobid']);
            $jobnum =   count($jobid);
            $jobid  =   pylode(',', $jobid);

            $jobs   =   $this->select_all('company_job', array('id' => array('in', $jobid),'uid'=>$uid), "`id`,`name`");
            
            if (empty($jobs)) {
                
                $return['msg'] = '职位参数错误！';
            } else {
                
                // 会员信息
                $suid   =   $uid;
                $statis =   $this->select_once('company_statis', array('uid' => $suid));
                
                $num    =   $jobnum - $statis['breakjob_num'];
                $online =   (int)$this->config['com_integral_online'];
                $pro    =   (int)$this->config['integral_proportion'];
                
                // 判断会员是否过期
                if (isVip($statis['vip_etime'])) {
                    
                    if ($this->config['integral_jobefresh'] == '0' && $statis['breakjob_num'] == '0') {
                        
                        $this -> update_once('company_statis', array('breakjob_num' => $jobnum), array('uid' => $suid));
                        
                        $statis =   $this->select_once('company_statis', array('uid' => $suid));
                    }
                    
                    if ($statis['rating_type'] == '1') { // 套餐会员
                        
                        if ($statis['breakjob_num'] >= $jobnum) {
                            
                            $nid    =   $this->update_once('company_job', array('lastupdate' => time()), array('id' => array('in', $jobid)));
                            
                            if ($nid) {
                                
                                $this->update_once('company', array('lastupdate' => time()), array('uid' => $uid));
                                $this->update_once('company_statis', array('breakjob_num' => array('-', $jobnum)), array('uid' => $suid));
                                $this->update_once('hotjob', array('lastupdate' => time()), array('uid' => $uid));
                                if ($jobnum == 1) {

                                    $this->addMemberLog($uid, $usertype, "刷新职位(ID:".$jobs[0]['id'].")《".$jobs[0]['name']."》", 1, 4, $jobnum); // 会员日志
                                } else {
                                
                                    $this->addMemberLog($uid, $usertype, "批量刷新职位(ID:".$jobid.")", 1, 4, $jobnum); // 会员日志
                                }
                                $return['status']   =   1;
                                $return['msg']      =   '职位刷新成功';
                                
                            } else {
                                
                                $return['msg']      =   '职位刷新失败';
                                $this->addErrorLog($uid,5,$return['msg']);
                            }
                        } else { // 刷新职位数不足

                            if ($online != 4) {

                                if($online == 3 && !in_array('sxjob', explode(',', $this->config['sy_only_price']))){

                                    $return['jifen']    =   $num * $this->config['integral_jobefresh'] * $pro;  // 扣除剩余套餐需要积分
                                    $return['integral'] =   intval($statis['integral']);
                                    $return['pro']      =   $pro;
                                }else{

                                    $return['price']    =   $num * $this->config['integral_jobefresh'];         // 扣除剩余套餐需要金额
                                    $return['integral'] =   intval($statis['integral']);
                                }

                                $return['msg']  =   '刷新套餐不足，是否继续？';

                            } else {

                                $return['msg']  =   '刷新套餐不足，请先购买会员！';
                            }

                            $return['online']   =   $online;
                            $return['status']   =   2;
                        }
                    } else if ($statis['rating_type'] == '2') { // 时间会员,直接刷新
                        
                        $nid    =   $this->update_once('company_job', array('lastupdate' => time()), array('id' => array('in', $jobid)));
                        
                        if ($nid) {
                            
                            $this->update_once('company', array('lastupdate' => time()), array('uid' => $uid));
                            $this->update_once('hotjob', array('lastupdate' => time()), array('uid' => $uid));
                            if ($jobnum == 1) {
                                
                                $this->addMemberLog($uid, $usertype, "刷新职位(ID:".$jobs[0]['id'].")《".$jobs[0]['name']."》", 1, 4, $jobnum); // 会员日志
                            } else {
                                
                                $this->addMemberLog($uid, $usertype, "批量刷新职位(ID:".$jobid.")", 1, 4, $jobnum); // 会员日志
                            }
                            
                            $return['status']   =   1;
                            $return['msg']      =   '职位刷新成功';
                        } else {
                            
                            $return['msg']      =   '职位刷新失败';
                            $this->addErrorLog($uid,5,$return['msg']);
                        }
                        
                    }  
                    
                } else { // 会员时间到期

                    $return['msg']      =   '您的会员已到期，请先购买会员！';
                    $return['status']   =   2;
                }
            }
        } else {
            // 职位ID参数错误
            $return['msg'] = '请先选择职位！';
        }
        return $return;
    }

    /**
     * 会员套餐操作：刷新兼职
     */
    function refresh_part($data)
    {
        $uid        =   intval($data['uid']);
        $usertype   =   intval($data['usertype']);
        
        $return     =   array();
        
        if ($data['partid']) {
             
            $partid =   @explode(',', $data['partid']);
            $pnum   =   count($partid);
            $partid =   pylode(',', $partid);
            
            $parts  =   $this->select_all('partjob', array('id' => array('in', $partid),'uid'=>$data['uid']), '`id`,`name`');

            if (empty($parts)) {
                
                $return['msg'] = '职位参数错误！';
            } else {
				$partGetId = array();
				foreach($parts as $value){
					$partGetId[] = $value['id'];
				}
				$partid =   pylode(',', $partGetId);
                // 会员信息
                $suid   =   $uid;
                $statis =   $this->select_once('company_statis', array('uid' => $suid));
                
                $num    =   $pnum - $statis['breakjob_num'];
                $online =   (int)$this->config['com_integral_online'];    
                $pro    =   (int)$this->config['integral_proportion'];
                
                // 判断会员是否过期
                if (isVip($statis['vip_etime'])) {

                    if ($this->config['integral_jobefresh'] == '0' && $statis['breakjob_num'] == '0') {
                        
                        $this -> update_once('company_statis', array('breakjob_num' => $pnum), array('uid' => $suid));

                        $statis = $this->select_once('company_statis', array('uid' => $suid));
                    }

                    if ($statis['rating_type'] == '1') { // 套餐会员 和 有套餐值的过期会员
                        
                        if ($statis['breakjob_num'] >= $pnum) {
                        
                            $nid    =   $this->update_once('partjob', array('lastupdate' => time()), array('id' => array('in',  $partid)));
                            
                            if ($nid) {
                            
                                $this->update_once('company', array('lastupdate' => time()), array('uid' => $uid));
                                $this->update_once('company_statis', array('breakjob_num' => array('-', $pnum)), array('uid' => $suid));
                                $this->update_once('hotjob', array('lastupdate' => time()), array('uid' => $uid));

                                if ($pnum == 1) {
                                    
                                    $this->addMemberLog($uid, $usertype, "刷新兼职(ID:".$parts[0]['id'].")《".$parts[0]['name']."》", 9, 4); // 会员日志
                                } else {
                                    
                                    $this->addMemberLog($uid, $usertype, "批量刷新兼职(ID:".$partid.")", 9, 4); // 会员日志
                                }
                                
                                $return['status']   =   1;
                                $return['msg']      =   '兼职刷新成功';
                            } else {
                                
                                $return['msg']      =   '兼职刷新失败';
                            }
                        } else { // 刷新兼职数不足

                            if ($online != 4) {

                                if($online == 3 && !in_array('sxjob', explode(',', $this->config['sy_only_price']))){

                                    $return['jifen']    =   $num * $this->config['integral_jobefresh'] * $pro;  // 扣除剩余套餐需要积分
                                    $return['integral'] =   intval($statis['integral']);
                                    $return['pro']      =   $pro;
                                }else{

                                    $return['price']    =   $num * $this->config['integral_jobefresh'];         // 扣除剩余套餐需要金额
                                    $return['integral'] =   intval($statis['integral']);
                                }

                                $return['msg']  =   '刷新套餐不足，是否继续刷新？';

                            } else {

                                $return['msg']  =   '刷新套餐不足，请先购买会员！';
                            }

                            $return['online']   =   $online;
                            $return['status']   =   2;
                        }
                    } else if ($statis['rating_type'] == '2') { // 时间会员,直接刷新
                        
                        $nid    =   $this -> update_once('partjob', array('lastupdate' => time()), array('id' => array('in', $partid)));
                        
                        if ($nid) {
                            
                            if ($pnum == 1) {
                                
                                $this->addMemberLog($uid, $usertype, "刷新兼职(ID:".$parts[0]['id'].")《".$parts[0]['name']."》", 9, 4, 1); // 会员日志
                            } else {
                               
                                
                                $this->addMemberLog($uid, $usertype, "批量刷新兼职(ID:".$partid.")", 9, 4, $pnum); // 会员日志
                            }
                            
                            $return['status']   =   1;
                            $return['msg']      =   '兼职刷新成功';
                        } else {
                            $return['msg']      =   '兼职刷新失败';
                        }
                    } else {
                        
                        if ($this->config['integral_jobefresh'] == '0') {
                            
                            $nid    =   $this->update_once('partjob', array('lastupdate' => time()), array('id' => array('in', $partid)));
                            
                            if ($nid) {
                                
                                if ($pnum == 1) {
                                
                                    $this->addMemberLog($uid, $usertype, "刷新兼职(ID:".$parts[0]['id'].")《" . $parts[0]['name'] . "》", 9, 4); // 会员日志
                                } else {
                                    
                                    $this->addMemberLog($uid, $usertype, "批量刷新兼职(ID:".$partid.")", 9, 4); // 会员日志
                                }
                                $return['status']   =   1;
                                $return['msg']      =   '兼职刷新成功';
                            } else {
                                $return['msg']      =   '兼职刷新失败';
                            }
                        } else {

                            $return['msg']          =   '会员已到期，请先购买会员！';
                            $return['status']       =   2;
                        }
                    }
                } else { // 会员时间到期
                    if ($this->config['integral_jobefresh'] == '0') {
                        
                        $nid    =   $this->update_once('partjob', array('lastupdate' => time()), array('id' => array('in', $partid)));
                        
                        if ($nid) {
                            
                            if ($pnum == 1) {
                                
                                $this->addMemberLog($uid, $usertype, "刷新兼职(ID:".$parts[0]['id'].")《".$parts[0]['name']."》", 9, 4); // 会员日志
                            } else {
                                
                                $this->addMemberLog($uid, $usertype, "批量刷新兼职(ID:".$partid.")", 9, 4); // 会员日志
                            }
                            
                            $return['status']   =   1;
                            
                            $return['msg']      =   '兼职刷新成功';
                        } else {
                            
                            $return['msg']      =   '兼职刷新失败';
                        }
                        
                    } else {

                        $return['msg']          =   '您的会员已到期，请先购买会员！';
                        $return['status']       =   2;
                    }
                }
            }
        } else {
            
            // 职位ID参数错误
            $return['msg']  =   '请正确选择职位刷新！';
        }
        return $return;
    }

    
    
}
?>