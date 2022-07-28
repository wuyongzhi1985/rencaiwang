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

class job_controller extends com_controller
{

    function joblist_action()
    {
        $where['uid']   =   $this->member['uid'];
        $page           =   $_POST['page'];


        $stype  =   $_POST['stype'];

        if(isset($_POST['name']) && $_POST['name'] !== ''){
            $where['name'] = array('like', '%' . $_POST['name'] . '%');
        }

        if ($stype == '1') {

            $where['state']     =   1;
            $where['status']    =   array('<>', 1);
        } else if ($stype == '2') {

            $where['state']     =   array('<>', 1);
        } else if ($stype == '3') {

            $where['status']    =   1;
        }

        $jobM           =   $this->MODEL('job');
        $data['total']  =   $jobM->getJobNum($where);

        if ($_POST['limit']) {

            $limit      =   $_POST['limit'];

            if ($page) {//分页

                $pagenav        =   ($page - 1) * $limit;
                $where['limit'] =   array($pagenav, $limit);
            } else {

                $where['limit'] =   $limit;
            }
        }
        $where['orderby']       =   'lastupdate';
        $rows   =   $jobM->getList($where, array('sqjobnum' => 'yes', 'utype' => 'wxapp', 'reserve' => 1));
        $zp =   $sh =   $xj =   0;

        if ($stype == '1') {

            $zp =   count($rows['list']);
        } else if ($stype == '2') {

            $sh =   count($rows['list']);
        } else if ($stype == '3') {

            $xj =   count($rows['list']);
        }

        $data['list']   =   count($rows['list']) > 0 ? $rows['list'] : array();
        $data['statis'] =   $this->company_statis($this->member['uid']);

        $data['zp']     =   $zp;
        $data['sh']     =   $sh;
        $data['xj']     =   $xj;

        $data['iosfk']  =   $this->config['sy_iospay'];
        $data['fktype'] =   $this->fktype();

        $data['config'] =   array(

            'tg_back'       =>  $this->config['tg_back'],

            'topPrice'      =>  $this->config['integral_job_top'],
            'recPrice'      =>  $this->config['com_recjob'],
            'urgentPrice'   =>  $this->config['com_urgent'],
            'autoPrice'     =>  $this->config['job_auto'],

            'online'        =>  $this->config['com_integral_online'],
            'integral_name' =>  $this->config['integral_pricename'],
            'integral_proportion'   =>  $this->config['integral_proportion'],
            'integral_min'   =>  $this->config['integral_min_recharge']

        );

        $comSingle	                    =	@explode(',', $this->config['com_single_can']);
        $data['config']['topJob']       =   in_array('jobtop', $comSingle)? '1' : '2';
        $data['config']['recJob']       =   in_array('jobrec', $comSingle)? '1' : '2';
        $data['config']['urgentJob']    =   in_array('joburgent', $comSingle)? '1' : '2';

        $onlyPrice	                    =	@explode(',', $this->config['sy_only_price']);
        $data['config']['onlyTop']      =   in_array('jobtop', $onlyPrice)? '1' : '2';
        $data['config']['onlyRec']      =   in_array('jobrec', $onlyPrice)? '1' : '2';
        $data['config']['onlyUrgent']   =   in_array('joburgent', $onlyPrice)? '1' : '2';
        $data['config']['onlyAuto']     =   in_array('sxjob', $onlyPrice)? '1' : '2';


        if ($this->config['com_job_reserve'] == 1) {

            $data['reserve']    =   $this->config['com_job_reserve'];
            $data['interval']   =   $this->config['sy_reserve_refresh_interval'];
            $data['proportion'] =   $this->config['sy_reserve_refresh_price'];
            $data['serviceId']  =   $this->config['sy_reserve_service_id'];

            $data['reserveNum'] =   intval($data['statis']['breakjob_num'] / $this->config['sy_reserve_refresh_price']);
        } else {

            $data['reserve']    =   0;
        }
        $data['jzl']  =  isset($this->config['sy_job_lookfx']) ? $this->config['sy_job_lookfx'] : 0;

        $this->render_json(1, 'ok', $data);
    }

