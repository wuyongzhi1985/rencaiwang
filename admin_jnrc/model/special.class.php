<?php
/*
 * Created on 2012
 * Link for shyflc@qq.com
 * This System Powered by PHPYUN.com
 */
class special_controller extends adminCommon{
	function index_action(){
		$specialM	=	$this->MODEL("special");
		if(trim($_GET['keyword'])){
			$where['title']	=	array('like',trim($_GET['keyword']));
		}

		//分页链接
		$urlarr        	=   $_GET;
		$urlarr['page']	=	'{{page}}';
		$urlarr['c']	=	$_GET['c'];
		$pageurl		=	Url($_GET['m'],$urlarr,'admin');

		//排序
		if($_GET['order']){

			$where['orderby'] = $_GET['t'].','.$_GET['order'];
			$urlarr['order']  =	$_GET['order'];
			$urlarr['t']	  =	$_GET['t'];

		}else{
			$where['orderby']		=	'id,desc';
		}

		//提取分页
		$pageM			=	$this  -> MODEL('page');
		$pages			=	$pageM -> pageList('special',$where,$pageurl,$_GET['page']);

		//分页数大于0的情况下 执行列表查询
		if($pages['total'] > 0){

		    $where['limit']		=	$pages['limit'];

		    $List		=	$specialM->getSpecialList($where,array('utype'=>'admin'));
			$this->yunset("rows",$List['list']);
		}

		$this->yuntpl(array('admin/admin_special'));
	}

