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

class userinfo_model extends model
{

    private $comstatusStr =array(
    	0	=>	' 被设为未审核状态',
    	1	=>	' 通过审核',
    	2	=>	' 被锁定',
    	3	=>	' 审核未通过',
    	4	=>	' 被暂停'
    );

    private function addErrorLog($uid,$type='',$content)
    {
        
        require_once ('errlog.model.php');
        $ErrlogM = new errlog_model($this->db, $this->def);
        return  $ErrlogM -> addErrorLog($uid, $type, $content);
    }
    
	// 获取账户信息
	function getInfo($where,$data=array())
    {
	    
	    $field  =	empty($data['field']) ? '*' : $data['field'];
	    
	    if (!empty($where)) {
	        
	        $member =   $this -> select_once('member',$where, $field);
	        
	        if($member && is_array($member)){
	            
	            /* 是否有修改用户名权限查询 */
	            if (isset($data['setname']) && $data['setname'] == '1') {
	                
	                if($member['restname']=='0'){
	                    
	                    $member['setname']  =  '1';
	                }
	            }
				if (isset($data['sf']) && $data['sf'] == '1') {
	                
					$sflist  		=  array(1=>'个人会员',2=>'企业会员');
					
	                $member['sf']  	=  $sflist[$member['usertype']];
	            }
	            return $member;
            }
	    } 
	}

	//  账户数目
	function getMemberNum($Where = array()){
		return $this->select_num('member', $Where);
	}
	
	// 获取账户信息，多条查询
	public function getList($whereData , $data = array(),$utype='') {

	    $field =   $data['field'] ? $data['field'] : '*';
	    
	    $List =   $this -> select_all('member',$whereData, $field);
	    
 	    if ($utype == 'admin'){
 	        
 	        $List  =  $this -> getDataList($List);
 	    }
 	    return $List;
	}
	
	//添加用户
	public function addInfo($data){
	    
	    if ($data && is_array($data)){
	        
	        $mdata   =	$data['mdata'];
	        
	        $result  =  $this -> addMemberCheck($mdata);
	        
	        if ($result['msg']){
	            
	            return $result;
	        }

		    $mdata['did']   =   !empty($mdata['did']) ? $mdata['did'] : $this->config['did'];
	        $nid	=	$this->insert_into('member', $mdata);
	        if(!$nid){

				$user_id	=	$this->getInfo(array('username'=>$mdata['username']),array('field'=>'uid'));

				$nid		=	$user_id['uid'];

			}
	        if ($nid){
	            
	            $udata	=	!empty($data['udata']) ? $data['udata'] : array();
	            $sdata	=	!empty($data['sdata']) ? $data['sdata'] : array();
	            
	            $udata['uid']	=	$nid;
	            
	            if ($mdata['usertype'] == 1){
					$udata['did']   =   !empty($udata['did']) ? $udata['did'] : $this->config['did'];
					$this -> insert_into('resume',$udata);

					$sdata['uid']	=	$nid;
					$this -> insert_into('member_statis',$sdata);
	                
	            }else if ($mdata['usertype'] == 2){
	                if(empty($udata['crm_uid'])) {
	                    if($this->config['sy_crm_duty'] == 1){

                            $crm_uid = $this->getCrmUid(array('type' => '2'));
                        }
                        if ($crm_uid) {
                            $udata['crm_uid'] = $crm_uid;
                            $udata['crm_time'] = time();
                        }
                    }
	                $this -> insert_into('company',$udata);
	                $this -> addStatis($nid,$sdata);
	               
 	            }
	        }
	        return $nid;
	    }
	}

	 
	/**
	 * @desc  添加企业账户，账户套餐信息添加
	 * @param int $uid
	 * @param array $data
	 */	
	private function addStatis($uid = null, $data = array()) {
	    
        $uid            =   intval($uid);
	    
	    $id             =   $data['rating'] ? intval($data['rating']) : $this->config['com_rating'];
	    
	    $integral       =   $data['integral'] ? intval($data['integral']) : 0;
	    
	    require_once ('rating.model.php');
	    
	    $ratingM        =   new rating_model($this->db, $this->def);
        
	    // 获取会员等级数据
	    $rInfo          =   $ratingM -> getInfo(array('id' => $id));
	    
        $value          =   array(            
            'uid'           => $uid,
            'rating'        => $id,
            'rating_name'   => $rInfo['name'],
            'rating_type'   => $rInfo['type']
        );
	    if($rInfo['type']  ==  1){
	        
	        $value      =   array_merge($value, array(
                
                'job_num'           =>  $rInfo['job_num'],
                'down_resume'       =>  $rInfo['resume'],
                'breakjob_num'      =>  $rInfo['breakjob_num'],
                'invite_resume'     =>  $rInfo['interview'],
                'part_num'          =>  $rInfo['part_num'],
                'breakpart_num'     =>  $rInfo['breakpart_num'],
                 
                'zph_num'           =>  $rInfo['zph_num'],
                'top_num'        	=>  $rInfo['top_num'],
                'urgent_num'        =>  $rInfo['urgent_num'],
                'rec_num'        	=>  $rInfo['rec_num']
                 
            ));
	    } 
	    
	    if($rInfo['service_time']){
	        $time              =   time() + 86400 * $rInfo['service_time'];
	        $value['vip_etime']=  $time;
	    }else{
	        $value['vip_etime']=  0;
	    }
	    
	    $value['integral']     =   $rInfo['integral_buy'] + $integral;
        $value['vip_stime']     =   time();
        $value['vip_etime']     =  $rInfo['service_time'] ? strtotime('+'.$rInfo['service_time'].' day') : 0;
        
        $comSdata   =   array(
            'rating'        =>  $id,
            'rating_name'   =>  $rInfo['name'],
            'vipstime'      =>  time(),
            'vipetime'      =>  $rInfo['service_time'] ? strtotime('+'.$rInfo['service_time'].' day') : 0
        );
        
        $this->update_once('company', $comSdata, array('uid' => $uid));
        	    
        $this -> insert_into('company_statis',$value);
	    
	}
	
	//修改用户信息
    public function upInfo($whereData = array(), $upData = array(), $data = array())
    {

        if (!empty($whereData)) {
            //处理password
            if (isset($upData['password'])) {
                if (!empty($upData['password'])) {
                    $passRes = $this->generatePwd(array('password' => $upData['password']));
                    if (!empty($passRes)) {
                        $upData['password'] = $passRes['pwd'];
                        $upData['salt'] = $passRes['salt'];
                    }
                } else {
                    unset($upData['password']);
                }
            }
            return $this->update_once('member', $upData, $whereData);
        }
    }

    /**
     * 用户注册检测,修改基本信息检测
     * @param $data
     * @param $uid  修改用户名、手机号、邮箱时才需要传入，添加时的检测不需要传
     * @param $utype 修改基本信息时，操作的用户类型：user用户 ,admin 管理员
     * @return array|string[]
     */
	public function addMemberCheck($data, $uid = null, $utype = null){
	    
	    $return  =  $oldMem  =  array();
	    
	    if (!empty($uid)){
	        
	        $oldMem  =  $this -> select_once('member',array('uid'=>$uid),'`username`,`moblie`,`email`,`status`,`lock_info`,`address`');
	    }
 
	    if (!empty($data['username'])){
	        
	        if(CheckRegUser($data['username']) == false && CheckRegEmail($data['username']) == false){
	            
	            return array('error'=>'101','msg'=>'用户名包含特殊字符');
			}
			
			if (!empty($this->config['sy_regname'])) {
	                
				$regname = @explode(',', $this->config['sy_regname']);
				
				if (in_array($data['username'], $regname)) {
					
					return array('error'=>'107','msg'=>'该用户名禁止使用！');
				}
			}
	        
	        $reged	=  $this -> select_once('member',array('username'=>trim($data['username'])),'`uid`');
	        
	        if ($reged){
	            
	            if (!empty($uid)){
	                
	                if ($reged['uid'] != $uid){
	                    
	                    return array('error'=>'102','msg'=>'用户名已被使用');
	                    
	                }
	            }else{
	                
	                return array('error'=>'102','msg'=>'用户名已被使用');
	            }
	        }else{
	            $return['username']  =  $data['username'];
	            if (!empty($oldMem)){
	                $return['oldusername']  =  $oldMem['username'];
	            }
	        }
	        
	        /* 会员中心修改用户名添加 */
	        if (isset($data['restname']) && $data['restname'] == '1') {
	            
	            $member    =   $this -> getInfo(array('uid'=> intval($uid)), array('field'=>'restname,password,salt'));
	            
	            if ($member['restname'] == '1') {
	                
	                return array('error'=>'100','msg'=>'您无权限修改用户名！');
	            }

	            $nmsg	=	regUserNameComplex($data['username']);
	            if($nmsg){
	            	return array('error'=>'100','msg'=>$nmsg);
	            }

	            if ($data['password']) {
	                
	                /* md5加密，验证密码传参：salt */
	                
	                $passRes	=	$this -> generatePwd(array('password' => $data['password'], 'salt' => $member['salt']));
	                
	                if(!empty($passRes)){
	                    
	                    $oldpass   =	$passRes['pwd'];
 	                }
  	                
	                if ($member['password'] != $oldpass) {
	                    
	                    return array('error'=>'108','msg'=>'您的密码验证错误，请重试！');
	                }
	            }
	        } 
	    }

        if (!empty($data['companyName'])){
            $reged   =   $this->select_once('company', array('name' => trim($data['companyName'])), '`uid`');

            if ($reged){

                if (!empty($uid)){
                    if ($reged['uid'] != $uid){
                        return array('error'=>'106','msg'=>'企业名称已被使用');
                    }
                }else{
                    return array('error'=>'106','msg'=>'企业名称已被使用');
                }

            }
            $return['companyName']  =  $data['companyName'];
        }
	    if (!empty($data['moblie'])){
	        
	        if(CheckMobile($data['moblie']) == false){
	            
	            return array('error'=>'103','msg'=>'手机号格式错误');
	        }
	        $reged	=  $this -> select_once('member',array('moblie'=>trim($data['moblie']),'username'=>array('=',trim($data['moblie']),'or')),'`uid`');
			
	        if ($reged){
	            
	            if (!empty($uid)){
	                
	                if ($reged['uid'] != $uid){
	                    
	                    return array('error'=>'104','msg'=>'手机号已被使用');
	                    
	                }elseif (!empty($oldMem) && $data['moblie'] != $oldMem['moblie']){//判断现有的和之前是否相同，不同返回可修改的值
	                    
	                    $return['moblie']  =  $data['moblie'];
	                }
	            }else{
	               
	                return array('error'=>'104','msg'=>'手机号已被使用');
	            }
	        }else {
	            
	            $return['moblie']  =  $data['moblie'];
	        }
	    }
	    if (!empty($data['email'])){
	        
	        if (CheckRegEmail($data['email']) == false){
	            
	            return array('error'=>'105','msg'=>'邮箱格式错误');
	        }
	        $reged	=  $this -> select_once('member',array('email'=>trim($data['email']),'username'=>array('=',trim($data['email']),'or')),'`uid`');
	        if ($reged){
	            
	            if (!empty($uid)){
	                
                    if ($reged['uid'] != $uid){
	                    
                        return array('error'=>'106','msg'=>'邮箱已被使用');
                        
                    }elseif (!empty($oldMem) && $data['moblie'] != $oldMem['moblie']){//判断现有的和之前是否相同，不同返回可修改的值
                        
                        $return['email']  =  $data['email'];
                    }
	            }else{
	                
	                return array('error'=>'106','msg'=>'邮箱已被使用');
	            }
	        }else{
	            
	            $return['email']  =  $data['email'];
	        }
	    }
	    //后台修改基本信息时的用户状态
	    if (!empty($data['status'])){
	        
	        if (!empty($oldMem)){
	            //判断现有的和之前是否相同，不同返回可修改的值
	            if ($data['status'] != $oldMem['status']){
	                $return['status']  =  $data['status'];
	            }
	            if (!empty($data['lock_info']) && $data['lock_info'] != $oldMem['lock_info']){
	                $return['lock_info']  =  $data['lock_info'];
	            }
	        }
	    }
	    //后台修改企业基本信息时的地址
	    if (!empty($data['address'])){
	        
	        if (!empty($oldMem) && $data['address'] != $oldMem['address']){
	            $return['address']  =  $data['address'];
	        }
	    }
	    //后台修改基本信息时的密码，此处不需要处理，到本model的upInfo里面处理
	    if (!empty($data['password'])){
	        
	        $return['password']  =  $data['password'];
	    }
	    //
	    if ($utype){
	        
	        $this -> setMemberInfo($uid, $utype, $return, $oldMem);
	    }
	    return $return;
	}
	private function setMemberInfo($uid, $utype, $up, $oldMem)
	{
 
	    $uData  =  array();

	    //如是修改会员基本信息时检查，可以修改的，直接修改
	    if (!empty($uid) && !empty($oldMem)){
	        //会员操作的，如原来是审核未通过，改成未审核
	        if ($utype == 'user'){
	            
	            if($oldMem['status'] == '3'){
	                
	                $up['status']  =  '0';
	            }
	        }
	        
	        $this -> upInfo(array('uid'=>$uid), $up);
	        
	        $newMem  =  $this -> select_once('member',array('uid'=>$uid),'`uid`,`username`,`usertype`,`email`');
	        //锁定会员需要发送邮件通知
	        if (!empty($up['status']) && $up['status'] == 2 && $this->config['sy_email_lock'] == '1'){
	            
	            $emailData  =  array(
	                'email'      =>  $newMem['email'],
	                'uid'        =>  $newMem['uid'],
	                'username'   =>  $newMem['username'],
	                'lock_info'  =>  $up['lock_info'],
	                'type'       =>  'lock'
	            );
	            
	            require_once ('notice.model.php');
	            
	            $noticeM   =  new notice_model($this->db, $this->def);
	            
	            $noticeM -> sendEmailType($emailData);
	        }
	        // 管理员操作的，如改变了用户审核状态，同步修改相关信息
	        if ($utype == 'admin' && !empty($up['status'])){
	            
	             
	            if ($newMem['usertype'] == 1){
	                
	                $this -> update_once('resume',array('r_status'=>$up['status']),array('uid'=>$uid));
	                $this -> update_once('resume_expect',array('r_status'=>$up['status']),array('uid'=>$uid));
	                
	            }else if ($newMem['usertype'] == 2){
	                
	                $this -> update_once('company',array('r_status' => $up['status']),array('uid'=>$uid));
	                $this -> update_once('company_job',array('r_status' => $up['status']),array('uid'=>$uid));
	                
	            }
	        }
	        
	        // 管理员操作，$up['moblie'], $up['email']，同步修改手机、邮箱
	        if ($utype == 'admin') {
	        
	            if (!empty($up['moblie'])) {
	                
                    $this->update_once('resume', array('telphone' => $up['moblie']), array('uid' => $uid));
                    $this->update_once('company', array('linktel' => $up['moblie']), array('uid' => $uid));

	            }
	            
	            if (!empty($up['email'])) {
	                
                    $this->update_once('resume', array('email' => $up['email']), array('uid' => $uid));
                    $this->update_once('company', array('linkmail' => $up['email']), array('uid' => $uid));

                }
	        }
	    }
	}

