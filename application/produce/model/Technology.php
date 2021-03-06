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

namespace app\produce\model;

use think\Model as ThinkModel;

/**
 * 工艺档案模型
 * @package app\produce\model
 */
class Technology extends ThinkModel
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__PRODUCE_TECHNOLOGY__';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;
   
   
    /**
     * 获取工艺档案列表
     * @param array $map 筛选条件
     * @param array $order 排序
     * @author 黄远东 <641435071@qq.com>
     * @return mixed
     */
    public static function getList($map = [], $order = [])
    {
    	$data_list = self::view('produce_technology', true)    	
    	->view("admin_user", ['nickname'], 'admin_user.id=produce_technology.uid', 'left')
    	->where($map)
    	->order($order)
    	->paginate();
    	return $data_list;
    }
    
    /**
     * 获取工艺档案
     * @param array $map 筛选条件
     * @author 黄远东 <641435071@qq.com>
     * @return mixed
     */
    public static function getOne($id = '',$map = [])
    {
    	$data_list = self::view('produce_technology', true)
    	->view("admin_user", ['username'], 'admin_user.id=produce_technology.uid', 'left')
    	->where(['produce_technology.id'=>$id]) 
    	->where($map)
    	->find();
    	return $data_list;
    }
}