	function add_action(){
		$specialM	=	$this->MODEL("special");
		$ratingM	=	$this->MODEL("rating");

		if($_GET['id']){
			$row			=	$specialM->getSpecialOne(array('id'=>$_GET['id']));
			$row['rating']	=	@explode(',',$row['rating']);
			$this->yunset("row",$row);
		}

		$qy_rows	=	$ratingM->getList(array('category'=>1,'orderby'=>'sort,desc'));
		$publicdir 	= 	"../app/template/".$this->config['style']."/special/";
		$filesnames = 	@scandir($publicdir);
		if(is_array($filesnames)){
			foreach($filesnames as $key=>$value){

				if($value!='.' && $value!='..' ){

					 $typearr = explode('.', $value);

					 if(in_array(end($typearr),array('htm'))) {

						 if(!in_array($value, array('index.htm', 'job.htm'))){

							$file[]  =  $value;
						 }
					 }
				 }
			}
		}

		$this->yunset("file",$file);
		$this->yunset("qy_rows",$qy_rows);
		$this->yuntpl(array('admin/admin_special_add'));
	}
	function save_action(){

		$specialM	=	$this->MODEL("special");
	    $id			=	(int)$_POST['id'];
		$data['title']		=	$_POST['title'];
		$data['tpl']		=	$_POST['tpl'];
		$data['display']	=	(int)$_POST['display'];
		$data['integral']	=	(int)$_POST['integral'];
		$data['com_bm']		=	(int)$_POST['com_bm'];
	    $data['sort']		=	(int)$_POST['sort'];
	    $data['limit']		=	(int)$_POST['limit'];
	    $data['etime']		=	strtotime($_POST['etime']);
	    $data['ctime']		=	time();
	    $data['intro']		=	str_replace(array("&amp;","background-color:#ffffff","background-color:#fff","white-space:nowrap;"),array("&",'','',''),$_POST["intro"]);

		if($_POST['rating']	&&	is_array($_POST['rating'])){
	        $data['rating']	=	implode(',',$_POST['rating']);
	    }else{
	        $data['rating']	=	'';
	    }
		if(!empty($_FILES)){
			if($_FILES['sl']['tmp_name']){
				$upArrSl    =  array(
					'file'  	=>  $_FILES['sl'],
					'dir'   	=>  'special',

				);
			}
	 		if($_FILES['bg']['tmp_name']){
				$upArrBg    =  array(
					'file'  	=>  $_FILES['bg'],
					'dir'   	=>  'special',

				);
			}
			if($_FILES['wapsl']['tmp_name']){
			    $upArrWapsl    =  array(
			        'file'  	=>  $_FILES['wapsl'],
			        'dir'   	=>  'special',
			        
			    );
			}
			if($_FILES['wapbg']['tmp_name']){
			    $upArrWapbg    =  array(
			        'file'  	=>  $_FILES['wapbg'],
			        'dir'   	=>  'special',
			        
			    );
			}
			//缩率图参数

			$uploadM  =  $this->MODEL('upload');
			if(isset($upArrSl)){

				$picSl      =  $uploadM->newUpload($upArrSl);//缩略图

			}
			if(isset($upArrBg)){

				$picBg      =  $uploadM->newUpload($upArrBg);//背景图

			}
			if(isset($upArrWapsl)){
			    
			    $wapSl      =  $uploadM->newUpload($upArrWapsl);//移动端缩略图
			    
			}
			if(isset($upArrWapbg)){
			    
			    $wapBg      =  $uploadM->newUpload($upArrWapbg);//移动端背景图
			    
			}
			if (isset($picSl) && !empty($picSl['msg'])){
			    
			    $this->ACT_layer_msg($picSl['msg'],8);
			    
			}elseif (isset($picBg) && !empty($picBg['msg'])){
			    
			    $this->ACT_layer_msg($picBg['msg'],8);
			    
			}elseif (isset($wapSl) && !empty($wapSl['msg'])){
			    
			    $this->ACT_layer_msg($wapSl['msg'],8);
			    
			}elseif (isset($wapBg) && !empty($wapBg['msg'])){
			    
			    $this->ACT_layer_msg($wapBg['msg'],8);
			    
			}else{

				if (!empty($picSl['picurl'])){

					$data['pic'] 		=  	$picSl['picurl'];
				}
				if (!empty($picBg['picurl'])){

					$data['background']	=  	$picBg['picurl'];
				}
				if (!empty($wapSl['picurl'])){
				    
				    $data['wappic']	=  	$wapSl['picurl'];
				}
				if (!empty($wapBg['picurl'])){
				    
				    $data['wapback']	=  	$wapBg['picurl'];
				}
			}
	 	}

		if(!$id){
			$nid	=	$specialM->addSpecial($data);
	        $name	=	"专题招聘（ID：".$nid."）添加";

	    }else{
			$nid	=	$specialM->upSpecial(array('id'=>$id),$data);
	        $name	=	"专题招聘（ID：".$id."）更新";
	    }
		$nid?$this->ACT_layer_msg($name."成功！",9,"index.php?m=special",2,1):$this->ACT_layer_msg($name."失败！",8,"index.php?m=special");
	}
	function com_action(){
		$specialM	=	$this->MODEL("special");

		$where['sid']	=	(int)$_GET['id'];
        if (!empty($_GET['keyword'])){
            $companyM  =  $this->MODEL('company');
            $comlist=  $companyM -> getChCompanyList(array('name'=>array('like',$_GET['keyword'])), array('field'=>'uid'));
            if (!empty($comlist)){
                $uids = array();
                foreach ($comlist as $v){
                    $uids[] = $v['uid'];
                }
                $where['uid'] = array('in', pylode(',', $uids));
            }
        }
		//排序
		if($_GET['order']){

			$where['orderby'] = $_GET['t'].','.$_GET['order'];
			$urlarr['order']  =	$_GET['order'];
			$urlarr['t']	  =	$_GET['t'];

		}else{
			$where['orderby']		=	array('status,asc','uid,desc');
		}

		// 分页链接
		$urlarr        	=   $_GET;
		$urlarr['page']	=	'{{page}}';
		$urlarr['c']	=	$_GET['c'];
		$urlarr['id']	=	$_GET['id'];
		$pageurl		=	Url($_GET['m'],$urlarr,'admin');

		// 提取分页
		$pageM			=	$this  -> MODEL('page');
		$pages			=	$pageM -> pageList('special_com',$where,$pageurl,$_GET['page']);

		// 分页数大于0的情况下 执行列表查询
		if($pages['total'] > 0){

		    $where['limit']			=	$pages['limit'];

		    $List					=	$specialM->getSpecialComList($where,array('utype'=>'admin'));
			$this->yunset("rows",$List['list']);
		}

		$special	= 	$specialM->getSpecialOne(array('id'=>(int)$_GET['id']),array('field'=>'`title`,`limit`,`tpl`'));
        $applynum 	=	$specialM->getSpecialComNum(array("sid"=>(int)$_GET['id'],'status'=>'1'));
		if($special['limit']>$applynum){
			$this->yunset("applyman",'1');
		}
		$this->yunset("special",$special);
		$this->yunset("sid",$_GET['id']);
		$this->yuntpl(array('admin/admin_special_com'));
	}
	function comxls_action(){

		$specialM	=	$this->MODEL("special");

		$CompanyM		=	$this -> MODEL('company');

		$JobM			=	$this -> MODEL('job');

		if($_POST['zid']){

			if($_POST['cid']){
				$zcwhere = array('id'=>array('in',$_POST['cid']));
			}else{
				$zcwhere = array('sid'=>$_POST['zid']);
			}
			
		    $rows		=	$specialM -> getSpecialComList($zcwhere);
		    
			if(!empty($rows['list'])){

			    $cacheM  =  $this->MODEL('cache');
			    $cache   =  $cacheM->getCache(array('com'));

			    $comclass_name  =  $cache['comclass_name'];

                $jobids = $jobuids = $comids = array();
				foreach ($rows['list'] as $key=>$val){

				    $comids[]   =   $val['uid'];

				    $jobuids[]  =   $val['uid'];
                    
				}

				$comField  =  '`uid`,`name`,`mun`,`content`,`address`,`linktel`,`linkman`,`linkphone`,`welfare`,`money`,`moneytype`';

				$companys  =  $CompanyM -> getChCompanyList(array('uid'=>array('in',@implode(',',$comids))),array('field'=>$comField));

				$jobField  =  '`id`,`uid`,`name`,`number`,`minsalary`,`maxsalary`,`exp`,`edu`,`provinceid`,`cityid`,`three_cityid`';

                $jobWhere['state']          =   1;
                $jobWhere['status']         =   0;
                $jobWhere['r_status']       =   1;

                $jobWhere['PHPYUNBTWSTART'] =   '';
                $jobWhere['uid']	        =	array('in',pylode(',',$jobuids));
                $jobWhere['id']	            =	array('in',pylode(',',$jobids), 'OR');
                $jobWhere['PHPYUNBTWEND']   =   '';

				$jobsA	   =  $JobM -> getList($jobWhere,array('field'=>$jobField));
				$jobs	   =  $jobsA['list'];


				foreach($companys as $k=>$va){

					$companys[$k]['content']	=	trim(strip_tags($va['content']));

					$companys[$k]['mun']		=	$comclass_name[$va['mun']];

					foreach($jobs as $val){
					    if ($va['uid'] == $val['uid']){
					        $companys[$k]['jobs'][]  =  $val;
					    }
					}
				}
				$maxJobNum = 1;
				foreach ($companys as $v){
				    $jobnum  =  count($v['jobs']);
				    if ($jobnum > $maxJobNum){
				        $maxJobNum  =  $jobnum;
				    }
				}
				$jobTr = $jobSonTr = '';

				for($i=1;$i<=$maxJobNum;$i++){

					$jobTr .= '<th colspan="6">岗位'.$i.'</th>';

					$jobSonTr .= '<th>招聘岗位</th><th>招聘人数</th><th>薪酬</th><th>经验要求</th><th>学历要求</th><th>工作地点</th>';
				}

				$this -> yunset('jobTr',$jobTr);

				$this -> yunset('jobSonTr',$jobSonTr);

				$this -> yunset('list',$companys);

				$this -> MODEL('log') -> addAdminLog('导出报名专题招聘信息');

				header('Content-Type: application/vnd.ms-excel');

				header('Content-Disposition: attachment; filename=special.xls');

				$this->yuntpl(array('admin/admin_special_comxls'));

			}else{

				$this->ACT_layer_msg('没有可以导出的参会企业信息！',8,$_SERVER['HTTP_REFERER']);
			}
		}

	}
	function statuscom_action(){
		$specialM	=	$this->MODEL("special");
		$IntegralM	=	$this->MODEL('integral');

		$pid		=	$_POST['pid'];
		$status		=	(int)$_POST['status'];
		$statusbody	=	trim($_POST['statusbody']);

		if($status=='2'){
			$iWhere['id']		=	array('in',$pid);
			$iWhere['status']	=	array('<>','2');
			$idata['field']		=	"`uid`,`integral`";
			$rows				=	$specialM->getSpecialComList($iWhere,$idata);
		}

		$upWhere['id']			=	array('in',$pid);
		$upWhere['status']		=	array('<>','2');
		$upData['status']		=	$status;
		$upData['statusbody']	=	$statusbody;
		$id						=	$specialM->upSpecialCom($upWhere,$upData);

		if($id&&is_array($rows['list'])){
			foreach($rows['list'] as $val){
				if($val['integral']>0){
					$IntegralM->company_invtal($val['uid'],2,$val['integral'],true,"专题招聘未通过审核，退还".$this->config['integral_pricename'],true,2,'integral');
				}
			}
		}

		$lWhere['id']		=	array('in',$pid);
		$ldata['field']		=	"`sid`,`uid`";
		$list				=	$specialM->getSpecialComList($lWhere,$ldata);

		if($list['list']){
			/* 消息前缀 */
			$sysmsgM			=	$this->MODEL('sysmsg');

			$tagName  			=	'专题报名';

			foreach($list['list'] as $v){

				 $sid  			=	$v['sid'];

			}
			$special			= 	$specialM->getSpecialOne(array('id'=>$sid),array('field'=>'`title`'));

			//发送企业
			foreach($list['list'] as $v){

				 $uids[]  =  $v['uid'];

				/* 处理审核信息 */
				if ($_POST['status'] == 2){

					$statusInfo  =  '您参与的专题'.$special['title'].':报名审核未通过';

					if($_POST['statusbody']){

						$statusInfo  .=  ' , 原因：'.$_POST['statusbody'];

					}

					$msg[$v['uid']]  =  $statusInfo;

				}elseif($_POST['status'] == 1){

					$msg[$v['uid']]  =   '您参与的专题'.$special['title'].':报名已审核通过';

				}
			}

			//发送系统通知
			$sysmsgM -> addInfo(array('uid'=>$uids,'usertype'=>2, 'content'=>$msg));
		}

        if (isset($_POST['single'])){
            if ($id){
                $this->layer_msg("操作成功！",9);
            }else{
                $this->layer_msg("操作失败！",8);
            }
        }else{
            $id?$this->ACT_layer_msg("操作成功！",9,$_SERVER['HTTP_REFERER']):$this->ACT_layer_msg("操作失败！",8,$_SERVER['HTTP_REFERER']);
        }
	}

