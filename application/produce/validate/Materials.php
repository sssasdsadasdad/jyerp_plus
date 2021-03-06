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

namespace app\produce\validate;

use think\Validate;

/**
 * 物料清单验证器
 * @package app\produce\validate
 * @author 黄远东<64143571@qq.com>
 */
class Materials extends Validate
{
    //定义验证规则
    protected $rule = [      
        'name|主题'  => 'require',
    	'type|BOM类型'  => 'require',
    	'materials_list|子件明细'  => 'require',
    ];

    //定义验证提示
    protected $message = [
        'materials_list.require' => '请添加子件明细',
    ];
}
