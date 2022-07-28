<?php
class Smarty_Internal_Compile_Qrecom extends Smarty_Internal_CompileBase{
    public $required_attributes = array('item');
    public $optional_attributes = array('name', 'key', 'ispage', 'limit');
    public $shorttag_order = array('from', 'item', 'key', 'name');
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);

        $from = $_attr['from'];
        $item = $_attr['item'];
        if (!strncmp("\$_smarty_tpl->tpl_vars[$item]", $from, strlen($item) + 24)) {
            $compiler->trigger_template_error("item variable {$item} may not be the same variable as at 'from'", $compiler->lex->taglineno);
        }
        
        $OutputStr='global $db,$db_config,$config;$paramer='.ArrayToString($_attr,true).';$attention=array();
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
		if($_COOKIE[\'uid\']){
			$atn=$db->select_all("atn","`uid`=\'".$_COOKIE[\'uid\']."\'","`sc_uid`");
			foreach($atn as $a_v){
				$atn_uid.=$a_v[\'sc_uid\'].\',\';//我已近关注过的用户id
			}
			$atn_uid =$atn_uid.$_COOKIE[\'uid\'];
			$awhere=" and `uid` not in(".$atn_uid.")";
		}
		
		$attention=$db->select_all("attention","`type`=\'2\' ".$awhere." order by rand() limit 10","`uid`,`ids`");
		if(count($attention)){
			foreach($attention as $a_k=>$a_v){
				$uid[]=$a_v[\'uid\'];
				$class_id.=$a_v[\'ids\'];
			}
			$uids=@implode(\',\',$uid);
			$class_ids=@implode(\',\',array_unique(@explode(\',\',rtrim($class_id,\',\'))));
			$q_class = $db->select_all("q_class","id in(".$class_ids.")","`id`,`name`");
			$member = $db->select_all("friend_info","uid in(".$uids.") and `nickname`<>\'\'","`uid`,`nickname`,`pic`,`description`");
			foreach($attention as $key=>$val){
				$cid=@explode(\',\',rtrim($val[\'ids\'],\',\'));
				if($val[\'uid\']==$_COOKIE[\'uid\']){
					$attention[$key][\'is_atn\']=\'2\';//表示这是本人，不显示关注按钮
				}
				foreach($q_class as $q_v){
					if(in_array($q_v[\'id\'],$cid)){
						$class_name[]=$q_v[\'name\'];
					}
				}
				foreach($member as $m_val){
					if($val[\'uid\']==$m_val[\'uid\']){
						$attention[$key][\'nickname\']=$m_val[\'nickname\'];
						$attention[$key][\'pic\']=	checkpic("",$config[\'sy_friend_icon\']);
						$attention[$key][\'description\']=$m_val[\'description\'];
					}
				}
				if($class_name){
					$attention[$key][\'class_name\']=@implode(\'、\',$class_name);
				}
				unset($class_name);
				unset($cid);
			}
			if(empty($attention)){
				$attention="";
			}
		}
		';

        return SmartyOutputStr($this,$compiler,$_attr,'qrecom','$attention',$OutputStr,'$attention');
    }
}
class Smarty_Internal_Compile_Qrecomelse extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);

        list($openTag, $nocache, $item, $key) = $this->closeTag($compiler, array('qrecom'));
        $this->openTag($compiler, 'qrecomelse', array('qrecomelse', $nocache, $item, $key));

        return "<?php }\nif (!\$_smarty_tpl->tpl_vars[$item]->_loop) {\n?>";
    }
}
class Smarty_Internal_Compile_Qrecomclose extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);
        if ($compiler->nocache) {
            $compiler->tag_nocache = true;
        }

        list($openTag, $compiler->nocache, $item, $key) = $this->closeTag($compiler, array('qrecom', 'qrecomelse'));

        return "<?php } ?>";
    }
}
