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

namespace app\admin\model;

use think\Model;

/**
 * 日志模型
 * @package app\admin\model
 */
class Messageaction extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '__ADMIN_MESSAGE_ACTION__';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;
}