    /**
     * 职位列表tab数量统计
     */
    function jobnum_action()
    {
        $where['uid']   =   $this->member['uid'];

        if(isset($_POST['name']) && $_POST['name'] !== ''){
            $where['name'] = array('like', '%' . $_POST['name'] . '%');
        }

        $xjWhere = $dsWhere = $zpWhere = $where;
        // 招聘中
        $zpWhere['state']     =   1;
        $zpWhere['status']    =   array('<>', 1);
        // 待审
        $dsWhere['state']     =   array('<>', 1);
        // 下架
        $xjWhere['status']    =   1;

        $jobM           =   $this->MODEL('job');

        $data['count']['zp']      =   $jobM->getJobNum($zpWhere);
        $data['count']['ds']      =   $jobM->getJobNum($dsWhere);
        $data['count']['xj']      =   $jobM->getJobNum($xjWhere);

        $this->render_json(0, 'ok', $data);
    }

    function getJobShare_action()
    {

        $JobM   =   $this->MODEL('job');
        $job    =   $JobM->getInfo(array('id' => $_POST['id'], 'r_status' => array('<>', 2)), array('field' => '`id`,`uid`,`name`,`r_status`,`com_logo`'));

        $jobsharedata		=   $JobM -> getInfo(array('id' => $_POST['id'] ,'r_status' => array('<>', 2)), array('utype'=>'wxapp','com' => 'yes'));
        if (!empty($job)) {

            $hbids  =   array();
            if (isset($_POST['provider'])) {

                // app用分享数据
                if ($_POST['provider'] == 'app') {
                    $data['shareData']  =   array(
                        'url'       =>  Url('wap', array('c' => 'job', 'a' => 'comapply', 'id' => $job['id'])),
                        'title'     =>  $job['name'],
                        'summary'   =>  mb_substr(strip_tags($job['content']), 0, 30, 'UTF8'),
                        'imageUrl'  =>  checkpic($job['com_logo'], $this->config['sy_unit_icon'])
                    );
                }
                if ($_POST['provider'] != 'baidu' && $this->config['sy_haibao_isopen'] == 1) {
                    $WhbM           =   $this->MODEL('whb');
                    $syJobHb        =   $WhbM->getWhbList(array('type' => 1, 'isopen' => '1'));
                    $data['hbList'] =   $syJobHb;
                }
                // 百度小程序用seo
			    if ($_POST['provider'] == 'baidu' || $_POST['provider'] == 'weixin'){
			        // 获取seo使用的数据
			        $seodata['job_name']       =   $jobsharedata['jobname']; // 职位名称
			        $seodata['company_name']   =   $jobsharedata['com_name']; // 公司名称
			        $seodata['industry_class'] =   $jobsharedata['hy_n']; // 所属行业
			        $seodata['job_class']      =   $jobsharedata['job_one'] . ',' . $jobsharedata['job_two'] . ',' . $jobsharedata['job_three']; // 职位名称
			        $seodata['job_salary']     =   $jobsharedata['job_salary']; // 职位薪资
			        $seodata['job_desc']       =   $this->GET_content_desc($jobsharedata['description']); // 描述
			        $this->data = $seodata;
                    if ($_POST['provider'] == 'weixin'){
                        $seo            =  $this->seo('comapply','','','',false, true);
                        $data['seo']    =  $seo;
                    }
			    }
			    if ($_POST['provider'] == 'wap'){
			        if(empty($this->config['sy_h5_share'])){
			            // 普通分享链接
			            $data['jobLink']  =  Url('wap', array('c' => 'job', 'a' => 'comapply', 'id' => $_POST['id']));
			        }else{
			            // h5分享链接
			            $data['jobLink']  =  Url('wap', array('c' => 'job', 'a' => 'share', 'id' => $_POST['id']));
			        }
			        $data['shareTitle']  =  $jobsharedata['jobname'];
			        $data['shareDesc']   =  $this->GET_content_desc($jobsharedata['description']); // 描述
			        $data['shareLogo']   =  checkpic($job['com_logo'], $this->config['sy_unit_icon']);
                }
            }
            $data['ishb']   =   $this->config['sy_haibao_isopen'] == 1 ? true : false;
        }

        $wxpubtempM         =   $this->MODEL('wxpubtemp');

        $wxpubtemp_html     =   $wxpubtempM->getOneJob($job['id'], $_POST['provider']);

        $data['wxpubtemp_html'] =   $wxpubtemp_html;

        $this->render_json(1, 'ok', $data);
    }
    