    function audit_action(){
        $id =  intval($_GET['id']);

        $specialM =	$this->MODEL("special");
        $ComM     = $this -> MODEL('company');

        $specialCom	  =  $specialM->getSpecialComOne(array('id'=>$id),array('field'=>'id,uid,status,statusbody'));

        $Info  =  $ComM->getInfo($specialCom['uid']);

        $Info['special'] = $specialCom;

        $this->yunset('Info', $Info);

        $this->yuntpl(array('admin/admin_special_comaudit'));
    }

	function getinfo_action(){
		$specialM		=	$this->MODEL("special");

		$where['id']	=	intval($_POST['id']);

		$data['field']	=	'`statusbody`';

		$row			=	$specialM->getSpecialComOne($where,$data);
		echo $row['statusbody'];die;
	}
	function delcom_action(){
		$specialM		=	$this->MODEL("special");

		$this->check_token();

	    if($_GET['del']||$_GET['id']){

    		if(is_array($_GET['del'])){
    			$layer_type	=	1;
				$del		=	pylode(',',$_GET['del']);
	    	}else{
	    		$layer_type	=	0;
	    		$del		=	$_GET['id'];
	    	}
			$specialM->delSpecialCom(array('id'=>array('in',$del)),array('type'=>'all'));

			$this->layer_msg("公司申请(ID:".$del.")删除成功！",9,$layer_type,$_SERVER['HTTP_REFERER']);
    	}else{
			$this->layer_msg("请选择您要删除的信息！",8,1);
    	}
	}
	function del_action(){
		$specialM		=	$this->MODEL("special");

		$_GET['id']		=	(int)$_GET['id'];

		if($_GET['del']||$_GET['id']){
			if(is_array($_GET['del'])){
				$layer_type	=	1;
				$del		=	pylode(',',$_GET['del']);
			}else{
				$layer_type	=	0;
				$del		=	$_GET['id'];
			}
			$specialM->delSpecial(array('id'=>array('in',$del)),array('type'=>'all'));

			$this->layer_msg("专题(ID:".$del.")删除成功！",9,$layer_type,$_SERVER['HTTP_REFERER']);
		}else{
			$this->layer_msg("请选择您要删除的信息！",8,1);
		}
	}

