<?php
namespace app\sales\validate;
use think\Validate;
/**
 * 投标项目验证器
 * @package app\asstes\validate
 * @author HJP
 */
class Offer extends Validate
{
	//定义验证规则
	protected $rule = [
		'name|报价名称' => 'require',
		'document_time|报价日期' => 'require',
		'zrname|业务员' => 'require',
		'end_time|截止日期'	=> 'require',
	];
	// 验证提示
	protected $message = [
		'monophyletic.require' => '请选择源单类型',
		'department.require' => '请选择所属部门',
		'paytype.require' => '请选择支付方式',
		'goodtype.require' => '请选择交货方式',
		'transport.require' => '请选择运送方式',
	];
	
}
