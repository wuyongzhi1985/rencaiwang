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
class zph_controller extends common{
	function index_action(){
		$zphM	=	$this->MODEL('zph');
		$zphList=	$zphM->getZphList(); 
		$newZphInfo = $zphM->getNewZph();
		$this->yunset("zphList", $zphList);
		$this->yunset("newZph", $newZphInfo);
		$this->yunset("headertitle","招聘会");
        $backurl=Url('wap',array());
        $this->yunset('backurl',$backurl);
		$this->seo("zph");
		$this->yuntpl(array('wap/zph'));
	}
	function show_action(){
		
		$id		=	(int)$_GET['id'];
		$zphM	=	$this->MODEL('zph');
		$row	=	$zphM->getInfo(array("id"=>$id),array('banner' => 1)); 
		$this->yunset("Info",$row);
		
		$data['zph_title']	=	$row['title'];
	    $data['zph_desc']	=	$this->GET_content_desc($row['body']);
		$this->data			=	$data;
		
		
		$this->yunset("headertitle","招聘会详情");
		$this->seo("zph_show");
		$this->yuntpl(array('wap/zph_show'));
	}
	function com_action(){
		
		$id		=	(int)$_GET['id'];
		$zphM	=	$this->MODEL('zph');
		$row	=	$zphM->getInfo(array("id"=>$id)); 
		$this->yunset("row",$row);
		
	    if($id){
	        $where['zid']		=	$id;
			$where['status']	=	1;
			$where['orderby']	=	array('sort,desc','ctime,asc');
			
			$urlarr['c']	=	$_GET['c'];
			$urlarr["a"]	=	$_GET['a'];
			$urlarr["id"]	=	$id;
			$urlarr['page']	=	'{{page}}';
			$pageurl		=	Url('wap',$urlarr,'1');

			$pageM			=	$this   ->  MODEL('page');
			$pages			=	$pageM  ->  pageList('zhaopinhui_com',$where,$pageurl,$_GET['page']);
			
			if($pages['total'] > 0){
				$where['limit']		=	$pages['limit'];
				
				$List				=  $zphM  ->  getZphCompanyList($where);
				$this->yunset('rows',$List);
			}
	    }
		
		$data['zph_title']	=	$row['title'];
		$data['zph_desc']	=	$this->GET_content_desc($row['body']);
		$this->data=$data;
		
		$this->yunset("headertitle","参会企业");
		$this->seo("zph_com");
		$this->yuntpl(array('wap/zph_com'));
	}
	function reserve_action(){
		
		$id		=	(int)$_GET['id'];
		$zphM	=	$this->MODEL('zph');
		$row	=	$zphM->getInfo(array("id"=>$id)); 
		$this->yunset("Info",$row);
		
		$rows	=	$zphM->getZphPicList(array("zid"=>$id));
		$this->yunset("Image_info",$rows);
		
		$space	=	$zphM->getZphSpaceInfo(array("id"=>$row['sid']),array('pic'=>1,'field'=>'`pic`,`content`'));//查询场地
		$this->yunset("space",$space);
		
		$spacelist	=	$zphM->getZphSpaceList(array("keyid"=>$row['sid'],"orderby"=>"sort,asc"),array("id"=>$id,'utype'=>'index'));
		$this->yunset("spacelist",$spacelist);
		
		$this->yunset("headertitle","在线预订");
		
		$statisM	=	$this -> MODEL('statis');
		$statis		=	$statisM -> getInfo($this->uid, array('usertype' => 2));
		$this->yunset("statis",$statis);
		
		$data['zph_title']	=	$row['title'];
		$data['zph_desc']	=	$this->GET_content_desc($row['body']);//描述
		$this->data			=	$data;
		
		if($_GET['zph']){
		    $this->yunset('backurl', Url('wap',array('c' => 'zhaopinhui'),'member'));
		}

		if($this->uid){

			$where	=	array(
				'uid'		=>	$this->uid,
				'state'		=>	1,
				'status'	=>	0,
				'r_status'	=>	array('<>',2),
			);
			$jobM	=	$this->MODEL('job');
			
			$arr	=	$jobM->getList($where,array('field'=>'`id`,name'));
			$this->yunset('joblist',$arr['list']);
		}
        if(in_array('zph', explode(',', $this->config['sy_only_price']))){
            $this->yunset('meal_zph', 1);
        }
		$this->seo("zph_reserve");
		$this->yuntpl(array('wap/zph_reserve'));
	}
	function getComList_action(){
		$id     =   intval($_POST['zid']);
        $return =   array();
        $return['total']      =   0;
        if($id){
            $page   =   intval($_POST['page']);
            $limit   =   intval($_POST['limit']);
        
            $zphM   =   $this->MODEL('zph');

            
            $zclimit            =   $limit?$limit:10;
            $zcwhere            =   array();
            $zcwhere['zid']     =   $id;
            $zcwhere['status']  =   1;
            $zcwhere['orderby'] =   array('sort,desc','ctime,asc');

            $zcnum              =   $zphM->getZphComNum($zcwhere);
            $return['total']    =   $zcnum;
            if($page > 0){
                    
                $pagenav  =  ($page - 1) * $zclimit;
                $zcwhere['limit']  =  array($pagenav,$zclimit);
                
            }else{
                
                $zcwhere['limit']  =  $zclimit;
            }

            $zcList             =   $zphM -> getZphCompanyList($zcwhere);
            $return['list']     =   $zcList;
            $return['error']    =   1;
            $return['msg']      =   '';
        }else{
            $return['zclist']   =   array();
            $return['error']    =   0;
            $return['msg']      =   '参数错误请重试';
        }

        echo json_encode($return);exit();
	}
	function getJobList_action(){
		$id     =   intval($_POST['zid']);
        $return =   array();
        $return['total']      =   0;
        if($id){
            $page   =   intval($_POST['page']);
        
            $zphM   =   $this->MODEL('zph');
            $limit   =   intval($_POST['limit']);
            
            $zjwhere            =   array();
            $zjwhere['zid']     =   $id;
            $zjwhere['status']  =   1;
            $zjwhere['orderby'] =   array('sort,desc','ctime,asc');

            $zjwhereData        =   array('zwhereData'=>$zjwhere);

            $zjlimit            =   $limit?$limit:10;
            $jwhere['state']    =   1;
            $jwhere['status']   =   0;
            $jwhere['r_status'] =   1;
            if($page > 0){
                    
                $pagenav  =  ($page - 1) * $zjlimit;
                $jwhere['limit']  =  array($pagenav,$zjlimit);
                
            }else{
                
                $jwhere['limit']  =  $zjlimit;
            }
            $jwhere['orderby']  =   'lastupdate,desc';

            $zjwhereData['jwhereData'] = $jwhere;

            $zjList             =   $zphM -> getZphJobList($zjwhereData);
            $return['total']    =   $zjList['zjnum'];
            $return['list']   	=   $zjList['list'];
            $return['error']    =   1;
            $return['msg']      =   '';
        }else{
            $return['list']   	=   array();
            $return['error']    =   0;
            $return['msg']      =   '参数错误请重试';
        }

        echo json_encode($return);exit();
	}
}
?>