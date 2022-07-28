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

class page_model extends model
{

    function pageList($tableName, $whereData, $pageUrl, $pageNow, $limit = '', $sql = '', $maxPage = false)
    {

        $rows   =   array();

        $limit  =   $limit == '' ? $this->config['sy_listnum'] : intval($limit);

        $page   =   $pageNow < 1 ? 1 : intval($pageNow);

        if ($tableName == 'ad' && $this->config['did']) {
            $whereData['did']   =   $this->config['did'];
        }

        if ($sql) {

            $result =   $this->DB_query_all($sql);
            $num    =   $result ? $result['num'] : 0;
        } else {

            $num    =   $this->select_num($tableName, $whereData);
        }

        if ($maxPage) { // 超出最大页是否要处理
            $mpage = ceil($num/$limit);
            $page > $mpage && $page = $mpage;
        }

        $pagenav    =   Page($page, $num, $limit, $pageUrl, $notpl = false, $this->tpl);

        return array('total' => $num, 'pagenav' => $pagenav, 'limit' => array(($page - 1) * $limit, $limit));

    }


}

?>