    function recommend_action(){
		$specialM	=	$this->MODEL('special');
		$logM		=	$this->MODEL('log');

		if($_GET['type']=="rec_display"){
			$data['display']	=	$_GET['rec'];
			$where['id']		=	$_GET['id'];

			$nid	=	$specialM->upSpecial($where,$data);
			$logM	->	addAdminLog("专题名称(ID:".$_GET['id'].")");
		}

		echo $nid?1:0;die;

	}

	function ajaxsort_action(){
		if($_POST['id']){
			$specialM	=	$this->MODEL('special');
			if (!empty($_POST['sort'])){
				$uparr['sort']  =  intval($_POST['sort']);
			}
			$specialM->upSpecialCom(array('id'=>$_POST['id']),$uparr);
			echo '1';die;
		}
	}

	//排序设置
    function setOrder_action()
    {

        $post       =   $_POST;
        $specialM   =   $this->MODEL('special');
        $where      =   array('id' => $post['id']);
        $data       =   array('sort' => $post['sort']);
        $specialM->upSpecial($where, $data);
        echo 1;
    }

    function set_comaddsearch()
    {

        $ratingM    =   $this->MODEL('rating');
        $rating     =   $ratingM->getList(array('category' => '1', 'orderby' => 'sort'), array('field' => '`id`,`name`'));
        if(!empty($rating)){
            $ratingarr    =   array();
            foreach($rating  as  $k => $v){

                $ratingarr[$v['id']]   =   $v['name'];
            }
        }
        include(CONFIG_PATH.'db.data.php');
        $source             =   $arr_data['source'];
        $timeSection        =   array('1'=>'今天', '3'=>'3天内', '7'=>'7天内', '15'=>'半月内', '30'=>'1个月内', '31'=> '1-3个月', '32' => '3-6个月', '33' => '6个月-1年', '34' => '1年以上');
        $status             =   array('1'=>'已审核', '2'=>'已锁定', '3'=>'未通过', '4'=>'未审核','5'=>'已暂停');
        $edtime             =   array('1'=>'7天内', '2'=>'一个月内', '3'=>'半年内', '4'=>'一年内', '5'=>'已到期');
        $isrec              =   array('1'=>'是', '2'=>'否', '3'=>'已到期');
        $isgw               =   array('1'=>'已分配', '2'=>'未分配');
        $search_list        =   array();
        $search_list[]      =   array('param'=>'rating','name'=>'会员等级','value'=>$ratingarr);
        $search_list[]      =   array('param'=>'time','name'=>'到期时间','value'=>$edtime);
        $search_list[]      =   array('param'=>'status','name'=>'审核状态','value'=>$status);
        $search_list[]      =   array('param'=>'source','name'=>'数据来源','value'=>$source);
        $search_list[]      =   array('param'=>'rec','name'=>'知名企业','value'=>$isrec);
        $search_list[]      =   array('param'=>'gw','name'=>'企业顾问','value'=>$isgw);
        $search_list[]      =   array('param'=>'lotime','name'=>'最近登录','value'=>$timeSection);
        $search_list[]      =   array('param'=>'adtime','name'=>'最近注册','value'=>$timeSection);
        $this->yunset(array('source' => $source, 'ratingarr' => $ratingarr, 'search_list' => $search_list));
    }

