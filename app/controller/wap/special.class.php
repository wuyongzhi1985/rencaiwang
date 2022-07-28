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
class special_controller extends common{
	function index_action(){
		$this->yunset("headertitle","专题招聘");
		$this->seo("spe_index");
		$this->yuntpl(array('wap/spe_index'));
	}
	function show_action(){
		$specialM	=	$this->MODEL('special');
		$info		=	$specialM->getSpecialOne(array("id"=>(int)$_GET['id'],"display"=>1));
        if(empty($info)){
            $this -> ACT_msg_wap($_SERVER['HTTP_REFERER'], '没有找到该专题招聘');
        }
		$this->yunset("info",$info);

        if($info['etime']<time()){
            $this->yunset("isover",1);
        }
		if($this->uid && $this->usertype=='2'){
			$isapply	=	$specialM->getSpecialComOne(array("uid"=>$this->uid,"sid"=>(int)$_GET['id']));

			$this->yunset("isapply",$isapply);
		}

		$this->data	=	array('spename'=>$info['title']);
		$this->seo("spe_show");

		$this->yunset("headertitle","专题详情页");

        if ($info['tpl'] == 'gl.htm'){
            // 该模板需要所有参会企业uid，来查参会企业相关数据
            $cuid = array();
            $coms = $specialM->getSpecialComList(array('sid'=>(int)$_GET['id'], 'status'=> 1), array('field'=>'`uid`'));
            foreach ($coms['list'] as $v){
                $cuid[] = $v['uid'];
            }
            // 该模板需要的名企
            $hotcom  =  $specialM->glFamous(array('sid'=>$info['id'], 'orderby'=>'sort', 'limit'=>12));
            $this->yunset('hotcom', $hotcom);
            // 该模板所需的行业
            $hy = $specialM->getSpecialHy($cuid);
            $this->yunset($hy);
            
            $this->yuntpl(array('wap/spe_gl'));
        }else{
            $this->yuntpl(array('wap/spe_show'));
        }
	}
	function apply_action(){
		$data		=	array(
			'id'		=>	(int)$_POST['id'],
			'uid'		=>	$this->uid,
			'usertype'	=>	$this->usertype,
		);
		$specialM	=	$this->MODEL('special');
		$return		=	$specialM->addSpecialComInfo($data);
		if($return['url']){
			$this->layer_msg($return['msg'],$return['errcode'],0,$return['url']);
		}else{
			$this->layer_msg($return['msg'],$return['errcode'],0);
		}
	}
	// gl模板查询企业列表
	function getComList_action(){
	    
	    $res = $this->MODEL('special')->glComList($_POST['sid'], $_POST['hy'], $_POST['page'], $_POST['numb']);
	    
	    echo json_encode($res);
	}
	// gl模板查询职位列表
	function getJobList_action(){
	    
	    $res = $this->MODEL('special')->glJobList($_POST);
	    
	    echo json_encode($res);
	}
	// 职位专题详情
	function job_action(){
        $this->yunset("headertitle","职位专题");
	    $id    =  (int)$_GET['id'];
	    $sjM   =  $this->MODEL('specialjob');
	    $info  =  $sjM->getInfo(array('id'=>$id,'display'=>1));
	    if (empty($info)){
	        $this->ACT_msg($this->config['sy_weburl'], '没有找到该职位专题');
	    }

	    $this->yunset('info',$info);
        $this -> yunset('uid', $this->uid);
	    $this->data  =  array('spename'=>$info['title']);
	    $this->seo("spe_job");
	    
	    $this->yuntpl(array('wap/special_job'));
	}
    function joblist_action(){
        $sjM  =	$this->MODEL('specialjob');
        $page		=	$_POST['page'];
        $limit		=	$_POST['limit'];
        $limit		=	!$limit?20:$limit;
        $where['sid'] = intval($_POST['id']);
        if($page){
            $pagenav		=	($page-1)*$limit;
            $where['limit']	=	array($pagenav,$limit);
        }else{
            $where['limit']	=	array('',$limit);
        }
        $List = $sjM->getjobList($where, array('utype'=>'1'));
        $data['list']	=	count($List)?$List:array();
        echo json_encode($data);
    }
    function hotjobclass_action(){
        $categoryM	=	$this -> MODEL('category');
        $List = $categoryM->getHotJobClass(array('rec'=>1),'*');

        echo json_encode($List);
    }
}
?>