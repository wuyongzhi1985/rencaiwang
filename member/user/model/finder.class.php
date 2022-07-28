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
class finder_controller extends user{
    //职位搜索器列表
	function index_action(){		
		$this->public_action();
     $finderM	=	$this -> MODEL('finder');
      $where['uid']	=	$this -> uid;
	    $urlarr['c']	=	$_GET['c'];
		  $urlarr['page']	=	'{{page}}';
	    $pageurl		=	Url('member',$urlarr);

	    $pageM			=	$this   ->  MODEL('page');
	    $pages			=	$pageM  ->  pageList('finder',$where,$pageurl,$_GET['page']);
	    
	    if($pages['total'] > 0){
	        $where['orderby']	=	'id';
	        $where['limit']		=	$pages['limit'];
	        
	       
	        
	        $List		=	$finderM  ->  getList($where);
			
			$this -> yunset("finder",$List);
	    }
		if($this->config['user_finder'] && $this->config['user_finder']>count($List)){
			$this->yunset("syfinder",$this->config['user_finder']-count($List));
		}
		$this->yunset("js_def",3);
		$this->user_tpl('finder');
	}
    //保存职位搜索器
	function save_action(){
    	$finderM	=	$this -> MODEL('finder');
      $para=array();
      if($_POST['submitBtn']){
		
			$_POST		=	$this->post_trim($_POST);
			$data=array(
				'uid'			=>	$this->uid,
				'usertype'		=>	$this->usertype,
				'id'			=>	intval($_POST['id']),
				'name'			=>	$_POST['name'],
				'keyword'		=>	$_POST['keyword'],
				'hy'			=>	intval($_POST['hy']),
				'job1'			=>	intval($_POST['job1']),
				'job1_son'		=>	intval($_POST['job1_son']),
				'job_post'		=>	intval($_POST['job_post']),
				'provinceid'	=>	intval($_POST['provinceid']),
				'cityid'		=>	intval($_POST['cityid']),
				'three_cityid'	=>	intval($_POST['three_cityid']),
				'minsalary'		=>	$_POST['minsalary'],
				'maxsalary'		=>	$_POST['maxsalary'],
				'edu'			=>	intval($_POST['edu']),
				'exp'			=>	intval($_POST['exp']),
				'sex'			=>	intval($_POST['sex']),
				'report'		=>	intval($_POST['report']),
				'uptime'		=>	$_POST['uptime']
			);
			$return   =  $finderM  ->  addInfo($data);
		
			$this->ACT_layer_msg($return['msg'],$return['errcode'],$return['url']);
		}
	}
	//删除职位搜索器
	function del_action(){
    $finderM	=	$this->MODEL('finder');
		if($_GET['id']){
			$id			=	intval($_GET['id']);
			$return		=	$finderM -> delInfo($id,array('uid'=>$this->uid,'usertype'=>$this->usertype));
			$this -> layer_msg($return['msg'],$return['errcode'],$return['layertype'],$_SERVER['HTTP_REFERER']);
		}
	}
	//修改或者添加职位搜索器
	function edit_action(){
    $finderM	=	$this -> MODEL('finder');
		$id			=	intval($_GET['id']);
		$list		=	$finderM  ->  getInfo(array('id'=>$id,'uid'=>$this->uid));
		
		if($list['info']['para']){ 
			$this->yunset("parav",$list['parav']);
		}
		$this->yunset("info",$list['info']); 
		$this->yunset($list['cache']);
		$this->public_action();
		$this->user_tpl('finderinfo');
	}
}
?>