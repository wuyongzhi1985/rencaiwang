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

class user_member_controller extends adminCommon
{

    /**
     * 个人用户列表高级搜索功能
     */
	private function set_search()
    {

		include(CONFIG_PATH.'db.data.php');
		$source         =  $arr_data['source'];
		$search_list[]  =  array('param'=>'source','name'=>'数据来源','value'=>$source);
		$search_list[]  =  array('param'=>'lotime','name'=>'最近登录','value'=>array('1'=>'今天','3'=>'最近三天','7'=>'最近七天','15'=>'最近半月','30'=>'最近一个月'));
		$search_list[]  =  array('param'=>'adtime','name'=>'最近注册','value'=>array('1'=>'今天','3'=>'最近三天','7'=>'最近七天','15'=>'最近半月','30'=>'最近一个月'));
		$search_list[]  =  array('param'=>'status','name'=>'状态','value'=>array('1'=>'正常','2'=>'锁定'));
		$search_list[]  =  array('param'=>'def_job','name'=>'拥有简历','value'=>array('1'=>'是','2'=>'否'));
		$this->yunset('source',$source);
		$this->yunset('search_list',$search_list);
	}

	/**
	 * 会员-个人-个人用户列表：全部个人
	 */
	function index_action()
    {
		
		$this->set_search();

		$userInfoM  =   $this -> MODEL('userinfo');
		$resumeM    =   $this -> MODEL('resume');
		$where      =   $memberWhere    =   array();
		//判断是否有简历
		if(isset($_GET['def_job'])){
			
			if($_GET['def_job']=='1'){
				
				$where['def_job']=array('>',0);
			
			}else{
				
				$where['def_job']=0;
			
			}
			
			$urlarr['def_job']         =  $_GET['def_job'];
		
		}
		//条件查询 ：搜索查询
		if($_GET['keyword']){
		    
		    $keytype  =   intval($_GET['keytype']);
		    
		    $keyword  =   trim($_GET['keyword']);
		    
		    if ($keytype == 1){

		        $memberWhere['username']    =   array('like',$keyword);
		        
		    }elseif ($keytype == 2){

		        $where['name']        =	 array('like',$keyword);
		        
		    }elseif ($keytype == 3){
		        
		        $where['telphone']    =  array('like',$keyword);
		        
		    }elseif ($keytype == 4){
		        
		        $where['email']       =  array('like',$keyword);
		        
		    }elseif ($keytype == 5){
		        
		        $where['uid'][]       =  array('=',$keyword);
            }
            
            $urlarr['keytype']	      =  $keytype;
		    
		    $urlarr['keyword']	      =  $keyword;
		}
        if ($_GET['status']) {

            $status = intval($_GET['status']);
            $where['r_status'] = $status;
            $urlarr['status'] = $status;
        }
		if(isset($_GET['adtime'])){
		    if($_GET['adtime']=='1'){

                $memberWhere['reg_date']    =   array('>',strtotime('today'));
		    }else{

                $memberWhere['reg_date']    =   array('>',strtotime('-'.intval($_GET['adtime']).' day'));
		    }
		    
		    $urlarr['adtime']               =   $_GET['adtime'];
		}
		if(isset($_GET['lotime'])){
		    if($_GET['lotime']=='1'){

                $memberWhere['login_date']  =   array('>',strtotime('today'));
		    }else{

                $memberWhere['login_date']  =   array('>',strtotime('-'.intval($_GET['lotime']).' day'));
		    }
		    $urlarr['lotime']               =   $_GET['lotime'];
		}
		if(isset($_GET['source'])){
		    
		    $source                         =   intval($_GET['source']);

            $memberWhere['source']          =   $source;
		    
		    $urlarr['source']               =   $source;
		}

		if(isset($memberWhere) && !empty($memberWhere)){

            $memberUids         =   array();

			$memberList		    =   $userInfoM->getList($memberWhere,array('field'=>'`uid`'));
	
			foreach($memberList  as $val){
				$memberUids[]   =   $val['uid'];
			}
			
			$where['uid']	    =   array('in',pylode(',',$memberUids));
		}
		$urlarr        	=   $_GET;
		$urlarr['page']	=	'{{page}}';

		$pageurl		=	Url($_GET['m'],$urlarr,'admin');
		$pageM			=	$this  -> MODEL('page');
		$pages			=   $pageM -> pageList('resume',$where,$pageurl,$_GET['page']);
		
		if($pages['total'] > 0){
		    if(isset($_GET['order'])){
		        if($_GET['t']=='time'){

		            $where['orderby']	=	'lastupdate,'.$_GET['order'];
		        }else{

		            $where['orderby']	=	$_GET['t'].','.$_GET['order'];
		        }
		        $urlarr['order']		=	$_GET['order'];
		        $urlarr['t']			=	$_GET['t'];
		    }else{

				$where['orderby']		=	'uid';
		    }
		    $where['limit']				=	$pages['limit'];
            $List                       =   $resumeM -> getResumeList($where,array('utype'=>'admin'));
            foreach ($List  as $key => $val){

                $List[$key]['wxBindmsg']=   $this->wxBindState($val);
            }
    
            $this -> yunset('userrows',$List);
        }
		//提取分站内容
		$cacheM =   $this   -> MODEL('cache');
		$domain =	$cacheM	-> GetCache('domain');
		$this -> yunset('Dname', $domain['Dname']);
		
		$this->yuntpl(array('admin/admin_member_userlist'));
	}

