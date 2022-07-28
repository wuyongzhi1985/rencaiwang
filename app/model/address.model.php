<?php

/**
 * $Author ：PHPYUN开发团队
 *
 * 官网: http://www.phpyun.com
 *
 * 版权所有 2009-2022 宿迁鑫潮信息技术有限公司，并保留所有权利。
 *
 * 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
 */

class address_model extends model
{

    /**
     * @desc   获取缓存数据
     * @param $options
     * @return array|string|void
     */
    private function getClass($options)
    {

        if (!empty($options)) {

            include_once('cache.model.php');
            $cacheM = new cache_model($this->db, $this->def);
            $cache  = $cacheM->GetCache($options);
            return $cache;
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function getCityStr($data = array())
    {

        $return = array();
        if (!empty($data)) {

            $cache = $this->getClass(array('city'));

            $cityStr = $cache['city_name'][$data['provinceid']] . $cache['city_name'][$data['cityid']] . $cache['city_name'][$data['three_cityid']];

            $return['cityStr'] = $cityStr;
        }

        return $return;
    }


    /**
     * @desc    工作地址
     * @param array $where
     * @param array $data
     * @return array|bool|false|string|void
     */
    public function getAddressList($where = array(), $data = array())
    {

        $field  =   isset($data['field']) ? $data['field'] : '*';

        $List   =   $this->select_all('company_job_link', $where, $field);

        if (!empty($List)){

            $cache  =   $this->getClass(array('city'));
            foreach ($List as $k => $v) {

                if ($v['three_cityid']){

                    $List[$k]['city']   =   $cache['city_name'][$v['provinceid']].$cache['city_name'][$v['cityid']].$cache['city_name'][$v['three_cityid']];
                }else{

                    $List[$k]['city']   =   $cache['city_name'][$v['provinceid']].$cache['city_name'][$v['cityid']];
                }
                $phone_n                =   !empty($v['link_moblie']) ? $v['link_moblie'] : $v['link_phone'];

                $List[$k]['linkmsg']    =   $v['link_man'] . ' - ' . $phone_n . ' - ' . $List[$k]['city'] . ' - ' . $v['link_address'];
            }
        }

        return  $List;
    }

    /**
     * @param array $where
     * @param array $data
     * @return array|bool|false|string|void
     */
    public function getAddressInfo($where = array(), $data = array())
    {

        $field  =   isset($data['field']) ? $data['field'] : '*';

        $Info   =   $this->select_once('company_job_link', $where, $field);

        $cache  =  $this->getClass(array('city'));

        if ($Info['provinceid']){

            $Info['city_one']   =   $cache['city_name'][$Info['provinceid']];
        }
        if ($Info['cityid']){

            $Info['city_two']   =   $cache['city_name'][$Info['cityid']];
        }
        if ($Info['three_cityid']){

            $Info['city_three'] =   $cache['city_name'][$Info['three_cityid']];
        }

        return  $Info;
    }

    /**
     * @param array $where
     * @return array|bool|false|string|void
     */
    public function getAddressNum($where = array())
    {

        $addressNum =   $this->select_num('company_job_link', $where);

        return $addressNum;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function saveAddress($data = array())
    {
        if (!empty($data)){

            $result =   $this->insert_into('company_job_link', $data);
        }

        return  $result;
    }

    /**
     * @param array $data
     * @param array $where
     * @return bool
     */
    public function upAddress($data = array(), $where = array())
    {
        if (!empty($data) && !empty($where)){


            $result =   $this->update_once('company_job_link', $data, $where);
        }

        return  $result;
    }

    /**
     * @param array $where | uid,id
     * @return array
     */
    public function delAddress($where = array())
    {

        $return     =   array('errcode' => 8, 'msg' => '系统错误');

        if (!empty($where)){

            $result =   $this->delete_all('company_job_link', $where, '');

            if ($result){

                $this->update_once('company_job', array('is_link' => 1), array('link_id' => $where['id'], 'uid' => $where['uid'], 'is_link' => 2));
                $this->update_once('company_job', array('link_id' => ''), array('link_id' => $where['id'], 'uid' => $where['uid']));
            }

            $return =   array(

                'errcode'   =>  $result ? 9 : 8,
                'msg'       =>  $result ? '工作地址删除成功' : '工作地址删除失败'
            );
        }

        return  $return;
    }

}

?>