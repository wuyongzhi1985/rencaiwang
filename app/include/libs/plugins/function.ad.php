<?php
function smarty_function_ad($paramer,&$smarty){
    global $config,$views;
    include PLUS_PATH."pimg_cache.php";
    if(!file_exists(PLUS_PATH."pimg_cache.php")){
        $obj->advertise_cache();
    }
    $ad_id = "ad_".intval($paramer['id']);
    $ad_class_id = intval($paramer['cid']);
    $lay = isset($paramer['lay']) ? true : false;

    if($ad_label[$ad_class_id]){
        if ($lay){
            $ad_info = $ad_label[$ad_class_id][$ad_id]['lay_html'];
        }else{
            $ad_info = $ad_label[$ad_class_id][$ad_id]['html'];
        }
        $ad_info=str_replace("\n","",$ad_info);
        $ad_info=str_replace("\r","",$ad_info);
        return $ad_info;
    }
}
?>