	function jobcolumn_action()
	{
	    include(CONFIG_PATH.'db.data.php');
	    
		$config  =  array(
		    'iosfk'    =>  $this->config['sy_iospay'],
		    'part'     =>  $this->config['sy_part_web'],
		    'zph'      =>  $this->config['sy_zph_web'],
		    'special'  =>  $this->config['sy_special_web']
		);
		$data['config']  =  $config;
		$this->render_json(0, 'ok', $data);
	}
	/**
	 * 发布职位
	 */
	function jobadd_action()
	{
		$provider = isset($_POST['provider'])?$_POST['provider']:'';

	    $statics  =  $this->company_statis($this->member['uid']);

		if(empty($_POST['id'])){
		    
			if($statics['addjobnum']==0){
				$this->render_json(-2, '您的会员已到期');
			}
			if($this->comInfo['lastupdate'] < 1){
			    $this->render_json(-1, '请先完善基本资料');
			}
			$msg  =   array();
			
			$isallow_addjob = '1';
			
			if($this->config['com_enforce_emailcert']=='1'){
			    if($this->comInfo['email_status']!='1'){
			        $isallow_addjob='0';
			        $msg[]='请先完成邮箱认证';
			    }
			}
			if($this->config['com_enforce_mobilecert']=='1'){
			    if($this->comInfo['moblie_status']!='1'){
			        $isallow_addjob='0';
			        $msg[]='请先完成手机认证';
			    }
			}
			if($this->config['com_enforce_licensecert']=='1'){
                $comM   =   $this->MODEL('company');
                $cert   =   $comM -> getCertInfo(array('uid'=>$this->member['uid'],'type'=>3), array('field' => 'uid,status'));

                if($this->comInfo['yyzz_status']!='1' && (empty($cert) || $cert['status'] == 2)){
			        $isallow_addjob='0';
			        $msg[]='请先完成企业资质认证';
			    }
			}
			if($this->config['com_enforce_setposition']=='1'){
			    if(empty($this->comInfo['x'])||empty($this->comInfo['y'])){
			        $isallow_addjob='0';
			        $msg[]='请先完成企业地图设置';
			    }
			}
			if($this->config['com_gzgzh']=='1'){

			    $field = '`wxid`,`wxopenid`,`unionid`';
			    if ($provider == 'app'){
			        $field = '`wxid`,`wxopenid`,`unionid`,`app_wxid`';
			    }
			    
                $userInfoM  =  $this->MODEL('userinfo');
                $uInfo		=  $userInfoM->getInfo(array('uid'=>$this->member['uid']),array('field'=>$field));

			    if (isset($_POST['source']) && $_POST['source'] == 'wap'){

                    if (empty($uInfo['wxid']) && empty($uInfo['unionid'])) {
                        $isallow_addjob = '0';
                        $msg[]  =   '微信公众号未关注';
                    }
                }else{

                    if(empty($uInfo['wxopenid']) && empty($uInfo['unionid'])){
                        $isallow_addjob='0';
                        if (!empty($uInfo['wxid'])){
                            $msg[]='微信绑定失效请重新绑定';
                        }else {
                            $msg[]='请先完成绑定微信';
                        }
                    }
                }
            }
			
			if($isallow_addjob=='0'){
			    
			    $data['msg'] =   implode(',',$msg).'！';
			    
			}
			if($data['msg']!=''){
			    $this->render_json(-1, $data['msg']);
			}
		}
   
		$jobM		=	$this -> MODEL('job');

		if(!empty($_POST['id'])){

			$row  =  $jobM->getInfo(array('id' => intval($_POST['id'])),array('add'=>'yes'));
			if (!empty($row)) {
			    
			    $row['langid']  =  pylode(',', $row['lang']);
			    $row['days']    =  ceil(($row['edate'] - $row['sdate']) / 86400);
			    $row['salary_n'] = $row['job_salary'];
			    
			    if (!empty($row['description'])) {
			        $row['description_t']  =  strip_tags($row['description']);
			    }
			    if($this->config['com_job_myswitch']=="1" && $row['id'] && !$row['minsalary'] && !$row['maxsalary']){
			        $row['salarytype']  =  1;
			    }else{
			        $row['salarytype']  =  '';
			    }
			    if (!empty($row['x']) && !empty($row['y'])){
                    if (!empty($_POST['source']) && $_POST['source'] == 'wap') { // WAP站百度坐标系，不需要转
                    } else {
                        $newxy  =  $this->Convert_BD09_To_GCJ02($row['x'], $row['y']);
                        $row['x']  =  $newxy['lng'];
                        $row['y']  =  $newxy['lat'];
                    }
			    }
			    if ($row['is_link'] == 2){

                    $addressM   =   $this->MODEL('address');
                    $job_link   =   $addressM->getAddressInfo(array('id' => (int) $row['link_id'],'uid' => $this->member['uid']));
			    }
			    
			    $row['link_man']	 =	!empty($job_link['link_man'])     ? $job_link['link_man']     : '';
			    $row['link_moblie']  =	!empty($job_link['link_moblie'])  ? $job_link['link_moblie']  : '';
			    $row['link_address'] =	!empty($job_link['link_address']) ? $job_link['link_address'] : '';
			    $row['email']		 =	!empty($job_link['email'])        ? $job_link['email']        : '';

			    $CacheArr   =   $this->MODEL('cache')->GetCache(array('user'));
			   	if($row['job_post']){
			   		$row['jobclassid']	 =	$row['job_post'];
			   		$row['jobname']		 =	$row['job_three'];
			   	}else{
			   		$row['jobclassid']	 =	$row['job1_son'];
			   		$row['jobname']		 =	$row['job_two'];
			   	}
                // 投递要求-经验
			   	if(!empty($row['exp_req'])){

			   	    $row['exp_req_n'] = $CacheArr['userclass_name'][$row['exp_req']];
		        }
		        // 投递要求-学历
		        if(!empty($row['edu_req'])){

		            $row['edu_req_n'] = $CacheArr['userclass_name'][$row['edu_req']];
		        }
			}
        }else{
            $row['hy']        = $this->comInfo['hy']; // 添加职位，行业默认是企业行业
            $row['zp_minage'] = '';
            $row['zp_maxage'] = '';
            $row['welfare']   = $this->comInfo['welfare']; // 添加职位，带企业添加的福利待遇
        }
		$cacheM		=  $this -> MODEL('cache');
		$cache		=  $cacheM -> GetCache(array('com','user'));
		if(is_array($cache['comdata']['job_welfare'])){
			foreach($cache['comdata']['job_welfare'] as $k=>$v){
				$welfareData[]	=	$cache['comclass_name'][$v];
				$welfaresy[]	=	array('name'=>$cache['comclass_name'][$v],'ischecked'=>0);
			}
		}
		if(empty($row['welfare'])){
			$welfareArr	 =	$welfareData;	
			$row['arraywelfare']  =  array();
		}else{
		    $row['arraywelfare']  =  explode(',', $row['welfare']);
			$welfareArr	 =	array_unique(array_merge($row['arraywelfare'],$welfareData));	
		}
		$welfareAll  =  $w  =  array();
		foreach($welfareArr as $k=>$v){
			$w['name']  =  $v;
			if(in_array($v,$row['arraywelfare'])){
				$w['ischecked']	 =	1;
			}else{
				$w['ischecked']	 =	0;
			}
			$welfareAll[]  =  $w;
		}
		if($welfareAll){
			$row['welfareAll']  =  $welfareAll;
		}else{
			$row['welfareAll']  =  $welfaresy;
		}

        $cityDefStr                 =   $this->comInfo['job_city_one'].$this->comInfo['job_city_two'].$this->comInfo['job_city_three'];
        // 默认联系方式
        if (!empty($this->comInfo['linktel'])) {

            $row['link_default']    =   $this->comInfo['linkman'] . ' - ' . $this->comInfo['linktel'] . ' - ' . $cityDefStr . ' - ' . $this->comInfo['address'];
        } elseif (!empty($this->comInfo['linkphone'])) {

            $row['link_default']    =   $this->comInfo['linkman'] . ' - ' . $this->comInfo['linkphone'] . ' - ' . $cityDefStr . ' - ' . $this->comInfo['address'];
        } else {

            $row['link_default']    =   $this->comInfo['linkman'] . ' - ' . $cityDefStr . ' - ' . $this->comInfo['address'];
        }

        if (empty($row['is_link'])){
            $row['is_link']     =  1;
        }
        if (empty($row['is_message'])){
            $row['is_message']  =   1;
        }
        if (empty($row['is_email'])){
            $row['is_email']    =   1;
        }

        if ($row['is_link'] == 3){

            $row['linkmsg']         =   '不向求职者展示联系方式';
        } elseif ($row['is_link'] == 2){

            $cityStr            =   $job_link['city_one'] . $job_link['city_two'] . $job_link['city_three'];

            if (!empty($job_link['link_moblie'])) {

                $row['linkmsg'] =   $job_link['link_man'] . ' - ' . $job_link['link_moblie'] . ' -' . $cityStr . ' - ' . $job_link['link_address'];
            } else if (!empty($job_link['link_phone'])) {

                $row['linkmsg'] =   $job_link['link_man'] . ' - ' . $job_link['link_phone'] . ' - ' . $cityStr . ' - ' . $job_link['link_address'];
            } else {

                $row['linkmsg'] =   $job_link['link_man'] . ' - ' . $cityStr . ' - ' . $job_link['link_address'];
            }
        }else{

            $row['linkmsg']         =   $row['link_default'];
        }

        if ($this->comInfo['name'] && $this->comInfo['address']){

            $row['comLink']     =   array(

                'link_man'      =>  $this->comInfo['linkman'],
                'phone_n'       =>  $this->comInfo['linktel'],
                'tel_n'         =>  $this->comInfo['linkphone'],
                'provinceid'    =>  $this->comInfo['provinceid'],
                'cityid'        =>  $this->comInfo['cityid'],
                'three_cityid'  =>  $this->comInfo['three_cityid'],
                'cityStr'       =>  $cityDefStr,
                'link_address'  =>  $this->comInfo['address'],
                'x'             =>  $this->comInfo['x'],
                'y'             =>  $this->comInfo['y']
            );

            if (!empty($this->comInfo['linktel'])) {

                $row['comLink']['linkmsg'] = $this->comInfo['linkman'] . ' - ' . $this->comInfo['linktel'] . ' - ' . $cityDefStr . ' - ' . $this->comInfo['address'];
            } else if (!empty($this->comInfo['linkphone'])) {

                $row['comLink']['linkmsg'] = $this->comInfo['linkman'] . ' - ' . $this->comInfo['linkphone'] . ' - ' . $cityDefStr . ' - ' . $this->comInfo['address'];
            } else {

                $row['comLink']['linkmsg'] = $this->comInfo['linkman'] . ' - ' . $cityDefStr . ' - ' . $this->comInfo['address'];
            }
        }

        if (empty($row['provinceid'])){

            $row['provinceid']  =   $this->comInfo['provinceid'];
            $row['cityid']      =   $this->comInfo['cityid'];
            $row['three_cityid']=   $this->comInfo['three_cityid'];

            $row['x']           =   $this->comInfo['x'];
            $row['y']           =   $this->comInfo['y'];
        }

		$row['com_job_myswitch']  =  $this->config['com_job_myswitch']?$this->config['com_job_myswitch']:0;
		$row['sqjob_req']  =  $this->config['sqjob_req'];

		$row['joblock']  =  $this->config['joblock']?$this->config['joblock']:0;;
		
        $this->render_json(0, 'ok', $row);      
	}