	/**
	 * 会员-个人-个人用户列表:添加会员
	 */
	function add_action()
    {

	    $this->yuntpl(array('admin/admin_member_useradd'));
	}

	/**
	 * 会员-个人-个人用户列表:添加会员保存
	 */
	function save_action(){
	    if($_POST['submit']){
	        
	        if($_POST['username']==''||mb_strlen($_POST['username'])<2||mb_strlen($_POST['username'])>16){
	            
	            $this -> ACT_layer_msg('用户名格式错误',8);
	            
	        }elseif($_POST['password']==''||mb_strlen($_POST['password'])<6||mb_strlen($_POST['password'])>20){
	            
	            $this -> ACT_layer_msg('密码格式错误',8);
	            
	        }elseif($_POST['moblie']==''){
	            
	            $this -> ACT_layer_msg('手机号不能为空',8);
	        }
	        
	        $userinfoM  =  $this -> MODEL('userinfo');
	        
	        $result  =  $userinfoM -> addMemberCheck($_POST);
	        
	        if ($result['msg']){
	            
	            $this -> ACT_layer_msg($result['msg'],8);
	        }
	        
	        if($this->config['sy_uc_type']=='uc_center'){
	            $this -> obj-> uc_open();
	            
	            $user  =  uc_get_user($_POST['username']);
	            
	            if(is_array($user)){
	                $this -> ACT_layer_msg('该会员已经存在！',8);
	            }
	        }
	        $time  =  time();
	        $ip    =  fun_ip_get();
	        $pass  =  $_POST['password'];
	        
	        if($this->config['sy_uc_type']=='uc_center'){
	            
	            $result  =  uc_user_register($_POST['username'],$pass,$_POST['email']);
	            
	            if($result < 0){
	                
	                switch($result){
	                    case '-1' : $data['msg']='用户名不合法!';
	                    break;
	                    case '-2' : $data['msg']='包含不允许注册的词语!';
	                    break;
	                    case '-3' : $data['msg']='用户名已经存在!';
	                    break;
	                    case '-4' : $data['msg']='Email 格式有误!';
	                    break;
	                    case '-5' : $data['msg']='Email 不允许注册!';
	                    break;
	                    case '-6' : $data['msg']='该 Email 已经被注册!';
	                    break;
	                }
	                $this -> ACT_layer_msg($data['msg'],8);
	            }else{
	                
	                list($uid,$username,$email,$password,$salt)=uc_get_user($_POST['username']);
	            }
	        }else{
	            $salt  =  substr(uniqid(rand()), -6);
	            $password  =  passCheck($pass,$salt);
	        }
	        $mdata = array(
	            'username'  =>  $_POST['username'],
	            'password'  =>  $password,
	            'usertype'  =>  1,
	            'salt'      =>  $salt,
	            'moblie'    =>  $_POST['moblie'],
	            'email'     =>  $_POST['email'],
	            'reg_date'  =>  $time,
	            'reg_ip'    =>  $ip,
	            'status'    =>  1
	        );
	        $udata = array(
	            'email'     =>  $_POST['email'],
	            'telphone'  =>  $_POST['moblie'],
              	'r_status'  =>  1
	        );
	        
	        $nid  =  $userinfoM -> addInfo(array('mdata'=>$mdata,'udata'=>$udata));
	        
	        if($nid > 0){
	            
	            $this->ACT_layer_msg('个人会员(ID:'.$nid.')添加成功！',9,'index.php?m=user_member');
	            
	        }else{
	            
	            $this->ACT_layer_msg('个人会员添加失败，请重试！',8);
	        }
	    }
	}
	/**
	 * 会员-个人-个人用户列表: 修改页面
	 */
	function edit_action(){
        
	    $uid        =  intval($_GET['id']);
	    
	    $userinfoM  =  $this->MODEL('userinfo');
	    
	    $member     =  $userinfoM -> getInfo(array('uid'=> $uid));
	    
	    $resumeM    =  $this -> MODEL('resume');
	    
	    $return     =  $resumeM -> getInfo(array('uid'=>$uid, 'needCache'=>1));

	    $setarr = array(
	        'member'          =>  $member,
	        'row'             =>  $return['resume'],
	        'user_sex'        =>  $return['cache']['user_sex'],
	        'userdata'        =>  $return['cache']['userdata'],
	        'userclass_name'  =>  $return['cache']['userclass_name'],
	        'lasturl'         =>  $_SERVER['HTTP_REFERER']
	    );
	    
	    $this->yunset($setarr);
	    
	    $this->yuntpl(array('admin/admin_member_useredit'));
	}
	/**
	 * 会员-个人-个人用户列表: 修改保存
	 */
	function editSave_action(){

	    $_POST  =  $this->post_trim($_POST);
	    
	    if($_POST['submit']){
	        
	        $uid    =  intval($_POST['uid']);
	        
			$mData  =  array(
	            'moblie'    =>  $_POST['moblie'],
	            'email'     =>  $_POST['email'],
	        );

	        if($_FILES['file']['tmp_name']){
				$upArr	=	array(
					'file'	=>  $_FILES['file'],
					'dir'	=>  'user'
				);
			}
			$uploadM	=	$this -> MODEL('upload');
			if(!empty($upArr)){
				$pic		=	$uploadM->newUpload($upArr);
			}
			if (!empty($pic['picurl'])){
				$picture	=	$pic['picurl'];
			}
	        $rData  =  array(
	            'name'         => 	 $_POST['name'],
	            'sex'          =>  	$_POST['sex'],
	            'birthday'     =>  	$_POST['birthday'],
	            'exp'          =>  	$_POST['exp'],
	            'edu'          => 	 $_POST['edu'],
	            'telphone'     => 	 $_POST['moblie'],
	            'email'        =>  	$_POST['email'],
	            'domicile'     =>  	$_POST['domicile'],
	            'living'       =>  	$_POST['living'],
	            'marriage'     =>  	$_POST['marriage'],
	            'height'       =>  	$_POST['height'],
	            'nationality'  =>  	$_POST['nationality'],
	            'weight'       =>  	$_POST['weight'],
	            'idcard'       =>  	$_POST['idcard'],
	            'address'      =>  	$_POST['address'],
	            'homepage'     =>  	$_POST['homepage'],
	            'qq'           =>  	$_POST['qq'],
	            'description'  =>  	$_POST['description'],
				'wxewm'		   =>	$picture,
	        );
	        
	        $resumeM	=	$this->MODEL('resume');

            $resumeInfo =   $resumeM->getInfo(array('uid' => $_POST['uid']));

            if ($resumeInfo['resume']['wxewm'] && $picture == "") {

                $rData['wxewm'] =   $resumeInfo['resume']['wxewm'];
            }
            //修改个人基本信息
            $return     =   $resumeM->upResumeInfo(array('uid' => $uid), array('mData' => $mData, 'rData' => $rData, 'utype' => 'admin'));

            $lasturl    =   str_replace('&amp;', '&', $_POST['lasturl']);
	        
	        $this->ACT_layer_msg($return['msg'], $return['errcode'], $lasturl, 2, 1);
	    }
	}
	
