<?php
// +----------------------------------------------------------------------
// | 海豚PHP框架 [ DolphinPHP ]
// +----------------------------------------------------------------------
// | 版权所有 2016~2017 河源市卓锐科技有限公司 [ http://www.zrthink.com ]
// +----------------------------------------------------------------------
// | 官方网站: http://dolphinphp.com
// +----------------------------------------------------------------------
// | 开源协议 ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------

namespace app\personnel\model;

use think\Model as ThinkModel;

/**
 * 人事档案模型
 * @package app\cms\model
 */
class Contract extends ThinkModel
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__PERSONNEL_CONTRACT__';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;
   
    // 定义修改器
    public function setContractTimeAttr($value)
    {
        return $value != '' ? strtotime($value) : '';
    }
    public function setStartTimeAttr($value)
    {
        return $value != '' ? strtotime($value) : '';
    }
    public function setEndTimeAttr($value)
    {
    	return $value != '' ? strtotime($value) : '';
    }
    public function setTestTimeAttr($value)
    {
    	return $value != '' ? strtotime($value) : '';
    }
    public function setPendTimeAttr($value)
    {
    	return $value != '' ? strtotime($value) : '';
    }  
    
  
    public function getContractTimeAttr($value)
    {
        return $value != 0 ? date('Y-m-d', $value) : '';
    }
    public function getStartTimeAttr($value)
    {
        return $value != 0 ? date('Y-m-d', $value) : '';
    }
    public function getEndTimeAttr($value)
    {
    	return $value != 0 ? date('Y-m-d', $value) : '';
    }
    public function getTestTimeAttr($value)
    {
    	return $value != 0 ? date('Y-m-d', $value) : '';
    }
    public function getPendTimeAttr($value)
    {
    	return $value != 0 ? date('Y-m-d', $value) : '';
    }

    
    /**
     * 获取档案列表
     * @param array $map 筛选条件
     * @param array $order 排序
     * @author 黄远东 <641435071@qq.com>
     * @return mixed
     */
    public static function getList($map = [], $order = [])
    {
    	$data_list = self::view('personnel_contract', true)    	
    	->view("admin_user", ['nickname','avatar','sex','role','organization','position','is_on'], 'admin_user.id=personnel_contract.uid', 'left')
    	->where($map)
    	->order($order)
    	->paginate();
    	return $data_list;
    }
    
    /**
     * 获取档案
     * @param array $map 筛选条件
     * @author 黄远东 <641435071@qq.com>
     * @return mixed
     */
    public static function getOne($id = '',$map = [])
    {
    	$data_list = self::view('personnel_contract', true)
    	->view("admin_user", ['username','nickname','avatar','sex','birth','role','organization','position','is_on','status','email','mobile'], 'admin_user.id=personnel_contract.uid', 'left')
    	->where(['personnel_contract.id'=>$id]) 
    	->where($map)
    	->find();
    	return $data_list;
    }
}