	// 添加参会企业
	function addlist_action()
    {

        $ComM          =   $this -> MODEL('company');
        $where         =   array('r_status'=>1);
        $mwhere        =   array();
        $urlarr        =   $_GET;
        if ($_GET['keyword']) {

            $keywordStr =   trim($_GET['keyword']);
            $typeStr    =   intval($_GET['type']);

            if (!empty($keywordStr) && $typeStr == 1) {

                $where['name']      =   array('like', $keywordStr);
            } elseif (!empty($keywordStr) && $typeStr == 2) {

                $mwhere['username'] =   array('like', $keywordStr);
            } else if (!empty($keywordStr) && $typeStr == 3) {

                $where['linkman']   =   array('like', $keywordStr);
            } else if (!empty($keywordStr) && $typeStr == 4) {

                $where['linktel']   =   array('like', $keywordStr);
            } else if (!empty($keywordStr) && $typeStr == 5) {

                $where['linkmail']  =   array('like', $keywordStr);
            } else if (!empty($keywordStr) && $typeStr == 6) {

                $where['uid'][]     =   array('=', $keywordStr);
            }

            $urlarr['type']     =   $typeStr;
            $urlarr['keyword']  =   $keywordStr;
        }

        if ($_GET['status']) {

            $status =   intval($_GET['status']);
            if ($status == 4) {

                $where['r_status']  =   0;
            } else if ($status == 5) {

                $where['r_status']  =   4;
            } else {

                $where['r_status']  =   $status;
            }
            $urlarr['r_status']     =   $status;
        }

        if ($_GET['adtime']) {

            $adtime = intval($_GET['adtime']);

            if ($adtime == 1) {

                $mwhere['reg_date'] = array('>', strtotime('today'));
            } else if ($adtime < 31) {

                $mwhere['reg_date'] = array('>', strtotime('-' . $adtime . ' day'));
            } else if ($adtime == 31) {// 1 - 3 个月
                $mwhere['PHPYUNBTWSTART_C'] = '';
                $mwhere['reg_date'][] = array('<', strtotime('-1 month'));
                $mwhere['reg_date'][] = array('>=', strtotime('-3 month'));
                $mwhere['PHPYUNBTWEND_C'] = '';
            } else if ($adtime == 32) {// 3 - 6个月
                $mwhere['PHPYUNBTWSTART_C'] = '';
                $mwhere['reg_date'][] = array('<', strtotime('-3 month'));
                $mwhere['reg_date'][] = array('>=', strtotime('-6 month'));
                $mwhere['PHPYUNBTWEND_C'] = '';
            } else if ($adtime == 33) {// 6个月 - 1年
                $mwhere['PHPYUNBTWSTART_C'] = '';
                $mwhere['reg_date'][] = array('<', strtotime('-6 month'));
                $mwhere['reg_date'][] = array('>=', strtotime('-12 month'));
                $mwhere['PHPYUNBTWEND_C'] = '';
            } else if ($adtime == 34) {// 1年以上
                $mwhere['reg_date'] = array('<', strtotime('-1 year'));
            }

            $urlarr['adtime'] = $adtime;
        }

        if($_GET['lotime']){

            $lotime    =   intval($_GET['lotime']);
            if($lotime ==  1){
                $mwhere['login_date']  =   array('>',  strtotime('today'));
            }else if ($lotime < 31){
                $mwhere['login_date']  =   array('>',  strtotime('-'.$lotime.' day'));
            }else if ($lotime == 31){
                $mwhere['PHPYUNBTWSTART_C']    =   '';
                $mwhere['login_date'][]  =   array('<',  strtotime('-1 month'));
                $mwhere['login_date'][]  =   array('>=',  strtotime('-3 month'));
                $mwhere['PHPYUNBTWEND_C']      =   '';
            }else if ($lotime == 32){
                $mwhere['PHPYUNBTWSTART_C']    =   '';
                $mwhere['login_date'][]  =   array('<',  strtotime('-3 month'));
                $mwhere['login_date'][]  =   array('>=',  strtotime('-6 month'));
                $mwhere['PHPYUNBTWEND_C']      =   '';
            }else if ($lotime == 33){
                $mwhere['PHPYUNBTWSTART_C']    =   '';
                $mwhere['login_date'][]  =   array('<',  strtotime('-6 month'));
                $mwhere['login_date'][]  =   array('>=',  strtotime('-12 month'));
                $mwhere['PHPYUNBTWEND_C']      =   '';
            }else if ($lotime == 34){
                $mwhere['login_date']  =   array('<',  strtotime('-1 year'));
            }
            $urlarr['lotime']          =   $lotime;
        }

        if($_GET['source']){

            $mwhere['source']          =   $_GET['source'];
            $urlarr['source']          =   $_GET['source'];
        }

        $mUids		=	array();
        $UserinfoM	=	$this -> MODEL('userinfo');
        if(!empty($mwhere)){
            $uidList    =   $UserinfoM->getList($mwhere, array('field' => '`uid`'));
            if(!empty($uidList)){
                foreach($uidList as $uv){
                    $mUids[]	=	$uv['uid'];
                }
            }else{
                $mUids			=	array(0);
            }
            $where['uid'][] =	array('in', pylode(',',$mUids));
        }

        if($_GET['rating']){

            $where['rating']   =   $_GET['rating'];
            $urlarr['rating']   =   $_GET['rating'];
        }
        $toDay	    =	strtotime(date('Y-m-d'));
        if($_GET['time']){
            $time   =   intval($_GET['time']);
            if($time == 5){

                $where['PHPYUNBTWSTART_A']    =   '';
                $where['vipetime'][]         =   array('>', '0','AND');
                $where['vipetime'][]         =   array('<',  $toDay,'AND');
                $where['PHPYUNBTWEND_A']      =   '';
            }else{

                if($time == 1){

                    $num   =   '+7 day';
                }elseif($time == 2 ){

                    $num   =   '+1 month';
                }elseif($time == 3){

                    $num   =   '+6 month';
                }elseif($time == 4){

                    $num='+1 year';
                }

                $where['PHPYUNBTWSTART_B']    =   '';
                $where['vipetime'][]         =   array('>', time(),'AND');
                $where['vipetime'][]         =   array('<', strtotime($num),'AND');
                $where['PHPYUNBTWEND_B']      =   '';
            }
            $urlarr['time']    =   $time;
        }

        if($_GET['rec']){
            $rec    =   intval($_GET['rec']);
            if($rec == 1){
                $where['rec']       =   '1';
                $where['hottime']   =   array('>', time());
            }elseif ($rec == 2){
                $where['rec']       =   '0';
            }elseif ($rec == 3){
                $where['rec']       =   '1';
                $where['hottime']   =   array('<', time());
            }
            $urlarr['rec']          =   $rec;
        }

        if($_GET['gw']){
            if(intval($_GET['gw']) == 1){
                $where['crm_uid']     =   array('<>', '0');
            }else{
                $where['crm_uid']     =   '0';
            }
            $urlarr['gw']           =   $_GET['gw'];
        }
        $urlarr['page']	=	'{{page}}';
        $pageurl		=	Url($_GET['m'], $urlarr, 'admin');
        $pageM			=	$this  -> MODEL('page');
        $pages			=	$pageM -> pageList('company', $where, $pageurl, $_GET['page']);

        //分页数大于0的情况下 执行列表查询
        if($pages['total'] > 0){

            //limit order 只有在列表查询时才需要
            if($_GET['order']){

                $where['orderby']		=	$_GET['t'].','.$_GET['order'];
                $urlarr['order']		=	$_GET['order'];
                $urlarr['t']			=	$_GET['t'];
            }else if($_GET['time'] == '5'){

                $where['orderby']		=	array('vipetime,desc','uid,desc');

            }else if($_GET['time']){

                $where['orderby']		=	array('vipetime,asc');

            }else if($_GET['lotime']){

                $where['orderby']		=	array('login_date,desc');

            }else{

                $where['orderby']		=	'uid,desc';
            }

            $where['limit']				=	$pages['limit'];

            $ListNew    =   $ComM -> getList($where,array('utype'=>'admin'));

            // 查询本场网招参会企业，在待添加企业列表中展示，企业是否已参加
            $specialM   =   $this->MODEL('special');
            $netcom     =   $specialM->getSpecialComList(array('sid'=>$_GET['sid']),array('field'=>'uid'));

            if (!empty($netcom['list'])){
                foreach ($netcom['list'] as $v){
                    $ncuid[]    =   $v['uid'];
                }
            }

            foreach ($ListNew['list']  as $key => $val){
                $ListNew['list'][$key]['wxBindmsg'] = $this->wxBindState($val);
                $ListNew['list'][$key]['join'] = 0;
                if (!empty($ncuid)){
                    if (in_array($val['uid'], $ncuid)){
                        $ListNew['list'][$key]['join'] = 1;

                    }
                }
            }
            unset($where['limit']);
            $this->yunset(array('rows' => $ListNew['list']));
        }

        $cacheM = $this->MODEL('cache');
        $domain = $cacheM->GetCache('domain');
        $this->yunset('Dname', $domain['Dname']);
        $this->set_comaddsearch();

	    $this->yuntpl(array('admin/admin_special_company'));
	}

