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
class tiny_model extends model{
	
	private function getClass($options){
	    if (!empty($options)){
	        include_once('cache.model.php');
	        $cacheM            =   new cache_model($this->db,$this->def);
	        $cache             =   $cacheM -> GetCache($options);
	        return $cache;
	    }
	}
      /**
      * 查询全部信息
      * @param 表：resume_tiny
      * @param 功能说明：获取resume_tiny表里面所有普工信息
      * @param 引用字段：$whereData：条件  2:$data:查询字段
      *
     */
     public function getResumeTinyList($whereData,$data=array()){
       
		$time    	=   time();
		$ListNew	=   array();  
       
		$field		=   $data['field'] ? $data['field'] : '*';
		$List		=   $this -> select_all('resume_tiny',$whereData,$field);
		
		if(!empty($List) && $List){
          
			$cache   =   $this -> getClass(array('user','city'));
			
			foreach($List as $k=>$v){
				if($v['exp']){
					$List[$k]['exp_n']	=	$cache['userclass_name'][$v['exp']];
				}
				if($v['sex']){
					$List[$k]['sex_n']	=  	$cache['user_sex'][$v['sex']];
				}
				if($v['provinceid']){
					$List[$k]['city_one']	=  	$cache['city_name'][$v['provinceid']];
				}
				if($v['cityid']){
					$List[$k]['city_two'].=  	'-'.$cache['city_name'][$v['cityid']];
				}
				if($v['three_cityid']){
					$List[$k]['city_three'].=  	'-'.$cache['city_name'][$v['three_cityid']];
				}
                if($v['lastupdate']){
                    $ltime				=  $v['lastupdate'];
                    //今天开始时间戳
                    $beginToday			=  strtotime('today');
                    //昨天开始时间戳
                    $beginYesterday		=  strtotime('yesterday');
                    //一周内时间戳
                    if($ltime>$beginYesterday && $ltime<$beginToday){

                        $List[$k]['lastupdate_n']	=	"昨天";

                    }elseif($ltime>$beginToday){

                        $List[$k]['lastupdate_n']	=	lastupdateStyle($ltime);

                    }else{

                        $List[$k]['lastupdate_n']	=	date("Y-m-d",$ltime);
                    }
                }
			}
			$ListNew['list']  =   $List;
		}
       
        return $ListNew;
    }
    
     /**
      * 查询单条信息
      * @param 查询表：resume_tiny
      * @param 功能说明：根据条$id 获取once_job表里面 单条信息
      * @param 引用字段：$id :条件 2:$data:查询字段
      *
     */
    public function getResumeTinyInfo($where,$data=array()){
       
        $cache	=   $this -> getClass(array('user','city'));
        
		
		$select	=	$data['field'] ? $data['field'] : '*';
		$Info	=   $this -> select_once('resume_tiny', $where, $select);
		if($Info && is_array($Info)){
		
			$Info['exp_n']	=  $cache['userclass_name'][$Info['exp']];
			$Info['sex_n']	=  $cache['user_sex'][$Info['sex']];
			$Info['time_n']	=  date("Y-m-d",$Info['time']);
			$Info['lastupdate_n']	=  date("Y-m-d",$Info['lastupdate']);

			if($Info['provinceid']){
				$Info['city_n']	=  	$cache['city_name'][$Info['provinceid']];
			}
			if($Info['cityid']){
				$Info['city_n'].=  	'-'.$cache['city_name'][$Info['cityid']];
			}
			if($Info['three_cityid']){
				$Info['city_n'].=  	'-'.$cache['city_name'][$Info['three_cityid']];
			}
		}
		
		return $Info;
    }
   /**
      * 审核信息
      * @param  表：resume_tiny
      * @param 功能说明：根据条件$id 审核resume_tiny表里面信息
      * @param 引用字段：$id :条件 2:$data['status']:审核状态
      *
     */
	public function setResumeTinyStatus($id,$data = array()){
		
		$where  = array();

		if(!empty($id)){

			$where['id']	=   array('in',pylode(',',$id));
			$updata  		= array(
				'status' =>  $data['status'],
			);
			$nid           	=   $this -> update_once('resume_tiny',$updata,$where);
			
			if($nid){
				include_once('log.model.php');
				$logM		=	new log_model($this->db, $this->def);
				$logM->addAdminLog("普工(ID:".pylode(',',$id).")审核成功");
			}
			return $nid;
		}
	}
  
    /**
      * 删除信息
      * @param  表：resume_tiny
      * @param 功能说明：根据条件$id 删除resume_tiny表里面信息
      * @param 引用字段：$id :条件 2:$data:字段
      *
     */
    
