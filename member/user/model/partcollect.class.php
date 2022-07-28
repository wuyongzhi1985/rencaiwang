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
class partcollect_controller extends user{
	//兼职职位收藏列表
	function index_action(){
		$this->public_action();
		
		$PartM			=   $this -> MODEL('part');
		
		$where['uid']	=  $this -> uid;
		 //分页链接
		$urlarr['c']	=	$_GET['c'];
        $urlarr['page']	=	'{{page}}';
        
        $pageurl		=	Url('member',$urlarr);

        $pageM			=	$this  -> MODEL('page');
        $pages			=	$pageM -> pageList('part_collect',$where,$pageurl,$_GET['page']);
		
        if($pages['total'] > 0){
			
            if($_GET['order']){
                
                $where['orderby']		=	$_GET['t'].','.$_GET['order'];
                $urlarr['order']		=	$_GET['order'];
                $urlarr['t']			=	$_GET['t'];
            }else{
                
                $where['orderby']		=	array('id,desc');
            }
            $where['limit']				=	$pages['limit'];
            
            $rows    	=   $PartM -> getPartCollectList($where);
        }
		$this->yunset("rows",$rows);
		$this->user_tpl('partcollect');
	}
	//删除兼职职位收藏
	function del_action(){
		$partM	=   $this -> MODEL('part');

		if($_GET['id']){
			
			$id 	=   intval($_GET['id']);
			
			$arr    =   $partM -> delPartCollect($id,array('uid'=>$this->uid,'usertype'=>$this->usertype));
			$this ->  layer_msg($arr['msg'], $arr['errcode'], $arr['layertype'],$_SERVER['HTTP_REFERER']);
		}
		 if($_POST['ids']){

            $id 	=   intval($_POST['ids']);

            $return    =   $partM -> delPartCollect($id,array('uid'=>$this->uid,'usertype'=>$this->usertype));
            echo json_encode($return);
            die;
        }
	}
}
?>