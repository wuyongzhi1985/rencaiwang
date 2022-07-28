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

class index_controller extends common
{
    //计划任务
    function index_action()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : '';
        //读取定时任务缓存文件
        include PLUS_PATH.'cron.cache.php';
		
        //判断是否开启定时任务(定时任务缓存文件不为空),并且其他任务未处于执行状态

        if (!empty($cron) && isset($start) && (!$start || $starttime < (time() - 600))) {


            $CronM = $this->MODEL('cron');
			
            $CronM->excron($cron,$id);

        }
    }

}

?>