    public function delResumeTiny($id,$data=array()){
      
		if(!empty($id)){
			if(is_array($id)){

				$ids    				=	$id;    
				$return['layertype']	=	1;   
			}else{

				$ids    				=   @explode(',', $id);
				$return['layertype']	=	0;
			}
			$id           	=   pylode(',', $ids);

			$return['id']	=	$this -> delete_all('resume_tiny',array('id' => array('in',$id)),'');
			
			if($return['id']){

				$return['msg']      =  '普工简历(ID:'.pylode(',',$id).')删除成功';
				$return['errcode']  =  '9';
			}else{
				
				$return['msg']      =  '普工简历(ID:'.pylode(',',$id).')删除失败';
				$return['errcode']  =  '8';
			}
		}else{
			
			$return['msg']      	=  '系统繁忙';
			$return['errcode']  	=  '8';
			$return['layertype']	=	0;
		}

		return $return;  
     
	}
	/**
      * 更新信息
      * @param  表：resume_tiny
      *
     */
    public function upResumeTiny($upData = array(),$whereData = array()){
    
		return $this -> update_once('resume_tiny',$upData,$whereData);
	}
     /**
      * 添加、更新信息
      * @param  表：resume_tiny
      * @param 功能说明：根据条件$id 修改resume_tiny表里面信息
      * @param 引用字段：$id :条件 2:$data:引用字段名称
      * @param  $data['password'] ：密码是否修改
      *
     */
  
    public function addResumeTinyInfo($data = array(),$type =''){
		$post	=	$data['post'];
		include_once ('cache.model.php');
        
        $cacheM     =   new cache_model($this->db, $this->def);
        
        $cache      =   $cacheM -> GetCache('city');
        $citymsg 	= 	false;
        if(!empty($cache['city_type'])){
        	if($post['cityid']==''){
        		$citymsg = true;
        	}
        }else{
        	if($post['provinceid']==''){
        		$citymsg = true;
        	}
        }
		if($post['username']==''){
			return array('msg'=>'请填写姓名！','errcode'=>8);
		}
		if($post['sex']==''){
			return array('msg'=>'请填写性别！','errcode'=>8);
		}
		if($post['exp']==''){
			return array('msg'=>'请填写工作年限！','errcode'=>8);
		}
		if($citymsg){
			return array('msg'=>'请选择工作地区！','errcode'=>8);
		}
		if($post['job']==''){
			return array('msg'=>'请填写意向职位！','errcode'=>8);
		}
		if($post['mobile']==''){
			return array('msg'=>'请填写手机！','errcode'=>8);
		}
		if($post['production']==''){
			return array('msg'=>'请填写自我介绍！','errcode'=>8);
		}

        include_once ('notice.model.php');
        $noticeM		=		new notice_model($this->db, $this->def);
        //短信验证
        if ($this->config['sy_msg_isopen']==1) {

            if (isset($data['moblie_code']) && !empty($data['moblie_code'])) {
                $companywhere['check'] = $post['mobile'];
                $companywhere['type'] = 2;
                $companywhere['orderby'] = array('ctime,desc');
                include_once('company.model.php');
                $CompanyM = new company_model($this->db, $this->def);
                $cert_arr = $CompanyM->getCertInfo($companywhere);
                if (is_array($cert_arr)) {
                    $checkTime = $noticeM->checkTime($cert_arr['ctime']);
                    if ($checkTime) {
                        $res = $data['moblie_code'] == $cert_arr['check2'] ? true : false;
                        if ($res == false) {
                            return array('msg' => '短信验证码错误！', 'errcode' => '8');
                        }
                    } else {
                        return array('msg' => '验证码验证超时，请重新点击发送验证码！', 'errcode' => '8');
                    }
                } else {
                    return array('msg' => '验证码发送不成功，请重新点击发送短信验证码！', 'errcode' => '8');
                }
            }
        }else{
            if($type!='admin' && $type!='wxapp'){
                if ($this->config['code_kind'] ==1) {
                    $result = $noticeM->jycheck($_POST['authcode'], '普工简历');

                    if (!empty($result)) {
                        return array('msg' => $result['msg'], 'errcode' => 8);
                    }
                }
            }
        }
		if($post['password']){
			$post['password']	=	md5($post['password']);
		}else{
			unset($post['password']);
		}
		
		$id						=	intval($data['id']);
		if(!empty($id)){
			
			if($type!='admin'){
				
				$arr			=	$this->getResumeTinyInfo(array('id'=>$id,'password'=>$post['password']));
				
				if(empty($arr)){
					return array('msg'=>'密码不正确','errcode'=>8);
				}
			}
		
			$nid    			=   $this ->  update_once('resume_tiny',$post,array('id'=>$id));
			
			if($nid){
				if($this->config['user_wjl']=="0" && $type != 'admin'){
					$msg="修改成功，等待审核！";
				}else{
					$msg="修改成功!";
				}
                if($data['utype']=='wap'){
                    $return['url']=Url('wap',array('c'=>'tiny'));
                }else{
                    $return['url']=Url('tiny');
                }
                $return['msg']		=	$msg;
                $return['errcode']	=	9;
			}else{

                $return['msg']		=	'修改失败！';
                $return['errcode']	=	8;
			}
		}else{
			
			$s_time		=	strtotime(date('Y-m-d 00:00:00')); //今天开始时间
			$m_tiny		=	$this->getResumeTinyNum(array('login_ip'=>fun_ip_get(),'time'=>array('>',$s_time)));
            $m_tiny_total=	$this->getResumeTinyNum(array('time'=>array('>',$s_time)));
            if($this->config['sy_tiny_totalnum'] == 0 || ($this->config['sy_tiny_totalnum'] > $m_tiny_total)) {
                if ($this->config['sy_tiny'] > $m_tiny || $this->config['sy_tiny'] < 1) {

                    $nid = $this->insert_into('resume_tiny', $post);

                    if ($this->config['user_wjl'] == "0" && $type != 'admin') {
                        $msg = "发布成功，等待审核！";
                    } else {
                        $msg = "发布成功!";
                    }
                    if ($nid) {
                        if ($data['utype'] == 'wap') {
                            $return['url'] = Url('wap', array('c' => 'tiny'));
                        } else {
                            $return['url'] = Url('tiny');
                        }
                        $return['msg']		=	$msg;
                        $return['errcode']	=	9;
                    } else {
                        $return['msg'] = '发布失败！';
                        $return['errcode'] = 8;
                    }
                } else {
                    $return['msg'] = '一天内只能发布' . $this->config['sy_tiny'] . '次！';
                    $return['errcode'] = 8;
                    if ($data['utype'] == 'wap') {
                        $return['url'] = Url('wap', array('c' => 'tiny'));
                    }
                }
            }else{
                $return['msg'] = '网站发布普工简历本日已到上限，如有急需，请联系网站客服！';
                $return['errcode'] = 8;
            }
		}
		return $return;
	}
	