	/**
	 * @desc 后台个人列表 --  修改 -- 账户信息 -- 提交表单
	 */
	 function saveUser_action(){
	 
	 	if($_POST){
	 		$_POST = $this->post_trim($_POST);
			$uid		=	intval($_POST['uid']);

			$userInfoM	=	$this->MODEL('userinfo');

			$data		=	array(
			
				'username'	=>	$_POST['username'],
				'password'	=>	$_POST['password'],
				'status'	=>	$_POST['status'],
				'lock_info'	=>	$_POST['lock_info']
			);

			$result		=	$userInfoM -> addMemberCheck($data, $uid,'admin');

			if(!empty($result['msg'])){

				$this->ACT_layer_msg($result['msg'], 8);
			}else{
				
				$return =	$userInfoM -> upInfo(array('uid' => $uid), $data);

				$this->ACT_layer_msg('更新成功！', 9, $_SERVER['HTTP_REFERER'], 2, 1);
			}
			 
		}
		
	 }


	/**
	 * 会员日志高级搜索
	 */
	private function log_search(){
		$opera     =  array('1'=>'财务','2'=>'简历','6'=>'申请报名','5'=>'收藏/关注','7'=>'基本信息','11'=>'修改账号','8'=>'修改密码','13'=>'认证绑定','12'=>'账号解绑','16'=>'上传图片','17'=>'积分兑换','18'=>'消息','19'=>'问答','23'=>'举报','25'=>'悬赏推荐','26'=>'浏览');
		$search[]  =  array('param'=>'operas','name'=>'操作类型','value'=>$opera);
		
		$parr      =  array('1'=>'增加','2'=>'修改','3'=>'删除','4'=>'刷新');
		$search[]  =  array('param'=>'parrs','name'=>'操作内容','value'=>$parr);
	    
	    $this->yunset('search_list',$search);
	}
	/**
	 * 会员-个人-个人用户列表: 会员日志
	 */
	function member_log_action(){
		$this -> log_search();
		
		$where['usertype']  =  1;
		
		if ($_GET['uid']){
		    
		    $where['uid']   =  intval($_GET['uid']);
		    
		    $urlarr['uid']  =  $_GET['uid'];
		}
		if($_GET['keyword']){
		    
		    $type     =   intval($_GET['type']);
		    
		    $keyword  =   trim($_GET['keyword']);
		    
		    if ($type == 1){
		        
		        $resumeM  =  $this->MODEL('resume');
		        
		        $resume   =  $resumeM -> getResumeList(array('name'=>array('like',$keyword)),array('field'=>'uid'));
		        
		        if ($resume){
		            
		            $ruids  =  array();
		            
		            foreach($resume as $val){
		                
		                $ruids[]  =  $val['uid'];
		            }
		            
		            $where['uid']  =  array('in',pylode(',', $ruids));
		        }
		    }elseif ($type == 2){
		        
		        $where['content']  =  array('like',$keyword);
		        
		    }elseif ($type == 3){
		        
		        $where['uid']  =  array('=',$keyword);
		    }
		    $urlarr['type']	=   $type;
		    $urlarr['keyword']	=   $keyword;
		}
		if ($_GET['operas']){
		    
		    $operas            =  intval($_GET['operas']);
		    
		    $where['PHPYUNBTWSTART']     =  '';
		    $where['opera']         =  $operas;
		    
		    if ($operas == 1){
		        
		        $where['opera']     =  '88';
		        $where['content']   =  array('like','订单','OR');
		        
		    }elseif ($operas == 13){
		        
		        $where['content']   =  array('like','认证','OR');
		        
		    }elseif ($operas == 19){
		        
		        $where['content']   =  array('like','问答','OR');
		        
		    }elseif ($operas == 23){
		        
		        $where['content']   =  array('like','举报','OR');
		        
		    }elseif ($operas == 25){
		        
		        $where['content']   =  array('like','悬赏','OR');
		        
		    }elseif ($operas == 26){
		        
		        $where['content']   =  array('like','浏览','OR');
		    }
		    $where['PHPYUNBTWEND']  =  '';
		    
		    $urlarr['operas']  =  $operas;
		}
	    if($_GET['parrs']){
	        
	        $where['type']    =  intval($_GET['parrs']);
	        
	        $urlarr['parrs']  =  $_GET['parrs'];
	    }
	    if($_GET['time']){
	        
			$times  =  @explode('~',$_GET['time']);
			
			$where['PHPYUNBTWSTART']     =  '';
			$where['ctime'][]       =  array('>=',strtotime($times[0]));
			$where['ctime'][]       =  array('<=',strtotime($times[1].'23:59:59'));
			$where['PHPYUNBTWEND']  =  '';
			
	        $urlarr['time']  =  $_GET['time'];
	    }
	    
	    $urlarr['c']     =  'member_log';
	    //分页链接
		$urlarr        	 =   $_GET;
	    $urlarr['page']	 =  '{{page}}';
	    
	    $pageurl		 =  Url($_GET['m'],$urlarr,'admin');
	    
	    //提取分页
	    $pageM			 =	$this  -> MODEL('page');
	    $pages			 =	$pageM -> pageList('member_log',$where,$pageurl,$_GET['page']);
	    
	    //分页数大于0的情况下 执行列表查询
	    if($pages['total'] > 0){
	        //limit order 只有在列表查询时才需要
	        if($_GET['order']){
	            
	            $where['orderby']  =  $_GET['t'].','.$_GET['order'];
	            $urlarr['order']   =  $_GET['order'];
	            $urlarr['t']	   =  $_GET['t'];
	        }else{
	            $where['orderby']  =  'id';
	        }
	        $where['limit']		   =  $pages['limit'];
	        
	        $logM  =  $this -> MODEL('log');
	        
	        $List  =  $logM -> getMemlogList($where,array('utype'=>'admin'));
	        
	        
	        $this -> yunset(array('rows'=>$List));
	    }
		$userInfoM  =  $this -> MODEL('userinfo');
		
		$uinfo      =  $userInfoM -> getInfo(array('uid'=>intval($_GET['uid'])),array('field'=>'`uid`,`username`'));
		
	    $this->yunset('uinfo',$uinfo);
	    
	    $this->yuntpl(array('admin/admin_user_member_log'));
	}
	/**
	 * 会员-个人-个人用户列表: 会员日志删除
	 */
	function memberlogdel_action(){
	    
	    if ($_GET['del']){
	        
	        $this -> check_token();
	        
	        $where = array('id'=>intval($_GET['del']));
	        
	    }elseif ($_POST['del']){
	        
	        $id     =  pylode(',', $_POST['del']);
	        $where  =  array('id'=>array('in',$id));
	    }
	    $logM    =  $this -> MODEL('log');
	    
	    $return  =  $logM -> delMemlog($where);
	    
	    $this->layer_msg($return['msg'],$return['errcode'],$return['layertype'],$_SERVER['HTTP_REFERER']);
	}
	/**
	 * 会员  -  : 解绑日志
	 */
	function writtenOffLog_action(){
	    
  	    $where['opera']     =  12;
	    
  	    if ($_GET['utype']) {
  	        
            $usertype   =   intval($_GET['utype']);
            
            $where['usertype']  =  $usertype;
            
            $urlarr['utype']	=   $usertype;
  	        
  	    }
		
	    if($_GET['keyword']){
	        
	        $type     =   intval($_GET['type']);
	        
	        $keyword  =   trim($_GET['keyword']);
	       	        
	        if ($type == 1){
	            
	            $userinfoM  =  $this -> MODEL('userinfo');
	            
	            $member  =  $userinfoM -> getList(array('username'=>array('like',$keyword)),array('field'=>'`uid`'));
 	            
	            if ($member){
	                
	                $muids  =  array();
	                
	                foreach($member as $val){
	                    
	                    $muids[]  =  $val['uid'];
	                }
	                
	                $where['uid']  =  array('in',pylode(',', $muids));
	            }
	        }elseif ($type == 2){
	            
	            $where['content']  =  array('like',$keyword);            
	        }
	        $urlarr['type']	=   $type;
	        $urlarr['keyword']	=   $keyword;
	    }
	    
	    if($_GET['time']){
	        
	        $times  =  @explode('~',$_GET['time']);
	        
	        $where['PHPYUNBTWSTART']     =  '';
	        $where['ctime'][]       =  array('>=',strtotime($times[0]));
	        $where['ctime'][]       =  array('<=',strtotime($times[1].'23:59:59'));
	        $where['PHPYUNBTWEND']  =  '';
	        
	        $urlarr['time']  =  $_GET['time'];
	    }
	    
	    $urlarr['c']     =  'writtenOffLog';
	    //分页链接
		$urlarr        	 =   $_GET;
	    $urlarr['page']	 =  '{{page}}';
	    
	    $pageurl		 =  Url($_GET['m'],$urlarr,'admin');
	    //提取分页
	    $pageM			 =	$this  -> MODEL('page');
	    $pages			 =	$pageM -> pageList('member_log',$where,$pageurl,$_GET['page']);
	    
	    //分页数大于0的情况下 执行列表查询
	    if($pages['total'] > 0){
	        //limit order 只有在列表查询时才需要
	        if($_GET['order']){
	            
	            $where['orderby']  =  $_GET['t'].','.$_GET['order'];
	            $urlarr['order']   =  $_GET['order'];
	            $urlarr['t']	   =  $_GET['t'];
	        }else{
	            $where['orderby']  =  'id';
	        }
	        $where['limit']		   =  $pages['limit'];
	        
	        $logM  =  $this -> MODEL('log');
	        
	        $List  =  $logM -> getMemlogList($where,array('utype'=>'admin'));
	        
	        
	        $this -> yunset(array('rows'=>$List));
	    }
		$this->yuntpl(array('admin/admin_user_written_off_log'));
	}
	
