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

class gongzhao_controller extends wxapp_controller
{

    /**
     * 公招列表
     */
    function getgongzhao_action()
    {
        $gongzhaoM = $this->MODEL('gongzhao');

        $time = time();
        //公招开始时间条件
        $where['PHPYUNBTWSTART_A'] = array();
        $where['startime'][]       = array('<=', $time, 'OR');
        $where['startime'][]       = array('=', 0, 'OR');
        $where['startime'][]       = array('isnull', '', 'OR');
        $where['PHPYUNBTWEND_A']   = array();
        $where['PHPYUNBTWSTART_B'] = array();
        $where['endtime'][]        = array('>', $time, 'AND');
        $where['endtime'][]        = array('=', 0, 'OR');
        $where['endtime'][]        = array('isnull', '', 'OR');
        $where['PHPYUNBTWEND_B']   = array();
        // 处理分站查询条件
        if (!empty($_POST['did'])) {
            $where['did'] = $_POST['did'];
        }

        $page  = $_POST['page'];
        $limit = $_POST['limit'];
        $limit = !$limit ? 10 : $limit;

        $where['orderby'] = array('rec,desc','startime,desc','datetime, dessc');
        if ($page) {
            $pagenav        = ($page - 1) * $limit;
            $where['limit'] = array($pagenav, $limit);
        } else {
            $where['limit'] = array('', $limit);
        }
        $rows = $gongzhaoM->getList($where, array('field' => '`id`,`title`,`startime`,`pic`', 'utype' => 'wxapp'));
        if (is_array($rows) && $rows) {
            $data['list']  = count($rows['list']) > 0 ? $rows['list'] : array();
            // 小程序用seo
            if (isset($_POST['provider'])){
                if ($_POST['provider'] == 'weixin'){
                    $seo            =  $this->seo('gongzhao','','','',false, true);
                    $data['seo']    =  $seo;
                }
            }
            $data['error'] = 1;
        } else {
            $data['error'] = 2;
        }
        $this->render_json($data['error'], '', $data);
    }


    /**
     * 公告详情
     */
    function gongzhaoshow_action()
    {
        $id = (int)$_POST['id'];
        if (!$id) {
            $data['error'] = 3;
        } else {
            $gongzhaoM = $this->MODEL('gongzhao');
            $info           = $gongzhaoM->getInfo(array('id' => $id));
            if (is_array($info)) {
                $content = str_replace(array('&quot;', '&nbsp;', '<>'), array('', '', ''), $info['content']);
                $content = htmlspecialchars_decode($content);
                preg_match_all('/<img(.*?)src=("|\'|\s)?(.*?)(?="|\'|\s)/', $content, $res);

                if (!empty($res[3])) {
                    foreach ($res[3] as $v) {
                        if (strpos($v, 'http:') === false && strpos($v, 'https:') === false) {
                            $content = str_replace($v, $this->config['sy_ossurl'] . $v, $content);
                        }
                    }
                }
                if (isset($_POST['provider'])) {
                    // app用分享数据
                    if ($_POST['provider'] == 'app'){

                        $data['shareData']  =  array(
                            'url'       =>  Url('wap',array('c'=>'gongzhao','a'=>'show','id'=>$id)),
                            'title'     =>  $info['title'],
                            'summary'   =>  mb_substr(strip_tags($info['content']), 0,30,'UTF8'),
                            'imageUrl'  =>  checkpic($info['pic'],$this->config['sy_wx_sharelogo'])
                        );
                    }
                    // 小程序用seo
                    if ($_POST['provider'] == 'weixin') {
                        // 将微信汉字替换，防止审核时被判断为诱导分享
                        $info['content']        =   str_ireplace(array('微信', '同号'), '', $info['content']);
                        // 过滤iframe标签，防止有视频链接
                        $info['content']        =   preg_replace("/<(i?frame.*?)>(.*?)<(\/i?frame.*?)>/si","",$info['content']);

                        $seodata['gz_title']  =   $info['title'];//新闻名称
                        $seodata['gz_keyword']=   $info['keyword'];//描述
                        $description       =   $info['description'] ? $info['description'] : $info['content'];
                        $seodata['gz_desc']   =   $this->GET_content_desc($description);//描述
                        $this->data             =   $seodata;

                        $seo                    =   $this->seo('gongzhao_article', '', '', '', false, true);
                        $data['seo']            =   $seo;
                    }

                }

                $data['list']  = $info;
                
                $time = time();
                //公招开始时间条件
                $where['PHPYUNBTWSTART_A'] = array();
                $where['startime'][]       = array('<=', $time, 'OR');
                $where['startime'][]       = array('=', 0, 'OR');
                $where['startime'][]       = array('isnull', '', 'OR');
                $where['PHPYUNBTWEND_A']   = array();
                $where['PHPYUNBTWSTART_B'] = array();
                $where['endtime'][]        = array('>', $time, 'AND');
                $where['endtime'][]        = array('=', 0, 'OR');
                $where['endtime'][]        = array('isnull', '', 'OR');
                $where['PHPYUNBTWEND_B']   = array();
                // 处理分站查询条件
                if (!empty($_POST['did'])) {
                    $where['did'] = $_POST['did'];
                }
                $where['id'] = array('<>', $info['id']);
                $where['orderby'] = "startime,desc";
                $where['limit'] = array('', 5);
                
                $rows = $gongzhaoM->getList($where, array('field' => '`id`,`title`,`startime`,`pic`', 'utype' => 'wxapp'));
                $data['gzlist'] = !empty($rows['list']) ? $rows['list'] : array();
                
                $data['error'] = 1;
            } else {
                $data['error'] = 2;
            }
        }
        $this->render_json($data['error'], '', $data);
    }
}

?>