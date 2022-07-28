<?php

/**
 * $Author ：PHPYUN开发团队
 *
 * 官网: http://www.phpyun.com
 *
 * 版权所有 2009-2021 宿迁鑫潮信息技术有限公司，并保留所有权利。
 *
 * 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
 */
class expectq_controller extends user
{

    function index_action()
    {

        $resume =   $this->public_action();

        if (!$resume['name'] || !$resume['edu']) {

            $this->ACT_msg('index.php?c=info', "请先完善个人资料！");
        }

        $cacheList  =   $this->MODEL('cache')->GetCache(array('city', 'hy', 'user', 'job'));
        $this->yunset($cacheList);

        if (empty($cacheList['city_type'])) {

            $this->yunset('cionly', 1);
        }
        if (empty($cacheList['job_type'])) {

            $this->yunset('jionly', 1);
        }
        $resumeM    =   $this->MODEL('resume');
        $num        =   $resumeM->getExpectNum(array('uid' => $this->uid));
        if ($num >= $this->config['user_number'] && $this->config['user_number'] != '' && $_GET['e'] == '') {

            $this->ACT_msg("index.php?c=resume", "你的简历数已经超过系统设置的简历数了");
        }

        $row        =   $resumeM->getExpect(array('id' => intval($_GET['e']), 'uid' => $this->uid));

        $jobClassId =    @explode(',', $row['job_classid']);

        if (is_array($jobClassId)) {

            $jobClassName           =   array();
            foreach ($jobClassId as $v) {
                if ($cacheList['job_name'][$v]) {

                    $jobClassName[] =   $cacheList['job_name'][$v];
                }
            }
            $row['job_classname']   =   @implode(',', $jobClassName);
        }

        $cityClassId    =   @explode(',', $row['city_classid']);

        if (is_array($cityClassId)) {
            $cityClassName          =   array();
            foreach ($cityClassId as $v) {
                if ($cacheList['city_name'][$v]) {

                    $cityClassName[]=   $cacheList['city_name'][$v];
                }
            }
            $row['city_classname']  =   @implode(',', $cityClassName);
        }

        $doc        =   $resumeM->getResumeDoc(array('eid' => intval($_GET['e']), 'uid' => $this->uid));
        $row['doc'] =   $doc['doc'];

        $this->yunset("row", $row);
        $this->yunset("js_def", 2);
        $this->user_tpl('expectq');
    }

    function save_action()
    {

        $resumeM    =   $this->MODEL('resume');
        if ($_POST['submit']) {

            $_POST  =   $this->post_trim($_POST);
            $rinfo  =   $resumeM->getResumeInfo(array('uid' => $this->uid), array('field' => 'r_status'));

            $eid    =   (int)$_POST['eid'];
            $doc    =   str_replace("&amp;", "&", $_POST['doc']);

            if ($eid) {

                $r_status = resumeTimeState($this->config['user_revise_state']);
            } else {
                $r_status = resumeTimeState($this->config['resume_status']);
            }
            $expectDate = array(
                'height_status' => 0,
                'state' => $rinfo['r_status'] == 1 ? $r_status : 0,
                'r_status' => $rinfo['r_status'],
                'integrity' => 100,
                'name' => $_POST['name'],
                'hy' => $_POST['hy'],
                'job_classid' => $_POST['job_classid'],
                'minsalary' => $_POST['minsalary'],
                'maxsalary' => $_POST['maxsalary'],
                'city_classid' => $_POST['city_classid'],
                'type' => $_POST['type'],
                'report' => $_POST['report'],
                'jobstatus' => $_POST['jobstatus'],
                'uid' => $this->uid,
                'did' => $this->userdid
            );

            $data = array(
                'eid' => $eid,
                'uid' => $this->uid,
                'usertype' => $this->usertype,
                'expect' => $expectDate,
                'doctype' => 1,
                'doc' => $doc,
                'utype' => 'user'
            );

            $return = $resumeM->addDocInfo($data);

            if ($return['errcode'] == 1) {

                $this->ACT_layer_msg($return['msg'], 8, "index.php?c=resume");
            } else {

                $this->ACT_layer_msg($return['msg'], $return['errcode'], "index.php?c=resume");
            }
        }
    }

}

?>