    /**
     * 工作地址
     */
    function getJobAddress_action()
    {

        $addressM       =   $this->MODEL('address');
        $linkAddress    =   $addressM->getAddressList(array('uid' => $this->member['uid']));
        $row['linkAddress'] = $linkAddress;

        $this->render_json(0, 'ok', $row);
    }

	 
    // 发布、修改职位保存
	function saveJob_action()
	{

	    if($_POST['submit']){

	        $_POST          =  $this->post_trim($_POST);
	        $description    =  str_replace(array('&amp;','background-color:#ffffff','background-color:#fff','white-space:nowrap;'),array('&','background-color:','background-color:','white-space:'),$_POST['description']);

	        if ($_POST['jobclassid']) {
                
                $categoryM  =   $this->MODEL('category');
            
                $row1       =   $categoryM->getJobClass(array('id' => intval($_POST['jobclassid'])), '`keyid`');
                $row2       =   $categoryM->getJobClass(array('id' => $row1['keyid']), '`keyid`');
                
                if ($row2['keyid'] == '0') {
                    
                    $_POST['job1_son']  =   $_POST['jobclassid'];
                    $_POST['job1']      =   $row1['keyid'];
                    $_POST['job_post']  =   '';
                } else {
                    $_POST['job_post']	=	$_POST['jobclassid'];
                    $_POST['job1_son']  =   $row1['keyid'];
                    $_POST['job1']      =   $row2['keyid'];
                }
            }

            unset($_POST['jobclassid']);
            
	        $post  =  array(
	            'r_status'		=>	$this->comInfo['r_status'],
	            'job1'          =>  intval($_POST['job1']),
	            'job1_son'      =>  intval($_POST['job1_son']),
	            'job_post'      =>  intval($_POST['job_post']),
	            
	            'provinceid'    =>  intval($_POST['provinceid']),
	            'cityid'        =>  intval($_POST['cityid']),
	            'three_cityid'  =>  intval($_POST['three_cityid']),
	            
	            'minsalary'     =>  intval($_POST['salary_type']) == 1 ? 0 : intval($_POST['minsalary']),
	            'maxsalary'     =>  intval($_POST['salary_type']) == 1 ? 0 : intval($_POST['maxsalary']),
	            
	            'description'	=>	$description,

                'is_link'       =>  $_POST['is_link'],
                'is_message'    =>  $_POST['is_message'] ?  $_POST['is_message'] : 1,
                'is_email'      =>  $_POST['is_email'] ?  $_POST['is_email'] : 1,

	            'link_id'       =>  (int)$_POST['link_id'] > 0 ? $_POST['link_id'] : '',

	            'hy'            =>  intval($_POST['hy']),
	            'number'        =>  intval($_POST['number']),
	            'exp'           =>  intval($_POST['exp']),
	            'report'        =>  intval($_POST['report']),
	            'age'           =>  intval($_POST['age']),
	            'sex'           =>  intval($_POST['sex']),
	            'edu'           =>  intval($_POST['edu']),
	            'is_graduate'   =>  intval($_POST['is_graduate']),
	            'marriage'      =>  intval($_POST['marriage']),
	            'lang'          =>  $_POST['lang'],
	            'source'		=>	$_POST['source'],
	            'welfare'		=>	$_POST['welfare'],

	            'exp_req'       =>  $_POST['exp_req'],
				'edu_req'       =>  $_POST['edu_req'],
                'sex_req'       =>  trim($_POST['sex_req']),
                'minage_req'    =>  trim($_POST['minage_req']),
                'maxage_req'    =>  trim($_POST['maxage_req']),

                'zp_num'        => intval($_POST['zp_num']),
                'zp_minage'     => intval($_POST['zp_minage']),
                'zp_maxage'     => intval($_POST['zp_maxage'])
	        );

            if (!empty($_POST['source']) && $_POST['source'] == '2') { // WAP站百度坐标系，不需要转

                $post['x']      =   $_POST['x'];
                $post['y']      =   $_POST['y'];
            } else {

                $coordinates    =   $this->Convert_GCJ02_To_BD09($_POST['x'], $_POST['y']);
                $post['x']      =   $coordinates['lng'];
                $post['y']      =   $coordinates['lat'];
            }
			
	        if($this->config['joblock']!=1 || empty($_POST['id'])){
				
				$post['name']	=	$_POST['name'];
			}

	        $data  =  array(
	            'post'			=>	$post,
	            'id'			=>	intval($_POST['id']),
	            'uid'			=>	$this->member['uid'],
	            'usertype'		=>	$this->member['usertype'],
	            'did'			=>	$this->member['did'],

                'is_tblink'     =>  $_POST['is_tblink'],
	        );
 
	        $jobM   =  $this->MODEL('job');
	        $return	=  $jobM->addJobInfo($data);
	        
	        $this->render_json($return['errcode'], $return['msg']);
	    }
	}
	/* 删除职位 */
	function deljob_action()
	{
    
	   if(!$_POST['ids'] || !$this->member['uid']){
			$data['error']	=	3;
			$data['msg']	=	'参数不正确';
		}else{
			$jobM	=	$this -> Model('job');
			$PackM	=	$this -> Model('pack');
			$comM	=	$this -> Model('company');
			
			$ids	=	@explode(',',$_POST['ids']);
			$delid	=	pylode(',',$ids);

			//判断是否有赏金职位未处理 处理完才允许删除职位
			$nwhere['uid']	=	$this->member['uid'];
			$nwhere['jobid']=	(int)$_POST['ids'];
   
			$rewardJobNum	=	$PackM -> getCompanyJobRewardNum($nwhere);
			$shareJobNum	=	$PackM -> getCompanyJobShareNum($nwhere);

			if($rewardJobNum>0 || $shareJobNum>0){

			    $data['msg']	=  '您还有赏金职位未处理！';
				$data['error']  =  3;
			}else{
       
				$return = $jobM -> delJob((int)$_POST['ids'],array('uid'=>$this->member['uid']));

				if($return['errcode']==9){
					$newest = $jobM -> getInfo(array('uid'=>$this->member['uid'],'orderby'=>'lastupdate'),array('field'=>'`lastupdate`'));
					$comM -> upInfo($this->member['uid'],'',array('jobtime'=>$newest['lastupdate']));
					
                    $data['error']	=	1;//删除成功
				}else{
					$data['error']	=	2;
				}
				$data['msg']	=	$return['msg'];
			}
		}
        $this->render_json($data['error'], $data['msg']);
	}
  
