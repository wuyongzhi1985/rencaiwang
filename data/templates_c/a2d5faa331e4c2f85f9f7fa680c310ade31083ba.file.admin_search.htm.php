<?php /* Smarty version Smarty-3.1.21-dev, created on 2022-07-28 14:19:39
         compiled from "D:\www\www\phpyun\app\template\admin\admin_search.htm" */ ?>
<?php /*%%SmartyHeaderCode:34779988262e22a7b4b2543-31673168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2d5faa331e4c2f85f9f7fa680c310ade31083ba' => 
    array (
      0 => 'D:\\www\\www\\phpyun\\app\\template\\admin\\admin_search.htm',
      1 => 1650525219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34779988262e22a7b4b2543-31673168',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'config' => 0,
    'search_list' => 0,
    'rows' => 0,
    't' => 0,
    'k' => 0,
    'rs' => 0,
    'job_name' => 0,
    'city_name' => 0,
    'row' => 0,
    'v' => 0,
    'r' => 0,
    'userclass_name' => 0,
    'userdata' => 0,
    'comclass_name' => 0,
    'comdata' => 0,
    'expect' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_62e22a7b4ee4f7_31753842',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62e22a7b4ee4f7_31753842')) {function content_62e22a7b4ee4f7_31753842($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include 'D:\\www\\www\\phpyun\\app\\include\\libs\\plugins\\function.searchurl.php';
?><?php if ($_GET['m']=='admin_resume'||$_GET['m']=='admin_company_job') {?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/newclass.public.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/css/formSelects-v4.css?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" rel="stylesheet" type="text/css" />

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/data/plus/job.cache.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/data/plus/jobparent.cache.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src='<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/data/plus/city.cache.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/data/plus/cityparent.cache.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/newclass.public.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layui/formSelects-v4.js?v=<?php echo $_smarty_tpl->tpl_vars['config']->value['cachecode'];?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>var weburl = '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
'<?php echo '</script'; ?>
>

<style>
	.xm-select-parent .xm-select{
		min-height: 32px;padding: 1px 10px;
	}
	.news_expect_text_new_nth{height: 30px;}
	.news_expect_text_newcity_nth{height: 30px;}
	.xm-select-parent .xm-select .xm-select-input{width: 100px;}
</style>
<?php }?>
<div class="search_select">
	<div class="search_select_pdd" id="show_search">

		<?php if ($_GET['keyword']!='') {?>
			<a class="Search_jobs_c_a" href="<?php echo smarty_function_searchurl(array('m'=>$_GET['m'],'c'=>$_GET['c'],'untype'=>'keyword'),$_smarty_tpl);?>
">关键字：<?php echo $_GET['keyword'];?>
</a>
		<?php }?>
		
 		<?php  $_smarty_tpl->tpl_vars['rows'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rows']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['search_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->key => $_smarty_tpl->tpl_vars['rows']->value) {
$_smarty_tpl->tpl_vars['rows']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['rows']->key;
?>
       		<?php $_smarty_tpl->tpl_vars["t"] = new Smarty_variable($_smarty_tpl->tpl_vars['rows']->value['param'], null, 0);?>
            <?php if ($_GET[$_smarty_tpl->tpl_vars['t']->value]!==false&&$_GET[$_smarty_tpl->tpl_vars['t']->value]!='') {?>
            	<?php  $_smarty_tpl->tpl_vars['rs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rs']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rs']->key => $_smarty_tpl->tpl_vars['rs']->value) {
$_smarty_tpl->tpl_vars['rs']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['rs']->key;
?>
                	<?php if ($_GET[$_smarty_tpl->tpl_vars['t']->value]==$_smarty_tpl->tpl_vars['k']->value) {?>
                    	<a class="Search_jobs_c_a" href="<?php echo smarty_function_searchurl(array('m'=>$_GET['m'],'c'=>$_GET['c'],'untype'=>$_smarty_tpl->tpl_vars['t']->value),$_smarty_tpl);?>
">
                        	<?php echo $_smarty_tpl->tpl_vars['rows']->value['name'];?>
：<?php echo $_smarty_tpl->tpl_vars['rs']->value;?>

                    	</a>
                    <?php }?>
                <?php } ?>
            <?php }?> 
		<?php } ?>
		
		<?php if (($_GET['m']=='admin_resume'||$_GET['m']=='admin_company_job')&&$_GET['job_class']) {?>
		<a class="Search_jobs_c_a" href="<?php echo smarty_function_searchurl(array('m'=>$_GET['m'],'c'=>$_GET['c'],'untype'=>'job_class'),$_smarty_tpl);?>
">工作职能：<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['job_class']];?>
</a>
		<?php }?> 
		
		<?php if (($_GET['m']=='admin_resume'||$_GET['m']=='admin_company_job')&&$_GET['city_class']) {?>
		<a class="Search_jobs_c_a" href="<?php echo smarty_function_searchurl(array('m'=>$_GET['m'],'c'=>$_GET['c'],'untype'=>'city_class'),$_smarty_tpl);?>
">城市地区：<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['city_class']];?>
</a>
		<?php }?> 
 	</div>
</div>

<div class="clear"></div>

<div class="admin_screenlist_box">

	<?php $_smarty_tpl->tpl_vars["v"] = new Smarty_variable(0, null, 0);?>
	
	
	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['search_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
	    <?php $_smarty_tpl->tpl_vars["t"] = new Smarty_variable($_smarty_tpl->tpl_vars['row']->value['param'], null, 0);?>
	    <?php $_smarty_tpl->tpl_vars["v"] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value+1, null, 0);?>
	    
		<?php if (!($_GET['m']=='admin_resume'&&($_smarty_tpl->tpl_vars['t']->value=='edu'||$_smarty_tpl->tpl_vars['t']->value=='exp'))&&!($_GET['m']=='admin_company_job'&&($_smarty_tpl->tpl_vars['t']->value=='edu'||$_smarty_tpl->tpl_vars['t']->value=='exp'))) {?>
		
	    <div class="admin_screenlist">
	    	<span class="admin_screenlist_name"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
：</span>
	    	<a href="<?php echo smarty_function_searchurl(array('m'=>$_GET['m'],'c'=>$_GET['c'],'untype'=>$_smarty_tpl->tpl_vars['t']->value),$_smarty_tpl);?>
" <?php if ($_GET[$_smarty_tpl->tpl_vars['t']->value]!==true&&$_GET[$_smarty_tpl->tpl_vars['t']->value]=='') {?>class="admin_screenlist_cur"<?php }?>>全部</a>
		   <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['r']->key;
?>
	            <a href="<?php echo smarty_function_searchurl(array('m'=>$_GET['m'],'c'=>$_GET['c'],'adv'=>$_smarty_tpl->tpl_vars['k']->value,'adt'=>$_smarty_tpl->tpl_vars['t']->value,'untype'=>$_smarty_tpl->tpl_vars['t']->value),$_smarty_tpl);?>
" <?php if ($_GET[$_smarty_tpl->tpl_vars['t']->value]!==false&&$_GET[$_smarty_tpl->tpl_vars['t']->value]!=''&&$_GET[$_smarty_tpl->tpl_vars['t']->value]==$_smarty_tpl->tpl_vars['k']->value) {?> class="admin_screenlist_cur"<?php }?>><?php echo $_smarty_tpl->tpl_vars['r']->value;?>
</a> 
	        <?php } ?>  
	    </div>
		<?php }?>
		
	<?php } ?>
	
	<?php if ($_GET['m']=='admin_resume'||$_GET['m']=='admin_company_job') {?>
	<div class="gjsousuo_qt">
		<div class="gjsousuo_qt_label">其他条件：</div>
		<div class="gjsousuo_qt_tj">
			<div class="gjsousuo_list" style="width: auto;margin-right: 15px;">
				<div class="admin_td_h" style="width:255px;position:relative">
					
					<input id="job_class" type="hidden" value="<?php echo $_GET['job_class'];?>
" name="job_class">
					<select id="jobclass_search" class="expect_text" name="jobclass_search" xm-select-type="jobclass" xm-select="jobclass_search" 
						xm-select-search=""  xm-select-radio="" xm-select-skin="default"  xm-select-direction="down" style="width: 250px;margin-top: 0;">
						<option value="">输入搜索职能</option>
					</select>
					<div onclick="index_job_new(1,'#workadds_job','#job_class','left:100px;top:100px; position:absolute;','1');" class="news_expect_text_new_nth" title="选择职位类别"></div>
				</div>
			</div>
			
			<div class="gjsousuo_list" style="width: auto;margin-right: 15px;">
				<div  style="width:255px;position:relative">
					<select id="cityclass_search" class="expect_text" name="cityclass_search" xm-select-type="cityclass" xm-select="cityclass_search" xm-select-search=""  xm-select-radio="" xm-select-skin="default"  xm-select-direction="down">
					<option value="">输入搜索城市</option>
					</select>
					<div onclick="index_city_new(1,'#workadds_city','#city_class','left:100px;top:100px; position:absolute;')" class="news_expect_text_newcity_nth" title="选择城市"></div>
					<input type="hidden" name="city_class" id="city_class" value="<?php echo $_GET['city_class'];?>
" />
				</div>
			</div>

			<?php if ($_GET['m']=='admin_resume') {?>
				<div class="gjsousuo_list">
					<input type="button" class="admin_new_select_text gjsousuo_index" value="<?php if ($_GET['edu']) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['edu']];
} else { ?>学历要求<?php }?>">
				
					<div class="admin_Filter_text_box" style='display: none' id="">
						<ul>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
							<li><a href="<?php echo smarty_function_searchurl(array('m'=>$_GET['m'],'edu'=>$_smarty_tpl->tpl_vars['v']->value,'untype'=>'edu'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				
				<div class="gjsousuo_list">
					<input type="button" class="admin_new_select_text gjsousuo_index" value="<?php if ($_GET['exp']) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['exp']];
} else { ?>工作经验<?php }?>">
				
					<div class="admin_Filter_text_box" style='display: none' id="">
						<ul>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_word']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
							<li><a href="<?php echo smarty_function_searchurl(array('m'=>$_GET['m'],'exp'=>$_smarty_tpl->tpl_vars['v']->value,'untype'=>'exp'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			<?php } elseif ($_GET['m']=='admin_company_job') {?>
			
				<div class="gjsousuo_list">
					<input type="button" class="admin_new_select_text gjsousuo_index" value="<?php if ($_GET['edu']) {
echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['edu']];
} else { ?>学历要求<?php }?>">
				
					<div class="admin_Filter_text_box" style='display: none' id="">
						<ul>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
							<li><a href="<?php echo smarty_function_searchurl(array('m'=>$_GET['m'],'c'=>$_GET['c'],'edu'=>$_smarty_tpl->tpl_vars['v']->value,'untype'=>'edu'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				
				<div class="gjsousuo_list">
					<input type="button" class="admin_new_select_text gjsousuo_index" value="<?php if ($_GET['exp']) {
echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['exp']];
} else { ?>工作经验<?php }?>">
				
					<div class="admin_Filter_text_box" style='display: none' id="">
						<ul>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_exp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
							<li><a href="<?php echo smarty_function_searchurl(array('m'=>$_GET['m'],'c'=>$_GET['c'],'exp'=>$_smarty_tpl->tpl_vars['v']->value,'untype'=>'exp'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			<?php }?>	

		</div>
	</div>
	<?php }?>
	<div class="admin_screenlist_more"><a href="javascript:;" onclick="searchmore()">收起更多条件</a></div>
</div>

<?php echo '<script'; ?>
>
	function searchmore(){
		var html=$(".admin_screenlist_box").toggle();
	}

	var sheight = document.getElementById("show_search").offsetHeight;

	if(sheight > 12){

		$("#show_search").show();
	}else{

		$("#show_search").hide();
	}
<?php echo '</script'; ?>
>
<?php if ($_GET['m']=='admin_resume'||$_GET['m']=='admin_company_job') {?>
<?php echo '<script'; ?>
>
	function searchmore(){
		var html=$(".admin_screenlist_box").toggle();
	}

	var sheight = document.getElementById("show_search").offsetHeight;

	if(sheight > 12){

		$("#show_search").show();
	}else{

		$("#show_search").hide();
	}
	$(function(){
		$('.gjsousuo_list').mouseover(function(){
			$(this).find(".admin_Filter_text_box").show()
		})
		$('.gjsousuo_list').mouseout(function(){
			$(this).find(".admin_Filter_text_box").hide()
		})
		$('.admin_Filter_text_box li a').click(function(){
			var listhtml = $(this).html()
			$(this).parent().parent().parent().parent().find(".gjsousuo_index").val(listhtml)
			$('.admin_Filter_text_box').hide()
		})
	})
	
	var form = null,
		formSelects = null;

	layui.use(['layer', 'form'], function() {
		formSelects = layui.formSelects;
		form = layui.form;

		formSelects.btns('cityclass_search', []);
		formSelects.btns('jobclass_search', []);
		
		//实时获取选中值
		formSelects.on('jobclass_search', function(id, vals, val, isAdd, isDisabled){
			var jobvalue = [];
			vals.forEach(function(item,index){
				jobvalue.push(item.value);
			})
			$('#job_class').val(jobvalue.join(','));
		}, true);
		
		formSelects.on('cityclass_search', function(id, vals, val, isAdd, isDisabled){
			var cityvalue = [];
			vals.forEach(function(item,index){
				cityvalue.push(item.value);
			})
			$('#city_class').val(cityvalue.join(','));
		}, true);
		
		//重设职位类别数据
		'<?php if ($_smarty_tpl->tpl_vars['expect']->value['job_classid']) {?>'
		jobSearchReset();
		'<?php }?>'

		//重设城市类别数据
		'<?php if ($_smarty_tpl->tpl_vars['expect']->value['city_classid']) {?>'
		citySearchReset();
		'<?php }?>'

		formSelects.maxTips('jobclass_search', function(id, vals, val, max){
			layer.msg('最多只能选择1个！', 2, 8);
		});
		formSelects.maxTips('cityclass_search', function(id, vals, val, max){
			layer.msg('最多只能选择1个！', 2, 8);
		});
	});

	function jobSearchReset(){

		var formSelects = layui.formSelects, 
			jobclassArr= $("#job_class").val()!='' ? $("#job_class").val().split(",") : [],
			jarr = [];

		for(var i=0;i<jobclassArr.length;i++){
			jarr.push({"name":jn[jobclassArr[i]],"value":jobclassArr[i],"selected":'selected'});
		}

		formSelects.data('jobclass_search', 'local', {
			arr: jarr
		});
	}

	function citySearchReset(){

		var formSelects = layui.formSelects, 
			cityclassArr= $("#city_class").val()!='' ? $("#city_class").val().split(",") : [],
			carr = [];

		for(var i=0;i<cityclassArr.length;i++){
			carr.push({"name":cn[cityclassArr[i]],"value":cityclassArr[i],"selected":'selected'});
		}
		formSelects.data('cityclass_search', 'local', {
			arr: carr
		});
	}
<?php echo '</script'; ?>
>
<?php }?>
<div class="clear"></div><?php }} ?>
