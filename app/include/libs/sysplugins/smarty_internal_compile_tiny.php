<?php
class Smarty_Internal_Compile_Tiny extends Smarty_Internal_CompileBase{
    public $required_attributes = array('item');
    public $optional_attributes = array('name', 'key', 'add_time','sex','exp', 'ispage', 'limit', 'keyword','delid','islt','provinceid','cityid','three_cityid');
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
        $OutputStr='global $db,$db_config,$config;$paramer='.ArrayToString($_attr,true).';'.$name.'=array();
		include PLUS_PATH."/user.cache.php";
		//处理传入参数，并且构造分页参数
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }

    
      $where = "status=\'1\' ";
      
      //关键字
      if($paramer[keyword]){
        $where.=" AND (`username` LIKE \'%".$paramer[keyword]."%\' or `job` LIKE \'%".$paramer[keyword]."%\')";
      }
      if($config[did]){
        $where.=" AND `did`=\'".$config[\'did\']."\'";
      }
	  if($paramer[sex]){
        $where.=" AND `sex`=\'".$paramer[\'sex\']."\'";
      }
	  if($paramer[exp]){
        $where.=" AND `exp`=\'".$paramer[\'exp\']."\'";
      }
	  if($paramer[provinceid]){
        $where.=" AND `provinceid`=\'".$paramer[\'provinceid\']."\'";
      }
	  if($paramer[cityid]){
        $where.=" AND `cityid`=\'".$paramer[\'cityid\']."\'";
      }
	  if($paramer[three_cityid]){
        $where.=" AND `three_cityid`=\'".$paramer[\'three_cityid\']."\'";
      }
      if($paramer[\'add_time\']>0){
        $time=time()-$paramer[\'add_time\']*86400;
        $where.=" and `lastupdate`>".$time;
      }
      if($paramer[\'delid\']){
        $where.=" AND `id`<>\'".$paramer[\'delid\']."\'";
      }
      //排序字段默认为更新时间
      if($paramer[\'order\']){
        $order = " ORDER BY `".str_replace("\'","",$paramer[order])."`";
      }else{
        $order = " ORDER BY lastupdate ";
      }
      //排序规则 默认为倒序
      if($paramer[\'sort\']){
        $sort = $paramer[\'sort\'];
      }else{
        $sort = " DESC";
      }
      //查询条数
      if($paramer[limit]){
        $limit=" LIMIT ".$paramer[limit];
      }else{
        $limit=" LIMIT 20";
      }

      //自定义查询条件，默认取代上面任何参数直接使用该语句
      if($paramer[where]){
        $where = $paramer[where];
      }
      if($paramer[ispage]){
        $limit = PageNav($paramer,$_GET,"resume_tiny",$where,$Purl,\'\',\'0\',$_smarty_tpl);
      }
      $where.=$order.$sort.$limit;
   

		'.$name.'=$db->select_all("resume_tiny",$where);
		include(CONFIG_PATH."db.data.php");		
		if(is_array('.$name.')){
			foreach('.$name.' as $key=>$value){				
				$time=$value[\'lastupdate\'];
				//今天开始时间戳
				$beginToday=mktime(0,0,0,date(\'m\'),date(\'d\'),date(\'Y\'));
				//昨天开始时间戳
				$beginYesterday=mktime(0,0,0,date(\'m\'),date(\'d\')-1,date(\'Y\'));
				if($time>$beginYesterday && $time<$beginToday){
					'.$name.'[$key][\'lastupdate\'] = "昨天";
				}elseif($time>$beginToday){
					'.$name.'[$key][\'lastupdate\'] = "今天";
					'.$name.'[$key][\'redtime\'] =1;
				}else{
					'.$name.'[$key][\'lastupdate\'] = date("Y-m-d",$value[\'lastupdate\']);					
				}
				'.$name.'[$key][\'sex\'] =$arr_data[\'sex\'][$value[\'sex\']];
				'.$name.'[$key][\'exp_name\'] =$userclass_name[$value[\'exp\']];
			}
		}
		if(is_array('.$name.')){
			if($paramer[keyword]!=""&&!empty('.$name.')){
				addkeywords(\'1\',$paramer[keyword]);
			}
		}';
        //自定义标签 END
       // global $DiyTagOutputStr;
       // $DiyTagOutputStr[]=$OutputStr;
        return SmartyOutputStr($this,$compiler,$_attr,'tiny',$name,$OutputStr,$name);
    }
}
class Smarty_Internal_Compile_Tinyelse extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);

        list($openTag, $nocache, $item, $key) = $this->closeTag($compiler, array('tiny'));
        $this->openTag($compiler, 'tinyelse', array('tinyelse', $nocache, $item, $key));

        return "<?php }\nif (!\$_smarty_tpl->tpl_vars[$item]->_loop) {\n?>";
    }
}
class Smarty_Internal_Compile_Tinyclose extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);
        if ($compiler->nocache) {
            $compiler->tag_nocache = true;
        }

        list($openTag, $compiler->nocache, $item, $key) = $this->closeTag($compiler, array('tiny', 'tinyelse'));

        return "<?php } ?>";
    }
}