    /**
     * 根据用户类型，直接查找用户信息
     * @param array $whereData
     * @param array $data
     * @return array|bool|false|string|void
     */
    function getUserInfo($whereData = array(), $data = array('usertype' => null, 'field' => null))
    {

        if (!empty($whereData)) {

            $tblist =   array(1 => 'resume', 2 => 'company', 3 => 'lt_info', 5 => 'gq_info');
            $table  =   $tblist[$data['usertype']];
            $field  =   $data['field'] ? $data['field'] : '*';
            return $this->select_once($table, $whereData, $field);
        }
    }
	/**
	 * 根据用户类型，直接批量查找用户信息
	 * @param array $whereData
	 * @param array $data
	 */
	function getUserInfoList($whereData = array(),$data = array('usertype'=>null,'field'=>null)){
	    
	    if (!empty($whereData)){
	        
	        $tblist  =  array(1=>'resume',2=>'company');
	        
	        $table   =  $tblist[$data['usertype']];
	        
	        $field   =  $data['field'] ? $data['field'] : '*';
	        
	        return $this -> select_all($table,$whereData,$field);
	    }
	}
	/**
	 * 根据用户类型，修改用户信息
	 */
	function  UpdateUserInfo($data=array('usertype'=>null,'post'=>null),$Where=array()){
		
		$tblist  =  array(1=>'resume',2=>'company');
	        
	    $table   =  $tblist[$data['usertype']];
	        
		return $this->update_once($table,$data['post'],$Where);
    }
	/**
     * 获取不同类型用户姓名、企业名称、头像
     */
	public function getUserList($whereData) {

		if($whereData){
			$memberList =   $this -> select_all('member',$whereData,'`uid`,`usertype`');
			//按usertype将uid分组

			$type		=	array();
			foreach ($memberList as $k => $v) {
				if($v['usertype']){
					$type[$v['usertype']][]	=	$v['uid'];
				}
			}
			$ResumeList = $ComList = array();
            if (!empty($type[1])){
                $ResumeList =   $this -> select_all(
                    'resume',
                    array(
                        'uid'=>array('in',pylode(',',$type[1]))
                    ),
                    '`uid`,`name`,`photo`'
                    );
            }
            if (!empty($type[2])){
                $ComList	=   $this -> select_all(
                    'company',
                    array(
                        'uid'=>array('in',pylode(',',$type[2]))
                    ),
                    '`uid`,`name`,`logo`'
                    );
            }
             
			foreach($ResumeList as $k=>$v){
				$ResumeList[$k]['pic']	=	checkpic($v['photo'],$this->config['sy_friend_icon']);
				
			}
			foreach($ComList as $k=>$v){
				$ComList[$k]['pic']		=	checkpic($v['logo'],$this->config['sy_friend_icon']);
				
			}
			 
			
			$List  =  array_merge($ResumeList,$ComList);
			return $List;
		}
    }
    /**
     * 根据不同类型用户的搜索条件获取uid集合
     * $whereData[1]:resume表查询条件 
     * $whereData[2]:company表查询条件 
     */
	public function getUidsByWhere($whereData=array()) {
		
		if($whereData){
			

			if(!empty($whereData[1])){
				$ResumeList	=   $this -> select_all('resume',$whereData[1],'`uid`');
			}

			if(!empty($whereData[2])){
				$ComList	=   $this -> select_all('company',$whereData[2],'`uid`');
			}
			$List			=	array_merge($ResumeList,$ComList);

			$uids			=	array();

			foreach ($List as $k => $v) {
				$uids[]		=	$v['uid'];
			}

			return $uids;
		}
    }
	
	/**
	 * 删除单个身份会员信息
	 * @param string $uid     因有批量删除，故传入的$uid为字符串型 ;如  1 或 1,2,3
	 * @param string $usertype
	 * @param string $delAccount
	 */
	public function delInfo($uid, $usertype, $delAccount = ''){
	    
	    $utname  =  '';
	    $return['layertype']  =	 0;
	    
	    if (!empty($uid)){
	        
	        if(is_array($uid)){
	            
	            $uid  =  pylode(',', $uid);
	            $return['layertype']  =  1;
	        }else if(strpos($uid, ',')){

				$return['layertype']  =  1;
			}

			if($delAccount == '1'){

				$nid	=	$this->delMember($uid);

			}else{
				if ($usertype == 1) {
					
					$utname	=	'个人';
					$nid	=	$this->delUser($uid);
				}else if ($usertype == 2) {
					
					$utname	=	'企业';
					$nid	=	$this->delCom($uid);
				}
			}
	        
	        if ($nid){
				//删除个人、企业，如果删除的是当前身份，就会去除会员类型
				$member	=	$this -> select_all('member',array('uid'=>array('in', $uid),'usertype' => $usertype),'`uid`');
				if(is_array($member) && $member){
					
					foreach($member as $v){
						
						$mids[]	=	$v['uid'];
					}
					$this -> update_once('member',array('usertype'=>0),array('uid'=>array('in',pylode(',',$mids))));
				}
				
	            $return['msg']      =  $utname.'会员(ID:'.$uid.')删除成功';
	            $return['errcode']  =  '9';
	        }else{

	            $return['msg']      =  $utname.'会员(ID:'.$uid.')删除失败';
	            $return['errcode']  =  '8';
	        }
	    }else{

	        $return['msg']      =  '请选择您要删除的会员';
	        $return['errcode']  =  '8';
	    }
	    
	    return $return;
	}
	/**
	 * 锁定用户(账户锁定和相关用户类型审核是否通过没有关系)
	 * @param array $whereData
	 * @param array $data
	 */
	public function lock($whereData = array('uid'=>null,'usertype'=>null),$data = array('post'=>null)){
	    
	    $return    =   array();
	    
	    if (!empty($whereData)){
	        
	        $status     =   intval($data['post']['status']);
	        $lock_info  =   trim($data['post']['lock_info']);
	        
	        if ($status == 2 && $lock_info=='') {
	            
	            $return['msg']      =  '请填写锁定原因';
	            $return['errcode']  =  '8';
	            
	        }else{
	            
				$post    =  $data['post'];
                $uid     =  $whereData['uid'];
                
                $member  =  $this->getInfo(array('uid' => $uid), array('field' => '`uid`,`username`,`email`,`moblie`'));
				
				if($status==1){
				    $sd = '解除锁定';
				    $lock_info = '';
                    // 已注销的账号，不支持解除锁定
				    $logout  =  $this->select_once('member_logout',array('uid'=>$uid,'status'=>1));
				    if (!empty($logout)){
				        
				        $return['msg']      =  '会员(ID:'.$whereData['uid'].')账号已注销，无法解除锁定';
				        $return['errcode']  =  '8';
				        return $return;
				    }
				}else{
				    $sd = '锁定';
				    $lock_info = '。原因：'.$post['lock_info'];
				}
				$nid    =    $this -> upInfo(array('uid' => $uid), $post);
				
				if ($nid){

				    $this -> commonLock($whereData['uid'],array('r_status'=>$status), $post['lock_info']);
    	           
    	            //锁定会员需要发送邮件通知
    	            if ($post['status'] == 2){
    	                
    	                if($this->config['sy_email_lock'] == '1'){
    	                    
    	                    $emailData  =  array(
    	                        'email'      =>  $member['email'],
    	                        'uid'        =>  $member['uid'],
    	                        'username'   =>  $member['username'],
    	                        'lock_info'  =>  $post['lock_info'],
    	                        'type'       =>  'lock'
    	                    );
    	                    
							require_once ('notice.model.php');
    	                    
    	                    $noticeM   =  new notice_model($this->db, $this->def);
    	                    
    	                    $noticeM -> sendEmailType($emailData);
    	                }
						if($this->config['sy_msg_lock'] == '1'){
							$msgData  =  array(
    	                        'moblie'     =>  $member['moblie'],
    	                        'uid'        =>  $member['uid'],
    	                        'username'   =>  $member['username'],
    	                        'lock_info'  =>  $post['lock_info'],
    	                        'type'       =>  'lock'
    	                    );
							require_once ('notice.model.php');
    	                    
    	                    $noticeM   =  new notice_model($this->db, $this->def);
    	                    
    	                    $noticeM -> sendSMSType($msgData);
						}
    	            }
    	            
	            	$comcrm = $this->select_all('company',array('uid' => $uid),'`name`,`r_status`,`crm_uid`');

                    $return['msg']      =  '会员'.$sd.'设置成功(ID:'.$whereData['uid'].$lock_info.')';
    	            $return['errcode']  =  '9';
    	            
    	        }else{
    	            $return['msg']      =  '会员'.$sd.'设置失败(ID:'.$whereData['uid'].')';
    	            $return['errcode']  =  '8';
    	        }
	        }
	    }else{
	        $return['msg']      =  '请选择需要锁定的会员';
	        $return['errcode']  =  '8';
	    }
	    return $return;
	}

	private function commonLock($uid, $up, $lock_info = '')
	{
		$where = array('uid' => $uid);
        
        include_once('resume.model.php');
        $resumeM   =   new resume_model($this->db, $this->def);
        
	    $this->update_once('resume', $up, $where);
        $this->update_once('company', $up, $where);

        $expectdata = $up;
        if($up['r_status']!=1){
        	$expectdata['state'] = 3; // 锁定账户 将简历状态改成未通过
        	$expectdata['statusbody'] = $lock_info;
        }
        $resumeM->setExpectState($expectdata,$where);

        $this->update_once('company_job', $up, $where);
        $this->update_once('partjob', $up, $where);

	}

