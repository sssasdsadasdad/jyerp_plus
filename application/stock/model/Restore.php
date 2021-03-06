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

namespace app\stock\model;

use think\Model as ThinkModel;
use think\Db;
/**
 * 借货模型
 * @package app\produce\model
 */
class Restore extends ThinkModel
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__STOCK_RESTORE__';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;
   
   
    /**
     * 获取仓库列表
     * @param array $map 筛选条件
     * @param array $order 排序
     * @author 黄远东 <641435071@qq.com>
     * @return mixed
     */
    public static function getList($map = [], $order = [])
    {
    	$data_list = self::view('stock_restore', true)    	
    	->view("stock_borrow", ['name'=>'order_id','jhbm','zrid','jh_time','jcbm','jcck'], 'stock_borrow.id=stock_restore.order_id', 'left')
    	->view("admin_user", ['nickname'=>'zrid'], 'admin_user.id=stock_restore.zrid', 'left')
    	->view("admin_user b", ['nickname'=>'ckid'], 'b.id=stock_borrow.ckid', 'left')
    	->view("admin_user c", ['nickname'=>'jhname'], 'c.id=stock_borrow.zrid', 'left')
    	->view("admin_user e", ['nickname'=>'rkid'], 'e.id=stock_restore.rkid', 'left')
    	->view('admin_organization',['title'=>'jhbm'],'admin_organization.id=stock_borrow.jhbm','left')
    	->view('admin_organization d',['title'=>'jcbm'],'d.id=stock_borrow.jcbm','left')
    	->view('admin_organization f',['title'=>'fhbm'],'f.id=stock_restore.fhbm','left')
    	->view('stock_house',['name'=>'jcck'],'stock_house.id=stock_borrow.jcck','left')
    	->where($map)
    	->order($order)
    	->paginate();
    	return $data_list;
    }
    
    /**
     * 获取仓库
     * @param array $map 筛选条件
     * @author 黄远东 <641435071@qq.com>
     * @return mixed
     */
    public static function getOne($id = '',$map = [])
    {
    	$data_list = self::view('stock_restore', true)
		->view("stock_borrow", ['name'=>'order_id','jhbm','zrid','jh_time','jcbm','jcck'], 'stock_borrow.id=stock_restore.order_id', 'left')
    	->view("admin_user", ['nickname'=>'zrid'], 'admin_user.id=stock_restore.zrid', 'left')
    	->view("admin_user b", ['nickname'=>'ckid'], 'b.id=stock_borrow.ckid', 'left')
    	->view("admin_user c", ['nickname'=>'jhname'], 'c.id=stock_borrow.zrid', 'left')
    	->view("admin_user e", ['nickname'=>'rkid'], 'e.id=stock_restore.rkid', 'left')
    	->view("admin_user g", ['nickname'=>'zdid'], 'g.id=stock_restore.zdid', 'left')
    	->view('admin_organization',['title'=>'jhbm'],'admin_organization.id=stock_borrow.jhbm','left')
    	->view('admin_organization d',['title'=>'jcbm'],'d.id=stock_borrow.jcbm','left')
    	->view('admin_organization f',['title'=>'fhbm'],'f.id=stock_restore.fhbm','left')
    	->where(['stock_restore.id'=>$id]) 
    	->where($map)
    	->find();
    	return $data_list;
    }
     //获取单源明细
	public static function get_Detail($id = ''){
		$getDetail = self::view('stock_borrow',['id','jhbm','zrid','jh_time','jcbm','jcck'])
		->view('admin_user',['nickname'=>'jhname'],'admin_user.id=stock_borrow.zrid','left')
    	->view('admin_organization',['title'=>'jhbm'],'admin_organization.id=stock_borrow.jhbm','left')
		->view('admin_organization d',['title'=>'jcbm'],'d.id=stock_borrow.jcbm','left')
		->view('stock_house',['name'=>'jcck'],'stock_house.id=stock_borrow.jcck','left')
		->where(['stock_borrow.id'=>$id])
		->find();	
 		return $getDetail;
	}
    /**
     * 获取所有仓库
     * @author 黄远东 <641435071@qq.com>
     * @return mixed
     */
    public static function getTree()
    {
    	$menus = self::where(['status'=>1])->column('name','id');
    	return $menus;
    }
    //查看
	public static function getDetail($map = [])
	{
		$data_list = self::view('stock_restore_detail', true)
    	->view("stock_material", ['name','version','unit'], 'stock_material.id=stock_restore_detail.itemsid', 'left') 
    	->where($map)
    	->paginate();
    	return $data_list;  	
	} 
	//取物品id
    public static function getMaterials($id){		
		return db::name('stock_restore_detail')->where('pid',$id)->column('itemsid');
	}
}