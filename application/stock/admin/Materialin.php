<?php
namespace app\stock\admin;
use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\stock\model\Purchase as PurchaseModel;
use app\stock\model\House as HouseModel;
use app\stock\model\Purchasedetail as PurchasedetailModel;
use app\user\model\Organization as OrganizationModel;
use app\stock\model\Material as MaterialModel;
use app\stock\model\MaterialType as MaterialTypeModel;
use app\purchase\model\Arrival as ArrivalModel;
use app\task\model\Task_detail as Task_detailModel;
use app\stock\model\Account as AccountModel;
use think\Db;
/**
 * 采购入库控制器
 */
class Materialin extends Admin
{
	/*
	 * 材料入库查询
	 * @author HJP<957547207>
	 */
	public function index()
	{
		// 查询
		$map = $this->getMap();
		// 排序
		// $order = $this->getOrder('stock_purchase.create_time desc');
		$order = $this->getOrder('stock_purchase.intime desc');
		// 数据列表
		$data_list = PurchaseModel::getMaterialin($map,$order);
		$stock_account = [
			'title' => '记账',
			'icon'  => 'fa fa-fw fa-pencil',
			'class' => 'btn btn-primary ajax-get',
			'href'  => url('stock_account'),
			'data-title' => '确定记账',
		];
		// 使用ZBuilder快速创建数据表格
		return ZBuilder::make('table')
			->hideCheckbox()
			->addTimeFilter('stock_purchase.intime') // 添加时间段筛选
			// ->setSearch(['stock_purchase.name' => '入库主题'], '', '', true)
			// ->addOrder(['code']) // 添加排序
			// ->addFilter(['oid'=>'admin_organization.title','putinid'=>'admin_organization.title']) // 添加筛选
			->addColumns([
				['intime', '入库时间','date'],
				['code', '单据编号'],
				['material_name', '材料名称'],
				['material_type_name', '材料类型'],
				['version', '规格'],
				['unit', '计量单位'],
				['house_name', '仓库'],
				['rksl', '入库数量'],
				['dj', '单价'],
				['je', '金额'],
			])
      ->setRowList($data_list) // 设置表格数据  
			->addTopButton('stock_account',$stock_account)
            ->fetch(); // 渲染模板
	}