	/**
	 * 会员 - ： 解绑日志删除
	 */
	function delwflog_action(){
	    
	    if ($_GET['del']){
	        
	        $this -> check_token();
	        
	        if($_GET['del']=='allcom'){
	            
	            if (intval($_GET['utype'])>0) {
	                $where  =   array('usertype' => intval($_GET['utype']),'opera'=>'12');
	            }else{
	                $where  =   array('opera'=>'12');
	            }
	            
	        }else {
	            
	            $where = array('id'=>intval($_GET['del']));
	            
	        }
	    }elseif ($_POST['del']){
	        
	        $id     =  pylode(',', $_POST['del']);
 	        $where  =  array('id'=> array('in',$id));
	    }
	    
	    
	    $logM    =  $this -> MODEL('log');
	    
	    $return  =  $logM -> delMemlog($where);
	    
	    $this->layer_msg($return['msg'],$return['errcode'],$return['layertype'],$_SERVER['HTTP_REFERER']);
	}
	
	/**
	 * 会员-个人-个人用户列表:全部个人（设置分站）
	 */
	function checksitedid_action(){
	    
	    $uid		 =	trim($_POST['uid']);
	    $did		 =	intval($_POST['did']);
	    
	    if(empty($uid)){
	        
	        $this -> ACT_layer_msg('参数不全请重试！', 8);
	    }
	    
	    $uids		 =	@explode(',',$_POST['uid']);
	    $uid 		 =	pylode(',',$uids);
	    
	    if(empty($uid)){
	        
	        $this -> ACT_layer_msg('请正确选择需分配用户！', 8);
	    }
	    $siteM       =  $this->MODEL('site');
	    
	    $didData	 =	array('did' => $did);
	    
	    $Table       = array(
	        'company_cert',
	        'company_order',
	        'look_job',
	        'member',
	        'member_statis',
	        'resume',
	        'resume_expect',
	        'user_entrust',
	        'userid_job'
	    );
	    
	    $siteM -> updDid(array('report'), array('p_uid' => array('in', $uid)), $didData);
	    
	    $siteM -> updDid(array('company_pay'),array('com_id'=>array('in', $uid)),$didData);
	    
	    $siteM -> updDid($Table,array('uid'=>array('in', $uid)),$didData);
	    
	    $this->ACT_layer_msg('会员(ID:'.$_POST['uid'].')分配站点成功！',9,$_SERVER['HTTP_REFERER'],2,1);
	}
	/**
	 * 会员-个人-个人用户列表: 全部个人（删除）
	 */
	function del_action(){

	    if ($_GET['del']){
	        
	        $this -> check_token();
	        
	        $uid	=  intval($_GET['del']);
	        
	    }elseif ($_POST['del']){
	        
	        $uid	=  $_POST['del'];
	    }
	    
	    $userinfoM  =  $this -> MODEL('userinfo');
	    
	    $return     =  $userinfoM -> delInfo($uid, 1, $_POST['delAccount']);
	    $this -> ACT_layer_msg($return['msg'],$return['errcode'],$_SERVER['HTTP_REFERER'],2,1);
	}
	/**
	 * 会员-个人-个人用户列表: 全部个人（点用户名跳转会员中心）
	 */
	function Imitate_action(){
	    
	    $userinfoM  =  $this->MODEL('userinfo');
	    
	    $member     =  $userinfoM -> getInfo(array('uid'=> intval($_GET['uid'])),array('field'=>'`uid`,`username`,`salt`,`email`,`password`,`usertype`,`did`'));
	    
	    $this -> cookie->unset_cookie();
	    
	    $this -> cookie->add_cookie($member['uid'],$member['username'],$member['salt'],$member['email'],$member['password'],1,$this->config['sy_logintime'],$member['did'],'1');
		
		$logM  		=  $this->MODEL('log');
		
		$content	=	'管理员'.$_SESSION['ausername'].'登录个人账户'.$member['username'].'成功！';
		
		$adminLo	=	$logM -> addAdminLog($content);
		
		header('Location: '.$this->config['sy_weburl'].'/member');
	}
	/**
	 * 会员-个人-个人用户列表: 全部个人（页面统计数量）
	 */
	function userNum_action(){
		$MsgNum=$this->MODEL('msgNum');
		echo $MsgNum->userNum();
	}
	/**
	 * 会员-个人-个人用户列表: 全部个人（重置密码）
	 */
	function reset_pw_action(){
	    
	    $this -> check_token();
	    
	    $userinfoM  =  $this->MODEL('userinfo');
	    
	    $userinfoM -> upInfo(array('uid'=>intval($_GET['uid'])),array('password'=>'123456'));
	    
	    $this -> MODEL('log') -> addAdminLog('会员(ID:'.$_GET['uid'].')重置密码成功');
	    
	    echo '1';
	}
	// 个人认证总入口，入口整合，利于权限控制
    function usercert_action(){
        
        if (isset($_GET['sbody'])){
            $this->sbody();
        }elseif (isset($_POST['batchfirm'])){
            $this->batchfirm();
        }elseif (isset($_POST['useremailemail'])) {
            $this->emailstatus();
        }elseif (isset($_POST['usermobliemoblie'])) {
            $this->mobliestatus();
        }else{
            $this->userStatus();
        }
    }
    /**
     * 列表-邮箱认证
     */
    function emailstatus()
    {

        $ResumeM    =   $this->MODEL('resume');
        $UserinfoM  =   $this->MODEL('userinfo');

        if ($_POST['useremailemail'] == "") {

            $this->ACT_layer_msg("请填写邮箱", 8);
        } elseif (CheckRegEmail($_POST['useremailemail']) == false) {

            $this->ACT_layer_msg("邮箱格式错误", 8);
        }

        $uid        =   $_POST['uid'];
        $status     =   $_POST['estatus'];
        $email      =   $_POST['useremailemail'];

        $rInfo      =   $ResumeM->getResumeInfo(array('uid' => $uid), array('field' => '`email`, `email_status`'));

        if ($rInfo) {

            if ($rInfo['email'] == $email && $rInfo['email_status'] == 1){

                $this->ACT_layer_msg("邮箱未变更，无需调整！", 9, $_SERVER['HTTP_REFERER'], 2, 1);
            }

            $rdata  =   array('email_status' => $status, 'email' => $email);
            $nid    =   $ResumeM->upResumeInfo(array('uid' => $uid), array('rData' => $rdata));

            if ($nid) {

                $data   =   array('email' => $email, 'email_status' => $status);
                $UserinfoM->upInfo(array('uid' => $uid), $data);

                $this->obj->update_once('member', array('email' => '', 'email_status' => 0), array('uid' => array('<>', $uid), 'email' => $email));
                $this->obj->update_once('resume', array('email' => '', 'email_status' => 0), array('uid' => array('<>', $uid), 'email' => $email));

                $msg        =   '新邮箱：'.$email;
                if (!empty($rInfo['email']) && $rInfo['email'] != $email) {

                    $msg    .=  '，原邮箱：' . $rInfo['email'];
                }

                $this -> MODEL('log') -> addAdminLog("个人会员(ID".$uid.")认证邮箱【".$email."】");

                $this->ACT_layer_msg("邮箱认证成功(用户ID：" . $uid . "，" . $msg . ")", 9, $_SERVER['HTTP_REFERER'], 2, 1);
            } else {

                $this->ACT_layer_msg("邮箱认证失败", 8, $_SERVER['HTTP_REFERER']);
            }
        } else {

            $this->ACT_layer_msg("当前数据错误", 8, $_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * 列表-手机认证
     */
    function mobliestatus()
    {

        $_POST      =   $this->post_trim($_POST);

        $ResumeM    =   $this->MODEL('resume');
        $UserinfoM  =   $this->MODEL('userinfo');

        if ($_POST['usermobliemoblie'] == "") {

            $this->ACT_layer_msg("请填写手机号码", 8);
        } elseif (CheckMobile($_POST['usermobliemoblie']) == false) {

            $this->ACT_layer_msg("手机号码格式错误", 8);
        }

        $uid    =   $_POST['uid'];
        $status =   $_POST['mstatus'];

        $phone  =   $_POST['usermobliemoblie'];

        $rInfo  =   $ResumeM->getResumeInfo(array('uid' => $uid), array('field' => '`telphone`,`moblie_status`'));

        if (!empty($rInfo)) {

            if ($rInfo['telphone'] == $phone && $rInfo['moblie_status'] == 1){

                $this->ACT_layer_msg("手机号未变更，无需调整！", 9, $_SERVER['HTTP_REFERER'], 2, 1);
            }

            $data   =   array('moblie_status' => $status, 'telphone' => $phone);
            $nid    =   $ResumeM->upResumeInfo(array('uid' => $uid), array('rData' => $data));

            if ($nid) {

                $memberData =   array('moblie_status' => $status, 'moblie' => $phone);
                $UserinfoM->upInfo(array('uid' => $uid), $memberData);

                $this->obj->update_once('member', array('moblie' => '', 'email_status' => 0), array('uid' => array('<>', $uid), 'moblie' => $phone));
                $this->obj->update_once('resume', array('telphone' => '', 'email_status' => 0), array('uid' => array('<>', $uid), 'telphone' => $phone));

                $msg        =   '新手机号：'.$phone;
                if (!empty($rInfo['telphone'])) {

                    $msg    .= '，原手机号：'.$rInfo['telphone'];

                }
                $this -> MODEL('log') -> addAdminLog("个人会员(ID".$uid.")认证手机【".$phone."】");

                $this->ACT_layer_msg("手机认证成功(用户ID：" . $uid . "，" . $msg . ")", 9, $_SERVER['HTTP_REFERER'], 2, 1);
            } else {

                $this->ACT_layer_msg("手机认证失败", 8, $_SERVER['HTTP_REFERER']);
            }
        } else {

            $this->ACT_layer_msg("当前数据错误", 8, $_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * 列表底部-批量认证
     */
    function batchfirm()
    {

        $UserinfoM  =    $this->MODEL('userinfo');
        $ResumeM    =   $this->MODEL('resume');

        $status     =   $_POST['plstatus'];
        $msg        =   array();

        if ($_POST['username_email'] == "" && $_POST['username_moblie'] == "" && $_POST['username_idcard'] == "") {
            $this->ACT_layer_msg("请选择认证类型", 8);
        }
        if ($status == "") {
            $this->ACT_layer_msg("请选择认证状态", 8);
        }
        if ($_POST['uid'] == "") {
            $this->ACT_layer_msg("非法操作", 8);
        }

        $where['uid']   =   array('in', pylode(',', $_POST['uid']));

        $rows           =   $ResumeM->getResumeList($where, array('field' => '`uid`,`telphone`,`email`,`idcard_pic`,`idcard`,`email_status`,`moblie_status`,`idcard_status`'));

        if (is_array($rows) && $rows) {

            if ($_POST['username_email']) {

                array_push($msg, '邮箱');

                foreach ($rows as $val) {
                    if ($val['email'] || $val['email_status'] == 1) {

                        $emailuids[]    =   $val['uid'];
                    }
                }

                $emaildata          =   array('email_status' => $status);
                $emailwhere['uid']  =   array('in', pylode(',', $emailuids));

                $UserinfoM->upInfo($emailwhere, $emaildata);
                $ResumeM->upResumeInfo($emailwhere, array('rData' => $emaildata));
            }

            if ($_POST['username_moblie']) {

                array_push($msg, '手机');

                foreach ($rows as $val) {
                    if ($val['telphone'] || $val['moblie_status'] == 1) {

                        $telphoneuids[] =   $val['uid'];
                    }
                }

                $mobliedata         =   array('moblie_status' => $status);
                $mobliewhere['uid'] =   array('in', pylode(',', $telphoneuids));

                $UserinfoM->upInfo($mobliewhere, $mobliedata);
                $ResumeM->upResumeInfo($mobliewhere, array('rData' => $mobliedata));
            }

            if ($_POST['username_idcard']) {

                array_push($msg, '身份证');

                foreach ($rows as $val) {
                    if ($val['idcard_pic'] && $val['idcard'] || $val['idcard_status'] == 1) {

                        $idcarduids[] = $val['uid'];
                    }
                }

                $idcarddata         =   array('idcard_status' => $status);
                $idcardwhere['uid'] =   array('in', pylode(',', $idcarduids));

                $ResumeM->upResumeInfo($idcardwhere, array('rData' => $idcarddata));
            }

            $ty = $status = 1 ? '已认证' : '待认证';

            $this->ACT_layer_msg('(个人列表)' . implode(',', $msg) . '批量设置' . $ty . '成功(ID:' . pylode(',', $_POST['uid']) . ')', 9, $_SERVER['HTTP_REFERER'], 2, 1);
        }
    }
	/**
	 * 列表: 认证审核
	 */
	function userStatus(){
	    
	    $resumeM  =  $this -> MODEL('resume');
	    
	    $post  =  array(
	        'idcard_status'  =>  intval($_POST['r_status']),
	        'statusbody'     =>  trim($_POST['statusbody'])
	    );
	    
	    $return  =  $resumeM -> statusCert($_POST['uid'],array('post'=>$post));
	    
	    $this -> ACT_layer_msg($return['msg'],$return['errcode'],$_SERVER['HTTP_REFERER'],2,$return['layertype']);
	}
	/**
	 * 列表-认证审核弹窗: 查询审核原因
	 */
	function sbody(){
	    
	    $resumeM  =  $this -> MODEL('resume');
	    
	    $resume   =  $resumeM -> getResumeInfo(array('uid'=>intval($_POST['uid'])),array('field'=>'statusbody'));
	    
	    echo trim($resume['statusbody']);die;
	}
    /**
     * 个人账户合并，搜所目标企业名称；
     */
	function searchCom_action(){

        if (isset($_POST['com_name']) && !empty($_POST['com_name'])) {

            $comM   =   $this->MODEL('company');
            $name   =   $this->post_trim($_POST['com_name']);

            $list   =   $comM->getList(array('name' => array('like', $name)), array('field' => '`uid`,`name`'));

            $com    =   $list['list'];

            if (is_array($com) && !empty($com)) {
                foreach ($com as $val) {

                    $data[] =   array('uid' => $val['uid'], 'name' => $val['name'],);
                }
            }
        }
        echo json_encode($data);
        die;
    }

    function merge_action(){

        if ($_POST) {

            $transferM  =   $this->MODEL('transfer');

            $data       =   array(

                'uid'       =>  $_POST['uid'],
                'com_uid'   =>  $_POST['com_uid'],
                'mobile'    =>  $_POST['mobile'],
                'email'     =>  $_POST['email'],
                'QQ'        =>  $_POST['QQ'],
                'wx'        =>  $_POST['wx'],
                'sina'      =>  $_POST['sina']
            );

            $return     =   $transferM->mergeData($data);

            $url        =   $return['errcode'] == 9 ?   'index.php?m=user_member&c=edit&id='.$_POST['com_uid'] : $_SERVER['HTTP_REFERER'];

            $this -> ACT_layer_msg($return['msg'], $return['errcode'], $url,2,1);
        }else{

            $this -> ACT_layer_msg('参数错误',8, $_SERVER['HTTP_REFERER'],2,1);
        }
    }

}
?>