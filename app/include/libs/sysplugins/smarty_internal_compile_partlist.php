<?php
class Smarty_Internal_Compile_Partlist extends Smarty_Internal_CompileBase{
    public $required_attributes = array('item');
    public $optional_attributes = array('name', 'key', 'limit','ispage','provinceid','cityid','three_cityid','type','keyword','order','noid','cycle','salary','namelen','rec','keyword');
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

        //自定义标签 START
        $OutputStr='global $db,$db_config,$config;
		$time = time();


		//可以做缓存
        $paramer='.ArrayToString($_attr,true).';
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
        $Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }

		if($config[sy_web_site]=="1"){
			if($config[province]>0 && $config[province]!=""){
				$paramer[provinceid] = $config[province];
			}
			if($config[cityid]>0 && $config[cityid]!=""){
				$paramer[cityid] = $config[cityid];
			}
			if($config[three_cityid]>0 && $config[three_cityid]!=""){
				$paramer[three_cityid] = $config[three_cityid];
			}
		}

   
      $where = "(`edate`>\'$time\' or `edate`=0) and `status`=0 and `state`=1 and `r_status`<>2";
        
      if($paramer[noid]){
        $where.=" and `id`<>\'".$paramer[\'noid\']."\'";
      }
      
      //关键字
      if($paramer[keyword]){
        $where .= " AND `name` LIKE \'%".$paramer[keyword]."%\'";
      }
      //城市大类
      if($paramer[provinceid]){
        $where .= " AND `provinceid` = $paramer[provinceid]";
      }
      //城市子类
      if($paramer[\'cityid\']){
        $where .= " AND (`provinceid`=$paramer[cityid] or `cityid`=$paramer[cityid] or `three_cityid`=$paramer[cityid])";
      }
      //城市三级子类
      if($paramer[\'three_cityid\']){
        $where .= " AND (`three_cityid` IN ($paramer[three_cityid]))";
      }
      if($paramer[\'cityin\']){
        $where .= " AND `three_cityid` IN ($paramer[cityin])";
      }
      //推荐兼职
      if($paramer[rec]){
        $where.=" AND `rec_time`>".time();
      }
      //工作类型
      if($paramer[type]){
        $where .= " AND `type` = $paramer[type]";
      }
      //结算周期
      if($paramer[cycle]){
        $where .= " AND `billing_cycle` = $paramer[cycle]";
      }
      //按照职位名称匹配
      /*if($paramer[keyword]){
        $where1[]="`name` LIKE \'%".$paramer[keyword]."%\'";
        include PLUS_PATH."/city.cache.php";
        foreach($city_name as $k=>$v){
          if(strpos($v,$paramer[keyword])!==false){
            $cityid[]=$k;
          }
        }
        if(is_array($cityid)){
          foreach($cityid as $value){
            $class[]= "(provinceid = \'".$value."\' or cityid = \'".$value."\')";
          }
          $where1[]=@implode(" or ",$class);
        }
        $where.=" AND (".@implode(" or ",$where1).")";
      }*/
       //数据周期 
      if($config[sy_datacycle]>0){
           // 后台-页面设置-数据周期
           $uptime = strtotime(\'-\'.$config[sy_datacycle].\' day\');
           $where.=" AND `lastupdate`>$uptime";
       }

      //查询条数
      if($paramer[limit]){
        $limit = " limit ".$paramer[limit];
      }
      if($paramer[ispage]){
        $limit = PageNav($paramer,$_GET,"partjob",$where,$Purl,"",$paramer[limit]?$paramer[limit]:"6",$_smarty_tpl);
      }
      //排序字段默认为更新时间
      if($paramer[order] && $paramer[order]!="lastdate"){
        $order = " ORDER BY ".str_replace("\'","",$paramer[order])."  ";
      }else{
        $order = " ORDER BY `lastupdate` ";
      }
      //排序规则 默认为倒序
      if($paramer[sort]){
        $sort = $paramer[sort];
      }else{
        $sort = " DESC";
      }
      $where.=$order.$sort;
  
		
		'.$name.' = $db->select_all("partjob",$where.$limit);
		if(is_array('.$name.')){
			foreach('.$name.' as $v){
    			$comuids[]=$v[\'uid\'];
    		}
			$comlist=$db->select_all("company","`uid` in(".@implode(\',\',$comuids).")","`uid`,`shortname`");
			foreach('.$name.' as $key=>$value){
				'.$name.'[$key] = $db->part_array_action($value,$cache_array);
				'.$name.'[$key][stime] = date("Y-m-d",$value[sdate]);
				'.$name.'[$key][etime] = date("Y-m-d",$value[edate]);
				'.$name.'[$key][lastupdate] = date("Y-m-d",$value[lastupdate]);
				$time=$value[\'lastupdate\'];
				//今天开始时间戳
				$beginToday=mktime(0,0,0,date(\'m\'),date(\'d\'),date(\'Y\'));
				//昨天开始时间戳
				$beginYesterday=mktime(0,0,0,date(\'m\'),date(\'d\')-1,date(\'Y\'));
				if($time>$beginYesterday && $time<$beginToday){
					'.$name.'[$key][\'time\'] = "昨天";
				}elseif($time>$beginToday){
					'.$name.'[$key][\'time\'] = "今天";
				}else{
					'.$name.'[$key][\'time\'] = date("Y-m-d",$value[\'lastupdate\']);
				}
				foreach($comlist as $v){
    				if($value[uid]==$v[uid]&&$v[shortname]){
    					'.$name.'[$key][\'com_name\'] = $v[shortname];
    				}
    			}
				//截取职位名称
				if($paramer[namelen]){
					'.$name.'[$key][name_n] = mb_substr($value[\'name\'],0,$paramer[namelen],"utf-8");
				}
				//构建职位伪静态URL
				'.$name.'[$key][job_url] = Url("part",array("c"=>"show","id"=>$value[id]),"1");
				if($paramer[keyword]){
					'.$name.'[$key][name_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",'.$name.'[$key][name_n]);
					'.$name.'[$key][job_city_one]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]]);
				}
			}
			if(is_array('.$name.')){
				if($paramer[keyword]!=""&&!empty('.$name.')){
					addkeywords(\'2\',$paramer[keyword]);
				}
			}
		}';
       // global $DiyTagOutputStr;
       // $DiyTagOutputStr[]=$OutputStr;
        return SmartyOutputStr($this,$compiler,$_attr,'partlist',$name,$OutputStr,$name);
    }
}
class Smarty_Internal_Compile_Partlistelse extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);

        list($openTag, $nocache, $item, $key) = $this->closeTag($compiler, array('partlist'));
        $this->openTag($compiler, 'partlistelse', array('partlistelse', $nocache, $item, $key));

        return "<?php }\nif (!\$_smarty_tpl->tpl_vars[$item]->_loop) {\n?>";
    }
}
class Smarty_Internal_Compile_Partlistclose extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);
        if ($compiler->nocache) {
            $compiler->tag_nocache = true;
        }

        list($openTag, $compiler->nocache, $item, $key) = $this->closeTag($compiler, array('partlist', 'partlistelse'));

        return "<?php } ?>";
    }
}