	//记账
	public function stock_account(){
		$ids = Db::name('stock_purchase_detail')->where('is_jz',0)->column('id');
		if($ids == null)$this->error('未查找到未记账数据');
		$data = Db::name('stock_purchase_detail')->where('is_jz',0)->group('itemsid')->column('itemsid,SUM(rksl),SUM(je)');
		$itemsid = Db::name('stock_purchase_detail')->where('is_jz',0)->column('itemsid');
		$arr1 = Db::name('stock_account')->order('create_time desc')->where('materialid','in',$itemsid)->column('materialid,ytotal,ynum,yprice');
		$list = [];
		foreach($data as $key => $value){	
			if(empty($arr1)){
				$arr = ['materialid'=>$value['itemsid'],'rnum'=>$value['SUM(rksl)'],'rtotal'=>$value['SUM(je)'],'rprice'=>$value['SUM(je)']/$value['SUM(rksl)']];
				$arr['ytotal'] = $arr['rtotal'];
				$arr['ynum'] = $arr['rnum'];
				$arr['yprice'] = $arr['rprice'];				
			}else{
				foreach($arr1 as $k => $v){						
					if($k == $value['itemsid']){
						$arr = ['materialid'=>$k];
						$arr['qtotal'] = $v['ytotal'];
						$arr['qnum'] = $v['ynum'];
						$arr['qprice'] = $v['yprice'];
						$arr['rnum'] = $value['SUM(rksl)'];
						$arr['rprice'] = $value['SUM(je)']/$value['SUM(rksl)'];
						$arr['ytotal'] = $value['SUM(je)']+$arr['qtotal'];
						$arr['ynum'] = $value['SUM(rksl)']+$arr['qnum'];
						$arr['yprice'] = ($value['SUM(je)']+$arr['qtotal'])/($value['SUM(rksl)']+$arr['qnum']);
					}															
				}
			}
			$list[] = $arr;
			//$arr1['materialid'] = Db::name('stock_account')->order('create_time desc')->where('materialid','in',$value['itemsid'])->value('materialid');
			
			//if($arr1['materialid'] == $value['itemsid']){
				//$arr = ['materialid'=>$value['itemsid'],'rnum'=>$value['SUM(rksl)'],'rtotal'=>$value['SUM(je)']];
				//$arr['ytotal'] = Db::name('stock_account')->where('materialid','in',$arr['materialid'])->value('ytotal');
				//$arr['ynum'] = Db::name('stock_account')->where('materialid','in',$arr['materialid'])->value('ynum');
				//$arr['yprice'] = Db::name('stock_account')->where('materialid','in',$arr['materialid'])->value('yprice');
				//$arr['qtotal'] = $arr['ytotal'];
				//$arr['qnum'] = $arr['ynum'];
				//$arr['qprice'] = $arr['yprice'];
				//$arr['rprice'] = $value['SUM(je)']/$value['SUM(rksl)'];
				//$arr['ytotal'] = $arr['rtotal']+$arr['qtotal'];
				//$arr['ynum'] = $arr['rnum']+$arr['qnum'];
				//$arr['yprice'] = ($value['SUM(je)']+$arr['qtotal'])/($value['SUM(rksl)']+$arr['qnum']);
			//}else{
				//$arr = ['materialid'=>$value['itemsid'],'rnum'=>$value['SUM(rksl)'],'rtotal'=>$value['SUM(je)'],'rprice'=>$value['SUM(je)']/$value['SUM(rksl)']];
				//$arr['ytotal'] = $arr['rtotal'];
				//$arr['ynum'] = $arr['rnum'];
				//$arr['yprice'] = $arr['rprice'];
			//}						
			
			
		}	
		//dump($list);die;
		$id = implode(",",$ids);
		$account = new AccountModel;
		if($account->saveAll($list)){
			PurchasedetailModel::where('id','in',$id)->update(['is_jz'=>1]);
			$this->success('记账成功');
		}else{
			$this->error('记账失败');
		}					
	}
	public function add(){
		if($this->request->isPost()){
			$data = $this->request->post();
			// 验证
			$result = $this->validate($data, 'purchase');
			// 验证失败 输出错误信息
			if(true !== $result) $this->error($result);
			$data['code'] = 'CGRK'.date('YmdHis',time());
			
			if($model = PurchaseModel::create($data)){
				flow_detail($data['name'],'stock_purchase','stock_purchase','stock/purchase/task_list',$model['id']);
				//记入行为
				foreach($data['mid'] as $k => $v){
            		$info = array();
            		$info = [
            				'pid'=>$model['id'],
            				'itemsid'=>$v,
            				'rksl'=>$data['rksl'][$k],
							'price'=>$data['price'][$k],
            				'ck'=>$data['ck'][$k],
            				'je'=>$data['je'][$k],
            				'bz'=>$data['bz'][$k],
            		];  
            		PurchasedetailModel::create($info);         		      	
            	}            	      
				$this->success('新增成功！',url('index'));
			}else{
				$this->error('新增失败！');
			}
		}
		 $ck = HouseModel::column('id,name');
        $html = ' <script type="text/javascript">
            var house_select = \'<select name="ck[]">';
        foreach ($ck as $key => $value) {
            $html.='<option value="'.$key.'">'.$value.'</option>';
            
        }
        $html.='</select>\';
        </script>';
		return Zbuilder::make('form')
		 ->addGroup(
        [
          '采购入库' =>[
            ['hidden','zrid'],
            ['hidden', 'helpid'],            
          	['hidden', 'warehouses',UID],           
          	['hidden', 'zdid',UID],           
          	['hidden', 'deliverer',UID],           
			['text:4','name','入库主题'],
			['select:4','order_id','采购到货单','',ArrivalModel::getName()],
			['text:4','sid','供应商','','','','readonly'],
			['text:4','cid','采购员','','','','disabled'],
			['text:4','oid','采购部门','','','','disabled'],
			['static:4', 'delivname', '交货人','',get_nickname(UID)],
			['text:4', 'zrname', '验收人'],
			['static:4', 'warehname', '入库人','',get_nickname(UID)],
			['select:4', 'putinid', '入库部门','', OrganizationModel::getMenuTree2()],
			['static:4','zdname','制单人','',get_nickname(UID)],	
			['files','file','附件'],
			['textarea:8', 'helpname', '可查看该入库人员'],		
			['textarea','note','摘要'],	
          ],
          '入库明细' =>[
            ['hidden', 'materials_list'],
			['hidden', 'controller',request()->controller()],
          ]
        ]
      )		
		->js('stock')
		->setExtraHtml(outhtml2())
		->setExtraJs($html.outjs2())		
		->fetch();
	}
	public function get_Mateplan($mateplan = ''){
		if($mateplan == ''){
			return $html='<span>请选择采购到货单</span>';	
		}
		$ck = HouseModel::column('id,name');
        $html2 = '<select name="ck[]">';
        foreach ($ck as $key => $value) {
            $html2.='<option value="'.$key.'">'.$value.'</option>';            
        }
        $html2.='</script>';		
		$map = ['aid'=>$mateplan];
		$data = ArrivalModel::getMaterial($map);			
		$html = '<div class="form-group col-md-12 col-xs-12" id="form_group_materials_name"><table class="table table-bordered"><tbody><tr><td>物品名称</td><td>单位</td><td>规格</td><td>仓库</td><td>到货数量</td><td>入库数量</td><td>单价(元)</td><td>金额(元)</td><td>备注</td></tr>';
    		foreach ($data as $k => $v){ 
    			$html.='<tr><input type="hidden" name="mid[]" value="'.$v['wid'].'"><input type="hidden" name="mlid[]" value="'.$v['id'].'"><td>'.$v['name'].'</td><td>'.$v['unit'].'</td><td>'.$v['version'].'</td><td>'.$html2.'</td><td>'.$v['plan_num'].'</td><td><input type="number" name="rksl[]" value="'.$v['plan_num'].'"></td><td><input type="number" name="price[]" value="'.$v['price'].'"></td><td><input type="number" name="je[]" value="'.$v['price']*$v['plan_num'].'"></td><td><input type="text" name="bz[]" value="'.$v['remarks'].'"></td></tr>';
    		}   		
    		$html .= '</tbody></table></div>';
		return $html;				
	}
	public function get_Detail($order_id = ''){
			$data = PurchaseModel::get_Detail($order_id);
		return $data;
	}
	
