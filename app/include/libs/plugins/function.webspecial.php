<?php
//百度自动推送功能
function smarty_function_webspecial($paramer,&$smarty){
		 global $config;
		//加载首页主题
		include(PLUS_PATH."/indextpl.cache.php");
		if($_GET['tpltype']){//预览主题
			$tplindex=$indextpl[$_GET['tpltype']];
		}else{
			$time=time();
			foreach($indextpl as $key=>$v){
				if($v['status']==1 && $v['stime']<$time && $v['etime']>$time){
					$tplindex=$v;
					break;
				}
			}
		}
		
		if($tplindex['pic']){
			$tplindex['pic']=$config['sy_ossurl'].'/'.$tplindex['pic'];
			$content='';
			if($tplindex['pic']){
				if($tplindex['height']>0){//定义头部高度
					$height='$(".yunheader_60").css("margin-top","'.$tplindex['height'].'px");';
				}
				
				$content.='<script>
						window.onload = function() {
							$("body").css("background","#f8f8f8 url('.$tplindex['pic'].') no-repeat center top");
							$(".yunheader_60").css("background","none");
							'.$height.'
						}; 
					 </script>';					
			}
			if($tplindex['se']==1){
		        $content.='<script>
                                var o=navigator.userAgent.toLowerCase();
                                if((window.ActiveXObject||"ActiveXObject"in window)&&((o.match(/msie\s(\d+)/)||[])[1]||"11")){
                                    var d = document.createElement("script");
				                    d.src = "'.$config['sy_weburl'].'/js/grayscale.js";
                                    document.head.appendChild(d);
                                    setTimeout(function(){grayscale(document.body);},2000)
                                }else{
                                    document.body.style.filter = "grayscale(100%)";
                                }
                            </script>';
			}
			return $content;
		}
	}
?>