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
class admin_sync_config_controller extends adminCommon{
	function index_action(){

		$this->yuntpl(array('admin/admin_sync_config'));
	}
	function save_action(){
 		if($_POST['config']){
		    unset($_POST['config']);
		    $this -> MODEL('config') -> setConfig($_POST);
			$this->web_config();
			$this->ACT_layer_msg("同步设置修改成功！",9,1,2,1);
		}
	}
	

}

?>