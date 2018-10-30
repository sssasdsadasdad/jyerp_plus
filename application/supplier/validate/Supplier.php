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

namespace app\supplier\validate;

use think\Validate;

/**
 * 节点验证器
 * @package app\admin\validate
 * @author 蔡伟明 <314013107@qq.com>
 */
class Supplier extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|供应商' => 'require',
        'type|供应商类型'  => 'require',
        'purchas_user|采购员'      => 'require',
        'susername|供应商联系人'      => 'require',
        'email|邮箱'     => 'email',
        'phone|手机号'   => 'regex:^1\d{10}',
    ];

    //定义验证提示
    protected $message = [
        'name.require' => '请输入供应商',
        'email.email'      => '邮箱格式不正确',
        'purchas_user.require' => '请选择采购员',
        'phone.regex'     => '手机号格式不正确',
    ];

}
