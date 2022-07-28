<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 13:47:55
         compiled from "D:\www\www\phpyun\app\template\admin\admin_right_web.htm" */ ?>
<?php /*%%SmartyHeaderCode:134264718462e2230b43ca90-37504256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3e6d75bb99a17bf07d82bb3b89df3283f047591' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_right_web.htm',
      1 => 1650462146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134264718462e2230b43ca90-37504256',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'type' => 0,
    'name' => 0,
    'list' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e2230b471da5_27441993',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e2230b471da5_27441993')) {function content_62e2230b471da5_27441993($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<link href="images/reset.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
	<link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/css/layui.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet"/>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/layui.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" language="javascript"><?php echo '</script'; ?>
>
	<!--<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/phpyun_layer.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>-->
	<title>后台管理</title>
</head>

<body class="body_ifm">
<?php if ($_smarty_tpl->tpl_vars['type']->value=="tj") {?>
	<div class="admin_atatic_chart fl" id="main2" style="height:300px;"></div>
    <?php echo '<script'; ?>
 src="js/echarts_plain.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        var myChart = echarts.init(document.getElementById('main2'));

		var legendData = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
');
		var tjlist = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
');

		var xAxisData = [],
			seriesList = [],
			seriesObj = {},
			seriesData = [],
			seriesColor = [
				'rgb(224, 108, 104)',
				'rgb(191,227,249)',
				'rgb(146, 196, 202)',
				'rgb(237, 205, 193)'
			];
		tjlist.forEach(function (item, key) {
			$(".tj-name").eq(key).text(legendData[key]);
			$(".tj-num").eq(key).text(item.count);
			$(".tj-count").eq(key).show();
			seriesData = [];
			for (let sdkey in item.list) {
				if (key == 0) {
					xAxisData.push(item.list[sdkey].td);
				}
				seriesData.push(item.list[sdkey].cnt);
			}

			seriesObj = {
				name: legendData[key],
				type:'line',
				symbol:'emptyCircle',
				// smooth: true,
				itemStyle: {
					normal: {
						areaStyle: {
							width: 2,
							color: seriesColor[key]
						}
					}
				},
				data: seriesData
			};
			seriesList.push(seriesObj);
		})

        var option = {
			tooltip: {trigger: 'axis'},
			grid: {
				left: '3%',
				right: '4%',
				bottom: '12%',
				containLabel: true
			},
			legend: {
				data: legendData
			},
			calculable: false,
			xAxis: [
				{
					type: 'category',
					boundaryGap: false,
					data: xAxisData
				}
			],
			yAxis: [{type: 'value', minInterval: 1}],
			series: seriesList
		};
        myChart.setOption(option); // 为echarts对象加载数据 
        setTimeout(function () {
            window.addEventListener("resize", () => {
                myChart.resize();
            });
        }, 200);
    <?php echo '</script'; ?>
>
    
<?php } elseif (($_smarty_tpl->tpl_vars['type']->value=="dt")) {?>
<ul class="right_web_list">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
<li>会员
<!--下载简历-->
<?php if ($_smarty_tpl->tpl_vars['v']->value['downtime']) {?>
<?php echo $_smarty_tpl->tpl_vars['v']->value['comusername'];?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['v']->value['order_time']) {?>
<?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['v']->value['jobid']||$_smarty_tpl->tpl_vars['v']->value['job_id']) {?>
<?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['v']->value['resume_id']) {?>
<?php echo $_smarty_tpl->tpl_vars['v']->value['comusername'];?>

<?php }?>

在

<?php if ($_smarty_tpl->tpl_vars['v']->value['downtime']) {?>
<?php if ($_smarty_tpl->tpl_vars['v']->value['time']<60) {?> <span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['v']->value['time'];?>
</span> <?php } else {
echo $_smarty_tpl->tpl_vars['v']->value['time'];
}?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['v']->value['datetime']) {?>
<?php if ($_smarty_tpl->tpl_vars['v']->value['times']<60) {?> <span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['v']->value['times'];?>
</span> <?php } else {
echo $_smarty_tpl->tpl_vars['v']->value['times'];
}?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['v']->value['order_time']) {?>
<?php if ($_smarty_tpl->tpl_vars['v']->value['timess']<60) {?> <span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['v']->value['timess'];?>
</span> <?php } else {
echo $_smarty_tpl->tpl_vars['v']->value['timess'];
}?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['v']->value['downtime']) {?>
下载了 <?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
 的简历
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['v']->value['job_name']) {?>
<?php if ($_smarty_tpl->tpl_vars['v']->value['eid']) {?>申请了<?php } else { ?>收藏了<?php }?> <?php echo $_smarty_tpl->tpl_vars['v']->value['job_name'];?>
 职位
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['v']->value['jobid']) {?>
浏览了 <?php echo $_smarty_tpl->tpl_vars['v']->value['jobname'];?>
 职位
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['v']->value['resume_id']) {?>
浏览了 <?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
 简历
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['v']->value['order_time']) {?>
充值了 <?php echo $_smarty_tpl->tpl_vars['v']->value['order_price'];?>

<?php }?>
</li>
<?php } ?>
</ul>

<?php } elseif (($_smarty_tpl->tpl_vars['type']->value=="rz")) {?>

<ul class="right_web_list">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
<li>会员 <?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
 在
<?php if ($_smarty_tpl->tpl_vars['v']->value['ctime']) {?>
<?php if ($_smarty_tpl->tpl_vars['v']->value['time']<60) {?> <span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['v']->value['time'];?>
</span> <?php } else {
echo $_smarty_tpl->tpl_vars['v']->value['time'];
}?>
<?php }?>
<?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</li>
<?php } ?>
</ul>
<?php }?>
</body>
</html><?php }} ?>
