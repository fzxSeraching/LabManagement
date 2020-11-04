<?php

/**
 * Created by PhpStorm.
 * User: GRTD
 * Date: 2020-11-04
 * Time: 16:40
 */
namespace app\common;

use think\Model;

class baseModel extends Model
{
    /**
     * 添加数据
     * @param    array $data 数据
     * @return   integer           新增数据的id
     */
    public function addData($data)
    {
        $id = $this->insertGetId($data);
        return $id;
    }

    /**
     * 修改数据
     * @param    array $map where语句数组形式
     * @param    array $data 修改的数据
     * @return    boolean         操作是否成功
     */
    public function editData($map, $data)
    {
        $result = $this->where($map)->save($data);
        return $result;
    }

    /**
     * 删除数据
     * @param    array $map where语句数组形式
     * @return   boolean          操作是否成功
     */
    public function deleteData($map)
    {
        $result = $this->where($map)->delete();
        return $result;
    }

    /**
     * @return mixed 返回所有数据
     */

    public function selectAllData()
    {
        $result = $this->select();
        return $result;
    }

    /**
     * @param $where
     * @return array 返回所有符合条件的数据
     */

    public function selectWhereData($where = '1=1')
    {
        $result = $this->where($where)->select();
        return $result;
    }

    /**
     * @param string $where 条件
     * @param $order 排序字段
     * @return array  返回根据特定条件排序的符合条件数据
     */

    public function selectWhereOrderData($where = '1=1', $order = 'id')
    {
        $result = $this->where($where)->order($order)->select();
        return $result;
    }

    /**
     * @param string $where 条件
     * @param int $offset 最小值
     * @param int $length 返回数据量
     * @return array  返回符合长度的数据量
     */

    public function selectWhereLimitData($where = '1=1', $offset = 0, $length = 10)
    {
        $result = $this->where($where)->limit($offset, $length)->select();
        return $result;
    }


}