    //查找相关信息
    function jobPromote_action()
    {
        //1：职位置顶  2：职位推荐  3：紧急招聘
        $jobM   =   $this->MODEL('job');
    
        $type   =   intval($_POST['serverid']);
        $return =   $jobM->jobPromote($this->member['uid'], array('type' => $type));
        $this->render_json(0,'',$return);

    }
    /* 职位推广（置顶、推荐、紧急招聘） */
    function setJobPromote_action() 
    {
        $_POST  =   $this->post_trim($_POST);

        if (empty($_POST)) {
            $msg	= '参数错误！';
            $error	= 2;
        }else{
        	$jobM   =   $this->MODEL('job');
        
	        $_POST['uid']       =   $this->member['uid'];
	        $_POST['username']  =   $this->member['username'];
	        $_POST['usertype']  =   $this->member['usertype'];
	        
	        $return = $jobM->setJobPromote(intval($_POST['jobid']), $_POST);

	        $error	= $return['errcode']==9 ? 1 : 2;

	        $msg	= $return['msg'];
        }
        
        $this->render_json($error,$msg);
    }

    /* 取消职位推广（置顶、推荐、紧急招聘） */
    function setJobPromoteClose_action()
    {
        $_POST  =   $this->post_trim($_POST);

        if (empty($_POST)) {
            $msg	= '参数错误！';
            $error	= 2;
        }else{
            $jobM   =   $this->MODEL('job');

            $_POST['uid']       =   $this->member['uid'];
            $_POST['username']  =   $this->member['username'];
            $_POST['usertype']  =   $this->member['usertype'];

            $return = $jobM->closeJobPromote(intval($_POST['jobid']), $_POST);

            $error	= $return['errcode']==9 ? 1 : 2;

            $msg	= $return['msg'];
        }

        $this->render_json($error,$msg);
    }
	/**
	 * 刷新职位
	 */
	function refresh_action()
	{
		
		if(!empty($_POST['jobid'])){
		    
	        $jobids	=	intval($_POST['jobid']);
	        
	    }else{
	        
	        $jobM  =  $this -> MODEL('job');
	        
	        $jobs  =  $jobM -> getList(array('uid'=>$this->member['uid'],'state'=>1,'r_status'=>array('<>',2),'status'=>array('<>',1)),array('field'=>'id'));//招聘中职位
	        if(!empty($jobs['list'])){
	            foreach($jobs['list'] as $key=>$v){
	                $ids[]	=  $v['id'];
	            }
	            $jobids  =  pylode(',',$ids);
	        }
	    }
	    if(empty($jobids)){
	        
	        $this->render_json(1,'没有招聘中的职位');
	    }
	    
	    $this->company_statis($this->member['uid']);
	    //检查是否达到每日最大操作次数
	    $result  =  $this->day_check($this->member['uid'],'refreshjob');
	    if($result['status']!=1){
	        
	        $this->render_json(2, $result['msg']);
	    }

        $refresh['jobid']       =   $jobids;
        $refresh['uid']         =   $this->member['uid'];
        $refresh['usertype']    =   $this->member['usertype'];

        if (isset($_POST['provider'])) {

            if ($_POST['provider'] == 'wap') {

                $refresh['port']    =   2;
            } elseif ($_POST['provider'] == 'weixin') {

                $refresh['port']    =   3;
            }
        }


	    $comtcM		=	$this->MODEL('comtc');
	    $return		=	$comtcM->refresh_job($refresh);
	    
	    if (!empty($return['msg'])){
	        
	        $return['msg']  =  strip_tags($return['msg']);
	    }
	    if($return['status']==1){
	        
	        $this->render_json(0, $return['msg']);
	    }else if($return['status']==2){

	        $this->render_json(3, $return['msg'], $return);
	    }else{
	        
	        $this->render_json(4, $return['msg']);
	    }
	}
	/*wxapp职位管理页面上架下架*/
	function ztjob_action()
	{
		
		if(!$_POST['id']){
		    $this->render_json(3, '参数不正确');
		}else{		
			$jobM	=	$this -> MODEL('job');
			if($_POST['status']==2){
				$statisM	=	$this -> MODEL('statis');
				$statis		=	$statisM->getInfo($this->member['uid'],array('usertype'=>$this->member['usertype'],'field'=>'`vip_etime`'));
				
				if(!isVip($statis['vip_etime'])){
                    $error = 8;
				    $msg = '会员已到期，无法上架，请先升级会员！';
				    if ($this->config['sy_iospay'] == 2){
                        $error = 2;
				        // 苹果关闭支付功能
				        $msg = '您好，目前不支持上架职位';
				    }
				    $this->render_json($error,$msg);
                }

				$_POST['status']  =  0;
			}

			$data   =   array(
                'status'        =>  $_POST['status'],
            );
            if($_POST['status']==0){
                $data['upstatus_time'] =  time();
            }

			if($_POST['status']==0){

                $today  = 	strtotime('today');
                $rating_type = 1;
                $return = $this -> MODEL('statis')->getCom(array('uid' =>$this->member['uid'], 'usertype' =>$this->member['usertype'],'upstatus'=>1));

                if (!empty($return)) {
                    if($return['errcode']==9){
                        $rating_type = 2;
                    }else{
                     
                        $this->render_json(2,$return['msg']);
                    }
                }

                $jobinfo = $jobM->getInfo(array('id' => intval($_POST['id'])),array('field'=>'`id`,`upstatus_count`,`upstatus_time`'));

                $upstatus_count = $jobinfo['upstatus_count'];

                if($rating_type==2){
                    if($jobinfo['upstatus_time']> $today){
                        $upstatus_count += 1;
                    }else{
                        $upstatus_count = 1;
                    }
                }else if($rating_type==1){
                    $upstatus_count += 1;
                }

                $data['upstatus_count'] = $upstatus_count;
            }

			$nid  =  $jobM -> upInfo($data, array('id' => intval($_POST['id']),'uid'=>$this->member['uid']));
			
			if($nid){
			    $this -> MODEL('log') -> addMemberLog($this->member['uid'],$this->member['usertype'],'修改职位招聘状态',1,2);
				$this->render_json(0, 'ok');
			}else{
			    $this->render_json(2, '设置失败');
			}
		}
	}
	 