	public function getResumeTinyNum($Where = array()){
		return $this->select_num('resume_tiny', $Where);
	}
	//管理信息：刷新、修改、删除
	public function setResumeTinyPassword($data = array()){
		
		session_start();
		 
		if(!empty($data['code'])){
			if(md5(strtolower($data['code'])) != $_SESSION['authcode'] || empty($_SESSION['authcode'])){//验证码错误
				unset($_SESSION['authcode']);
				return array('msg'=>'验证码错误！','errcode'=>8,'type'=>1);
			}
		}
		
		$jobinfo	=	$this->getResumeTinyInfo(array('id'=>(int)$data['id'],'password'=>md5($data['password'])));
		if(!is_array($jobinfo) || empty($jobinfo)){
			return array('msg'=>'密码错误！','errcode'=>8,'type'=>2);
		}else{
			$_SESSION['tinypass'] = md5($data['password']);
		}
	
		if($data['type']==1){//刷新
			
			$this -> upResumeTiny(array('lastupdate'=>time()),array('id'=>(int)$jobinfo['id']));
			return array('msg'=>'刷新成功！','errcode'=>9,'type'=>3);
			
		}elseif($data['type']==3){//删除
			
			$this -> delResumeTiny((int)$jobinfo['id']);
			return array('msg'=>'删除成功！','errcode'=>9,'type'=>4);
			
		}else{//修改
			if($data['utype']=='pc'){
				$url	=	Url('tiny',array('c'=>'add','id'=>(int)$jobinfo['id']));
				return array('url'=>$url);
			}elseif($data['utype']=='wap'){
				$url	=	Url('wap',array('c'=>'tiny','a'=>'add','id'=>(int)$jobinfo['id']));
				return array('url'=>$url);
			}else{
				return array('msg'=>'密码正确！','errcode'=>9,'type'=>2);
			}
			
		}
	}

    /**
     * 普工简历刷新
     * @param $id
     * @return mixed
     */
    public function refreshResume($id)
    {

        $id =   @explode(',', $id);

        foreach ($id as $v) {
            if ($v) {

                $ids[]  =   $v;
            }
        }
        if (!empty($ids)) {

            $idstr  =   pylode(',', $ids);

            $post   =   array('lastupdate' => time());

            $result['id']   =   $this->update_once('resume_tiny', $post, array('id' => array('in', $idstr)));

            if ($result['id']) {

                $ids   =   array();

                //简历刷新成功，修改个人基本信息表中的更新时间
                $this->update_once('resume_tiny', $post, array('id' => array('in', pylode(',', $ids))));

                $return['msg']      =   '刷新简历(ID:' . $idstr . ')成功';
                $return['errcode']  =   '9';
            } else {

                $return['msg']      =   '刷新简历(ID:' . $idstr . ')失败';
                $return['errcode']  =   '8';
            }
        } else {

            $return['msg']      =   '请选择要刷新的简历';
            $return['errcode']  =   '8';
        }
        return $return;
    }
}
?>