<?php
	function smarty_function_datacall($paramer,&$smarty){
		global $config,$views;
		include LIB_PATH."datacall.class.php";
		$obj=$views->obj;
		$call= new datacall(PLUS_PATH."data/",$obj);
		$row=$call->get_data($paramer[id]);//įæįžå­
		$row=str_replace("\n","",$row);
		$row=str_replace("\r","",$row);
		return $row;
	}
?>