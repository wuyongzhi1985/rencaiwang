<?php

set_time_limit(0);
include("../global.php");

$version = 'v6.1.2 (20220705)';

$query = $db->query("SELECT * FROM ".$db_config[def]."version WHERE 1 ORDER BY id DESC");

$vr = $db->fetch_array($query);

if($vr['version'] == $version){
    echo $version."升级文件已运行！";exit();
}

if($_GET[step]!="5"){
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>正在升级中.... - - Powered by PHPYun.</title>
        
<link href="'.$config[sy_weburl].'/template/member/style/msg.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="content" style="background:f5f5f5;">
  <div class="content-title" style="width:100%"><span style="width:100%">正在升级中,已进行'.$_GET[step].'/5</span></div>
  <div style="border:1px solid #ccc; float:left;width:100%;">
    <dl style="width:100%">
       <p style="text-align:center;"><img src="loading.gif"></p><br>
	   <p style="text-align:center;"><font color="red">本次更新时间较长,请不要中途中断,以免升级失败,请耐心等待！</font></p>
    </dl>
</div>
</div>
</body>
</html>';
};
if($_GET[step]==""){
    
    echo "<script>location.href='$config[sy_weburl]/update/index.php?step=1';</script>";
}
/****************************第一步：新增数据字段************************************/
if($_GET[step]=="1"){
    // 新闻内容字段类型
    $db->query("ALTER TABLE `$db_config[def]company_job` MODIFY COLUMN `lastupdate` int(10) NOT NULL DEFAULT '0' ");
    $db->query("ALTER TABLE `$db_config[def]company_statis` ADD COLUMN `oldrating` int(11) NULL");
    $db->query("ALTER TABLE `$db_config[def]look_job` ADD COLUMN `ip` varchar(128) NULL");
    $db->query("ALTER TABLE `$db_config[def]look_resume` ADD COLUMN `ip` varchar(128) NULL");
    $db->query("ALTER TABLE `$db_config[def]news_content` MODIFY COLUMN `content` longtext ");
    $db->query("ALTER TABLE `$db_config[def]resume_city_job_class` MODIFY COLUMN `provinceid` int(10) NOT NULL DEFAULT '0' ");
    $db->query("ALTER TABLE `$db_config[def]resume_city_job_class` MODIFY COLUMN `job1` int(10) NOT NULL DEFAULT '0' ");
    
    $db->query("ALTER TABLE `$db_config[def]version` ADD COLUMN `code` varchar(10) NULL");
    $db->query("ALTER TABLE `$db_config[def]wxpub_twtask` ADD COLUMN `type` int(1) NOT NULL DEFAULT '1'");
    // 职位举报类别
    $query = $db->query("SELECT `id` FROM `".$db_config[def]."comclass` WHERE `variable`='job_jobreport'");
    $row = $db->fetch_array($query);
    if (empty($row)){
        $db->query("INSERT INTO `$db_config[def]comclass` (`id`, `keyid`, `name`, `variable`,`sort`) VALUES (NULL, '0', '职位举报','job_jobreport', 0);");
        $reportid = $db->insert_id();
        $db->query("INSERT INTO `$db_config[def]comclass` (`id`, `keyid`, `name`, `variable`,`sort`) VALUES (NULL, ".$reportid.", '电话空号','',1);");
        $db->query("INSERT INTO `$db_config[def]comclass` (`id`, `keyid`, `name`, `variable`,`sort`) VALUES (NULL, ".$reportid.", '无人接听','',2);");
        $db->query("INSERT INTO `$db_config[def]comclass` (`id`, `keyid`, `name`, `variable`,`sort`) VALUES (NULL, ".$reportid.", '工资虚假','',3);");
        $db->query("INSERT INTO `$db_config[def]comclass` (`id`, `keyid`, `name`, `variable`,`sort`) VALUES (NULL, ".$reportid.", '非法收费','',4);");
        $db->query("INSERT INTO `$db_config[def]comclass` (`id`, `keyid`, `name`, `variable`,`sort`) VALUES (NULL, ".$reportid.", '职介冒充','',5);");
    }
    // config缓存
    if(!isset($config['warning_sendresume_type'])){
        
        $db->query("INSERT INTO `$db_config[def]admin_config` SET `name`='warning_sendresume_type',`config`='2'");
        
        $config['warning_sendresume_type'] = 2;
    }
    if(!isset($config['warning_sqjob_type'])){
        
        $db->query("INSERT INTO `$db_config[def]admin_config` SET `name`='warning_sqjob_type',`config`='1'");
        
        $config['warning_sqjob_type'] = 2;
    }
    if(!isset($config['warning_sendresume_tips'])){
        
        $db->query("INSERT INTO `$db_config[def]admin_config` SET `name`='warning_sendresume_tips',`config`='您今日投递次数过多，请明日再试！'");
        
        $config['warning_sendresume_tips'] = '您今日投递次数过多，请明日再试！';
    }
    if(!isset($config['warning_sqjob'])){
        
        $db->query("INSERT INTO `$db_config[def]admin_config` SET `name`='warning_sqjob',`config`='100'");
        
        $config['warning_sqjob'] = '100';
    }
    if(!isset($config['warning_sqjob_tips'])){
        
        $db->query("INSERT INTO `$db_config[def]admin_config` SET `name`='warning_sqjob_tips',`config`='您今日跨行投递次数过多，请明日再试！'");
        
        $config['warning_sqjob_tips'] = '您今日跨行投递次数过多，请明日再试！';
    }
    if(!isset($config['warning_lookresume'])){
        
        $db->query("INSERT INTO `$db_config[def]admin_config` SET `name`='warning_lookresume',`config`='200'");
        
        $config['warning_lookresume'] = '200';
    }
    if(!isset($config['warning_lookresume_type'])){
        
        $db->query("INSERT INTO `$db_config[def]admin_config` SET `name`='warning_lookresume_type',`config`='2'");
        
        $config['warning_lookresume_type'] = '2';
    }
    if(!isset($config['warning_lookjob'])){
        
        $db->query("INSERT INTO `$db_config[def]admin_config` SET `name`='warning_lookjob',`config`='200'");
        
        $config['warning_lookjob'] = '200';
    }
    if(!isset($config['warning_lookjob_type'])){
        
        $db->query("INSERT INTO `$db_config[def]admin_config` SET `name`='warning_lookjob_type',`config`='2'");
        
        $config['warning_lookjob_type'] = '2';
    }
    if(!isset($config['warning_teljob'])){
        
        $db->query("INSERT INTO `$db_config[def]admin_config` SET `name`='warning_teljob',`config`='100'");
        
        $config['warning_teljob'] = '100';
    }
    if(!isset($config['warning_teljob_type'])){
        
        $db->query("INSERT INTO `$db_config[def]admin_config` SET `name`='warning_teljob_type',`config`='2'");
        
        $config['warning_teljob_type'] = '2';
    }
    echo "<script>location.href='$config[sy_weburl]/update/index.php?step=2';</script>";
}
/****************************第二步：个人去掉审核功能，更新基本信息表字段************************************/
if($_GET[step]=="2"){
    $query = $db->query("SELECT count(*) as num FROM `$db_config[def]resume` WHERE `r_status` IN (0,3)");
    while($row=$db->fetch_array($query))
    {
        $count = $row['num'];
    }
    $size = 500;
    $num = ceil($count/$size);
    
    if(!$_GET['num']){
        $i = 0;
        
    }else{
        $i=$_GET['num'];
    }
    $SQL = "SELECT `uid` FROM `" . $db_config[def] . "resume` WHERE `r_status` IN (0,3) LIMIT ".$size * $i.", ".$size;
    
    $query = $db->query($SQL);
    $cuids = array();
    while($row=$db->fetch_array($query))
    {
        $cuids[] = $row['uid'];
    }
    if (!empty($cuids)){
        $db->query("UPDATE `" . $db_config[def] . "resume` SET `r_status` = '1' WHERE `uid` in (".implode(',', $cuids).")");
    }
    if(($i+1)>=$num){
        echo "<script>location.href='$config[sy_weburl]/update/index.php?step=3';</script>";
    }else{
        $getnum = $i+1;
        echo "<script>location.href='$config[sy_weburl]/update/index.php?step=2&num=".$getnum."';</script>";
    }
}
/****************************第三步：个人去掉审核功能，更新简历表字段************************************/
if($_GET[step]=="3"){
    $query = $db->query("SELECT count(*) as num FROM `$db_config[def]resume_expext` WHERE `r_status` IN (0,3)");
    while($row=$db->fetch_array($query))
    {
        $count = $row['num'];
    }
    $size = 500;
    $num = ceil($count/$size);
    
    if(!$_GET['num']){
        $i = 0;
        
    }else{
        $i=$_GET['num'];
    }
    $SQL = "SELECT `uid` FROM `" . $db_config[def] . "resume_expext` WHERE `r_status` IN (0,3) LIMIT ".$size * $i.", ".$size;
    
    $query = $db->query($SQL);
    $cuids = array();
    while($row=$db->fetch_array($query))
    {
        $cuids[] = $row['uid'];
    }
    if (!empty($cuids)){
        $db->query("UPDATE `" . $db_config[def] . "resume_expext` SET `r_status` = '1' WHERE `uid` in (".implode(',', $cuids).")");
    }
    if(($i+1)>=$num){
        echo "<script>location.href='$config[sy_weburl]/update/index.php?step=4';</script>";
    }else{
        $getnum = $i+1;
        echo "<script>location.href='$config[sy_weburl]/update/index.php?step=3&num=".$getnum."';</script>";
    }
}
/****************************第四步  清空缓存************************************/
if($_GET[step]=="4"){
    $delfiles="data/templates_c";
    $dh=@opendir($delfiles);
    while($file=@readdir($dh)){
        if($file!="."&&$file!=".."){
            $fullpath=$delfiles."/".$file;
            @unlink($fullpath);
        }
    }
    @closedir($dh);
    echo "<script>location.href='$config[sy_weburl]/update/index.php?step=5';</script>";
}
/****************************第五步 升级完成************************************/
if($_GET[step]=="5"){
    
    $db->query('INSERT INTO `'.$db_config[def].'version` SET `version`="v6.1.2 (20220705)",`code`="6.1.2",`ctime`='.time());
    
    echo "数据库升级成功！请删除/update/ 目录 根据以下提示继续操作！";
    echo "<pre>";
    echo "1：进入后台 工具-生成-<font color='red'>生成缓存(数据库缓存)</font>";
    echo "<pre>";
    echo "2：进入后台 清除缓存";
    echo "<pre>";
    echo "3：其他各项配置按需修改";
    echo "<pre>";
}
?>