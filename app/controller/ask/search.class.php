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
class search_controller extends ask_controller{ 
	function index_action(){
		//实例化ask模块的数据模型 
		$M = $this -> MODEL('ask');
		
 		$where['add_time']	=	array('>',strtotime("-30 day"));
		
		$where['groupby']	=	'uid';
		
		$where['orderby']	=	'num';
		
		$where['limit']		=	'6';
		
		$hotuser 	=	$M -> getAnswersList($where,array("field"=>"uid,count(id) as num,sum(support) as support,nickname,pic"));
		
		if(trim($_GET['keyword'])){
			$this->addkeywords(12,trim($_GET['keyword']));
		}
 		$this->atnask($M);
		
 		$this->hotclass();
		
		$this->yunset("getinfo",$_GET);
		
		if($_GET['cid']){
			$CacheM		=	$this -> MODEL('cache');
			
			$CacheList	=	$CacheM -> GetCache(array('ask'));

			$qclass 	=	$M -> getQclassInfo($_GET['cid'],array('field'=>"`pid`"));
			
			if($qclass['pid']){
				$data['seacrh_class']	=	$CacheList['ask_name'][$qclass['pid']];
				
				$data['ask_class_name']	=	$CacheList['ask_name'][$_GET['cid']];
			}else{
				$data['seacrh_class']	=	$CacheList['ask_name'][$qclass['pid']];
				
				$data['ask_class_name']	=	$CacheList['ask_name'][$_GET['cid']];
			}
			$data['ask_desc']		=	strip_tags($CacheList['ask_intro'][$_GET['cid']]);
		
		}else{
			$data['ask_class_name']	=	'';
			
			$data['ask_desc']		=	'';
		}
		$this->data=$data;

		$this->yunset("hotuser",$hotuser);
		
		$this->yunset("navtype","topic");
		
		$this->seo('ask_search');
		
		$this->ask_tpl('search');
	}
}
?>