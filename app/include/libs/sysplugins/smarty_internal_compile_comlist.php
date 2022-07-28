<?php
class Smarty_Internal_Compile_Comlist extends Smarty_Internal_CompileBase{
    public $required_attributes = array('item');
    public $optional_attributes = array('name', 'key', 'ispage', 'isjob', 'firm', 'isnews', 'isshow','hy', 'pr', 'mun', 'provinceid', 'cityid', 'three_cityid', 'keyword', 'order', 'limit', 'ltjob', 'logo', 'comlen', 'namelen', 'firmpic', 'ismsg', 'rec','islt', 'uptime' ,'cityin','welfare','cert');
    public $shorttag_order = array('from', 'item', 'key', 'name');
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);

        $from = $_attr['from'];
        $item = $_attr['item'];
        $name = $_attr['item'];
        $name=str_replace('\'','',$name);
        $name=$name?$name:'list';$name='$'.$name;
        if (!strncmp("\$_smarty_tpl->tpl_vars[$item]", $from, strlen($item) + 24)) {
            $compiler->trigger_template_error("item variable {$item} may not be the same variable as at 'from'", $compiler->lex->taglineno);
        }

        //TODO:$this->company_rating,此变量的作用是什么？应该加在什么地方？
        //自定义标签 START
        $OutputStr='global $db,$db_config,$config;$paramer='.ArrayToString($_attr,true).';'.$name.'=array();
		
		$time = time();
		//处理传入参数，并且构造分页参数
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[\'arr\'];
		$Purl =  $ParamerArr[\'purl\'];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		//是否属于分站下
		if($config[\'sy_web_site\']=="1"){
			if($config[province]>0 && $config[province]!=""){
				$paramer[provinceid] = $config[province];
			}
			if($config[\'cityid\']>0 && $config[\'cityid\']!=""){
				$paramer[\'cityid\']=$config[\'cityid\'];
			}
			if($config[\'three_cityid\']>0 && $config[\'three_cityid\']!=""){
				$paramer[\'three_cityid\']=$config[\'three_cityid\'];
			}
			if($config[\'hyclass\']>0 && $config[\'hyclass\']!=""){
				$paramer[\'hy\']=$config[\'hyclass\'];
			}
		} 
		
		$cache_array = $db->cacheget();

		
		$where="`name`<>\'\'"; 
	
		/*if(!is_array($this->company_rating)){
			$comrat = $db->select_all($db_config[\'def\']."company_rating");
			$this->company_rating=$comrat;
		}else{
			$comrat = $this->company_rating;
		}*/
		//关键字
		if($paramer[\'keyword\']){
			$where.=" AND `name` LIKE \'%".$paramer[\'keyword\']."%\'";
		}				
		//公司行业
		if($paramer[\'hy\']){
			$where .= " AND `hy` = \'".$paramer[\'hy\']."\'";
		}
		//公司体制
		if($paramer[\'pr\']){
			$where .= " AND `pr` = \'".$paramer[\'pr\']."\'";
		}
		//公司规模
		if($paramer[\'mun\']){
			$where .= " AND `mun` = \'".$paramer[\'mun\']."\'";
		}
		$cache_array = $db->cacheget();
		$comclass_name = $cache_array["comclass_name"];
		//福利待遇
		if($paramer[welfare]){
			$welfarename=$comclass_name[$paramer[welfare]];
			$welfare=$db->select_all("company","`name`<>\'\' and `hy`<>\'\' and FIND_IN_SET(\'".$welfarename."\',`welfare`)","`uid`");
			if(is_array($welfare)){
				foreach($welfare as $v){
					$welfareid[]=$v[\'uid\'];
				}
			}
			$where .=" AND uid in (".@implode(",",$welfareid).")";
		}
		//公司地点
		if($paramer[\'provinceid\']){
			$where .= " AND `provinceid` = \'".$paramer[\'provinceid\']."\'";
		}
		//城市二级子类
		if($paramer[\'cityid\']){
			$where .= " AND (`provinceid` = \'".$paramer[\'cityid\']."\' OR `cityid` = \'".$paramer[\'cityid\']."\')";
		}
		//城市三级子类
		if($paramer[\'three_cityid\']){
			$where .= " AND (`provinceid` = \'".$paramer[\'three_cityid\']."\' OR `three_cityid` = \'".$paramer[\'three_cityid\']."\')";
		}
		//所在地 市区
		if($paramer[\'cityin\']){
			$where .= " AND (`provinceid` in(".$paramer[\'cityin\'].") OR `cityid` in(".$paramer[\'cityin\'].") or `three_cityid` in(".$paramer[\'cityin\']."))";
		}
		//联系人不为空
		if($paramer[\'linkman\']){
			$where .= " AND `linkman`<>\'\'";
		}
		//联系人电话不为空
		if($paramer[\'linktel\']){
			$where .= " AND `linktel`<>\'\'";
		}
		//联系人邮箱不为空
		if($paramer[\'linkmail\']){
			$where .= " AND `linkmail`<>\'\'";
		}
		//是否有企业LOGO
		if($paramer[\'logo\']){
			$where .= " AND `logo`<>\'\' AND `log_status` = \'0\'";
		}
		//是否被锁定
		if($paramer[\'r_status\']){
			$where .= " AND `r_status`=\'".$paramer[\'r_status\']."\'";
		}else{
			$where .= " AND `r_status`=\'1\'";
		}
		//是否已经验证
		if($paramer[\'cert\']){
			$where .= " AND `yyzz_status`=\'1\'";
		}
		//更新时间区间
		if($paramer[\'uptime\']){
			$uptime = $time-$paramer[\'uptime\']*3600;
			$where.=" AND `lastupdate`>\'".$uptime."\'";
		}
		if($paramer[\'jobtime\']){
			$where.=" AND `jobtime`<>\'\'";
		}
		
		if($paramer[\'rec\']){
			$Purl["rec"]=\'1\';
			$where.=" AND `rec`=\'1\' AND `hotstart` <= \'".time()."\' AND `hottime`>\'".time()."\'";
		}
		//查询条数
		if($paramer[\'limit\']){
			$limit=" limit ".$paramer[\'limit\'];
		}
		
		//自定义查询条件，默认取代上面任何参数直接使用该语句
		if($paramer[\'where\']){
			$where = $paramer[\'where\'];
		}
		//处理类别字段
		$cache_array = $db->cacheget();
		
		if($paramer[\'ispage\']){ 
			$limit = PageNav($paramer,$_GET,"company",$where,$Purl,"","0",$_smarty_tpl);
			
		}
		
		//排序字段默认为更新时间
		if($paramer[\'order\']){
			if($paramer[\'order\']=="lastＵpdate"){
				$paramer[\'order\']="lastupdate";
			}
			$order = " ORDER BY `".$paramer[\'order\']."`  ";
		}else{
			$order = " ORDER BY `jobtime` ";
		}
		//排序规则 默认为倒序
		if($paramer[\'sort\']){
			$sort = $paramer[\'sort\'];
		}else{
			$sort = " DESC";
		}
		$where.=$order.$sort;
		
		$Query = $db->query("SELECT * FROM $db_config[def]company where ".$where.$limit);
		$ListId=array();
        
		'.$name.'=array();
		while($rs = $db->fetch_array($Query)){
			'.$name.'[] = $db->array_action($rs,$cache_array);
			$ListId[] = $rs[\'uid\'];
		}  
		//调用会员等级
		include_once  PLUS_PATH."comrating.cache.php";
		if(!empty($ListId)){
	    //$db->update_all("company", "`expoure` = `expoure` + 1", "`uid` in (".@implode(",",$ListId).")");
		$statis = $db->select_all("company_statis","`uid` in (".@implode(",",$ListId).")","`uid`,`rating`");
		foreach($ListId as $key=>$value){
		       foreach($statis as $v){
		               foreach($comrat as $val){
			                if($value==$v[\'uid\'] && $val[\'id\']==$v[\'rating\']){						
								'.$name.'[$key][\'color\'] = $val[\'com_color\'];
								'.$name.'[$key][\'ratlogo\'] = checkpic($val[\'com_pic\']);
								'.$name.'[$key][\'ratname\'] = $val[\'name\'];
						    }
					  }
				}
			}
		}
		
		//是否需要查询对应职位
		if($paramer[\'isjob\']){
			//查询职位
			$JobId = @implode(",",$ListId);
			if($JobId!=""){
			    if($config[sy_datacycle]>0){
			    
			        $uptime = strtotime(\'-\'.$config[sy_datacycle].\' day\');
			        $JobList=$db->select_all("company_job","`uid` IN ($JobId) and r_status=1 and status=0 and state=1 and lastupdate > $uptime  order by `lastupdate` desc","`id`,`uid`,`status`,`name`");	
			    }else{
			    
				    $JobList=$db->select_all("company_job","`uid` IN ($JobId) and r_status=1 and status=0 and state=1  order by `lastupdate` desc","`id`,`uid`,`status`,`name`");
				}
			}
			
			if(is_array($ListId) && is_array($JobList)){
				foreach('.$name.' as $key=>$value){
					'.$name.'[$key][\'jobnum\'] = 0;
					foreach($JobList as $k=>$v){
						if($value[\'uid\']==$v[\'uid\']){
							$id = $v[\'id\'];
							'.$name.'[$key][\'newsjob\'] = $v[\'name\'];
							'.$name.'[$key][\'newsjob_status\'] = $v[\'status\'];
							'.$name.'[$key][\'r_status\'] = $v[\'r_status\'];

							$v = $db->array_action($value,$cache_array);
							$v[\'job_url\'] = Url("job",array("c"=>"comapply","id"=>$JobList[$k][\'id\']),"1");
							$v[\'id\']= $id;
							$v[\'name\'] = '.$name.'[$key][\'newsjob\'];
							'.$name.'[$key][\'joblist\'][] = $v;
							'.$name.'[$key][\'jobnum\'] = '.$name.'[$key][\'jobnum\']+1;
						}
					}
					/*
					foreach($comrat as $k=>$v){
						if($value[\'rating\']==$v[\'id\']){
							'.$name.'[$key][\'color\'] = $v[\'com_color\'];
							'.$name.'[$key][\'ratlogo\'] = checkpic($v[\'com_pic\']);
						}
					}*/
				}
			}
		}
		//是否需要查询对应资讯
		if($paramer[\'isnews\']){
			//查询资讯
			$JobId = @implode(",",$ListId);
			$NewsList=$db->select_all("company_news","`uid` IN ($JobId) and status=1  order by `id` desc");
			if(is_array($ListId) && is_array($NewsList)){
				foreach('.$name.' as $key=>$value){
					'.$name.'[$key][\'newsnum\'] = 0;
					foreach($NewsList as $k=>$v){
						if($value[\'uid\']==$v[\'uid\']){
							'.$name.'[$key][\'newslist\'][] = $v;
							'.$name.'[$key][\'newsnum\'] = '.$name.'[$key][\'newsnum\']+1;
						}
					}
				}
			}
		}
		//是否需要查询对应环境展示
		if($paramer[\'isshow\']){
			//查询环境展示
			$JobId = @implode(",",$ListId);
			$ShowList=$db->select_all("company_show","`uid` IN ($JobId) order by `id` desc");
			if(is_array($ListId) && is_array($ShowList)){
				foreach('.$name.' as $key=>$value){
					'.$name.'[$key][\'shownum\'] = 0;
					foreach($ShowList as $k=>$v){
						if($value[\'uid\']==$v[\'uid\']){
							'.$name.'[$key][\'showlist\'][] = $v;
							'.$name.'[$key][\'shownum\'] = '.$name.'[$key][\'shownum\']+1;
						}
					}
				}
			}
		}
		
		//企业黄页 是否关注  201305_gl
		if($paramer[\'firm\']){
			if($_COOKIE[uid]){$atnlist = $db->select_all("atn","`uid`=\'$_COOKIE[uid]\' and `sc_usertype`=\'2\'");}
			if(is_array('.$name.')){
				foreach('.$name.' as $key=>$value){
					if(!empty($atnlist)){
						foreach($atnlist as $v){
							if($value[\'uid\'] == $v[\'sc_uid\']){
								'.$name.'[$key][\'atn\'] = "取消关注";
                                '.$name.'[$key][\'atnstatus\'] = "1";
								break;
							}else{
								'.$name.'[$key][\'atn\'] = "关注";
							}
						}
					}else{
						'.$name.'[$key][\'atn\'] = "关注";
					}
				}
			}
		}
		if(is_array('.$name.')){
			foreach('.$name.' as $key=>$value){
				if($value[\'shortname\']){
    				'.$name.'[$key][\'name\']=$value[\'shortname\'];
    			}
				'.$name.'[$key][\'com_url\'] = Url("company",array("c"=>"show","id"=>$value[\'uid\']));
				'.$name.'[$key][\'joball_url\'] = Url("company",array("c"=>"show","id"=>$value[\'uid\'],"tp"=>"post"));
				if(!$value[\'logo\'] || $value[\'logo_status\']!=0){
				    '.$name.'[$key][\'logo\'] = checkpic("",$config[\'sy_unit_icon\']);
				}else{
					'.$name.'[$key][\'logo\'] = checkpic($value[\'logo\'],$config[\'sy_unit_icon\']);
				} 
				//获得福利待遇名称
				if(is_array('.$name.'[$key][\'welfare\'])&&'.$name.'[$key][\'welfare\']){
					foreach('.$name.'[$key][\'welfare\'] as $val){
						if($val && $val!="undefined"){
							'.$name.'[$key][\'welfarename\'][]=$val;
						}
					}
				}
			}
			if($paramer[\'keyword\']!=""&&!empty('.$name.')){
				addkeywords(\'4\',$paramer[\'keyword\']);
			}
		}';
        //自定义标签 END
        //global $DiyTagOutputStr;
       // $DiyTagOutputStr[]=$OutputStr;
        return SmartyOutputStr($this,$compiler,$_attr,'comlist',$name,$OutputStr,$name);
    }
}
class Smarty_Internal_Compile_Comlistelse extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);

        list($openTag, $nocache, $item, $key) = $this->closeTag($compiler, array('comlist'));
        $this->openTag($compiler, 'comlistelse', array('comlistelse', $nocache, $item, $key));

        return "<?php }\nif (!\$_smarty_tpl->tpl_vars[$item]->_loop) {\n?>";
    }
}
class Smarty_Internal_Compile_Comlistclose extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);
        if ($compiler->nocache) {
            $compiler->tag_nocache = true;
        }

        list($openTag, $compiler->nocache, $item, $key) = $this->closeTag($compiler, array('comlist', 'comlistelse'));

        return "<?php } ?>";
    }
}