	public function delete($record = [])
    {
   		$ids = $this->request->isPost() ? input('post.ids/a') : input('param.ids');
    	// 删除节点
    	if (PurchaseModel::destroy($ids)) {
    		// 记录行为
    		$ids = is_array($ids)?implode(',',$ids):$ids;
    		$details = '生产任务ID('.$ids.'),操作人ID('.UID.')';
    		//action_log('produce_plan_delete', 'produce_plan', $ids, UID, $details);
    		$this->success('删除成功');
    	} else {
    		$this->error('删除失败');
    	}
    }    	
	//查看
    public function task_list($id = null){
    	if($id == null) $this->error('参数错误');		
		$info = PurchaseModel::getOne($id);
		$info['materials_list'] = implode(PurchaseModel::getMaterials($id),',');
		$info['helpname'] = Task_detailModel::get_helpname($info['helpid']);
		$info['controller'] = request()->controller();
		return ZBuilder::make('form')
		->hideBtn('submit')
		->addGroup([
		'采购入库'=>[
			['hidden','id'],            
			['static:4','name','入库主题'],
			['static:4','order_id','采购到货单'],
			['static:4','sid','供应商'],
			['static:4','cid','采购员'],
			['static:4','oid','采购部门'],
			['static:4', 'deliverer', '交货人'],
			['static:4', 'zrid', '验收人'],
			['static:4', 'warehouses', '入库人'],
			['static:4', 'putinid', '入库部门'],
			['static:4','zdid','制单人',],	
			['archives','file','附件'],
			['static:8', 'helpname', '可查看该入库人员'],		
			['static','note','摘要'],									
		],
          '采购入库明细' =>[
            ['hidden', 'materials_list'],
            ['hidden', 'controller'],
          ]			
		])
		->setExtraJs(outjs2())
		->setFormData($info)
		->js('stock')
		->fetch();
    }
	
	//明细
     public function tech($pid = '',$materials_list = '')
    {
    	if($materials_list == '' || $materials_list == 'undefined') {
    		$html = '';	
    	}else{
    		$map = ['stock_purchase_detail.pid'=>$pid,'stock_material.id'=>['in',($materials_list)]];
    		$data = PurchaseModel::getDetail($map);
    		$html = '<div class="form-group col-md-12 col-xs-12" id="form_group_materials_name"><table class="table table-bordered"><tbody><tr><td>物品名称</td><td>单位</td><td>规格</td><td>单价</td><td>到货数量</td><td>仓库</td><td>金额(元)</td><td>备注</td></tr>';
    		foreach ($data as $k => $v){ 
    			$html.='<tr><input type="hidden" name="mid[]" value="'.$v['itemsid'].'"><input type="hidden" name="mlid[]" value="'.$v['id'].'"><td>'.$v['name'].'</td><td>'.$v['unit'].'</td><td>'.$v['version'].'</td><td>'.$v['price'].'</td><td>'.$v['rksl'].'</td><td>'.$v['ck'].'</td><td>'.$v['je'].'</td><td>'.$v['bz'].'</td></tr>';
    		}   		
    		$html .= '</tbody></table></div>';   
    	}
    	return $html;
    }
	
    
}
