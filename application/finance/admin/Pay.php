<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28 0028
 * Time: 09:25
 */

namespace app\finance\admin;
use app\admin\controller\Admin;
//use app\finance\model\Item;
use app\common\builder\ZBuilder;
use app\finance\validate\Pay as PayValidate;
//use app\finance\model\Organization as OModel;
use app\user\model\Organization as OrganizationModel;
use app\tender\model\Obj as IModel;
use app\finance\model\Bank as BModel;
use app\finance\model\Pay as PayModel;
use app\tender\model\Hire as HireModel;
use app\supplier\model\Supplier;
use app\tender\model\Hire;
use app\tender\model\Obj;
use Think\Db;
use app\tender\model\Hirecontract;
class Pay extends Admin
{

    /*
     * 租赁付款管理
     */
    public function  index(){
            $map = $this->getMap();
            $order = $this->getOrder('finance_hire.id desc');
            $data_list = PayModel::getList($map,$order);
            
            
            $task_list = [
						'title' => '查看详情',
						'icon' => 'fa fa-fw fa-eye',
						'href' => url('edit',['id'=>'__id__'])
						];
            //使用ZBuilder构建表格展示数据
            return ZBuilder::make('table')
                ->setSearch(['tender_obj.name'=>'所属项目','supplier_list.name'=>'供应商'],'','',true) // 设置搜索框
                ->addTimeFilter('finance_hire.date') // 添加时间段筛选
                ->addOrder('id,number,date,money,unickname') // 添加排序
                ->addColumns([ // 批量添加列
                    ['number', '付款编号'],
                    ['name', '付款名称'],
                    ['unickname', '填报人'],
                    ['date', '日期'],
                    ['supplier','供应商'],
                    ['money', '付款金额'],
                    ['item', '所属项目'],
                    ['status', '审批结果','status','',[0 =>'进行中:info', 2=>'否决:danger', 1=>'同意:success']],
                    ['right_button','操作']
                ])
                ->setRowList($data_list) // 设置表格数据
                ->addTopButton('add') //添加删除按钮
                ->addTopButton('delete') //添加删除按钮
                ->addRightButton('edit',$task_list,true) // 添加授权按钮
                ->addRightButton('delete') //添加删除按钮
                ->setTableName('finance_hire')
                ->fetch();
    }

    /*
     * 申请租赁付款
     */
    public function add(){
        if ($this->request->isPost()) {
            $data = $this->request->post();
            // 验证
            
            
      $data['item'] = PayModel::getItem($data['pact']);
			$data['supplier'] =PayModel::getSupplier($data['pact']);
      //dump($data);die;
            $result = $this->validate($data, 'Pay');
            // 验证失败 输出错误信息
            if(true !== $result) $this->error($result);
            $data['number'] = 'ZL'.date('YmdHis',time());
            if ($res = PayModel::create($data)) {            	
            		flow_detail($data['name'],'finance_hire','finance_hire','finance/pay/edit',$res['id']);            	           
                $this->success('新增成功',url('index'));
            } else {
                $this->error('新增失败');
            }
        }

				

        $list_province= BModel::where('id','>','0')->column('id,bank');
        $user = Db::name('admin_user') -> column('id,nickname');
        // 使用ZBuilder快速创建表单
        $list_pact = Hirecontract::where('status',1)->column('id,name');
        
      	$js = <<<EOF
            <script type="text/javascript">
                $(function(){
                   $('#money').attr('oninput','return Edit1Change();');				   					
                });
				var j=chineseNumber(document.getElementById("money").value);
				document.getElementById("big_money").value=j;		
				function Edit1Change(){			
					document.getElementById("big_money").value=chineseNumber(document.getElementById("money").value);
				}
					
            </script>
EOF;
        //dump($list_pact);die;
        return ZBuilder::make('form')
            ->setPageTitle('租赁付款申请')
            ->addFormItems([
                ['hidden','maker', UID],
                ['date:3','date','日期','',date('Y-m-d')],
                ['text:4','name', '付款名称'],
                ['select:3','pact', '租赁合同','',$list_pact],
                ['text:3','objname','所属项目','','','','disabled'],
                ['text:4','suname','供应商','','','','disabled'],
                ['Linkage:3','bank_name','开户行名称','',$list_province,'',url('get_account'),'accmount'],
                ['select:4','accmount','银行账户'],
                ['number:3','money','付款金额'],
                ['text:3', 'big_money','金额大写'],
                ['select:3','maker', '经办人','',$user, UID, 'disabled'],
                ['textarea','remark','付款说明'],
                ['file','file','附件'],
            ])
        	->setExtraHtml(outhtml2())
		
					->js('Pay')
					->setExtraJs($js.outjs2())
					->js('chineseNumber')
          ->fetch();
    }

    public function get_account($bank_name=''){
        $res= BModel::where('id',$bank_name)->select();
        //dump($res);die;
        $array =array();
        foreach($res as $key=>$val){
            $array[] = ['key'=>$val['id'],'value'=>$val['accmount']];
        }
        $arr['code'] = '1'; //判断状态
        $arr['msg'] = '请求成功'; //回传信息
        $arr['list'] =$array; //数据
        return json($arr);
    }
  


    /*
     * 租赁付款申请
     */

    /*
     * 租赁付款删除
     */
		//获取单源明细
	//$HireID 

	public function getDetail($pact = ''){
			$data = PayModel::getDetail($pact);
		return $data;
	}

	



    public function delete($record = []){
        return $this->setStatus('delete');
        }     
    public function edit($id = null){
		
		$data= PayModel::getEdit($id);
		return ZBuilder::make('form')
		->addFormItems([
		// 批量添加表单项
			['static:3', 'date', '日期'],
			['static:3', 'number', '付款编号'],
			['static:3', 'name','付款名称'],
			['static:3', 'hname', '租赁合同'],
			['static:3', 'item','所属项目'],
			['static:3', 'supplier','供应商'],
			['static:3', 'bname','开户行名称'],			
			['static:3', 'aname','银行账户'],			
			['static:3', 'money','付款金额'],
			['static:3', "big_money", '大写金额'],			
			['static:3', 'unickname', '经办人'],			
			['static:3', 'remark','付款说明'],			
			['static:3', 'file','附件']	
		])
		-> setPageTitle('详情')
		->hideBtn('submit')
		->setFormData($data)
		->fetch();
	
	}
 
}