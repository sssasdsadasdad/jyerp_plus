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

namespace app\user\validate;

use think\Validate;

/**
 * 节点验证器
 * @package app\admin\validate
 * @author 蔡伟明 <314013107@qq.com>
 */
class Position extends Validate
{
    //定义验证规则
    protected $rule = [      
        'pid|所属上级'    => 'require',
        'title|职位'  => 'require|unique:admin_position',    	  	
    	'num|编制人数'     => 'number',
    	'sort|排序'     => 'number',
    ];

    //定义验证提示
    protected $message = [
        'module.require' => '请选择所属模块',
        'pid.require'    => '请选择所属节点',
    ];
}
