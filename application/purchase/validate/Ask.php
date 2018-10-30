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

namespace app\purchase\validate;

use think\Validate;

/**
 * 节点验证器
 * @package app\admin\validate
 * @author 蔡伟明 <314013107@qq.com>
 */
class Ask extends Validate
{
    //定义验证规则
    protected $rule = [      
        'name|主题'    => 'require',
        'atime|申请时间'    => 'require',
        'tid|采购类型'    => 'require',
        'oid|申请部门'    => 'require',
        'aid|申请人'    => 'require',
    ];

}