    /**
     * 会员审核(会员审核，被锁定的账号，无法修改审核状态)
     * @param array $whereData 参数格式 uid=>array('in', '1,2,3'); uid=>1
     * @param array $data
     * @return mixed
     */
	public function status($whereData = array('uid'=>null,'usertype'=>null), $data = array('post'=>null))
    {
        if (!empty($whereData)) {
            
            $post      =  $data['post'];
            $usertype  =  intval($whereData['usertype']);

            $up     =   array('r_status' => $data['post']['status']);
            $where  =   array(
                'uid'       =>  $whereData['uid'],
                'r_status'  =>  array('<>', 2)
            );
            // 处理审核提示和管理员日志需要的内容
            if ($up['r_status'] == 4){
                $msg = '暂停';
            }elseif ($up['r_status'] == 3){
                $msg = '审核未通过';
            }elseif ($up['r_status'] == 0){
                $msg = '未审核';
            }elseif ($up['r_status'] == 1){
                $msg = '审核通过';
            }
            $lock_info = !empty($post['lock_info']) ? '。原因：'.$post['lock_info'] : '';
            // 保存审核信息
            if (isset($post['lock_info'])){
                $this->update_once('member',array('lock_info'=>$post['lock_info']),array('uid'=>$whereData['uid']));
            }
            $isSendMsg = true;

            /**
             * @desc 身份信息非审核状态，相关表（简历、职位等）数据设置未审核
             */
            if ($usertype == 2) {
                $where['r_status'] = array();
                $where['r_status'][] = array('<>', 2);
                
                $comup = $up;
                if($data['post']['status']==4){
                    $comup['zt_time'] = time();
                }else if($post['setup']!='1'){
            		$where['r_status'][] = array('<>', 4);
                }
                if ($comup['r_status'] == 1){
                    // 企业审核通过，同步把logo审核状态设为通过
                    $comup['logo_status'] = 0;
               
                }
                if($post['setup']=='1'){
                	$isSendMsg = false;
                }

                $identity = '企业';
                $nid  =  $this->update_once('company', $comup, $where);
                $this->update_once('partjob', $up, $where);
                $this->update_once('company_job', $up, $where);
                           
            } 
            
            if ($nid) {
                if($isSendMsg){
	                // 会员审核发送通知
	                $stData =   array(
	                    'status'    =>  $post['status'],
	                    'statusbody'=>  $post['lock_info'],
	                    'usertype'  =>  $usertype
	                );
	            }
                $this->sendStatus($whereData['uid'], $stData);
                //$this->update_once('member',array('status'=>$post['status']),array('uid'=>$whereData['uid']));
                $return['msg'] = $identity.'会员'.$msg.'设置成功(ID:' . $whereData['uid']['1'].$lock_info. ')';
                
                $return['errcode'] = '9';
            } else {
                $return['msg'] = $identity.'会员'.$msg.'设置失败(ID:' . $whereData['uid']['1'] . ')';
                $return['errcode'] = '8';
            }
        } else {
            $return['msg'] = '系统繁忙';
            $return['errcode'] = '8';
        }
        return $return;
    }
	/**
	 * 会员审核发送通知
	 * @param $uid   参数格式：uid = array('in', '1,2,3'); uid = 1;
	 * @param array $post
	 */
	private function sendStatus($uid,$post=array()){
        //审核通过和审核未通过才提醒，并且要先判断审核提醒是否开启通知    
        
	    $msgtx    =  $this -> config['sy_msg_userstatus'];
	    $emailtx  =  $this -> config['sy_email_userstatus'];
	    
	    if ($post['status'] == 1 || $post['status'] == 3){
	        
	        $members = $this -> getList(array('uid'=>$uid,'status'=>1),array('field'=>'uid,username,email,moblie'));
	         
	        if ($members){
	            
	            $date        =  date('Y-m-d H:i:s');
	            $statusInfo  =  '';
	            //处理审核信息
	            if($post['status'] == 1){
	                
	                $statusInfo  =  '审核通过！';
	                
	            }elseif($post['status'] == 3){
	                
	                $statusInfo  =  '审核未通过，';
	                
	                if($post['statusbody']){
	                    
	                    $statusInfo  .=  '原因：'.$post['statusbody'];
	                    
	                }
	            }
	            
	            if ($msgtx == '1' || $emailtx == '1'){
    	            $tplData  =  array(
    	                'auto_statis'  	=>  $statusInfo,
    	                'date'         	=>  $date,
    	                'type'         	=>  'userstatus'
    	            );
    				
    	            //因发送内容相同，可以先提取发送内容，然后再批量发送，可以减少循环查询次数
    	            require_once('notice.model.php');
    	            
    	            $noticeM   =   new notice_model($this->db, $this->def);
    	            //获取短息通知内容
    	            $msgTpl    =   $noticeM -> getTpl($tplData,'msg');
    	            //获取邮件通知内容
    	            $emailTpl  =   $noticeM -> getTpl($tplData,'email');
	            }
	            
	            $uids          =   array();
	            
	            foreach ($members as $k=>$v){
	                
	                $uids[]  =  $v['uid'];
	                //批量发送短信
	                if ($v['moblie'] && $msgtx == '1'){
	                    
	                    $mdata	=	array(
	                        'uid'		=>	$v['uid'],
	                        'cuid'		=>	0,
	                        'moblie'	=>	$v['moblie'],
	                        'type'		=>	'userstatus',
							'port'		=>	'5'							
	                    );
	                    $noticeM -> sendSMSType($mdata,$msgTpl['content']);
	                }
	                //批量发送邮件
	                if ($v['email'] && $emailtx == '1'){
	                    
	                    $edata  =  array(
	                        'uid'      =>  $v['uid'],
	                        'cuid'     =>  0,
	                        'email'    =>  $v['email'],
	                        'type'     =>  'userstatus'
	                    );
	                    $noticeM -> sendEmailType($edata,$emailTpl);
	                }
	            }
	            //发送系统通知
	            include_once('sysmsg.model.php');
	            
	            $sysmsgM    =   new sysmsg_model($this->db, $this->def);
	            
				$statusInfo	=	'您的账号'.$statusInfo;
	            $sysmsgM    ->  addInfo(array('uid'=>$uids,'content'=>$statusInfo,'usertype' => $post['usertype']));
	        }
	    }
	}
	//后台个人会员列表处理数据
	private function getDataList($List){
	    
	    foreach($List as $v){
	        if($v['uid']){
	        	if($v['usertype']=='1'){
	        		$useruids[]   =   $v['uid'];
	        	}
	        	if($v['usertype']=='2'){
	        		if($v['pid']){
	        			$comuids[]   =   $v['pid'];
	        		}else{
	        			$comuids[]   =   $v['uid'];
	        		}
	        		
	        	}
	        }

	    }
	    
	    
	    $countname = array();
	    if(!empty($useruids)){
	    	$resumes   =   $this -> select_all('resume',array('uid'=>array('in',pylode(',', $useruids))),'`uid`,`name`,`def_job`');
	    	foreach($resumes as $rk=>$rv){
	    		$countname[$rv['uid']] = $rv['name'];
	    	}
	    }
	    if(!empty($comuids)){
	    	$coms      =   $this -> select_all('company',array('uid'=>array('in',pylode(',', $comuids))),'`uid`,`name`');
	    	foreach($coms as $ck=>$cv){

	    		$countname[$cv['uid']] = $cv['name'];
	    	}
	    }
	    foreach($List as $k=>$v){
	        if(!empty($resumes)){
	        	foreach($resumes as $val){
		            
		            if($val['uid']==$v['uid']){
		                
		                $List[$k]['name']	  =	 $val['name'];
		                $List[$k]['def_job']  =	 $val['def_job'];
		            }
		        }
	        }
	        if(!empty($countname)){
	        	if($v['usertype']==2 && $v['pid']){
	        		$uid = $v['pid'];
	        	}else{
	        		$uid = $v['uid'];
	        	}
	        	$List[$k]['countname'] = $countname[$uid];
	        }
	        
	    }

	    return $List;
	}
	/**
	 * @desc 生成password（包括原密码验证）
	 * 
	 * @param array $pwdData (password:明密  salt：加密随机字符)
	 * 
	 */
	public function generatePwd($pwdData){
		
	    $pwdRes	=	array();
		
		if(empty($pwdData['password'])){
		
		    return $pwdRes;
		    
		}
		
		if (empty($pwdData['salt'])) {
		    
		    $salt =   substr(uniqid(rand()), -6);
		    
		}else{
		    
		    $salt =   $pwdData['salt'];
		    
		}
		
		$pass = passCheck($pwdData['password'],$salt);
		
		$pwdRes['pwd']	=	$pass;
		
		$pwdRes['salt']	=	$salt;
		
		return $pwdRes;
	}
	/**
	 * 删除个人会员
	 */
	private function delUser($uid){
	    
	    if (!empty($uid)){

			
			
			$return	=	$this -> delete_all('resume',array('uid'=>array('in',$uid)),'');
			
	        if ($return){
				
	            $this -> delete_all('answer',array('uid'=>array('in',$uid),'usertype'=>1),'');
	            
	            $this -> delete_all('answer_review',array('uid'=>array('in',$uid),'usertype'=>1),'');
	            
	            $this -> delete_all('atn',array('uid'=>array('in',$uid),'sc_uid'=>array('in',$uid,'OR')),'');
	            
	            $this -> delete_all('attention',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('blacklist',array('p_uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('change',array('uid'=>array('in',$uid),'usertype'=>1),'');
	            
	            $this -> delete_all('company_order',array('uid'=>array('in',$uid),'usertype'=>1), '');
	            
	            $this -> delete_all('company_pay',array('com_id'=>array('in',$uid),'usertype'=>1),'');			
	            $this -> delete_all('down_resume',array('uid'=>array('in',$uid)),'');
				
	            $this -> delete_all('evaluate_log',array('uid'=>array('in',$uid)),'');
				
	            $this -> delete_all('fav_job',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('job_tellog', array('uid' => array('in',$uid)), '');
	            
				$this -> delete_all('login_log',array('uid'=>array('in',$uid),'usertype'=>1),'');
				
	            $this -> delete_all('look_job',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('look_resume',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('member_log',array('uid'=>array('in',$uid),'usertype'=>1),'');
				
	            $this -> delete_all('member_statis',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('msg',array('uid'=>array('in',$uid)));
	            
	            $this -> delete_all('part_apply',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('part_collect',array('uid'=>array('in',$uid)),'');

	            $this -> delete_all('question',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('report',array('p_uid'=>array('in',$uid),'c_uid'=>array('in',$uid,'OR')),'');
				
	            $this -> delete_all('resume_expect',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('resume_city_job_class',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('resume_cityclass',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('resume_doc',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('resume_edu',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('resume_jobclass',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('resume_other',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('resume_project',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('resume_refresh_log',array('uid'=>array('in',$uid)),'');

                $this -> delete_all('resume_remark',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('resume_show',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('resume_skill',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('resume_trainging',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('resume_work',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('talent_pool',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('user_entrust',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('user_entrust_record',array('uid'=>array('in',$uid)),'');

	            $this -> delete_all('user_resume',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('userid_job',array('uid'=>array('in',$uid)),'');
	            
	            $this -> delete_all('userid_msg',array('uid'=>array('in',$uid)),'');
	            
	        }

	        return $return;
	    }
	}
	
	/**
	 * 删除企业会员
	 */
	private function delCom($uid){
	    if (!empty($uid)){
			
	        $return    =  $this -> delete_all('company',array('uid'=>array('in',$uid)), '');

	        if ($return){
	            
	            $this -> delete_all('answer',array('uid'=>array('in',$uid),'usertype'=>2), '');
	            
	            $this -> delete_all('answer_review',array('uid'=>array('in',$uid),'usertype'=>2), '');
	            	            
	            $this -> delete_all('atn',array('uid'=>array('in',$uid),'sc_uid'=>array('in',$uid,'OR')), '');
	            
	            $this -> delete_all('attention',array('uid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('banner',array('uid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('blacklist',array('c_uid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('change',array('uid'=>array('in',$uid),'usertype'=>2),'');

	            $this -> delete_all('company_job',array('uid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('company_job_link',array('uid'=>array('in',$uid)), '');
	            	          
	            $this -> delete_all('company_cert',array('uid'=>array('in',$uid),'usertype'=>2), '');
	            
	            $this -> delete_all('company_news',array('uid'=>array('in',$uid)), '');

	            $this -> delete_all('company_order',array('uid'=>array('in',$uid),'usertype'=>2), '');
	            
	            $this -> delete_all('company_pay',array('com_id'=>array('in',$uid),'usertype'=>2), '');
	            
	            $this -> delete_all('company_product',array('uid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('company_show',array('uid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('company_statis',array('uid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('down_resume',array('comid'=>array('in',$uid),'usertype'=>2), '');
	            
	            $this -> delete_all('email_msg',array('uid'=>array('in',$uid),'cuid'=>array('in',$uid,'OR')), '');
	            
				$this -> delete_all('evaluate_log',array('uid'=>array('in',$uid)), '');
				
	            $this -> delete_all('fav_job',array('com_id'=>array('in',$uid)), '');
	          
	            $this -> delete_all('hotjob',array('uid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('job_tellog', array('comid' => array('in',$uid)), '');
	            
	            $this -> delete_all('job_refresh_log', array('uid' => array('in',$uid),'usertype'=>2), '');
	            
				$this -> delete_all('login_log',array('uid'=>array('in',$uid),'usertype'=>2), '');
				
	            $this -> delete_all('look_job',array('com_id'=>array('in',$uid)), '');
	            
	            $this -> delete_all('look_resume',array('com_id'=>array('in',$uid),'usertype'=>2), '');

	            $this -> delete_all('member_log',array('uid'=>array('in',$uid),'usertype'=>2), '');
				
	            $this -> delete_all('msg',array('job_uid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('partjob',array('uid'=>array('in',$uid)), '');

	            $this -> delete_all('part_apply',array('comid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('part_collect',array('comid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('question',array('uid'=>array('in',$uid)), '');

	            $this -> delete_all('report',array('p_uid'=>array('in',$uid),'c_uid'=>array('in',$uid,'OR')), '');

                $this -> delete_all('resume_remark',array('comid'=>array('in',$uid)),'');

	            $this -> delete_all('special_com',array('uid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('talent_pool',array('cuid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('user_entrust_record',array('comid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('userid_job',array('com_id'=>array('in',$uid)), '');
	            
	            $this -> delete_all('userid_msg',array('fid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('zhaopinhui_com',array('uid'=>array('in',$uid)), '');
	            
	            $this -> delete_all('yqmb',array('uid'=>array('in',$uid)), '');
	            
	        }
	        return $return;
	    }
	}
	 
	/**
	 * @desc 修改用户名
	 * @param array $data
	 */
	function saveUserName($data = array()) {
        
        $value      =   array('username' => trim($data['username']));
        
        if (isset($data['restname']) && $data['restname'] == '1') {
            $value['password']      =  $data['password'];
            $value['restname']      =  $data['restname'];
        }
	    
        $uid        =   intval($data['uid']);
        
        $result     =   $this -> addMemberCheck($value, $uid);
		
        if ($result['username']) {
            
            if ($data['restname']=='1' || $data['admin'] == '1') {
                
                unset($value['password']);    
                
                require_once ('log.model.php');
                $LogM = new log_model($this->db, $this->def);
                $LogM -> addMemberLog($data['uid'], $data['usertype'], '修改用户名，原用户名：' . $result['oldusername'], 11);
				
				$this -> update_once('member', $value,  array('uid' => $uid));
                
				$return['errcode'] = '1';
            }else{
                
				$return['msg'] = '修改次数已用完！';
			}
            
        }else{
            
            if ($data['admin'] == '1') {
                
                return $result;
            }else{
                
		        $return['msg'] = $result['msg']?$result['msg']:'修改失败！';
            }
		}
        
        return $return;
	    
	}
	
	/**
	 * @desc 修改密码
	 * @param array $data
	 */
	function savePassword($data = array()) {
	   
	    if (!empty($data)) {
	        
	        $return        =   array();
	        
	        $uid           =   intval($data['uid']);
	        $pass          =   trim($data['password']);
	        $oldpass       =   trim($data['oldpassword']);
	        $repass        =   trim($data['repassword']);
	        
	        $info          =   $this -> getInfo(array('uid'=> $uid), array('field'=>'salt,password'));
	        
	        if($info && is_array($info)){
	            
	            //$pwdA      =   $this->generatePwd(array('password'=>$oldpass,'salt'=>$info['salt']));
	            
	            //$old       =   $pwdA['pwd'];

	            $pwmsg 	   =   regPassWordComplex($pass);

	            if (!passCheck($oldpass,$info['salt'],$info['password'])) {
	                
	                $return['errcode']     =   8;
	                
	                $return['msg']         =   '原始密码错误，请重试！';
	                
	            }elseif ($pass != $repass) {
	                
	                $return['errcode']     =   8;
	                
	                $return['msg']         =   '确认密码与新密码不一致，请重试！';
	                
	            }elseif($pwmsg!=''){

	            	$return['errcode']     =   8;
	                
	                $return['msg']         =   $pwmsg;
	                
	            }else{
	                
    	            $passwordA                 =   $this -> generatePwd(array('password'=>$pass));
    	            $password                  =   $passwordA['pwd'];
    	            $salt                      =   $passwordA['salt'];
    	            
    	            $return['id']              =   $this -> update_once('member',array('password'=>$password, 'salt'=>$salt), array('uid'=>intval($data['uid'])));
    	            
    	            require_once ('log.model.php');
    	            $LogM = new log_model($this->db, $this->def);
    	            $LogM->addMemberLog($data['uid'], $data['usertype'], '修改密码', 8,2);
    	            
    	            $return['errcode']         =   9 ;
    	            
    	            $return['msg']             =   '密码修改成功，请重新登录！';
    	            
	            }
	        }
	        
	        return $return;
	        
	    }
	    
	}
	 
	/**
	 * 获取member_reg信息
	 * 通用的whereData条件
	 */ 
	function getMemberregInfo($whereData,$data=array()){
		
		$field	=	empty($data['field']) ? '*' : $data['field'];
		
		$List 	=	$this -> select_once('member_reg', $whereData, $field);
		
		return $List;
		
	}
	/**
	 * 获取member_reg信息
	 * 通用的data数组
	 */ 
	function addMemberreg($data=array()){
		
		$nid	=	$this -> insert_into('member_reg', $data);
		
		return $nid;
		
	}
	/**
	 * 上传个人头像
	 */
	public function upLogo($id,$data=array()){
		
		if($id && !empty($data)){
			
			require_once ('integral.model.php');
			
			$IntegralM 	= 	new integral_model($this -> db, $this -> def);
			
			$IntegralM	->	invtalCheck($id,1,'integral_avatar','上传头像',20);
		
			
			if($data['wap']){
				
				$photo			=	'./data/upload/user/'.date('Ymd').'/'.$data['pic'];
				
			}else{
				
				$photo			=	str_replace('../data/upload/user/','./data/upload/user/',$data);
			
			}
			
			if($this -> config['user_photo_status'] == 1){
				
			    $photo_status	=	'1';
				
				$return['msg']='3';
			
			}else{
				$photo_status	=	'0';
			    
			    $return ['msg']	=	'1';
			}

			//5.0图片上传后就显示，后台审核不通过直接删除
			$this -> update_once('resume',array('photo'=>$photo,'photo_status'=>$photo_status),array('uid'=>$id));

			$this -> update_once('resume_expect',array('photo'=>$photo),array('uid'=>$id));
				
			$this -> update_once('answer',array('pic'=>$photo),array('uid'=>$id));
			
			$this -> update_once('question',array('pic'=>$photo),array('uid'=>$id));
			
			return $return;
		
		}
		
	}
	/**
	 * 个人身份认证
	 */
	public function upidcardInfo($whereData = array(),$data = array()){
		
		if(!empty($whereData)){
			
			require_once ('resume.model.php');
			$ResumeM	=	new resume_model($this -> db, $this -> def);
			$resume		=	$ResumeM -> getResumeInfo(array('uid'=>$whereData['uid']));
			
			if($resume['r_status']==2){
				$status	=	0;
			}else{
				$status	=	$this->config['user_idcard_status'] == '1' ? '0' : '1';
			}
			
			$data['name']	=	$data['name']?$data['name']:$resume['name'];
			
			$PostData	=	array(
				'name'			=>	$data['name'],
				'idcard'		=>	$data['idcard'],
				'idcard_status'	=>	$status,
				'cert_time'		=>	time()
			);

			//图片路径处理
			if ($data['file']['tmp_name'] || $data['preview']){
                
                $upArr                  =                array(
					'file'              =>               $data['file'],
					'dir'               =>              'cert',
					'base'              =>               $data['preview'],
				);

                $result                 =               $this -> upload($upArr);
                
                if (!empty($result['msg'])){
                    
                    $return['msg']      =               $result['msg'];

                    $return['errcode']  =               '8';
                    
                    return $return;
                    
                }elseif (!empty($result['picurl'])){
                    
                    $picurl          =               $result['picurl'];
                        
                }
            }elseif($data['idcard_pic']){
				$picurl		=	$data['idcard_pic'];
			}
	        if (isset($picurl)){
	            $PostData['idcard_pic']        =  $picurl;
	        }

			$id		=	$this -> update_once('resume',$PostData,array('uid'=>$whereData['uid']));
			
			$this -> update_once('resume_expect',array('idcard_status' => $status, 'uname' => trim($data['name'])),array('uid'=>$whereData['uid']));
			
			if($id){
				
				if ((!is_array($resume) || $resume['idcard_pic']=='') && $this->config['user_idcard_status']!=1){
					
					$com	=	$this->select_once('company_pay',array('com_id'=>$whereData['uid'],'pay_remark'=>'上传身份验证'));
					
					if(empty($com)){
						require_once ('integral.model.php');
						$IntegralM	=	new integral_model($this->db, $this->def);
						$IntegralM->invtalCheck($whereData['uid'],$data['usertype'],'integral_identity','上传身份验证',21);
					}
				}
				require_once ('log.model.php');
				$LogM = new log_model($this->db, $this->def);
				$LogM -> addMemberLog($whereData['uid'],$data['usertype'],'上传身份验证图片',13,1);

				if ($this -> config['user_idcard_status'] == '1'){
                        
					$return['errcode']  =  '9';
					
					$return['msg']      =  '上传成功，请等待审核';

				}else{
					
					$return['errcode']  =  '9';
					$return['msg']      =  '上传成功';
				}
			}else{
				
				$return['msg']		=	'上传失败！';
				$return['errcode']	=	8;
			}
			return $return;
		}
	}
	 	/**
	 * 处理单个图片上传
	 * @param file/需上传文件; dir/上传目录; type/上传图片类型; base/需上传base64; preview/pc预览即上传
	 */
	private function upload($data = array('file'=>null,'dir'=>null,'type'=>null,'base'=>null,'preview'=>null)){
	    
	    include_once('upload.model.php');
	    
	    $UploadM                =               new upload_model($this->db, $this->def);
	    
	    $upArr                  =               array(

            'file'              =>              $data['file'],
            
            'dir'               =>              $data['dir'],
            
            'type'              =>              $data['type'],
            
            'base'              =>              $data['base'],
            
            'preview'           =>              $data['preview']
            
        );
        
	    $return                 =               $UploadM -> newUpload($upArr);
	    
        return $return;
        
    }

    /**
     * 登录
     * @param array $data   $data['uid'] $data['usertype']
     * @return array|int[]|string[]
     */
	public function userLogin($data = array())
    {

		$username    =  $data['username'];
		if(!empty($data['moblie'])){
			$moblie  =  $data['moblie'];
		}else{
			$moblie  =  $data['username'];
		}
		$return  =  array('msg'=>'系统繁忙','errcode'=>8);
		require ('notice.model.php');
		$noticeM  =  new notice_model($this->db, $this->def);
		//会员已登录判断
		if(!empty($data['uid'])  && $data['uid'] > 0 && $username!=''){
			if($data['usertype']=='1'){
				return array('msg'=>'您现在是个人会员登录状态!');
			}elseif($data['usertype']=='2'){					
				return array('msg'=>'您现在是企业会员登录状态!');
			}
		}
		//username验证
		if($this->config['sy_msg_isopen'] && $this->config['sy_msg_login'] && !empty($data['act_login'])){
			if(!CheckMobile($moblie)){
				return array('msg'=>'手机号码格式不正确!','errcode'=>'8');
			}
			// 未注册手机登录直接注册新账号
			$member_arr	=	$this->getMemberNum(array('moblie'=>$moblie));

			if(!$member_arr || $member_arr==0){

			    $return =   $this->regUserByMobile($moblie, $data);

				if($return['errcode']!=1){
					return $return;
				}else{
					$regNew	=	1;
				}
			}
			$where		=	array('moblie'=> $moblie);
		}else {
			//验证码判断 手机动态码登录 无需验证验证码
			if($data['wxapp'] != '1'){
				$result			=		$noticeM->jycheck($data['authcode'],'前台登录');
				if(!empty($result)){
					return array('msg'=>$result['msg'],'errcode'=>'8');
				}
			}

			if(CheckRegUser($username)==false && CheckRegEmail($username)==false && ($username!='')){
				return array('msg'=>'用户名或密码不正确！','errcode'=>'8');
			}
			
			$where			=		array('username'=> $username);

			if(CheckMobile($username)){
				$where['PHPYUNBTWSTART']	=	'OR';
				
				$where['moblie']		=	$username;

				$where['moblie_status']	=	1;
				
				$where['PHPYUNBTWEND']	=	'';
			
			}
			//邮箱登录				
			if(CheckRegEmail($username)){

				$where['PHPYUNBTWSTART']	=	'OR';
				
				$where['email']		=	$username;

				$where['email_status']	=	1;
				
				$where['PHPYUNBTWEND']	=	'';
			}
		}
		
		$user  =  $this->getInfo($where);
		
		//开启UC情况下 需要判断UC账户 并进行同步登录
		if($this->config['sy_uc_type']=="uc_center"  && !$data['act_login']){
			
		
			include APP_PATH.'data/api/uc/config.inc.php';
			include APP_PATH.'/api/uc/include/db_mysql.class.php';
			include APP_PATH.'/api/uc/uc_client/client.php';
			$uname = $username;
			

			list($uid, $uname, $password, $email) = uc_user_login($uname, $data['password']);

		
			if($uid>0){
				//创建登录同步通知
				$ucsynlogin=uc_user_synlogin($uid);
				
				$return['uclogin']	=	$ucsynlogin;
			}
		}
		//如果系统未找到该用户 转向UC验证 是否UC用户 排除动态码登录
		if(empty($user)){
			
			//自动将UC账号注册至系统
			if($uid > 0) {
				
				if($data['source']){
					$source	=	$data['source'];
				}else{
					$source	=	1;
				}
				$salt 							= 		substr(uniqid(rand()), -6);
				$pass 							= 		passCheck($data['password'],$salt);
				$adata['username']				=		$data['username'];
				$adata['password']				=		$pass;
				$adata['did']					=		$this->config['did'];
				$adata['status']				=		1;
				$adata['salt']					=		$salt;
				$adata['source']				=		$source;
				$adata['reg_date']				=		time();
				$adata['reg_ip']				=		fun_ip_get();
				$adata['usertype']				=		0;
				$userid							=		$this->insert_into('member',$adata);
				//
				$user			=	$adata;
				$user['uid']	=	$userid;
				$res	        =	true;
				$loginType      =   'UC';
			}else{
				return array('msg'=>'该用户不存在!','errcode'=>'8');
			}
		}else{
			
			if($user['status']=='2'){
				return array('msg'=>'您的账号已被锁定!','errcode'=>'8','url'=>Url('register',array('c'=>'ok','type'=>2),'1'));	
			}

			//如果是企业用户，验证企业是否暂停
			if($user['usertype']=='2'){

				$commember  =  $this->select_once('company',array('uid'=>$user['uid']),'r_status');
				
				if($commember['r_status']==4){

					return array('msg'=>'您的账号已被暂停!','errcode'=>'8');
				}
			}
			if($regNew == 1){
			    // 未注册手机登录直接注册新账号的，在直接注册里面已验证过短信验证码，不需要重复验证
			    $res = true;
			}else{
			    if ($this->config['sy_msg_isopen'] && $this->config['sy_msg_login'] && !empty($data['act_login'])) {
			        //短信验证码校验
			        $companywhere['uid']	    =       $user['uid'];
			        $companywhere['type']		=		2;
			        $companywhere['orderby']	=		array('ctime,desc');
			        
			        include_once ('company.model.php');
			        $CompanyM					=		new company_model($this->db, $this->def);
			        $cert_arr					=		$CompanyM->getCertInfo($companywhere);
			        if (is_array($cert_arr)) {
			            $checkTime 				= 		$noticeM->checkTime($cert_arr['ctime']);
			            if($checkTime){
			                $res 				= 		$data['password'] == $cert_arr['check2'] ? true : false;
			                if($res == false){
			                    return array('msg'=>'短信验证码错误！','errcode'=>'8');
			                }
			            }else {
			                return array('msg'=>'验证码验证超时，请重新点击发送验证码！','errcode'=>'8');
			            }
			        }else {
			            return array('msg'=>'验证码发送不成功，请重新点击发送短信验证码！','errcode'=>'8');
			        }
			        $loginType  =  '短信验证码';
			    }else{
			        //普通密码校验
			        $res  =  passCheck($data['password'],$user['salt'],$user['password']);
			        $loginType  =  '账号';
			    }
			}
		}

		if($res){
				
			//更新用户QQ互联ID					
			if (session_id() == ''){
				session_start();
			}					
			if(!empty($_SESSION['qq']['openid'])){					   							
				if($_SESSION['qq']['unionid']){	
					$qqdata				= 		array(
						'qqid'			=>		$_SESSION['qq']['openid'],
						'qqunionid'		=>		$_SESSION['qq']['unionid']
					);								
				}else{
					$qqdata				= 		array(
						'qqid'			=>		$_SESSION['qq']['openid']
					);
				}						
				$this->upInfo(array('username'=>$user['username']),$qqdata);						
				unset($_SESSION['qq']);					
			}
			//更新用户微信unionid
			if(!empty($_SESSION['wx']['openid'])){													
				if($_SESSION['wx']['unionid']){							
					$udate 			= 		array(
						'wxid'		=>		$_SESSION['wx']['openid'],
						'unionid'	=>		$_SESSION['wx']['unionid']
					);					
				}else{
					$udate 			= 		array(
						'wxid'		=>		$_SESSION['wx']['openid']
					);
				}
				$udate['wxbindtime'] = time();
				$this->upInfo($udate, array('wxid' => '', 'wxid' => ''));
				$this->upInfo(array('username'=>$user['username']),$udate);						
				unset($_SESSION['wx']);					
			}elseif($_COOKIE['wxid']){
            	
            	if($_COOKIE['unionid']){							
					$udate 			= 		array(
						'wxid'		=>		$_COOKIE['wxid'],
						'unionid'	=>		$_COOKIE['unionid']
					);					
				}else{
					$udate 			= 		array(
						'wxid'		=>		$_COOKIE['wxid']
					);
				}
				$udate['wxbindtime'] = time();
				$this->upInfo($udate, array('wxid' => '', 'wxid' => ''));
				$this->upInfo(array('username'=>$user['username']),$udate);
            }
			//更新用户新浪sinaid
			if(!empty($_SESSION['sina']['openid'])){
				$this->upInfo(array('username'=>$user['username']),array('sinaid'=>$_SESSION['sina']['openid']));
				unset($_SESSION['sina']);
			}
			 
		    require_once('cookie.model.php');
		    $cookie  =  new cookie_model($this->db,$this->def);
		    
			$cookie->unset_cookie();
			$cookie->add_cookie($user['uid'],$user['username'],$user['salt'],$user['email'],$user['password'],$user['usertype'],$this->config['sy_logintime'],$user['did']);
			 
			//会员登录信息变更
			$ip       =  fun_ip_get();
			$upLogin  =  array(
				'login_ip'		=>	$ip,
				'login_date'	=> 	time(),
				'login_hits' 	=>	array('+', 1)
			);
			 
			$this->upInfo(array('uid'=>$user['uid']), $upLogin);

			if(!empty($user['usertype'])){
			    
			    require_once ('log.model.php');
			    $LogM = new log_model($this->db, $this->def);
			    //会员日志，记录登录
			    $loginType .= $LogM->LoginType($data);
			    $LogM->addMemberLog($user['uid'],$user['usertype'], $loginType);
			    
				$logtime					   	=		date('Ymd',$user['login_date']);
				$nowtime					   	=		date('Ymd',time());
				if($logtime!=$nowtime){
				    //登录积分
				    include_once ('integral.model.php');
				    $integralM  =  new integral_model($this->db, $this->def);	
					$integralM->invtalCheck($user['uid'],$user['usertype'],'integral_login','会员登录',22);
					//登录日志
					$logdata['uid']			=	$user['uid'];
					$logdata['usertype']	=	$user['usertype'];
					$logdata['did']			=	$user['did'];
					
					$LogM->addLoginlog($logdata, $data);
				}
				$resumeData = array('login_date'=>time());
				// 个人登录自动刷新简历
				if ($this->config['resume_sx'] == 1 && $user['usertype'] == 1) {
				 
				    $expect  =  $this->select_once('resume_expect',array('uid'=>$user['uid'],'defaults'=>1), '`id`');
				    if (empty($expect)){
				        $expect  =  $this->select_once('resume_expect',array('uid'=>$user['uid'],'orderby'=>'`id`'), '`id`');
				    }
				    if (!empty($expect)) {
				        $this->update_once('resume_expect', array('lastupdate'=>time()),array('id'=>$expect['id']));
				        $resumeData['lastupdate'] = time();

				        $LogM->addResumeSxLog(array('uid' => $user['uid'], 'resume_id' => $expect['id'], 'r_time' => time(), 'port' => $data['port'], 'ip' => fun_ip_get()));
				    }
				}
				// 同步登录时间
				$this->update_once('company', array('login_date' => time()), array('uid' => $user['uid']));
				$this->update_once('resume', $resumeData, array('uid' => $user['uid']));
			}
			
			if(empty($user['usertype'])){
				$return['errcode']			=		2;
				$return['msg']				=		'';
			}else if(!empty($_COOKIE['wxid'])){
				$cookie->setcookie('wxid','',time() - 86400);
				$return['msg']				=		'绑定成功，请按左上方返回进入微信客户端';
				$return['url']				=		Url('wap').'member/';
				$return['errcode']			=		9;
			}else if(!empty($data['job'])){
				$return['errcode']			=		9;
				$return['msg']				=		'';
				$return['url']				=		Url('wap',array('c'=>'job','a'=>'comapply','id'=>intval($data['job'])));
			}else if(!empty($data['checkurl'])){
				$return['errcode']			=		9;
				$return['msg']				=		'';
				$return['url']				=		$data['checkurl'];
			}else{
				
				if(!empty($data['backurl'])){
				    $return['url']		    =     	$data['backurl'];
				}else{
					if(!empty($data['num']) && $data['num']!=1 ){
					    if(!empty($data['referurl'])){
					        $return['url']  =     	$data['referurl'];
					    }else{
					        $return['url']  =     	$this->config['sy_weburl'].'/member/index.php';
					    }
					}else{
						$return['url']		=     	$_SERVER['HTTP_REFERER'];
					}
				}
				$return['errcode']		    =		9;
				$return['msg']				=		'登录成功';
			}
			if (!empty($return['url'])){
			    if (strpos($return['url'], 'register') !==false || strpos($return['url'], 'login') !==false || strpos($return['url'], 'setname') !==false || stripos($return['url'], 'forgetpw') !== false || ($return['url'] == $this->config['sy_weburl'] || $return['url'] == $this->config['sy_weburl'].'/') || $return['url'] == Url('wap')){
			        if ($data['source'] == 2){
						$return['url']  =  Url('wap',array(),'member');
					}else{
						$return['url']  =  $this->config['sy_weburl'].'/member/index.php';
					}
				}
			}
					
			return $return;
		}else{
			
			return array('msg'=>'用户名或密码不正确！','errcode'=>'8');
		}
		return $return;
	}

    /**
     * 手机登录，直接注册
     * @param String $moblie 未注册手机号登录，直接注册新会员
     * @return int[]
     */
	private function regUserByMobile($moblie, $data = array())
    {
		
		include_once ('company.model.php');
		include_once ('notice.model.php');
		require_once('cookie.model.php');

		$cookie		=	new cookie_model($this->db,$this->def);
		$noticeM	=	new notice_model($this->db, $this->def);
		$return		=	array('errcode'=>8);

		$usertype	=	0;
		$ip			=	fun_ip_get();
        $code       =   $data['password'];
		
        $CompanyM					=		new company_model($this->db, $this->def);
        $cert_arr					=		$CompanyM->getCertInfo(array('type' => '2', 'check' => $moblie,'orderby'=>'ctime,desc'));
        if (is_array($cert_arr)) {
            $checkTime 				= 		$noticeM->checkTime($cert_arr['ctime']);
            if($checkTime){
                $res 				= 		$code == $cert_arr['check2'] ? true : false;
                if($res == false){
                    return array('msg'=>'短信验证码错误！','errcode'=>'8');
                }
            }else {
                return array('msg'=>'验证码验证超时，请重新点击发送验证码！','errcode'=>'8');
            }
        }else {
            return array('msg'=>'验证码发送不成功，请重新点击发送短信验证码！','errcode'=>'8');
        }

		$data['username']	=	$moblie;

		$password			=	mt_rand(111111,999999);
			
		if($this->config['sy_uc_type']=="uc_center"){
			include APP_PATH.'data/api/uc/config.inc.php';
			include APP_PATH.'/api/uc/include/db_mysql.class.php';
			include APP_PATH.'/api/uc/uc_client/client.php';
			
			$ucusername = 	$data['username'];
			$ucemail	=	$ucinfo['UC_EMAIL'];
			 
			$uid 		=	uc_user_register($ucusername, $password, $ucemail);
		 
			list($uid,$username,$password,$email,$salt)	=	uc_user_login($ucusername,$password);
			$pass 		= 	md5(md5($password).$salt);

		}elseif($this->config['sy_pw_type']=='pw_center'){
			include(APP_PATH.'/api/pw_api/pw_client_class_phpapp.php');
			$email		=	'';
			$pw			=	new PwClientAPI($data['username'],$password,$email);
			$pwuid		=	$pw->register();
			$salt		=	substr(uniqid(rand()), -6);
			$pass		=	passCheck($password, $salt);
		}else{
			$salt		=	substr(uniqid(rand()), -6);
			$pass		=	passCheck($password, $salt);
		}

		if($_COOKIE['wxid']){
			$source	=	'9';
		}elseif($_SESSION['wx']['openid']){
			$source	=	'4';
		}elseif($_SESSION['qq']['openid']){
			$source	=	'8';
		}elseif($_SESSION['sina']['openid']){
			$source	=	'10';
		}elseif($data['source']){
			$source	=	$data['source'];
		}else{
			$source	=	1;
		}
		
		/* 生成uid */
		$adata['username']		=	$data['username'];
		$adata['password']		=	$pass;
		$adata['email']			=	'';
		$adata['moblie']		=	$moblie;
		$adata['moblie_status']	=	1;
		$adata['did']			=	!empty($data['did']) ? $data['did'] : $this->config['did'];
		$adata['status']		=	1;
		$adata['salt']			=	$salt;
		$adata['source']		=	$source;
		$adata['reg_date']		=	time();
		$adata['reg_ip']		=	$ip;
		$adata['qqid']			=	$_SESSION['qq']['openid'];
		$adata['sinaid']		=	$_SESSION['sina']['openid'];
		$adata['wxid']			=	$_SESSION['wx']['openid'];
		$adata['usertype']		=	0;		
		$userid		=	$this->insert_into('member',$adata);

		//  容错机制，防止插入表没返回UID
		if (!$userid){

            $user_id    =	$this->getInfo(array('username'=>$data['username']),array('field'=>'uid'));
            $userid     =	$user_id['uid'];
        }

		if($userid){

			$cookie->unset_cookie();
			
			if($this->config['sy_pw_type']=='pw_center'){
				$this->upInfo(array('pwuid'=>$pwuid),array('uid'=>$userid));
			}
			 
					
			if(checkMsgOpen($this -> config)){

				$noticeM->sendSMSType(array('name'=>$data['username'],'username'=>$data['username'],'password'=>$password,'moblie'=>$moblie,'type'=>'reg','uid'=>$userid,'port' => $data['port']));
			}
			
			 
			$this->upInfo(array('uid'=>$userid),array('login_date'=>time(),'login_ip'=>$ip));
			
			
			
		   	// 浏览器需要cookie
		    $cookie->add_cookie($userid,$data['username'],$salt,$data['email'],$pass,'',$this->config['sy_logintime'],$adata['did']);
			$return['msg']		=		'注册成功';
			$return['errcode']	=		1;
			return $return;
		}else{

			$return['msg']	=		'注册失败';
			$this -> addErrorLog('', 1,$return['msg']);
			$return['errcode']	=	8;
			return	$return;
		}
	}

    /**
     * 注册
     *
     * @param array $data   $data['uid']    $data['usertype']
     * @return mixed
     */
	public function userReg($data = array()){

		if($data['moblie']){
			$resume_info 				= 		$this->getUserInfo(array('telphone'=>$data['moblie'] , 'moblie_status'=>'1') , array('usertype'=>'1','field'=>'uid,name'));
			$company_info 				= 		$this->getUserInfo(array('linktel'=>$data['moblie'] , 'moblie_status'=>'1'),array('usertype'=>'2','field'=>'uid,name'));

			$m_info 					= 		$this->getInfo(array('moblie' => $data['moblie'], 'username' => array('=', $data['moblie'], 'OR')),array('field'=>'`uid`,`usertype`,`username`,`moblie`'));
		}elseif($data['email']){
			$resume_info 				= 		$this->getUserInfo(array('email'=>$data['email'] , 'moblie_status'=>'1') ,array('usertype'=>'1','field'=>'uid,name'));
			$company_info 				= 		$this->getUserInfo(array('linkmail'=>$data['email'] , 'moblie_status'=>'1') ,array('usertype'=>'2','field'=>'uid,name'));

			$m_info 					= 		$this->getInfo(array('email' => $data['email'], 'username' => array('=', $data['email'], 'OR')),array('field'=>'`uid`,`usertype`,`username`,`email`'));
		}
		
		if($resume_info){

			$rdata['name']				=		$resume_info['name'];
			$rdata['uid']				=		$resume_info['uid'];
			$rdata['usertype']			=		'1';
		}else if($company_info){

			$rdata['name']				=		$company_info['name'];
			$rdata['uid']				=		$company_info['uid'];
			$rdata['usertype']			=		'2';
		}else if($m_info){
			
			if($m_info['usertype']=='1'){

			    $info 					= 		$this->getUserInfo(array('uid'=>$m_info['uid']),array('usertype'=>'1','field'=>'name'));
				$rdata['name']			=		$info['name'];
			}else if($m_info['usertype']=='2'){

			    $info 					= 		$this->getUserInfo(array('uid'=>$m_info['uid']),array('usertype'=>'2','field'=>'name'));
				$rdata['name']			=		$info['name'];
			}
			
			$rdata['uid']				=		$m_info['uid'];
			$rdata['usertype']			=		$m_info['usertype'];
		}

		if($rdata!=null){

			$return['data']				=		$rdata;	
			return $return;
		}
		if($this->config['sy_web_mobile']!=''){

			$regnamer					=		@explode(';',$this->config['sy_web_mobile']);
			if(in_array($data['moblie'],$regnamer)){

				$return['errcode']		=		2;	
			}
		}
		$return['errcode']				=		0;	

		return $return;
	}

    /**
     * 注册
     * $data    处理的数据
     * @param array $data
     * @return int[]
     */
	public function userRegSave($data = array())
    {
		
		include_once ('notice.model.php');
		$noticeM	=	new notice_model($this->db, $this->def);

		$return		=	array('errcode'=>8);

		if($this->config['reg_user_stop']!=1){
			$return['msg']		=		'网站已关闭注册！';	
			$return['errcode']	=		8;
			return	$return;
		}
		 
		if(!empty($data['uid'])){
			$return['msg']		=		'您已经登录了！';	
			$return['errcode']	=		8;
			return 		$return;
		}
		
		$ip           			=  		 fun_ip_get();
		
		if($this->config['sy_reg_interval']>0){
		    
			$intervaltime    	=   	time() - 3600 * $this->config['sy_reg_interval'];
			
			$regnum          	=   	$this ->  getMemberNum(array('reg_ip' => $ip , 'reg_date' => array('>=', $intervaltime)));
			
			if($regnum){
				$return['errcode']			=		8;
				$return['msg']				=		'请勿频繁注册！';	

				return 		$return;
			}
		}

		//关闭用户名注册
		if($data['codeid']=='1' && $this->config['reg_user']!='1'){
		    
		    $return['msg']		=		'网站已关闭用户名注册！';	
			$return['errcode']	=		8;
			return		$return;
		}
		//关闭手机注册
		if($data['codeid']=='2' && $this->config['reg_moblie']!='1'){
		    
		    $return['msg']		=		'网站已关闭手机注册！';	
			$return['errcode']	=		8;
			return		$return;
		}
		//关闭邮箱注册
		if($data['codeid']=='3' && $this->config['reg_email']!='1'){
		    
		    $return['msg']		=		'网站已关闭邮箱注册！';	
			$return['errcode']	=		8;
			return		$return;
		}

		if ($this->config['sy_reg_type'] == 2) {

            if ($data['reg_type'] == 1) {

                if ($this->config['sy_resumename_num'] == 1) {

                    if (!$data['reg_name'] || !preg_match("/^[\x{4e00}-\x{9fa5}]{2,6}$/u", $data['reg_name'])) {

                        $return['msg'] = '姓名请输入2-6位汉字！';
                        $return['errcode'] = 8;
                        return $return;
                    }
                }
            } else if ($data['reg_type'] == 2) {

                $comNum = $this->select_num('company',array('name' => $data['reg_name']));

                if ((int)$comNum > 0) {
                    $return['msg']      =   '企业名称已存在！';
                    $return['errcode']  =   8;
                    return $return;
                }
            }
        }

		/* 用户名注册 */
        if ($data['codeid'] == '1') {

            $data['username']   =   str_replace('！', '!', $data['username']);
            $username           =   $data['username'];
            $msg                =   regUserNameComplex($username);//检测用户名复杂度

            if ($username == '') {

                $return['msg']  =   '用户名不能为空！';
            } elseif (CheckRegUser($username) == false && CheckRegEmail($username) == false) {

                $return['msg']  =   '用户名不得包含特殊字符！';
            } elseif ($msg != '') {

                $return['msg']  =   $msg;
            } else {

                $usernameNum    =   $this->getMemberNum(array('username' => $username));
                if ($usernameNum > 0) {
                    $return['msg'] = '用户名已存在，请重新输入！';
                }
            }

            if ($return['msg']) {
                $return['errcode']  =   8;
                return $return;
            }
        }

		/* 是否要输入手机号 */
        $needMobile     =   false;
        if ($data['codeid'] == 2) {
            $needMobile =   true;
        } else if ($this->config['reg_real_name_check'] == 1) {
            $needMobile =   true;
        }
        if ($needMobile) {
            if ($data['moblie'] == '') {
                $return['msg']  =   '手机号码不能为空！';
            } elseif (!CheckMobile($data['moblie'])) {
                $return['msg']  =   '手机格式错误！';
            } else {
                $moblieNum      =   $this->getMemberNum(array('moblie' => $data['moblie']));
                if ($moblieNum > 0) {
                    $return['msg']  =   '手机已存在！';
                }
            }
            if ($return['msg']) {
                $return['errcode']  =   8;
                return $return;
            }
        }

		/* 是否要输入email */
        $needEmail  =   false;
        if ($data['codeid'] == 3) {
            $needEmail  =   true;
        }
        if ($needEmail) {
            if ($data['email'] == '') {
                $return['msg'] = '邮箱不能为空';
            } elseif (CheckRegEmail($data['email']) == false) {
                $return['msg'] = '邮箱格式错误！';
            } else {
                $emailNum = $this->getMemberNum(array('email' => $data['email']));
                if ($emailNum > 0) {
                    $return['msg'] = '邮箱已存在，请重新输入！';
                }
            }
            if ($return['msg']) {
                $return['errcode'] = 8;
                return $return;
            }
        }

		/* 是否验证短信验证码 */
        $needMsg = false;

        if ($data['codeid'] == 2 && $this->config['sy_msg_regcode'] == '1') {
            $needMsg = true;
        } else if ($this->config['reg_real_name_check'] == 1) {
            $needMsg = true;
        }
        if ($needMsg) {

            $regCertMobile = $this->select_once('company_cert', array('type' => '2', 'check' => $data['moblie'], 'orderby' => 'ctime,desc'), '`check2`,`ctime`');
            $codeTime = $noticeM->checkTime($regCertMobile['ctime']);
            if ($data['moblie_code'] == '') {

                $return['msg'] = '短信验证码不能为空！';
                $return['errcode'] = 8;
                return $return;
            } elseif (!$codeTime) {

                $return['msg'] = '短信验证码验证超时，请重新点击发送验证码！';
                $return['errcode'] = 8;
                return $return;
            } elseif ($regCertMobile['check2'] != $data['moblie_code']) {

                $return['msg'] = '短信验证码错误！';
                $return['errcode'] = 8;
                return $return;
            } else {

                $adata['moblie_status'] = '1';
            }
        }

		/* 已通过短信验证，则不需要极验证、图片验证 */
        if ($data['wxapp'] != 1) {
            if (!$needMsg) {
                $result = $noticeM->jycheck($data['code'], '注册会员');
                if (!empty($result)) {
                    $return['msg'] = $result['msg'];
                    $return['errcode'] = 8;
                    return $return;
                }
            }
        }

		/* 手机注册和邮箱注册 */
        if ($data['codeid'] == '2') {
            $data['username'] = $data['moblie'];
        } elseif ($data['codeid'] == '3') {
            $data['username'] = $data['email'];
        }

        $password   =   $data['password'];

        $pwmsg      =   regPassWordComplex($password);//检测用户名复杂度
        /* 密码 */
        if ($data['password'] == '') {

            $return['msg'] = '密码不能为空！';
            $return['errcode'] = 8;
            return $return;
        } elseif (mb_strlen($data['password']) < 6 || mb_strlen($data['password']) > 20) {

            $return['msg'] = '密码长度应在6-20位！';
            $return['errcode'] = 8;
            return $return;
        } elseif ($pwmsg != '') {

            $return['msg'] = $pwmsg;
            $return['errcode'] = 8;
            return $return;
        }

		if($data['username']){
            $nid = $this->getMemberNum(array('username' => $data['username']));

            if ($nid) {
                $return['msg'] = '账户名已存在！';
                $return['errcode'] = 8;
                return $return;
            }

            if ($this->config['sy_uc_type'] == "uc_center") {
                include APP_PATH . 'data/api/uc/config.inc.php';
                include APP_PATH . '/api/uc/include/db_mysql.class.php';
                include APP_PATH . '/api/uc/uc_client/client.php';
                $ucusername = $data['username'];
                //没有邮箱的情况下使用默认邮箱
                if (!$_POST['email']) {
                    $ucemail = $ucinfo['UC_EMAIL'];
                } else {
                    $ucemail = $_POST['email'];
                }
                $uid = uc_user_register($ucusername, $_POST['password'], $ucemail);
                if ($uid <= 0) {
                    switch ($uid) {
                        case "-1":
                            $return['msg'] = '用户名不合法!';
                            break;
                        case "-2":
                            $return['msg'] = '包含不允许注册的词语!';
                            break;
                        case "-3":
                            $return['msg'] = '用户名已经存在!';
                            break;
                        case "-4":
                            $return['msg'] = 'Email 格式有误!';
                            break;
                        case "-5":
                            $return['msg'] = 'Email 不允许注册!';
                            break;
                        case "-6":
                            $return['msg'] = '该 Email 已经被注册!';
                            break;
                    }
                    $return['errcode'] = 8;
                    return $return;
                } else {
                    list($uid, $username, $password, $email, $salt) = uc_user_login($ucusername, $_POST['password']);
                    $pass = md5(md5($_POST['password']) . $salt);
                }
            } elseif ($this->config['sy_pw_type'] == 'pw_center') {
                include(APP_PATH . '/api/pw_api/pw_client_class_phpapp.php');
                $password = $data['password'];
                $email = $data['email'];
                $pw = new PwClientAPI($data['username'], $password, $email);
                $pwuid = $pw->register();
                $salt = substr(uniqid(rand()), -6);
                $pass = passCheck($password, $salt);
            } else {
                $salt = substr(uniqid(rand()), -6);
                $pass = passCheck($data['password'], $salt);
            }

            if (isset($_COOKIE['wxid'])) {
                $source = '9';
            } elseif (isset($_SESSION['wx']['openid'])) {
                $source = '4';
            } elseif (isset($_SESSION['qq']['openid'])) {
                $source = '8';
            } elseif (isset($_SESSION['sina']['openid'])) {
                $source = '10';
            } elseif (isset($data['source'])) {
                $source = $data['source'];
            } else {
                $source = 1;
            }
			
			/* 生成uid */
            $adata['username'] = $data['username'];
            $adata['password'] = $pass;
            $adata['email'] = $data['email'];
            $adata['moblie'] = $data['moblie'];
            $adata['did'] = !empty($data['did']) ? $data['did'] : $this->config['did'];
            $adata['status'] = 1;
            $adata['salt'] = $salt;
            $adata['source'] = $source;
            $adata['reg_date'] = time();
            $adata['reg_ip'] = $ip;
            $adata['qqid'] = $_SESSION['qq']['openid'];
            $adata['sinaid'] = $_SESSION['sina']['openid'];
            $adata['wxid'] = $_SESSION['wx']['openid'];

            //  小程序邀请注册
            $adata['regcode'] = isset($data['fromUser']) ? $data['fromUser'] : (int)$_COOKIE['regcode'];
            // 移动端，两种注册模式都可能会有第三方登录的参数
            if (isset($data['wxapp'])) {
                if (isset($data['bdopenid'])) {
                    $adata['bdopenid'] = $data['bdopenid'];
                }
                if (isset($data['app_wxid'])) {
                    $adata['app_wxid'] = $data['app_wxid'];
                }
                if (isset($data['wxopenid'])) {
                    $adata['wxopenid'] = $data['wxopenid'];
                }
                if (isset($data['unionid'])) {
                    $adata['unionid'] = $data['unionid'];
                }
                if (isset($data['qqid'])) {
                    $adata['qqid'] = $data['qqid'];
                }
                if (isset($data['qqunionid'])) {
                    $adata['qqunionid'] = $data['qqunionid'];
                }
            }
            // pc、wap注册来源是第三方登录的
            if (isset($data['reg_qq'])){
                
                $adata['qqid']      =   $data['reg_qq']['openid'];
                $adata['qqunionid'] =   $data['reg_qq']['unionid'];
            }elseif (isset($data['reg_weixin'])){
                
                $adata['wxid']      =   $data['reg_weixin']['openid'];  //  公众号openid
                
                $adata['unionid']   =   $data['reg_weixin']['unionid'];
                
            }elseif (isset($data['reg_sina'])){
                
                $adata['sinaid']    =   $data['reg_sina']['openid'];
            }
            // 两种注册模式下，注册时身份类型不同
            $adata['usertype']  =  $this->config['sy_reg_type'] == 2 ? $data['reg_type'] : 0;
         
			if (!empty($data['clientid'])){
			    $adata['clientid']     =  $data['clientid'];
			    $adata['deviceToken']  =  $data['deviceToken'];
			}
			// 绑定公众号的，增加绑定时间
			if (!empty($adata['wxid'])){
			    $adata['wxbindtime']=   time();
			}
			$userid		=	$this->insert_into('member',$adata);
			if (!$userid) {

                $uInfo  =   $this->getInfo(array('username' => $data['username']), array('field' => 'uid'));
                $userid =   $uInfo['uid'];
            }

			if($userid){

				if($this->config['sy_pw_type']=='pw_center'){
					$this->upInfo(array('pwuid'=>$pwuid),array('uid'=>$userid));
				}

				//邀请注册获得积分
				if(!empty($_COOKIE['regcode'])){
					$regMember	=	$this->select_once('member',array('uid'=>(int)$_COOKIE['regcode']),"`usertype`");
					if(!empty($regMember)){
					    include_once ('integral.model.php');
					    $IntegralM	=	new integral_model($this->db, $this->def);
						$IntegralM -> invtalCheck((int)$_COOKIE['regcode'],$regMember['usertype'], 'integral_invite_reg', '邀请注册', 23);
					}
				}
 

				/* 发送通知短信、邮件 */
				if($data['email']){
					$noticeM->sendEmailType(array('name'=>$data['username'],'username'=>$data['username'],'password'=>$data['password'],'email'=>$data['email'],'type'=>'reg','uid'=>$userid));
				}
				if(checkMsgOpen($this -> config)){

					$noticeM->sendSMSType(array('name'=>$data['username'],'username'=>$data['username'],'password'=>$data['password'],'moblie'=>$data['moblie'],'type'=>'reg','uid'=>$userid,'port' => $data['port']));
				}
				 
				$this->upInfo(array('uid'=>$userid),array('login_date'=>time(),'login_ip'=>$ip));

                $return['msg'] = '注册成功';
                $return['errcode'] = 1;

          

                require_once('cookie.model.php');
                $cookie = new cookie_model($this->db, $this->def);
                $cookie->unset_cookie();

                if ($this->config['sy_reg_type'] == 2) {

                    $cookie->add_cookie($userid, $data['username'], $salt, $data['email'], $pass, $data['reg_type'], $this->config['sy_logintime'], $this->config['did']);
                    $newResult  =   $this->addIdentInfo($userid, array('reg_name' => $data['reg_name'], 'reg_link' => $data['reg_link'], 'reg_type' => $data['reg_type'], 'source' => $data['source']));

                    $return['url']  =   $newResult['url'];
                    $return['reg_type'] =   $this->config['sy_reg_type'];
                }else {

                    $cookie->add_cookie($userid, $data['username'], $salt, $data['email'], $pass, '', $this->config['sy_logintime'], $this->config['did']);
                }
                

                return $return;
			}else{

                $this->addErrorLog('', 1, $return['msg']);

                $return['msg'] = '注册失败';
                $return['errcode'] = 8;
                return $return;
			}

		}else{
            $return['msg'] = '用户名不能为空！';
            $return['errcode'] = 8;
            return $return;
		}
	}

    /**
     * 选择身份直接注册账号，添加基本信息
     * @param $uid
     * @param array $data
     * @return mixed
     */
    private function addIdentInfo($uid, $data = array())
    {

        $usertype   =   $data['reg_type'];
        $user       =   $this->getInfo(array('uid' => intval($uid)), array('field' => '`uid`,`username`,`password`,`salt`,`email`,`moblie`,`moblie_status`,`email_status`,`did`,`login_date`'));

        //根据激活类型 生成对应信息表附表信息
        if ($usertype == '1') {

            $table = 'member_statis';
            $table2 = 'resume';

            $data1 = array('uid' => $user['uid']);

            $crm_uid = $this->getCrmUid(array('type' => '1'));

            $data2 = array(

                'uid' => $user['uid'],
                'name' => $data['reg_name'],
                'email' => $user['email'],
                'email_status' => $user['email_status'],
                'telphone' => $user['moblie'],
                'r_status' => 1,
                'moblie_status' => $user['moblie_status'],
                'crm_uid' => $crm_uid,
                'crm_time' => $crm_uid ? time() : '',
                'did' => !empty($user['did']) ? $user['did'] : $this->config['did'],
                'login_date' => time()
            );
        } elseif ($usertype == '2') {

            $table = 'company_statis';
            $table2 = 'company';

            require_once('rating.model.php');
            $ratingM = new rating_model($this->db, $this->def);

            $data1 = $ratingM->fetchRatingInfo(array('uid' => $user['uid']));
            $data1['uid'] = $user['uid'];
            $data1['did'] = $this->config['did'];
            $data2['uid'] = $user['uid'];
            $data2['name'] = $data['reg_name'];
            $data2['linkman'] = $data['reg_link'];
            $data2['linkmail'] = $user['email'];
            $data2['linktel'] = $user['moblie'];
            $data2['rating'] = $data1['rating'];
            $data2['rating_name'] = $data1['rating_name'];
            $data2['vipstime'] = $data1['vip_stime'];
            $data2['vipetime'] = $data1['vip_etime'];
            $data2['did'] = !empty($user['did']) ? $user['did'] : $this->config['did'];
            $data2['email_status'] = $user['email_status'];
            $data2['moblie_status'] = $user['moblie_status'];
            $data2['r_status'] = $this->config['com_status'];
            $data2['login_date'] = time();
            if ($this->config['sy_crm_duty'] == 1) {
                $crm_uid = $this->getCrmUid(array('type' => '2'));
            }

            if ($crm_uid) {
                $data2['crm_uid'] = $crm_uid;
                $data2['crm_time'] = time();
                $data2['release_time'] = 0;
            }
       	}

        if ($table) {

            require_once('log.model.php');
            $LogM = new log_model($this->db, $this->def);
            //容错机制 判断附表数据是否存在 不存在才作新增操作
            $existTable = $this->select_num($table, array('uid' => $user['uid']));

            if ($existTable < 1) {
                $this->insert_into($table, $data1);
                //会员注册插入会员日志
                $LogM->addMemberLog($user['uid'], $usertype, '用户:' . $user['username'] . '注册成功');

                //判断是否记录已发送
                require_once 'integral.model.php';
                $IntegralM = new integral_model($this->db, $this->def);
                $integralwhere['com_id'] = $user['uid'];
                $integralwhere['pay_remark'] = '注册赠送';
                $Interpay = $IntegralM->getInfo($integralwhere);

                if (empty($Interpay) && $usertype != 5) {

                    if ($this->config['integral_reg'] > 0) {
                        $IntegralM->company_invtal($user['uid'], $usertype, $this->config['integral_reg'], true, '注册赠送', true, 2, 'integral', 23);
                    }

                    if ($this->config['integral_login']) {
                        $IntegralM->invtalCheck($user['uid'], $usertype, 'integral_login', '会员登录', 22);
                    }

                    if ($this->config['integral_mobliecert'] && $user['moblie_status'] == 1) {
                        $IntegralM->invtalCheck($user['uid'], $usertype, 'integral_mobliecert', '手机绑定');
                    }
                }
            }
            //会员日志，记录手动登录
            $LogM->addMemberLog($user['uid'], $usertype, '用户选择身份成功');
            // 登录日志
            $logdata['uid'] = $user['uid'];
            $logdata['usertype'] = $usertype;
            $logdata['did'] = $user['did'];
            // 增加来源
            if (isset($data['provider'])){
                $user['provider'] = $data['provider'];
            }
            if (isset($data['source'])){
                $user['source'] = $data['source'];
            }
            $LogM->addLoginlog($logdata, $user);
        }
        $existTable2 = $this->select_num($table2, array('uid' => $user['uid']));
        if ($existTable2 < 1) {
            $this->insert_into($table2, $data2);           
        }

        if ($usertype == 1) {

            if ($data['source'] == 1) {

                $return['url'] = Url('member', array('c' => 'expect', 'act' => 'add'));
            } elseif ($data['source'] == 2) {

                $return['url'] = Url('wap') . 'member/index.php?c=addresume';
            }

        } else {

            if ($data['source'] == 1) {

                $return['url'] = Url('member', array('c' => 'info'));
            } else {

                $return['url'] = Url('wap') . 'member/index.php?c=info';
            }
        }

        return $return;
    }
    

	function insertMember($data=array()){
	   
	    $nid	=	$this->insert_into('member', $data);
	    return $nid;
	}
	
	/**
	 * @desc   注册成功，选择身份
	 * @param  array $data
	 * @return array $return
	 */
	function upUserType($data = array())
    {
        $uid        =   intval($data['uid']);

        $usertype   =   intval($data['usertype']);

        if (in_array($usertype, array('1', '2'))) {
            
            $user   =   $this->getInfo(array('uid' => $uid), array('field' => '`uid`,`username`,`email_status`,`moblie_status`,`password`,`salt`,`email`,`moblie`,`did`'));
            
            $return =   array();
            
            if ($user['uid']) {
                // 增加来源
				if (isset($data['provider'])){
				    $user['provider'] = $data['provider'];
				}
				if (isset($data['iswap'])) {
				    $user['source'] = 2;
				}
            	$this -> activUser($user['uid'], $usertype, $user);
                
            	if (!isset($data['wxapp'])) {
                    // PC/WAP，重设cookie
                    $cookie = new cookie_model($this->db, $this->def);
                    $cookie->unset_cookie();
                    $cookie->add_cookie($user['uid'],$user['username'],$user['salt'],$user['email'],$user['password'],$usertype,$this->config['sy_logintime'],$user['did']);
                }
                
                if (isset($data['iswap'])) {
                    
                    if ($usertype == 1) {
                    
                        $return['url'] = Url('wap').'member/index.php?c=addresume';
                    } else {
                        
                        $return['url'] = Url('wap').'member/index.php?c=info';
                    }
                    
                } else {

                    if ($usertype == 1) {
                        
                        $return['url'] = Url('member', array('c' => 'expect', 'act' => 'add'));
                    } else {
                        
                        $return['url'] = Url('member', array('c' => 'info'));
                    }
                }

                $return['errcode']  =   1;
                
                // uni-app 需要token
                if (isset($data['wxapp'])) {
                    
                    $token  		=   md5($user['username'].$user['password'].$user['salt'].$usertype);
                    
                    $return['user'] =   array('uid' => $uid, 'usertype' => $usertype, 'token' => $token);
                }
            } else {
                
                $return['msg']      =   '请先注册';
                $return['errcode']  =   9;
            }
        } else {

            $return['msg']      =   '参数错误，请正确选择！';
            $return['errcode']  =   9;
        }

        return $return;
    }

    /**
     * 选择身份
     * @param $uid
     * @param $usertype
     * @param array $user
     */
    public function activUser($uid, $usertype, $user = array())
    {

        $this->upInfo(array('uid' => intval($uid)), array('usertype' => $usertype));

        if (empty($user)) {
            $user   =   $this->getInfo(array('uid' => intval($uid)), array('field' => '`uid`,`username`,`password`,`salt`,`email`,`moblie`,`moblie_status`,`email_status`,`did`,`login_date`'));
        }

        //根据激活类型 生成对应信息表附表信息
        if ($usertype == '1') {

            $table  =   'member_statis';
            $table2 =   'resume';

            $data1  =   array('uid' => $user['uid']);

            $crm_uid=   $this->getCrmUid(array('type' => '1'));

            $data2  =   array(

                'uid' => $user['uid'],
                'email' => $user['email'],
                'email_status' => $user['email_status'],
                'telphone' => $user['moblie'],
                'r_status' => 1,
                'moblie_status' => $user['moblie_status'],
                'crm_uid' => $crm_uid,
                'crm_time' => $crm_uid ? time() : '',
                'did' => !empty($user['did']) ? $user['did'] : $this->config['did'],
                'login_date' => time()
            );
        } elseif ($usertype == '2') {

            $table = 'company_statis';
            $table2 = 'company';

            require_once('rating.model.php');
            $ratingM = new rating_model($this->db, $this->def);

            $data1 = $ratingM->fetchRatingInfo(array('uid' => $user['uid']));
            $data1['uid'] = $user['uid'];
            $data1['did'] = $this->config['did'];
            $data2['uid'] = $user['uid'];
            $data2['linkmail'] = $user['email'];
            $data2['linktel'] = $user['moblie'];
            $data2['rating'] = $data1['rating'];
            $data2['rating_name'] = $data1['rating_name'];
            $data2['vipstime'] = $data1['vip_stime'];
            $data2['vipetime'] = $data1['vip_etime'];
            $data2['did'] = !empty($user['did']) ? $user['did'] : $this->config['did'];
            $data2['email_status'] = $user['email_status'];
            $data2['moblie_status'] = $user['moblie_status'];
            $data2['r_status'] = $this->config['com_status'];
            $data2['login_date'] = time();
            if ($this->config['sy_crm_duty'] == 1) {
                $crm_uid = $this->getCrmUid(array('type' => '2'));
            }


            if ($crm_uid) {
                $data2['crm_uid'] = $crm_uid;
                $data2['crm_time'] = time();
                $data2['release_time']  =   0;
            }
        } 

        if ($table) {

            require_once('log.model.php');
            $LogM = new log_model($this->db, $this->def);
            //容错机制 判断附表数据是否存在 不存在才作新增操作
            $existTable = $this->select_num($table, array('uid' => $user['uid']));

            if ($existTable < 1) {
                $this->insert_into($table, $data1);
                //会员注册插入会员日志
                $LogM->addMemberLog($user['uid'], $usertype, '用户:' . $user['username'] . '注册成功');

                //判断是否记录已发送
                require_once 'integral.model.php';
                $IntegralM = new integral_model($this->db, $this->def);
                $integralwhere['com_id'] = $user['uid'];
                $integralwhere['pay_remark'] = '注册赠送';
                $Interpay = $IntegralM->getInfo($integralwhere);

                if (empty($Interpay)) {

                    if ($this->config['integral_reg'] > 0) {
                        $IntegralM->company_invtal($user['uid'], $usertype, $this->config['integral_reg'], true, '注册赠送', true, 2, 'integral', 23);
                    }

                    if ($this->config['integral_login']) {
                        $IntegralM->invtalCheck($user['uid'], $usertype, 'integral_login', '会员登录', 22);
                    }

                    if ($this->config['integral_mobliecert'] && $user['moblie_status'] == 1) {
                        $IntegralM->invtalCheck($user['uid'], $usertype, 'integral_mobliecert', '手机绑定');
                    }
                }
            }
            //会员日志，记录手动登录
            $LogM->addMemberLog($user['uid'], $usertype, '用户选择身份成功');
            // 登录日志
            $logtime = date('Ymd', $user['login_date']);
            $nowtime = date('Ymd', time());
            if ($logtime != $nowtime) {
                $logdata['uid'] = $user['uid'];
                $logdata['usertype'] = $usertype;
                $logdata['did'] = $user['did'];
                $LogM->addLoginlog($logdata, $user);
            }
        }
        $existTable2 = $this->select_num($table2, array('uid' => $user['uid']));
        if ($existTable2 < 1) {
            $this->insert_into($table2, $data2);
            
        }
    }

    /**
     * @desc 企业 / 个人注册，查询CRM信息绑定
     * @param array $data
     * @return mixed
     */
	public function getCrmUid($data = array()) {
	    
	    if ($data['city'] == 1) {
	        
	        $crmWhere                      =   array();
	        $crmWhere['is_crm']            =   '1';
	        $crmWhere['status']            =   '1';
	        $crmWhere['PHPYUNBTWSTART_A']  =   '';
	        $crmWhere['crm_city'][]        =   array('findin', $data['provinceid'], 'OR');
	        $crmWhere['crm_city'][]        =   array('findin', $data['cityid'], 'OR');
	        if ($data['three_cityid']) {
	            $crmWhere['crm_city'][]    =   array('findin', $data['three_cityid'], 'OR');
	        }
	        $crmWhere['PHPYUNBTWEND_A']    =   '';
	        $crmWhere['orderby']           =   'uid';


	        $crms   =	$this -> select_all('admin_user', $crmWhere, '`uid`');

        } else {

            $day    =    date('w') ==0 ? 7 : date('w');
            $crms   =	$this -> select_all('admin_user', array('is_crm' => 1, 'status' => 1, 'crm_duty' => array('findin', $day), 'orderby' => 'uid'), '`uid`');
        }
        
	    
	    if (is_array($crms)) {
	        
	        foreach ($crms as $k => $v){
	            
	            $CrmUid[$v['uid']] =   $k + 1;
	            $CrmK[$k]          =   $v['uid'];
	        }

	        if ($data['type'] == '1') {

	            $endCrm =   $this->select_once('resume', array('crm_uid' => array('>', 0), 'orderby' => 'uid, desc'), '`crm_uid`');
	        }elseif ($data['type'] == '2'){

                $sql    =   "SELECT `crm_uid` FROM ".DEF_DATA."company LEFT JOIN ".DEF_DATA."member ON ".DEF_DATA."company.uid = ".DEF_DATA."member.uid WHERE ".DEF_DATA."member.source <> 16 AND ".DEF_DATA."company.crm_uid > 0 ORDER BY ".DEF_DATA."company.uid DESC LIMIT 1;";

	            $endCrm =   $this->DB_query_all($sql, 'one');
	        }

	        if (!$CrmUid[$endCrm['crm_uid']]) {

	            $CrmUid[$endCrm['crm_uid']]    =   0;
	        }
	        if ($CrmUid[$endCrm['crm_uid']] >= count($crms)){

	            $crm_uid    =  $CrmK[0];
	        }else{

	            $crm_uid    =  $CrmK[$CrmUid[$endCrm['crm_uid']]];
	        }
	    }

	    return  $crm_uid;
    }

	//快捷登录信息绑定
	public function bindUser($username,$password,$bindinfo){
			
		if($username && $password){

			$userinfo 		= 	$this->select_once('member',array('username'=>$username));
			
			if(!$userinfo && CheckMobile($username)){//手机号登录

				$user 		= 	$this->select_once('member',array('moblie'=>$username),'username,usertype,password,uid,usertype,salt,status,did,login_date');

				$binding	=	$this->getUserInfo(array('uid'=>$user['uid'],'moblie_status'=>1),array('usertype'=>$user['usertype'],'field'=>'uid'));

				if(!empty($binding)){
					$userinfo	= 	$user;
				}
			}
			if(!$userinfo&&CheckRegEmail($username)){//邮箱登录

				$user 		= 	$this->select_once('member',array('email'=>$username),'username,usertype,password,uid,usertype,salt,status,did,login_date');
				
				$binding	=	$this->getUserInfo(array('uid'=>$user['uid'],'email_status'=>1),array('usertype'=>$user['usertype'],'field'=>'uid'));
				
				if(!empty($binding)){
					$userinfo 	= 	$user;
				}
			}
			if(!empty($userinfo)){
				
				$res = passCheck($password,$userinfo['salt']) == $userinfo['password'] ? true : false;
				if($res){
					if($userinfo['status']=='1'){
						//开始绑定操作
						if($bindinfo['qqid']){
							$sqlBind['qqid']		=	$bindinfo['qqid'];
							$sqlBind['qqunionid']	=	$bindinfo['qqunionid'];
						}
						if($bindinfo['sinaid']){
							$sqlBind['sinaid']		=	$bindinfo['sinaid'];
						}
						if($bindinfo['wxid']){
							$sqlBind['wxid']		=	$bindinfo['wxid'];
							$sqlBind['unionid']		=	$bindinfo['wxunionid'];
							$sqlBind['wxbindtime']  =   time();
						}
						if($sqlBind){
							$this->update_once('member',$sqlBind,array('uid'=>$userinfo['uid']));
							$error['info'] 	= $userinfo;
							$error['error'] = '1';
						}else{
							$error['msg'] = '绑定失败！';
						}
					}else{
						$error['msg'] = '该账户正在审核中，请稍后再绑定';
					}
				}else{
					$error['msg'] = '密码错误，请重试！';
				}
			}else{
				$error['msg'] = '请输入正确的账户名！';
			}
		}else{
			$error['msg'] = '请输入需要绑定的账户、密码！';
		}
		return $error;
	}
	
	function upMemberInfo($uData=array(),$setData=array()){
        if (! empty($setData)) {

            $result =   $this -> addMemberCheck($setData, $uData['uid'], $uData['usertype']);

            if ($result['msg']) {

                $result['errcode']  =   8;

                $result['url']      =   $_SERVER['HTTP_REFERER'];

                return $result;
            }
            if (!empty($setData['did'])){
                $result['did']  =   $setData['did'];
            }
            $result['reg_ip']   =   $setData['reg_ip'];
            
            if($setData['utype'] == 'admin'){
                
                $result['moblie']   =   $result['moblie'] ? $result['moblie'] : $setData['moblie'];
                $result['email']    =   $result['email'] ? $result['email'] : $setData['email'];
            }
            $nid    =   $this->upInfo(array('uid' => $uData['uid']), $result);

            if ($nid) {
              
 
                if ($setData['utype'] == 'admin') {
                    
                    if ($result['moblie']) {
                        
                        $this -> update_once('resume', array('moblie_status'=>'0', 'telphone'=>''), array('telphone'=>$result['moblie'], 'uid'=>array('<>',$uData['uid'])));
                        
                        $this -> update_once('company', array('moblie_status'=>'0', 'linktel'=>''), array('linktel'=>$result['moblie'], 'uid'=>array('<>',$uData['uid'])));
                    }
                  
                    if ($result['email']) {
                        
                        $this -> update_once('resume',array('email_status'=>'0', 'email'=>''), array('email'=>$result['email'],'uid' =>array('<>',$uData['uid'])));
                        $this -> update_once('company',array('email_status'=>'0', 'linkmail'=>''), array('linkmail'=>$result['email'],'uid' =>array('<>',$uData['uid'])));
                    }
                    

                    $this -> update_once('resume', array('telphone' => $result['moblie'], 'email' => $result['email']), array('uid' => $uData['uid']));

                    $this -> update_once('company', array('linktel' => $result['moblie'], 'linkmail' => $result['email']), array('uid' => $uData['uid']));

                }
            } 

            $result['msg']      =   $nid ? '修改成功！' : '修改失败！';

            $result['errcode']  =   $nid ? 9 : 8;

            $lasturl            =   str_replace('&amp;', '&', $uData['lasturl']);

            $result['url']      =   $lasturl;

            return $result;
        }
    }
	
	function delMember($del){

        if (!empty($del)) {
            
            $return =   array();
            
            if (is_array($del)) {

                $delid = pylode(',', $del);

                $return['layertype'] = 1;
            } else {

                $return['layertype'] = 0;
                $delid = $del;
            }
		 
            $resume = $this->select_all('resume', array('uid' => array('in', $delid)), '`uid`');
            if (is_array($resume) && $resume) {
                foreach ($resume as $v) {
                    if ($v['uid']) {
                        $rids[] = $v['uid'];
                    }
                }
            }
 
            
            $company = $this->select_all('company', array('uid' => array('in', $delid)), '`uid`');
            if (is_array($company) && $company) {
                foreach ($company as $v) {
                    if ($v['uid']) {
                        $comids[] = $v['uid'];
                    }
                }
            }

             

			$result	=	$this->delete_all('member', array('uid' => array('in', $delid)),'');
			
			if($result){
				if (is_array($rids) && !empty($rids)) {
					$result	=	$this->delUser(pylode(',', $rids));
				}
				if (is_array($comids) && !empty($comids)) {
					$result	=	$this->delCom(pylode(',', $comids));
				}
				 
			}
            $return['errcode']  =   $result ? 9 : 8;
            $return['msg']      =   $result ? '会员删除成功' : '会员删除失败';
            
        } else {
            
            $return['msg']      =   '请选择您要删除的会员';
            $return['errcode']  =   '8';
        }
        return $return;
    }

    /**
     * 第三方登录绑定账号
     * @param array $data
     * @param string $type
     * @return array|string[]
     */
	function bindacount($data = array(),$type='')
    {

	    $username   =  $data['username'];
	    $return     =  array('msg'=>'系统繁忙','errcode'=>8);

	    require ('notice.model.php');
	    $noticeM    =  new notice_model($this->db, $this->def);

	    //会员已登录判断
	    if(!empty($data['uid'])  && $data['uid'] > 0 && $username!=''){

	        if($data['usertype']=='1'){
	            return array('msg'=>'您现在是个人会员登录状态!');
	        }elseif($data['usertype']=='2'){
	            return array('msg'=>'您现在是企业会员登录状态!');
	        }
	    }
	    //验证码判断
	    if(!isset($data['provider'])){

	        $result =   $noticeM->jycheck($data['authcode'],'前台登录');
	        if(!empty($result)){
	            return array('msg'=>$result['msg'],'errcode'=>'8');
	        }
	    }
	    
	    if(CheckRegUser($username)==false && CheckRegEmail($username)==false && ($username!='')){
	        return array('msg'=>'用户名包含特殊字符或为空!','errcode'=>'8');
	    }
	    
	    $where  =  array('username'=> $username);
	    
	    if(CheckMobile($username)){

	        $where['PHPYUNBTWSTART']	=	'OR';
	        $where['moblie']		    =	$username;
	        $where['moblie_status']	    =	1;
	        $where['PHPYUNBTWEND']	    =	'';
	    }
	    //邮箱登录
	    if(CheckRegEmail($username)){
	        
	        $where['PHPYUNBTWSTART']	=	'OR';
	        $where['email']		        =	$username;
	        $where['email_status']	    =	1;
	        $where['PHPYUNBTWEND']	    =	'';
	    }
	    
	    $user  =  $this->getInfo($where);
	    
	    if (!empty($user)){

	        if($user['status']=='2'){
	            return array('msg'=>'您的账号已被锁定!','errcode'=>'8','url'=>Url('register',array('c'=>'ok','type'=>2),'1'));
	        }
	        //普通密码校验
	        $res  =  passCheck($data['password'],$user['salt'],$user['password']);
	        
	        if($res){

	            //cookie设置
	            if (!isset($data['provider'])){
	                
	                require_once('cookie.model.php');
	                $cookie  =  new cookie_model($this->db,$this->def);
	                $cookie->unset_cookie();
	                $cookie->add_cookie($user['uid'],$user['username'],$user['salt'],$user['email'],$user['password'],$user['usertype'],$this->config['sy_logintime'],$user['did']);
	            }
	            //会员登录信息变更
	            $ip       =  fun_ip_get();
	            $upLogin  =  array(
	                'login_ip'=>$ip,
	                'login_date'=> time(),
	                'login_hits' => array('+', 1)
	            );
	            if (isset($data['provider'])){
	                if (!empty($data['clientid'])){
	                    $upLogin['clientid']     =  $data['clientid'];
	                    $upLogin['deviceToken']  =  $data['deviceToken'];
	                    //清除其他账号clientid
	                    $this->clearPushId($data['clientid'], $user['uid']);
	                }
	            }
	            if($type=='weixin'){
	                if (isset($data['provider'])){
	                    if ($data['provider'] == 'app'){
	                        $upLogin['app_wxid']  =  !empty($data['openid']) ? $data['openid'] : '';
	                    }else{
	                        $upLogin['wxopenid']  =  !empty($data['openid']) ? $data['openid'] : '';
	                    }
	                }else{
	                    $upLogin['wxid']  =  !empty($data['openid']) ? $data['openid'] : '';
	                    $upLogin['wxbindtime'] = time();
	                }
	                $upLogin['unionid']   =  !empty($data['unionid']) ? $data['unionid'] : '';
	                
	            }elseif ($type == 'qq'){
	                
	                $upLogin['qqid']       =  !empty($data['openid']) ? $data['openid'] : '';
	                $upLogin['qqunionid']  =  !empty($data['unionid']) ? $data['unionid'] : '';
	                
	            }elseif ($type == 'sinaweibo'){
	                
	                $upLogin['sinaid']  =  !empty($data['openid']) ? $data['openid'] : '';
	            }elseif ($type=="baidu"){
	                $upLogin['bdopenid']  =  !empty($data['openid']) ? $data['openid'] : '';
	            }
	            $this->upInfo(array('uid'=>$user['uid']), $upLogin);
	            
	            if(!empty($user['usertype'])){

	                //  同步登录时间
                    $this->update_once('company', array('login_date' => time()), array('uid' => $user['uid']));
                    $this->update_once('resume', array('login_date' => time()), array('uid' => $user['uid']));

	                //登录日志
	                if ($type=='weixin'){
	                    
	                    $state_content  =  $data['source'] == 1 ? 'PC绑定微信' : 'wap绑定微信';
	                }elseif ($type=='qq'){
	                    
	                    $state_content  =  $data['source'] == 1 ? 'PC绑定QQ' : 'wap绑定QQ';
	                }elseif ($type=='sinaweibo'){
	                    
	                    $state_content  =  $data['source'] == 1 ? 'PC绑定新浪微博' : 'wap绑定新浪微博';
	                }
	                //会员日志，记录手动登录
					require_once ('log.model.php');
					$LogM = new log_model($this->db, $this->def);
					$LogM->addMemberLog($user['uid'],$user['usertype'], $state_content. '登录成功');
					
	                $logtime					   	=		date('Ymd',$user['login_date']);
	                $nowtime					   	=		date('Ymd',time());
	                if($logtime!=$nowtime){
	                    
	                    //登录积分
	                    include_once ('integral.model.php');
	                    $integralM  =  new integral_model($this->db, $this->def);
	                    $integralM->invtalCheck($user['uid'],$user['usertype'],'integral_login','会员登录',22);
	                    
	                    // 登录日志
	                    $logdata['content']		=	$state_content;
	                    
	                    $logdata['uid']			=	$user['uid'];
	                    $logdata['usertype']	=	$user['usertype'];
	                    $logdata['did']			=	$user['did'];
	                    
	                    $LogM->addLoginlog($logdata);
	                }
	            }
	            
	            if(empty($user['usertype'])){
	                $return['errcode']			=		2;
	                $return['msg']				=		'';
	            }else{
	                
	                $return['errcode']		    =		9;
	                $return['msg']				=		'登录成功';
	            }
	            
	            if (isset($data['source'])){
	                // wap、pc所需跳转地址
	                if ($data['source'] == 2){
	                    $return['url']  =  Url('wap',array(),'member');
	                }elseif ($data['source'] == 1){
	                    $return['url']  =  $this->config['sy_weburl'].'/member/index.php';
	                }
	            }
	             
	            
	            return $return;
	        }else{
	            
	            return array('msg'=>'用户名或密码不正确！','errcode'=>'8');
	        }
	    }else{
	        return array('msg'=>'用户名或密码不正确！','errcode'=>'8');
	    }
	    return $return;
	}

    /**
     * 微信/QQ等直接登录注册
     * @param array $data
     * @param string $type
     * @param string $provider
     * @return mixed
     */
	function fastReg($data = array(), $type = '', $provider = 'weixin')
	{

	    // 微信小程序和百度小程序不需要验证
	    if($type != 'wxxcx' && $data['moblie']!=''){

	        // 验证手机号
			if(!CheckMobile($data['moblie'])){

				$return['msg']			=		'手机格式错误！';	
			}else{
                //检查手机号是否已存在 如果存在则直接绑定
				$mobileUser =   $this -> getInfo(array('moblie' => $data['moblie']));
			}
			
			if($return['msg']){
				$return['errcode']		=		8;
				return 		$return;
			}
			$regCertMobile				=   	$this->select_once('company_cert',array('type' => '2', 'check' => $data['moblie'],'orderby'=>'ctime,desc'), '`check2`,`ctime`');
		    
			include_once ('notice.model.php');
			$noticeM	=	new notice_model($this->db, $this->def);
			
			$codeTime					=		$noticeM->checkTime($regCertMobile['ctime']);
			
			if($data['moblie_code']==''){

				$return['msg']			=		'短信验证码不能为空！';
				$return['errcode']		=		8;
				return  $return;
			}elseif(!$codeTime){

				$return['msg']			=		'短信验证码验证超时，请重新点击发送验证码！';
				$return['errcode']		=		8;
				return  $return;
			}elseif($regCertMobile['check2']!=$data['moblie_code']){

				$return['msg']			=		'短信验证码错误！';
				$return['errcode']		=		8;
				return  $return;
			}
			if($this->config['sy_msg_regcode']=='1' || $type != ''){
				$needMsg 				= 		true;
			}
			if(!$needMsg){
    			
    			$result				    =		$noticeM->jycheck($data['code'],'前台登录');

    			if(!empty($result)){
    				
    				$return['msg']	    =		$result['msg'];
    				$return['errcode']  =		8;
    				return  $return;
    			}
    		}
		}
		if(!empty($mobileUser['uid'])){
		    //直接绑定该账户
		    if($mobileUser['status']=='2'){

			    $return['msg']		    =		'当前手机号对应账户已被锁定！';
    			$return['errcode']		=		8;
		    }else{
		        
		        if ($provider == 'weixin'){
    	        
        	     
    	            $mdata['wxid']  =  !empty($data['openid']) ? $data['openid'] : '';
    	            $mdata['wxbindtime'] = time();
    	            $loginType      = '微信公众号';
        	         
        	        $mdata['unionid']   =  !empty($data['unionid']) ? $data['unionid'] : '';
        	        
        	    }elseif ($provider == 'qq'){
        	        
        	        $mdata['qqid']      =  !empty($data['openid']) ? $data['openid'] : '';
        	        $mdata['qqunionid'] =  !empty($data['unionid']) ? $data['unionid'] : '';
        	        $loginType          = 'QQ';
        	        
        	    }elseif ($provider == 'sinaweibo'){
        	        
        	        $mdata['sinaid']    =  !empty($data['openid']) ? $data['openid'] : '';
        	        $loginType          = 'weibo';
        	    }
        	    
        	    //更新登录信息
				
				$ip						=	fun_ip_get();
				$mdata['login_ip']		=	$ip;
				$mdata['login_date']	=	time();
				$mdata['login_hits']	=	array('+', 1);

				//更新绑定 登录信息
        	    $this->upInfo(array('uid'=>$mobileUser['uid']),$mdata);	
				
				if(!empty($mobileUser['usertype'])){

                    //  同步登录时间
                    $this->update_once('company', array('login_date' => time()), array('uid' => $mobileUser['uid']));
                    $this->update_once('resume', array('login_date' => time()), array('uid' => $mobileUser['uid']));

                    //会员日志，记录手动登录
				    require_once ('log.model.php');
				    $LogM = new log_model($this->db, $this->def);
				    $LogM->addMemberLog($mobileUser['uid'],$mobileUser['usertype'], $loginType. '绑定账号短信登录成功');
				    
					$logtime					   	=		date('Ymd',$mobileUser['login_date']);
					$nowtime					   	=		date('Ymd',time());
					if($logtime!=$nowtime){
					    //登录积分
					    require_once ('integral.model.php');
					    $IntegralM 	= 	new integral_model($this -> db, $this -> def);
					    $IntegralM->invtalCheck($mobileUser['uid'],$mobileUser['usertype'],'integral_login','会员登录',22);
					    //登录日志
					    $logdata['uid']			=	$mobileUser['uid'];
					    $logdata['usertype']	=	$mobileUser['usertype'];
					    $logdata['did']			=	$mobileUser['did'];
					    
					    $LogM->addLoginlog($logdata, array('provider'=>$provider));
					}
				}

        	    if ($type == ''){
    	            // 非小程序/APP
    	            require_once('cookie.model.php');
    	            $cookie  =  new cookie_model($this->db,$this->def);
    	            $cookie->unset_cookie();
    	            $cookie->add_cookie($mobileUser['uid'], $mobileUser['username'], $mobileUser['salt'], $mobileUser['email'], $mobileUser['password'], $mobileUser['usertype'], $this->config['sy_logintime'], $mobileUser['did']);
    	         
    	        
    	        }
    	        
    	        $return['msg']		    =  '账户绑定成功！';
    	        $return['errcode'] 	    =  9;
    	        if ($type != ''){
    	            
    	        	$return['error']    = 1;
    	        }
		    }
		}else{
		    $ip     =  fun_ip_get();
    	    $time   =  time();
    	    $salt   =  substr(uniqid(rand()),-6);
    	    $rand   =  mt_rand(111111,999999);
    	    // 处理用户名
    	    if (!empty($data['moblie'])){
    	        
    	        $username       =  $data['moblie'];
    	    }else{
    	        
    	        if ($provider == 'weixin'){
    	            
    	            $username   =  'wxid_'.$time.$rand;
    	        }elseif ($provider == 'qq'){
    	            
    	            $username   =  'qqid_'.$time.$rand;
    	        }elseif ($provider == 'sinaweibo'){
    	            
    	            $username   =  'sinaid_'.$time.$rand;
    	        }
    	    }
    	    
    	    $mdata  =  array(
    	        'username'       =>  $username,
    	        'password'       =>  passCheck($rand,$salt),
    	        'salt'           =>  $salt,
    			'moblie'         =>  !empty($data['moblie']) ? $data['moblie'] : '',
    	        'moblie_status'  =>  !empty($data['moblie']) ? 1 : 0,
    	        'usertype'       =>  0,
    	        'reg_date'       =>  $time,
    	        'reg_ip'         =>  $ip,
    	        'login_date'     =>  $time,
    	        'login_ip'       =>  $ip,
    	        'status'         =>  1,
    	        'source'         =>  $data['source'],
    	        'clientid'       =>  !empty($data['clientid']) ? $data['clientid'] : '',
    	        'deviceToken'    =>  !empty($data['deviceToken']) ? $data['deviceToken'] : '',
    	        'did'            =>  $this->config['did']
    	    );
    	    if ($provider == 'weixin'){
    	        
    	      
    	            $mdata['wxid']  =  !empty($data['openid']) ? $data['openid'] : '';
    	            $mdata['wxbindtime'] = time();
    	         
    	        $mdata['unionid']   =  !empty($data['unionid']) ? $data['unionid'] : '';
    	        
    	    }elseif ($provider == 'qq'){
    	        
    	        $mdata['qqid']       =  !empty($data['openid']) ? $data['openid'] : '';
    	        $mdata['qqunionid']  =  !empty($data['unionid']) ? $data['unionid'] : '';
    	        
    	    }elseif ($provider == 'sinaweibo'){
    	        
    	        $mdata['sinaid']  =  !empty($data['openid']) ? $data['openid'] : '';
    	    }
    	    $userid  =  $this->insert_into('member', $mdata);
    	    
    	    if ($userid){
    	        
    	        
    	        if ($type == ''){
    	            // 非小程序/APP
    	            require_once('cookie.model.php');
    	            $cookie  =  new cookie_model($this->db,$this->def);
    	            $cookie->unset_cookie();
    	            $cookie->add_cookie($userid, $mdata['username'], $salt, '', $mdata['password'], '', $this->config['sy_logintime'], $mdata['did']);
    	        
    	        }
    	        
    	        $return['msg']		=  '注册成功';
    			
    			$return['errcode'] 	=   9;
    	        if($type != ''){
    	        	$return['error']=   1;
    	        }
    	        
    	        $return['uid']      =  $userid;
    	        
    	    }else{
    
    	        $return['msg']		=  '注册失败';
    	        $return['errcode']  =  8;
    			//增加错误日志
    			$this -> addErrorLog('', 1,$return['msg']);
    	    }
		    
		}
		 
	    if ($type != '' && $return['errcode']  ==  8){
	        
	        $return['error']  =  -1;
	        $return['errmsg']   =  $return['msg'];
	        $return['user']     =  array();
	        unset($return['msg']);
	    }
	    return $return;
	}
	 
}
?>