    // 通过职位类别，查询职位描述样本
	function ajaxjobclass_action(){
		$categoryM	=	$this->MODEL('category');
		$rows		=	$categoryM->getJobClass(array('id'=>$_POST['id'],'content'=>array('<>','')));
		$error		=	2;
		if($rows&&is_array($rows)){
			if(!empty($rows['content'])){
				$error	=	1;
				$data['id']	=	$rows['id'];
				$data['name']	=	$rows['name'];
				$data['content']	=	$rows['content'];
			}
		}
		$this->render_json($error,'',$data);
    }
	
	function setexample_action(){
		$categoryM	=	$this->MODEL('category');
		$row		=	$categoryM->getJobClass(array('id'=>intval($_POST['id'])),'`content`');
		$this->render_json(1,'',$row['content']);
	}

    /**
     * 预约刷新
     */
    function reserveUp_action()
    {

        $_POST  =   $this->post_trim($_POST);

        if (empty($_POST)) {
            $msg	= '参数错误！';
            $error	= 2;
        }else{
            $jobM   =   $this->MODEL('job');

            $data   =   array(

                'job_id'    =>  $_POST['job_id'],
                'end_time'  =>  strtotime($_POST['end_time']),
                's_time'    =>  $_POST['s_time'],
                'e_time'    =>  $_POST['e_time'],
                'interval'  =>  $_POST['interval'],
                'status'    =>  $_POST['status']
            );

            $return =   $jobM->reserveUpJob($data, array('uid' => $this->member['uid']));

            $error	= $return['error'];

            $msg	= $return['msg'];
        }

        $this->render_json($error,$msg);
    }
     
}