	// 添加参会企业保存
    function savespecial_action()
    {

        $SpecialM = $this->MODEL('special');

        $id     =   intval($_POST['sid']);
        $uid    =   intval($_POST['uid']);
        $isapply=   $SpecialM->getSpecialComNum(array("uid" => $uid, "sid" => $id));
        if ((int)$isapply > 0) {
            $this->ACT_layer_msg('该企业已报名', 8);
        }

        $nid    =   $SpecialM->addSpecialCom(array("sid" => $id, "uid" => $uid, 'sort' => 0, 'status' => '1', 'time' => time()));
        if (isset($nid)) {

            $return =   array(
                'errcode'   =>  9,
                'msg'       =>  '专题招聘报名成功(专题ID：' . $id . '，企业ID：' . $uid . ')'
            );

        } else {
            $return =   array(
                'errcode'   =>  8,
                'msg'       =>  '专题招聘报名失败'
            );
        }
        echo json_encode($return);exit();
    }

    function mutiAddCom_action()
    {

        $specialM = $this->MODEL('special');
        $data['uid'] = $_POST['uid'];
        $data['sid'] = intval($_POST['sid']);
        $return = $specialM->addSpecialMutiCom($data);
        echo json_encode($return);
        exit();
    }

	//根据企业名称搜索企业列表
	function getcomlist_action(){
	    
	    $companyM  =  $this->MODEL('company');
	    
	    $comname   =  trim($_POST['comname']);
	    
	    $rows	=  $companyM -> getChCompanyList(array('name'=>array('like',$comname)));
	    
	    $html 	=  '<option value="">请选择</option>';
	    
	    foreach ($rows as $v){
	        
	        $html .= '<option value="'.$v['uid'].'">'.$v['name'].'</option>';
	    }
	    
	    echo $html;
	}

	function setFamous_action()
	{
	    $famous = $_POST['famous'] == 1 ? 0 : 1;
	    
	    $specialM  =  $this->MODEL('special');
	    $nid = $specialM->upSpecialCom(array('sid'=>$_POST['sid'], 'uid'=>$_POST['uid']), array('famous'=>$famous));
	    
	    if ($nid){
	        $this->layer_msg('名企设置成功', 9);
	    }else{
	        $this->layer_msg('名企设置失败', 8);
	    }
	}
}
?>